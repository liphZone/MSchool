@extends('layout.utilisateur.index')
@section('content')
@section('title','Enregistrer une absence ou un retard')
@if (auth()->user()->grade === 'Professeur')

    <div class="panel panel-info">
        <h3 class="panel-heading"> FORMULAIRE D'ABSENCE DES ELEVES

        </h3>
    </div>

    <div class="panel panel-info">
        <div class="panel-body">
            <form action="{{ route('warnings.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>NOM</label>
                            <input class="form-control" type="text" name="nom" value="{{ $eleve->nom }}" readonly>
                            @error('nom')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>PRENOM</label>
                            <input class="form-control" type="text" name="prenom" value="{{$eleve->prenom}}" readonly>
                            @error('prenom')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>PROFESSEUR</label>
                    <input class="form-control" type="text" name="professeur" value="{{ $professeur->professeur }}" readonly>
                    @error('professeur')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>MATIERE</label>
                    <input class="form-control" type="text" name="matiere" value="{{ $professeur->libelle }}" readonly>
                    @error('matiere')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>CLASSE</label>
                    <input class="form-control" type="text" name="classe" value="{{ $eleve->classe }}" readonly>
                    @error('classe')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>

                <div hidden class="form-group">
                    <input class="form-control" type="text" name="type" value="Absence" readonly>
                    <input class="form-control" type="text" name="date" value="{{ date('Y-m-d') }}" readonly>
                    <input class="form-control" type="text" name="annee_scolaire" value="{{$eleve->annee_scolaire}}" readonly>
                </div>

                <button type="submit" class="btn btn-primary" id="btn"> Enregistrer</button>

            </form>
        </div>
    </div>
@else
    <div class="panel panel-info">
        <h3 class="panel-heading"> FORMULAIRE RETARD DES ELEVES

        </h3>
    </div>

    <div class="panel panel-info">
        <div class="panel-body">
            <form action="{{ route('warnings.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>NOM</label>
                            <input class="form-control" type="text" name="nom" value="{{ $eleve->nom }}" readonly>
                            @error('nom')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>PRENOM</label>
                            <input class="form-control" type="text" name="prenom" value="{{$eleve->prenom}}" readonly>
                            @error('prenom')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label>CLASSE</label>
                    <input class="form-control" type="text" name="classe" value="{{ $eleve->classe }}" readonly>
                    @error('classe')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>

                <label>MOTIF</label>
                <div class="form-group">
                    <textarea name="motif" id="" cols="30" rows="5" required></textarea>
                    @error('motif')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>

                <div hidden class="form-group">
                    <input class="form-control" type="text" name="type" value="Retard" readonly>
                    <input class="form-control" type="text" name="date" value="{{ date('Y-m-d') }}" readonly>
                    <input class="form-control" type="text" name="annee_scolaire" value="{{$eleve->annee_scolaire}}" readonly>
                </div>

                <button type="submit" class="btn btn-primary" id="btn"> Enregistrer</button>

            </form>
        </div>
    </div>

@endif

@endsection
