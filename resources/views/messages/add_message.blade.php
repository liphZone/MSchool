@extends('layout.utilisateur.index')
@section('content')
@section('title','Message privé')
    <div class="panel panel-info" id="form_message" style="display: block">
        <h3 class="panel-heading"> FORMULAIRE D'ENVOIE DE MESSAGE </h3>
        <div class="panel-body">
            <form action="{{route('messages.store')}} " method="POST">
                @csrf
                <div class="form-group">
                    <label>EMETTEUR</label>
                    <input class="form-control" type="text" name="emetteur" value="{{ "$user->nom $user->prenom" }}" readonly>
                    @error('emetteur')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>RECEPTEUR</label>
                    <input class="form-control" type="text" name="recepteur" value="{{ "$personne->nom $personne->prenom" }}" readonly>
                    @error('recepteur')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>SUJET</label>
                    <input class="form-control" type="text" name="sujet" required>
                    @error('sujet')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>CONTENU</label>
                    <input class="form-control" type="text" name="contenu" required>
                    @error('contenu')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>

                <div hidden class="form-group">
                    @foreach($year as $years)
                        <input type="text" class="form-control" name="annee_scolaire" value="{{$years->annee_debut}}-{{$years->annee_fin}}" readonly>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary mb-2"> Envoyer </button>
            </form>
        </div>
    </div>

@endsection
