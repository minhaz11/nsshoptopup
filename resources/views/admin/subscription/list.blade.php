@extends('admin.layouts.master')

@section('content')

<div class="container-fluid mt--12 mt-5">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0 d-flex justify-content-between">
            <h3 class="mb-0">Subscriptions</h3>
            <a href="" data-toggle="modal" data-target="#add-modal" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Add new</a>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort">Title</th>
                  <th scope="col" class="sort">Price</th>
                  <th scope="col" class="sort">Discount</th>
                  <th scope="col" class="sort" >Duration</th>
                  <th scope="col" class="sort" >Status</th>
                  <th scope="col" class="sort">Created at</th>
                  <th scope="col" class="sort text-right">Action</th>
                </tr>
              </thead>
              <tbody class="list">
                  @foreach ($subscription as $item)
                  <tr>
                    <td data-label="Title" class="budget">
                        {{ $item->title }}
                    </td>

                    <td data-label="Price" class="budget">
                        {{ number_format($item->price,2) }}
                    </td>
                    <td data-label="Discount" class="budget">
                        {{ $item->discount }}%
                    </td>

                    <td data-label="Duration">
                        {{ $item->duration }} days
                    </td>

                    <td data-label="Discount">
                        @if($item->status == 1)
                        <span class="badge badge-dot mr-4">
                            <i class="bg-success"></i>
                            <span class="status">active</span>
                        </span>
                        @else
                        <span class="badge badge-dot mr-4">
                            <i class="bg-warning"></i>
                            <span class="status">inactive</span>
                        </span>
                        @endif
                    </td>


                    <td data-label="Created at">
                        {{ date($item->created_at) }}
                    </td>

                    <td class="text-right">
                        <a href="javascript:void()" class="btn btn-primary btn-sm edit"
                        data-title="{{ $item->title }}"
                        data-price="{{ $item->price }}"
                        data-discount="{{ $item->discount }}"
                        data-duration="{{ $item->duration }}"
                        data-status="{{ $item->status }}"
                        data-route="{{ route('admin.subscription.update',$item->id) }}"
                        ><i class="fas fa-edit"></i> </a>

                        <a href="" class="btn btn-danger btn-sm" target="_blank" rel="noopener noreferrer"><i class="fas fa-trash-alt"></i> </a>
                    </td>
                  </tr>
                  @endforeach


              </tbody>
            </table>
          </div>
          <!-- Card footer -->
          <div class="card-footer py-4">
           {{ $subscription->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>

 {{-- add modal --}}
  <div id="add-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form action="{{ route('admin.subscription.store') }}" method="POST">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="my-modal-title">Add new subscription</h5>
                  <button class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label for="my-input">Title</label>
                    <input  class="form-control" type="text" name="title" value="{{ old('title') }}" required>
                </div>
                <div class="form-group">
                    <label for="my-input">Price</label>
                    <input  class="form-control" type="text" name="price" value="{{ old('price') }}" required>
                </div>
                    <div class="form-group">
                        <label>Discount(%)</label>
                        <input  class="form-control" type="text" name="discount" value="{{ old('discount') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Duration(days)</label>
                        <input  class="form-control" type="text" name="duration" value="{{ old('duration') }}" required>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input  class="form-control" type="checkbox" name="status">
                    </div>

              </div>
              <div class="modal-footer">
                <button type="submit"  class="btn btn-primary btn-lg btn-block">Save</button>
              </div>
          </div>
        </form>
      </div>
  </div>

  {{-- edit modal --}}
  <div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="" method="POST">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Update subscription</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              @csrf
              <div class="form-group">
                  <label for="my-input">Title</label>
                  <input  class="form-control" type="text" name="title"  required>
              </div>
              <div class="form-group">
                  <label for="my-input">Price</label>
                  <input  class="form-control" type="text" name="price"  required>
              </div>
                  <div class="form-group">
                      <label for="my-input">Discount(%)</label>
                      <input  class="form-control" type="text" name="discount"  required>
                  </div>

                  <div class="form-group">
                      <label for="my-input">Duration(days)</label>
                      <input  class="form-control" type="text" name="duration" required>
                  </div>
                  <div class="form-group">
                      <label>Status</label>
                      <input  class="form-control" type="checkbox" name="status">
                  </div>

            </div>
            <div class="modal-footer">
              <button type="submit"  class="btn btn-primary btn-lg btn-block">Update</button>
            </div>
        </div>
      </form>
    </div>
</div>
@endsection

@push('js')

    <script>
        $('.edit').click(function(){
            var title = $(this).data('title');
            var price = $(this).data('price')
            var duration = $(this).data('duration')
            var discount = $(this).data('discount')
            var status = $(this).data('status')
            var route = $(this).data('route')
            var modal = $('#edit-modal')

            modal.find('input[name=title]').val(title)
            modal.find('input[name=price]').val(price)
            modal.find('input[name=duration]').val(duration)
            modal.find('input[name=discount]').val(discount)
            modal.find('form').attr('action',route)
            if(status == 1){

                modal.find('input[name=status]').attr('checked',true)
            }
            modal.modal('show');
        })
    </script>

@endpush
