@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header">
                    <h4>إضافة الفئات</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('personclasses.store') }}">
                        @csrf

                        
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="personClass" class="col-md-3 col-form-label text-md-right"> <h5> الفئة </h5>  </label>
                                <input id="name" type="text" class="form-control" name="name" value=""
                                    autocomplete=" الفئة " autofocus>
                               
                            </div>
                    
                        </div>
                        
                        
                        <div class="form-group row">
                            
                            <div class="col-md-6">
                                <label for="color" class="col-md-3 col-form-label text-md-right"><h5>  لون الفئة</h5></label>
                                
                                    <br/>
                                    <input type="radio" id="red" name="color" value="أحمر">
                                     <label for="red">أحمر</label>
                                    <input type="radio" id="green" name="color" value="أخضر">
                                    <label for="green">أخضر</label>
                                    <input type="radio" id="blue" name="color" value="أزرق">
                                    <label for="green">أزرق</label>
                                    <input type="radio" id="yallow" name="color" value="أصفر">
                                    <label for="green">أصفر</label>
                               
                            </div>
                        </div>
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="submitbtn" value="Submit"> حفظ
                                </button>
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



