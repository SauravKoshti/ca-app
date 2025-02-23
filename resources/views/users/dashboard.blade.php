@extends('users.layouts.app')
@section('title', 'Home')
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
            <div class="item active"> <img src="{{ asset('assets/user/images/custom-banner-1.JPG')}}" alt="banner1"> </div>
            <div class="item"> <img src="{{ asset('assets/user/images/custom-banner-2.JPG')}}" alt="banner2"> </div>
            <div class="item"> <img src="{{ asset('assets/user/images/custom-banner-3.JPG')}}" alt="banner3"> </div>
            <div class="item"> <img src="{{ asset('assets/user/images/custom-banner-4.JPG')}}" alt="banner4"> </div>
            <div class="item"> <img src="{{ asset('assets/user/images/custom-banner-5.JPG')}}" alt="banner5"> </div>
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
                    <div class="more"><a href={{ route('services') }}>Read More <i
                                class="fa fa-long-arrow-right"></i></a></div>
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
                    <div class="more"><a href={{ route('services') }}>Read More <i
                                class="fa fa-long-arrow-right"></i></a></div>
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
                    <div class="more"><a href={{ route('services') }}>Read More <i
                                class="fa fa-long-arrow-right"></i></a></div>
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
                    <div class="more"><a href={{ route('services') }}>Read More <i
                                class="fa fa-long-arrow-right"></i></a></div>
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
                    <div class="more"><a href="{{ route('services') }}">Read More <i
                                class="fa fa-long-arrow-right"></i></a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <h2>Achieve<span>ment</span></h2>
        <div class="row">
            <div class="col-md-12">
                <div id="news-slider" class="owl-carousel">
                    <div class="post-slide">
                        <div class="post-img">
                            <img src="{{ asset('assets/user/images/achievement-1.jpeg')}}" alt="achievement-1">
                        </div>
                    </div>

                    <div class="post-slide">
                        <div class="post-img">
                            <img src="{{ asset('assets/user/images/achievement-2.jpeg')}}" alt="achievement-2">
                        </div>
                    </div>

                    <div class="post-slide">
                        <div class="post-img">
                            <img src="{{ asset('assets/user/images/achievement-3.jpeg')}}" alt="achievement-3">
                        </div>
                    </div>

                    <div class="post-slide">
                        <div class="post-img">
                            <img src="{{ asset('assets/user/images/achievement-4.jpeg')}}" alt="achievement-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>

</section>
<style>
/* Prevent horizontal scrolling */
html,
body {
    /* overflow-x: hidden !important; */
    width: 100%;
}

/* Main Carousel Wrapper */
#news-slider {
    max-width: 100%;
    overflow: hidden;
    position: relative;
    padding: 20px 0;
}

/* Post Slide Styles */
.post-slide {
    background: #fff;
    margin: 20px 15px;
    border-radius: 15px;
    padding-top: 1px;
    box-shadow: 0px 14px 22px -9px #bbcbd8;
    text-align: center;
}

.post-slide .post-img {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    margin: -12px 15px 8px;
}

.post-slide .post-img img {
    width: 100%;
    height: auto;
    transform: scale(1);
    transition: transform 0.3s ease-in-out;
}

.post-slide:hover .post-img img {
    transform: scale(1.1);
}

/* Owl Carousel Core Fixes */
.owl-carousel {
    overflow: hidden;
    position: relative;
}

.owl-stage-outer {
    overflow: hidden;
}

.owl-stage {
    display: flex;
    align-items: center;
}

/* Navigation Buttons */
.owl-nav {
    position: absolute;
    top: 50%;
    width: 100%;
    transform: translateY(-50%);
    display: flex;
    justify-content: space-between;
    left: 0;
    right: 0;
    z-index: 10;
}

.owl-prev,
.owl-next {
    background: rgba(255, 255, 255, 0.897) !important;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    cursor: pointer;
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease-in-out;
}

.owl-prev {
    left: 10px;
}

.owl-next {
    right: 10px;
}

.owl-prev:hover,
.owl-next:hover {
    background: rgba(255, 255, 255, 1);
    box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
}

/* Font Awesome Arrows */
.owl-prev i,
.owl-next i {
    font-size: 20px;
    color: #333;
}

/* Dots Pagination */
.owl-dots {
    text-align: center;
    margin-top: 10px;
}

.owl-dot {
    width: 12px;
    height: 12px;
    margin: 5px;
    background: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background 0.3s;
}

.owl-dot.active {
    background: #333;
}
</style>
@endsection
@section('section_script')
<script>
$(document).ready(function() {
    // Set Owl Carousel width to device width - 10px
    $("#news-slider").css("width", $(window).width() - 10);
    $("#news-slider").owlCarousel({
        items: 3,
        loop: true,
        margin: 15,
        nav: true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        dots: true,
        autoplay: true,
        autoplayTimeout: 3000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });
    // Adjust width on window resize
    $(window).resize(function() {
        $("#news-slider").css("width", $(window).width() - 10);
    });
});
</script>
@endsection