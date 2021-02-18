@extends('layouts.frontend')

@section('content')

    <!--===Game Section===-->
        <section class="game-details-section pt-70 pb-70">
            <div class="container">
                <div class="games-details">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="game__details">
                                <div class="game__thumbs">
                                    <img class="w-100" src="{{ imageFile('public/assets/admin/img/item/'.'thumb_'.$type->item->image) }}" alt="game">
                                </div>
                                <h5 class="title">{{ $type->item->item_name }}</h5>
                                <p>
                                    {!! $type->item->details !!}
                                </p>
                                <div class="apps__btn__area">
                                    <a href="{{ $type->item->apple_store }}" target="_blank">
                                        <img src="{{ asset('public/assets/frontend/images/game/app-store-btn.svg') }}" alt="applestore">
                                    </a>
                                    <a href="{{ $type->item->play_store }}" target="_blank">
                                        <img src="{{ asset('public/assets/frontend/images/game/google-play.svg') }}" alt="playstore">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <form action="{{ route('item.order') }}" method="POST">
                                @csrf
                            @if ($type->additional)
                                @foreach ($type->additional as $key => $data)
                                    @if ($data->type == 'text')
                                    <div class="games__step__item open active">
                                        <div class="step__title">
                                            <span class="sl">01</span><h5 class="title">{{ $data->field_level }}</h5>
                                        </div>
                                        <div class="step__body">

                                                <div class="step__form__group">
                                                    <input type="text" name="p_id" placeholder="{{ $data->field_level }}" required>
                                                </div>

                                            <span class="fz-sm">Your player ID is shown on the profile page in game the app. Example: <span class="text--theme">“5363266446"</span>.</span>
                                        </div>
                                    </div>

                                    @elseif($data->type == 'select')

                                    <div class="games__step__item open active">
                                        <div class="step__title">
                                            <span class="sl">01</span><h5 class="title">Account</h5>
                                        </div>
                                        <div class="step__body">

                                                    <div class="step__form__group">
                                                        <label for="">Account Type</label>
                                                        <select name="account_type" id="acc_type" class="form-control">
                                                            <option value="facebook">Facebook</option>
                                                            <option value="gmail">Gmail</option>
                                                        </select>
                                                    </div>
                                                    <div class="facebook">
                                                        <div class="step__form__group mt-4">
                                                        <input type="text" name="fb_number" placeholder="Facebook number">
                                                    </div>

                                                        <div class="step__form__group mt-4">
                                                            <input type="password" name="fb_password" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="gmail d-none">
                                                        <div class="step__form__group mt-4">
                                                        <input type="text" name="gmail" placeholder="Email">
                                                    </div>

                                                        <div class="step__form__group mt-4">
                                                            <input type="password" name="g_password" placeholder="password">
                                                        </div>
                                                    </div>


                                        </div>
                                    </div>

                                    @endif

                                @endforeach
                            @endif

                            <div class="games__step__item open active">
                                <div class="step__title">
                                    <span class="sl">02</span><h5 class="title">Select Recharge <small class="text--theme text-right pay"></small></h5>

                                </div>
                                <div class="step__body">
                                    <div class="recharge__options">
                                        @foreach ($type->packages as $key => $pkg)

                                        <div class="recharge__item">
                                            <div class="recharge__inner">
                                                <input type="radio" name="pkg_id" class="hide__input" value="{{ $pkg->id }}" id="recharge_{{ $key }}" required>
                                                <label for="recharge_{{ $key }}" class="package--amount">
                                                    {{ $pkg->qty }} <small>{{ $pkg->attribute }}</small> <small class="text--theme d-none price">{{ getNumber($pkg->price) }} BDT</small>
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                            <div class="games__step__item open active">
                                <div class="step__title">
                                    <span class="sl">03</span><h5 class="title">Buy</h5>
                                </div>
                                <div class="step__body">
                                        <div class="text-right">
                                            <button type="submit" class="custom-button border-0 btn-block">Next</button>
                                        </div>

                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--===Game Section===-->
@endsection

@push('js')

        <script>
            $('.package--amount').click(function () {
               var price = $(this).find('.price').text()
               $('.pay').text(price)
             })

             $('#acc_type').on('change',function(){
                 if($(this).val()=='gmail'){
                     $('.gmail').removeClass('d-none')
                     $('.facebook').addClass('d-none')
                 } else{
                    $('.facebook').removeClass('d-none')
                     $('.gmail').addClass('d-none')
                 }
             })
        </script>

@endpush
