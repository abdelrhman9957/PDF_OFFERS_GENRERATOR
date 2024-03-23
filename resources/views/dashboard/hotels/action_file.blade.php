<div class="card-toolbar">
    <a href="#" class="btn btn-light-primary btn-sm font-weight-bold" data-toggle="modal" data-target="#update_hotel_modal_{{$data->id}}"><i class="fas fa-edit"></i></a>
</div>
<!-- Modal-->
<div class="modal fade" id="update_hotel_modal_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="update_hotel_modal_Label_{{$data->id}}" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="update_hotel_modal_Label_{{$data->id}}">تحديث بيانات  - {{$data->name}}</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form  action="{{route('update_hotel',$data)}}" method="POST" enctype="multipart/form-data" id="update_hotel_form_{{$data->id}}">
                    @csrf
                    <div class="card-body">

                        {{-- name --}}
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 control-label">اسم الفندق</label>
                            <input type="Text" value="{{$data->name}}" name="name" class=" form-control col-sm-9"  placeholder="اسم الفندق" required >
                        </div>

                        <div class="form-group row">
                            <label for="city_id" class="col-sm-3 control-label">المدينه</label>
                                <select class="form-control col-sm-9 select_2 " name="city_id" style="width:75%">
                                    @foreach ($cities_for_update as $city )
                                        <option value="{{$city->id}}" {{ $data->city_id == $city->id ? 'selected' : '' }} >{{$city->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                <button type="submit" form="update_hotel_form_{{$data->id}}" class="btn btn-success">حفظ</button>
            </div>
        </div>
    </div>
</div>



