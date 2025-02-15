<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        $userTotal = User::get()->count();
        $groupTotal = Group::get()->count();
        $newUsers = User::latest()->take(10)->get();
        $inquiry = Contact::get()->count();
        return view('admin.dashboard', compact('userTotal', 'groupTotal','newUsers','inquiry'));
    }

    public function showLoginForm()
    {
        return view('users.auth.login');
    }

    public function registration()
    {
        return view('users.auth.registration');
    }


    public function register(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users,username',
                'father_full_name' => 'required|string|max:255',
                'address' => 'required|string',
                'city' => 'required|string|max:255',
                'pincode' => 'required|digits:6',
                'aadhar_card' => 'required|digits:12|unique:users,aadhar_card',
                'pan_card' => ['required', 'regex:/^[A-Z]{5}[0-9]{4}[A-Z]$/', 'unique:users,pan_card'],
                'email' => 'required|email|max:255|unique:users,email',
                'gst_number' => ['nullable', 'regex:/^[0-3][0-9][A-Z]{5}[0-9]{4}[A-Z][0-9A-Z]Z[0-9A-Z]$/', 'unique:users,gst_number'],
                'anniversary_date' => 'nullable|date',
                'mobile' => 'required|digits:10|unique:users,mobile',
                'dob' => 'required|date|before:today',
                'gender' => 'required|boolean',
                'user_type' => 'required|in:business,private,admin',
                'password' => 'required|string|min:8'
]);

        // Check for validation errors
        // if ($validatedData->fails()) {
        //     return redirect()->back()->withErrors($validatedData)->withInput();
        // }
        // dd($request->all());
        // Save the user
        $user = User::create([
            'username' => $validatedData['username'],
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'father_full_name' => $validatedData['father_full_name'],
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
            'city' => $validatedData['city'],
            'pincode' => $validatedData['pincode'],
            'aadhar_card' => $validatedData['aadhar_card'],
            'pan_card' => $validatedData['pan_card'],
            'email' => $validatedData['email'],
            'gst_number' => $validatedData['gst_number'] ?? null,
            'anniversary_date' => $validatedData['anniversary_date'] ?? null,
            'mobile' => $validatedData['mobile'],
            'dob' => $validatedData['dob'],
            'gender' => $validatedData['gender'],
            'user_type' => $validatedData['user_type'],
            'role' => $validatedData['role'], // Default role
            'password' => Hash::make($validatedData['password']),
        ]);
        // dd($user);
        return redirect('login')->with('success', 'Registration successful!');
    }


    // Handle login logic
    public function login(Request $request)
    {
        // dd($request);
        // Validate the input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        // dd($request);
        
        // Attempt to log the user in
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->user_type === 'admin') {
                return redirect('dashboard');
            }
            return redirect('/');
        }

        // Return with an error if login fails
        return back()->withErrors(['username' => 'Invalid credentials'])->withInput();
    }

    // Handle logout logic
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}