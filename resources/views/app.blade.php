<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title inertia>{{ config('app.name', 'Ensa Club') }}</title>

        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet"> --}}

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

      

        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
      />
      <link rel="stylesheet" href="{{asset('storage/assets/landing/css/icofont.min.css')}}" />
      <link rel="stylesheet" href="{{asset('storage/assets/landing/css/bootstrap.min.css')}}" />
      <link rel="stylesheet" href="{{asset('storage/assets/landing/css/animate.min.css')}}" />
      <link rel="stylesheet" href="{{asset('storage/assets/landing/css/swiper.min.css')}}" />
      <link rel="stylesheet" href="{{asset('storage/assets/landing/css/style.css')}}" />
      <link rel="stylesheet" href="{{asset('storage/assets/landing/css/gredients/purple.css')}}" />
      <link rel="stylesheet" href="{{asset('storage/assets/landing/css/typography/poppins-quciksland.css')}}" />


         <!-- Scripts -->
         <link rel="shortcut icon" href="{{asset('storage/assets/images/favicon.ico')}}" />
         <!-- Bootstrap CSS -->
         <link rel="stylesheet" href="{{asset('storage/assets/css/bootstrap.min.css')}}">
         <link rel="stylesheet" href="{{asset('storage/assets/css/owl.carousel.min.css')}}">

         <!-- Typography CSS -->
         <link rel="stylesheet" href="{{asset('storage/assets/css/typography.css')}}">
         <!-- Style CSS -->
         <link rel="stylesheet" href="{{asset('storage/assets/css/style.css')}}">
         <!-- Responsive CSS -->
         <link rel="stylesheet" href="{{asset('storage/assets/css/responsive.css')}}">
             
        
         {{-- Sweet Alerts --}}
         <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
         {{-- Vue Select --}}
         <script src="https://unpkg.com/vue-select@latest"></script>
        <link rel="stylesheet" href="https://unpkg.com/vue-select@latest/dist/vue-select.css">
         {{-- Moment --}}
         <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
         @routes
         <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="dark">
        @inertia





      
  <!-- ==========  Footer End ========== -->
  <script src="{{asset('storage/assets/js/jquery.min.js')}}"></script>
        
     <script src="{{asset('storage/assets/landing/js/jquery-3.2.1.min.js')}}"></script>
     <script src="{{asset('storage/assets/landing/js/jquery-migrate-3.0.0.min.js')}}"></script>
     <script src="{{asset('storage/assets/landing/js/bootstrap.min.js')}}"></script>
     <script src="{{asset('storage/assets/landing/js/jquery.textillate.js')}}"></script>
     <script src="{{asset('storage/assets/landing/js/jquery.lettering.js')}}"></script>
     <script src="{{asset('storage/assets/landing/js/jquery.fittext.js')}}"></script>
     <script src="{{asset('storage/assets/landing/js/jquery.ajaxchimp.min.js')}}"></script>
     <script src="{{asset('storage/assets/landing/js/swiper.min.js')}}"></script>
     <script src="{{asset('storage/assets/landing/js/custom.js')}}"></script>




       
    <script src="{{asset('storage/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('storage/assets/js/bootstrap.min.js')}}"></script>
    <!-- Appear JavaScript -->
    <script src="{{asset('storage/assets/js/jquery.appear.js')}}"></script>
    <!-- Countdown JavaScript -->
    <script src="{{asset('storage/assets/js/countdown.min.js')}}"></script>
    <!-- Counterup JavaScript -->
    <script src="{{asset('storage/assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('storage/assets/js/jquery.counterup.min.js')}}"></script>
    <!-- Wow JavaScript -->
    <script src="{{asset('storage/assets/js/wow.min.js')}}"></script>
    <!-- lottie JavaScript -->
    <script src="{{asset('storage/assets/js/lottie.js')}}"></script>
    <!-- Apexcharts JavaScript -->
    <script src="{{asset('storage/assets/js/apexcharts.js')}}"></script>
    <!-- Slick JavaScript -->
    <script src="{{asset('storage/assets/js/slick.min.js')}}"></script>
    <!-- Select2 JavaScript -->
    <script src="{{asset('storage/assets/js/select2.min.js')}}"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="{{asset('storage/assets/js/owl.carousel.min.js')}}"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="{{asset('storage/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="{{asset('storage/assets/js/smooth-scrollbar.js')}}"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{asset('storage/assets/js/chart-custom.js')}}"></script>
    <!-- Custom JavaScript -->
    <script src="{{asset('storage/assets/js/custom.js')}}"></script>
    
    </body>
</html>
