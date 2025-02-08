<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with(['user', 'creator', 'uploader'])->get();
        return response()->json($documents);
    }

    public function store(Request $request)
    {
        $login_user_id = Auth::user()->id;
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'document_name' => 'required|string|max:255',
            'doc_type' => 'required|string|max:100',
            'document_image_path' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Store file
        $path = '';
        if ($image = $request->file('document_image_path')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $path = $destinationPath.$profileImage;
        }

        $document = Document::create([
            'user_id' => $request->user_id,
            'created_by' => $login_user_id,
            'uploaded_by' => $login_user_id,
            'document_name' => $request->document_name,
            'doc_type' => $request->doc_type,
            'document_image_path' => $path,
        ]);

        return redirect()->route('users.show', $request->user_id)->with('success', 'Document created successfully.');
    }

    public function show($id)
    {
        $document = Document::with(['user', 'creator', 'uploader'])->findOrFail($id);
        return response()->json($document);
    }
    

    public function documentDestroy(Request $request)
    {
        Document::where('id', $request->id)->delete();
        return redirect()->route('users.show', $request->user_id)->with('success', 'Document deleted successfully.');
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
    
        $documents = Document::whereIn('id', $request->document_ids)->get();
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
              $filePath = public_path( $document->document_image_path);
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

}
