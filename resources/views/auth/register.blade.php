@extends('layouts.auth')

@section('content')

<section class="account-section bg_img" data-background="{{imageFile('public/assets/frontend/images/account/account-bg.jpg')}}">
    <div class="container">
        <div class="account-wrapper">
            <h4 class="title text-center">Register</h4>
            <form class="account-form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
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
                <div class="form-group">
                    <img class="w-100 h-50 image" id="previewImg" src="https://dummyimage.com/400x400/03174a/fff" alt="">
                </div>


                <div class="form-group">
                    <input type="file" id="imageFile" class=" @error('image') is-invalid @enderror file form-control" name="image" required value="{{ old('email') }}">
                    @error('image')
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

@push('css')

    <style>
        .file{
            height: 49px !important;
        }
        /* .image{
            border-radius: 50%
        } */
    </style>

@endpush

@push('js')
    <script>
            $(document).ready(function(){

            function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                $('#previewImg').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
            }

            $("#imageFile").change(function() {
            readURL(this);
            });

    });
    </script>

@endpush
