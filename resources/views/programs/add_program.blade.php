@extends('layout.utilisateur.index')
@section('content')
@section('title','Ajouter programme de cours')
<form action="" method="GET">
    <div class="form-inline">
        <select class="form-control" name="classroom" id="classroom" onchange="choisirClasse()" required>
            <option value=""> QUELLE CLASSE CHOISISSEZ-VOUS ? </option>
            @foreach($classe as $classes)
                <option> {{"$classes->libelle $classes->serie$classes->groupe"}}</option>
            @endforeach
        </select>
    </div>
</form>
<div class="container" id="container" style="display: none">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-info">
                <h1 class="panel-heading">FORMULAIRE D'AJOUT EMPLOI DU TEMPS </h1>
                <div class="panel-body">
                    <form action="{{route('programs.store')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label class="professeur">PROFESSEUR</label>
                            <input type="text" class="form-control" name="professeur" value="{{ "$professeur->nom $professeur->prenom" }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="classe">CLASSE</label>
                            <input type="text" class="form-control" name="classe" id="classe" readonly>

                        </div>

                        <div class="form-group">
                            <label for="matiere">MATIERE</label>
                            <select class="form-control" name="matiere">
                                @foreach ($matiere as $matieres)
                                    <option value="{{ $matieres->libelle }}"> {{ $matieres->libelle.' '."($matieres->professeur)" }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="jour">JOUR</label>
                            <select class="form-control" name="jour">
                                <option value="Lundi">Lundi </option>
                                <option value="Mardi">Mardi</option>
                                <option value="Mercredi">Mercredi</option>
                                <option value="Jeudi">Jeudi</option>
                                <option value="Vendredi">Vendredi</option>
                                <option value="Samedi">Samedi</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="h_debut">HEURE DEBUT ( h:min)</label>
                            <input class="form-control" type="time" name="h_debut">
                            @error('h_debut')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="h_fin">HEURE FIN ( h:m)</label>
                            <input class="form-control" type="time" name="h_fin">
                            @error('h_fin')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label for="position">POSITION</label>
                            <select class="form-control" name="position">
                                <option value="1">1iere heure</option>
                                <option value="2">2iem heure</option>
                                <option value="3">3iem heure</option>
                                <option value="4">4iem heure</option>
                                <option value="5">5iem heure</option>
                                <option value="6">6iem heure</option>
                                <option value="7">7iem heure</option>
                                <option value="8">8iem heure</option>
                            </select>
                        </div>

                        <!-- input hidden -->
                        <div hidden class="form-group">
                            <label class="annee_scolaire">ANNEE SCOLAIRE</label>
                            <input type="text" class="form-control" name="annee_scolaire" value="{{"$year->annee_debut-$year->annee_fin"}}" readonly >
                        </div>
                        <!-- input hidden -->

                        <input class="btn btn-block btn-primary" type="submit" value="Ajouter">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function choisirClasse(){
        var classroom = document.getElementById('classroom').value;
        if (classroom != '') {
            document.getElementById('classe').value = classroom;
            document.getElementById('container').style.display = 'block';
        }
    }
</script>

@endsection
