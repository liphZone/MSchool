@extends('layout.utilisateur.index')
@section('content')
@section('title','Liste abonnements cantine')

<div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary text-center"> LISTE DES ABONNES A LA CANTINE </h1>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th> ELEVE </th>
                    <th> CLASSE </th>
                    <th> TYPE </th>
                    <th> MONTANT </th>
                    <th> ACTION </th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th> ELEVE </th>
                    <th> CLASSE </th>
                    <th> TYPE </th>
                    <th> MONTANT </th>
                    <th> ACTION </th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($cantine as $cantines)
                    @foreach ($year as $years)
                        @if ($cantines->annee_scolaire === "$years->annee_debut-$years->annee_fin")
                            <tr>
                                <td> {{$cantines->eleve}} </td>
                                <td> {{$cantines->classe}} </td>
                                <td> {{$cantines->type}} </td>
                                <td> {{$cantines->montant}} </td>
                                <td>
                                    <a type="button" class="btn btn-success" href=" {{route('add_cantine',$cantines->id)}}">
                                        <i class="fa fa-plus-circle"> </i> S'abonner
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="card mb-6 py-6 border-bottom-primary">
        <div class="card-body">
           <h4>  ABONNEMENT JOURNALIER </h4>
            <p>
                <h4>
                    <b>
                        Montant total : {{ $jour_montant }} F CFA
                    </b>
                </h4>
            </p>
        </div>
    </div>
    &nbsp;&nbsp;&nbsp;

    <div class="card mb-6 py-6 border-bottom-primary">
        <div class="card-body">
            <h4> ABONNEMENT HEBDOMMADAIRE </h4>
            <p>
                <h4>
                    <b>
                        Montant total : {{ $semaine_montant }} F CFA
                    </b>
                </h4>
            </p>
        </div>
    </div>
</div>
@endsection
