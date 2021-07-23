  @extends('front.home')
  @section('title','Jsssl | Home')
  @section('content')
<section class="index-hero">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-7">
                <div class="content-wrapper">
                    <h1 class="sc-title">A Leading Security Firm Having
                        <span>27 Years Experience</span>
                        in the Security Field
                    </h1>
                    <p class="text">Dealing with trust and confidence not only in the Capital Market but across the
                        country with
                        utmost dedication. Since its inception in 1994 JSSSL is providing best services to the clients
                        by a smart
                        and dedicated working team with a high technical support. </p>
                    <div class="hcall-wrapper">
                        <a href="#" class="box-btn red-bg">
                            <span>Get In Touch</span>
                            <span><img src="{{asset('frontend/assets/img/icon-svg/headset-mic-whtie.svg')}}" alt="mic"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="image-wrapper">
                    <img src="{{asset('frontend/assets/img/home/hero.png')}}" alt="man">
                </div>
            </div>
        </div>
    </div>
</section>


<section class="index-serving">
    <div class="container-fluid px-0">
        <div class="row no-gutters">
            <div class="col-12 col-md-12 col-lg-6 order-1 order-lg-0">
                <div class="image-wrapper">
                    <div class="image-inner">
                        <img class="img-fluid" src="{{asset('frontend/assets/img/home/serving.png')}}" alt="serving man">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6 order-0 order-lg-1">
                <div class="content-wrapper">
                    <div class="content-inner">
                        <h1 class="sc-title">
                            <span>Serving You Since 1994</span>
                        </h1>
                        <p class="text">JSS Services Ltd, one of the pioneers and a leading Security firm, dealing with
                            trust and
                            confidence not only in the Capital Market but across the country with utmost dedication.
                            Since its
                            inception is providing best services to the clients by a smart and dedicated working team
                            with a high
                            technical support.</p>
                        <div class="serving-btn-wrapper">
                            <a href="#" class="box-btn">
                                <span>Learn About Us</span>
                                <span><img src="{{asset('frontend/assets/img/icon-svg/right-arrow.svg')}}" alt="right-arrow"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="client-solution">
    <div class="container">
        <div class="sc-title-wrapper">
            <div class="title-box">
                <h1 class="sc-title">We proivde
                    <span>customized security solutions</span>
                    to our clients
                </h1>
            </div>
            <div class="view-btn-box d-none d-md-block">
                <a href="#" class="box-btn">
                    <span>View All</span>
                    <span><img class="img-fluid" src="{{asset('frontend/assets/img/icon-svg/right-arrow.svg')}}" alt="right-arrow"></span>
                </a>
            </div>
        </div>
        <div class="body-wrapper">
            <div class="row no-gutters custom-margin">
                @foreach ($services as $service )
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="content-wrapper">
                            <img class="img-fluid" src="{{asset('./'.$service->service_image)}}" alt="physical-security">
                            <h2 class="title">{{$service->service_name}}</h2>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <div class="container d-block d-md-none">
        <div class="view-btn-box-mobile">
            <a href="#" class="box-btn">
                <div class="box-btn-inner">
                    <span>View Our Services</span>
                    <span><img class="img-fluid" src="assets/img/icon-svg/right-arrow.svg" alt="right-arrow"></span>
                </div>
            </a>
        </div>
    </div>
</section>


<section class="choose-us">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-2 col-md-4 order-1 order-sm-0">
                <div class="image-wrapper">
                    <img src="{{asset('frontend/assets/img/home/why-choose-us.png')}}" alt="choose-us">
                </div>
            </div>
            <div class="col-12 col-sm-10 col-md-8 order-0 order-sm-1">
                <div class="content-wrapper">
                    <h1 class="sc-title">Why choose us?</h1>
                    <div class="steps-wrapper">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-steps">
                                <div class="steps-inner">
                                    <div class="icon-box">
                                        <img class="img-fluid" src="{{asset('frontend/assets/img/icon-svg/why-choose-us-icon-1.svg')}}"
                                             alt="icon-1">
                                    </div>
                                    <div class="content-box">
                                        <h2 class="title">Security Risk Management</h2>
                                        <p>Providing proactive identification & resolution of security risks to
                                            Businesses.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-steps">
                                <div class="steps-inner">
                                    <div class="icon-box">
                                        <img class="img-fluid" src="{{asset('frontend/assets/img/icon-svg/why-choose-us-icon-2.svg')}}"
                                             alt="icon-2">
                                    </div>
                                    <div class="content-box">
                                        <h2 class="title">Customized
                                            solutions</h2>
                                        <p>We consult with you to understand your security needs and provide customized
                                            security
                                            solutions.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-steps">
                                <div class="steps-inner">
                                    <div class="icon-box">
                                        <img class="img-fluid" src="{{asset('frontend/assets/img/icon-svg/why-choose-us-icon-3.svg')}}"
                                             alt="icon-3">
                                    </div>
                                    <div class="content-box">
                                        <h2 class="title">Difficult
                                            Situations</h2>
                                        <p>We have proven that we can handle extremely challenging and high-risk
                                            situations.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-steps">
                                <div class="steps-inner">
                                    <div class="icon-box">
                                        <img class="img-fluid" src="{{asset('frontend/assets/img/icon-svg/why-choose-us-icon-4.svg')}}"
                                             alt="icon-4">
                                    </div>
                                    <div class="content-box">
                                        <h2 class="title">Super Fast
                                            Response</h2>
                                        <p>We can provide security solutions in less time than our competitors.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="our-clients">
    <div class="container">
        <div class="sc-title-wrapper">
            <div class="title-box">
                <h1 class="sc-title">Don’t just believe us,
                    <span>Believe in our satisfied customers.</span>
                </h1>
            </div>
            <div class="view-btn-box d-none d-md-block">
                <a href="#" class="box-btn">
                    <span>View All Clients</span>
                    <span><img class="img-fluid" src="{{asset('frontend/assets/img/icon-svg/right-arrow.svg')}}" alt="right-arrow"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="clients-slide owl-carousel">
            @foreach ($clients as $client)
                <div class="item">
                    <a href="#" class="logo">
                        <img src="{{asset('/'.$client->client_logo)}}" alt="client logo">
                    </a>
                </div>
            @endforeach

        </div>
      </div>
    <div class="container d-block d-md-none">
        <div class="view-btn-box-mobile">
            <a href="#" class="box-btn">
                <div class="box-btn-inner">
                    <span>View All Clients</span>
                    <span><img class="img-fluid" src="{{asset('frontend/assets/img/icon-svg/right-arrow.svg')}}" alt="right-arrow"></span>
                </div>
            </a>
        </div>
    </div>
</section>


<section class="training-school">
    <div class="container-fluid px-0">
        <div class="row no-gutters">
            <div class="col-12 col-md-12 col-lg-6">
                <div class="content-wrapper">
                    <div class="content-inner">
                        <h1 class="sc-title">
                            <span>Take a look at <br> our training school</span>
                        </h1>
                        <p class="text">Security guard training classes at JSSSL Training school are taught by
                            Bangladesh’s top
                            security professionals under the administrative oversight.</p>
                        <div class="training-btn-wrapper">
                            <a href="#" class="box-btn">
                                <span>Learn More</span>
                                <span><img src="{{asset('frontend/assets/img/icon-svg/right-arrow.svg')}}" alt="right-arrow"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
                <div class="image-wrapper">
                    <div class="image-inner">
                        <img class="img-fluid" src="{{asset('frontend/assets/img/home/training-school.png')}}" alt="training-school">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="index-cne">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-steps">
                <div class="content-wrapper">
                    <img class="img-fluid" src="{{asset('frontend/assets/img/home/career-thumb.png')}}" alt="career">
                    <h2>Terms & Conditions</h2>
                    <p class="text">JSS services Ltd. has been focusing on a wide range of security services at
                        different
                        levels.</p>
                    <div class="cne-btn-wrapper">
                        <a href="terms-policy.html" class="box-btn">
                            <span>Learn More</span>
                            <span><img src="{{asset('frontend/assets/img/icon-svg/right-arrow.svg')}}" alt="right-arrow"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-steps">
                <div class="content-wrapper">
                    <img class="img-fluid" src="{{asset('frontend/assets/img/home/ne-thumb.png')}}" alt="News Events">
                    <h2>Ethical Code of Conducts</h2>
                    <p class="text">JSS services Ltd. has been focusing on a wide range of security services at
                        different
                        levels.</p>
                    <div class="cne-btn-wrapper">
                        <a href="ethical-code-conduct.html" class="box-btn">
                            <span>Learn More</span>
                            <span><img src="{{asset('frontend/assets/img/icon-svg/right-arrow.svg')}}" alt="right-arrow"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('scripts')
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
@endsection
