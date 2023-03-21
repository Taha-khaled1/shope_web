<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>    pink made :: dashboard  </title>
    <link rel="icon" href="{{ url('/') }}/cp/favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    @notifyCss
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <style>
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
	</style>
    <!-- plugin css file  -->
    <link rel="stylesheet" href="{{ url('/') }}/cp/assets/plugin/datatables/responsive.dataTables.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/cp/assets/plugin/datatables/dataTables.bootstrap5.min.css">

    <!-- project css file  -->
    <link rel="stylesheet" href="{{ url('/') }}/cp/assets/css/ebazar.style.min.css">
</head>
<body class="rtl_mode">
    <div id="ebazar-layout" class="theme-cyan">
        
        
    @include('layouts.admin.menu')
        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">
        @include('layouts.admin.nav')



           

            <!-- Body: Body -->
            <x:notify-messages />

            @yield('content')
            <!-- Modal Custom Settings-->
             
            
        </div>
    
    </div>
    @notifyJs

        @stack('js')

    @include('layouts.admin.footer')
    
</body>
</html> 