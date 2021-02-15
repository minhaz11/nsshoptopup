@extends('layouts.frontend')

@section('content')

      <!--===Page Header===-->
@include('partials.breadcrumb')
    <!--===Page Header===-->


    <!--===Purchase Section===-->
    <section class="purchase-step-section pt-70 pb-70">
        <div class="container">
            <div class="row justify-content-center mb-30-none">
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#0" class="payment-item">
                        <div class="thumb">
                            <img src="{{ imageFile('public/assets/frontend/images/payment/paypal.png') }}" alt="payment">
                        </div>
                        <div class="content">
                            <h6 class="title">Paypal</h6>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#0" class="payment-item">
                        <div class="thumb">
                            <img src="{{ imageFile('public/assets/frontend/images/payment/payoneer.png') }}" alt="payment">
                        </div>
                        <div class="content">
                            <h6 class="title">Paypal</h6>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#0" class="payment-item">
                        <div class="thumb">
                            <img src="{{ imageFile('public/assets/frontend/images/payment/skrill.png') }}" alt="payment">
                        </div>
                        <div class="content">
                            <h6 class="title">Paypal</h6>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#0" class="payment-item">
                        <div class="thumb">
                            <img src="{{ imageFile('public/assets/frontend/images/payment/voogepay.png') }}" alt="payment">
                        </div>
                        <div class="content">
                            <h6 class="title">Paypal</h6>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#0" class="payment-item">
                        <div class="thumb">
                            <img src="{{ imageFile('public/assets/frontend/images/payment/paypal.png') }}" alt="payment">
                        </div>
                        <div class="content">
                            <h6 class="title">Paypal</h6>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#0" class="payment-item">
                        <div class="thumb">
                            <img src="{{ imageFile('public/assets/frontend/images/payment/paypal.png') }}" alt="payment">
                        </div>
                        <div class="content">
                            <h6 class="title">Paypal</h6>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#0" class="payment-item">
                        <div class="thumb">
                            <img src="{{ imageFile('public/assets/frontend/images/payment/paypal.png') }}" alt="payment">
                        </div>
                        <div class="content">
                            <h6 class="title">Paypal</h6>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#0" class="payment-item">
                        <div class="thumb">
                            <img src="{{ imageFile('public/assets/frontend/images/payment/paypal.png') }}" alt="payment">
                        </div>
                        <div class="content">
                            <h6 class="title">Paypal</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--===Purchase Section===-->


@endsection
