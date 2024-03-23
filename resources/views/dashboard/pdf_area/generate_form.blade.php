@extends('dashboard.layouts.MasterDashMetronic')
@section('title') مولد العروض @endsection
@section('content')


<div class="card card-custom">
 <div class="card-header">
  <h3 class="card-title">
   مولد العروض
  </h3>
 </div>
 <!--begin::Form-->
 <form  action="{{-- {{route('store_hotel')}} --}}" method="POST" enctype="multipart/form-data" id="create_hotel_form">
    @csrf
    <div class="card-body">

        {{-- name --}}
        {{-- <div class="form-group row">
            <label for="name" class="col-sm-3 control-label">اسم الفندق</label>
            <input type="Text" value="{{old('name')}}" name="name" class=" form-control col-sm-9"  placeholder="اسم الفندق" required >
        </div> --}}


        <div class="form-group row">
            <label for="city_id" class="col-sm-1 control-label">اختر المدينة</label>
            <select class="form-control col-sm-5 select_2" id="city_id" name="city_id">
                @foreach ($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>

            <label for="hotel_id" class="col-sm-1 control-label">اختر الفندق</label>
            <select class="form-control col-sm-5 select_2" id="hotel_id" name="hotel_id">
                <option value="">اختر الفندق</option>
            </select>
        </div>

        <div class="form-group row">
                <label for="details" class="col-sm-1 control-label">اختر التفاصيل</label>
                <select class="form-control col-sm-5 select_2 " name="details" multiple="multiple" >
                    @foreach ($details as $detail )
                        <option value="{{$detail->id}}">{{$detail->name}}</option>
                    @endforeach
                </select>
        </div>
    </div>
    <!-- /.card-body -->
</form>
 <!--end::Form-->
</div>
@endsection
@section('js')
<script src="{{ URL::asset('dashboard/assets/js/pages/crud/forms/widgets/select2.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.select_2').select2();
    });
</script>


<script>
    $(document).ready(function() {
        $('#city_id').change(function() {
            var city_id = $(this).val();
            if (city_id) {
                $.ajax({
                    type: 'GET',
                    url: '/admin-panel/load-hotels/' + city_id, // تغيير '/load-hotels/' إلى المسار المناسب
                    success: function(data) {
                        $('#hotel_id').empty();
                        $.each(data, function(key, value) {
                            $('#hotel_id').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('#hotel_id').empty();
            }
        });
    });
</script>
@endsection
