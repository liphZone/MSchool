@extends('layout.utilisateur.index')
@section('content')
@section('title','Ajouter une dépense')
    <div class="panel panel-info">
        <h3 class="panel-heading"> FORMULAIRE DEPENSES </h3>
        <div class="panel-body">
            <form action="{{route('depenses.store')}} " method="POST">
                @csrf
                <div class="form-group">
                    <label>TYPE</label>
                    <input class="form-control" type="text" name="type" value="{{ old('type') }}" required>
                    @error('type')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>LIBELLE</label>
                    <input class="form-control" type="text" name="libelle" value="{{ old('libelle') }}" required>
                    @error('libelle')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>MATERIEL</label>
                    <input class="form-control" type="text" name="materiel" value="{{ old('materiel') }}" required>
                    @error('materiel')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>QUANTITE</label>
                    <input class="form-control" type="number" name="quantite" id="qte" required>
                    @error('quantite')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>PRIX UNITAIRE </label>
                    <input class="form-control" type="number" name="prixunitaire" onkeyup="calcMontant()" id="pu" required>
                    @error('prixunitaire')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>


                <div hidden class="form-group">
                    <input class="form-control" type="number" name="montant" id="montant" required>
                    @foreach($year as $years)
                        <input type="text" class="form-control" name="annee_scolaire" value="{{$years->annee_debut}}-{{$years->annee_fin}}" readonly >
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary mb-2">Enregistrer</button>
            </form>
        </div>
    </div>

    <script>
        function calcMontant(){
            var quantite      = parseInt(document.getElementById('qte').value);
            var prix_unitaire = parseFloat(document.getElementById('pu').value);

            document.getElementById('montant').value = quantite*prix_unitaire;
        }
    </script>
@endsection
