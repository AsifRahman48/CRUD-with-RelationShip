<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Font awesome -->
    <link href="{{asset('product/css/font-awesome.css')}}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{asset('product/css/bootstrap.css')}}" rel="stylesheet">
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="{{asset('product/css/jquery.smartmenus.bootstrap.css')}}" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('product/css/jquery.simpleLens.css')}}">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('product/css/slick.css')}}">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('product/css/nouislider.css')}}">
    <!-- Theme color -->
    <link id="switcher" href="{{asset('product/css/theme-color/default-theme.css')}}" rel="stylesheet">
    <!-- Top Slider CSS -->
    <link href="{{asset('product/css/sequence-theme.modern-slide-in.css')}}" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="{{asset('product/css/style.css')}}" rel="stylesheet">

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('style')

</head>
<body class="productPage">
<!-- SCROLL TOP BUTTON -->
<a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
<!-- END SCROLL TOP BUTTON -->
<!-- Start header section -->
<header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-header-top-area">
                        <!-- start header top left -->
                        <div class="aa-header-top-left">
                            <!-- start language -->
                            <div class="aa-language">
                                <div class="dropdown">
                                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <img src="{{asset('product/img/flag/english.jpg')}}" alt="english flag">ENGLISH
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="#"><img src="{{asset('product/img/flag/french.jpg')}}" alt="">FRENCH</a></li>
                                        <li><a href="#"><img src="{{asset('product/img/flag/english.jpg')}}" alt="">ENGLISH</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- / language -->
                            <!-- start currency -->
                            <div class="aa-currency">
                                <div class="dropdown">
                                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <i class="fa fa-usd"></i>USD
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="#"><i class="fa fa-euro"></i>EURO</a></li>
                                        <li><a href="#"><i class="fa fa-jpy"></i>YEN</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- / currency -->
                            <!-- start cellphone -->
                            <div class="cellphone hidden-xs">
                                <p><span class="fa fa-phone"></span>00-62-658-658</p>
                            </div>
                            <!-- / cellphone -->
                        </div>
                        <!-- / header top left -->
                        <div class="aa-header-top-right">
                            <ul class="aa-head-top-nav-right">
                                <li><a href="account.html">My Account</a></li>
                                <li class="hidden-xs"><a href="wishlist.html">Wishlist</a></li>
                                <li class="hidden-xs"><a href="">My Cart</a></li>
                                <li class="hidden-xs"><a href="checkout.html">Checkout</a></li>
                                <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / header top  -->
    <!-- start header bottom  -->
    <div class="aa-header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-header-bottom-area">
                        <!-- cart box -->
                        <div class="aa-cartbox">
                            <a class="aa-cart-link" href="{{ route('cart') }}">
                                <span class="fa fa-shopping-basket"></span>
                                <span class="aa-cart-title">SHOPPING CART</span>
                                <span class="aa-cart-notify">{{ $count }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / header bottom  -->
</header>
<!-- / header section -->


@yield('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('product/js/bootstrap.js')}}"></script>
<!-- SmartMenus jQuery plugin -->
<script type="text/javascript" src="{{asset('product/js/jquery.smartmenus.js')}}"></script>
<!-- SmartMenus jQuery Bootstrap Addon -->
<script type="text/javascript" src="{{asset('product/js/jquery.smartmenus.bootstrap.js')}}"></script>
<!-- To Slider JS -->
<script src="{{asset('product/js/sequence.js')}}"></script>
<script src="{{asset('product/js/sequence-theme.modern-slide-in.js')}}"></script>
<!-- Product view slider -->
<script type="text/javascript" src="{{asset('product/js/jquery.simpleGallery.js')}}"></script>
<script type="text/javascript" src="{{asset('product/js/jquery.simpleLens.js')}}"></script>
<!-- slick slider -->
<script type="text/javascript" src="{{asset('product/js/slick.js')}}"></script>
<!-- Price picker slider -->
<script type="text/javascript" src="{{asset('product/js/nouislider.js')}}"></script>
<!-- Custom js -->
<script src="{{asset('product/js/custom.js')}}"></script>
<script>
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });
</script>
@yield('script')

</body>
</html>
