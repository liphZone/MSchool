@extends('layout.utilisateur.index')
@section('content')
@section('title','Liste des transactions')
<div>
    <div class="card-header py-3">
        <h1 class="m-0 font-weight-bold text-primary text-center"> LISTE DES TRANSACTIONS </h1>
        <a type="button" class="btn btn-success" href=" {{route('add_transaction')}}"> Faire une transaction </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th> LIBELLE </th>
                        <th>MONTANT </th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th> LIBELLE </th>
                        <th>MONTANT </th>
                    </tr>
                </tfoot>
                <tbody>
                   @foreach ($transaction as $transactions)
                      <tr>
                        <td> {{ $transactions->libelle }} </td>
                        <td> {{ $transactions->montant }} </td>
                      </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
