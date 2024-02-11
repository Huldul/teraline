<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset("img/favicon.png")}}" type="image/x-icon">
    <title>Корзина</title>
    <!-- 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css?_v=20240206121958"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css?_v=20240206121958">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.css?_v=20240206121958">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css?_v=20240206121958"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css?_v=20240206121958"/>
    <link rel="stylesheet" href="{{asset("css/style.css?_v=20240206121958")}}">
</head>

<body>
    @include('components/header')
    @yield('content')
    @include('components/footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js?_v=20240206121958" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js?_v=20240206121958" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js?_v=20240206121958"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js?_v=20240206121958"></script>
<script src="//cdn.jsdelivr.net/npm/jquery.marquee@1.6.0/jquery.marquee.min.js?_v=20240206121958" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js?_v=20240206121958"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js?_v=20240206121958"></script> -->
<script src="{{asset("js/app.js?_v=20240206121958")}}"></script>
<script src="{{asset("js/filters.js?_v=20240206121958")}}"></script>

<div class="popup form_loader " id="form_loader ">
    <div class="form_loader_block ">
        <div class="form_loader_animate "></div>
        <div class="form_loader_text " style="color: #000; ">Пожалуйста, подождите</div>
    </div>
</div>
<!-- loader form -->
</body>


