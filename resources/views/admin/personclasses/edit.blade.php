@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header">
                    <h4> تعديل  الفئة</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('personclasses.update', [$personclass->id]) }}">
                        @csrf
                        @method('put')

                        
                        <div class="form-group row">
                        <div class="col-md-6">
                                <label for="personClass" class="col-md-3 col-form-label text-md-right"> <h5> الفئة </h5>  </label>
                                <input id="name" type="text" class="form-control" name="name" value="{{$personclass->name}}"
                                    autocomplete=" الفئة " autofocus>
                               
                            </div>
                                                
                          
                        </div>
                        
                        
                        <div class="form-group row">
                        <div class="col-md-6">
                                <label for="color" class="col-md-3 col-form-label text-md-right"><h5>  لون الفئة</h5></label>
                                
                                    <br/>
                                    <input type="radio" id="red" name="color" value="أحمر" @if ($personclass->color=="أحمر") checked @endif>
                                     <label for="red">أحمر</label>
                                    <input type="radio" id="green" name="color" value="أخضر" @if ($personclass->color=="أخضر") checked @endif>
                                    <label for="green">أخضر</label>
                                    <input type="radio" id="blue" name="color" value="أزرق" @if ($personclass->color=="أزرق") checked @endif>
                                    <label for="green">أزرق</label>
                                    <input type="radio" id="yallow" name="color" value="أصفر" @if ($personclass->color=="أصفر") checked @endif>
                                    <label for="green">أصفر</label>
                               
                            </div>
                        
                        </div>
                        


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="submitbtn" value="Submit"> حفظ
                                </button>
                                <a href="{{ route('personclasses.index') }}" class="btn btn-default">الصفحة الرئيسية</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- content-wrapper ends -->
@endsection



