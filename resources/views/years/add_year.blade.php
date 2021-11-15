@extends('layout.utilisateur.index')
@section('content')
@section('title','Ajouter une année scolaire')
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-info">
            <h3 class="panel-heading">FORMULAIRE AJOUTER ANNEE SCOLAIRE</h3>
            <div class="panel-body">
                <form  action="{{route('years.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>ANNEE DEBUT</label>
                        <input class="form-control" type="text" placeholder="exemple: 2019" name="annee_debut" value="{{ old('annee_debut') }}" required>
                        @error('annee_debut')
                            <div style="color:red;">{{$message}} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>ANNEE FIN</label>
                        <input class="form-control" type="text" name="annee_fin" value="{{ old('annee_fin') }}" required>
                        @error('annee_fin')
                            <div style="color:red;">{{$message}} </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mb-2">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">ANNEE SCOLAIRE EN COURS </div>
            <div class="panel-body">
                @foreach ($year as $years)
                    <p style="font-size:20px;"> ***** {{"$years->annee_debut-$years->annee_fin"}} ***** </p>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
