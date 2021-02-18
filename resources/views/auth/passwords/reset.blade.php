@extends('layouts.auth')

@section('content')


<section class="account-section bg_img" data-background="{{imageFile('public/assets/frontend/images/account/account-bg.jpg')}}">
    <div class="container">
        <div class="account-wrapper">
            <h4 class="title text-center">Login Here</h4>
            <form class="account-form" method="POST" action="{{ route('password.update') }}" >
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" value="{{ $email ?? old('email') }}">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Passoword">
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" placeholder="password confirmation">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="custom-button border-0 ">Reset Password</button>
                </div>
            </form>


        </div>
    </div>
</section>
@endsection
