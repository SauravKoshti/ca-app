<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

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
            'username' => $request['username'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'father_full_name' => $request['father_full_name'],
            'name' => $request['name'],
            'address' => $request['address'],
            'city' => $request['city'],
            'pincode' => $request['pincode'],
            'aadhar_card' => $request['aadhar_card'],
            'pan_card' => $request['pan_card'],
            'email' => $request['email'],
            'gst_number' => $request['gst_number'] ?? null,
            'anniversary_date' => $request['anniversary_date'] ?? null,
            'mobile' => $request['mobile'],
            'dob' => $request['dob'],
            'gender' => $request['gender'],
            // 'user_type' => $request['user_type'],
            'role' => $request['role'], // Default role
            'password' => Hash::make($request['password']),
        ]);
        // dd($user);
        Mail::raw("
Dear {$user->first_name},  

Welcome to **[Company Name]**! 🎉  

Your registration was successful, and we’re excited to have you onboard. Here are your login details:  

👤 **Username:** {$user->username}  
📧 **Email:** {$user->email}  

You can now log in and start exploring. If you have any questions, feel free to contact us.  

Enjoy your journey with us! 🚀  

Best Regards,  
[Company Name]  
[Company Email]  
[Company Website]  
", function ($message) use ($user) {
            $message->to($user->email)
                ->subject('🎉 Welcome to [Company Name], ' . $user->first_name . '!');
        });
        return redirect('login')->with('success', 'Registration successful!');
    }


    // Handle login logic
    public function login(Request $request)
    {
        // Validate the input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
     
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