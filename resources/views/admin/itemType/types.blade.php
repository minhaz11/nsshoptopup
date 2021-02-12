@extends('admin.layouts.master')

@section('content')

<div class="container-fluid mt--12 mt-5">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0 d-flex justify-content-between">
            <h3 class="mb-0">Items</h3>
            <a href="{{ route('admin.type.add') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Add new</a>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort">Item Type name</th>
                  <th scope="col" class="sort">Item Name</th>
                  <th scope="col" class="sort">Status</th>
                  <th scope="col" class="sort text-right">Action</th>
                </tr>
              </thead>
              <tbody class="list">
                  @forelse ($types as $type)
                  <tr>

                    <td data-label="Item Type name" class="budget">
                        {{ $type->type_name }}
                    </td>
                    <td data-label="Item Type name" class="budget">
                        {{ $type->item->item_name }}
                    </td>


                    <td data-label="Status">
                        @if($type->status == 1)
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

                    <td data-label="action" class="text-right">
                        <a href="{{ route('admin.type.edit',$type->id) }}" class="btn btn-primary btn-sm edit"><i class="fas fa-edit"></i> </a>

                        <a href="{{ route('admin.type.remove',$type->id) }}" class="btn btn-danger btn-sm" rel="noopener noreferrer"><i class="fas fa-trash-alt"></i> </a>
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
           {{ $types->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>




@endsection

