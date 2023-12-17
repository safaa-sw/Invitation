@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-header">
                        <h4>  تحرير الصلاحيات</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('employees/changePermission',[$employee->id])}}">
                            @csrf
                            <div class="form-group row">
                            @if (count($pages) > 0)
                                    @foreach ($pages as $page)
                                   
                                        <div class="col-md-4">
                                            <label class="form-check-label" for="{{$page->id}}">
                                                {{$page->name}}
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="{{$page->id}}" id="{{$page->id}}"
                                            @if ($employee->pages->contains($page->id)  )
                                                checked
                                            @endif>
                                        </div>
                                    
                                    @endforeach
                                @else
                                <span>لا يوجد صفحات</span>
                                                                       
                                @endif
                            </div>
            

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                         إرسال
                                    </button>
                                    <a href="{{route('employees/index')}}" class="btn btn-danger">
                                        إلغاء
                                   </a>

                                </div>
                            </div>
                        </form>
                    

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
