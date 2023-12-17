@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-header">
                        <h4> الفئات </h4>
                    </div>
                    <div class="card-body">
                        <div>
                            <a href="{{ route('personclasses.create') }}" class="btn btn-success text-white me-0"><i
                                class="mdi mdi-plus-circle-outline"></i>
                            إضافة</a>
                        
                        </div>
                        <br/>
                        <br/>
                    

                        <table id="personClasseTable"
                            class="table table-bordered table-striped {{ count($personClasses) > 0 ? 'datatable' : '' }} dt-select">
                            <thead>
                                <tr>
                                    <th>م</th>
                                    
                                    <th>الفئة</th>
                                    <th>اللون</th>
                                    
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (count($personClasses) > 0)
                                    @foreach ($personClasses as $personClass)
                                        <tr data-entry-id="{{ $personClass->id }}">
                                            <td>{{ $personClass->id }}</td>
                                          
                                            <td>{{ $personClass->name }}</td>
                                            <td>
                                                @if ($personClass->color=="أزرق")
                                                    <span class="btn btn-sm btn-primary" style="color:blue"></span>
                                                @endif
                                                @if ($personClass->color=="أحمر")
                                                    <span class="btn btn-sm btn-danger" style="color:red"></span>
                                                @endif
                                                @if ($personClass->color=="أخضر")
                                                    <span class="btn btn-sm btn-success" style="color:green"></span>
                                                @endif
                                                @if ($personClass->color=="أصفر")
                                                    <span class="btn btn-sm btn-warning" style="color:yellow"></span>
                                                @endif
                                            </td>
                                            
                                            

                                            <td>
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <a href="{{ route('personclasses.edit', [$personClass->id]) }}"
                                                                class="badge badge-primary badge-sm">
                                                                <i class="mdi mdi-pencil-box-outline"></i></a>
                                                        </td>
                                                        <td>

                                                            <form action="{{ route('personclasses.destroy', [$personClass->id]) }}"
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
                                        <td colspan="5">لا يوجد فئات في قاعدة البيانات</td>
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
                                    <a class="page-link" href="{{ $personClasses->previousPageUrl() }}"
                                        tabindex="-1">السابق</a>
                                </li>
                                <li class="page-item disabled"></li>
                                <li class="page-item">
                                    <a class="page-link" href="{{ $personClasses->nextPageUrl() }}">التالي</a>
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
