@extends('layout.utilisateur.index')
@section('content')
@section('title','Payer écolage')
    <div class="panel panel-info">
        <h3 class="panel-heading"> FORMULAIRE DE PAYEMENT DE L'ECOLAGE </h3>
    </div>

    <div class="panel panel-info">
        <div class="panel-body">
            <form action="{{ route('payments.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>NOM</label>
                            <input class="form-control" type="text" name="nom" value="{{ $eleve->nom }}" autocomplete="off" readonly>
                            @error('nom')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>PRENOM</label>
                            <input class="form-control" type="text" name="prenom" value="{{$eleve->prenom}}" autocomplete="off" readonly>
                            @error('prenom')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>CLASSE</label>
                            <input class="form-control" type="text" name="classe" value="{{$eleve->classe}}" autocomplete="off" readonly>
                            @error('classe')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>NIVEAU</label>
                            <input class="form-control" type="text" name="niveau" value="{{$eleve->niveau}}" autocomplete="off" readonly>
                            @error('niveau')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>
                    </div>
                </div>



                <div hidden class="form-group">
                    <label>ANNEE SCOLAIRE</label>
                    <input class="form-control" type="text" name="annee_scolaire" value="{{$eleve->annee_scolaire}}" autocomplete="off" readonly>
                    @error('annee_scolaire')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label> SCOLARITE </label>
                    <input class="form-control" type="text" name="scolarite" value="{{ $scolarite->montant }}" id="scolarite" readonly>
                    @error('scolarite')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label> MONTANT DEJA PAYE </label>
                    <input class="form-control" type="text" name="mt_deja_paye" value="{{ $sum_montant_deja_paye }}" readonly>
                    <input hidden class="form-control" type="text" name="mt_restant" id="mt_restant" value="{{ "$scolarite->montant"-"$sum_montant_deja_paye" }}" readonly>
                    @error('scolarite')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>MONTANT A PAYER </label>
                    <input class="form-control" type="number" min="5000"
                    @if ($sum_montant_deja_paye === 0)
                        max="{{ $scolarite->montant }}"
                    @else
                        max="{{ $sum_montant_deja_paye }}"
                    @endif name="montant_paye" onkeyup="calcMontant()" id="mp" required>
                    @error('montant_paye')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>


                <div class="form-group">
                    <label>MONTANT RESTANT </label>
                    <input class="form-control" type="text" name="montant_restant" value="{{ "$scolarite->montant"-"$sum_montant_deja_paye" }}" id="mr" readonly>
                    @error('montant_restant')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary" id="btn"> Enregistrer</button>

            </form>
        </div>
    </div>
<script>
    function calcMontant(){
        var scolarite       = document.getElementById('scolarite').value;
        var montant_a_paye  = document.getElementById('mp').value;
        var montant_restant = document.getElementById('mr').value;
        var mt_restant = document.getElementById('mt_restant').value;
        document.getElementById('mr').value = mt_restant - montant_a_paye;
    }
</script>

@endsection
