@extends('layouts.frontend')


@section('content')
    <div class="container">
        <div class="row  justify-content-center">
            <div class="col-md-8">

                <div class="card card-deposit text-center">


                    <div class="card-body card-body-deposit">

                        <ul class="list-group text-center">

                            <li class="list-group-item">
                                <img
                                    src="" alt="data"
                                    class="w-100" />
                            </li>


                            <p class="list-group-item">
                                @lang('Amount'):
                                <strong>{{getNumber($data->amount)}} </strong> BDT
                            </p>
                            <p class="list-group-item">
                                @lang('Charge'):
                                <strong>{{getNumber($data->charge)}}</strong> BDT
                            </p>





                            <p class="list-group-item">
                                @lang('Payable'): <strong> {{getNumber($data->amount + $data->charge)}}</strong> BDT
                            </p>

                            <p class="list-group-item">
                                @lang('Conversion Rate'): <strong>1 BDT = {{getNumber($data->rate)}}  {{$data->baseCurrency()}}</strong>
                            </p>


                            <p class="list-group-item">
                                @lang('In') {{$data->baseCurrency()}}:
                                <strong>{{getNumber($data->final_amo)}}</strong>
                            </p>


                            @if($data->gateway->crypto==1)
                                <p class="list-group-item">
                                    @lang('Conversion with')
                                    <b> {{ $data->method_currency }}</b> @lang('and final value will Show on next step')
                                </p>
                            @endif
                        </ul>

                        @if( 1000 >$data->method_code)
                            <a href="{{route('deposit.confirm')}}" class="btn btn-success btn-block py-3 font-weight-bold">@lang('Pay Now')</a>
                        @else
                            <a href="{{route('deposit.manual.confirm')}}" class="btn btn-success btn-block py-3 font-weight-bold">@lang('Pay Now')</a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop


