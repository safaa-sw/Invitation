@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview"
                                    role="tab" aria-controls="overview" aria-selected="true">ماخص عام</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more"
                                    role="tab" aria-selected="false">المزيد</a>
                            </li>
                        </ul>
                        <div>
                            <div class="btn-wrapper">
                                <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i>
                                    مشاركة</a>
                                <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> طباعة</a>
                                <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i>
                                    أكسل</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content tab-content-basic">
                        <!------- More Tab Content ---------------------------------------------------------------->
                        <div class="tab-pane fade show" id="more" role="tabpanel" aria-labelledby="more">
                            there is nothing
                        </div>
                        <!-------OverView Tab Content -------------------------------------------------------------->
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                            
                            <div class="row">
                                <div class="col-lg-5 d-flex flex-column">
                                    <div class="row flex-grow">
                                        <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                            <div class="card card-rounded">
                                                <div class="card-body">
                                                    <div class="d-sm-flex justify-content-between align-items-start">
                                                        <div class="card-title">
                                                            <h4>ملخص الدعوات</h4>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <canvas id="inviteOverview"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 d-flex flex-column">
                                    <div class="row flex-grow">
                                        <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                            <div class="card card-rounded">
                                                <div class="card-body">
                                                    <div class="d-sm-flex justify-content-between align-items-start">
                                                        <div class="card-title">
                                                            <h4>ملخص التسجيل </h4>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <canvas id="registerOverview"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-3 d-flex flex-column">
                                    <div class="row flex-grow">
                                        <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                            <div class="card">
                                                
                                                <div class="card-header"><h4>كل الدعوات</h4> </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h4>العدد: {{count($all)}}</h4>
                                                    </div>
                                                    <div>
                                                        <a href="{{route('exportAll')}}" class="btn btn-success text-white me-0"><i
                                                                class="icon-download"></i>
                                                            تحميل ملف أكسل</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 d-flex flex-column">
                                    <div class="row flex-grow">
                                        <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                            <div class="card">
                                                
                                                <div class="card-header"><h4>دعوة </h4> </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h4>العدد: {{count($invite)}}</h4>
                                                    </div>
                                                    <div>
                                                        <a href="{{route('exportInvited')}}" class="btn btn-success text-white me-0"><i
                                                                class="icon-download"></i>
                                                            تحميل ملف أكسل</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 d-flex flex-column">
                                    <div class="row flex-grow">
                                        <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                            <div class="card">
                                                
                                                <div class="card-header"><h4>تسجيل </h4> </div>
                                                <div class="card-body">
                                                    <div>
                                                        <h4>العدد: {{count($register)}}</h4>
                                                    </div>
                                                    <div>
                                                        <a href="{{route('exportRegister')}}" class="btn btn-success text-white me-0"><i
                                                                class="icon-download"></i>
                                                            تحميل ملف أكسل</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="jquery-circle-progress/dist/circle-progress.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        var invite = @json($invite);
        var register = @json($register);
        var waiting = @json($waiting);
        var confirmed = @json($confirmed);
        var rejected = @json($rejected);


        var data1 = {
            labels: ["دعوة", "تسجيل"],
            datasets: [{
                data: [invite.length, register.length],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        };
        var options = {
            
            legend: {
                display: true
            },
            elements: {
                point: {
                    radius: 0
                }
            }

        };
        if ($("#inviteOverview").length) {
            var lineChartCanvas = $("#inviteOverview").get(0).getContext("2d");
            var lineChart = new Chart(lineChartCanvas, {
                type: 'pie',
                data: data1,
                options: options
            });
        }
        ///////////////////////////////////////////////////////////////////////////////////////////////
        var data2 = {
            labels: ["انتظار", "مقبول", "مرفوض"],
            datasets: [{
                data: [waiting.length, confirmed.length,rejected.length],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        };
        if ($("#registerOverview").length) {
            var lineChartCanvas = $("#registerOverview").get(0).getContext("2d");
            var lineChart = new Chart(lineChartCanvas, {
                type: 'pie',
                data: data2,
                options: options
            });
        }

    });
</script>
