@extends('layout.utilisateur.index')
@section('content')
@if (auth()->user()->grade === 'Professeur')
    @section('title','Liste des absents')
    <div class="card-header py-3">
        <h1 class="m-0 font-weight-bold text-primary text-center"> LISTE DES ABSENTS </h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NOM & PRENOM(S) </th>
                        <th>CLASSE</th>
                        <th>MOTIF</th>
                        <th>DATE </th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NOM & PRENOM(S) </th>
                        <th>CLASSE</th>
                        <th>MOTIF</th>
                        <th>DATE </th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($absence as $absences)
                        @foreach ($year as $years)
                            @if ($absences->annee_scolaire === "$years->annee_debut-$years->annee_fin")
                                <tr>
                                    <td> {{"$absences->nom $absences->prenom"}} </td>
                                    <td> {{$absences->classe}} </td>
                                    <td> {{$absences->matiere}} </td>
                                    <td> {{$absences->type}} </td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@elseif (auth()->user()->grade === 'Surveillant')
    @section('title','Liste des retards')
    <div class="card-header py-3">
        <h1 class="m-0 font-weight-bold text-primary text-center"> LISTE DES RETARDS </h1>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NOM & PRENOM(S) </th>
                        <th>CLASSE</th>
                        <th>MOTIF</th>
                        <th>DATE </th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NOM & PRENOM(S) </th>
                        <th>CLASSE</th>
                        <th>MOTIF</th>
                        <th>DATE </th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($retard as $retards)
                        @foreach ($year as $years)
                            @if ($retards->annee_scolaire === "$years->annee_debut-$years->annee_fin")
                                <tr>
                                    <td> {{"$retards->nom $retards->prenom"}} </td>
                                    <td> {{$retards->classe}} </td>
                                    <td> {{$retards->motif}} </td>
                                    <td> {{$retards->date}} </td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif


@endsection
