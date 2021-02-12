@php
    $items  = \App\Items::whereStatus(1)->latest()->take(8)->get(['id','image']);
@endphp
<section class="promo-section pb-70 section--bg">
    <div class="container">
        <div class="section-title">
            <div class="d-flex align-items-center">
                <div class="section-title-icon mr-2">
                    <img src="{{ asset('public/assets/frontend/images/icons/gold.png') }}" alt="icons">
                </div>
                <h5 class="title">TOP UP GAMES</h5>
            </div>
            <a href="#0" class="view-more cl-1">View All</a>
        </div>
        <div class="row mb-24-none justify-content-center">
            @foreach ($items as $item)
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="javascript:void(0)" class="promo__item__2">
                        <img src="{{ imageFile('public/assets/admin/img/item/'.'thumb_'.$item->image) }}" alt="promo">
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</section>
