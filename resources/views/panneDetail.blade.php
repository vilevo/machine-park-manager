@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Détails de la panne</h2>
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        <!--  @if(session('warning'))
      <div class="mb-2 mr-2 alert alert-pill alert-warning" role="alert">
        {{ session('warning') }}
      </div>
      @endif
      @if(session('success'))
      <div class="mb-2 mr-2 alert alert-pill alert-success" role="alert">
        {{ session('success') }}
      </div>
      @endif -->
    </div>
    <div class="card-body">
        <div class="col-12">
            <!-- Recent Order Table -->
            <div class="card card-table-border-none" id="recent-orders">
                <div class="card-header justify-content-between">
                    <?php setlocale(LC_TIME, 'fr_FR.utf8', 'fra'); ?>
                    <h2>Veuillez gérer votre panne ici | <small data-toggle="modal" data-target="#filterDateModal" style="color: blue;">Filtrer par date</small></h2>
                    <div class="date-range-report ">
                        <span></span>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Engin</th>
                                <th>Chauffeur</th>
                                <th scope="col">Type panne</th>
                                <th scope="col">Mécanicien en charge</th>
                                <th scope="col">Déclarée le</th>
                                <th>Panne réparée?</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($pannes) > 0)
                            @foreach($pannes->all() as $panne)
                            <tr>
                                <td scope="row">{{$panne->matricule_engin}}</td>
                                <td>{{$panne->chauffeur}}</td>
                                <td>{{$panne->type_panne}}</td>
                                <td>{{$panne->mecanicien}}</td>
                                <!-- <td>{{strftime("%A %d %B %Y",strtotime($panne->created_at))}}</td> -->
                                <td>{{$panne->created_at}}</td>
                                <td>
                                    @if($panne->status == 1)
                                    <span class="badge badge-danger"><a href="{{route('pannes.reparer', $panne->id)}}" style="color: #fff;">Déclaré l'engin réparé</a></span>
                                    @elseif($panne->status == 0)
                                    <span class="badge badge-success">Réparée le {{$panne->repare_le}}</span>
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
                    <br>
                    <hr>
                    <h4 style="color: black;">Approvisionnement en huile</h4>
                    @if(count($huiles) > 0)
                    <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                        <thead>
                            <tr>
                                <th>Engin</th>
                                <th>Chauffeur</th>
                                <th class="d-none d-md-table-cell">Type d'huile</th>
                                <th class="d-none d-md-table-cell">Quantité d'huile</th>
                                <th class="d-none d-md-table-cell">Personne en charge</th>
                                <th class="d-none d-md-table-cell">Approvisionné le</th>
                                <th>Prochain approvionement</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($huiles->all() as $huile)
                            <tr>
                                <td>{{$huile->matricule_engin}}</td>
                                <td>{{$huile->chauffeur}}</td>
                                <td class="d-none d-md-table-cell">{{$huile->type_huile}}</td>
                                <td class="d-none d-md-table-cell">{{$huile->quantite}}</td>
                                <td class="d-none d-md-table-cell">{{$huile->approvisionneur}}</td>
                                <td class="d-none d-md-table-cell">{{strftime("%A %d %B %Y",strtotime($huile->created_at))}}</td>
                                <td>
                                    <span class="badge badge-danger">{{strftime("%A %d %B %Y",strtotime($huile->reapprovisionnement))}}</span>

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

                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('modal')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouté un engin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modal_form" class="contactform" action='{{ route("pannes.create") }}' method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <input id="matricule_engin" type="text" class="form-control" name="matricule_engin" :value="old(' matricule_engin')" placeholder="Numéro matricule de l'engin" required autofocus />
                    </div>
                    <div class="form-group row">
                        <input id="mecanicien" type="text" class="form-control" name="chauffeur" :value="old(' chauffeur')" placeholder="Nom du chauffeur en charge" required autofocus />
                    </div>
                    <div class="form-group row">
                        <textarea class="form-control" name="type_panne" id="" cols="30" rows="10" placeholder="Détaillez la panne ici..."></textarea>
                    </div>
                    <div class="form-group row">
                        <input id="mecanicien" type="text" class="form-control" name="mecanicien" :value="old(' mecanicien')" placeholder="Nom du mécanicien en charge" required autofocus />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submite" class="btn btn-primary">Créer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="filterDateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filtrer les détails par date</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modal_form" class="contactform" action='{{ route("pannes.create") }}' method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <input id="start_date" type="date" class="form-control" name="start_date" :value="old(' start_date')" required />
                    </div>
                    <div class="form-group row">
                        <input id="end_date" type="date" class="form-control" name="end_date" :value="old(' end_date')" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submite" class="btn btn-primary">Créer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection