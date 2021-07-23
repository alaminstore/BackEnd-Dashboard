<div class="header-wrapper">
    <div class="header-left-box">
        <div class="left-box-inner">
            <div class="logo-wrapper">
                <a class="d-blcok" href="{{url('/')}}">
                    <img class="" src="{{asset('frontend/assets/img/logo.png')}}" alt="logo">
                </a>
            </div>
            <div class="icon-wrapper d-block d-lg-none">
                <div class="icon-inner">
                    <div class="line line-one"></div>
                    <div class="line line-two"></div>
                    <div class="line line-three"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle-box collapse">
        <div class="middle-box-inner">
            <ul class="main-menu">
                <li class="menu-item">
                    <a href="about-us.html" class="link" onclick="return false">About Us
                        <span><img src="{{asset('frontend/assets/img/icon-svg/chaveron-down.svg')}}" alt="chaveron"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="about-us.html" class="link">Who We Are</a>
                        </li>
                        <li class="menu-item">
                            <a href="terms-policy.html" class="link">Terms & Policies</a>
                        </li>
                        <li class="menu-item">
                            <a href="ethical-code-conduct.html" class="link">Ethical Code</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="services.html" class="link">Services</a>
                </li>
                <li class="menu-item">
                    <a href="training-school.html" class="link">Training School</a>
                </li>
                <li class="menu-item">
                    <a href="our-clients.html" class="link">Our Clients</a>
                </li>
                <li class="menu-item">
                    <a href="{{url('/career')}}" class="link {{url()->current() == url('/career') ? 'active' : ''}}">Careers</a>
                    {{-- <a href="{{url('/career')}}" class="link {{url()->current() == url('/career') ||url('/job/'{id}'/apply') ? 'active' : ''}}">Careers</a> --}}
                </li>
                <li class="menu-item">
                    <a href="news-events.html" class="link">News & Events</a>
                </li>
            </ul>
            <div class="call-btn-wrapper-mobile d-block d-lg-none">
                <a href="contact-us.html" class="box-btn red-bg">
                    <div class="box-btn-inner">
                        <span>Contact Us</span>
                        <span><img src="assets/img/icon-svg/headset-mic-whtie.svg" alt="mic"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="header-right-box d-none d-lg-block">
        <div class="right-box-inner">
            <div class="call-btn-wrapper">
                <a href="contact-us.html" class="box-btn">
                    <span>Contact Us</span>
                    <span><img src="{{asset('frontend/assets/img/icon-svg/headset-mic-red.svg')}}" alt="mic"></span>
                </a>
            </div>
        </div>
    </div>
</div>
