@extends('layout.utilisateur.index')
@section('content')
@section('title','Ajouter compte comptable')
    <div class="panel panel-info">
        <h3 class="panel-heading"> FORMULAIRE D'ENREGISTREMENT DE COMPTE COMPTABLE </h3>
        <div class="panel-body">
            <form action="{{route('comptes.store')}} " method="POST">
                @csrf
                <div class="form-group">
                    <label>CLASSE</label>
                    <input class="form-control" type="text" name="classe" value="{{ old('classe') }}" required>
                    @error('classe')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>NUMERO</label>
                    <input class="form-control" type="text" name="numero" required>
                    @error('numero')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>LIBELLE</label>
                    <input class="form-control" type="text" name="libelle" value="{{ old('libelle') }}" required>
                    @error('libelle')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>


                <div hidden class="form-group">
                    @foreach($year as $years)
                        <input type="text" class="form-control" name="annee_scolaire" value="{{$years->annee_debut}}-{{$years->annee_fin}}" readonly >
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary mb-2">Enregistrer</button>
            </form>
        </div>
    </div>
@endsection
