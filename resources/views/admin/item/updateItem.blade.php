@extends('admin.layouts.master')

@push('css-lib')
<link rel="stylesheet" href="{{ asset('public/assets/admin/css/checkbox.css') }}" type="text/css">

@endpush

@section('content')

<div class="container-fluid mt--12 mt-5">
    <form method="post" action="{{ route('admin.item.update',$item->id) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-6">
              <div class="card">
                <!-- Card header -->
                <div class="card-header border-0 d-flex justify-content-between">
                  <h3 class="mb-0">Update New Item</h3>
                  <a href="{{ route('admin.items') }}" class="btn btn-primary btn-sm"> <i class="fas fa-backward"></i> Back</a>
                </div>

                <!-- Light table -->
                <div class="card-body">

                    <div class="form-group">
                        <label for=""><strong>Category</strong></label>
                         <select class="form-control" name="category_id">
                             @foreach ($categories as $cat)
                              <option value="{{ $cat->id }}" {{ $cat->id == $item->category_id ? 'selected':'' }}>{{ $cat->name }}</option>
                             @endforeach
                         </select>
                    </div>


                  <div class="form-group">
                    <label for=""><strong>Item name</strong></label>
                    <input type="text" name="item_name"  class="form-control" placeholder="Item name" required value="{{ $item->item_name }}">
                  </div>

                  <div class="form-group">
                    <label for=""><strong>Details</strong></label>
                    <textarea name="details"  class="form-control" placeholder="Details" required>{{ $item->details }} </textarea>
                  </div>

                  <div class="form-group">
                    <label for=""><strong>Apple Store Link</strong></label>
                    <input type="text" name="apple_store"  class="form-control" placeholder="Apple store link" required value="{{ $item->apple_store }}">
                  </div>
                  <div class="form-group">
                    <label for=""><strong>Play Store Link</strong></label>
                    <input type="text" name="play_store"  class="form-control" placeholder="Play store link" required value="{{ $item->play_store }}">
                  </div>



                </div>
                <!-- Card footer -->

              </div>
            </div>
            <div class="col-md-6">
               <div class="card">

                        <div class="card-header border-0 d-flex justify-content-between">
                            <h3 class="mb-0">Item Image</h3>
                        </div>

                    <div class="card-body">
                       <div class="image-preview mb-4">
                            <img src="{{ imageFile('public/assets/admin/img/item/'.$item->image) }}" id="previewImg" class="w-100 h-50" alt="">
                       </div>

                         <div class="custom-file">
                             <input class="custom-file-input" type="file" accept=".png,.jpg,.JPG,.PNG" name="image" id="imageFile">
                             <label for="my-input" class="custom-file-label">Image</label>
                         </div>

                         <ul class="list-group my-3">
                            <li class="list-group-item d-flex justify-content-between">
                             <span class="margin-r">Status:</span>
                             <label class="el-switch d-flex justfy-content-between">
                                 <input type="checkbox" name="status" @if($item->status) checked @endif>
                                 <span class="el-switch-style"></span>
                             </label>

                         </li>

                        </ul>
                    </div>

                </div>
                  <!-- Card footer -->

                </div>
        </div>


        <div class="row pb-4">
            <div class="col-lg-12 col-md-12">
                <button type="submit" class="btn btn-success btn-block"  role="button">Update</button>
            </div>
        </div>

    </form>
</div>

@endsection

@push('js')

<script>
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



   


            $(document).on('click', '.removeBtn', function () {
                $(this).closest('.user-data').remove();
            });
</script>

@endpush
