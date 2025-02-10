<?php

namespace App\Http\Controllers;

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
        return view('admin.dashboard', compact('userTotal', 'groupTotal','newUsers'));
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
        // $validator = Validator::make($request->all(), [
        //     'username' => 'required|string|unique:users,username',
        //     'firstName' => 'required|string|max:255',
        //     'lastName' => 'required|string|max:255',
        //     'fatherFullName' => 'required|string|max:255',
        //     'dob' => 'required|date',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|min:8|confirmed',
        //     'userType' => 'required|in:business,private',
        //     'gstNumber' => 'nullable|string|required_if:userType,business',
        // ]);

        // Check for validation errors
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        // dd($request->all());
        // Save the user
        $user = User::create([
            'username' => $request->userName,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'father_full_name' => $request->fatherFullName,
            'dob' => $request->dob,
            'email' => $request->email,
            'user_type' => $request->userType,
            'gst_number' => $request->gstNumber,
            'role' => 'user', // Default role
            'password' => Hash::make($request->password),
        ]);
        // dd($user);
        return redirect('login')->with('success', 'Registration successful!');
    }


    // Handle login logic
    public function login(Request $request)
    {
        // dd($request);
        // Validate the input
        // $request->validate([
        //     'username' => 'required|userName',
        //     'password' => 'required',
        // ]);
        // Attempt to log the user in
        if (Auth::attempt(['username' => $request->userName, 'password' => $request->password])) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->user_type === 'admin') {
                return redirect('dashboard');
            }
            return redirect('/');
        }

        // Return with an error if login fails
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
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
