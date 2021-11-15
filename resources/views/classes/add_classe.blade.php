@extends('layout.utilisateur.index')
@section('content')
@section('title','Ajouter une classe')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <h3 class="panel-heading text-center"> AJOUTER CLASSE </h3>
            <div class="panel-body">
                <form  action="{{route('classes.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="libelle">LIBELLE</label>
                    <input class="form-control" type="text" name="libelle" value="{{old('libelle')}}">
                        @error('libelle')
                            <div style="color:red;"> {{$message}} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="serie">SERIE</label>
                        <select class="form-control" name="serie">
                            <option value=""> </option>
                            <option value="A4"> A4 </option>
                            <option value="C4"> C4 </option>
                            <option value="D"> D </option>
                            <option value="E"> E </option>
                            <option value="F1"> F1 </option>
                            <option value="F2"> F2 </option>
                            <option value="F3"> F3 </option>
                            <option value="F4"> F4 </option>
                            <option value="G1"> G1 </option>
                            <option value="G2"> G2 </option>
                            <option value="G3"> G3 </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="niveau">NIVEAU</label>
                        <select  class="form-control" name="niveau">
                            @foreach ($niveau as $niveaux)
                                <option> {{ $niveaux->libelle }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="groupe">GROUPE</label>
                        <select class="form-control" name="groupe">
                            <option value=""> </option>
                            <option value="1"> 1 </option>
                            <option value="2"> 2 </option>
                            <option value="3"> 3 </option>
                            <option value="4"> 4 </option>
                            <option value="5"> 5 </option>
                            <option value="A"> A </option>
                            <option value="B"> B </option>
                            <option value="C"> C </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label  class="capacite">CAPACITE</label>
                        <input class="form-control" type="text" name="capacite">
                        @error('capacite')
                            <div style="color:red;"> {{$message}} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label  class="nbre_matiere">NOMBRE DE MATIERE</label>
                        <input class="form-control" type="text" name="nbre_matiere">
                        @error('nbre_matiere')
                            <div style="color:red;"> {{$message}} </div>
                        @enderror
                    </div>

                    <!-- input hidden -->
                    <div hidden class="form-group">
                        <label class="annee_scolaire">ANNE SCOLAIRE</label>
                        @foreach($year as $years)
                            <input type="text" class="form-control" name="annee_scolaire" value="{{$years->annee_debut}}-{{$years->annee_fin}}" readonly >
                        @endforeach
                    </div>
                    <!-- input hidden -->

                    <button type="submit" class="btn btn-primary mb-2">AJOUTER</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
