@extends('layouts.app')

@section('content')
    <!-- Main Slider Start -->


    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="panel panel-default">
                    
                    <div class="card">
                        <div class="card-header">
                            <h4> دعوة لحضور وشة عمل حول التأمين الصحي</h4>

                        </div>
                        <div class="card-body">
                            <table>
                                <tr>
                                    <h5>مرحبًا بكم في صفحة التسجيل لحضور ورشة عمل حول التأمين الصحي المقدم من شركة .. للتأمين</h5>
                                </tr>
                                <tr>
                                    <h5>
                                        التاريخ : الإثنين 14/3/2022م </h5>
                                </tr>
                                <tr>
                                    <h5>
                                        الوقت : 9:00 - 12:00 صباحاً
                                    </h5>
                                </tr>
                                <tr>
                                    <h5>
                                        الموقع : القاعة الرئيسية في الشركة
                                    </h5>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5> سجل الآن</h5>

                        </div>
                        <div class="card-body">

                            <form method="POST" action="{{ route('inviteds/userInviteStore') }}">
                                @csrf

                                <div class="form-group row">

                                    <div class="col-md-8">
                                        <label for="title" class="col-md-3 col-form-label text-md-right">
                                            <h5>اللقب</h5>
                                        </label>

                                        <select class="form-control" name="title" id="title" data-select-search="true"
                                            required>
                                            <option value="">اختر اللقب</option>
                                            @foreach ($titles as $title)
                                                <option value="{{ $title->id }}">{{ $title->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <label for="fullname" class="col-md-3 col-form-label text-md-right">
                                            <h5>الاسم الكامل </h5>
                                        </label>
                                        <input id="fullname" type="text" class="form-control" name="fullname"
                                            value="" autocomplete="الاسم الكامل" autofocus required>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <label for="mobile_no" class="col-md-3 col-form-label text-md-right">
                                            <h5> رقم الجوال</h5>
                                        </label>
                                        <input id="mobile_no" type="text" class="form-control" name="mobile_no"
                                            value="" autocomplete="" autofocus required>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <label for="email" class="col-md-3 col-form-label text-md-right">
                                            <h5> البريد الالكتروني</h5>
                                        </label>
                                        <input id="email" type="text" class="form-control" name="email"
                                            value="" autocomplete="" autofocus required>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <label for="organization" class="col-md-3 col-form-label text-md-right">
                                            <h5> الجهة</h5>
                                        </label>
                                        <input id="organization" type="text" class="form-control" name="organization"
                                            value="" autocomplete=" " autofocus required>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <label for="position" class="col-md-3 col-form-label text-md-right">
                                            <h5> المنصب</h5>
                                        </label>
                                        <input id="position" type="text" class="form-control" name="position"
                                            value="" autocomplete=" " autofocus required>

                                    </div>
                                </div>



                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary" id="submitbtn" value="Submit"> إرسال
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



                </div>

            </div>


        </div>
    </div>

    <!-- Main Slider End -->


    <!-- List Of Products End -->
@endsection
