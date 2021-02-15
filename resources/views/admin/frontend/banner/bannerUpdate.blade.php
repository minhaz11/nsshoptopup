@extends('admin.layouts.master')

@push('css-lib')
<link rel="stylesheet" href="{{ asset('public/assets/admin/css/checkbox.css') }}" type="text/css">

@endpush

@section('content')

<div class="container-fluid mt--12 mt-5">
    <form method="post" action="{{ route('admin.banner.update',$banner->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
              <div class="card">
                <!-- Card header -->
                <div class="card-header border-0 d-flex justify-content-between">
                  <h3 class="mb-0">Update Banner</h3>
                </div>
                <!-- Light table -->
                <div class="card-body">


                  <div class="form-group">
                    <label for=""><strong>Heading</strong></label>
                    <input type="text" name="heading"  class="form-control" placeholder="Banner Heading" required value="{{ $banner->heading }}">
                  </div>

                  <div class="form-group">
                    <label for=""><strong>Short Details</strong></label>
                    <input type="text" name="short_details"  class="form-control" placeholder="Short Details" required value="{{ $banner->short_details }}">
                  </div>

                  <div class="form-group">
                    <label for=""><strong>Link</strong></label>
                    <input type="text" name="link"  class="form-control" placeholder="Redirect Url" required value="{{ $banner->link }}">
                  </div>


                  <ul class="list-group my-3">
                    <li class="list-group-item d-flex justify-content-between">
                     <span class="margin-r">Status:</span>
                     <label class="el-switch d-flex justfy-content-between">
                         <input type="checkbox" name="status" @if($banner->status==1) checked @endif>
                         <span class="el-switch-style"></span>
                     </label>

                 </li>

                </ul>



                </div>
                <!-- Card footer -->

              </div>
            </div>
            <div class="col-md-6">
               <div class="card">

                        <div class="card-header border-0 d-flex justify-content-between">
                            <h3 class="mb-0">Banner Image</h3>
                          </div>

                    <div class="card-body">
                       <div class="image-preview mb-4">
                            <img src="{{ imageFile('public/assets/admin/img/banner/'.$banner->image) }}" id="previewImg" class="w-100 h-50" alt="">
                       </div>

                         <div class="custom-file">
                             <input class="custom-file-input" type="file" accept=".png,.jpg,.JPG,.PNG" name="image" id="imageFile">
                             <label for="my-input" class="custom-file-label">Image</label>
                         </div>
                    </div>

                </div>
                  <!-- Card footer -->

                </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <button type="submit" class="btn btn-primary btn-block"  role="button">Save Changes</button>
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
</script>

@endpush
