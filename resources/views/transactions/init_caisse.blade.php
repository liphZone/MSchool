@extends('layout.utilisateur.index')
@section('content')
@section('title','Initialiser la caisse')
<div class="panel panel-info">
    <h3 class="panel-heading"> FORMULAIRE D'INITIALISATION DE LA CAISSE </h3>
    <div class="panel-body">
        <form action="{{route('init_caisse_action')}}" method="POST">
            @csrf
            <div class="form-group">
                <label class="libelle">LIBELLE</label>
                <input class="form-control" type="text" name="libelle" value="{{ old('libelle') }}" required>
                @error('libelle')
                    <div style="color:red;"> {{$message}} </div>
                @enderror
            </div>

            <div class="form-group">
                <label>MONTANT</label>
                <input class="form-control" type="text" name="montant" required>
                @error('montant')
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
