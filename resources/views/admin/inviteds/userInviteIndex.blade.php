@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>  الدعوات العامة</h4>
                    </div>
                    <div class="card-body">
                        <div>
                        <a href="{{route('exportRegister')}}" class="btn btn-primary text-white me-0"><i class="icon-download"></i>
                            أكسل</a>
                        </div>
                        <br/>
                        <br/>
                        
                    <div>
                        <form action="{{route('userInvite/search')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="col-md-8">
                                    <label for="searchByName" class="col-md-2 col-form-label text-md-right"> <h5>الاسم </h5></label>
                                    <input type="text" id="searchByName" name="searchByName" value="">
                                    <label for="searchByEmail" class="col-md-2 col-form-label text-md-right"> <h5>البريد الالكتروني </h5></label>
                                    <input type="text" id="searchByEmail" name="searchByEmail" value="">
                                    <button type="submit" class="btn btn-success text-white me-0"><i
                                        class="mdi mdi-search"></i> اذهب</button>     
                                </div>
                               
                            </div>
                            

                        </form>
                    </div>

                        <table id="invitedTable"
                            class="table table-bordered table-striped {{ count($inviteds) > 0 ? 'datatable' : '' }} dt-select">
                            <thead>
                                <tr>
                                    <th>م</th>
                                    <th>تاريخ الإرسال</th>
                                    <th>الاسم</th>
                                    <th>رقم الجوال</th>
                                    <th>البريد الالكتروني</th>
                                    <th> حالة الطلب</th>
                                    <th> داخلي/خارجي</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (count($inviteds) > 0)
                                    @foreach ($inviteds as $invited)
                                        <tr data-entry-id="{{ $invited->id }}">

                                            <td>{{ $invited->id }}</td>
                                            <td> {{ $invited->created_at }}</td>
                                            <td>{{ $invited->fullname }}</td>
                                            <td>{{ $invited->mobile_no }} </td>
                                            <td>{{ $invited->email }} </td>
                                            <td>
                                                @if ($invited->req_status==1)
                                                    <span class="badge badge-info badge-sm"> قيد الدراسة</span>
                                                @endif
                                                @if ($invited->req_status==2)
                                                <span class="badge badge-success badge-sm">  تم التأكيد</span>
                                                @endif
                                                @if ($invited->req_status==3)
                                                <span class="badge badge-danger badge-sm"> تم الاعتذار </span>
                                                @endif
                                            </td>
                                            <td>{{$invited->in_or_out}}</td>

                                            <td>
                                                <a href="{{ route('userInvite/show', [$invited->id]) }}"
                                                    class="badge badge-info badge-sm">
                                                    <i class="mdi mdi-eye"></i></a>
                                                <a href="{{ route('userInvite/edit', [$invited->id]) }}"
                                                    class="badge badge-primary badge-sm">
                                                    <i class="mdi mdi-pencil-box-outline"></i></a>
                                                <a href="#" class="badge badge-primary badge-sm">
                                                    <i class="icon-printer"></i></a>

                                                <form action="{{ route('userInvite/destroy', [$invited->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="badge badge-danger badge-sm"><i
                                                            class="mdi mdi-delete"></i></button>

                                                </form>


                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">لا يوجد دعوات في قاعدة البيانات</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <br/>
                        <br/>
                         <!-- Pagination Start -->
                    <div class="col-md-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="{{ $inviteds->previousPageUrl() }}"
                                        tabindex="-1">السابق</a>
                                </li>
                                <li class="page-item disabled"></li>
                                <li class="page-item">
                                    <a class="page-link" href="{{ $inviteds->nextPageUrl() }}">التالي</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Pagination Start -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
