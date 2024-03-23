@extends('dashboard.layouts.MasterDashMetronic')
@section('title') تحديث صورة مدينة :- {{$city->name}} @endsection
@section('content')
<div class="row" style="margin-top:10px">
    <div class="col-xl-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">تحديث صورة مدينة :- {{$city->name}}</h3>
                </div>
            </div>
            <form action="{{route('update_city',$city)}}" method="POST" enctype="multipart/form-data" id="update_city_form_{{$city->id}}">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-right">الصورة</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="image-input image-input-outline" id="kt_image_1">
                                <div class="image-input-wrapper" style="background-image: url('{{ asset('cities_images/' . $city->bg_img) }}')"></div>
                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="bg_img" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="bg_img_remove" />
                                </label>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                            </div>
                            <span class="form-text text-muted">ارفق صورة الخلفية الخاصة بالمدينة (طيران)</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-right">الصوره الثانيه</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="image-input image-input-outline" id="kt_image_2">
                                <div class="image-input-wrapper" style="background-image: url('{{ asset('cities_images/' . $city->bg_img_train) }}')"></div>
                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="bg_img_train" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="bg_img_train_remove" />
                                </label>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                            </div>
                            <span class="form-text text-muted">ارفق صورة الخلفية الخاصة بالمدينة (قطار)</span>
                        </div>
                    </div>
                </div>

                <div class="card-footer justify-content-between" >
                    <a href="{{route('index_cities')}}" class="btn btn-secondary" role="button">الغاء</a>
                    <button type="submit" id="saveButton" style="display: none" form="update_city_form_{{$city->id}}" class="btn btn-success">حفظ</button>
                </div>
            </form>
        </div>
        <!--end::Card-->
    </div>
</div>
@endsection
@section('js')
<script src="{{ URL::asset('dashboard/assets/js/pages/crud/file-upload/image-input.js') }}"></script>
<script>
    $(document).ready(function() {
        var image1Changed = false;
        var image2Changed = false;

        $('#kt_image_1 input[name="bg_img"]').on('change', function() {
            image1Changed = true;
            showOrHideSaveButton();
        });

        $('#kt_image_1 [data-action="cancel"]').on('click', function() {
            image1Changed = false;
            showOrHideSaveButton();
        });

        $('#kt_image_2 input[name="bg_img_train"]').on('change', function() {
            image2Changed = true;
            showOrHideSaveButton();
        });

        $('#kt_image_2 [data-action="cancel"]').on('click', function() {
            image2Changed = false;
            showOrHideSaveButton();
        });

        function showOrHideSaveButton() {
            if (image1Changed || image2Changed) {
                $('#saveButton').show();
            } else {
                $('#saveButton').hide();
            }
        }
    });
</script>


@endsection
