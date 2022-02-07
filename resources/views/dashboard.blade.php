@extends('layouts.app')

@section('content')
<h2>Bienvenue {{Auth::user()->name}}</h2> <br>
<div class="row">
    <div class="col-xl-3 col-sm-6">
        <div class="card card-mini mb-4">
            <div class="card-body">
                @if(!empty($count_users))
                <h2 class="mb-1">{{$count_users}}</h2>
                @else
                <h2 class="mb-1">0</h2>
                @endif
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
                @if(!empty($count_pannes))
                <h2 class="mb-1">{{$count_pannes}}</h2>
                @else
                <h2 class="mb-1">0</h2>
                @endif
                <p>Engins en panne</p>
                <div class="chartjs-wrapper">
                    <canvas id="dual-line"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card card-mini mb-4">
            <div class="card-body">
                @if(!empty($count_engins_deplace))
                <h2 class="mb-1">{{$count_engins_deplace}}</h2>
                @else
                <h2 class="mb-1">0</h2>
                @endif
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
                <!-- <h2 class="mb-1">{{count($huiles)}}</h2> -->
                <p>Approvisionnement</p>
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
                <h2>Engins recemment ajoutés</h2>
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
                        @if(!empty($engins))
                        @foreach($engins->all() as $engin)
                        <tr>
                            <td style="color: #212925;">{{$engin->reference }}</td>
                            <td class="d-none d-md-table-cell">
                                <a href="{{route('pannes.show', $engin->id)}}" style="color: #212925;">{{ $engin->name}}</a>
                            </td>
                            <td style="color: #212925;">{{ $engin->type}}</td>
                            <td class="d-none d-md-table-cell" style="color: #212925;">{{$engin->categorie->libelle}}</td>
                            <td>
                                @if($engin->en_panne == 1)
                                <span class="badge badge-danger"><a href="{{route('pannes.show', $engin->id)}}" style="color: #ffff;">En panne</a> </span>
                                @elseif($engin->en_panne == 0)
                                <span class="badge badge-success">Fonctionne</span>
                                @endif
                            </td>
                            <td class="text-right">
                                <div class="dropdown show d-inline-block widget-dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                        <li class="dropdown-item">
                                            <a href="#">View</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="#">Remove</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection