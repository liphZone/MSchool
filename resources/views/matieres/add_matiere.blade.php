@extends('layout.utilisateur.index')
@section('content')
@section('title','Ajouter une matière')
        <div class="panel panel-info">
            <h3 class="panel-heading"> FORMULAIRE AJOUT MATIERE</h3>
            <div class="panel-body">
                <form action="{{route('matieres.store')}} " method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="code">CODE</label>
                                <input class="form-control" type="text" name="code" value="{{ old('code') }}" required>
                                @error('code')
                                    <div style="color:red;"> {{$message}} </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="libelle">LIBELLE</label>
                                <input class="form-control" type="text" name="libelle" value="{{ old('libelle') }}" required>
                                @error('libelle')
                                    <div style="color:red;"> {{$message}} </div>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>COEFFICIENT</label>
                        <input class="form-control" type="text" name="coefficient" value="{{ old('coefficient') }}" required>
                        @error('libelle')
                            <div style="color:red;"> {{$message}} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="type_matiere">TYPE MATIERE</label>
                        <select class="form-control" name="type_matiere" required>
                            <option value="">Choisir type matière </option>
                            <option value="Litteraire"> Littéraire </option>
                            <option value="Scientifique"> Scientifique </option>
                            <option value="Facultative"> Facultative </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="classe">CLASSE</label>
                        <select class="form-control" id="select_classe" name="classe" required>
                            <option value="">Choisir classe </option>
                            @foreach($classe as $classes)
                                <option> {{ "$classes->libelle $classes->serie$classes->groupe"}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="professeur">PROFESSEUR</label>
                                <select class="form-control" id="select_professeur" name="professeur" required>
                                    <option value=""> Choisir professeur</option>
                                    @foreach($professeur as $professeurs)
                                        <option> {{ "$professeurs->nom $professeurs->prenom "}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="type">TYPE</label>
                                <select class="form-control" name="type">
                                    <option value=""> Choisir </option>
                                    <option value="Vacataire"> Vacataire </option>
                                    <option value="Permanent"> Permanent </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> TYPE PROFESSEUR</label>
                                <select class="form-control" name="type_professeur">
                                    <option value=""> Choisir </option>
                                    <option value="Professeur">Simple Professeur </option>
                                    <option value="Titulaire">Titulaire </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NOMBRE D'INTERROGATION</label>
                                <input class="form-control" type="number" min="1" max="3" name="nbre_interro" required>
                                @error('nbre_interro')
                                    <div style="color:red;"> {{$message}} </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NOMBRE DE DEVOIR </label>
                                <input class="form-control" type="number" min="1" max="2" name="nbre_devoir" required>
                                @error('nbre_devoir')
                                    <div style="color:red;"> {{$message}} </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">AJOUTER</button>
                </form>
            </div>
        </div>
@endsection
