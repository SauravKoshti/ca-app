<header>
    <div class="top-bar">
      <div class="container">
        <div class="container-inner">
          <div class="row">
            <div class="col-md-6 dt-sc-contact-number"> <a href="tel:8200267836"> <span class="fa fa-phone"></span>82002 67836</a> <a href="mailto:vbjagani403@gmail.com"> <span class="fa fa-envelope-o"></span> vbjagani403@gmail.com</a> </div>
            <div class="col-md-6">
              <ul class="dt-sc-social-icons">
                <li><a title="Facebook" href="#" target="_blank"><span class="fa fa-facebook"></span></a></li>
                <li><a title="Whatsapp" href="https://wa.me/8200267836" target="_blank"><span class="fa fa-whatsapp"></span></a></li>
                <li><a title="Instagram" href="#" target="_blank"><span class="fa fa-instagram"></span></a></li>
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
                  <p> <span class="heading">Contact Time</span> <span>Mon-Sat: 09.00AM - 07:30PM</span> </p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-collapse collapse" id="myNavbar" aria-expanded="false" style="height: 1px;">
        <div class="container">
          <ul class="nav navbar-nav">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="dropdown"> <a href="{{ route('services') }}" class="dropdown-toggle" data-toggle="dropdown">Services</a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('services.mutualfunds') }}">Mutualfund</a></li>
              <li><a href="{{ route('services.taxation') }}">Taxation</a></li>
              <li><a href="{{ route('services.gst') }}">Gst</a></li>
              <li><a href="{{ route('services.accounting') }}">Accounting</a></li>
              <li><a href="{{ route('services.pancard') }}">Pancard</a></li>
            </ul>
          </li>
            <li><a href="{{ route('about-us') }}">About Us</a></li>
            <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
            @if(auth()->check())
              <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
              <li><a href="{{ route('logout') }}">Logout</a></li>
            @else
              <li><a href="{{ route('login') }}">Login</a></li>
              <li><a href="{{ route('register') }}">Registration</a></li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
  </header>
