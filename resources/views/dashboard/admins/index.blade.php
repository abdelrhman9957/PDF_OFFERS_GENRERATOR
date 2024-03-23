@extends('dashboard.layouts.MasterDashMetronic')
@section('title') المشرفين @endsection
@section('content')
    <div class="row" style="margin-top:10px">
        <div class="col-xl-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-title" >المشرفين</h3>
                    </div>
                    @include('dashboard.admins.createAdminModal')
                </div>
                <div class="card-body">
                    <!--begin::Table-->
                    <div class="example mb-10">
                        <div class="example-preview">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-left" scope="col">#</th>
                                            <th class="text-left" scope="col">اسم المشرف</th>
                                            <th class="text-left" scope="col">البريد الإلكتروني</th>
                                            <th class="text-left" scope="col">تاريخ الاضافه</th>
                                            <th class="text-left" scope="col">اخر تحديث</th>
                                            <th class="text-left" scope="col">إجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($admins as $index=>$admin)
                                            <tr>
                                                <td style="font-size: 15px" scope="row">{{$index + 1 }}</td>
                                                <td style="font-size: 15px">{{$admin->name}}</td>
                                                <td style="font-size: 15px">{{$admin->email}}</td>
                                                <td style="font-size: 15px">{{$admin->created_at->format('Y-m-d')}}</td>
                                                <td style="font-size: 15px">{{$admin->updated_at->format('Y-m-d')}}</td>
                                                <td style="font-size: 15px">
                                                @include('dashboard.admins.updateAdminModal')
                                                {{-- <a class="btn btn-danger btn-md disabled" ><i class="fas fa-trash"></i></a> --}}
                                                </td>
                                            </tr>
                                        @empty

                                        @endforelse
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
