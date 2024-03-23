@extends('dashboard.layouts.MasterDashMetronic')
@section('title') تحديث صوره الصفحه الرئيسيه @endsection
@section('content')
<div class="row" style="margin-top:10px">
    <div class="col-xl-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">تحديث صوره الصفحه الرئيسيه</h3>
                </div>
            </div>
            <form action="{{route('update_index_page_bg_img',$img)}}" method="POST" enctype="multipart/form-data" id="update_index_page_bg_img_form_{{$img->id}}">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-right">الصورة</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="image-input image-input-outline" id="kt_image_1">
                                <div class="image-input-wrapper" style="background-image: url('{{ asset('global_images/' . $img->name) }}')"></div>
                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="bg_img" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="bg_img_remove" />
                                </label>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                            </div>
                            <span class="form-text text-muted">الصوره الخاصه بأول صفحه</span>
                        </div>
                    </div>
                </div>

                <div class="card-footer justify-content-between" >
                    <button type="submit" id="saveButton" style="display: none" form="update_index_page_bg_img_form_{{$img->id}}" class="btn btn-success">حفظ</button>
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
    // عند تغيير الملف
    $('#kt_image_1 input[name="bg_img"]').on('change', function() {
        $('#saveButton').show();
    });

    // عند النقر على زر إزالة الصورة
    $('#kt_image_1 [data-action="cancel"]').on('click', function() {
        $('#saveButton').hide();
    });
});

</script>
@endsection
