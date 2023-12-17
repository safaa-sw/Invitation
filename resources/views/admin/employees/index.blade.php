@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-header">
                        <h4> الموظفين </h4>
                    </div>
                    <div class="card-body">
                        <div>
                            <a href="{{route('employees/create')}}" class="btn btn-success text-white me-0"><i
                                class="mdi mdi-plus-circle-outline"></i>
                            إضافة</a>
                        
                        </div>

                        <br/>
                        <br/>                      
                    

                        <table id="titleTable"
                            class="table table-bordered table-striped {{ count($employees) > 0 ? 'datatable' : '' }} dt-select">
                            <thead>
                                <tr>
                                    <th>م</th>
                                    
                                    <th>اللقب</th>
                                    <th>اللغة</th>
                                    
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (count($employees) > 0)
                                    @foreach ($employees as $employee)
                                        <tr data-entry-id="{{ $employee->id }}">

                                            <td>{{ $employee->id }}</td>
                                            
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->email }} </td>
                                            
                                            

                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><a href="{{route('employees/edit',[$employee->id])}}"
                                                            class="badge badge-primary badge-sm">
                                                            <i class="mdi mdi-pencil-box-outline"></i></a>
                                                        </td>
                                                        <td><a href="{{route('employees/showPermission',[$employee->id])}}"
                                                            class="badge badge-primary badge-sm">
                                                            <i class="mdi mdi-account-check"></i></a>
                                                        </td>
                                                        
                                                        <td>
                                                            <form action="{{route('employees/destroy',[$employee->id])}}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="badge badge-danger badge-sm"><i
                                                                        class="mdi mdi-delete"></i></button>
            
                                                            </form>
                                                        </td>
                                                    </tr>
                                                </table>
                                                

                                               


                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">لا يوجد ألقاب في قاعدة البيانات</td>
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
                                    <a class="page-link" href="{{ $employees->previousPageUrl() }}"
                                        tabindex="-1">السابق</a>
                                </li>
                                <li class="page-item disabled"></li>
                                <li class="page-item">
                                    <a class="page-link" href="{{ $employees->nextPageUrl() }}">التالي</a>
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
