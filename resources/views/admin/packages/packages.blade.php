@extends('admin.layouts.master')

@push('css-lib')
<link rel="stylesheet" href="{{ asset('public/assets/admin/css/checkbox.css') }}" type="text/css">
@endpush

@section('content')

<div class="container-fluid mt--12 mt-5">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0 d-flex justify-content-between">
            <h3 class="mb-0">Packages</h3>
            <a href="javascript:void(0)" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#addModal"> <i class="fas fa-plus"></i> Add new</a>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort">Item Type</th>
                  <th scope="col" class="sort">Quantity</th>
                  <th scope="col" class="sort">Attribute</th>
                  <th scope="col" class="sort">Price</th>
                  <th scope="col" class="sort">Status</th>
                  <th scope="col" class="sort text-right">Action</th>
                </tr>
              </thead>
              <tbody class="list">
                  @forelse ($packages as $package)
                  <tr>

                    <td data-label="Item Type" class="budget">
                        {{ $package->itemType->type_name }}
                    </td>
                    <td data-label="Quantity" class="budget">
                        {{ $package->qty }}
                    </td>
                    <td data-label="Attribute" class="budget">
                        {{ $package->attribute }}
                    </td>
                    <td data-label="Price" class="budget">
                        {{ getNumber($package->price) }}
                    </td>


                    <td data-label="Status">
                        @if($package->status == 1)
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

                    <td data-label="Action" class="text-right">
                        <a href="javascript:void(0)" class="btn btn-primary btn-sm edit"

                        data-package = "{{ $package }}"
                        data-route = "{{ route('admin.package.store',$package->id) }}"

                        ><i class="fas fa-edit"></i> </a>

                        <a href="{{ route('admin.item.remove',$package->id) }}" class="btn btn-danger btn-sm" target="_blank" rel="noopener noreferrer"><i class="fas fa-trash-alt"></i> </a>
                    </td>
                  </tr>
                   @empty
                    <tr>
                        <td colspan="12" class="text-center">
                            No data!
                        </td>
                    </tr>
                  @endforelse


              </tbody>
            </table>
          </div>
          <!-- Card footer -->
          <div class="card-footer py-4">
           {{ $packages->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <form action="{{ route('admin.package.store') }}" method="POST">
              @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Package</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Select Item Type</label>
                        <select  class="form-control" name="item_type_id" required>
                            <option>--Select Item Type--</option>
                            @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Quantity</label>
                        <input class="form-control" type="number" name="qty" value="{{ old('qty') }}" placeholder="Quantity" required >
                    </div>
                    <div class="form-group">
                        <label>Attribute</label>
                        <input class="form-control" type="text" name="attribute" value="{{ old('attribute') }}" placeholder="e.g: diamond,coin, etc." required >
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" type="number" name="price" value="{{ old('price') }}" placeholder="price" required >
                    </div>

                    <ul class="list-group my-3">
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="margin-r">Status:</span>
                            <label class="el-switch d-flex justfy-content-between">
                                <input type="checkbox" name="status">
                                <span class="el-switch-style"></span>
                            </label>

                        </li>
                    </ul>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
          </form>
      </div>
  </div>

  {{-- edit modal --}}
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="POST">
            @csrf
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Update Package</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
              </div>
              <div class="modal-body">

                  <div class="form-group">
                      <label>Select Item Type</label>
                      <select  class="form-control" name="item_type_id" required>
                          <option>--Select Item Type--</option>
                          @foreach ($types as $type)
                          <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                          @endforeach
                      </select>
                  </div>

                  <div class="form-group">
                      <label>Quantity</label>
                      <input class="form-control" type="number" name="qty" value="" placeholder="Quantity" required >
                  </div>
                  <div class="form-group">
                      <label>Attribute</label>
                      <input class="form-control" type="text" name="attribute" value="" placeholder="e.g: diamond,coin, etc." required >
                  </div>
                  <div class="form-group">
                      <label>Price</label>
                      <input class="form-control" type="number" name="price" value="" placeholder="price" required >
                  </div>

                  <ul class="list-group my-3">
                      <li class="list-group-item d-flex justify-content-between">
                          <span class="margin-r">Status:</span>
                          <label class="el-switch d-flex justfy-content-between">
                              <input type="checkbox" name="status">
                              <span class="el-switch-style"></span>
                          </label>

                      </li>
                  </ul>

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </div>
        </form>
    </div>
</div>
@endsection

@push('js')
    <script>
        $('.edit').click(function () {
            var package = $(this).data('package')
            var route = $(this).data('route')
            var modal = $('#editModal')

            modal.find('select[name=item_type_id]').val(package.item_type_id)
            modal.find('input[name=qty]').val(package.qty)
            modal.find('input[name=attribute]').val(package.attribute)
            modal.find('input[name=price]').val(package.price)
            if(package.status == 1){

                modal.find('input[name=status]').attr('checked',true)
            }
            modal.find('form').attr('action',route)
            modal.modal('show')
        });
    </script>
@endpush
