 <!--== Start Feature Area Wrapper ==-->
 <div class="feature-area">
      <div class="container-fluid bg-theme-color">
        <div class="row">
          <div class="col-xl-3 col-sm-6">
            <div class="feature-icon-box">
              <div class="inner-content">
                <div class="icon-box">
                  <i class="icon las la-shipping-fast"></i>
                </div>
                <div class="content">
                  <h5 class="title">{{__('Delivery Service')}}</h5>
                  <p>{{__('All orders will be delivered as soon as possible')}}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6">
            <div class="feature-icon-box">
              <div class="inner-content">
                <div class="icon-box">
                  <i class="icon las la-money-bill-wave"></i>
                </div>
                <div class="content">
                  <h5 class="title">{{__('Paying online is very safe')}}</h5>
                  <p>{{__('Payment service is safe')}}<span>100%</span></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6">
            <div class="feature-icon-box">
              <div class="inner-content">
                <div class="icon-box">
                  <i class="icon las la-user-astronaut"></i>
                </div>
                <div class="content">
                  <h5 class="title">{{__('Customers service')}}</h5>
                  <p>{{__('We are available on WhatsApp / Facebook or phone to help you')}}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6">
            <div class="feature-icon-box">
              <div class="inner-content">
                <div class="icon-box">
                  <i class="icon las la-credit-card"></i>
                </div>
                <div class="content">
                  <h5 class="title">{{__('Unique products')}}</h5>
                  <p>{{__('We have many different products')}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Feature Area Wrapper ==-->
<section class=" ">
      <div class="container pt-20 pt-lg-30 pb-lg-30  pb-30">
        <div class="row">
          <div class="col-12">
            <div class="divider-style-wrap">
              <div class="row">
                <div class="col-md-6">
                  <div class="divider-content text-center">
                    <h4 class="title hidden-sm-down"> </h4>
                    <h4 class="title2 hidden-md-up collapsed" data-bs-toggle="collapse" data-bs-target="#dividerId-1">Let’s Connect On Social</h4>
                    <div id="dividerId-1" class="collapse">
                      <div class="social-icons">
                        <a href="{{$facebook_link}}"><i class="la la-facebook"></i></a>
                        <!-- <a href="#/"><i class="la la-twitter"></i></a> -->
                        <a href="{{$twitter_link}}"><i class="la la-twitter"></i></a>
                        <a href="{{$instagram_link}}"><i class="la la-instagram"></i></a>
                      </div>
                      <p class="mb-sm-25">{{__('Follow us on your favorite platforms. Check out new launch teasers, how-to videos, and share your favorite looks.')}}</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="divider-content text-center"><br>
                    <h4 class="title hidden-sm-down" data-margin-bottom="32">{{__('Newsletter subscription')}}</h4>
                    <h4 class="title2 hidden-md-up collapsed" data-bs-toggle="collapse" data-bs-target="#dividerId-2">{{__('Newsletter subscription')}}</h4>
                    <div id="success_message_subscriber"></div>
                    <div id="dividerId-2" class="collapse">
                      <div class="newsletter-content-wrap">
                        <div class="newsletter-form">
                          <form name="subscriber" id="subscriber" enctype="multipart/form-data" method="post" action="">
                          @csrf <input type="email" name="email" maxlength="90" id="a1" class="form-control" placeholder="{{__('Enter email')}}">
                            <button class="btn btn-submit" type="button"  id="subscriber_btn">{{__('Subscribe')}}</button>
                          </form>
                        </div>
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
    <!--== End Divider Area Wrapper ==-->
</div>

  <!--== Start Footer Area Wrapper ==-->
  <footer class="footer-area">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!--== Start Footer Widget Area ==-->
          <div class="footer-widget-area pb-30">
            <div class="row">
              <div class="col-lg-6">
                <div class="widget-item">
                  <div class="about-widget">
                    <div class="inner-content">
                      <div class="footer-logo pb-40">
                        <a href="{{route('viewHomePage')}}">
                          <img class="logo-light" src="{{asset('storage/users/'. $header_logo )}}" alt="Logo" />
                        </a>
                      </div>
                       <p></p>
                    </div>
                    <div class="widget-desc">
                    @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                    {!!$address!!}
                        @else
                        {!!$addressen!!}
                      @endif
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="widget-item">
                  <div class="widget-menu-wrap">
                    <ul class="nav-menu">
                      <li><a href="{{route('questions')}}">{{__('Common questions')}}</a></li>
                      <li><a href="{{route('register')}}">{{__('Register')}}</a></li>
                      <li><a href="{{route('login')}}">{{__('Sign In')}}</a></li>
                      <li><a href="{{route('about')}}">{{__('About Us')}}</a></li>
                      <li><a href="{{route('policy')}}">{{__('Privacy policy')}}</a></li>
                      <li><a href="{{route('Shipping')}}">{{__('Shipping and receiving')}}</a></li>
                      <li><a href="{{route('conditions')}}">{{__('Terms and Conditions')}}</a></li>
                       
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--== End Footer Widget Area ==-->
        </div>
      </div>
    </div>
    <!--== Start Footer Bottom Area ==-->
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <p class="copyright">Copyright © <a target="_blank" href="https://instagram.com/nanots.ae?igshid=Yzg5MTU1MDY=" >{{__('Copyright reserved to Nano Technology Solutions')}} </a></p>
          </div>
          <div class="col-lg-6">
            <div class="payment">
              <!-- <img src="assets/img/photos/payment.png" alt="Payment"> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Footer Bottom Area ==-->
  </footer>
  <!--== End Footer Area Wrapper ==-->
  
  <!--== Start Side Menu ==-->
  <aside class="off-canvas-wrapper">
    <div class="off-canvas-inner">
      <div class="off-canvas-overlay"></div>
      <!-- Start Off Canvas Content Wrapper -->
      <div class="off-canvas-content">
        <!-- Off Canvas Header -->
        <div class="off-canvas-header">
          <div class="close-action">
            <button class="btn-menu-close">{{__('menu')}}<i class="icon-arrow-left"></i></button>
          </div>
        </div>

        <div class="off-canvas-item">
          <!-- Start Mobile Menu Wrapper -->
          <div class="res-mobile-menu menu-active-one">
            <!-- Note Content Auto Generate By Jquery From Main Menu -->
          </div>
          <!-- End Mobile Menu Wrapper -->
        </div>
      </div>
      <!-- End Off Canvas Content Wrapper -->
    </div>
  </aside>
  <!--== End Side Menu ==-->

  <!--== Scroll Top Button ==-->
  <div id="scroll-to-top" class="scroll-to-top"><span class="ion-md-arrow-up"></span></div>
 