@extends('users.layouts.app')
@section('title', 'Contact-Us')
@section('content')
<div class="main-panel">
    <div class="container contact-container">
        <div class="page-inner">
            <h2 class="fw-bold text-center mb-4 text-dark">Get in Touch</h2>

            <div class="row">
                <!-- Contact Information -->
                <div class="col-md-6">
                    <div class="card contact-card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa fa-map-marker text-primary"></i> Our Contact Info</h5>
                            <p class="card-text">Reach out to us via any of the following methods:</p>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-map-pin text-danger"></i> <strong>Address:</strong> 123 Main Street, City, Country</li>
                                <li><i class="fa fa-phone text-success"></i> <strong>Phone:</strong> +123 456 7890</li>
                                <li><i class="fa fa-envelope text-warning"></i> <strong>Email:</strong> info@example.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Contact Form -->

                <div class="col-md-6">
                    <div class="card contact-card-form">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa fa-envelope-open text-primary"></i> Send Us a Message</h5>
                            <form>
                                <div class="form-group">
                                    <label for="name"><i class="fa fa-user text-primary"></i> Name</label>
                                    <input type="text" id="name" class="form-control" placeholder="Your Name">
                                </div>
                                <div class="form-group">
                                    <label for="email"><i class="fa fa-envelope text-primary"></i> Email</label>
                                    <input type="email" id="email" class="form-control" placeholder="Your Email">
                                </div>
                                <div class="form-group">
                                    <label for="message"><i class="fa fa-comment text-primary"></i> Message</label>
                                    <textarea id="message" class="form-control" rows="4" placeholder="Your Message"></textarea>
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
