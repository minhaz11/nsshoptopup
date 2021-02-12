@extends('admin.layouts.master')

@section('content')

<div class="container-fluid mt--12 mt-5">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0 d-flex justify-content-between">
            <h3 class="mb-0">Items</h3>
            <a href="{{ route('admin.item.add') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Add new</a>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort">Item image</th>
                  <th scope="col" class="sort">Details</th>
                  <th scope="col" class="sort">Status</th>
                  <th scope="col" class="sort text-right">Action</th>
                </tr>
              </thead>
              <tbody class="list">
                  @forelse ($items as $item)
                  <tr>
                    <th scope="row">
                        <div class="media align-items-center">
                          <a href="#" class="avatar rounded-circle mr-3">
                            <img alt="banner" src="{{ imageFile('public/assets/admin/img/item/'.$item->image) }}">
                          </a>
                          <div class="media-body">
                            <span class="name mb-0 text-sm">{{ $item->item_name }}</span>
                          </div>
                        </div>
                      </th>
                    <td data-label="Details" class="budget">
                        {{ Str::limit($item->details,40) }}
                    </td>


                    <td data-label="Status">
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

                    <td data-label="action" class="text-right">
                        <a href="{{ route('admin.item.edit',$item->id) }}" class="btn btn-primary btn-sm edit"><i class="fas fa-edit"></i> </a>

                        <a href="{{ route('admin.item.remove',$item->id) }}" class="btn btn-danger btn-sm" target="_blank" rel="noopener noreferrer"><i class="fas fa-trash-alt"></i> </a>
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
           {{ $items->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

