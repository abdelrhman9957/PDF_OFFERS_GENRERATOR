<div class="card-toolbar">
    <a href="#" class="btn btn-light-success font-weight-bold" data-toggle="modal" data-target="#create_hotel_modal"><i class="fas fa-plus"></i></a>
</div>
<!-- Modal-->
<div class="modal fade" id="create_hotel_modal" tabindex="-1" role="dialog" aria-labelledby="create_hotel_modal_Label" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_hotel_modal_Label">اضافه فندق</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form  action="{{route('store_hotel')}}" method="POST" enctype="multipart/form-data" id="create_hotel_form">
                    @csrf
                    <div class="card-body">

                        {{-- name --}}
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 control-label">اسم الفندق</label>
                            <input type="Text" value="{{old('name')}}" name="name" class=" form-control col-sm-9"  placeholder="اسم الفندق" required >
                        </div>

                        <div class="form-group row">
                            <label for="city_id" class="col-sm-3 control-label">المدينه</label>
                                <select class="form-control col-sm-9 select_2 " name="city_id" style="width:75%">
                                    @foreach ($cities as $city )
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                <button type="submit" form="create_hotel_form" class="btn btn-success">إضافه</button>
            </div>
        </div>
    </div>
</div>



