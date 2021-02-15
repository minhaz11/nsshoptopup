@extends('layouts.frontend')

@section('content')

        <!--===Page Header===-->
        <section class="game-details-section pt-70 pb-70">
            <div class="container">
                <div class="games-details">
                    <div class="row">

                    </div>
                </div>
            </div>
        </section>

        <!--===Game Section===-->
        <section class="game-details-section pt-70 pb-70">
            <div class="container">
                <div class="games-details">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="game__details">
                                <div class="game__thumbs">
                                    <img class="w-100" src="{{ imageFile('public/assets/admin/img/giftcard/item/'. $cardItem->image) }}" alt="game">
                                </div>
                                <h5 class="title">{{ $cardItem->title }}</h5>


                            </div>
                        </div>
                        <div class="col-lg-7">
                            <form action="{{ route('cardItem.order',$cardItem->id) }}" method="POST">
                                @csrf

                                <div class="games__step__item open active">
                                    <div class="step__title">
                                        <span class="sl">01</span><h5 class="title">Select Quantity</h5>
                                    </div>
                                    <div class="step__body">

                                            <div class="step__form__group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="my-addon"><button class="minus btn btn-danger btn-sm" type="button">-</button></span>
                                                </div>
                                                <input type="number" value="1" name="quantity" class="form-control qty" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="my-addon"><button type="button" class="btn btn-primary btn-sm plus">+</button></span>
                                                </div>
                                            </div>

                                    </div>


                                </div>
                                <div class="games__step__item open active">
                                    <div class="step__title">
                                        <span class="sl">02</span><h5 class="title">Amount</h5>
                                    </div>
                                    <div class="step__body">
                                        <ul class="list-group">
                                            <li class="section--bg list-group-item d-flex justify-content-between">Price
                                                <span class="text--theme price">
                                                  {{ getNumber($cardItem->price) }} BDT
                                                </span>
                                             </li>
                                            <li class="section--bg list-group-item d-flex justify-content-between" aria-disabled="true">Total Payable
                                                <span class="text--theme price">{{ getNumber($cardItem->price) }} BDT </span>
                                            </li>
                                        </ul>
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
            $('.plus').click(function () {

                if($('.qty').val()==''){
                    $('.qty').val(1)
                    return false;
                }
                var initial = $('.qty').val();
                $('.qty').val(parseInt(initial)+1)

                var price = '{{ $cardItem->price }}';
                var final = parseFloat(price)*parseFloat($('.qty').val())
                $('.price').text(final+' '+'BDT')


             })

            $('.minus').click(function () {

                if($('.qty').val()==''){
                    $('.qty').val(1)
                    return false;
                }
                var initial = $('.qty').val();
                    if(initial <= 1 ){
                        return false;
                    }
                $('.qty').val(parseInt(initial)-1)
                var price = '{{ $cardItem->price }}';
                var final = parseFloat(price)*parseFloat($('.qty').val())
                $('.price').text(final+' '+'BDT')
             })

             $('.qty').on('input keyup',function () {
                var price = '{{ $cardItem->price }}';
                if($(this).val()!=''){
                    var final = parseFloat(price)*parseFloat($(this).val())
                    $('.price').text(final+' '+'BDT')
                } else {
                    $('.price').text(parseFloat(price)+' '+'BDT')
                }
              })


        </script>

@endpush
