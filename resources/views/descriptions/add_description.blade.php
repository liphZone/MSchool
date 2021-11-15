@extends('layout.utilisateur.index')
@section('content')
@section('title','Ajouter description école')
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-info">
            <h3 class="panel-heading">INFORMATION SUR L'ECOLE </h3>
            <div class="panel-body">
                <form action="{{route('descriptions.store')}} " method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="nom_directeur">Directeur</label>
                        <input class="form-control" type="text" name="nom_directeur" value="{{ old('nom_directeur') }}" required>
                        @error('nom_directeur')
                            <div style="color:red;">{{ $message }} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="nom_ecole">Nom de l'école</label>
                        <input placeholder="Ex: COMPLEXE SCOLAIRE ..." class="form-control" type="text" name="nom_ecole" value="{{ old('nom_ecole') }}" required>
                        @error('nom_ecole')
                            <div style="color:red;">{{ $message }} </div>
                        @enderror
                    </div>

                    <label class="adresse_ecole">Detail sur l'ecole</label>
                    <div class="form-group">
                        <textarea class="form-control" name="adresse_ecole" id="" cols="80" rows="5" value="{{ old('adresse_ecole') }}" required> </textarea>
                        @error('adresse_ecole')
                            <div style="color:red;">{{ $message }} </div>
                        @enderror
                    </div>
                    <label class="image_ecole">Image  de l'ecole</label>
                    <div class="form-group">
                        <input type="file" name="image_ecole" class="form-control" required>
                        @error('image_ecole')
                            <div style="color:red;">{{ $message }} </div>
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

                    <button type="submit" class="btn btn-primary mb-2">Enregistrer</button>
                </form>
            </div>
        </div>
	 </div>
</div>

@endsection
