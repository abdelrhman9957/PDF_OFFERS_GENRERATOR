@extends('dashboard.layouts.MasterDashMetronic')
@section('title') الفنادق @endsection
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/fixedcolumns/4.3.0/css/fixedColumns.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="row" style="margin-top:10px">
    <div class="col-xl-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">الفنادق</h3>
                </div>
                @include('dashboard.hotels.createModal')
            </div>
            <div class="card-body">
                <!--begin::Table-->
                <div class="example mb-10">
                    <div class="example-preview">
                        <div class="table-responsive">
                            <table class="table table-bordered hotels-table">
                                <thead>
                                    <tr>
                                        <th class="text-left" scope="col">#</th>
                                        <th class="text-left" scope="col">ID</th>
                                        <th class="text-left" scope="col">الفندق</th>
                                        <th class="text-left" scope="col">المدينه</th>
                                        <th class="text-left" scope="col">تاريخ الإضافه</th>
                                        <th class="text-left" scope="col">إجراءات</th>
                                    </tr>
                                </thead>
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
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="{{ URL::asset('dashboard/assets/js/pages/crud/forms/widgets/select2.js') }}"></script>

<script>
    $(document).ready(function() {
        $('.select_2').select2();
    });
</script>



    <script type="text/javascript">
        $(function () {

        var table = $('.hotels-table').DataTable({
            lengthMenu: [[10, 25, 50, 100,-1], ['10','25','50','100','الكل']],
            processing: true,
            serverSide: true,
            ajax: "{{ route('index_hotels') }}",
            columns: [
                { data: 'DT_RowIndex', 'orderable': false, 'searchable': false },
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name', orderable: true, searchable: true},
                {data: 'city', name: 'city', orderable: true, searchable: true},
                {data: 'created_at', name: 'created_at', orderable: true, searchable: true},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            language: {
                search: "",
                searchPlaceholder: "اكتب للبحث",
                zeroRecords: "لم يتم العثور على بيانات مطابقة",
                infoFiltered: "(من إجمالي _MAX_ صفحات)",
                infoEmpty:      "لا يوجد بيانات لعرضها",
                loadingRecords: "جارٍ التحميل...",
                emptyTable: "لا توجد بيانات لعرضها",
                info: " صفحة _PAGE_ من اجمالي _PAGES_ صفحات",
                lengthMenu: "_MENU_",
                paginate: { first: "الأول", last: "الأخير", next: "التالي", previous: "السابق", },


            },
            drawCallback: function() {
                $('.select_2').select2();
            }
        });
        });
    </script>
@endsection
