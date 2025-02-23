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
            'user_type' => 'required|in:business,private,admin',
            'username' => 'required|string|max:255|unique:users,username',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'pincode' => 'required|digits:6',
            'aadhar_card' => 'required|digits:12|unique:users,aadhar_card',
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

        // Handle file upload
        if ($request->hasFile('profile_image')) {
            $profilePath = $request->file('profile_image')->store('profiles', 'public');
        } else {
            $profilePath = null;
        }

        // Save the user
        $referUser = User::where('username', $request['refer'])->first();
        $referUserId = $referUser ? $referUser->id : null;
        $path = $request->profile_image;
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
            'full_name' => $request['full_name'],
            'profile_image' => $path,
            'address' => $request['address'],
            'city' => $request['city'],
            'pincode' => $request['pincode'],
            'aadhar_card' => $request['aadhar_card'],
            'pan_card' => $request['pan_card'],
            'dob' => $request['dob'],
            'mobile' => $request['mobile'],
            'anniversary_date' => $request['anniversary_date'] ?? null,
            'profile_image' => $profilePath,
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'gst_number' => $request['gst_number'] ?? null,
            'father_full_name' => $request['father_full_name'],
            'business_name' => $request['business_name'] ?? null,
            'gender' => $request['gender'],
            'refer' => $referUserId,
        ]);
        // ]);
        // dd($user);
//         Mail::raw("
// Dear {$user->first_name},  

// Welcome to **[Company Name]**! 🎉  

// Your registration was successful, and we’re excited to have you onboard. Here are your login details:  

// 👤 **Username:** {$user->username}  
// 📧 **Email:** {$user->email}  

// You can now log in and start exploring. If you have any questions, feel free to contact us.  

// Enjoy your journey with us! 🚀  

// Best Regards,  
// [Company Name]  
// [Company Email]  
// [Company Website]  
// ", function ($message) use ($user) {
//             $message->to($user->email)
//                 ->subject('🎉 Welcome to [Company Name], ' . $user->first_name . '!');
//         });
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
            session()->flash('success', 'Login successful! Welcome back.');
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