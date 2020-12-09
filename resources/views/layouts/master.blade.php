<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link href="{{ asset('images/apple-touch-icon.png') }}" rel="apple-touch-icon">
        <link href="{{ asset('images/favicon.png') }}" rel="icon" sizes="16x16">
        <meta name="keywords" content="Default Description">
        <meta name="description" content="Default keyword">

        <title>@yield('title')</title>

        <!-- CSS Library-->
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}" >
        <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/assets/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/slick/slick/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/Magnific-Popup/dist/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/revolution/css/settings.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/revolution/css/layers.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/revolution/css/navigation.css') }}">

        <!-- Custom CSS-->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- Bootstrap CSS -->
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> --}}

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

        <!-- Bootstrap JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/ps-icon/style.css') }}">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            /* .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            } */

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            /* .content {
                text-align: center;
            } */

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #e1ecf1;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            @yield('style');
        </style>
    </head>
    <body>
        <div class="ps-loading">
            <div class="content">
                @yield('content')
            </div>
        </div>
        <!-- JS Library-->
        <script type="text/javascript" src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/owl-carousel/owl.carousel.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/gmap3.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/imagesloaded.pkgd.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/isotope.pkgd.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/jquery.matchHeight-min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/slick/slick/slick.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/elevatezoom/jquery.elevatezoom.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAx39JFH5nhxze1ZydH-Kl8xXM3OK4fvcg&amp;region=GB"></script>
        <script type="text/javascript" src="{{ asset('plugins/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>

        <!-- Custom scripts-->
        <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
