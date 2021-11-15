@extends('layout.utilisateur.index')
@section('content')
@section('title','Inscrire un élève')
    <div class="col-md-12">
        <form action="" method="get">
            <div class="form-inline">
               <select class="form-control" onchange="choixClasse()" name="classroom" id="classroom">
                    @foreach ($classe as $classes)
                        <option>{{ "$classes->libelle $classes->serie$classes->groupe" }} </option>
                    @endforeach
               </select>
            </div>

        </form>
    </div>


    <div class="panel panel-info">
        <h3 class="panel-heading"> FORMULAIRE D'INSCRIPTION DES ELEVES</h3>
    </div>

    <div class="panel panel-info">
        <div class="panel-body">
            <form action="{{route('inscriptions.store')}} " method="POST" enctype="multipart/form-data" id="student_form">
                @csrf
                <h3> ELEVE </h3>
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="matricule">MATRICULE</label>
                            <input class="form-control" type="text" name="matricule" value="{{old('matricule')}}" required>
                            @error('matricule')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="nom">NOM</label>
                            <input class="form-control" type="text" name="nom" id="select_nom" value="{{old('nom')}}" autocomplete="off" required>
                            @error('nom')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="prenom">PRENOM</label>
                            <input class="form-control" type="text" name="prenom" id="select_prenom" value="{{old('prenom')}}" autocomplete="off" required>
                            @error('prenom')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="date_naissance">DATE DE NAISSANCE</label>
                            <input class="form-control" type="date" name="date_naissance" value="{{old('date_naissance')}}" id="select_date" required>
                            @error('date')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="date_naissance">LIEU DE NAISSANCE</label>
                            <input class="form-control" type="text" name="lieu_naissance"  value="{{old('lieu_naissance')}}" required>
                            @error('date_naissance')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="age">AGE</label>
                            <input class="form-control" type="text" name="age" id="select_age" value="{{date('Y')}}">
                            @error('age')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="sexe">SEXE</label>
                            <select class="form-control" name="sexe"  value="{{old('sexe')}}" required>
                                <option value=""> Choix du sexe</option>
                                <option value="M"> M </option>
                                <option value="F"> F </option>
                            </select>
                            @error('sexe')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="adresse">ADRESSE</label>
                            <input class="form-control" type="text" name="adresse" value="{{old('adresse')}}">
                            @error('adresse')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="contact">TELEPHONE</label>
                            <input class="form-control" type="text" name="contact" value="{{old('contact')}}">
                            @error('contact')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="email">EMAIL</label>
                            <input class="form-control" type="email" name="email" value="{{old('email')}}">
                            @error('email')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="classe">CLASSE</label>
                            <input class="form-control" type="text" name="classe" id="classe" readonly>
                        </div>

                        <div class="form-group">
                            <label class="provenance"> ETABLISSEMENT DE PROVENANCE</label>
                            <input class="form-control" type="text" name="provenance" value="{{old('provenance')}}">
                            @error('provenance')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="etat">ETAT(Ancien ou nouveau Elève)</label>
                            <select class="form-control" name="etat"  value="{{old('etat')}}">
                                <option value="R"> Ancien </option>
                                <option value="N"> Nouveau</option>
                            </select>
                            @error('etat')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="profil">PROFIL</label>
                            <input class="form-control" type="file" name="profil">
                        </div>

                        <div class="form-group">
                            <label class="annee_scolaire">ANNEE SCOLAIRE</label>
                            <select class="form-control" name="annee_scolaire" value="{{old('annee_scolaire')}}">
                                @foreach ($year as $years)
                                    <option> {{ "$years->annee_debut-$years->annee_fin" }} </option>
                                @endforeach
                            </select>
                            @error('annee_scolaire')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="type_parent">TYPE PARENT</label>
                            <select class="form-control" name="type_parent" value="{{old('type_parent')}}" required>
                                <option value="">       Choix  </option>
                                <option value="Pere">   Père   </option>
                                <option value="Mere">   Mère   </option>
                                <option value="Oncle">  Oncle  </option>
                                <option value="Tante">  Tante  </option>
                                <option value="Tuteur"> Tuteur </option>
                            </select>
                            @error('type_parent')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="nom_parent">NOM & PRENOM DU PARENT</label>
                            <input class="form-control" type="text" name="nom_parent" value="{{old('nom_parent')}}" required>
                            @error('nom_parent')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="sexe_parent">SEXE DU PARENT</label>
                            <select class="form-control" name="sexe_parent" value="{{old('sexe_parent')}}">
                                <option value=""> Choix </option>
                                <option value="Masculin"> Masculin </option>
                                <option value="Feminin"> Féminin </option>
                            </select>
                            @error('sexe_parent')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="profession_parent">PROFESSION DU PARENT</label>
                            <input class="form-control" type="text" name="profession_parent" value="{{old('profession_parent')}}">
                            @error('profession_parent')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="adresse_parent">ADRESSE DU PARENT</label>
                            <input class="form-control" type="text" name="adresse_parent" value="{{old('adresse_parent')}}" required>
                            @error('adresse_parent')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="contact_parent">CONTACT DU PARENT</label>
                            <input class="form-control" type="text" name="contact_parent" value="{{old('contact_parent')}}">
                            @error('contact_parent')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="email_parent">MAIL DU PARENT</label>
                            <input class="form-control" type="email" name="email_parent" value="{{old('email_parent')}}">
                            @error('email_parent')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <h3> PARENT SECONDAIRE </h3>
                        <div class="form-group">
                            <label class="nom_parent_secondaire">NOM & PRENOM DU PARENT SECONDAIRE </label>
                            <input class="form-control" type="text" name="nom_parent_secondaire" value="{{old('nom_parent_secondaire')}}">
                            @error('nom_parent_secondaire')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="profession_parent_secondaire">PROFESSION DU PARENT SECONDAIRE</label>
                            <input class="form-control" type="text" name="profession_parent_secondaire" value="{{old('profession_parent_secondaire')}}">
                            @error('profession_parent_secondaire')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="contact_parent_secondaire">CONTACT DU PARENT SECONDAIRE</label>
                            <input class="form-control" type="text" name="contact_parent_secondaire" value="{{old('contact_parent_secondaire')}}">
                            @error('contact-parent_secondaire')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <h3> AUTRE PARENT </h3>
                        <div class="form-group">
                            <label class="autre_parent">NOM & PRENOM </label>
                            <input class="form-control" type="text" name="autre_parent" value="{{old('autre_parent')}}">
                        </div>

                        <div class="form-group">
                            <label class="profession_autre_parent">PROFESSION DU PARENT</label>
                            <input class="form-control" type="text" name="profession_autre_parent" value="{{old('profession_autre_parent')}}">
                            @error('profession__autre_parent')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="contact_autre_parent">CONTACT </label>
                            <input class="form-control" type="text" name="contact_autre_parent" value="{{old('contact_autre_parent')}}">
                        </div>

                        <div class="form-group">
                            <label class="montant">MONTANT PAYE</label>
                            <input class="form-control" type="text" name="montant" value="{{old('montant')}}" required>
                            @error('montant')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="date">DATE DE PAYEMENT</label>
                            <input class="form-control" type="text" name="date" value="{{ date('Y-m-d') }}" readonly>
                            @error('date')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>NOM D'UTILISATEUR</label>
                            <input class="form-control" type="text" name="username" value="{{old('username')}}" required>
                            @error('username')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="password">MOT DE PASSE</label>
                            <input class="form-control" type="password" name="password" required>
                            @error('password')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="password_confirmation">CONFIRMATION DU MOT DE PASSE</label>
                            <input class="form-control" type="password" name="password_confirmation">
                            @error('password_confirmation')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>


<script src="/lumino/js/jquery-1.11.1.min.js"></script>
<script>

    function choixClasse(){
        var clas = document.getElementById('classroom').value;
        alert(clas);
        // document.getElementById('student_form').style.display = 'block';
        document.getElementById('classe').value = clas;
    }


        /* * * Ce code permet de calculer l'age  * * * * */
	var annee_actu =parseInt($('#select_age').val());

    $("#select_date").change(function(){
        var ladate = $("#select_date").val();
        var date = ladate.split("-");
        var annee = parseInt(date[0]);
        $('#select_age').val(annee_actu - annee +" "+ 'ans');
    });
</script>
@endsection
