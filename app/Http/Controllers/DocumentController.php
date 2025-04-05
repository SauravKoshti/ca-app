<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use setasign\Fpdi\Fpdi;
use Yajra\DataTables\DataTables;
use Config;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if($request->input('user_type') == 'admin') {
                // dd("he");
                $documents = Document::leftJoin('users', 'users.id', '=', 'documents.uploaded_by')->with(['user', 'creator', 'uploader'])->select('documents.*')->where('users.user_type', 'admin')
                    ->where('user_id', $request->input('user_id'));
            } else {
                // dd("hess");
                $documents = Document::leftJoin('users', 'users.id', '=', 'documents.uploaded_by')->with(['user', 'creator', 'uploader'])->select('documents.*')->where('users.user_type', '!=', 'admin')
                    ->where('user_id', $request->input('user_id'));
                    // dd($documents);
                }
            
            return DataTables::of($documents)
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox" class="user-checkbox" name="document_id" value="' . $row->id . '" id="user_' . $row->id . '" >';
                })
                ->addColumn('user_name', function ($document) {
                    return $document->user ? $document->user->name : 'N/A';
                })
                ->addColumn('creator_name', function ($document) {
                    return $document->creator ? $document->creator->user_full_name : 'N/A';
                })
                ->addColumn('created_at', function ($document) {
                    return \Carbon\Carbon::parse($document->created_at)->format('d-m-Y H:i:s');
                })
                ->addColumn('uploader_name', function ($document) {
                    return $document->uploader ? $document->uploader->user_full_name : 'N/A';
                })
                ->addColumn('actions', function ($document) {
                    return '<a href="' . asset($document->document_image_path) . '" download="' . basename($document->document_image_path) . '" class="btn btn-success"><i class="fas fa-download"></i></a>
                            <form action="' . route('users.document.destroy') . '" id="documentUpload" method="POST" style="display:inline;">
                                ' . csrf_field() . '
                                <input type="hidden" name="id" value="' . $document->id . '">
                                <input type="hidden" name="user_id" value="' . $document->user_id . '">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>';
                })
                ->rawColumns(['actions', 'checkbox'])
                ->make(true);
        }
        // return response()->json($documents);
    }

    public function downloadDocuments(Request $request)
    {
        if ($request->ajax()) {
            // if($request->input('user_type') == 'admin') {
            //     $documents = Document::leftJoin('users', 'users.id', '=', 'documents.uploaded_by')->with(['user', 'creator', 'uploader'])->select('documents.*')->where('users.user_type', 'admin')
            //         ->where('user_id', $request->input('user_id'));
            // } else {
                $documents = Document::leftJoin('users', 'users.id', '=', 'documents.uploaded_by')->with(['user', 'creator', 'uploader'])->select('documents.*')->where('users.user_type', '!=', 'admin')
                    ->where('user_id', $request->input('user_id'))->get();
            // }
            // dd($documents);
            return DataTables::of($documents)
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox" class="user-checkbox" name="document_id" value="' . $row->id . '" id="user_' . $row->id . '" >';
                })
                ->addColumn('user_name', function ($document) {
                    return $document->user ? $document->user->name : 'N/A';
                })
                ->addColumn('creator_name', function ($document) {
                    return $document->creator ? $document->creator->user_full_name : 'N/A';
                })
                ->addColumn('created_at', function ($document) {
                    return \Carbon\Carbon::parse($document->created_at)->format('d-m-Y H:i:s');
                })
                ->addColumn('uploader_name', function ($document) {
                    return $document->uploader ? $document->uploader->user_full_name : 'N/A';
                })
                ->addColumn('actions', function ($document) {
                    return '<a href="' . asset($document->document_image_path) . '" download="' . basename($document->document_image_path) . '" class="btn btn-success"><i class="fas fa-download"></i></a>
                            <form action="' . route('users.document.destroy') . '" id="documentUpload" method="POST" style="display:inline;">
                                ' . csrf_field() . '
                                <input type="hidden" name="id" value="' . $document->id . '">
                                <input type="hidden" name="user_id" value="' . $document->user_id . '">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>';
                })
                ->rawColumns(['actions', 'checkbox'])
                ->make(true);
        }
        // return response()->json($documents);
    }

    public function store(Request $request)
    {
        $login_user_id = Auth::user()->id;
        $rules = [
            'user_id' => 'required|exists:users,id',
            'document_name' => 'required|string|max:255',
            'doc_type' => 'required|max:300',
            'document_image_path' => 'required_if:upload_type,online|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ];

        if ($request->upload_type === 'manual') {
            unset($rules['document_image_path']);
        }

        $validator = \Validator::make($request->all(), $rules, [
            'document_image_path.required' => 'The document image file is required.',
            'document_image_path.file' => 'The document must be a valid file.',
            'document_image_path.mimes' => 'The document must be in JPG, JPEG, PNG, or PDF format.',
            'document_image_path.max' => 'The document must not exceed 2MB in size.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.show', [
            'user' => $request->user_id,
            'tab' => 'document-tab'
            ])->withErrors($validator)
            ->withInput();
        }

        // Store file
        $path = '';
        if ($request->hasFile('document_image_path')) {
            $image = $request->file('document_image_path');
            $destinationPath = 'images/';
            $profileImage = $image->getClientOriginalName().date('His') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $path = $destinationPath . $profileImage;
        }

        Document::create([
            'user_id' => $request->user_id,
            'created_by' => $login_user_id,
            'uploaded_by' => $login_user_id,
            'document_name' => $request->document_name,
            'doc_type' => (is_array($request->doc_type)) ? implode(',', $request->doc_type) : $request->doc_type,
            'upload_type' => $request->upload_type,
            'financial_year' => $request->financial_year,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
            'document_image_path' => $path,
        ]);

        session()->flash('success', 'Document created successfully');
        return response()->json([], 200);
        // return redirect()->route('users.show', [
        //     'user' => $request->user_id,
        //     'tab' => 'document-tab'
        // ])->with('success', 'Document created successfully.');
    }

    public function show($id)
    {
        $document = Document::with(['user', 'creator', 'uploader'])->findOrFail($id);
        return response()->json($document);
    }


    public function documentDestroy(Request $request)
    {
        Document::where('id', $request->id)->delete();
        return redirect()->route('users.show', [
            'user' => $request->user_id,
            'tab' => 'download-document-tab'
            ])->with('success', 'Document deleted successfully.');

    }

    public function update(Request $request, $id)
    {
        $document = Document::findOrFail($id);

        $request->validate([
            'document_name' => 'sometimes|string|max:255',
            'doc_type' => 'sometimes|string|max:100',
            'document_image' => 'sometimes|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Handle file update
        if ($request->hasFile('document_image')) {
            Storage::disk('public')->delete($document->document_image_path);
            $path = $request->file('document_image')->store('documents', 'public');
            $document->document_image_path = $path;
        }

        $document->update($request->only(['document_name', 'doc_type']));

        return response()->json($document);
    }

    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        Storage::disk('public')->delete($document->document_image_path);
        $document->delete();

        return response()->json(['message' => 'Document deleted successfully']);
    }

    public function mergeDocuments(Request $request)
    {
        $request->validate([
            'document_ids' => 'required|array',
            'document_ids.*' => 'exists:documents,id',
        ]);

        $year = $request->input('year');
        $documents = Document::query();
        if ($year && $request->input('select_all') == 'on') {
            $documents = $documents->where('financial_year', $year)->latest()->get();
        } else {
            $documents = $documents->whereIn('id', $request->document_ids)->get();
        }
        if ($request->type === 'pdf') {
            return $this->downloadPdf($documents);
        } else if ($request->type === 'zip') {
            return $this->downloadZip($documents);
        }
    }

    private function downloadPdf($documents)
    {
        // Initialize FPDI
        $pdf = new Fpdi();
        $pdf->SetAutoPageBreak(true, 10); // Enable auto page break

        foreach ($documents as $document) {
            $filePath = public_path($document->document_image_path);
            if (!file_exists($filePath)) {
                \Log::error("File not found: " . $filePath);
                continue; // Skip missing files
            }

            $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

            if ($extension === 'pdf') {
                // Import PDF pages
                $pageCount = $pdf->setSourceFile($filePath);
                for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                    $templateId = $pdf->importPage($pageNo);
                    $size = $pdf->getTemplateSize($templateId);
                    $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                    $pdf->useTemplate($templateId);
                }
            } elseif (in_array($extension, ['jpg', 'jpeg', 'png'])) {
                // Add image to PDF
                list($width, $height) = getimagesize($filePath);

                if (!$width || !$height) {
                    \Log::error("Invalid image file: " . $filePath);
                    continue;
                }

                $pdf->AddPage();
                $pdf->Image($filePath, 10, 10, 190);
            } else {
                \Log::error("Unsupported file type: " . $filePath);
            }
        }

        // Check if pages were added
        if ($pdf->PageNo() == 0) {
            return response()->json(['error' => 'No valid pages were added to the PDF'], 400);
        }

        $outputPath = storage_path('app/public/merged_document.pdf');
        $pdf->Output($outputPath, 'F');

        return response()->download($outputPath)->deleteFileAfterSend(true);
    }

    private function downloadZip($documents)
    {
        $zip = new \ZipArchive();
        $zipFileName = storage_path('app/public/documents.zip');

        if ($zip->open($zipFileName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) !== true) {
            return response()->json(['error' => 'Failed to create zip file'], 500);
        }

        foreach ($documents as $document) {
            $filePath = public_path($document->document_image_path);
            if (file_exists($filePath)) {
                $zip->addFile($filePath, basename($filePath));
            } else {
                \Log::error("File not found: " . $filePath);
            }
        }

        $zip->close();

        return response()->download($zipFileName)->deleteFileAfterSend(true);
    }

    public function fetchImages(Request $request)
    {
        // Fetch images based on the selected year
        $year = $request->input('year');
        $userId = $request->input(key: 'user_Id');
        if ($request->input(key: 'user_type') == 'admin') {
            $images = Document::leftJoin('users', 'users.id', '=', 'documents.uploaded_by')->select('documents.*')->where('users.user_type', 'admin')
                ->where('user_id', $userId);
        } else {
            $images = Document::leftJoin('users', 'users.id', '=', 'documents.uploaded_by')->select('documents.*')->where('users.user_type', '!=', 'admin')
                ->where('user_id', $userId);
        }
        if ($year) {
            $images = $images->where('financial_year', $year)
                ->latest()->get();
        } else {
            $images = $images->latest()->get();
        }
        $imagesHtml = '';
        if ($images->isEmpty()) {
            return response()->json('<tr><td colspan="7" class="text-center">No data found</td></tr>');
        }
        foreach ($images as $documentData) {
            $imagesHtml .= '<tr>';
            if ($request->input(key: 'user_type') == 'admin') {
                $imagesHtml .= '<td><input type="checkbox" name="document_id" data-id="' . $documentData->id . '"></td>';
            } else {
                $imagesHtml .= '<td><input type="checkbox" name="document_select_id" data-id="' .
                    $documentData->id . '"></td>';
            }
            $imagesHtml .= '<td>' . $documentData->document_name . '</td>';
            $imagesHtml .= '<td>';
            if ($documentData->doc_type) {
                foreach (explode(',', $documentData->doc_type) as $doc_type) {
                    $docTypes = Config::get('constant.doc_type');
            
                    if (isset($docTypes[$doc_type])) {
                        $imagesHtml .= '<p class="mb-0">' . $docTypes[$doc_type] . '</p>';
                    } else {
                        $imagesHtml .= '<p class="mb-0 text-danger">Unknown Document Type: ' . htmlspecialchars($doc_type) . '</p>'; // Handle unknown doc type
                    }
                }
            }
            
            // if ($documentData->doc_type) {
            //     foreach (explode(',', $documentData->doc_type) as $doc_type) {
            //         $imagesHtml .= '<p class="mb-0">' . Config::get('constant.doc_type')[$doc_type] . '</p>';
            //     }
            // }
            $imagesHtml .= '</td>';
            $imagesHtml .= '<td>' . $documentData->upload_type . '</td>';
            $imagesHtml .= '<td>';
            $imagesHtml .= '<p>' . $documentData->uploader->user_full_name . '</p>';
            $imagesHtml .= '</td>';
            $imagesHtml .= '<td>';
             $imagesHtml .= '<p>' . \Carbon\Carbon::parse($documentData->created_at)->format('d-m-Y H:i:s') . '</p>';
            $imagesHtml .= '</td>';
            $imagesHtml .= '<td>';
            $imagesHtml .= '<a href="' . asset($documentData->document_image_path) . '" download class="btn btn-success"><i class="fas fa-download"></i></a>';
            $imagesHtml .= '<form action="' . route('users.document.destroy') . '" id="documentUpload" method="POST" style="display:inline;">';
            $imagesHtml .= csrf_field();
            $imagesHtml .= '<input type="hidden" name="id" value="' . $documentData->id . '">';
            $imagesHtml .= '<input type="hidden" name="user_id" value="' . $documentData->user_id . '">';
            $imagesHtml .= '<button type="submit" class="btn btn-danger btn-sm">Delete</button>';
            $imagesHtml .= '</form>';
            $imagesHtml .= '</td>';
            $imagesHtml .= '</tr>';
        }
        return response()->json($imagesHtml);
    }
}
