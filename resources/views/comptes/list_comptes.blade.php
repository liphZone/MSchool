@extends('layout.utilisateur.index')
@section('content')
@section('title','Liste des comptes comptables')
<div>
    <div class="card-header py-3">
        <h1 class="m-0 font-weight-bold text-primary text-center"> LISTE DES COMPTES </h1>
        <a type="button" class="btn btn-success" href=" {{route('add_compte')}} "> Enregistrer un compte </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th> CLASSE </th>
                        <th>NUMERO  </th>
                        <th>LIBELLE </th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th> CLASSE </th>
                        <th>NUMERO  </th>
                        <th>LIBELLE </th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($compte as $comptes)
                      <tr>
                          <td> {{ $comptes->classe }} </td>
                          <td> {{ $comptes->numero }} </td>
                          <td> {{ $comptes->libelle }} </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
