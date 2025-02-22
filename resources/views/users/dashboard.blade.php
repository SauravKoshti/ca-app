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
    <div class="container-fluid">
        <h2>Achieve<span>ment</span></h2>
        <div class="row">
          <div class="col-md-12">
            <div id="news-slider" class="owl-carousel">
              <div class="post-slide">
                <div class="post-img">
                  <img src="https://images.unsplash.com/photo-1596265371388-43edbaadab94?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=301&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=501" alt="">
                </div>
              </div>
      
              <div class="post-slide">
                <div class="post-img">
                  <img src="https://images.unsplash.com/photo-1533227268428-f9ed0900fb3b?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=303&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=503" alt="">
                </div>
              </div>
      
              <div class="post-slide">
                <div class="post-img">
                  <img src="https://images.unsplash.com/photo-1564979268369-42032c5ca998?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=300&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=500" alt="">
                </div>
              </div>
      
              <div class="post-slide">
                <div class="post-img">
                  <img src="https://images.unsplash.com/photo-1576659531892-0f4991fca82b?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=301&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=501" alt="">
                </div>
              </div>
      
              <div class="post-slide">
                <div class="post-img">
                  <img src="https://images.unsplash.com/photo-1586083702768-190ae093d34d?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=305&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=505" alt="">
                </div>
              </div>
      
              <div class="post-slide">
                <div class="post-img">
                  <img src="https://images.unsplash.com/photo-1484656551321-a1161420a2a0?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=306&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=506" alt="">
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

.post-slide {
  background: #fff;
  margin: 20px 15px 20px;
  border-radius: 15px;
  padding-top: 1px;
  box-shadow: 0px 14px 22px -9px #bbcbd8;
}
.post-slide .post-img {
  position: relative;
  overflow: hidden;
  border-radius: 10px;
  margin: -12px 15px 8px 15px;
  margin-left: -10px;
}
.post-slide .post-img img {
  width: 100%;
  height: auto;
  transform: scale(1, 1);
  transition: transform 0.2s linear;
}
.post-slide:hover .post-img img {
  transform: scale(1.1, 1.1);
}

.owl-controls .owl-buttons {
  text-align: center;
  margin-top: 20px;
}
.owl-controls .owl-buttons .owl-prev {
  background: #fff;
  position: absolute;
  top: 40%;
  left: 15px;
  padding: 0 18px 0 15px;
  border-radius: 50px;
  box-shadow: 3px 14px 25px -10px #92b4d0;
  transition: background 0.5s ease 0s;
}
.owl-controls .owl-buttons .owl-next {
  background: #fff;
  position: absolute;
  top: 40%;
  right: 15px;
  padding: 0 15px 0 18px;
  border-radius: 50px;
  box-shadow: -3px 14px 25px -10px #92b4d0;
  transition: background 0.5s ease 0s;
}
.owl-controls .owl-buttons .owl-prev:after,
.owl-controls .owl-buttons .owl-next:after {
  content: "\f104";
  font-family: FontAwesome;
  color: #333;
  font-size: 30px;
}
.owl-controls .owl-buttons .owl-next:after {
  content: "\f105";
}

</style>
@endsection
@section('section_script')
<script>
    $(document).ready(function () {
        $("#news-slider").owlCarousel({
            items: 3,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [980, 2],
            itemsMobile: [600, 1],
            navigation: true,
            navigationText: ["", ""],
            pagination: true,
            autoPlay: true
        });
        });
</script>
@endsection