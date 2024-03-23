<div class="card-toolbar">
    <a href="#" class="btn btn-light-primary btn-sm font-weight-bold" data-toggle="modal" data-target="#update_page_modal_{{$page->id}}"><i class="fas fa-pencil-alt"></i> ثوابت الصفحه</a>

    @if (count($page->details) < 3)
        <a href="#" class="btn btn-light-success btn-sm font-weight-bold" data-toggle="modal" data-target="#add_details_page_modal_{{$page->id}}"><i class="fas fa-plus"></i> إضافه محتوي الصفحه</a>
    @endif
    @if (count($page->details) >= 1)
        <a href="#" class="btn btn-light-info btn-sm font-weight-bold" data-toggle="modal" data-target="#update_content_page_modal_{{$page->id}}"><i class="fas fa-edit"></i> تحديث محتوي الصفحه</a>
    @endif

    <button type="submit" form="delete_page_form{{$page->id}}" class="btn btn-light-danger btn-sm font-weight-bold" onclick="return confirm('هل انت متأكد من حذف الصفحه؟!!')" ><i class="fas fa-trash"></i>حذف الصفحه</button>
    <form  action="{{route('delete_page',$page->id)}}" method="POST" enctype="multipart/form-data" id="delete_page_form{{$page->id}}">
        @csrf
    </form>
</div>


    {{-- update page details modal --}}
    @if (count($page->details) <= 3)
        <div class="modal fade" id="update_content_page_modal_{{$page->id}}" tabindex="-1" role="dialog" aria-labelledby="update_content_page_modal_Label_{{$page->id}}" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="update_content_page_modal_Label_{{$page->id}}">تحديث محتوي الصفحه</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form  action="{{route('update_page_details')}}" method="POST" enctype="multipart/form-data" id="update_content_page_form_{{$page->id}}">
                            @csrf
                            <div class="card-body">
                                {{-- note --}}

                                <div class="accordion accordion-solid accordion-panel accordion-svg-toggle" id="accordionExample8">
                                    @if (count($page->details) >= 1)
                                    <div class="card">
                                        <div class="card-header" id="headingOne8">
                                        <div class="card-title" style="background-color:aliceblue" data-toggle="collapse" data-target="#collapseOne8">
                                        <div class="card-label">الفندق الاول</div>
                                        <span class="svg-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                        <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                                        <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "></path>
                                        </g>
                                        </svg>
                                        </span>
                                        </div>
                                        </div>
                                        <div id="collapseOne8" class="collapse show" data-parent="#accordionExample8">
                                        <div class="card-body">
                                            <div class="separator separator-dashed mt-8 mb-5"></div>
                                            {{-- first Hotel --}}

                                            <input type="hidden" name="page_detail_one" value="{{$page->details[0]->id}}">

                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">تأكيد الحذف</label>
                                                <div class="col-9 col-form-label">
                                                    <div class="checkbox-inline">
                                                        <label class="checkbox checkbox-success">
                                                            <input type="checkbox" value="1" name="delete_one"/>
                                                            <span></span>
                                                            تأكيد
                                                        </label>
                                                    </div>
                                                    <span class="form-text text-muted">(في حاله الحذف لن يمكنك التراجع عن العمليه)</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="hotel_one_id" class="col-sm-3 control-label">الفندق</label>
                                                <select required class="form-control col-sm-9 select_2 " style="width:75%" name="hotel_one_id" >
                                                    <option value="">اختر الفندق</option>
                                                    @foreach ($hotels->where('city_id',$page->city_id) as $hotel )
                                                        <option value="{{$hotel->id}}" @if ($hotel->id == $page->details[0]->hotel_id) @selected(true)  @endif>{{$hotel->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group row">
                                                <label for="room_one_id" class="col-sm-3 control-label">الغرفه</label>
                                                <select required class="form-control col-sm-9 select_2 " style="width:75%" name="room_one_id" >
                                                    <option value="">اختر غرفه</option>
                                                    @foreach ($rooms as $room )
                                                        <option value="{{$room->id}}" @if ($room->id == $page->details[0]->room_id) @selected(true)  @endif>{{$room->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group row">
                                                <label for="meal_one_id" class="col-sm-3 control-label">الوجبات</label>
                                                <select required class="form-control col-sm-9 select_2 " style="width:75%" name="meal_one_id" >
                                                    <option value="">اختر الوجبات</option>
                                                    @foreach ($meals as $meal )
                                                        <option value="{{$meal->id}}" @if ($meal->id == $page->details[0]->meal_id) @selected(true)  @endif>{{$meal->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group row">
                                                <label for="entry_date_one" class="col-sm-3 control-label">ت.الدخول</label>
                                                 <input class="form-control col-sm-9" required name="entry_date_one" type="date" value="{{$page->details[0]->entry_date}}" id="entry_date_one"/>
                                            </div>



                                            <div class="form-group row">
                                                <label for="nights_one" class="col-sm-3 control-label">الليالي</label>
                                                <input required type="number" min="1" name="nights_one" class="form-control col-sm-9" placeholder="عدد الليالي" value="{{$page->details[0]->nights}}" >
                                            </div>


                                            <div class="separator separator-dashed mt-8 mb-5"></div>
                                        </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if (count($page->details) >= 2)

                                        <div class="card">
                                                <div class="card-header" id="headingTwo8">
                                                <div class="card-title collapsed" style="background-color:aliceblue" data-toggle="collapse" data-target="#collapseTwo8">
                                                <div class="card-label">الفندق الثاني (إن وجد)</div>
                                                    <span class="svg-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                            <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                                                            <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </div>
                                                </div>
                                                <div id="collapseTwo8" class="collapse" data-parent="#accordionExample8">
                                            <div class="card-body">
                                                <div class="separator separator-dashed mt-8 mb-5"></div>
                                                    {{-- 2nd Hotel --}}
                                                    <input type="hidden" name="page_detail_two" value="{{$page->details[1]->id}}">


                                                    <div class="form-group row">
                                                        <label class="col-3 col-form-label">تأكيد الحذف</label>
                                                        <div class="col-9 col-form-label">
                                                            <div class="checkbox-inline">
                                                                <label class="checkbox checkbox-success">
                                                                    <input type="checkbox" value="1" name="delete_two"/>
                                                                    <span></span>
                                                                    تأكيد
                                                                </label>
                                                            </div>
                                                            <span class="form-text text-muted">(في حاله الحذف لن يمكنك التراجع عن العمليه)</span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="hotel_two_id" class="col-sm-3 control-label">الفندق</label>
                                                        <select  class="form-control col-sm-9 select_2 " style="width:75%" name="hotel_two_id" >
                                                            <option value="">اختر الفندق</option>
                                                            @foreach ($hotels->where('city_id',$page->city_id) as $hotel )
                                                                <option value="{{$hotel->id}}" @if ($hotel->id == $page->details[1]->hotel_id) @selected(true)  @endif>{{$hotel->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="room_two_id" class="col-sm-3 control-label">الغرفه</label>
                                                        <select  class="form-control col-sm-9 select_2 " style="width:75%" name="room_two_id" >
                                                            <option value="">اختر غرفه</option>
                                                            @foreach ($rooms as $room )
                                                                <option value="{{$room->id}}" @if ($room->id == $page->details[1]->room_id) @selected(true)  @endif>{{$room->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="meal_two_id" class="col-sm-3 control-label">الوجبات</label>
                                                        <select  class="form-control col-sm-9 select_2 " style="width:75%" name="meal_two_id" >
                                                            <option value="">اختر الوجبات</option>
                                                            @foreach ($meals as $meal )
                                                                <option value="{{$meal->id}}"  @if ($meal->id == $page->details[1]->meal_id) @selected(true)  @endif >{{$meal->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label for="entry_date_two" class="col-sm-3 control-label">ت.الدخول</label>
                                                         <input class="form-control col-sm-9" required name="entry_date_two" type="date" value="{{$page->details[1]->entry_date}}" id="entry_date_two"/>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="nights_two" class="col-sm-3 control-label">الليالي</label>
                                                        <input  type="number" min="1" name="nights_two" class="form-control col-sm-9" placeholder="عدد الليالي" value="{{$page->details[1]->nights}}" >
                                                    </div>


                                                <div class="separator separator-dashed mt-8 mb-5"></div>
                                            </div>
                                            </div>
                                        </div>

                                    @endif
                                    @if (count($page->details) == 3)
                                    <div class="card  ">
                                            <div class="card-header " id="headingThree8">
                                                <div class="card-title collapsed" style="background-color:aliceblue" data-toggle="collapse" data-target="#collapseThree8">
                                                    <div class="card-label">الفندق الثالث (إن وجد)</div>
                                                    <span class="svg-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                        <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                                                        <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "></path>
                                                        </g>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        <div id="collapseThree8" class="collapse" data-parent="#accordionExample8">
                                            <div class="card-body">
                                                <div class="separator separator-dashed mt-8 mb-5"></div>
                                                    {{-- 3rd Hotel --}}

                                                    <input type="hidden" name="page_detail_three" value="{{$page->details[2]->id}}">



                                                    <div class="form-group row">
                                                        <label class="col-3 col-form-label">تأكيد الحذف</label>
                                                        <div class="col-9 col-form-label">
                                                            <div class="checkbox-inline">
                                                                <label class="checkbox checkbox-success">
                                                                    <input type="checkbox" value="1" name="delete_three"/>
                                                                    <span></span>
                                                                    تأكيد
                                                                </label>
                                                            </div>
                                                            <span class="form-text text-muted">(في حاله الحذف لن يمكنك التراجع عن العمليه)</span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="hotel_three_id" class="col-sm-3 control-label">الفندق</label>
                                                        <select  class="form-control col-sm-9 select_2 " style="width:75%" name="hotel_three_id" >
                                                            <option value="">اختر الفندق</option>
                                                            @foreach ($hotels->where('city_id',$page->city_id) as $hotel )
                                                                <option value="{{$hotel->id}}" @if ($hotel->id == $page->details[2]->hotel_id) @selected(true)  @endif>{{$hotel->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="room_three_id" class="col-sm-3 control-label">الغرفه</label>
                                                        <select  class="form-control col-sm-9 select_2 " style="width:75%" name="room_three_id" >
                                                            <option value="">اختر غرفه</option>
                                                            @foreach ($rooms as $room )
                                                                <option value="{{$room->id}}" @if ($room->id == $page->details[2]->room_id) @selected(true)  @endif>{{$room->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="meal_three_id" class="col-sm-3 control-label">الوجبات</label>
                                                        <select  class="form-control col-sm-9 select_2 " style="width:75%" name="meal_three_id" >
                                                            <option value="">اختر الوجبات</option>
                                                            @foreach ($meals as $meal )
                                                                <option value="{{$meal->id}}"  @if ($meal->id == $page->details[2]->meal_id) @selected(true)  @endif>{{$meal->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label for="entry_date_three" class="col-sm-3 control-label">ت.الدخول</label>
                                                         <input class="form-control col-sm-9" required name="entry_date_three" type="date" value="{{$page->details[2]->entry_date}}" id="entry_date_three"/>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="nights_three" class="col-sm-3 control-label">الليالي</label>
                                                        <input  type="number" min="1" name="nights_three" class="form-control col-sm-9" placeholder="عدد الليالي" value="{{$page->details[2]->nights}}" >

                                                    </div>


                                                <div class="separator separator-dashed mt-8 mb-5"></div>
                                            </div>

                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>




                            <!-- /.card-body -->
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                        <button type="submit" form="update_content_page_form_{{$page->id}}" class="btn btn-success">حفظ</button>
                    </div>
                </div>
            </div>
        </div>
    @endif




    {{-- add page details modal --}}
    @if (count($page->details) < 3)
        <div class="modal fade" id="add_details_page_modal_{{$page->id}}" tabindex="-1" role="dialog" aria-labelledby="add_details_page_modal_Label_{{$page->id}}" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add_details_page_modal_Label_{{$page->id}}">اضافه تفاصيل الصفحه</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form  action="{{route('store_page_details',$page)}}" method="POST" enctype="multipart/form-data" id="add_details_page_form_{{$page->id}}">
                            @csrf
                            <div class="card-body">
                                {{-- note --}}

                                <input type="hidden" name="page_id" value="{{$page->id}}">
                                <div class="accordion accordion-solid accordion-panel accordion-svg-toggle" id="accordionExample8">
                                    @if (count($page->details) < 1)
                                    <div class="card">
                                        <div class="card-header" id="headingOne8">
                                        <div class="card-title" style="background-color:aliceblue" data-toggle="collapse" data-target="#collapseOne8">
                                        <div class="card-label">الفندق الاول</div>
                                        <span class="svg-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                        <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                                        <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "></path>
                                        </g>
                                        </svg>
                                        </span>
                                        </div>
                                        </div>
                                        <div id="collapseOne8" class="collapse show" data-parent="#accordionExample8">
                                        <div class="card-body">
                                        <div class="separator separator-dashed mt-8 mb-5"></div>
                                            {{-- first Hotel --}}

                                            <div class="form-group row">
                                                <label for="hotel_one_id" class="col-sm-3 control-label">الفندق</label>
                                                <select required class="form-control col-sm-9 select_2 " style="width:75%" name="hotel_one_id" >
                                                    <option value="">اختر الفندق</option>
                                                    @foreach ($hotels->where('city_id',$page->city_id) as $hotel )
                                                        <option value="{{$hotel->id}}">{{$hotel->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group row">
                                                <label for="room_one_id" class="col-sm-3 control-label">الغرفه</label>
                                                <select required class="form-control col-sm-9 select_2 " style="width:75%" name="room_one_id" >
                                                    <option value="">اختر غرفه</option>
                                                    @foreach ($rooms as $room )
                                                        <option value="{{$room->id}}">{{$room->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group row">
                                                <label for="meal_one_id" class="col-sm-3 control-label">الوجبات</label>
                                                <select required class="form-control col-sm-9 select_2 " style="width:75%" name="meal_one_id" >
                                                    <option value="">اختر الوجبات</option>
                                                    @foreach ($meals as $meal )
                                                        <option value="{{$meal->id}}">{{$meal->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group row">
                                                <label for="entry_date_one" class="col-sm-3 control-label">ت.الدخول</label>
                                                 <input class="form-control col-sm-9" required name="entry_date_one" type="date" {{-- value="{{Carbon\carbon::today()->format('Y-m-d')}}" --}} id="entry_date_one"/>
                                            </div>



                                            <div class="form-group row">
                                                <label for="nights_one" class="col-sm-3 control-label">الليالي</label>
                                                <input required type="number" min="1" name="nights_one" class="form-control col-sm-9" placeholder="عدد الليالي" value=" {{old('nights_one') }}" >
                                            </div>


                                        <div class="separator separator-dashed mt-8 mb-5"></div>
                                        </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if (count($page->details) < 2)

                                        <div class="card">
                                        <div class="card-header" id="headingTwo8">
                                        <div class="card-title collapsed" style="background-color:aliceblue" data-toggle="collapse" data-target="#collapseTwo8">
                                        <div class="card-label">الفندق الثاني (إن وجد)</div>
                                            <span class="svg-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                    <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                                                    <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </div>
                                        </div>
                                        <div id="collapseTwo8" class="collapse" data-parent="#accordionExample8">
                                        <div class="card-body">
                                            <div class="separator separator-dashed mt-8 mb-5"></div>
                                                {{-- 2nd Hotel --}}

                                                <div class="form-group row">
                                                    <label class="col-3 col-form-label">تأكيد الفندق</label>
                                                    <div class="col-9 col-form-label">
                                                        <div class="checkbox-inline">
                                                            <label class="checkbox checkbox-success">
                                                                <input type="checkbox" value="1" name="confirm_two"/>
                                                                <span></span>
                                                                تأكيد
                                                            </label>
                                                        </div>
                                                        <span class="form-text text-muted">تأكيد إضافه الفندق الي الصفحه</span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="hotel_two_id" class="col-sm-3 control-label">الفندق</label>
                                                    <select  class="form-control col-sm-9 select_2 " style="width:75%" name="hotel_two_id" >
                                                        <option value="">اختر الفندق</option>
                                                        @foreach ($hotels->where('city_id',$page->city_id) as $hotel )
                                                            <option value="{{$hotel->id}}">{{$hotel->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="room_two_id" class="col-sm-3 control-label">الغرفه</label>
                                                    <select  class="form-control col-sm-9 select_2 " style="width:75%" name="room_two_id" >
                                                        <option value="">اختر غرفه</option>
                                                        @foreach ($rooms as $room )
                                                            <option value="{{$room->id}}">{{$room->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="meal_two_id" class="col-sm-3 control-label">الوجبات</label>
                                                    <select  class="form-control col-sm-9 select_2 " style="width:75%" name="meal_two_id" >
                                                        <option value="">اختر الوجبات</option>
                                                        @foreach ($meals as $meal )
                                                            <option value="{{$meal->id}}">{{$meal->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="entry_date_two" class="col-sm-3 control-label">ت.الدخول</label>
                                                     <input class="form-control col-sm-9"  name="entry_date_two" type="date" {{-- value="{{Carbon\carbon::today()->format('Y-m-d')}}" --}} id="entry_date_two"/>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="nights_two" class="col-sm-3 control-label">الليالي</label>
                                                    <input  type="number" min="1" name="nights_two" class="form-control col-sm-9" placeholder="عدد الليالي" value=" {{old('nights_two') }}" >
                                                </div>


                                            <div class="separator separator-dashed mt-8 mb-5"></div>
                                        </div>
                                        </div>
                                        </div>

                                    @endif
                                    @if (count($page->details) < 3)
                                    <div class="card  ">
                                        <div class="card-header " id="headingThree8">
                                        <div class="card-title collapsed" style="background-color:aliceblue" data-toggle="collapse" data-target="#collapseThree8">
                                        <div class="card-label">الفندق الثالث (إن وجد)</div>
                                        <span class="svg-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                                            <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "></path>
                                            </g>
                                            </svg>
                                        </span>
                                        </div>
                                        </div>
                                        <div id="collapseThree8" class="collapse" data-parent="#accordionExample8">
                                        <div class="card-body">
                                            <div class="separator separator-dashed mt-8 mb-5"></div>
                                                {{-- 3rd Hotel --}}

                                                <div class="form-group row">
                                                    <label class="col-3 col-form-label">تأكيد الفندق</label>
                                                    <div class="col-9 col-form-label">
                                                        <div class="checkbox-inline">
                                                            <label class="checkbox checkbox-success">
                                                                <input type="checkbox" value="1" name="confirm_three"/>
                                                                <span></span>
                                                                تأكيد
                                                            </label>
                                                        </div>
                                                        <span class="form-text text-muted">تأكيد إضافه الفندق الي الصفحه</span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="hotel_three_id" class="col-sm-3 control-label">الفندق</label>
                                                    <select  class="form-control col-sm-9 select_2 " style="width:75%" name="hotel_three_id" >
                                                        <option value="">اختر الفندق</option>
                                                        @foreach ($hotels->where('city_id',$page->city_id) as $hotel )
                                                            <option value="{{$hotel->id}}">{{$hotel->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="room_three_id" class="col-sm-3 control-label">الغرفه</label>
                                                    <select  class="form-control col-sm-9 select_2 " style="width:75%" name="room_three_id" >
                                                        <option value="">اختر غرفه</option>
                                                        @foreach ($rooms as $room )
                                                            <option value="{{$room->id}}">{{$room->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="meal_three_id" class="col-sm-3 control-label">الوجبات</label>
                                                    <select  class="form-control col-sm-9 select_2 " style="width:75%" name="meal_three_id" >
                                                        <option value="">اختر الوجبات</option>
                                                        @foreach ($meals as $meal )
                                                            <option value="{{$meal->id}}">{{$meal->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="entry_date_three" class="col-sm-3 control-label">ت.الدخول</label>
                                                     <input class="form-control col-sm-9"  name="entry_date_three" type="date" {{-- value="{{Carbon\carbon::today()->format('Y-m-d')}}" --}} id="entry_date_three"/>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="nights_three" class="col-sm-3 control-label">الليالي</label>
                                                    <input  type="number" min="1" name="nights_three" class="form-control col-sm-9" placeholder="عدد الليالي" value=" {{old('nights_three') }}" >
                                                </div>


                                            <div class="separator separator-dashed mt-8 mb-5"></div>
                                        </div>
                                    @endif
                                    </div>
                                    </div>
                                </div>
                            </div>



                            <!-- /.card-body -->
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                        <button type="submit" form="add_details_page_form_{{$page->id}}" class="btn btn-success">حفظ</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

















<!-- UPDATE PUBLIC PAGE DETAILS MODAL-->
<div class="modal fade" id="update_page_modal_{{$page->id}}" tabindex="-1" role="dialog" aria-labelledby="update_page_modal_Label_{{$page->id}}" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="update_page_modal_Label_{{$page->id}}">تحديث بيانات الصفحه</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form  action="{{route('update_page',$page)}}" method="POST" enctype="multipart/form-data" id="update_page_form_{{$page->id}}">
                    @csrf
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="city_id" class="col-sm-3 control-label">المدينه</label>
                            <select @if(count($page->details) != 0) disabled @endif class="form-control col-sm-9 select_2 " required style="width:75%" name="city_id"  >
                                    @foreach ($cities as $city )
                                        <option value="{{$city->id}}" @if($city->id == $page->city_id) @selected(true) @endif >{{$city->name}}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label class="col-3 col-form-label">وسيله السفر</label>
                            <div class="col-9 col-form-label">
                                <div class="radio-inline">
                                    <label class="radio radio-primary">
                                        <input type="radio" name="travel_type" value="0" @if($page->travel_type == 0) checked="checked" @endif />
                                        <span></span>
                                        جوي
                                    </label>
                                    <label class="radio radio-primary">
                                        <input type="radio" name="travel_type" value="1" @if($page->travel_type == 1) checked="checked" @endif />
                                        <span></span>
                                        قطار
                                    </label>
                                </div>
                                <span class="form-text text-muted">يتم تغيير صوره خلفيه المدينه بناء علي إختيارك</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="details_ids[]" class="col-sm-3 control-label">التفاصيل</label>
                            <select class="form-control col-sm-9 select_2" required style="width:75%" name="details_ids[]" multiple="multiple">
                                @foreach ($details as $detail)
                                    @php
                                        $selected = in_array($detail->id, explode(',', $page->details_ids)) ? 'selected' : '';
                                    @endphp
                                    <option value="{{ $detail->id }}" {{ $selected }}>{{ $detail->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- note --}}
                        <div class="form-group row">
                            <label for="note" class="col-sm-3 control-label">ملاحظات</label>
                            <textarea name="note" class="form-control col-sm-9" placeholder="اكتب ملاحظاتك إن وجدت">{{ $page->note }}</textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                <button type="submit" form="update_page_form_{{$page->id}}" class="btn btn-success">حفظ</button>
            </div>
        </div>
    </div>
</div>



