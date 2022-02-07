@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Engin | <small data-toggle="modal" data-target="#exampleModal" style="background: #0d4dd8; padding: 5px; border-radius: 5px 5px 5px 5px; color:#ffffff;"><a href="#" style="color: #ffffff;"><span class="mdi mdi-pencil"></span> Ajouté un engin</a></small></h2>
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
                    <h2>Engins recemment ajoutés</h2>
                    <div class="date-range-report ">
                        <span></span>
                    </div>
                </div>
                <div class="card-body pt-0 pb-5">
                    <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                        <thead>
                            <tr>
                                <th>Reference</th>
                                <th class="d-none d-md-table-cell">Modele</th>
                                <th>Type</th>
                                <th class="d-none d-md-table-cell">Catégorie</th>
                                <th class="d-none d-md-table-cell">Approvionement en Gasoil prévu</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>{{$engin->reference }}</td>
                                <td class="d-none d-md-table-cell">
                                    <a href="{{route('pannes.show', $engin->id)}}" style="color: gray;">{{ $engin->name}}</a>
                                </td>
                                <td>{{ $engin->type}}</td>
                                <td class="d-none d-md-table-cell">{{$engin->categorie->libelle}}</td>
                                <td class="d-none d-md-table-cell">

                                </td>
                                <td>
                                    @if($engin->etat == 1)
                                    <span class="badge badge-danger"><a href="{{route('pannes.show', $engin->id)}}" style="color: #ffff;">En panne</a> </span>
                                    @endif
                                    @if($engin->etat == 0)
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
                <h5 class="modal-title" id="exampleModalLabel">Ajouté un engin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modal_form" class="contactform" action='{{ route("engins.create") }}' method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <input id="name" type="text" class="form-control" name="name" :value="old(' name')" placeholder="Nom ou model du vehicule" required autofocus />
                    </div>
                    <div class="form-group row">
                        <input id="reference" type="text" class="form-control" name="reference" :value="old(' reference')" placeholder="Numéro de référence du vehicule" required autofocus />
                    </div>
                    <div class="form-group row">
                        <select class="form-control" name="type" id="" required>
                            <option value="camion">camion</option>
                            <option value="engin">engin</option>
                            <option value="autre">autre</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <select class="form-control" name="categorie_id" id="" required>
                            @if(count($engin_categories) > 0)
                            @foreach($engin_categories->all() as $engin_categorie)
                            <option value="{{ $engin_categorie->id}}">{{ $engin_categorie->libelle }}</option>
                            @endforeach
                            @endif
                        </select>
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

<div class="modal fade" id="panneModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Signalé une panne</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modal_form" class="contactform" action='{{ route("engins.create") }}' method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input id="mecanicien" type="hidden" class="form-control" name="mecanicien" />
                    <div class="form-group row">
                        <textarea class="form-control" name="type_panne" id="" cols="30" rows="10" placeholder="Détaillez la panne ici..."></textarea>
                    </div>
                    <div class="form-group row">
                        <input id="mecanicien" type="text" class="form-control" name="mecanicien" :value="old(' matricule')" placeholder="Nom du mécanicien en charge" required autofocus />
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