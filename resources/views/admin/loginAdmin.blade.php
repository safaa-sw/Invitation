@extends('admin.layouts.auth')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="panel panel-default">

                    <div class="card">
                        <div class="card-header">
                            <h5> تسجيل الدخول</h5>

                        </div>
                        <div class="card-body">

                            <form method="POST" action="{{ route('admin/login') }}">
                                @csrf


                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">
                                            البريد الالكتروني</label>

                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <label for="password" class="col-md-4 col-form-label text-md-end">كلمة
                                            المرور</label>

                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <label class="form-check-label" for="remember">
                                            تذكرني
                                        </label>
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>



                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            تسجيل الدخول
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                هل نسيت كلمة المرور
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br/>
                    <br/>
                    <br/>
                    <br/>

                </div>

            </div>


        </div>
    </div>
@endsection
