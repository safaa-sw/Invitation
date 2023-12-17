@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header">
                    <h4> تعديل تفاصيل طلب</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('userInvite/update', [$invited->id]) }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="pretitle" class="col-md-3 col-form-label text-md-right"> <h5>اللقب الأول</h5></label>
                                <br/>
                                    <input type="radio" id="maali" name="pretitle" value="معالي" @if ($invited->pretitle=="معالي") checked @endif>
                                     <label for="maali">معالي</label>
                                    <input type="radio" id="saada" name="pretitle" value="سعادة" @if ($invited->pretitle=="سعادة") checked @endif>
                                    <label for="saada">سعادة</label>
                                    <input type="radio" id="mr" name="pretitle" value="mr" @if ($invited->pretitle=="mr") checked @endif>
                                    <label for="mr">mr</label>
                                    <input type="radio" id="Your Excellency" name="pretitle" value="Your Excellency" @if ($invited->pretitle=="Your Excellency") checked @endif>
                                    <label for="Your Excellency">Your Excellency</label>
                            </div>
                            <div class="col-md-6">
                                <label for="title" class="col-md-3 col-form-label text-md-right"> <h5>اللقب الثاني</h5></label>
                                
                                    <select class="form-control" name="title" id="title"
                                    data-select-search="true" required>
                                    <option value="">اختر اللقب</option>
                                    @foreach ($titles as $title)
                                        <option value="{{ $title->id }}" @if ($invited->title_id==$title->id) selected @endif>{{ $title->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="fullname" class="col-md-3 col-form-label text-md-right"> <h5>الاسم الكامل </h5>  </label>
                                <input id="fullname" type="text" class="form-control" name="fullname" value="{{$invited->fullname}}"
                                    autocomplete="الاسم الكامل" autofocus>
                               
                            </div>
                            <div class="col-md-6">
                                <label for="mobile_no" class="col-md-3 col-form-label text-md-right"><h5>  رقم الجوال</h5></label>
                                <input id="mobile_no" type="text" class="form-control" name="mobile_no" value="{{$invited->mobile_no}}"
                                    autocomplete="" autofocus>
                               
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="email" class="col-md-3 col-form-label text-md-right"><h5>الايميل</h5>  </label>
                                <input id="email" type="text" class="form-control" name="email" value="{{$invited->email}}"
                                    autocomplete="البريد الالكتروني" autofocus>
                               
                            </div>
                            <div class="col-md-6">
                                <label for="organization" class="col-md-3 col-form-label text-md-right"> <h5> الجهة</h5></label>
                                <input id="organization" type="text" class="form-control" name="organization" value="{{$invited->organization}}"
                                    autocomplete=" " autofocus>
                               
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-md-6">
                                <label for="position" class="col-md-3 col-form-label text-md-right"><h5>  المنصب</h5></label>
                                <input id="position" type="text" class="form-control" name="position" value="{{$invited->position}}"
                                    autocomplete=" " autofocus>
                               
                            </div>
                            <div class="col-md-6">
                                <label for="qrcode" class="col-md-3 col-form-label text-md-right"><h5>  qrcode </h5></label>
                                <input id="qrcode" type="text" class="form-control" name="qrcode" value="{{$invited->qrcode}}" disabled>
                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="person_class" class="col-md-3 col-form-label text-md-right"><h5>  الفئة</h5></label>
                                <select class="form-control" name="person_class" id="person_class"
                                    data-select-search="true">
                                    <option value="">اختر الفئة</option>
                                    @foreach ($personClasses as $personClass)
                                        <option value="{{ $personClass->id }}" @if ($invited->person_class_id==$personClass->id) selected @endif>{{ $personClass->name }}</option>
                                    @endforeach
                            </select>
                            </div>
                            <div class="col-md-6">
                                <label for="notify_by_email" class="col-md-6 col-form-label text-md-right"><h5>  إرسال بريد مع تغيير حالة الطلب</h5></label>
                                    <br/>
                                    <input type="radio" id="yes" name="notify_by_email" value="نعم" @if ($invited->notify_by_email=="نعم") checked @endif>
                                     <label for="yes">نعم</label>
                                    <input type="radio" id="no" name="notify_by_email" value="لا" @if ($invited->notify_by_email=="لا") checked @endif>
                                    <label for="no">لا</label>
                               
                            </div>
                            
                        </div>
                        <div class="form-group row">
                           
                            
                            <div class="col-md-6">
                                <label for="is_attended" class="col-md-3 col-form-label text-md-right"> <h5>  هل حضر الحفل </h5></label>
                                
                                    <br/>
                                    <input type="radio" id="yes" name="is_attended" value="نعم" @if ($invited->is_attended=="نعم") checked @endif>
                                     <label for="yes">نعم</label>
                                    <input type="radio" id="no" name="is_attended" value="لا" @if ($invited->is_attended=="لا") checked @endif>
                                    <label for="no">لا</label> 
                               
                            </div>
                            <div class="col-md-6">
                                <label for="req_status" class="col-md-3 col-form-label text-md-right"> <h5>  حالة الطلب</h5></label>
                                   <br/>
                                   <select class="form-control" name="req_status" id="req_status"
                                   data-select-search="true" required>
                                   <option value="">اختر الحالة</option>
                                   <option value="1" @if ($invited->req_status==1) selected @endif>قيد الدراسة</option>
                                   <option value="2" @if ($invited->req_status==2) selected @endif>تم التأكيد</option>
                                   <option value="3" @if ($invited->req_status==3) selected @endif>تم الاعتذار</option>                                  
                               </select>
                               
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="submitbtn" value="Submit"> حفظ
                                </button>
                                <a href="{{ route('userInvite/index') }}" class="btn btn-default">الصفحة الرئيسية</a>
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



