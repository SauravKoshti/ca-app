<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Exports\ContactsExport;
use Maatwebsite\Excel\Facades\Excel;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('id', 'desc')->get();
        return view('admin.contact-us', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            // 'mobile' => 'required|email|max:255',
            'message' => 'required|string',
        ]);        
        Contact::create($request->all());
        return redirect()->route('contact-us')->with('success', 'Message sent successfully!');
    }

    public function downloadSelectedContact(Request $request)
    {
        $contactIds = $request->input('contact_user_ids', []);

        if (empty($contactIds)) {
            return response()->json(['error' => 'No contact selected'], 400);
        }

        return Excel::download(new ContactsExport($contactIds), 'users.xlsx');
    }
}
