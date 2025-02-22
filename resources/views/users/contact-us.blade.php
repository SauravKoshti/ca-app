@extends('users.layouts.app')
@section('title', 'Contact Us')
@section('content')
<div class="main-panel">
    <div class="container contact-container">
        <div class="page-inner">
            <h2 class="fw-bold text-center mb-4 text-dark">Get in Touch</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="card contact-card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa fa-map-marker text-primary"></i> Our Contact Info</h5>
                            <p class="card-text">Reach out to us via any of the following methods:</p>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-map-pin text-danger"></i> <strong>Address:</strong> Station Rd, opp.
                                    Bhagvatsinhji High School, Venkateshwara Nagar, Dhoraji, Gujarat 360410</li>
                                <li><i class="fa fa-phone text-success"></i> <strong>Phone:</strong> +99740 25198</li>
                                <li><i class="fa fa-envelope text-warning"></i> <strong>Email:</strong>
                                    vishaljagani403@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card contact-card-form">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa fa-envelope-open text-primary"></i> Send Us a Message
                            </h5>
                            <form action="{{ route('contacts.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name"><i class="fa fa-user text-primary"></i> Name</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Your Name">
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email"><i class="fa fa-envelope text-primary"></i> Email</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        placeholder="Your Email">
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="mobile"><i class="fa fa-user text-primary"></i> Phone Number</label>
                                    <input type="text" id="mobile" name="mobile" class="form-control"
                                        placeholder="Your number">
                                </div>
                                <div class="form-group">
                                    <label for="message"><i class="fa fa-comment text-primary"></i> Message</label>
                                    <textarea id="message" name="message" class="form-control" rows="4"
                                        placeholder="Your Message"></textarea>
                                    @if ($errors->has('message'))
                                    <span class="text-danger">{{ $errors->first('message') }}</span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary btn-block mt-3">
                                    <i class="fa fa-paper-plane"></i> Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection