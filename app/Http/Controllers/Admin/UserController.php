<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Document;
use App\Models\Payment;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\Rule;
use PDF;

class UserController extends Controller
{
   
    public function index()
    {
        $login_user = Auth::user();
        if ($login_user->user_type == 'personal' || $login_user->user_type == 'gst') {
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
            'father_full_name' => 'required|string|max:255',
            'gender' => 'required|boolean',
            'refer' => 'nullable|string|max:255',
        ]);
        if ($request['user_type'] === 'gst') {
            $request->validate([
                // 'gst_number' => ['required', 'regex:/^[0-3][0-9][A-Z]{5}[0-9]{4}[A-Z][0-9A-Z]Z[0-9A-Z]$/', 'unique:users,gst_number'],
                'gst_number' => ['required', 'unique:users,gst_number'],
                'company_name' => 'required|string|max:255',
            ]);
        }
        if ($request->hasFile('profile_image')) {
            $profilePath = $request->file('profile_image')->store('profiles', 'public');
        } else {
            $profilePath = null;
        }
        // $referUser = User::where('username', $request['refer'])->first();
        // $referUserId = $referUser ? $referUser->id : $request['refer'];

        $path = '';
        if ($image = $request->file('profile_image')) {
            $destinationPath = 'profiles/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $path = $destinationPath . $profileImage;
            // dd($path);
        }
        // dd($request->all());
        $user = User::create([
            'user_type' => $request['user_type'],
            'username' => $request['username'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'middle_name' => $request['middle_name'],
            'user_full_name' => $request['user_full_name'],
            'address' => $request['address'],
            'city' => $request['city'],
            'state' => $request['state'],
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
            'company_name' => $request['company_name'] ?? null,
            'gender' => $request['gender'],
            'refer' => $request['refer'],
        ]);
    //    dd($user);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
    public function show(User $user)
    {
        $downloadDocumentArray = Document::leftJoin('users','users.id', '=' ,'documents.uploaded_by')->where('user_type', 'admin')->get();
        $loggedInUserId = Auth::user()->id;
        $documentDataArray = Document::leftJoin('users','users.id', '=' ,'documents.uploaded_by')->where('user_type', 'admin')->get();
        $payments = Payment::where('user_id', $user->id)->latest()->get();
        $referData = User::where('refer', $user->id)->get();
        return view('admin.users.show', compact('user', 'documentDataArray', 'loggedInUserId','downloadDocumentArray', 'payments', 'referData'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'user_type' => ['required', Rule::in(['gst', 'personal', 'admin'])],
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'username')->ignore($id),
            ],
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'user_full_name' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'pincode' => 'required|digits:6',
            'aadhar_card' => [
                'required',
                Rule::unique('users', 'aadhar_card')->ignore($id),
            ],
            'pan_card' => [
                'required',
                'regex:/^[A-Z]{5}[0-9]{4}[A-Z]$/',
                Rule::unique('users', 'pan_card')->ignore($id),
            ],
            'dob' => 'required|date|before:today',
            'mobile' => [
                'required',
                'digits:10',
                Rule::unique('users', 'mobile')->ignore($id),
            ],
            'anniversary_date' => 'nullable|date',
            'profile' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($id),
            ],
            'father_full_name' => 'required|string|max:255',
            'gender' => 'required|boolean',
            'refer' => 'nullable|string|max:255',
        ]);

        if ($request->user_type === 'gst') {
            $request->validate([
                'gst_number' => [
                    'required',
                    // 'regex:/^[0-3][0-9][A-Z]{5}[0-9]{4}[A-Z][0-9A-Z]Z[0-9A-Z]$/',
                    Rule::unique('users', 'gst_number')->ignore($id),
                ],
                'com' => 'required|string|max:255',
            ]);
        }
        // $referUser = User::where('username', $request['refer'])->first();
        // $referUserId = $referUser ? $referUser->id : $request['refer'];
        $user = User::findOrFail($id);
        $path = $user->profile_image;
        if ($image = $request->file('profile_image')) {
            $destinationPath = 'profiles/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $path = $destinationPath . $profileImage;
        }
        // Update user fields
        $user->update([
            'user_type'        => $request->user_type,
            'username'         => $request->username,
            'first_name'       => $request->first_name,
            'last_name'        => $request->last_name,
            'middle_name'      => $request->middle_name,
            'user_full_name'   => $request->user_full_name,
            'profile_image'    => $path,
            'address'          => $request->address,
            'city'             => $request->city,
            'state'            => $request->state,
            'pincode'          => $request->pincode,
            'aadhar_card'      => $request->aadhar_card,
            'pan_card'         => $request->pan_card,
            'dob'              => $request->dob,
            'mobile'           => $request->mobile,
            'anniversary_date' => $request->anniversary_date ?? null,
            'email'            => $request->email,
            'gst_number'       => $request->gst_number ?? null,
            'father_full_name' => $request->father_full_name,
            'company_name'    => $request->company_name ?? null,
            'gender'           => $request->gender,
            'refer'            => $request->refer,
        ]);
        
        // dd($user);
        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function getDocument($user)
    {
        $userId = $user;
        $documentDataArray = Document::where('user_id', $userId)->latest()->get();
        $userData = User::where('id', $userId)->first();
        $loggedInUserId = Auth::user()->id;
        return view('admin.users.document', compact('loggedInUserId', 'userId', 'userData', 'documentDataArray'));
    }

    public function showForgotUsernameForm()
    {
        return view('users.auth.forgot-username');
    }

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

    public function showForgotPasswordForm()
    {
        return view('users.auth.forgot-password');
    }

    public function sendPasswordResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('email', $request->email)->firstOrFail();

        $user->update([
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect()->route('login')->with('success', 'Password has been updated successfully.');
    }

    public function downloadSelectedUsers(Request $request)
    {
        $userQuery = User::query();

        if ($request->is_select_all && $request->is_select_all !== 'false') {
            // Fetch all matching users
            $users = $userQuery->get();
        } else {
            // Fetch only selected users
            $users = $userQuery->whereIn('id', $request->user_ids)->get();
        }

        // payment data
        $user_id_array = $users->pluck('id')->toArray();
        $payment_year = Payment::whereNotNull('financial_year')->whereIn('user_id', $user_id_array)->orderBy('financial_year')->pluck('financial_year')->unique()->toArray();
        $payment_data = Payment::whereNotNull('financial_year')->whereIn('user_id', $user_id_array)->get();

        return Excel::download(new UsersExport($users, $payment_year, $payment_data), 'users.xlsx');
    }

   
    public function downloadSelectedUsersPdf(Request $request)
    {
        $userIds = $request->user_ids;

        if ($request->is_select_all && $request->is_select_all !== 'false') {
            $users = User::all();
        } else {
            $users = User::whereIn('id', $userIds)->get();
        }
    
        $pdf = PDF::loadView('exports.users_pdf', compact('users'));
        return $pdf->download('users.pdf');
    }


    public function confirmPassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'id' => 'nullable',
        ]);

        if (Hash::check($request->password, Auth::user()->password)) {
            $message = 'Password matched';
            if ($request->action != 'edit') {
                switch ($request->type) {
                    case 'user':
                        User::where('id', $request->id)->delete();
                        $message = 'User deleted successfully';
                        break;
                    case 'payment':
                        Payment::where('id', $request->id)->delete();
                        $message = 'Payment deleted successfully';
                        break;
                    case 'group':
                        User::where('group_id', $request->id)->update(['group_id' => null]);
                        Group::where('id', $request->id)->delete();
                        $message = 'Group deleted successfully';
                        break;
                }
            }
            return response()->json(['success' => true, 'message' => $message]);
        } else {
            return response()->json(['success' => false, 'message' => 'Password does not match']);
        }
    }
}