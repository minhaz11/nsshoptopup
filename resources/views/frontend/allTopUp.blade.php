@extends('layouts.frontend')

@section('content')

<section class="promo-section  pb-70 section--bg">
    <div class="container">
        <div class="section-title ">
            <div class="d-flex align-items-center mt-5">
                <div class="section-title-icon mr-2">
                    <img src="{{ asset('public/assets/frontend/images/icons/gold.png') }}" alt="icons">
                </div>
                <h5 class="title">GAMES Credit/Top Up</h5>
            </div>

        </div>
        <div class="row mb-24-none justify-content-center mb-5">
            @foreach ($items as $item)
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="{{ route('item.view',[ Str::slug($item->item_name),$item->id]) }}" class="promo__item__2">
                        <img src="{{ imageFile('public/assets/admin/img/item/'.$item->image) }}" alt="promo">
                    </a>
                    <p>{{ $item->item_name }}</p>
                </div>
            @endforeach

        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                {{ $items->links() }}
            </div>
        </div>

    </div>
</section>

@endsection
