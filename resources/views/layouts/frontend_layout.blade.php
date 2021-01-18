<!DOCTYPE html>
<html class="no-js" lang="">


<!-- Mirrored from www.radiustheme.com/demo/html/classima/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Jan 2021 06:21:31 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Classima | Home Two</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="media/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/dependencies/bootstrap/css/bootstrap.min.css') }}">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/dependencies/fontawesome/css/all.min.css') }}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/dependencies/flaticon/flaticon.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/dependencies/owl.carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dependencies/owl.carousel/css/owl.theme.default.min.css') }}">
    <!-- Animated Headlines CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/dependencies/jquery-animated-headlines/css/jquery.animatedheadline.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/dependencies/magnific-popup/css/magnific-popup.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/dependencies/animate.css/css/animate.min.css') }}">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/dependencies/meanmenu/css/meanmenu.min.css') }}">
    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/app.css') }}">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,300i,400,400i,600,600i,700,700i,800,800i&amp;display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>
    
</head>

<body class="sticky-header">
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  	<![endif]-->
    <!-- ScrollUp Start Here -->
    <a href="#wrapper" data-type="section-switch" class="scrollup">
        <i class="fas fa-angle-double-up"></i>
    </a>
    <!-- ScrollUp End Here -->
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper">

    @include('partial.frontend.header')
    <div class="main-panel">
        @yield('front_content')
    </div>
    @include('partial.frontend.footer')

    </div>
    <!-- Jquery Js -->
    <script src="{{ asset('frontend/dependencies/jquery/js/jquery.min.js') }}"></script>
    <!-- Popper Js -->
    <script src="{{ asset('frontend/dependencies/popper.js/js/popper.min.js') }}"></script>
    <!-- Bootstrap Js -->
    <script src="{{ asset('frontend/dependencies/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Waypoints Js -->
    <script src="{{ asset('frontend/dependencies/waypoints/js/jquery.waypoints.min.js') }}"></script>
    <!-- Counterup Js -->
    <script src="{{ asset('frontend/dependencies/jquery.counterup/js/jquery.counterup.min.js') }}"></script>
    <!-- Owl Carousel Js -->
    <script src="{{ asset('frontend/dependencies/owl.carousel/js/owl.carousel.min.js') }}"></script>
    <!-- ImagesLoaded Js -->
    <script src="{{ asset('frontend/dependencies/imagesloaded/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- Isotope Js -->
    <script src="{{ asset('frontend/dependencies/isotope-layout/js/isotope.pkgd.min.js') }}"></script>
    <!-- Animated Headline Js -->
    <script src="{{ asset('frontend/dependencies/jquery-animated-headlines/js/jquery.animatedheadline.min.js') }}"></script>
    <!-- Magnific Popup Js -->
    <script src="{{ asset('frontend/dependencies/magnific-popup/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- ElevateZoom Js -->
    <script src="{{ asset('frontend/dependencies/elevatezoom/js/jquery.elevateZoom-2.2.3.min.js') }}"></script>
    <!-- Bootstrap Validate Js -->
    <script src="{{ asset('frontend/dependencies/bootstrap-validator/js/validator.min.js') }}"></script>
    <!-- Meanmenu Js -->
    <script src="{{ asset('frontend/dependencies/meanmenu/js/jquery.meanmenu.min.js') }}"></script>
    <!-- Google Map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtmXSwv4YmAKtcZyyad9W7D4AC08z0Rb4"></script>
    <!-- Site Scripts -->
    <script src="{{ asset('frontend/assets/js/app.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js">   
    // <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    
    <script type="text/javascript">
        $("#category_name").change(function(){
        var id = $(this).val();
        var token = $("input[name='_token']").val();
      
        $.ajax({
            url: "{{ route('post.filter.subcategory') }}",
            method: 'POST',
            data: {id:id, _token:token},
            success: function(data) {
                //   alert(data.options);
                $("select[name='subcategory_name'").html('');
                $("select[name='subcategory_name'").html(data.options);
            }
        });
    });
    </script>

    <script type="text/javascript">
        $("#division_name").change(function(){
        var id = $(this).val();
        var token = $("input[name='_token']").val();
      
        $.ajax({
            url: "{{ route('post.filter.district') }}",
            method: 'POST',
            data: {id:id, _token:token},
            success: function(data) {
                //   alert(data.options);
                $("select[name='district_name'").html('');
                $("select[name='district_name'").html(data.options);
            }
        });
    });
    </script>

    <script type="text/javascript">
        $("#district_name").change(function(){
        var id = $(this).val();
        var token = $("input[name='_token']").val();
      
        $.ajax({
            url: "{{ route('post.filter.subdistrict') }}",
            method: 'POST',
            data: {id:id, _token:token},
            success: function(data) {
                //   alert(data.options);
                $("select[name='subdistrict_name'").html('');
                $("select[name='subdistrict_name'").html(data.options);
            }
        });
    });
    </script>

 <script>
        $(document).ready(function(){
            $('#logout_option').on('click', function(e){
                e.preventDefault();
                $('#logout_form').submit();
            }); 
        });
</script>

    <script>
        $(document).ready(function (){
        $('#myTable').DataTable({

        });
    });
   </script>

 

<script type="text/javascript">
   $('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
</script>

    <script>
        @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch(type){
        case 'info':
      
        toastr.options.timeOut = 10000;
        toastr.info("{{Session::get('message')}}");
        var audio = new Audio('audio.mp3');
        audio.play();
        break;
        case 'success':
        toastr.options.timeOut = 10000;
        toastr.success("{{Session::get('message')}}");
        var audio = new Audio('audio.mp3');
        audio.play();
        break;
        case 'warning':
        toastr.options.timeOut = 10000;
        toastr.warning("{{Session::get('message')}}");
        var audio = new Audio('audio.mp3');
        audio.play();
        break;
        case 'error':
        toastr.options.timeOut = 10000;
        toastr.error("{{Session::get('message')}}");
        var audio = new Audio('audio.mp3');
        audio.play();
        break;
        }
        @endif

      
</script>
@stack('scripts')
</body>

</html>