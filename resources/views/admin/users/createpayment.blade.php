@extends('admin.layout.master')
@section('title', 'Create Payment')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Payment</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ route('admin.index') }}">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="{{route('users.index')}}">Payment</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="">Create Payment</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col">
                <!-- Tab Content -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Create Payment</div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <form action="{{ route('users.payment.store') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label>Paid Fees:</label>
                                                <select id="payament_mode" name="payament_mode" class="form-control">
                                                    <option value="Cash">Cash</option>
                                                    <option value="Online">Online</option>
                                                </select>
                                                @error('payament_mode') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label>Discuss Fees:</label>
                                                <input type="text" step="0.01" name="discuss_fees"
                                                    class="form-control amount">
                                                @error('discuss_fees') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label>Paid Fees:</label>
                                                <input type="text" step="0.01" name="paid_fees" class="form-control amount">
                                            </div>

                                            <div class="mb-3">
                                                <label>Payment Date Fees:</label>
                                                <input name="payment_date" class="form-control datepicker">
                                                @error('payment_date') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <input type="hidden" name="user_id" class="form-control"
                                                value="{{ $user }}">
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
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