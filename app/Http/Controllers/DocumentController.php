<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with(['user', 'creator', 'uploader'])->get();
        return response()->json($documents);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'created_by' => 'required|exists:users,id',
            'uploaded_by' => 'required|exists:users,id',
            'document_name' => 'required|string|max:255',
            'doc_type' => 'required|string|max:100',
            'document_image' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Store file
        $path = $request->file('document_image')->store('documents', 'public');

        $document = Document::create([
            'user_id' => $request->user_id,
            'created_by' => $request->created_by,
            'uploaded_by' => $request->uploaded_by,
            'document_name' => $request->document_name,
            'doc_type' => $request->doc_type,
            'document_image_path' => $path,
        ]);

        return response()->json($document, 201);
    }

    public function show($id)
    {
        $document = Document::with(['user', 'creator', 'uploader'])->findOrFail($id);
        return response()->json($document);
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
}
