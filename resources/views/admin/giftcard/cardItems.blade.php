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
          <div class="card-header border-0 d-flex bd-highlight">
            <h3 class="mb-0 p-2 flex-grow-1 bd-highlight">Gift Card Items</h3>
            <a href="javascript:void(0)"  data-toggle="modal" data-target="#addModal" class="btn btn-primary btn-sm p-2 bd-highlight"> <i class="fas fa-plus"></i> Add new item</a>

            <a href="javascript:void(0)"  data-toggle="modal" data-target="#addModal" class="btn btn-success btn-sm p-2 bd-highlight"> <i class="fas fa-plus"></i> Add Code</a>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort">Image</th>
                  <th scope="col" class="sort">Giftcard Name</th>
                  <th scope="col" class="sort">Price</th>
                  <th scope="col" class="sort">Gift Quantity</th>
                  <th scope="col" class="sort">Stock</th>
                  <th scope="col" class="sort">Status</th>
                  <th scope="col" class="sort">Created at</th>
                  <th scope="col" class="sort text-right">Action</th>
                </tr>
              </thead>
              <tbody class="list">
                  @forelse ($cardItems as $cardItem)
                  <tr>
                    <th scope="row">
                        <div class="media align-items-center">
                          <a href="#" class="avatar rounded-circle mr-3">
                            <img alt="banner" src="{{ imageFile('public/assets/admin/img/giftcard/item/'.$cardItem->image) }}">
                          </a>
                          <div class="media-body">
                            <span class="name mb-0 text-sm">{{ $cardItem->title }}</span>
                          </div>
                        </div>
                      </th>
                    <td data-label="Giftcard Name" class="budget">
                        {{ $cardItem->card->name }}
                    </td>
                    <td data-label="Price" class="budget">
                        {{ getNumber($cardItem->price,2) }}
                    </td>
                    <td data-label="Gift Quantity" class="budget">
                        {{ $cardItem->qty }}
                    </td>
                    <td data-label="Stock" class="budget">
                        {{ $cardItem->stock > 0 ? $cardItem->stock : 'Out of stock' }}
                    </td>
                    <td data-label="Status">
                        @if($cardItem->status == 1)
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
                    <td data-label="Details" class="budget">
                        {{ dt($cardItem->created_at,'d M Y') }}
                    </td>

                    <td data-label="action" class="text-right">
                     <a href="javascript:void(0)" class="btn btn-primary btn-sm" id="edit"
                        data-items = "{{ $cardItem }}"
                        data-route="{{route('admin.giftcard.item.store',$cardItem->id)}}"
                        data-img="{{imageFile('public/assets/admin/img/giftcard/item/'.$cardItem->image)}}"
                        >
                        <i class="fas fa-edit" data-toggle="tooltip" title="edit"></i>
                      </a>

                        <a href="{{route('admin.cardItem.code',$cardItem->id) }}" class="btn btn-dark btn-sm" data-toggle="tooltip" title="view item codes"><i class="fas fa-eye"></i> </a>

                        <a href="{{ route('admin.giftcard.item.remove',$cardItem->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt" data-toggle="tooltip" title="remove"></i> </a>
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
           {{ $cardItems->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
          <form action="{{ route('admin.giftcard.item.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Gift Card Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="card_id" value="{{ $card_id }}">
                   <div class="form-group">
                     <label for="">Title</label>
                     <input type="text" name="title"  class="form-control" placeholder="Item title" value="{{ old('title') }}" required>
                   </div>
                   <div class="form-group">
                     <label for="">Price</label>
                     <input type="text" name="price"  class="form-control" placeholder="Price" value="{{ old('price') }}" required>
                   </div>
                   <div class="form-group">
                     <label for="">Gift Quantity</label>
                     <input type="number" name="qty"  class="form-control" placeholder="Gift Quantity" value="{{ old('qty') }}" required>
                   </div>
                   <div class="form-group">
                     <label for="">Attribute</label>
                     <input type="text" name="attribute"  class="form-control" placeholder="Attribute" value="{{ old('attribute') }}" required>
                   </div>
                   <div class="form-group">
                     <label for="">Stock</label>
                     <input type="number" name="stock"  class="form-control" placeholder="Stock" value="{{ old('stock') }}" required>
                   </div>
                   <div class="form-group">
                     <label for="">Image</label>
                     <input type="file" name="image"  class="form-control"  required>
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
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.giftcard.item.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Add Gift Card Item</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
              </div>
              <div class="modal-body">
                  <input type="hidden" name="card_id" value="{{ $card_id }}">
                 <div class="form-group">
                   <label for="">Title</label>
                   <input type="text" name="title"  class="form-control" placeholder="Item title"  required>
                 </div>
                 <div class="form-group">
                   <label for="">Price</label>
                   <input type="text" name="price"  class="form-control" placeholder="Price"  required>
                 </div>
                 <div class="form-group">
                   <label for="">Gift Quantity</label>
                   <input type="number" name="qty"  class="form-control" placeholder="Gift Quantity"  required>
                 </div>
                 <div class="form-group">
                   <label for="">Attribute</label>
                   <input type="text" name="attribute"  class="form-control" placeholder="Attribute"  required>
                 </div>
                 <div class="form-group">
                   <label for="">Stock</label>
                   <input type="number" name="stock"  class="form-control" placeholder="Stock"  required>
                 </div>

                 <div class="form-group text-center">
                    <img src=""  id="previewImg" class="w-50 h-50 thumbnail border">
                  </div>

                 <div class="form-group">
                   <label for="">Image</label>
                   <input type="file" name="image" id="imageFile"  class="form-control">
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
  $('#edit').click(function () {
    var item = $(this).data('items')
    var route = $(this).data('route')
    var img = $(this).data('img')
    var modal = $('#editModal')
    modal.find('input[name=title]').val(item.title)
    modal.find('input[name=price]').val(item.price)
    modal.find('input[name=qty]').val(item.qty)
    modal.find('input[name=stock]').val(item.stock)
    modal.find('input[name=attribute]').val(item.attribute)
    modal.find('img').attr('src',img)
    if(item.status == 1){
        modal.find('input[name=status]').attr('checked',true)
    }
    modal.find('form').attr('action',route)
    modal.modal('show')


  });

  $(document).ready(function(){

    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
        $('#previewImg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
    }

    $("#imageFile").change(function() {
    readURL(this);
    });

});

</script>

@endpush
