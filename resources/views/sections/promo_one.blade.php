
<section class="promo-section pb-70 section--bg">
    <div class="container">
        <div class="section-title">
            <div class="d-flex align-items-center">
                <div class="section-title-icon mr-2">
                    <img src="{{ asset('public/assets/frontend/images/icons/gold.png') }}" alt="icons">
                </div>
                <h5 class="title">GAMES Credit/Top Up</h5>
            </div>
            <a href="#0" class="view-more cl-1">View All</a>
        </div>
        <div class="row mb-24-none justify-content-center">
            @foreach ($itemTypes as $itemType)
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="{{ route('item.view',[ Str::slug($itemType->item->item_name),$itemType->id]) }}" class="promo__item__2">
                        <img src="{{ imageFile('public/assets/admin/img/item/'.$itemType->item->image) }}" alt="promo">
                    </a>
                    <p>{{ $itemType->type_name }}</p>
                </div>
            @endforeach

        </div>
    </div>
</section>
