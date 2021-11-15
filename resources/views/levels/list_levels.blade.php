@extends('layout.utilisateur.index')
@section('content')
@section('title','Liste des niveaux')
<div>
    <div class="card-header py-3">
        <h1 class="m-0 font-weight-bold text-primary text-center"> LISTE DES NIVEAUX </h1>
        <a type="button" class="btn btn-success" href=" {{route('add_level')}} "> Ajouter un niveau </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th> LIBELLE </th>
                        <th> NOMBRE CLASSE</th>
                        <th> ECOLAGE</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th> LIBELLE </th>
                        <th> NOMBRE CLASSE</th>
                        <th> ECOLAGE</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($niveau as $niveaux)
                        <tr>
                            <td> {{ $niveaux->libelle }} </td>
                            <td> {{ $niveaux->nombre_classe }} </td>
                            <td> {{ $niveaux->montant }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
