@extends('layout.utilisateur.index')
@section('content')
@section('title','Liste des notes')
    @if (auth()->user()->grade === 'Professeur')
        <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold text-primary text-center"> LISTE DES NOTES DES ELEVES </h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NOM & PRENOM(S) </th>
                            <th>CLASSE</th>
                            <th>MATIERE</th>
                            <th>TYPE </th>
                            <th>DUREE</th>
                            <th>NOTE</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>NOM & PRENOM(S) </th>
                            <th>CLASSE</th>
                            <th>MATIERE</th>
                            <th>TYPE </th>
                            <th>DUREE</th>
                            <th>NOTE</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($eleve as $eleves)
                            <tr>
                                <td> {{"$eleves->nom $eleves->prenom"}} </td>
                                <td> {{$eleves->classe}} </td>
                                <td> {{$eleves->matiere}} </td>
                                <td> {{$eleves->type}} </td>
                                <td> {{$eleves->duree}} </td>
                                <td> {{$eleves->note}} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    @elseif (auth()->user()->grade === 'Eleve')
        <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold text-primary text-center"> LISTE DES NOTES</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>CLASSE</th>
                            <th>MATIERE</th>
                            <th>TYPE </th>
                            <th>DUREE</th>
                            <th>NOTE</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>CLASSE</th>
                            <th>MATIERE</th>
                            <th>TYPE </th>
                            <th>DUREE</th>
                            <th>NOTE</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                            $student_connected = \App\Models\Personne::where('id',auth()->user()->personne_id)
                            ->where('statut','Eleve')->first();

                            $note_eleve_connected = \App\Models\Note::where('nom',$student_connected->nom)
                            ->where('prenom',$student_connected->prenom)
                            ->where('annee_scolaire',"$year->annee_debut-$year->annee_fin")->get();
                        @endphp
                        @foreach ($note_eleve_connected as $eleves)
                            <tr>
                                <td> {{$eleves->classe}} </td>
                                <td> {{$eleves->matiere}} </td>
                                <td> {{$eleves->type}} </td>
                                <td> {{$eleves->duree}} </td>
                                <td> {{$eleves->note}} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection
