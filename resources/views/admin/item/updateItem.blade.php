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

        <div class="row">
            <div class="col-lg-12">
                <div class="card border-primary">

                    <h5 class="card-header bg-primary text-white">@lang('Additional (Game ID, User ID etc)')
                        <button type="button"
                                class="btn btn-sm btn-outline-white float-right additional">
                            <i class="la la-fw la-plus"></i>@lang('Add New')
                        </button>
                    </h5>


                    <div class="card-body">
                        <div class="row addedField">

                            @if($item->additional != null)
                                @foreach($item->additional as $key => $data)
                                    <div class="col-md-12 user-data">
                                        <div class="form-group">
                                            <div class="input-group mb-md-0 mb-4">
                                                <div class="col-md-4">
                                                    <input name="field_name[]"
                                                           class="form-control" type="text"
                                                           value="{{$data->field_level}}" required
                                                           placeholder="Field Name">
                                                </div>
                                                <div class="col-md-3 mt-md-0 mt-2">
                                                    <select name="type[]" class="form-control">
                                                        <option value="text"
                                                                @if($data->type == 'text') selected @endif> @lang('Input Text') </option>

                                                    </select>
                                                </div>
                                                <div class="col-md-3 mt-md-0 mt-2">
                                                    <select name="validation[]"
                                                            class="form-control">
                                                        <option value="required"
                                                                @if($data->validation == 'required') selected @endif> @lang('Required') </option>

                                                    </select>
                                                </div>
                                                <div class="col-md-2 mt-md-0 mt-2 text-right">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-danger btn-lg removeBtn w-100"
                                                                type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
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



     $('.additional').on('click', function () {
                var html = `
                <div class="col-md-12 user-data">
                    <div class="form-group">
                        <div class="input-group mb-md-0 mb-4">
                            <div class="col-md-4">
                                <input name="field_name[]" class="form-control" type="text" value="" required placeholder="Field Name">
                            </div>
                            <div class="col-md-3 mt-md-0 mt-2">
                                <select name="type[]" class="form-control">
                                    <option value="text" > Input Text </option>

                                </select>
                            </div>
                            <div class="col-md-3 mt-md-0 mt-2">
                                <select name="validation[]"
                                        class="form-control">
                                    <option value="required"> Required </option>

                                </select>
                            </div>
                            <div class="col-md-2 mt-md-0 mt-2 text-right">
                                <span class="input-group-btn">
                                    <button class="btn btn-danger btn-lg removeBtn w-100" type="button">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>`;

                $('.addedField').append(html);
            });


            $(document).on('click', '.removeBtn', function () {
                $(this).closest('.user-data').remove();
            });
</script>

@endpush
