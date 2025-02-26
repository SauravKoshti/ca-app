<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\Document;
use App\Models\Payment;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $login_user = Auth::user();
        if ($login_user->role == 'user') {
            $users = collect();
            if ($login_user->group_id) {
                $users = User::where('group_id', $login_user->group_id)->orderBy('id', 'desc')->get();
            }
            $singleUser = User::where('id', $login_user->id)->orderBy('id', 'desc')->get();
            $users = $users->merge($singleUser)->unique('id');
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
        // Store file
        $path = '';
        if ($image = $request->file('document_image_path')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $path = $destinationPath . $profileImage;
        }
        User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'mobile' => $request->mobile_number,
            'company_name' => $request->company_name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'dob' => $request->dob,
            'profile_image' => $path,
            'pan_card' => $request->pan_card,
            'aadhar_card' => $request->aadhar_card,
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'pincode' => $request->pincode,
            'gst_number' => $request->gst_number ?? null,
            'anniversary_date' => $request->anniversary_date ?? null,
            'user_type' => $request->user_type ?? 'personal',
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
        $referData = User::where('refer', $user->id)->get();
        // $referData = '1';
        return view('admin.users.show', compact('user', 'documentDataArray', 'loggedInUserId', 'payments', 'referData'));
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
    public function update(Request $request, $id)
    {
        // dd($request);
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
        //    dd($id,
        //    $request->all());

        $user = User::findOrFail($id);
        // dd($user);
        // Store file
        $path = $user->profile_image;
        if ($image = $request->file('profile_image')) {
            $destinationPath = 'profiles/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $path = $destinationPath . $profileImage;
        }

        // Update user fields
        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'business_name' => $request->business_name,
            'username' => $request->username,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'dob' => $request->dob,
            'profile_image' => $path,
            'pan_card' => $request->pan_card,
            'aadhar_card' => $request->aadhar_card,
            // 'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'pincode' => $request->pincode,
            'gst_number' => $request->gst_number ?? null,
            'anniversary_date' => $request->anniversary_date ?? null,
            // 'user_type' => $request->user_type,
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

    // Show Forgot Username Form
    public function showForgotUsernameForm()
    {
        return view('users.auth.forgot-username');
    }

    // Handle Forgot Username
    public function sendUsername(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            Mail::raw("Your username is: {$user->username}", function ($message) use ($user) {
                $message->to($user->email)->subject('Your Username');
            });
            return redirect()->route('login')->with('success', 'Your username has been sent to your email.');
        }

        return back()->with('error', 'Email not found.');
    }

    // Show Forgot Password Form
    public function showForgotPasswordForm()
    {
        return view('users.auth.forgot-password');
    }

    // Handle Forgot Password
    public function sendPasswordResetLink(Request $request)
    {

        // Validate request
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        // Find user by email
        $user = User::where('email', $request->email)->firstOrFail();

        // Update user fields
        $user->update([
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect()->route('login')->with('success', 'Password has been updated successfully.');
    }

    public function downloadSelectedUsers(Request $request)
    {
        $userIds = $request->input('user_ids', []);

        if (empty($userIds)) {
            return response()->json(['error' => 'No users selected'], 400);
        }

        return Excel::download(new UsersExport($userIds), 'users.xlsx');
    }

    public function confirmPassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'id' => 'required',
        ]);

        if (Hash::check($request->password, Auth::user()->password)) {
            switch($request->type) {
                case 'user':
                    User::where('id', $request->id)->delete();
                    break;
                case 'group':
                    User::where('group_id', $request->id)->update(['group_id' => null]);
                    Group::where('id', $request->id)->delete();
                    break;
            }
            return response()->json(['success' => true, 'message' => 'User deleted successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Password does not match']);
        }
    }
}