<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Game {{ $title ?? '' }}</title>

    <link rel="stylesheet" href="{{ asset('public/assets/frontend') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend') }}/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend') }}/css/nice-select.css">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend') }}/css/owl.min.css">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend') }}/css/main.css">
    @stack('css-lib')
    @stack('css')

    <link rel="shortcut icon" href="{{ asset('public/assets/frontend') }}/images/favicon.png" type="image/x-icon">
</head>

<body>

    <!--=======Header=======-->
    <header>
        <div class="container">
            <div class="header__wrapper">
                <div class="left__side">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ imageFile('public/assets/frontend/logo/'.$setting->logo) }}" alt="logo">
                        </a>
                    </div>
                    <ul class="menu">
                        <li>
                            <a href="#0">Product Type</a>
                            <ul class="submenu">
                                <li>
                                    <a href="#0">Gift Card</a>
                                </li>
                                <li>
                                    <a href="#0">Game Credit/Top up</a>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <a href="#0">Help</a>
                            <ul class="submenu">
                                <li>
                                    <a href="#0">Social Link</a>
                                </li>
                                <li>
                                    <a href="#0">Contact</a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="right__side">
                    <div class="header-bar d-md-none mr-2">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    @auth
                    <div class="right__menu__btn">
                        <a href="#0" class="profile__thumb right__menu_show">
                            <img src="./assets/images/header/author.png" alt="header">
                        </a>
                        <ul class="right__menu">
                            <li>
                                <div class="author py-3">
                                    <div class="profile__thumb">
                                        <img src="./assets/images/header/author.png" alt="header">
                                    </div>
                                    <div class="content">
                                        <h6 class="title">Rock Battu</h6>
                                        <span>rockbattu@example.com</span>
                                    </div>
                                    <div class="w-100 fz-14 text-center">
                                        <span class="cl-theme d-block pb-2 pt-2">You dont have an wallet with this account?</span>
                                        <a href="#0" class="custom-button btn--sm">Create Wallet</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#0">Inbox</a>
                            </li>
                            <li>
                                <a href="#0">Support Ticket</a>
                            </li>
                            <li>
                                <a href="#0">Logout</a>
                            </li>
                        </ul>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </header>
    <!--=======Header=======-->

    @yield('content')

    <!--===Footer Section===-->
    <footer>
        <div class="footer-top section--bg pt-70 pb-70">
            <div class="container">
                <div class="footer__area">
                    <div class="footer__widget">
                        <h6 class="title">Our Shops</h6>
                        <ul class="link__list">
                            <li>
                                <a href="#0">Las Vegas</a>
                            </li>
                            <li>
                                <a href="#0">Milan</a>
                            </li>
                            <li>
                                <a href="#0">Madrid</a>
                            </li>
                            <li>
                                <a href="#0">Enfield</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer__widget">
                        <h6 class="title">Our Networks</h6>
                        <ul class="link__list">
                            <li>
                                <a href="#0">Affiliate</a>
                            </li>
                            <li>
                                <a href="#0">Newsletter</a>
                            </li>
                            <li>
                                <a href="#0">My Account</a>
                            </li>
                            <li>
                                <a href="#0">Demot Store</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer__widget">
                        <h6 class="title">Software</h6>
                        <ul class="link__list">
                            <li>
                                <a href="#0">Store</a>
                            </li>
                            <li>
                                <a href="#0">Vogus</a>
                            </li>
                            <li>
                                <a href="#0">Hokas</a>
                            </li>
                            <li>
                                <a href="#0">Pokas</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer__widget">
                        <h6 class="title">Need Help?</h6>
                        <ul class="link__list">
                            <li>
                                <a href="#0">Privacy</a>
                            </li>
                            <li>
                                <a href="#0">Terms</a>
                            </li>
                            <li>
                                <a href="#0">Account</a>
                            </li>
                            <li>
                                <a href="#0">Reset</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer__widget social-icons--wrapper">
                        <h6 class="title">Connect</h6>
                        <ul class="social-icons">
                            <li>
                                <a href="javascript:void(0)" class="active"><i class="lab la-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lab la-twitter"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lab la-instagram"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lab la-linkedin-in"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p class="m-0">
                    &copy; All Right Reserved by <a href="javascript:void(0)">Company</a>
                </p>
            </div>
        </div>
    </footer>
    <!--===Footer Section===-->

    <script src="{{ asset('public/assets/frontend') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('public/assets/frontend') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/assets/frontend') }}/js/nice-select.js"></script>
    <script src="{{ asset('public/assets/frontend') }}/js/owl.min.js"></script>
    <script src="{{ asset('public/assets/frontend') }}/js/main.js"></script>
    @stack('js-lib')
    @stack('js')
</body>

</html>
