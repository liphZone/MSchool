@extends('layout.utilisateur.index')
@section('content')
@section('title','Ajouter un utilisateur')
    <div class="panel panel-info">
        <h3 class="panel-heading"> FORMULAIRE D'AJOUT DES UTILISATEURS </h3>
        <div class="panel-body">
            <div class="form-group">
                <select onchange="statusChange()" class="form-control" name="stat" id="stat" required>
                    <option value=""> QUEL STATUT POUR VOTRE NOUVEL UTILISATEUR? </option>
                    <option value="Administrateur"> Administrateur </option>
                    <option value="Secretaire"> Secrétaire </option>
                    <option value="Comptable"> Comptable </option>
                    <option value="Professeur"> Professeur </option>
                    <option value="Surveillant"> Surveillant </option>
                </select>
                @error('statut')
                    <div style="color:red;">{{$message}} </div>
                @enderror
            </div>

            <form action="{{route('personnes.store')}}" method="POST" name="" enctype="multipart/form-data" id="user_form" style="display: none">
                @csrf
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="nom">NOM</label>
                            <input class="form-control" type="text" name="nom" value="{{ old('nom') }}" required>
                            @error('nom')
                                <div style="color:red;">{{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="prenom">PRENOM</label>
                            <input class="form-control" type="text" name="prenom" value="{{ old('prenom') }}" required>
                            @error('prenom')
                                <div style="color:red;">{{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="sexe">SEXE</label>
                            <select class="form-control" name="sexe" value="{{ old('sexe') }}" required>
                                <option value=""> Choix du sexe</option>
                                <option value="M"> M </option>
                                <option value="F"> F </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="email">EMAIL</label>
                            <input class="form-control" type="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div style="color:red;">{{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="adresse">ADRESSE</label>
                            <input class="form-control" type="text" name="adresse" value="{{ old('adresse') }}" required>
                            @error('adresse')
                                <div style="color:red;">{{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>CONTACT</label>
                            <input class="form-control" type="text" name="contact" value="{{ old('contact') }}" required>
                            @error('contact')
                                <div style="color:red;">{{$message}} </div>
                            @enderror
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label class="profil">PROFIL</label>
                            <input class="form-control" type="file" name="profil">
                            @error('profil')
                                <div style="color:red;">{{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>STATUT</label>
                            <input class="form-control" type="text" name="statut" id="statut" readonly>
                            @error('adresse')
                                <div style="color:red;">{{$message}} </div>
                            @enderror
                        </div>

                        <!-- input hidden -->
                        <div hidden class="form-group">
                            @foreach($year as $years)
                                <input type="text" class="form-control" name="annee_scolaire" value="{{$years->annee_debut}}-{{$years->annee_fin}}" readonly >
                            @endforeach
                        </div>
                        <!-- input hidden -->

                        <div class="form-group">
                            <label> NOM D'UTILISATEUR</label>
                            <input class="form-control" type="text" name="username" value="{{ old('username') }}" required>
                            @error('username')
                                <div style="color:red;">{{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label> MOT DE PASSE </label>
                            <input class="form-control" type="password" name="password" required>
                            @error('password')
                                <div style="color:red;">{{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>CONFIRMATION DU MOT DE PASSE </label>
                            <input class="form-control" type="password" name="password_confirmation" required>
                            @error('password_confirmation')
                                <div style="color:red;">{{$message}} </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block mb-2"> ENREGISTRER </button>
            </form>
        </div>
    </div>
<script>
    function statusChange(){
        var stat = document.getElementById('stat').value;
        if (stat === 'Administrateur' || stat === 'Secretaire'|| stat === 'Comptable' || stat === 'Professeur' || stat === 'Surveillant') {
            document.getElementById('user_form').style.display = 'block';
            document.getElementById('statut').value = stat;
        }
        else{
            document.getElementById('user_form').style.display = 'block';
            document.getElementById('statut').value = stat;
        }
    }
</script>

@endsection
