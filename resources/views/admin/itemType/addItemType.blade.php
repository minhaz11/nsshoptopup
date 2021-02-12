@extends('admin.layouts.master')

@push('css-lib')
<link rel="stylesheet" href="{{ asset('public/assets/admin/css/checkbox.css') }}" type="text/css">

@endpush

@section('content')

<div class="container-fluid mt--12 mt-5">
    <form method="post" action="{{ route('admin.type.store') }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">

            <div class="col-md-12">
              <div class="card">
                <!-- Card header -->
                <div class="card-header border-0 d-flex justify-content-between">
                  <h3 class="mb-0">Add New Item Type</h3>
                  <a href="{{ route('admin.type') }}" class="btn btn-primary btn-sm"> <i class="fas fa-backward"></i> Back</a>
                </div>

                <!-- Light table -->
                <div class="card-body">

                    <div class="form-group">
                        <label>Type Name</label>
                        <input  class="form-control" type="text" name="type_name" value="{{ old('type_name') }}" required>
                    </div>
                   <div class="form-group">
                       <label for="my-select">Select an Item</label>
                       <select id="my-select" class="form-control" name="item_id"  required>
                           <option>--Select Item---</option>
                           @foreach ($items as $item)
                           <option value="{{ $item->id }}">{{ $item->item_name }}</option>
                           @endforeach
                       </select>
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
                <!-- Card footer -->

              </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card border-primary">
                    <h5 class="card-header bg-primary text-white">@lang('Additional (Game ID, Player ID, Social Acc etc) Optional')
                        <button type="button" class="btn btn-sm btn-outline-white float-right additional">
                            <i class="la la-fw la-plus"></i>@lang('Add New')
                        </button>
                    </h5>

                    <div class="card-body">
                        <div class="row addedField">

                        </div>
                    </div>
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


     ///dynamic

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
                                    <option value="text"> @lang('Input Text') </option>
                                    <option value="select"> @lang('Select Box') </option>

                                </select>
                            </div>
                            <div class="col-md-3 mt-md-0 mt-2">
                                <select name="validation[]"
                                        class="form-control">
                                    <option value="required"> @lang('Required') </option>

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

