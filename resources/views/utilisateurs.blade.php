@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Liste des utilisateurs | <small data-toggle="modal" data-target="#exampleModal" style="background: #0d4dd8; padding: 5px; border-radius: 5px 5px 5px 5px; color:#ffffff;"><a href="#" style="color: #ffffff;"><span class="mdi mdi-pencil"></span> Créer un nouvel utilisateur</a></small></h2>
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
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Fonction</th>
                    <th scope="col">Numéro de téléphone</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td scope="row">{{ $user->name }}</td>
                    <td>{{ $user->fonction }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->adresse }}</td>
                    <td><span style="background: #0d4dd8; padding: 5px; border-radius: 5px 5px 5px 5px;"><a href="" style="color: #ffffff;"><span class="mdi mdi-pencil"></span> Gérer</a></span></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection

@section('modal')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouté un utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modal_form" class="contactform" action='{{ route("utilisateurs.create") }}' method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-group row">
                        <input id="name" type="text" class="form-control" name="name" :value="old('name')" placeholder="Nom complet" required autofocus />
                    </div>
                    <div class="form-group row">
                        <input id="email" type="email" class="form-control" name="email" :value="old('email')" placeholder="Nom email" required />
                    </div>
                    <div class="form-group row">
                        <input id="phone" type="text" class="form-control" name="phone" :value="old('phone')" placeholder="Nom phone" required />
                    </div>
                    <div class="form-group row">
                        <input id="fonction" type="text" class="form-control" name="fonction" :value="old('fonction')" placeholder="Nom fonction" required />
                    </div>
                    <div class="form-group row">
                        <input id="adresse" type="text" class="form-control" name="adresse" :value="old('adresse')" placeholder="Nom adresse" required />
                    </div>
                    <div class="form-group row">
                        <input id="password" type="password" class="form-control" name="password" :value="old('password')" placeholder="Mot de passe" required />
                    </div>
                    <div class="form-group row">
                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" :value="old('password_confirmation')" placeholder="Retapez le mot de passe" required />
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