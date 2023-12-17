@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4> qrcode</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="#">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-8">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">
                                        qrcode</label>

                                    <input id="qrcode" type="email" class="form-control" name="qrcode" value="" required autocomplete="email" autofocus>

                                    </div>
                            </div>
            

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                         إرسال
                                    </button>
                                    <a href="{{route('admin/home')}}" class="btn btn-danger">
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
