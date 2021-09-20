@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Liste des rendez-vous non confirmés </h2>
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
                    <th scope="col">Patient</th>
                    <th scope="col">Raison</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td scope="row"></td>
                    <td></td>
                    <td>

                        <span class="mb-2 mr-2 badge badge-pill badge-success">Payé</span>

                        <span class="mb-2 mr-2 badge badge-pill badge-danger">Impayé</span>

                    </td>
                    <td><span style="background: #0d4dd8; padding: 5px; border-radius: 5px 5px 5px 5px;"><a href="" style="color: #ffffff;"><span class="mdi mdi-pencil"></span> Gérer</a></span></td>
                </tr>

            </tbody>
        </table>

    </div>
</div>
@endsection