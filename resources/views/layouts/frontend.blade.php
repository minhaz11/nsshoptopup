<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{config('setting.sitename.name')}} - {{ $title ?? '' }}</title>

    <link rel="stylesheet" href="{{ asset('public/assets/frontend') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend') }}/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend') }}/css/nice-select.css">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend') }}/css/owl.min.css">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend') }}/css/main.css">
    @stack('css-lib')
    @stack('css')

    <link rel="shortcut icon" href="{{ asset(config('setting.favicon.path').'/favicon.png') }}" type="image/x-icon">
</head>

<body>

    <!--=======Header=======-->
    <header>
        <div class="container">
            <div class="header__wrapper">
                <div class="left__side">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset(config('setting.logo.path').'/logo.png') }}" alt="logo">
                        </a>
                    </div>
                    <ul class="menu">
                        <li>
                            <a href="#0">Product Type</a>
                            <ul class="submenu">
                                <li>
                                    <a href="{{route('item.giftcard')}}">Gift Cards</a>
                                </li>
                                <li>
                                    <a href="{{ route('item.topUp') }}">Game Credit/Top up</a>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <a href="#0">Social Link</a>

                        </li>
                        <li>
                            <a href="#0">Contact</a>
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
                            <img src="{{ imageFile('public/assets/images/user/profile/'.auth()->user()->image) }}" alt="header">
                        </a>
                        <ul class="right__menu">
                            <li>
                                <div class="author py-3">
                                    <div class="profile__thumb">
                                        <img src="{{ imageFile('public/assets/images/user/profile/'.auth()->user()->image) }}" alt="header">
                                    </div>
                                    <div class="content">
                                        <h6 class="title">{{ auth()->user()->name }}</h6>
                                        <span>{{ auth()->user()->email }}</span>
                                    </div>
                                    <div class="w-100 fz-14 text-center">
                                        <a href="javascript:void(0)" class="custom-button btn--sm">{{getNumber(auth()->user()->balance,2)??0.00}}</a>
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
                                <a href="{{ route('logout') }}">Logout</a>
                            </li>
                        </ul>
                    </div>
                    @endauth

                    @guest
                    <div class="right__menu__btn">
                         <a  class="custom-button" href="{{ route('login') }}">Login</a>
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </header>
    <!--=======Header=======-->
    @if(!request()->routeIs('home'))
    @include('partials.breadcrumb')
    @endif

    @yield('content')

    <!--===Footer Section===-->
    <footer>
        <div class="footer-bottom">
            <div class="container">
                <p class="m-0">
                  {{date('Y')}}  &copy; All Right Reserved by  <a href="javascript:void(0)">company</a>
                </p>
            </div>
        </div>
    </footer>
    <!--===Footer Section===-->
    <script src="{{asset('public/assets/admin/js/sweetalert.js')}}"></script>
    <script src="{{ asset('public/assets/frontend') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('public/assets/frontend') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/assets/frontend') }}/js/nice-select.js"></script>
    <script src="{{ asset('public/assets/frontend') }}/js/owl.min.js"></script>
    <script src="{{ asset('public/assets/frontend') }}/js/main.js"></script>
    @include('alert.success')
    @include('alert.error')
    @include('alert.errors')
    @stack('js-lib')
    @stack('js')
</body>

</html>
