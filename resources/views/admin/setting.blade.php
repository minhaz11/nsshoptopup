@extends('admin.layouts.master')

@push('css-lib')
<link rel="stylesheet" href="{{ asset('public/assets/admin/css/checkbox.css') }}" type="text/css">

@endpush

@section('content')

<div class="container-fluid mt--12 mt-5">
    <form method="post" action="{{ route('admin.setting.update') }}" enctype="multipart/form-data">

        @csrf
        <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card">
                <!-- Card header -->
                <div class="card-header border-0 d-flex justify-content-between">
                  <h3 class="mb-0">Site Setting</h3>

                </div>

                <!-- Light table -->
                <div class="card-body">


                  <div class="form-group">
                    <label for=""><strong>Site Name</strong></label>
                    <input type="text" name="sitename"  class="form-control" placeholder="Site name" required value="{{config('setting.sitename.name') }}">
                  </div>

                  <div class="image-preview mb-4">
                    <img src="{{ imageFile(config('setting.logo.path').'/logo.png') }}" id="previewImg" class="w-100 h-50" alt="">
                  </div>

                  <label for="" class="mt-3"><strong>Logo</strong></label>
                 <div class="custom-file">
                     <input class="custom-file-input" type="file" accept=".png,.jpg,.JPG,.PNG,.jpeg" name="logo" id="imageFile">
                     <label for="my-input" class="custom-file-label">logo</label>
                 </div>

                 <label for="" class="mt-3"><strong>Fav icon</strong></label>
                 <div class="custom-file ">
                     <input class="custom-file-input" type="file" accept=".png,.jpg,.JPG,.PNG" name="favicon" id="imageFile">
                     <label for="my-input" class="custom-file-label">Fav icon</label>
                 </div>


                </div>
                <!-- Card footer -->

              </div>
            </div>

        </div>

        <div class="row pb-4">
            <div class="col-lg-12 col-md-12">
                <button type="submit" class="btn btn-success btn-block"  role="button">Submit</button>
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
