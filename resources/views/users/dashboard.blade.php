@extends('users.layouts.app')
@section('title', 'Login')
@section('content')
<section class="banner-sec">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active"> <img src="{{ asset('assets/user/images/banner1.jpg')}}" alt="banner1"> </div>
            <div class="item"> <img src="{{ asset('assets/user/images/banner2.jpg')}}" alt="banner2"> </div>
            <div class="item"> <img src="{{ asset('assets/user/images/banner3.jpg')}}" alt="banner3"> </div>
            <div class="item"> <img src="{{ asset('assets/user/images/banner4.jpg')}}" alt="banner4"> </div>
            <div class="item"> <img src="{{ asset('assets/user/images/banner5.jpg')}}" alt="banner5"> </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev"> <span
                class="glyphicon glyphicon-chevron-left"></span> <span class="sr-only">Previous</span> </a> <a
            class="right carousel-control" href="#myCarousel" data-slide="next"> <span
                class="glyphicon glyphicon-chevron-right"></span> <span class="sr-only">Next</span> </a>
    </div>
</section>
<section class="hm-services-sec">
    <div class="container">
        <h2>Our <span>Services</span></h2>
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="services-box-item"> <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <line class="top" x1="0" y1="0" x2="900" y2="0"></line>
                        <line class="left" x1="0" y1="100%" x2="0" y2="-920"></line>
                        <line class="bottom" x1="100%" y1="100%" x2="-600" y2="100%"></line>
                        <line class="right" x1="100%" y1="0" x2="100%" y2="1380"></line>
                    </svg>
                    <div class="icons"><img src="{{ asset('assets/user/images/mutual_fund.png') }}" alt="" title="">
                    </div>
                    <h4>Mutual Fund</h4>
                    <p>A mutual fund is a company that pools money from many investors and invests the money in
                        securities such as stocks, bonds, and short-term debt.</p>
                    <div class="more"><a href={{ route('services') }}>Read More <i class="fa fa-long-arrow-right"></i></a></div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="services-box-item"> <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <line class="top" x1="0" y1="0" x2="900" y2="0"></line>
                        <line class="left" x1="0" y1="100%" x2="0" y2="-920"></line>
                        <line class="bottom" x1="100%" y1="100%" x2="-600" y2="100%"></line>
                        <line class="right" x1="100%" y1="0" x2="100%" y2="1380"></line>
                    </svg>
                    <div class="icons"><img src="{{ asset('assets/user/images/taxation.png')}}" alt="" title=""></div>
                    <h4>Taxation</h4>
                    <p>Taxes are of 4 types: Direct tax, Indirect tax, Business tax, and Property and Sales Tax.</p>
                    <div class="more"><a href={{ route('services') }}>Read More <i class="fa fa-long-arrow-right"></i></a></div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="services-box-item"> <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <line class="top" x1="0" y1="0" x2="900" y2="0"></line>
                        <line class="left" x1="0" y1="100%" x2="0" y2="-920"></line>
                        <line class="bottom" x1="100%" y1="100%" x2="-600" y2="100%"></line>
                        <line class="right" x1="100%" y1="0" x2="100%" y2="1380"></line>
                    </svg>
                    <div class="icons"><img src="{{ asset('assets/user/images/gst.png')}}" alt="" title=""></div>
                    <h4>GST</h4>
                    <p>Goods and Services Rates</p>
                    <div class="more"><a href={{ route('services') }}>Read More <i class="fa fa-long-arrow-right"></i></a></div>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-2">
                <div class="services-box-item"> <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <line class="top" x1="0" y1="0" x2="900" y2="0"></line>
                        <line class="left" x1="0" y1="100%" x2="0" y2="-920"></line>
                        <line class="bottom" x1="100%" y1="100%" x2="-600" y2="100%"></line>
                        <line class="right" x1="100%" y1="0" x2="100%" y2="1380"></line>
                    </svg>
                    <div class="icons"><img src="{{asset('assets/user/images/accounting.png')}}" alt="" title=""></div>
                    <h4>Accounting</h4>
                    <p>Bank Statutory Audits, Concurrent Audits and Stock Audits.</p>
                    <div class="more"><a href={{ route('services') }}>Read More <i class="fa fa-long-arrow-right"></i></a></div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="services-box-item"> <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <line class="top" x1="0" y1="0" x2="900" y2="0"></line>
                        <line class="left" x1="0" y1="100%" x2="0" y2="-920"></line>
                        <line class="bottom" x1="100%" y1="100%" x2="-600" y2="100%"></line>
                        <line class="right" x1="100%" y1="0" x2="100%" y2="1380"></line>
                    </svg>
                    <div class="icons"><img src="{{ asset('assets/user/images/pancard.png')}}" alt="" title=""></div>
                    <h4>Pancard</h4>
                    <p>Permanent Account Number</p>
                    <div class="more"><a href="{{ route('services') }}">Read More <i class="fa fa-long-arrow-right"></i></a></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="https://img.freepik.com/free-vector/night-ocean-landscape-full-moon-stars-shine_107791-7397.jpg" alt="Slide 1">
                <div class="carousel-caption">
                    <h3>First Slide</h3>
                    <p>This is the first slide description.</p>
                </div>
            </div>

            <div class="item">
                <img src="https://via.placeholder.com/800x400" alt="Slide 2">
                <div class="carousel-caption">
                    <h3>Second Slide</h3>
                    <p>This is the second slide description.</p>
                </div>
            </div>

            <div class="item">
                <img src="https://img.freepik.com/free-vector/night-ocean-landscape-full-moon-stars-shine_107791-7397.jpg" alt="Slide 3">
                <div class="carousel-caption">
                    <h3>Third Slide</h3>
                    <p>This is the third slide description.</p>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>

</section>
<style>
    .carousel {
    width: 80%;
    margin: auto;
}

.carousel img {
    width: 100%;
    height: auto;
}

.carousel-caption {
    background: rgba(0, 0, 0, 0.5);
    padding: 15px;
    border-radius: 5px;
}

</style>
@endsection