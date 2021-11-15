@extends('layout.utilisateur.index')
@section('content')
@section('title','Ajouter un niveau')
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-info">
            <h3 class="panel-heading"> AJOUTER NIVEAU</h3>
            <div class="panel-body">
                <form  action="{{route('levels.store')}} " method="POST" >
                    @csrf
                    <div class="form-group">
                        <label  class="libelle">LIBELLE</label>
                        <select class="form-control" name="libelle" id="">
                            <option value="Lycee">Lycée</option>
                            <option value="College">Collège</option>
                            <option value="Primaire">Primaire</option>
                            <option value="Maternelle">Maternelle</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label  class="nombre_classe">NOMBRE DE CLASSE</label>
                        <input class="form-control" type="text" name="nombre_classe">
                        @error('nombre_classe')
                            <div style="color:red;">{{$message}} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label  class="periode"> PERIODE </label>
                        <select class="form-control" name="periode" id="">
                            <option value="Semestre">Semestre</option>
                            <option value="Trimestre">Trimestre</option>
                        </select>
                        @error('periode')
                            <div style="color:red;">{{$message}} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label  class="montant">MONTANT ECOLAGE</label>
                        <input class="form-control" type="text" name="montant">
                        @error('montant')
                            <div style="color:red;">{{$message}} </div>
                        @enderror
                    </div>

                    <!-- input hidden -->
                    <div hidden class="form-group">
                        <input class="form-control" type="text" name="utilisateur" value="{{auth()->user()->username}}" readonly>
                    </div>

                    <div hidden class="form-group">
                        <label class="annee_scolaire">ANNE SCOLAIRE</label>
                        @foreach($year as $years)
                            <input type="text" class="form-control" name="annee_scolaire" value="{{$years->annee_debut}}-{{$years->annee_fin}}" readonly >
                        @endforeach
                    </div>
                    <!-- input hidden -->

                    <button type="submit" class="btn btn-block btn-primary mb-2">AJOUTER</button>
                </form>
            </div>
        </div>
    </div>
@endsection
