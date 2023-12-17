@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4> تقارير الكراسي</h4>
                    </div>
                    <div class="card-body">
                        <div>
                            <a href="#" class="btn btn-success text-white me-0"><i
                                class="icon-printer"></i>
                            طباعة</a>
                        
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-5 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="d-sm-flex justify-content-between align-items-start">
                                                    <div class="card-title">
                                                        <h4> الدعوات</h4>
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
                                                        <h4> التسجيل </h4>
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
                            <div class="col-lg-5 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="d-sm-flex justify-content-between align-items-start">
                                                    <div class="card-title">
                                                        <h4>كرسي VIP</h4>
                                                    </div>
                                                </div>
                                                <div>
                                                    <canvas id="VIPSeats"></canvas>
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
                                                        <h4>كرسي عادي</h4>
                                                    </div>
                                                </div>
                                                <div>
                                                    <canvas id="normalSeat"></canvas>
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
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="jquery-circle-progress/dist/circle-progress.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        var seats = @json($seatsNo);
        var data1 = {
            labels: ["فارغ", "محجوز"],
            datasets: [{
                data: [seats['seatVIPEmpty'], seats['seatVIPBooked']],
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
        if ($("#VIPSeats").length) {
            var lineChartCanvas = $("#VIPSeats").get(0).getContext("2d");
            var lineChart = new Chart(lineChartCanvas, {
                type: 'pie',
                data: data1,
                options: options
            });
        }
        ///////////////////////////////////////////////////////////////////////////////////////////////
        var data2 = {
            labels: ["فارغ", "محجوز"],
            datasets: [{
                data: [seats['seatNormalEmpty'],seats['seatNormalBooked']],
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
        if ($("#normalSeat").length) {
            var lineChartCanvas = $("#normalSeat").get(0).getContext("2d");
            var lineChart = new Chart(lineChartCanvas, {
                type: 'pie',
                data: data2,
                options: options
            });
        }
        ///////////////////////////////////////////////////////////////////////////
        var data3 = {
            labels: ["vip", "normal","فارغ"],
            datasets: [{
                data: [seats['seatInviteVIP'], seats['seatInviteNormal'],seats['seatEmpty']],
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
        if ($("#inviteOverview").length) {
            var lineChartCanvas = $("#inviteOverview").get(0).getContext("2d");
            var lineChart = new Chart(lineChartCanvas, {
                type: 'pie',
                data: data3,
                options: options
            });
        }

        ///////////////////////////////////////////////////////////////////////////
        var data4 = {
            labels: ["vip", "normal","فارغ"],
            datasets: [{
                data: [seats['seatRegisterVIP'], seats['seatRegisterNormal'],seats['seatEmpty']],
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
                data: data4,
                options: options
            });
        }


    });
</script>

