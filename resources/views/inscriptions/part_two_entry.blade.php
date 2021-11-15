@extends('layout.utilisateur.index')
@section('content')
@section('title','Inscription partie II')
    <div class="panel panel-info">
        <h3 class="panel-heading"> FORMULAIRE D'INSCRIPTION DES ELEVES | PAGE 2 </h3>
    </div>

    <div class="panel panel-info">
        <div class="panel-body">
            <form action="{{route('third_part_entry_action')}}" method="POST" id="student_form">
                @csrf
                <h3> PARENT  </h3>
                <div class="row">
                    <input hidden class="form-control" type="text" name="matricule" value="{{ request('matricule') }}" readonly>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>TYPE PARENT</label>
                            <select class="form-control" name="type_parent" required>
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
                            <label>NOM & PRENOM DU PARENT</label>
                            <input class="form-control" type="text" name="nom_parent" value="{{old('nom_parent')}}" required>
                            @error('nom_parent')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>SEXE DU PARENT</label>
                            <select class="form-control" name="sexe_parent" required>
                                <option value=""> Choix </option>
                                <option value="Masculin"> Masculin </option>
                                <option value="Feminin"> Féminin </option>
                            </select>
                            @error('sexe_parent')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>PROFESSION DU PARENT</label>
                            <input class="form-control" type="text" name="profession_parent" value="{{old('profession_parent')}}" required>
                            @error('profession_parent')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>ADRESSE DU PARENT</label>
                            <input class="form-control" type="text" name="adresse_parent" value="{{old('adresse_parent')}}" required>
                            @error('adresse_parent')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>CONTACT DU PARENT</label>
                            <input class="form-control" type="text" name="contact_parent" value="{{old('contact_parent')}}" required>
                            @error('contact_parent')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>MAIL DU PARENT</label>
                            <input class="form-control" type="email" name="email_parent" value="{{old('email_parent')}}">
                            @error('email_parent')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                    </div>

                    <div class="col-md-6">
                        <h3> PARENT SECONDAIRE </h3>
                        <div class="form-group">
                            <label class="nom_parent_secondaire">NOM & PRENOM DU PARENT SECONDAIRE </label>
                            <input class="form-control" type="text" name="nom_parent_secondaire" value="{{old('nom_parent_secondaire')}}">
                            @error('nom_parent_secondaire')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>PROFESSION DU PARENT SECONDAIRE</label>
                            <input class="form-control" type="text" name="profession_parent_secondaire" value="{{old('profession_parent_secondaire')}}">
                            @error('profession_parent_secondaire')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>CONTACT DU PARENT SECONDAIRE</label>
                            <input class="form-control" type="text" name="contact_parent_secondaire" value="{{old('contact_parent_secondaire')}}">
                            @error('contact-parent_secondaire')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <h3> AUTRE PARENT </h3>
                        <div class="form-group">
                            <label>NOM & PRENOM </label>
                            <input class="form-control" type="text" name="autre_parent" value="{{old('autre_parent')}}">
                        </div>

                        <div class="form-group">
                            <label>PROFESSION DU PARENT</label>
                            <input class="form-control" type="text" name="profession_autre_parent" value="{{old('profession_autre_parent')}}">
                            @error('profession__autre_parent')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>CONTACT </label>
                            <input class="form-control" type="text" name="contact_autre_parent" value="{{old('contact_autre_parent')}}">
                        </div>

                    </div>
                </div>
                <button type="submit" style="float: right" class="btn btn-primary">
                    suivant <i class="fa fa-arrow-right">  </i>
                </button>

            </form>
        </div>
    </div>

@endsection
