@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Liste des Approvisionnement | <small data-toggle="modal" data-target="#exampleModal" style="background: #0d4dd8; padding: 5px; border-radius: 5px 5px 5px 5px; color:#ffffff;"><a href="#" style="color: #ffffff;"><span class="mdi mdi-pencil"></span> Nouvel approvisionnement</a></small></h2>

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
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <div class="loading">Erreur</div>
                        <div class="error-message">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <h2>Approvisionnement recent</h2>
                    <?php setlocale(LC_TIME, 'fr_FR.utf8', 'fra'); ?>
                    <div class="date-range-report ">
                        <span></span>
                    </div>
                </div>
                <div class="card-body pt-0 pb-5">
                    <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                        <thead>
                            <tr>
                                <th style="color: #1b223c; font-weight: bold;">Engin</th>
                                <th style="color: #1b223c; font-weight: bold;">Chauffeur</th>
                                <th class="d-none d-md-table-cell" style="color: #1b223c; font-weight: bold;">Type d'huile</th>
                                <th class="d-none d-md-table-cell" style="color: #1b223c; font-weight: bold;">Quantité d'huile</th>
                                <th class="d-none d-md-table-cell" style="color: #1b223c; font-weight: bold;">Personne en charge</th>
                                <th class="d-none d-md-table-cell" style="color: #1b223c; font-weight: bold;">Approvisionné le</th>
                                <th style="color: #1b223c; font-weight: bold;">Prochain approvionement</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($huiles) > 0)
                            @foreach($huiles->all() as $huile)
                            <tr>
                                <td style="color: #212925;">{{$huile->engin_reference}}</td>
                                <td style="color: #212925;">{{$huile->chauffeur}}</td>
                                <td class="d-none d-md-table-cell" style="color: #212925;">{{$huile->type_huile}}</td>
                                <td class="d-none d-md-table-cell" style="color: #212925;">{{$huile->quantite}}</td>
                                <td class="d-none d-md-table-cell" style="color: #212925;">{{$huile->approvisionneur}}</td>
                                <!-- <td class="d-none d-md-table-cell">{{strftime("%A %d %B %Y",strtotime($huile->created_at))}}</td> -->
                                <td class="d-none d-md-table-cell" style="color: #212925;">{{$huile->created_at}}</td>
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
                            @endif
                        </tbody>
                    </table>
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
                <h5 class="modal-title" id="exampleModalLabel">Approvisionnement en huile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modal_form" class="contactform" action='{{ route("huiles.create") }}' method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <input id="chauffeur" type="text" class="form-control" name="chauffeur" :value="old(' chauffeur')" placeholder="Nom du chauffeur en charge" required autofocus />
                    </div>
                    <div class="form-group row">
                        <input id="engin_reference" type="text" class="form-control" name="engin_reference" :value="old(' matricule_engin')" placeholder="Matricule engin" required autofocus />
                    </div>
                    <div class="form-group row">
                        <input id="type_huile" type="text" class="form-control" name="type_huile" :value="old(' type_huile')" placeholder="Le type d'huile" required autofocus />
                    </div>
                    <div class="form-group row">
                        <input id="quantite" type="text" class="form-control" name="quantite" :value="old(' quantite')" placeholder="Quantité d'huile" required autofocus />
                    </div>
                    <div class="form-group row">
                        <input id="approvisionneur" type="text" class="form-control" name="approvisionneur" :value="old(' approvisionneur')" placeholder="Chargé de l'approvisionnement" required autofocus />
                    </div>
                    <div class="form-group row">
                        <input id="reapprovisionnement" type="date" class="form-control" name="reapprovisionnement" :value="old(' reapprovisionnement')" autofocus />
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