<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Payment;

class AuthController extends Controller
{
    public function index()
    {
        $userLoggedIn = Auth::user();
        $userTotal = User::get()->count();
        $groupTotal = Group::get()->count();
        $newUsers = User::latest()->take(10)->get();
        $paymentData = Payment::latest()->take(10)->get();
        $inquiry = Contact::get()->count();
        return view('admin.dashboard', compact('userLoggedIn','userTotal', 'groupTotal', 'newUsers', 'paymentData','inquiry'));
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
            'user_type' => 'required|in:gst,personal,admin',
            'username' => 'required|string|max:255|unique:users,username',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'user_full_name' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'pincode' => 'required|digits:6',
            'aadhar_card' => 'required|unique:users,aadhar_card',
            'pan_card' => ['required', 'regex:/^[A-Z]{5}[0-9]{4}[A-Z]$/', 'unique:users,pan_card'],
            'dob' => 'required|date|before:today',
            'mobile' => 'required|digits:10|unique:users,mobile',
            'anniversary_date' => 'nullable|date',
            'profile' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'gst_number' => ['nullable', 'regex:/^[0-3][0-9][A-Z]{5}[0-9]{4}[A-Z][0-9A-Z]Z[0-9A-Z]$/', 'unique:users,gst_number'],
            'father_full_name' => 'required|string|max:255',
            'business_name' => 'nullable|string|max:255',
            'gender' => 'required|boolean',
            'refer' => 'nullable|string|max:255',
        ]);
        if ($request['user_type'] === 'gst') {
            $request->validate([
                'gst_number' => ['required', 'regex:/^[0-3][0-9][A-Z]{5}[0-9]{4}[A-Z][0-9A-Z]Z[0-9A-Z]$/', 'unique:users,gst_number'],
                'business_name' => 'required|string|max:255',
            ]);
        }
        if ($request->hasFile('profile_image')) {
            $profilePath = $request->file('profile_image')->store('profiles', 'public');
        } else {
            $profilePath = null;
        }

        $referUser = User::where('username', $request['refer'])->first();
        $referUserId = $referUser ? $referUser->id : null;
        $path = '';
        if ($image = $request->file('profile_image')) {
            $destinationPath = 'profiles/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $path = $destinationPath . $profileImage;
        }
        $user = User::create([
            'user_type' => $request['user_type'],
            'username' => $request['username'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'middle_name' => $request['middle_name'],
            'full_name' => $request['full_name'],
            'address' => $request['address'],
            'city' => $request['city'],
            'pincode' => $request['pincode'],
            'aadhar_card' => $request['aadhar_card'],
            'pan_card' => $request['pan_card'],
            'dob' => $request['dob'],
            'mobile' => $request['mobile'],
            'anniversary_date' => $request['anniversary_date'] ?? null,
            'profile_image' => $path,
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'gst_number' => $request['gst_number'] ?? null,
            'father_full_name' => $request['father_full_name'],
            'business_name' => $request['business_name'] ?? null,
            'gender' => $request['gender'],
            'refer' => $referUserId,
        ]);
       
        return redirect('login')->with('success', 'Registration successful!');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            $user = Auth::user();
            session()->flash('success', 'Login successful! Welcome back.');
            if ($user->user_type === 'admin') {
                return redirect('dashboard');
            }
            return redirect('/');
        }
        return back()->withErrors(['username' => 'Invalid credentials'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}