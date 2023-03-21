<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>MaryamShope</title>
    @notifyCss
    <!--== Favicon ==-->
    <link rel="icon" type="image/x-icon" href="{{asset('/assets/img/M.png')}}"  />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">



<style>#whatsapp-button {
  position: fixed;
  bottom: 20px;
  right: 20px;
  z-index: 9999;
}

#whatsapp-button a {
  display: block;
  position: relative;
  width: 150px;
  height: 150px;
  border-radius: 50%;
  background-color: #25D366;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
  transition: all 0.3s ease-in-out;
}

#whatsapp-button a:hover {
  transform: scale(1.1);
}

#whatsapp-button img {
  display: block;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

#whatsapp-button .message {
  display: block;
  position: absolute;
  top: -30px;
  right: 100%;
  white-space: nowrap;
  font-size: 16px;
  color: #fff;
  padding: 5px;
  background-color: rgba(0, 0, 0, 0.8);
  border-radius: 5px;
  transform: translateX(50%);
  opacity: 0;
  transition: all 0.3s ease-in-out;
}

#whatsapp-button a:hover .message {
  opacity: 1;
  top: -50px;
}</style>

    
    {{-- <style>
        .float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
	font-size:30px;
	box-shadow: 2px 2px 3px #999;
	z-index:100;
	animation: fadeIn 2s ease-in-out forwards;
}
#whatsapp-button {
  position: fixed;
  bottom: 20px;
  right: 20px;
  z-index: 9999;
}

#whatsapp-button a {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 150px;
  height: 50px;
  background-color: green;
  color: white;
  border-radius: 5px;
  text-decoration: none;
  font-weight: bold;
  font-size: 16px;
  box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
}

#whatsapp-button a i {
  margin-right: 10px;
  font-size: 24px;
}

.whatsapp-text {
  display: none;
  margin-left: 10px;
}
.my-float{
	margin-top:22px;
}
 
@keyframes fadeIn {
    0% {
        opacity: 0;
        bottom: 0px;
    }
    100% {
        opacity: 1;
        bottom: 40px;
    }
}
		/* Add some CSS styles for the WhatsApp button */
		.whatsapp-button {
			position: fixed;
			bottom: 20px;
			right: 20px;
			background-color: #25d366;
			color: #fff;
			font-size: 16px;
			padding: 10px 20px;
			border-radius: 50px;
			cursor: pointer;
			transition: all 0.3s ease;
			z-index: 9999;
		}

		/* Add some CSS styles for the WhatsApp button hover effect */
		.whatsapp-button:hover {
			transform: scale(1.1);
			box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
		}
	</style> --}}
    <!--== Bootstrap CSS ==-->
    <link href="{{asset('/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!--== Ionicon CSS ==-->
    <link href="{{asset('/assets/css/ionicons.min.css')}}" rel="stylesheet" />
    <!--== Simple Line Icon CSS ==-->
    <link href="{{asset('/assets/css/simple-line-icons.css')}}" rel="stylesheet" />
    <!--== Line Icons CSS ==-->
    <link href="{{asset('/assets/css/lineIcons.css')}}" rel="stylesheet" />
    <!--== Font Awesome Icon CSS ==-->
    <link href="{{asset('/assets/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!--== Animate CSS ==-->
    <link href="{{asset('/assets/css/animate.css')}}" rel="stylesheet" />
    <!--== Swiper CSS ==-->
    <link href="{{asset('/assets/css/swiper.min.css')}}" rel="stylesheet" />
    <!--== Range Slider CSS ==-->
    <link href="{{asset('/assets/css/range-slider.css')}}" rel="stylesheet" />
    <!--== Fancybox Min CSS ==-->
    <link href="{{asset('/assets/css/fancybox.min.css')}}" rel="stylesheet" />
    <!--== Slicknav Min CSS ==-->
    <link href="{{asset('/assets/css/slicknav.css')}}" rel="stylesheet" />
    <!--== Owl Carousel Min CSS ==-->
    <link href="{{asset('/assets/css/owlcarousel.min.css')}}" rel="stylesheet" />
    <!--== Owl Theme Min CSS ==-->
    <link href="{{asset('/assets/css/owltheme.min.css')}}" rel="stylesheet" />
    <!--== Spacing CSS ==-->
    <link href="{{asset('/assets/css/spacing.css')}}" rel="stylesheet" />

    <!--== Theme Font CSS ==-->
    <link href="{{asset('assets/css/theme-font.css')}}" rel="stylesheet" />

    <!--== Main Style CSS ==--> 
    @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
    <link href="{{asset('/assets/css/style-rtl.css' )}}" rel="stylesheet" />
     @else
    <link href="{{asset('/assets/css/style.css' )}}" rel="stylesheet" />
    @endif
   

    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<!--wrapper start-->
<div class="wrapper home-default-wrapper">

  <!--== Start Preloader Content ==-->
  <div class="preloader-wrap">
    <div class="preloader">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
    @include('layouts.layoutSite.Header')
    <main class="main-content">
     <x:notify-messages/>
      @yield('content')   

    </main>
  @include('layouts.layoutSite.Footer')
  <!--Start of Tawk.to Script-->
 
<!--End of Tawk.to Script-->
  @notifyJs
  <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<!--=== Modernizr Min Js ===-->
<script src="{{asset('/assets/js/modernizr.js')}}"></script>
<!--=== jQuery Min Js ===-->
<script src="{{asset('/assets/js/jquery-main.js')}}"></script>
<!--=== jQuery Migration Min Js ===-->
<script src="{{asset('/assets/js/jquery-migrate.js')}}"></script>
<!--=== Bootstrap Min Js ===-->
<script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
<!--=== jQuery Appear Js ===-->
<script src="{{asset('/assets/js/jquery.appear.js')}}"></script>
<!--=== jQuery Swiper Min Js ===-->
<script src="{{asset('/assets/js/swiper.min.js')}}"></script>
<!--=== jQuery Fancy Box Min Js ===-->
<script src="{{asset('/assets/js/fancybox.min.js')}}"></script>
<!--=== jQuery Slick Nav Js ===-->
<script src="{{asset('/assets/js/slicknav.js')}}"></script>
<!--=== jQuery Waypoints Js ===-->
<script src="{{asset('/assets/js/waypoints.js')}}"></script>
<!--=== jQuery Owl Carousel Min Js ===-->
<script src="{{asset('/assets/js/owlcarousel.min.js')}}"></script>
<!--=== jQuery Match Height Min Js ===-->
<script src="{{asset('/assets/js/jquery-match-height.min.js')}}"></script>
<!--=== jQuery Zoom Min Js ===-->
<script src="{{asset('/assets/js/jquery-zoom.min.js')}}"></script>
<!--=== Countdown Js ===-->
<script src="{{asset('/assets/js/countdown.js')}}"></script>

<!--=== Custom Js ===-->
<script src="{{asset('/assets/js/custom.js')}}"></script>

  @stack('js')
  <script>
$('#subscriber_btn').on('click' , function (e) {
            
           // $(document).find('#errsu').remove();
            e.preventDefault();
             $('#errsu').remove();
            $.ajax({
                type: "post",
                url: "{{ route('subscriber') }}",
                data: $("#subscriber").serialize(),
                dataType: 'json',              // let's set the expected response format
                success: function (data) {
                    //console.log(data);
                    $('#success_message_subscriber').fadeIn().html('<div class="text-success border-0">' + data.message +'</div>');
                    // document.body.scrollTop = document.documentElement.scrollTop = 0;
                    document.getElementById('a1').value = '';
                   


                },
                error: function (err) {
                    if (err.status == 422) { // when status code is 422, it's a validation issue
                         
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="' + i + '"]');
                           //el.nextAll().remove();
                           $('#success_message_subscriber').fadeIn().html('<div class="text-danger border-0"> '+ error[0] +'</div>');

                            
                        });
                    }
                }
            });

        });
</script>
  </body>
  </html>