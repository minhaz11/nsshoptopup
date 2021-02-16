@extends('layouts.frontend')

@section('content')

<section class="account-section bg_img" data-background="./assets/images/account/account-bg.jpg">
    <div class="container">
        <div class="account-wrapper">
            <h4 class="title text-center">Register</h4>
            <form class="account-form" method="POST" action="{{ route('register') }}" >
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class=" @error('name') is-invalid @enderror" placeholder="Full Name" required value="{{ old('name') }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class=" @error('username') is-invalid @enderror" name="username" placeholder="Username" required value="{{ old('username') }}">
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class=" @error('phone') is-invalid @enderror" name="phone" placeholder="Phone No." required value="{{ old('phone') }}">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    @enderror


                </div>
                <div class="form-group">
                    <input type="email" class=" @error('email') is-invalid @enderror" name="email" placeholder="Email Address" required value="{{ old('email') }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    @enderror


                </div>
                <div class="form-group">
                    <input type="password" class=" @error('password') is-invalid @enderror" name="password" placeholder="Passoword" required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    @enderror


                </div>
                <div class="form-group">
                    <input type="password" class=" @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Confirm Passoword" required>
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    @enderror


                </div>

              

                <div class="form-group text-center">
                    <button type="submit" class="custom-button border-0 ">Register</button>
                </div>
            </form>

            <div class="or">
                <span>OR</span>
            </div>
            <div class="create-with-others">

                <div class="text-center">
                    Have an account? <a href="{{ route('login') }}" class="cl-1"> Login</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
