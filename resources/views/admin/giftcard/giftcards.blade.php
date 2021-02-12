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
                  @forelse ($giftcards as $item)
                  <tr>
                    <th scope="row">
                        <div class="media align-items-center">
                          <a href="#" class="avatar rounded-circle mr-3">
                            <img alt="banner" src="{{ imageFile('public/assets/admin/img/giftcard/'.$item->image) }}">
                          </a>
                          <div class="media-body">
                            <span class="name mb-0 text-sm">{{ $item->name }}</span>
                          </div>
                        </div>
                      </th>
                    <td data-label="Details" class="budget">
                        {{ dt($item->created_at,'d M Y') }}
                    </td>

                    <td data-label="action" class="text-right">
                        <a href="{{ route('admin.item.edit',$item->id) }}" class="btn btn-primary btn-sm edit"><i class="fas fa-edit" data-toggle="tooltip" title="edit"></i> </a>

                        <a href="{{ route('admin.item.edit',$item->id) }}" class="btn btn-dark btn-sm edit" data-toggle="tooltip" title="view items"><i class="fas fa-eye"></i> </a>

                        <a href="{{ route('admin.item.remove',$item->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt" data-toggle="tooltip" title="remove"></i> </a>
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
@endsection

