<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('user')->get();
        return view('payments.index', compact('payments'));
    }

    public function create($user)
    {
        return view('admin.users.createpayment', compact('user'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'payament_mode' => 'required',
            'discuss_fees' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
        ]);

        Payment::create($request->all());

        return redirect()->route('users.show', $request->user_id)->with('success', 'Payment added successfully.');
    }

    public function edit(Payment $payment)
    {
        return view('admin.users.editpayment', compact('payment'));
    }

    public function update(Request $request, $id)
    {
        // Find the payment by ID
        $payment = Payment::findOrFail($id);
    
        // Validate and update the payment
        $payment->update([
            'discuss_fees' => $request->input('discuss_fees'),
            'paid_fees' => $request->input('paid_fees')
        ]);
    
        // Redirect back with success message
        return redirect()->route('users.index')->with('success', 'Payment updated successfully!');
    }
    

    
    public function destroy(Request $request)
    {
        Payment::where('id', $request->id)->delete();
        return redirect()->route('users.show', $request->user_id)->with('success', 'Document deleted successfully.');
    }
    
}
