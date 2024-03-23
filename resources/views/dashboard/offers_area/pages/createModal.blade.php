<div class="card-toolbar">
    <a href="#" class="btn btn-light-success font-weight-bold btn-sm mr-1" data-toggle="modal" data-target="#create_offer_modal"><i class="fas fa-plus"></i>إضافه صفحه</a>

    @if(!$offer->cost)
        <a href="#" class="btn btn-light-primary font-weight-bold btn-sm mr-1" data-toggle="modal" data-target="#add_index_page_cost_modal"><i class="fas fa-money-bill"></i>إضافه السعر </a>
    @else
        <a href="#" class="btn btn-light-primary font-weight-bold btn-sm mr-1" data-toggle="modal" data-target="#update_index_page_cost_modal"><i class="fas fa-money-bill"></i>تحديث السعر</a>
        <a href="{{route('load_pdf',$offer->id)}}" target="_blank" class="btn btn-light-info btn-sm font-weight-bold mr-1 "><i class="fas fa-eye"></i> </a>
        <a href="{{route('download_pdf',$offer->id)}}" class="btn btn-light-warning btn-sm font-weight-bold mr-1 "><i class="fas fa-file-pdf"></i></a>
    @endif
</div>

@if(!$offer->cost)
    <!-- ADD INDEX PAGE COST-->
    <div class="modal fade" id="add_index_page_cost_modal" tabindex="-1" role="dialog" aria-labelledby="add_index_page_cost_modal_Label" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_index_page_cost_modal_Label">اضافه السعر في الرئيسيه</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form  action="{{route('store_index_page_cost',$offer->id)}}" method="POST" enctype="multipart/form-data" id="add_index_page_cost_form">
                        @csrf
                        <div class="card-body">

                            {{-- cost --}}
                            <div class="form-group row">
                                <label for="cost" class="col-sm-3 control-label">السعر</label>
                                <input required type="number" name="cost" class="form-control col-sm-9" placeholder="اكتب السعر الخاص بالصفحه الرئيسيه" value="{{ old('cost') }}">
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                    <button type="submit" form="add_index_page_cost_form" class="btn btn-success">إضافه</button>
                </div>
            </div>
        </div>
    </div>
@else
    <!-- UPDATE INDEX PAGE COST-->
    <div class="modal fade" id="update_index_page_cost_modal" tabindex="-1" role="dialog" aria-labelledby="update_index_page_cost_modal_Label" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="update_index_page_cost_modal_Label">تحديث السعر في الرئيسيه</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form  action="{{route('update_index_page_cost',$offer->cost->id)}}" method="POST" enctype="multipart/form-data" id="update_index_page_cost_form">
                        @csrf
                        <div class="card-body">

                            {{-- cost --}}
                            <div class="form-group row">
                                <label for="cost" class="col-sm-3 control-label">السعر</label>
                                <input required type="number" name="cost" class="form-control col-sm-9" placeholder="اكتب السعر الخاص بالصفحه الرئيسيه" value="{{ $offer->cost->cost }}">
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                    <button type="submit" form="update_index_page_cost_form" class="btn btn-success">تحديث</button>
                </div>
            </div>
        </div>
    </div>
@endif



{{-- Add Page Modal --}}
<div class="modal fade" id="create_offer_modal" tabindex="-1" role="dialog" aria-labelledby="create_offer_modal_Label" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_offer_modal_Label">اضافه صفحه</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form  action="{{route('store_page')}}" method="POST" enctype="multipart/form-data" id="create_offer_form">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="offer_id" value="{{$offer->id}}">

                        <div class="form-group row">
                            <label for="city_id" class="col-sm-3 control-label">المدينه</label>
                            <select class="form-control col-sm-9 select_2 " required style="width:75%" name="city_id"  >
                                @foreach ($cities as $city )
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label class="col-3 col-form-label">وسيله السفر</label>
                            <div class="col-9 col-form-label">
                                <div class="radio-inline">
                                    <label class="radio radio-primary">
                                        <input type="radio" name="travel_type" value="0" checked="checked"/>
                                        <span></span>
                                        جوي
                                    </label>
                                    <label class="radio radio-primary">
                                        <input type="radio" name="travel_type" value="1"  />
                                        <span></span>
                                        قطار
                                    </label>
                                </div>
                                <span class="form-text text-muted">يتم تغيير صوره خلفيه المدينه بناء علي إختيارك</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="details_ids[]" class="col-sm-3 control-label">التفاصيل</label>
                            <select class="form-control col-sm-9 select_2 " required style="width:75%" name="details_ids[]" multiple="multiple" >
                                @foreach ($details as $detail )
                                    <option value="{{$detail->id}}">{{$detail->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- note --}}
                        <div class="form-group row">
                            <label for="note" class="col-sm-3 control-label">ملاحظات</label>
                            <textarea name="note" class="form-control col-sm-9" placeholder="اكتب ملاحظاتك إن وجدت">{{ old('note') }}</textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                <button type="submit" form="create_offer_form" class="btn btn-success">إضافه</button>
            </div>
        </div>
    </div>
</div>



