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
                                                <input type="number" step="0.01" name="discuss_fees"
                                                    class="form-control">
                                                @error('discuss_fees') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label>Paid Fees:</label>
                                                <input type="number" step="0.01" name="paid_fees" class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label>Payment Date Fees:</label>
                                                <input type="date" name="payment_date" class="form-control">
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