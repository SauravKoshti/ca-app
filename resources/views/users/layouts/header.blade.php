<header>
    <div class="top-bar">
      <div class="container">
        <div class="container-inner">
          <div class="row">
            <div class="col-md-6 dt-sc-contact-number"> <a href="tel:01414072000"> <span class="fa fa-phone"></span>99740 25198</a> <a href="mailto:caportal@sagipl.com"> <span class="fa fa-envelope-o"></span> vishaljagani403@gmail.com</a> </div>
            <div class="col-md-6">
              <ul class="dt-sc-social-icons">
                <li><a title="Facebook" href="#" target="_blank"><span class="fa fa-facebook"></span></a></li>
                <li><a title="Twitter" href="#" target="_blank"><span class="fa fa-twitter"></span></a></li>
                <li><a title="Youtube" href="#" target="_blank"><span class="fa fa-youtube"></span></a></li>
                <li><a title="Linkedin" href="#" target="_blank"><span class="fa fa-linkedin"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav class="navbar navbar-inverse">
      <div class="navbar-header">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              <a class="navbar-brand" href="#"><img src="{{ asset('assets/user/images/logo.png') }}" alt="logo" /></a> </div>
            <div class="info col-md-6">
              <ul>
                <li><img src="{{ asset('assets/user/images/time.png') }}">
                  <p> <span class="heading">Contact Time</span> <span>Mon-Sat: 09.00AM -7:30PM</span> </p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-collapse collapse" id="myNavbar" aria-expanded="false" style="height: 1px;">
        <div class="container">
          <ul class="nav navbar-nav">
            <li><a href="">Home</a></li>
            <li><a href="{{ route('services') }}">Services</a></li>
            <li><a href="{{ route('about-us') }}">About Us</a></li>
            <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Registration</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
