@extends('layout.utilisateur.index')
@section('content')
@section('title','Liste des dépenses')
<div>
    <div class="card-header py-3">
        <h1 class="m-0 font-weight-bold text-primary text-center"> LISTE DES DEPENSES </h1>
        <a type="button" class="btn btn-success" href=" {{route('add_depense')}} "> Faire une dépense </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th> TYPE </th>
                        <th>LIBELLE </th>
                        <th>MATERIEL </th>
                        <th>QUANTITE</th>
                        <th>PRIX UNITAIRE</th>
                        <th>MONTANT</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th> TYPE </th>
                        <th>LIBELLE </th>
                        <th>MATERIEL </th>
                        <th>QUANTITE</th>
                        <th>PRIX UNITAIRE</th>
                        <th>MONTANT</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($depense as $depenses)
                      <tr>
                          <td> {{ $depenses->type }} </td>
                          <td> {{ $depenses->libelle }} </td>
                          <td> {{ $depenses->materiel }} </td>
                          <td> {{ $depenses->quantite }} </td>
                          <td> {{ $depenses->prixunitaire }} </td>
                          <td> {{ $depenses->montant }} </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
