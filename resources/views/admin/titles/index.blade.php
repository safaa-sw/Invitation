@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-header">
                        <h4> الألقاب </h4>
                    </div>
                    <div class="card-body">
                        <div>
                            <a href="{{ route('titles.create') }}" class="btn btn-success text-white me-0"><i
                                class="mdi mdi-plus-circle-outline"></i>
                            إضافة</a>
                        
                        </div>

                        <br/>
                        <br/>                      
                    

                        <table id="titleTable"
                            class="table table-bordered table-striped {{ count($titles) > 0 ? 'datatable' : '' }} dt-select">
                            <thead>
                                <tr>
                                    <th>م</th>
                                    
                                    <th>اللقب</th>
                                    <th>اللغة</th>
                                    
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (count($titles) > 0)
                                    @foreach ($titles as $title)
                                        <tr data-entry-id="{{ $title->id }}">

                                            <td>{{ $title->id }}</td>
                                            
                                            <td>{{ $title->name }}</td>
                                            <td>{{ $title->lang }} </td>
                                            
                                            

                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><a href="{{ route('titles.edit', [$title->id]) }}"
                                                            class="badge badge-primary badge-sm">
                                                            <i class="mdi mdi-pencil-box-outline"></i></a>
                                                        </td>
                                                        <td>
                                                            <form action="{{ route('titles.destroy', [$title->id]) }}"
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
                                    <a class="page-link" href="{{ $titles->previousPageUrl() }}"
                                        tabindex="-1">السابق</a>
                                </li>
                                <li class="page-item disabled"></li>
                                <li class="page-item">
                                    <a class="page-link" href="{{ $titles->nextPageUrl() }}">التالي</a>
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
