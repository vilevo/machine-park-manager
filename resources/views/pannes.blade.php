@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Liste des pannes | <small data-toggle="modal" data-target="#addPanne" style="background: #0d4dd8; padding: 5px; border-radius: 5px 5px 5px 5px; color:#ffffff;"><a href="#" style="color: #ffffff;"><span class="mdi mdi-plus-circle-outline"></span> Déclaré une panne</a></small></h2>

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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" style="color: #1b223c; font-weight: bold;">Engin</th>
                        <th scope="col" style="color: #1b223c; font-weight: bold;">Chauffeur</th>
                        <th scope="col" style="color: #1b223c; font-weight: bold;">Type panne</th>
                        <th scope="col" style="color: #1b223c; font-weight: bold;">Mécanicien en charge</th>
                        <th scope="col" style="color: #1b223c; font-weight: bold;">Panne déclarée le</th>
                        <th style="color: #1b223c; font-weight: bold;">Panne réparée?</th>
                    </tr>
                </thead>
                <tbody>
                    <?php setlocale(LC_TIME, 'fr_FR.utf8', 'fra'); ?>
                    @if(count($pannes) > 0)
                    @foreach($pannes->all() as $panne)
                    <tr>
                        <td scope="row">
                            {{$panne->engin_reference}}
                        </td>
                        <td style="color: #212925;">{{$panne->chauffeur}}</td>
                        <td style="color: #212925;">{{$panne->type_panne}}</td>
                        <td style="color: #212925;">{{$panne->mecanicien}}</td>
                        <td style="color: #212925;">{{$panne->created_at}}</td>
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
            {{$pannes->links()}}

        </div>

    </div>
</div>
@endsection

@section('modal')
<!-- Modal Add panne -->
<div class="modal fade" id="addPanne" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="padding: 10px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Déclaré une panne</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modal_form" class="contactform" action='{{ route("pannes.create") }}' method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <input id="matricule_engin" type="text" class="form-control" name="engin_reference" :value="old(' engin_reference')" placeholder="Numéro matricule de l'engin" required autofocus />
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submite" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Add panne -->
@endsection