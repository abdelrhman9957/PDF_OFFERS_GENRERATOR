
<a href="#" class=" card-title btn btn-light-primary  btn-sm " data-toggle="modal" data-target="#update_admin_modal_{{$admin->id}}"><i class="fas fa-edit"></i></a>
<!-- Modal-->
<div class="modal fade" id="update_admin_modal_{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="update_admin_modal_{{$admin->id}}_Label" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="update_admin_modal_{{$admin->id}}_Label">تحديث بيانات المشرف {{$admin->name}}</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form  action="{{route('update_admin',$admin)}}" method="POST" enctype="multipart/form-data" id="update_admin_form_{{$admin->id}}">
                    @csrf
                    <div class="card-body">

                        {{-- name --}}
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 control-label">اسم المشرف</label>
                            <input type="Text" value="{{$admin->name}}" name="name" class=" form-control col-sm-9" id="name" placeholder="اسم المشرف" required >
                        </div>

                        {{-- email --}}
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 control-label">البريد الإلكتروني</label>
                            <input type="email" value="{{$admin->email}}" name="email" class=" form-control col-sm-9" id="email" autocomplete="off" placeholder="البريد الإلكتروني" required>
                        </div>

                        {{-- password --}}
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 control-label">كلمه المرور</label>
                            <input type="password"  name="password" class=" form-control col-sm-9" id="password" placeholder="كلمه المرور" required>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                <button type="submit" form="update_admin_form_{{$admin->id}}" formnovalidate="formnovalidate" class="btn btn-success">حفظ</button>
            </div>
        </div>
    </div>
</div>



