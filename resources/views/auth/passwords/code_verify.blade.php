@extends('layouts.auth')

@section('content')

<section class="account-section bg_img" data-background="{{imageFile('public/assets/frontend/images/account/account-bg.jpg')}}">
    <div class="container">
        <div class="account-wrapper">
            <h4 class="title text-center">Reset Password</h4>
            <form class="account-form" method="POST" action="{{ route('password.verify-code') }}" >
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">
                <div class="form-group">
                    <input type="text" name="code" placeholder="code" value="{{ old('code') }}">
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="custom-button border-0 btn-block">Verify Code</button>
                </div>
            </form>

            <div class="or">
                <span>OR</span>
            </div>
            <div class="create-with-others">

                <div class="text-center">
                    Please check including your Junk/Spam Folder. if not found, you can't
                  <a href="{{ route('password.request') }}">Try to send again</a>
                </div>
            </div>


        </div>
    </div>
</section>


@endsection
