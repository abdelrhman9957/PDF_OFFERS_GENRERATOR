<div class="card-toolbar">
    <a href="#" class="btn btn-light-success font-weight-bold" data-toggle="modal" data-target="#create_city_modal"><i class="fas fa-plus"></i></a>
</div>
<!-- Modal-->
<div class="modal fade" id="create_city_modal" tabindex="-1" role="dialog" aria-labelledby="create_city_modal_Label" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_city_modal_Label">اضافه مدينه جديده</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form  action="{{route('store_city')}}" method="POST" enctype="multipart/form-data" id="create_city_form">
                    @csrf
                    <div class="card-body">

                        {{-- name --}}
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 control-label">اسم المدينه</label>
                            <input type="Text" value="{{old('name')}}" name="name" class=" form-control col-sm-9"  placeholder="اسم المدينه" required >
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">الصورة الأولى</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="image-input image-input-outline" id="kt_image_1">
                                    <div class="image-input-wrapper" style="background-image: url(assets/media/users/100_1.jpg)"></div>
                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" required name="bg_img" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="bg_img_remove" />
                                    </label>
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                                <span class="form-text text-muted">ارفق صورة الخلفية الخاصة بالمدينة</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">الصورة الثانية</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="image-input image-input-outline" id="kt_image_2">
                                    <div class="image-input-wrapper" style="background-image: url(assets/media/users/100_1.jpg)"></div>
                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="bg_img_train" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="bg_img_train_remove" />
                                    </label>
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                                <span class="form-text text-muted">ارفق صورة الخلفية الثانية الخاصة بالمدينة</span>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                <button type="submit" form="create_city_form" class="btn btn-success">إضافه</button>
            </div>
        </div>
    </div>
</div>



