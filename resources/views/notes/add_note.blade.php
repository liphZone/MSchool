@extends('layout.utilisateur.index')
@section('content')
@section('title','Enregistrer note')

    <div class="panel panel-info text-center">
        <h3 class="panel-heading"> FORMULAIRE D'ATTRIBUTION DE NOTES DES ELEVES </h3>
    </div>

    <div class="form-inline">
        <form action="" method="get">
            <select class="form-control" name="lesson" required>
                <option value=""> QUELLE MATIERE ? </option>
                @foreach ($matiere as $matieres)
                    <option value="{{ $matieres->libelle }}"> {{ $matieres->libelle }} </option>
                @endforeach
            </select>
            &nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary"> Choisir </button>
        </form>
    </div>
    <br>

@if (request('lesson') === null)
    <h4 class="text-danger"> Veuillez choisir la matière !</h4>
@else

    <div class="panel panel-info">
        <div class="panel-body">
            <form action="{{ route('notes.store') }}" method="POST">
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
                    <label>TYPE</label>
                    <select class="form-control" name="type" required>
                        <option value="">Choisir le type de note </option>
                        @if ($nbre->nbre_interro === 1)
                            <option value="Interro_one"> Interrogation </option>
                        @elseif ($nbre->nbre_interro === 2)
                            <option value="Interro_one">Interrogation 1</option>
                            <option value="Interro_two">Interrogation 2</option>
                        @elseif ($nbre->nbre_interro === 3)
                            <option value="Interro_one">Interrogation 1</option>
                            <option value="Interro_two">Interrogation 2</option>
                            <option value="Interro_three">Interrogation 3</option>
                        @endif

                        @if ($nbre->nbre_devoir === 1)
                            <option value="Devoir_one">Devoir </option>
                        @elseif($nbre->nbre_devoir === 2)
                            <option value="Devoir_one">Devoir 1</option>
                            <option value="Devoir_two">Devoir 2</option>
                        @endif

                        <option value="Examen">Examen</option>
                    </select>
                    @error('type')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>DUREE(hh:mm)</label>
                    <input class="form-control" type="time" name="duree" required>
                    @error('duree')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>PROFESSEUR</label>
                            <input class="form-control" type="text" name="professeur" value="{{ "$professeur_connected->nom $professeur_connected->prenom" }}" readonly>
                            @error('professeur')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>MATIERE</label>
                            <input class="form-control" type="text" name="matiere" value="{{ request('lesson') }}" readonly>
                            @error('matiere')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>CLASSE</label>
                            <input class="form-control" type="text" name="classe" value="{{ $eleve->classe }}" readonly>
                            @error('classe')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label>NOTE OBTENUE</label>
                    <input class="form-control" type="text" name="note" required>
                    @error('note')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>

                <div hidden class="form-group">
                    <input class="form-control" type="text" name="date" value="{{ date('Y-m-d') }}" readonly>
                    <input class="form-control" type="text" name="annee_scolaire" value="{{$eleve->annee_scolaire}}" readonly>
                </div>

                <button type="submit" class="btn btn-primary" id="btn"> Enregistrer</button>

            </form>
        </div>
    </div>
@endif
@endsection
