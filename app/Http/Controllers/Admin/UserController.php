<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Providers\FoundationServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id','desc')->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username|max:255',
//            'mobile' => ['required', 'regex:/^[7-9][0-9]{9}$/'],
            'password' => 'required|string|min:8',
            'email' => 'required|email|unique:users,email',
            'dob' => 'required|date',
            // 'pancard' => ['required', 'regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/'], // PAN Card validation
            // 'adharcard' => ['required', 'regex:/^\d{12}$/'], // Aadhar Card validation
//            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($validator->fails()) {
            dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }
//        dd($request);
        User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'dob' => $request->dob,
            'pancard' => $request->pancard,
            'adharcard' => $request->adharcard,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $documentDataArray = Document::where('user_id', $user->id)->get();
        $loggedInUserId = Auth::user()->id;
        return view('admin.users.show', compact('user','documentDataArray','loggedInUserId'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
//            'username' => 'required|string|unique:users,username|max:255',
//            'mobile' => ['required', 'regex:/^[7-9][0-9]{9}$/'],
            'password' => 'required|string|min:8',
//            'email' => 'required|email|unique:users,email',
            'dob' => 'required|date',
            // 'pancard' => ['nullable', 'regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/'], // PAN Card validation
            // 'adharcard' => ['nullable', 'regex:/^\d{12}$/'], // Aadhar Card validation
//            'password' => 'required|string|min:8|confirmed',
//            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($validator->fails()) {
            dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'dob' => $request->dob,
            'pancard' => $request->pancard,
            'adharcard' => $request->adharcard,
        ]);

        if ($request->password) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }


    public Function getDocument($user) 
    {
        $userId = $user;
        $documentDataArray = Document::where('user_id', $userId)->get();
        $userData = User::where('id', $userId)->first();
        // dd($userData, $user);
        $loggedInUserId = Auth::user()->id;
        return view('admin.users.document',compact('loggedInUserId','userId','userData','documentDataArray'));
    }

    public Function uploadDocument(Request $request) 
    {
        $request->validate([
            // 'name' => 'required',
            // 'detail' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        if ($image = $request->file('document_image_path')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['document_image_path'] = $destinationPath.$profileImage;
        } 
    
        Document::create($input);
        return redirect()->route('users.document', $request->user_id)->with('success', 'User deleted successfully.');
        // return view('admin.users.document',$request->user_id)
        //                 ->with('success','Product created successfully.');
    }

}