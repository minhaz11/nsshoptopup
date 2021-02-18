@extends('admin.layouts.master')

@section('content')
<div class="container-fluid mt--12 mt-5">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0 d-flex justify-content-between">
            <h3 class="mb-0">Items</h3>
            <a href="" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Add new</a>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead  class="thead-light">
                <tr>
                    <th scope="col">@lang('Gateway')</th>
                    <th scope="col">@lang('Supported Currency')</th>
                    <th scope="col">@lang('Enabled Currency')</th>
                    <th scope="col">@lang('Status')</th>
                    <th scope="col">@lang('Action')</th>
                </tr>
                </thead>
                <tbody>
                @forelse($gateways as $k=>$gateway)
                    <tr>
                        <td data-label="Gateway">
                            <div class="user">
                                <div class="thumb"><img class="w-25" src="{{imageFile('public/assets/images/gateway/'.$gateway->image)}}" alt="image"></div>
                                <span class="name">{{$gateway->name}}</span>
                            </div>
                        </td>


                        <td data-label="Supported Currency">
                            {{ count(json_decode($gateway->supported_currencies,true)) }}
                        </td>
                        <td data-label="Enabled Currency">
                            {{ $gateway->currencies->count() }}
                        </td>


                        <td data-label="Status">
                            @if($gateway->status == 1)
                                <span class="text-small badge font-weight-normal badge-success">@lang('Active')</span>
                            @else
                                <span class="text-small badge font-weight-normal badge-warning">@lang('Disabled')</span>
                            @endif

                        </td>
                        <td data-label="Action">
                            <a href="{{ route('admin.gateway.automatic.edit', $gateway->alias) }}"
                                class="btn btn-sm btn-primary text-white editGatewayBtn" data-toggle="tooltip" title="" data-original-title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>


                            @if($gateway->status == 0)
                                <button data-toggle="modal" data-target="#activateModal"
                                        class="btn btn-sm text-white btn-success ml-1 activateBtn"
                                        data-code="{{$gateway->code}}"
                                        data-name="{{$gateway->name}}" data-original-title="Enable">
                                    <i class="fas fa-eye"></i>
                                </button>
                            @else
                                <button data-toggle="modal" data-target="#deactivateModal"
                                   class="btn btn-sm text-white bg-danger ml-1 deactivateBtn"
                                   data-code="{{$gateway->code}}"
                                   data-name="{{$gateway->name}}" data-original-title="Disable">
                                    <i class="fas fa-eye-slash"></i>
                                </button>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-muted text-center" colspan="100%">{{ $empty_message }}</td>
                    </tr>
                @endforelse

                </tbody>
            </table><!-- table end -->
          </div>
          <!-- Card footer -->
          <div class="card-footer py-4">
            {{-- {{$gateways->links()}} --}}
          </div>
        </div>
      </div>
    </div>
  </div>





    {{-- ACTIVATE METHOD MODAL --}}
    <div id="activateModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Payment Method Activation Confirmation')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.gateway.automatic.activate')}}" method="POST">
                    @csrf
                    <input type="hidden" name="code">
                    <div class="modal-body">
                        <p>@lang('Are you sure to activate') <span class="font-weight-bold method-name"></span> @lang('method?')</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>

                        <button type="submit" class="btn btn--primary">@lang('Activate')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- DEACTIVATE METHOD MODAL --}}
    <div id="deactivateModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Payment Method Disable Confirmation')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.gateway.automatic.deactivate')}}" method="POST">
                    @csrf
                    <input type="hidden" name="code">
                    <div class="modal-body">
                        <p>@lang('Are you sure to disable') <span class="font-weight-bold method-name"></span> @lang('method?')</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--danger">@lang('Disable')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).on('click','.activateBtn',function () {
            var modal = $('#activateModal');
            modal.find('.method-name').text($(this).data('name'));
            modal.find('input[name=code]').val($(this).data('code'));
        });

        $(document).on('click','.deactivateBtn',function () {
            var modal = $('#deactivateModal');
            modal.find('.method-name').text($(this).data('name'));
            modal.find('input[name=code]').val($(this).data('code'));
        });

    </script>
@endpush
