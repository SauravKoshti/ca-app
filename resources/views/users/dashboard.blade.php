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
                    <div class="more"><a href="#">Read More <i class="fa fa-long-arrow-right"></i></a></div>
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
                    <div class="more"><a href="#">Read More <i class="fa fa-long-arrow-right"></i></a></div>
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
                    <div class="more"><a href="#">Read More <i class="fa fa-long-arrow-right"></i></a></div>
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
                    <div class="more"><a href="#">Read More <i class="fa fa-long-arrow-right"></i></a></div>
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
                    <div class="more"><a href="#">Read More <i class="fa fa-long-arrow-right"></i></a></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="row">
        <div class="well col-md-8">
            <div id="myCarousel" class="carousel slide">
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="http://placehold.it/300x200/" alt="Slide11">
                                    <div class="caption">
                                        <h3>Product label</h3>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                            eirmod tempor</p>
                                        <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#"
                                                class="btn btn-default" role="button">Wishlist</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="http://placehold.it/300x200/" alt="Slide12">
                                    <div class="caption">
                                        <h3>Product label</h3>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                            eirmod tempor</p>
                                        <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#"
                                                class="btn btn-default" role="button">Wishlist</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="http://placehold.it/300x200/" alt="Slide13">
                                    <div class="caption">
                                        <h3>Product label</h3>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                            eirmod tempor</p>
                                        <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#"
                                                class="btn btn-default" role="button">Wishlist</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="http://placehold.it/300x200/" alt="Slide14">
                                    <div class="caption">
                                        <h3>Product label</h3>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                            eirmod tempor</p>
                                        <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#"
                                                class="btn btn-default" role="button">Wishlist</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="http://placehold.it/300x200/" alt="Slide21">
                                    <div class="caption">
                                        <h3>Product label</h3>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                            eirmod tempor</p>
                                        <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#"
                                                class="btn btn-default" role="button">Wishlist</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="http://placehold.it/300x200/" alt="Slide22">
                                    <div class="caption">
                                        <h3>Product label</h3>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                            eirmod tempor</p>
                                        <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#"
                                                class="btn btn-default" role="button">Wishlist</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="http://placehold.it/300x200/" alt="Slide23">
                                    <div class="caption">
                                        <h3>Product label</h3>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                            eirmod tempor</p>
                                        <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#"
                                                class="btn btn-default" role="button">Wishlist</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="http://placehold.it/300x200/" alt="Slide24">
                                    <div class="caption">
                                        <h3>Product label</h3>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                            eirmod tempor</p>
                                        <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#"
                                                class="btn btn-default" role="button">Wishlist</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="http://placehold.it/300x200/" alt="Slide31">
                                    <div class="caption">
                                        <h3>Product label</h3>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                            eirmod tempor</p>
                                        <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#"
                                                class="btn btn-default" role="button">Wishlist</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="http://placehold.it/300x200/" alt="Slide32">
                                    <div class="caption">
                                        <h3>Product label</h3>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                            eirmod tempor</p>
                                        <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#"
                                                class="btn btn-default" role="button">Wishlist</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="http://placehold.it/300x200/" alt="Slide33">
                                    <div class="caption">
                                        <h3>Product label</h3>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                            eirmod tempor</p>
                                        <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#"
                                                class="btn btn-default" role="button">Wishlist</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="http://placehold.it/300x200/" alt="Slide34">
                                    <div class="caption">
                                        <h3>Product label</h3>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                            eirmod tempor</p>
                                        <p><a href="#" class="btn btn-primary" role="button">12,99 €</a> <a href="#"
                                                class="btn btn-default" role="button">Wishlist</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i
                        class="fa fa-chevron-left fa-2x"></i></a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next"><i
                        class="fa fa-chevron-right fa-2x"></i></a>

                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
            </div><!-- End Carousel -->
        </div><!-- End Well -->
    </div>
</section>
@endsection