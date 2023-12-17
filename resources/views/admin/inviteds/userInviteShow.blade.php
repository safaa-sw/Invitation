@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-header">
                        <h4>تفاصيل </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>الاسم</th>
                                        <td>{{$invited->fullname}}</td>
                                    </tr>
                                    <tr>
                                        <th>الجوال</th>
                                        <td>{{$invited->mobile_no}}</td>
                                    </tr>
                                    <tr>
                                        <th>البريد الالكتروني</th>
                                        <td>{{$invited->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>الجهة</th>
                                        <td>{{$invited->organization}}</td>
                                    </tr>
                                    <tr>
                                        <th>المنصب</th>
                                        <td>{{$invited->position}}</td>
                                    </tr>
                                </table>
                                <a href="{{ route('userInvite/index') }}" class="btn btn-default">الصفحة الرئيسية</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
@endsection
