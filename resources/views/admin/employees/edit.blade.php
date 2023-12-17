@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-header">
                        <h4> تحرير بيانات الموظف</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('employees/update',[$employee->id])}}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-8">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">
                                        الاسم</label>

                                    <input id="name" type="text" class="form-control" name="name" value="{{ $employee->name }}" required autocomplete="name" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-8">
                                    <label for="username" class="col-md-4 col-form-label text-md-end">
                                        اسم المستخدم</label>

                                    <input id="username" type="text" class="form-control" name="username" value="{{ $employee->username }}" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-8">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">
                                        كلمة المرور</label>

                                    <input id="password" type="password" class="form-control" name="password" value="{{ $employee->password }}" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-8">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">
                                           البريد الالكتروني</label>

                                    <input id="email" type="email" class="form-control" name="email" value="{{ $employee->email }}" autofocus>
                                </div>
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
