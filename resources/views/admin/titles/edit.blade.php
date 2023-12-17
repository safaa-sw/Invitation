@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header">
                    <h4> تعديل  اللقب</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('titles.update', [$title->id]) }}">
                        @csrf
                        @method('put')

                        
                        <div class="form-group row">
                        <div class="col-md-6">
                                <label for="name" class="col-md-3 col-form-label text-md-right"> <h5> اللقب </h5>  </label>
                                <input id="name" type="text" class="form-control" name="name" value="{{$title->name}}"
                                    autocomplete=" اللقب " autofocus>
                               
                            </div>
                            
                            
                        </div>
                        
                        
                        <div class="form-group row">
                        <div class="col-md-6">
                                <label for="lang" class="col-md-3 col-form-label text-md-right"><h5>  لغة اللقب</h5></label>
                                
                                    <br/>
                                    <input type="radio" id="arabic" name="lang" value="عربي" @if ($title->lang=="عربي") checked @endif>
                                     <label for="arabic">عربي</label>
                                    <input type="radio" id="english" name="lang" value="english" @if ($title->lang=="english") checked @endif>
                                    <label for="english">انكليزي</label>
                               
                            </div>
                        </div>
                        


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="submitbtn" value="Submit"> حفظ
                                </button>
                                <a href="{{ route('titles.index') }}" class="btn btn-default">الصفحة الرئيسية</a>
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



