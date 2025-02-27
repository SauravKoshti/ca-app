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
            <div class="container contact-container-info">
                <div class="row text-center">
                    <!-- Call Now Card -->
                    <div class="col-md-4">
                        <div class="contact-card">
                            <div class="icon-container">
                                <i class="glyphicon glyphicon-earphone"></i>
                            </div>
                            <div class="contact-info">
                                <h5>Call Now</h5>
                                <a href="tel:+918200267836">+91 8200267836</a>
                            </div>
                        </div>
                    </div>

                    <!-- Email Now Card -->
                    <div class="col-md-4">
                        <div class="contact-card">
                            <div class="icon-container icon-email">
                                <i class="glyphicon glyphicon-envelope"></i>
                            </div>
                            <div class="contact-info">
                                <h5>Email Now</h5>
                                <a href="mailto:vbjagani403@gmail.com">vbjagani403@gmail.com</a>
                            </div>
                        </div>
                    </div>

                    <!-- Visit Now Card -->
                    <div class="col-md-4">
                        <div class="contact-card">
                            <div class="icon-container icon-location">
                                <i class="glyphicon glyphicon-map-marker"></i>
                            </div>
                            <div class="contact-info">
                                <h5>Visit Now</h5>
                                <p style="margin: 0;">
                                    Station Rd, opp. Bhagvatsinhji High School, Venkateshwara Nagar, Dhoraji, Gujarat
                                    360410
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!-- <h3>Location:</h3> -->
                    <div class="map-container">
                        <iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                            src="https://maps.google.com/maps?hl=en&amp;q=vishal%20b%20jagani&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                        </iframe>
                    </div>
                    <!-- <div class="map-container-data">
                    <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=vishal b jagani&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://sprunkin.com/">Sprunki Phases</a></div><style>.mapouter{position:relative;text-align:right;width:600px;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:600px;height:400px;}.gmap_iframe {width:600px!important;height:400px!important;}</style></div> -->
                    <!-- <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345093706!2d144.95373631531598!3d-37.81627977975179!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d5df1df5f1f%3A0x5045675218ce6e0!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sin!4v1638932608698!5m2!1sen!2sin"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe> -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
<style>
    .map-container {
    position: relative;
    width: 100%;
    padding-top: 56.25%; /* 16:9 Aspect Ratio */
    overflow: hidden;
    margin-bottom: 10px;
}

.gmap_iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
}
</style>