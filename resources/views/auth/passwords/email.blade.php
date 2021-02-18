@extends('layouts.auth')

@section('content')

<section class="account-section bg_img" data-background="{{imageFile('public/assets/frontend/images/account/account-bg.jpg')}}">
    <div class="container">
        <div class="account-wrapper">
            <h4 class="title text-center">Reset Password</h4>
            <form class="account-form" method="POST" action="{{route('password.email')}}" >
                @csrf
                <div class="form-group">
                    <input type="email" name="email" placeholder="email" value="{{ old('email') }}">
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="custom-button border-0 btn-block">Send Reset Code</button>
                </div>
            </form>


        </div>
    </div>
</section>


@endsection
