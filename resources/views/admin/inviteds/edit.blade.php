@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header">
                    <h4> تعديل تفاصيل دعوة</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('inviteds.update', [$invited->id]) }}">
                        @csrf
                        @method('put')

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
                                <label for="email" class="col-md-3 col-form-label text-md-right"><h5>الايميل</h5>  </label>
                                <input id="email" type="text" class="form-control" name="email" value="{{$invited->email}}"
                                    autocomplete="البريد الالكتروني" autofocus>
                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="email_other" class="col-md-3 col-form-label text-md-right"><h5> ايميل إضافي</h5></label>
                                <input id="email_other" type="text" class="form-control" name="email_other" value="{{$invited->email_other}}"
                                    autocomplete="" autofocus>
                               
                            </div>
                            <div class="col-md-6">
                                <label for="organization" class="col-md-3 col-form-label text-md-right"> <h5> الجهة</h5></label>
                                <input id="organization" type="text" class="form-control" name="organization" value="{{$invited->organization}}"
                                    autocomplete=" " autofocus>
                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="mobile_no" class="col-md-3 col-form-label text-md-right"><h5>  رقم واتساب</h5></label>
                                <input id="mobile_no" type="text" class="form-control" name="mobile_no" value="{{$invited->mobile_no}}"
                                    autocomplete="" autofocus>
                               
                            </div>
                            <div class="col-md-6">
                                <label for="position" class="col-md-3 col-form-label text-md-right"><h5>  المنصب</h5></label>
                                <input id="position" type="text" class="form-control" name="position" value="{{$invited->position}}"
                                    autocomplete=" " autofocus>
                               
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
                                <label for="invitation_lang" class="col-md-3 col-form-label text-md-right"><h5>  لغة الدعوة </h5></label>
                                
                                    <br/>
                                    <input type="radio" id="arabic" name="invitation_lang" value="عربي" @if ($invited->invitation_lang=="عربي") checked @endif>
                                     <label for="arabic">عربي</label>
                                    <input type="radio" id="english" name="invitation_lang" value="english" @if ($invited->invitation_lang=="english") checked @endif>
                                    <label for="english">english</label>
                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="qrcode" class="col-md-3 col-form-label text-md-right"><h5>  qrcode </h5></label>
                                <input id="qrcode" type="text" class="form-control" name="qrcode" value="{{$invited->qrcode}}" disabled>
                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="notify_by_email" class="col-md-3 col-form-label text-md-right"><h5>  إرسال بريد </h5></label>
                                    <br/>
                                    <input type="radio" id="yes" name="notify_by_email" value="نعم" @if ($invited->notify_by_email=="نعم") checked @endif>
                                     <label for="yes">نعم</label>
                                    <input type="radio" id="no" name="notify_by_email" value="لا" @if ($invited->notify_by_email=="لا") checked @endif>
                                    <label for="no">لا</label>
                               
                            </div>
                            <div class="col-md-4">
                                <label for="notify_by_whatsup" class="col-md-3 col-form-label text-md-right"> <h5> إرسال واتساب</h5></label>
                                   <br/>
                                    <input type="radio" id="yes" name="notify_by_whatsup" value="نعم" @if ($invited->notify_by_whatsup=="نعم") checked @endif>
                                     <label for="yes">نعم</label>
                                    <input type="radio" id="no" name="notify_by_whatsup" value="لا" @if ($invited->notify_by_whatsup=="لا") checked @endif>
                                    <label for="no">لا</label>
                               
                            </div>
                            <div class="col-md-4">
                                <label for="attendance" class="col-md-3 col-form-label text-md-right"> <h5> تأكيد الحضور </h5></label>
                                
                                    <br/>
                                    <input type="radio" id="yes" name="attendance" value="نعم" @if ($invited->attendance=="نعم") checked @endif>
                                     <label for="yes">نعم</label>
                                    <input type="radio" id="no" name="attendance" value="لا" @if ($invited->attendance=="لا") checked @endif>
                                    <label for="no">لا</label> 
                               
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="submitbtn" value="Submit"> حفظ
                                </button>
                                <a href="{{ route('inviteds.index') }}" class="btn btn-default">الصفحة الرئيسية</a>
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



