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
          <div class="card-header d-flex justify-content-between">
            <h3 class="">Item Codes</h3>

            <a href="javascript:void(0)"  data-toggle="modal" data-target="#addModal" class="btn btn-success btn-sm "> <i class="fas fa-plus"></i> Add Code</a>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort">Item name</th>
                  <th scope="col" class="sort">Code</th>
                  <th scope="col" class="sort">Sell Status</th>
                  <th scope="col" class="sort text-right">Action</th>
                </tr>
              </thead>
              <tbody class="list">
                  @forelse ($codes as $code)

                  <tr>

                    <td data-label="Item Name" class="budget">
                        {{ $code->cardItem->title }}
                    </td>
                    <td data-label="code" class="budget">
                        {{ $code->code }}
                    </td>
                    <td data-label="Sell status" class="budget">
                        {{ $code->sold ==1?'sold out':'no sold' }}
                    </td>

                    <td data-label="action" class="text-right">
                     <a href="javascript:void(0)" class="btn btn-primary btn-sm" id="edit"
                        data-code = "{{ $code }}"
                        data-route="{{route('admin.code.store',$code->id)}}"

                        >
                        <i class="fas fa-edit" data-toggle="tooltip" title="edit"></i>
                      </a>


                        <a href="{{ route('admin.code.remove',$code->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt" data-toggle="tooltip" title="remove"></i> </a>
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
           {{ $codes->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
          <form action="{{ route('admin.code.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Code Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="item_id" value="{{ $item_id }}">
                   <div class="form-group">
                     <label for="">Code</label>
                     <input type="text" name="code[]"  class="form-control" placeholder="Code" value="{{ old('code') }}" required>
                   </div>
                   <div class="field ">

                   </div>
                   <div class="form-group text-right">
                    <button type="button" class="btn btn-success btn-sm addmore"> + Add more</button>
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



  <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Update Code</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
              </div>
              <div class="modal-body">

                 <div class="form-group">
                   <label for="">Code</label>
                   <input type="text" name="code"  class="form-control" placeholder="Code"  required>
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
  $('.addmore').click(function () {

    var el = `
       <div class = "row">
        <div class="form-group col-md-10">
        <input type="text" name="code[]"  class="form-control" placeholder="Code" value="{{ old('code') }}" required>
       </div>
       <div class="form-group col-md-2 mt-1">
            <button type="button"  class="btn btn-danger remove"><i class = "fas fa-times-circle"></i></button>
        </div>

        </div>



                   `
    $('.field').append(el);

  });


    $(document).on('click','.remove', function(){
        $(this).parent().parent().remove()
    })

    $('#edit').click(function(){
        var code = $(this).data('code')
        var route = $(this).data('route')
        $('#editModal').find('input[name=code]').val(code.code)
        $('#editModal').find('form').attr('action',route)
        $('#editModal').modal('show')

    })




</script>

@endpush
