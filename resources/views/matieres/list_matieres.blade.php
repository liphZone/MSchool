@extends('layout.utilisateur.index')
@section('content')
@section('title','List des matières')
<div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary text-center"> LISTE DES MATIERES </h1>
    <a type="button" class="btn btn-success" href=" {{route('add_matiere')}} "> Ajouter une matière </a>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>CODE </th>
                    <th>LIBELLE</th>
                    <th>COEFFICIENT </th>
                    <th>TYPE MATIERE </th>
                    <th>CLASSE</th>
                    <th>PROFESSEUR</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>CODE </th>
                    <th>LIBELLE</th>
                    <th>COEFFICIENT </th>
                    <th>TYPE MATIERE </th>
                    <th>CLASSE</th>
                    <th>PROFESSEUR</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($matiere as $matieres)
                    <tr>
                        <td> {{ $matieres->code }} </td>
                        <td> {{ ucfirst($matieres->libelle) }} </td>
                        <td> {{ $matieres->coefficient }} </td>
                        <td> {{ $matieres->type_matiere }} </td>
                        <td> {{ $matieres->classe }} </td>
                        <td> {{ $matieres->professeur }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
