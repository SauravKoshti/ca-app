<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Providers\FoundationServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Document;
use App\Models\Payment;
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
        $login_user = Auth::user();
        if ($login_user->role == 'user') {
            $users = User::where('group_id', $login_user->group_id)->orderBy('id', 'desc')->get();
        } else {
            $users = User::orderBy('id', 'desc')->get();
        }
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
        // $validated = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'firstname' => 'required|string|max:255',
        //     'lastname' => 'required|string|max:255',
        //     'username' => 'required|string|unique:users,username|max:255',
        //     'address' => 'required',
        //     'city' => 'required|string|max:255',
        //     'pincode' => 'required|string|max:10',
        //     'aadhar_card' => ['required', 'regex:/^\d{12}$/', 'unique:customers,aadhar_card'], // Aadhar Card validation
        //     'pan_card' => ['required', 'regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/', 'unique:customers,pan_card'], // PAN Card validation
        //     'email' => 'required|email|unique:users,email',
        //     'gst_number' => 'nullable|string|unique:customers,gst_number',
        //     'birthdate' => 'required|date',
        //     'anniversary_date' => 'nullable|date',
        //     'mobile_number' => ['required', 'regex:/^[7-9][0-9]{9}$/', 'unique:customers,mobile_number'],
        //     'password' => 'required|string|min:8',
        // ]);

        // if ($validated->fails()) {
        //     dd($validated->errors());
        //     return redirect()->back()->withErrors($validated)->withInput();
        // }
        //        dd($request);
        User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'mobile' => $request->mobile_number,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'dob' => $request->birthdate,
            'pan_card' => $request->pan_card,
            'aadhar_card' => $request->aadhar_card,
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'pincode' => $request->pincode,
            'gst_number' => $request->gst_number ?? null,
            'anniversary_date' => $request->anniversary_date ?? null,
            'user_type' => $request->user_type ?? 'private',
            'role' => $request->role ?? 'user',
        ]);


        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $documentDataArray = Document::where('user_id', $user->id)->get();
        $loggedInUserId = '1';
        $payments = Payment::where('user_id', $user->id)->get();
        // dd($user);
        return view('admin.users.show', compact('user', 'documentDataArray', 'loggedInUserId', 'payments'));
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
        // $validated = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'firstname' => 'required|string|max:255',
        //     'lastname' => 'required|string|max:255',
        //     'username' => 'required|string|unique:users,username|max:255',
        //     'address' => 'required',
        //     'city' => 'required|string|max:255',
        //     'pincode' => 'required|string|max:10',
        //     'aadhar_card' => ['required', 'regex:/^\d{12}$/', 'unique:customers,aadhar_card'], // Aadhar Card validation
        //     'pan_card' => ['required', 'regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/', 'unique:customers,pan_card'], // PAN Card validation
        //     'email' => 'required|email|unique:users,email',
        //     'gst_number' => 'nullable|string|unique:customers,gst_number',
        //     'birthdate' => 'required|date',
        //     'anniversary_date' => 'nullable|date',
        //     'mobile_number' => ['required', 'regex:/^[7-9][0-9]{9}$/', 'unique:customers,mobile_number'],
        //     'password' => 'required|string|min:8',
        // ]);

        // if ($validated->fails()) {
        //     dd($validated->errors());
        //     return redirect()->back()->withErrors($validated)->withInput();
        // }
        //        dd($request);

        $user = User::findOrFail($user);

        // Update user fields
        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'dob' => $request->dob,
            'pan_card' => $request->pan_card,
            'aadhar_card' => $request->aadhar_card,
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'pincode' => $request->pincode,
            'gst_number' => $request->gst_number ?? null,
            'anniversary_date' => $request->anniversary_date ?? null,
            'user_type' => $request->user_type,
            'role' => $request->role,
        ]);

        // Update password only if provided
        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    /**
     * Resmove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }


    public function getDocument($user)
    {
        $userId = $user;
        $documentDataArray = Document::where('user_id', $userId)->get();
        $userData = User::where('id', $userId)->first();
        // dd($userData, $user);
        $loggedInUserId = Auth::user()->id;
        return view('admin.users.document', compact('loggedInUserId', 'userId', 'userData', 'documentDataArray'));
    }

    public function uploadDocument(Request $request)
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
            $input['document_image_path'] = $destinationPath . $profileImage;
        }

        Document::create($input);
        return redirect()->route('users.document', $request->user_id)->with('success', 'User deleted successfully.');
        // return view('admin.users.document',$request->user_id)
        //                 ->with('success','Product created successfully.');
    }
}
