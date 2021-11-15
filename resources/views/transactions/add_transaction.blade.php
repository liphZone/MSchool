@extends('layout.utilisateur.index')
@section('content')
@section('title','Etablir une transaction')
<div class="form-group">
    <select class="form-control" name="transact" onchange="transactChange()" id="transact" required>
        <option value=""> QUELLE TRANSACTION VOULEZ-VOUS EFFECTUEZ ? </option>
        <option value="cais_bank"> Caisse ===> Banque </option>
        <option value="bank_cais"> Banque ===> Caisse </option>
        <option value="scol_cais"> Scolarité ===> Caisse </option>
        <option value="cais_scol"> Caisse ===> Scolarité </option>
    </select>
</div>

<div class="panel panel-info" id="form_transact" style="display: none">
    <h3 class="panel-heading"> FORMULAIRE DES TRANSACTIONS </h3>
    <div class="panel-body">
        <form action="{{route('transactions.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <label for=""> MONTANT TOTAL SCOLARITE </label>
                    <input class="form-control" type="text" name="scolarite" id="mt_scolarite" value="{{ $montant_scolarite }}" readonly>
                </div>
                <div class="col-md-4">
                    <label for=""> MONTANT TOTAL CAISSE </label>
                    <input class="form-control" type="text" name="caisse" id="mt_caisse" value="{{ $montant_caisse }}" readonly>
                </div>
                <div class="col-md-4">
                    <label for=""> MONTANT TOTAL BANQUE </label>
                    <input class="form-control" type="text" name="banque" id="mt_banque" value="{{ $montant_banque }}" readonly>
                </div>
            </div>

            <div class="form-group">
                <label class="libelle">LIBELLE</label>
                <input class="form-control" type="text" name="libelle" value="{{ old('libelle') }}" required>
                @error('libelle')
                    <div style="color:red;"> {{$message}} </div>
                @enderror
            </div>

            <div class="form-group">
                <label>MONTANT</label>
                <p class="text-danger" id="warn_msg" style="display:none"> Le montant que vous avez saisi dépasse la somme existante ! </p>
                <input class="form-control" min="0" max="50000" type="number" id="montant" name="montant" required>
                @error('montant')
                    <div style="color:red;"> {{$message}} </div>
                @enderror
            </div>

            <div hidden class="form-group">
                <input class="form-control" type="text" name="type_one" id="type_one" readonly>
                <input class="form-control" type="text" name="type_two" id="type_two" readonly>
                @foreach($year as $years)
                    <input type="text" class="form-control" name="annee_scolaire" value="{{$years->annee_debut}}-{{$years->annee_fin}}" readonly >
                @endforeach
            </div>

            <button  type="submit" class="btn btn-primary mb-2" id="button">Enregistrer</button>
        </form>
    </div>
</div>

<script>
    function transactChange(){
        var transact = document.getElementById('transact').value;


        if (transact === 'cais_bank') {
            document.getElementById('type_one').value = 'Caisse';
            document.getElementById('type_two').value = 'Banque';
            document.getElementById('form_transact').style.display = 'block';
        }
        else if (transact === 'bank_cais') {
            document.getElementById('type_one').value = 'Banque';
            document.getElementById('type_two').value = 'Caisse';
            document.getElementById('form_transact').style.display = 'block';
        }
        else if (transact === 'scol_cais') {
            document.getElementById('type_one').value = 'Scolarite';
            document.getElementById('type_two').value = 'Caisse';
            document.getElementById('form_transact').style.display = 'block';
        }
        else if (transact === 'cais_scol') {
            document.getElementById('type_one').value = 'Caisse';
            document.getElementById('type_two').value = 'Scolarite';
            document.getElementById('form_transact').style.display = 'block';
        }else{
            alert('Veuillez sélectionner une opération');
        }
    }

</script>
@endsection
