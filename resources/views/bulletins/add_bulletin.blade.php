@extends('layout.utilisateur.index')
@section('content')
@section('title','Ajouter moyenne élève')
    <div class="panel panel-info">
        <h3 class="panel-heading text-center"> FORMULAIRE CALCUL MOYENNE MATIERE </h3>
    </div>
    <div class="panel panel-info">
        <div class="panel-body">
            <form action="{{ route('bulletins.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>PERIODE</label>
                            <input type="text" class="form-control" name="periode" value="{{ $periode->periode }}" readonly>
                            @error('periode')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>TERME </label>
                            <input type="text" class="form-control" name="term" value="{{ $periode->term }}" readonly>
                            @error('term')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>
                    </div>
                </div>

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

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>CLASSE</label>
                            <input class="form-control" type="text" name="classe" value="{{ $eleve->classe }}" readonly>
                            @error('classe')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>
                   </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>NIVEAU</label>
                            <input class="form-control" type="text" name="niveau" value="{{$eleve->niveau }}" readonly>
                            @error('niveau')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label>MOYENNE OBTENUE</label>
                    <input class="form-control" type="text" name="moyenne" value="{{ $moyenne_obtenue }}" id="moyenne" readonly>
                    @error('moyenne')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>

                <div hidden class="form-group">
                    <input type="text" class="form-control" name="annee_scolaire" value="{{ $eleve->annee_scolaire }}" readonly>
                </div>

                <button type="submit" class="btn btn-block btn-primary" id="btn"> Enregistrer</button>

            </form>
        </div>
    </div>

@endsection
