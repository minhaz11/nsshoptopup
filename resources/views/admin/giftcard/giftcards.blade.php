@extends('admin.layouts.master')

@section('content')

<div class="container-fluid mt--12 mt-5">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0 d-flex justify-content-between">
            <h3 class="mb-0">Gift Cards</h3>
            <a href="javascript:void(0)"  data-toggle="modal" data-target="#addModal" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Add new</a>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort">Image</th>
                  <th scope="col" class="sort">Created at</th>
                  <th scope="col" class="sort text-right">Action</th>
                </tr>
              </thead>
              <tbody class="list">
                  @forelse ($giftcards as $giftcard)
                  <tr>
                    <th scope="row">
                        <div class="media align-items-center">
                          <a href="#" class="avatar rounded-circle mr-3">
                            <img alt="banner" src="{{ imageFile('public/assets/admin/img/giftcard/'.$giftcard->image) }}">
                          </a>
                          <div class="media-body">
                            <span class="name mb-0 text-sm">{{ $giftcard->name }}</span>
                          </div>
                        </div>
                      </th>
                    <td data-label="Details" class="budget">
                        {{ dt($giftcard->created_at,'d M Y') }}
                    </td>

                    <td data-label="action" class="text-right">
                        <a href="javascript:void(0)" class="btn btn-primary btn-sm edit" data-card="{{$giftcard}}" data-route="{{route('admin.giftcard.store',$giftcard->id)}}" data-img="{{imageFile('public/assets/admin/img/giftcard/'.$giftcard->image)}}"><i class="fas fa-edit" data-toggle="tooltip" title="edit"></i></a>

                        <a href="{{route('admin.giftcard.items',$giftcard->id) }}" class="btn btn-dark btn-sm" data-toggle="tooltip" title="view giftcard items"><i class="fas fa-eye"></i> </a>

                        <a href="{{ route('admin.giftcard.remove',$giftcard->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt" data-toggle="tooltip" title="remove"></i> </a>
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
           {{ $giftcards->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
          <form action="{{ route('admin.giftcard.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Gift Card</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                   <div class="form-group">
                     <label for="">Name</label>
                     <input type="text" name="name"  class="form-control" placeholder="Gift Card name" value="{{ old('name') }}" required>
                   </div>
                   <div class="form-group">
                     <label for="">Image</label>
                     <input type="file" name="image"  class="form-control" placeholder="Gift Card name" required>
                   </div>
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
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Add Gift Card</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
              </div>
              <div class="modal-body">
                 <div class="form-group">
                   <label for="">Name</label>
                   <input type="text" name="name"  class="form-control" placeholder="Gift Card name" value="{{ old('name') }}" required>
                 </div>
                 <div class="form-group text-center">
                   <img src="" alt="" id="previewImg" class="w-50 h-50 thumbnail border">
                 </div>
                 <div class="form-group">
                   <label for="">Image</label>
                   <input type="file" name="image" id="imageFile"  class="form-control" placeholder="Gift Card name">
                 </div>
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
    var card = $(this).data('card')
    var route = $(this).data('route')
    var img = $(this).data('img')
    var modal = $('#editModal')
    modal.find('input[name=name]').val(card.name)
    modal.find('img').attr('src',img)
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
