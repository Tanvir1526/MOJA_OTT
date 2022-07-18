@extends('admin.layouts.main')
@section('content')
{{@csrf_field()}}

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bar chart</h4>
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 grid-margin grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pie chart</h4>
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>

        </div>


    </div>

</div>

@endsection