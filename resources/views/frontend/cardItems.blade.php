@extends('layouts.frontend')

@section('content')


<section class="promo-section pb-70 section--bg">
    <div class="container">
        <div class="section-title">
            <div class="d-flex align-items-center mt-5">
                <div class="section-title-icon mr-2">
                    <img src="{{ asset('public/assets/frontend/images/icons/gold.png') }}" alt="icons">
                </div>
                <h5 class="title">Card Items</h5>
            </div>
        </div>
        <div class="row mb-24-none justify-content-center">
            @foreach ($cardItems as $cardItem)

            <div class="col-6 col-md-4 col-lg-3">
                <a href="{{ route('cardItem.purchase',[Str::slug($cardItem->title),$cardItem->id]) }}" class="promo__item__2">
                    <img src="{{ imageFile('public/assets/admin/img/giftcard/item/'.$cardItem->image) }}" alt="promo">
                </a>
                <small>{{  $cardItem->title }}</small>
            </div>
            @endforeach

        </div>
    </div>
</section>


@endsection
