@extends('layout.utilisateur.index')
@section('content')
@section('title','Message de diffusion')
    <div class="panel panel-info" id="form_message" style="display: block">
        <h3 class="panel-heading"> FORMULAIRE D'ENVOIE DE MESSAGE </h3>
        <div class="panel-body">
            <form action="{{route('message_broadcastin_action')}} " method="POST">
                @csrf

                <div class="form-group">
                    <p>
                        <label>MESSAGE </label>
                    </p>
                    <textarea name="commentaire" id="" cols="40" rows="5"></textarea>
                    @error('commentaire')
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
