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
            {{-- <div class="col-md-3">
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Vertical Tabs -->
                            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                                    aria-selected="true">Home</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col">
                <!-- Tab Content -->
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                        <h3>Home</h3>
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
                                                <label>Discuss Fees:</label>
                                                <input type="number" step="0.01" name="discuss_fees" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label>Paid Fees:</label>
                                                <input type="number" step="0.01" name="paid_fees" class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label>Payment Data Fees:</label>
                                                <input type="date" name="payment_date" class="form-control">
                                            </div>
                                            <input type="hidden" name="user_id" class="form-control" value="{{ $user }}">
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