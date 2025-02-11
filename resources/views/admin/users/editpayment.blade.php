@extends('admin.layout.master')

@section('title', 'Edit Payment')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Edit Payment</h3>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Payment</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.payment.update', $payment->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label>Discuss Fees:</label>
                                <input type="number" step="0.01" name="discuss_fees" class="form-control" value="{{ $payment->discuss_fees }}">
                            </div>
                            <div class="mb-3">
                                <label>Paid Fees:</label>
                                <input type="number" step="0.01" name="paid_fees" class="form-control" value="{{ $payment->paid_fees }}">
                            </div>
                            <button type="submit" class="btn btn-success">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection