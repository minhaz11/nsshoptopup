@extends('layouts.frontend')

@section('content')
  <!--===Account Section===-->
  <section class="account-section bg_img" data-background="./assets/images/account/account-bg.jpg">
    <div class="container">
        <div class="account-wrapper">
            <h4 class="title text-center">Login Here</h4>
            <form class="account-form" method="POST" action="{{ route('login') }}" >
                @csrf
                <div class="form-group">
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Passoword">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="custom-button border-0 ">Sign In</button>
                </div>
            </form>
            <div class="text-center my-2">
                Forgot Password? <a href="{{ route('reset.request') }}" class="cl-1"> Reset</a>
            </div>
            <div class="or">
                <span>OR</span>
            </div>
            <div class="create-with-others">

                <div class="text-center">
                    Don't have an account? <a href="{{ route('register') }}" class="cl-1"> Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--===Account Section===-->
@endsection
