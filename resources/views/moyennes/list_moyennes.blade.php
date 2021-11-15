@extends('layout.utilisateur.index')
@section('content')
@section('title','Liste des moyennes')
    @if (auth()->user()->grade === 'Professeur')
        <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold text-primary text-center"> LISTE DES MOYENNES MATIERE </h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NOM & PRENOM(S) </th>
                            <th>CLASSE</th>
                            <th>MATIERE</th>
                            <th>PERIODE </th>
                            <th>INTERROGATION</th>
                            <th>DEVOIR</th>
                            <th>EXAMEN</th>
                            <th>MOYENNE</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>NOM & PRENOM(S) </th>
                            <th>CLASSE</th>
                            <th>MATIERE</th>
                            <th>PERIODE </th>
                            <th>INTERROGATION</th>
                            <th>DEVOIR</th>
                            <th>EXAMEN</th>
                            <th>MOYENNE</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($moyenne as $moyennes)
                            @foreach ($year as $years)
                                @if ($moyennes->annee_scolaire === "$years->annee_debut-$years->annee_fin")
                                    <tr>
                                        <td> {{"$moyennes->nom $moyennes->prenom"}} </td>
                                        <td> {{$moyennes->classe}} </td>
                                        <td> {{$moyennes->matiere}} </td>
                                        <td> {{"$moyennes->periode $moyennes->term"}} </td>
                                        <td> {{$moyennes->interrogation}} </td>
                                        <td> {{$moyennes->devoir}} </td>
                                        <td> {{$moyennes->examen}} </td>
                                        <td> {{$moyennes->avg_matiere}} </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @elseif (auth()->user()->grade === 'Eleve')
        <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold text-primary text-center"> LISTE DES MOYENNES MATIERE </h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>CLASSE</th>
                            <th>MATIERE</th>
                            <th>PERIODE </th>
                            <th>INTERROGATION</th>
                            <th>DEVOIR</th>
                            <th>EXAMEN</th>
                            <th>MOYENNE</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>CLASSE</th>
                            <th>MATIERE</th>
                            <th>PERIODE </th>
                            <th>INTERROGATION</th>
                            <th>DEVOIR</th>
                            <th>EXAMEN</th>
                            <th>MOYENNE</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                            $student_connected = \App\Models\Personne::where('id',auth()->user()->personne_id)
                            ->where('statut','Eleve')->first();
                            $moyenne_eleve_connected = \App\Models\Moyenne::where('nom',$student_connected->nom)
                            ->where('prenom',$student_connected->prenom)->get();
                        @endphp
                        @foreach ($moyenne_eleve_connected as $moyennes)
                            @foreach ($year as $years)
                                @if ($moyennes->annee_scolaire === "$years->annee_debut-$years->annee_fin")
                                    <tr>
                                        <td> {{$moyennes->classe}} </td>
                                        <td> {{$moyennes->matiere}} </td>
                                        <td> {{"$moyennes->periode $moyennes->term"}} </td>
                                        <td> {{$moyennes->interrogation}} </td>
                                        <td> {{$moyennes->devoir}} </td>
                                        <td> {{$moyennes->examen}} </td>
                                        <td> {{$moyennes->avg_matiere}} </td>
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
