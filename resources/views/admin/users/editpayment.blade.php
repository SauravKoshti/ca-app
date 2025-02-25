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
                                <input type="text" step="0.01" name="discuss_fees" class="form-control amount" value="{{ $payment->discuss_fees }}">
                            </div>
                            <div class="mb-3">
                                <label>Paid Fees:</label>
                                <input type="text" step="0.01" name="paid_fees" class="form-control amount" value="{{ $payment->paid_fees }}">
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
@section('section_script')
<script>
    $(document).ready(function() {
            $(".amount").on("input", function() {
                let value = $(this).val();

                // Remove invalid characters (only allow numbers and a single ".")
                value = value.replace(/[^0-9.]/g, "");

                // Allow only one decimal point
                let parts = value.split(".");
                if (parts.length > 2) {
                    value = parts[0] + "." + parts.slice(1).join(""); // Keep only first decimal
                }

                // Limit to two decimal places if decimal exists
                if (parts.length === 2 && parts[1].length > 2) {
                    value = parts[0] + "." + parts[1].substring(0, 2);
                }

                $(this).val(value);
            });

            $(".amount").on("blur", function() {
                let value = $(this).val();

                if (value !== "" && !value.includes(".")) {
                    $(this).val(value + ".00"); // Add .00 if decimal is missing
                } else if (value.includes(".")) {
                    let parts = value.split(".");
                    if (parts[1].length === 0) {
                        $(this).val(value + "00"); // If only "." exists, add "00"
                    } else if (parts[1].length === 1) {
                        $(this).val(value + "0"); // If only one decimal digit, add "0"
                    }
                }
            });
        });
    </script>
@endsection