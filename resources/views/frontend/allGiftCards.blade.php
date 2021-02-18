@extends('layouts.frontend')

@section('content')
<section class="promo-section pb-70 section--bg">
    <div class="container">
        <div class="section-title ">
            <div class="d-flex align-items-center mt-5">
                <div class="section-title-icon mr-2">
                    <img src="{{ asset('public/assets/frontend/images/icons/gold.png') }}" alt="icons">
                </div>
                <h5 class="title">Gift Cards</h5>
            </div>

        </div>
        <div class="row mb-24-none justify-content-center mb-5">
            @foreach ($giftcards as $item)

            <div class="col-6 col-md-4 col-lg-3">
                <a href="{{ route('cardItems',[Str::slug($item->name),$item->id]) }}" class="promo__item__2">
                    <img src="{{ imageFile('public/assets/admin/img/giftcard/'.$item->image) }}" alt="promo">
                </a>
                <small>{{ $item->name }}</small>
            </div>
            @endforeach

        </div>
        {{$giftcards->links()}}
    </div>
</section>

@endsection
