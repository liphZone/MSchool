@extends('layout.utilisateur.index')
@section('content')
@section('title','Mon profil')
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-info">
            <h3 class="panel-heading"> INFORMATION SUR MON PROFIL </h3>
        </div>

        <div class="panel panel-info">
            <div class="panel-body">
                <form action="{{ route('profile_action') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>NOM</label>
                        <input class="form-control" type="text" name="nom" value="{{ $user->nom }}" readonly>
                        @error('nom')
                            <div style="color:red;"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>PRENOM</label>
                        <input class="form-control" type="text" name="prenom" value="{{$user->prenom}}" readonly>
                        @error('prenom')
                            <div style="color:red;"> {{$message}} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>ADRESSE</label>
                        <input class="form-control" type="text" name="adresse" value="{{$user->adresse}}">
                        @error('adresse')
                            <div style="color:red;"> {{$message}} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>CONTACT</label>
                        <input class="form-control" type="text" name="contact" value="{{$user->contact}}">
                        @error('contact')
                            <div style="color:red;"> {{$message}} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>EMAIL</label>
                        <input class="form-control" type="text" name="email" value="{{$user->email}}">
                        @error('email')
                            <div style="color:red;"> {{$message}} </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success btn-block" id="btn"> Modifier</button>

                </form>
            </div>
        </div>

    </div>
    <div class="col-md-6">

        <div class="panel panel-info">
            <h3 class="panel-heading"> MODIFIER MOT DE PASSE </h3>
        </div>

        <div class="panel panel-info">
            <div class="panel-body">
                <form action="{{ route('profile_password_update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>NOM D'UTILISATEUR</label>
                        <input class="form-control" type="text" name="username" value="{{ auth()->user()->username }}" readonly>
                        @error('username')
                            <div style="color:red;"> {{$message}} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>NOUVEAU MOT DE PASSE </label>
                        <input class="form-control" type="password" name="password" required>
                        @error('password')
                            <div style="color:red;"> {{$message}} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>CONFIRMER MOT DE PASSE </label>
                        <input class="form-control" type="password" name="password_confirmation" required>
                        @error('password_confirmation')
                            <div style="color:red;"> {{$message}} </div>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-success btn-block" id="btn"> Modifier</button>

                </form>
            </div>
        </div>

    </div>

</div>

@endsection
