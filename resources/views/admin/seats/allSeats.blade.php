@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4> الكراسي</h4>
                    </div>
                    <div class="card-body">

                        <div>
                            <form action="{{ route('eventday/seat/search') }}" method="post">
                                @csrf

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="searchBySeatClass" class="col-md-3 col-form-label text-md-right">
                                            <h5> فئة الكرسي</h5>
                                        </label>
                                        <select class="form-control" name="searchBySeatClass" id="searchBySeatClass"
                                            data-select-search="true">
                                            <option value="">اختر الفئة</option>
                                            <option value="vip">vip</option>
                                            <option value="normal">normal</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="searchBySeatStatus" class="col-md-3 col-form-label text-md-right">
                                            <h5> حالة الكرسي</h5>
                                        </label>

                                        <select class="form-control" name="searchBySeatStatus" id="searchBySeatStatus"
                                            data-select-search="true">
                                            <option value="">اختر الحالة</option>
                                            <option value="0">فارغ</option>
                                            <option value="1">محجوز</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success text-white me-0"><i
                                    class="mdi mdi-search"></i> اذهب</button>     

                            </form>
                        </div>
                        <br/>
                        <br/>

                        <table id="invitedTable"
                            class="table table-bordered table-striped {{ count($seats) > 0 ? 'datatable' : '' }} dt-select">
                            <thead>
                                <tr>
                                    <th>م</th>
                                    <th> رمز الكرسي</th>
                                    <th>المدعو</th>
                                    <th> فئة الكرسي</th>
                                    <th> حالة الكرسي</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (count($seats) > 0)
                                    @foreach ($seats as $seat)
                                        <tr data-entry-id="{{ $seat->id }}">

                                            <td>{{ $seat->id }}</td>
                                            <td>{{ $seat->code }} </td>
                                            <td>
                                                @if ($seat->status == 1)
                                                    {{ $seat->invited->fullname }}
                                                @endif

                                            </td>
                                            <td>{{ $seat->seat_class }} </td>
                                            <td>
                                                @if ($seat->status == 0)
                                                    فارغ
                                                @else
                                                    محجوز
                                                @endif

                                            </td>

                                            <td>
                                                <a href="{{ route('eventday/seat/editInvited', [$seat->id]) }}"
                                                    class="badge badge-success badge-sm">
                                                    <i class="mdi mdi-pencil-box-outline"></i></a>
                                                <a href="#" class="badge badge-primary badge-sm">
                                                    <i class="icon-printer"></i></a>
                                                <a href="#" class="badge badge-danger badge-sm">
                                                    <i class="mdi mdi-delete"></i></a>


                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">لا يوجد كراسي في قاعدة البيانات</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <br />
                        <br />
                        <!-- Pagination Start -->
                        <div class="col-md-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $seats->previousPageUrl() }}"
                                            tabindex="-1">السابق</a>
                                    </li>
                                    <li class="page-item disabled"></li>
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $seats->nextPageUrl() }}">التالي</a>
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
