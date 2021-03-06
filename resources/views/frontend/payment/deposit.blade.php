@extends('layouts.frontend')



@section('content')

  <!--===Send Money===-->
  <section class="pt-100 pb-100">
    <div class="container">
        <div class="row">
            @foreach($gatewayCurrency as $data)

                <div class="col-lg-3 col-md-3 mb-4">
                    <div class="card card-deposit">
                        <h6 class="card-header text-center text-secondary">{{__($data->name)}}
                        </h6>
                        <div class="card-body card-body-deposit">
                            <img src="{{imageFile('public/assets/images/gateway/','200x200')}}}" class="card-img-top" alt="{{$data->name}}" class="w-100">
                        </div>
                        <div class="card-footer">
                            <a href="javascript:void(0)"  data-id="{{$data->id}}" data-resource="{{$data}}"
                               data-min_amount="{{getNumber($data->min_amount)}}"
                               data-max_amount="{{getNumber($data->max_amount)}}"
                               data-base_symbol="{{$data->baseSymbol()}}"
                               data-fix_charge="{{getNumber($data->fixed_charge)}}"
                               data-percent_charge="{{getNumber($data->percent_charge)}}" class=" btn btn-block custom-button deposit" data-toggle="modal" data-target="#exampleModal">
                                @lang('Deposit Now')</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--===Send Money===-->




    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <strong class="modal-title method-name" id="exampleModalLabel"></strong>
                    <a href="javascript:void(0)" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <form action="{{route('deposit.insert')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <p class="text-danger depositLimit"></p>
                        <p class="text-danger depositCharge"></p>
                        <div class="form-group">
                            <input type="hidden" name="currency" class="edit-currency" value="">
                            <input type="hidden" name="method_code" class="edit-method-code" value="">
                        </div>
                        <div class="form-group">
                            <label>@lang('Enter Amount'):</label>
                            <div class="input-group">
                                <input id="amount" type="text" class="form-control form-control-lg" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" name="amount" placeholder="0.00" required=""
                                {{ $orderDetails ? 'readonly':'' }}
                                 value="{{ $orderDetails ? getNumber($orderDetails->amount,2) :old('amount')}}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text currency-addon addon-bg">BDT</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn-primary">@lang('Confirm')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop



@push('js')
    <script>
        $(document).ready(function(){
            $('.deposit').on('click', function () {
                var id = $(this).data('id');
                var result = $(this).data('resource');

                var minAmount = $(this).data('min_amount');
                var maxAmount = $(this).data('max_amount');
                var baseSymbol = "BDT";
                var fixCharge = $(this).data('fix_charge');
                var percentCharge = $(this).data('percent_charge');

                var depositLimit = `@lang('Deposit Limit:') ${minAmount} - ${maxAmount}  ${baseSymbol}`;
                $('.depositLimit').text(depositLimit);
                var depositCharge = `@lang('Charge:') ${fixCharge} ${baseSymbol}  ${(0 < percentCharge) ? ' + ' +percentCharge + ' % ' : ''}`;
                $('.depositCharge').text(depositCharge);
                $('.method-name').text(`@lang('Payment By ') ${result.name}`);
                $('.currency-addon').text(baseSymbol);


                $('.edit-currency').val(result.currency);
                $('.edit-method-code').val(result.method_code);
            });
        });
    </script>
@endpush
