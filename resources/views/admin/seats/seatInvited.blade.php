@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header">
                    <h4> تعديل كرسي المدعو</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('eventday/seat/updateInvited', [$seat->id]) }}">
                        @csrf

                        <div class="form-group row">
                            
                            <div class="col-md-6">
                                <label for="invitedSeat" class="col-md-3 col-form-label text-md-right"> <h5>رمز الكرسي: {{$seat->code}}</h5></label>
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-6">
                                <label for="newInvited" class="col-md-3 col-form-label text-md-right"> <h5> المدعو </h5></label>
                                
                                    <select class="form-control" name="newInvited" id="newInvited"
                                    data-select-search="true" required>
                                    <option value="">اختر المدعو</option>
                                    @foreach ($inviteds as $invited)
                                    @if ($invited->seat_id == $seat->id)
                                    <option value="{{ $invited->id }}" selected>{{ $invited->fullname }}</option> 
                                    @endif
                                    @if ($invited->seat_id==null)
                                    <option value="{{$invited->id }}">{{ $invited->fullname }}</option>
                                    @endif      
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-md-6">
                                <label for="invitedSeat" class="col-md-3 col-form-label text-md-right"> <h5>فئة الكرسي : {{$seat->seat_class}}</h5></label>
                            </div>
                        </div>
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="submitbtn" value="Submit"> حفظ
                                </button>
                                <a href="{{ route('eventday/seat/all') }}" class="btn btn-default">الصفحة الرئيسية</a>
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