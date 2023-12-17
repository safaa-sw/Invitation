@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header">
                    <h4> تعديل المقعد </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('eventday/seat/update', [$invited->id]) }}">
                        @csrf

                        <div class="form-group row">
                            
                            <div class="col-md-6">
                                <label for="invitedSeat" class="col-md-3 col-form-label text-md-right"> <h5>رمز المقعد</h5></label>
                                
                                    <select class="form-control" name="invitedSeat" id="invitedSeat"
                                    data-select-search="true" required>
                                    <option value="">اختر المقعد</option>
                                    @foreach ($seats as $seat)
                                    @if ($invited->seat_id==$seat->id)
                                    <option value="{{ $seat->id }}" selected>{{ $seat->code }}</option> 
                                    @endif
                                    @if ($seat->status==0)
                                    <option value="{{ $seat->id }}">{{ $seat->code }}</option>
                                    @endif      
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="submitbtn" value="Submit"> حفظ
                                </button>
                                <a href="{{ route('eventday/seat/plan', [$invited->id]) }}" class="btn btn-success">مخطط الكراسي </a>
                                <a href="{{ route('eventday/all') }}" class="btn btn-default">الصفحة الرئيسية</a>
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



