@extends('dashboard.layouts.MasterDashMetronic')
@section('title') تحديث محتوي الصفحات الخاصه بالعرض : {{$offer->name}} @endsection
@section('css')

@endsection
@section('content')
<div class="row" style="margin-top:10px">
    <div class="col-xl-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">تحديث محتوي الصفحات الخاصه بالعرض - ( {{$offer->name}} )
                        @if($offer->cost)
                            - السعر الخاص بالصفحه الرئيسيه هو - ( {{$offer->cost->cost}} )

                        @else
                        <p class="bg-danger" > تذكر إضافه السعر الخاص بالرئيسيه لكي يتم إضافته في الرئيسيه</p>
                        @endif
                    </h3>
                </div>
                @include('dashboard.offers_area.pages.createModal')
            </div>
            <div class="card-body">
                <!--begin::Table-->
                <div class="example mb-10">
                    <div class="example-preview">
                        <div class="table-responsive">
                            <table class="table table-bordered meals-table">
                                <thead>
                                    <tr>
                                        <th class="text-left" scope="col">#</th>
                                        <th class="text-left" scope="col">المدينه</th>
                                        <th class="text-left" scope="col">الفنادق</th>
                                        <th class="text-left" scope="col">ملاحظات</th>
                                        <th class="text-left" scope="col">إجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($offer->pages as $page)
                                        <tr>
                                            <th>{{$page->id}}</th>
                                            <th>{{$page->city->name}}</th>
                                            <th>
                                                @foreach ($page->details as $data)
                                                    {{$data->hotels[0]->name}} <br>
                                                @endforeach
                                            </th>
                                            <th>@if($page->note) {{$page->note}} @else -- @endif</th>
                                            <th>
                                                @include('dashboard.offers_area.pages.actionModal')
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--end::Table-->
            </div>
        </div>
        <!--end::Card-->
    </div>
</div>
@endsection
@section('js')

<script src="{{ URL::asset('dashboard/assets/js/pages/crud/forms/widgets/select2.js') }}"></script>

<script>
    $(document).ready(function() {
        $('.select_2').select2();
        $('.btn-link').click(function(event) {
            event.preventDefault();
        });
    });
</script>


@endsection
