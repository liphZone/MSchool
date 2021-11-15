@extends('layout.utilisateur.index')
@section('content')
@section('title','Inscription partie I')
    <div class="panel panel-info">
        <h3 class="panel-heading"> FORMULAIRE D'INSCRIPTION DES ELEVES | PAGE 1 </h3>
    </div>

    <div class="col-md-12">
        <form action="" method="get">
            <div class="form-inline">
               <select class="form-control" onchange="choixClasse()" name="classroom" id="classroom">
                <option value="">Choisir la classe </option>
                    @foreach ($classe as $classes)
                        <option>{{ "$classes->libelle $classes->serie$classes->groupe" }} </option>
                    @endforeach
               </select>
            </div>
        </form>
    </div>

    <div class="panel panel-info">
        <div class="panel-body">
            <form action="{{route('second_part_entry_action')}} " method="POST" enctype="multipart/form-data" id="student_form" style="display: none">
                @csrf
                <h3> ELEVE </h3>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>MATRICULE</label>
                            <input class="form-control" type="text" name="matricule" value="{{old('matricule')}}" required>
                            @error('matricule')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="nom">NOM</label>
                            <input class="form-control" type="text" name="nom" id="select_nom" value="{{old('nom')}}" required>
                            @error('nom')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="prenom">PRENOM</label>
                            <input class="form-control" type="text" name="prenom" id="select_prenom" value="{{old('prenom')}}" required>
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

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label class="contact">TELEPHONE</label>
                            <input class="form-control" type="text" name="contact" value="{{old('contact')}}">
                            @error('contact')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>EMAIL</label>
                            <input class="form-control" type="email" name="email" value="{{old('email')}}">
                            @error('email')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>NIVEAU</label>
                            <select class="form-control" name="niveau" required>
                                <option value=""> Choisir </option>
                               @foreach ($niveau as $niveaux)
                                <option value="{{ $niveaux->libelle }}"> {{ $niveaux->libelle }} </option>
                               @endforeach
                            </select>
                            @error('niveau')
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

                        <div class="form-group">
                            <label class="etat">ETAT(Ancien ou nouveau Elève)</label>
                            <select class="form-control" name="etat" required>
                                <option value=""> Choisir </option>
                                <option value="A"> Ancien </option>
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
                            <label class="annee_scolaire">ANNEE SCOLAIRE </label>
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

                    </div>
                </div>
                <button type="submit" style="float: right" class="btn btn-primary">
                    suivant <i class="fa fa-arrow-right">  </i>
                </button>

            </form>
        </div>
    </div>


<script src="/lumino/js/jquery-1.11.1.min.js"></script>
<script>

    function choixClasse(){
        var clas = document.getElementById('classroom').value;
        document.getElementById('student_form').style.display = 'block';
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
