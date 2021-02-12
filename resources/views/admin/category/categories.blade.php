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
            <h3 class="mb-0">Categories</h3>
            <a href="{{ route('admin.item.add') }}" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId"> <i class="fas fa-plus"></i> Add new</a>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort">Category name</th>
                  <th scope="col" class="sort">Status</th>
                  <th scope="col" class="sort">Created at</th>
                  <th scope="col" class="sort">Action</th>
                </tr>
              </thead>
              <tbody class="list">
                  @forelse ($categories as $cat)
                  <tr>

                    <td data-label="name" class="budget">
                        {{ $cat->name }}
                    </td>
                    <td data-label="name" class="budget">
                        {{ dt($cat->created_at,'d M Y') }}
                    </td>


                    <td data-label="Status">
                        @if($cat->status == 1)
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

                    <td class="text-right">
                        <a href="javascript:void(0)" class="btn btn-primary btn-sm edit" data-cat="{{ $cat }}" data-route="{{ route('admin.category.store',$cat->id) }}"><i class="fas fa-edit"></i> </a>
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
           {{ $categories->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Modal -->
  <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <form action="{{ route('admin.category.store') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="my-input">Name</label>
                        <input id="my-input" class="form-control" type="text" name="name" required>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
          </form>
      </div>
  </div>

   <!--edit Modal -->
   <div class="modal fade" id="editModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.category.store') }}" method="post">
          @csrf
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Update category</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                      <label for="my-input">Name</label>
                      <input  class="form-control" type="text" name="name" required id="name">
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
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
              </div>
          </div>
        </form>
    </div>
</div>


@endsection

@push('js')

    <script>
        $('.edit').click(function (e) {
            e.preventDefault();
            var data = $(this).data('cat')
            var route = $(this).data('route')
            console.log(data.name);
            $('#name').val(data.name)
            if(data.status == 1){
              $('#status').attr('checked',true)
            }
            $('#editModal').find('form').attr('action',route)
            $('#editModal').modal('show')

        });
    </script>

@endpush


