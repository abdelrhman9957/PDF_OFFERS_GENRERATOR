<div class="card-toolbar">
    <a href="{{route('index_pages',$data->id)}}"  class="btn btn-light-primary btn-sm font-weight-bold"><i class="fas fa-edit"></i>تحديث</a>

    @if($data->cost)
        <a href="{{route('load_pdf',$data->id)}}" target="_blank" class="btn btn-light-info btn-sm font-weight-bold"><i class="fas fa-eye"></i> معاينه الملف</a>
        <a href="{{route('download_pdf',$data->id)}}" class="btn btn-light-warning btn-sm font-weight-bold"><i class="fas fa-file-pdf"></i> تحميل الملف</a>
    @else
    <form  action="{{route('store_index_page_cost',$data->id)}}" method="POST" enctype="multipart/form-data" id="add_index_page_cost_form">
        @csrf
        <div class="card-body">
            {{-- cost --}}
            <div class="form-group row">
                <label for="cost" class="col-sm-3 control-label">السعر</label>
                <div class="col-sm-7">
                    <input required type="number" name="cost" class="form-control" placeholder="التكلفه في الرئيسيه" value="{{ old('cost') }}">
                </div>
                <div class="col-sm-2">
                    <button type="submit" form="add_index_page_cost_form" class="btn btn-success">إضافه</button>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </form>

    @endif
</div>



