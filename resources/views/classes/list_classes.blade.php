@extends('layout.utilisateur.index')
@section('content')
@section('title','Liste des classes')
<div>
    <div class="card-header py-3">
        <h1 class="m-0 font-weight-bold text-primary text-center"> LISTE DES CLASSES </h1>
        <a type="button" class="btn btn-success" href=" {{route('add_classe')}} "> Ajouter une classe </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>CLASSE </th>
                        <th>NIVEAU</th>
                        <th>CAPACITE </th>
                        <th>NOMBRE DE MATIERE</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                       <th>CLASSE </th>
                        <th>NIVEAU</th>
                        <th>CAPACITE </th>
                        <th>NOMBRE DE MATIERE</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($classe as $classes)
                        <tr>
                            <td> {{"$classes->libelle $classes->serie$classes->groupe"}} </td>
                            <td> {{$classes->niveau}} </td>
                            <td> {{$classes->capacite}} </td>
                            <td> {{$classes->nbre_matiere}} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
