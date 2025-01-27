@extends('users.layouts.app')
@section('title', 'Contact-Us')
@section('content')
<div class="main-panel">
    <div class="container">
        <div class="page-inner mt-4">
            <h2 class="fw-bold text-center mb-4 text-dark">Contact Us</h2>
            <div class="row">
                <!-- Contact Details -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5>Our Contact Information</h5>
                            <p>Feel free to reach out to us via any of the following methods:</p>
                            <ul class="list-unstyled">
                                <li><strong>Address:</strong> 123 Main Street, City, Country</li>
                                <li><strong>Phone:</strong> +123 456 7890</li>
                                <li><strong>Email:</strong> info@example.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Contact Form -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5>Send Us a Message</h5>
                            <form>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" placeholder="Your Name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control" placeholder="Your Email">
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea id="message" class="form-control" rows="4"
                                        placeholder="Your Message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection