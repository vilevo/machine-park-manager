@extends('layouts.app')

@section('content')
<h2>Statistique</h2> <br>
<div class="row">
    <div class="col-xl-3 col-sm-6">
        <div class="card card-mini mb-4">
            <div class="card-body">
                <h2 class="mb-1">{{$counts['comptes']}}</h2>
                <p>utilisateurs</p>
                <div class="chartjs-wrapper">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card card-mini  mb-4">
            <div class="card-body">
                <h2 class="mb-1">{{$counts['pannes']}}</h2>
                <p>Pannes (réparées et non réparées</p>
                <div class="chartjs-wrapper">
                    <canvas id="dual-line"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card card-mini mb-4">
            <div class="card-body">
                <h2 class="mb-1">{{$counts['deplacement']}}</h2>
                <p>Engins en déplacement</p>
                <div class="chartjs-wrapper">
                    <canvas id="area-chart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card card-mini mb-4">
            <div class="card-body">
                <h2 class="mb-1">{{$counts['approvisionnement']}}</h2>
                <p>Total Approvisionnement</p>
                <div class="chartjs-wrapper">
                    <canvas id="line"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <!-- Recent Order Table -->
        <div class="card card-table-border-none" id="recent-orders">
            <div class="card-header justify-content-between">
                <h2>Engins en bon état</h2>
                <div class="date-range-report ">
                    <span></span>
                </div>
            </div>
            <div class="card-body pt-0 pb-5">
                <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                    <thead>
                        <tr>
                            <th style="color: #1b223c; font-weight: bold;">Reference</th>
                            <th class="d-none d-md-table-cell" style="color: #1b223c; font-weight: bold;">Modele</th>
                            <th style="color: #1b223c; font-weight: bold;"> Type </th>
                            <th class="d-none d-md-table-cell" style="color: #1b223c; font-weight: bold;">Catégorie</th>
                            <th style="color: #1b223c; font-weight: bold;">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <!-- Recent Order Table -->
        <div class="card card-table-border-none" id="recent-orders">
            <div class="card-header justify-content-between">
                <h2>Engins en panne</h2>
                <div class="date-range-report ">
                    <span></span>
                </div>
            </div>
            <div class="card-body pt-0 pb-5">
                <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                    <thead>
                        <tr>
                            <th style="color: #1b223c; font-weight: bold;">Reference</th>
                            <th class="d-none d-md-table-cell" style="color: #1b223c; font-weight: bold;">Modele</th>
                            <th style="color: #1b223c; font-weight: bold;"> Type </th>
                            <th class="d-none d-md-table-cell" style="color: #1b223c; font-weight: bold;">Catégorie</th>
                            <th style="color: #1b223c; font-weight: bold;">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection