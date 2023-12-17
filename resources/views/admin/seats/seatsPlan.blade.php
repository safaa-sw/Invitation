@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4> مخطط الكراسي</h4>
                    </div>
                    <div class="card-body">
                        <div><a href="{{ route('eventday/seat/edit',[$id]) }}" class="btn btn-primary">عودة </a></div>
                        <div><img src="{{ asset($image) }}" alt="seats plan" style="height: 800px; width:1000px"></div>
                                      
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
