@extends('layout.utilisateur.index')
@section('content')
@section('title','Abonnement à la cantine')

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-info">
                <h3 class="panel-heading"> FORMULAIRE D'ABONNEMENT A LA CANTINE</h3>
                <div class="panel-body">
                    <form action="{{route('cantines.store')}} " method="POST">
                        @csrf

                        <div class="form-group">
                            <label>ELEVE</label>
                            <input class="form-control" type="text" name="eleve" value="{{ $data->eleve }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>CLASSE</label>
                            <input class="form-control" type="text" name="classe" value="{{ $data->classe }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>NIVEAU</label>
                            <input class="form-control" type="text" name="niveau" value="{{ $data->niveau }}" readonly>
                        </div>

                        <div class="form-group">
                            <label class="type">TYPE D'ABONNEMENT </label>
                            <select class="form-control" name="type" required>
                                <option value=""> Choix du type</option>
                                <option value="Journalier"> Journalier </option>
                                <option value="Hebdomadaire"> Hebdomadaire </option>
                            </select>
                            @error('type')
                                <div style="color:red;"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="date">DATE</label>
                            <input class="form-control" type="text" name="date" value="{{ date('Y-m-d') }}" readonly>
                        </div>

                        <div class="form-group">
                            <label class="montant">MONTANT</label>
                            <input class="form-control" type="text" name="montant">
                            @error('montant')
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

                        <button type="submit" class="btn btn-primary mb-2" value="add">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">TARIF</div>
                <div class="panel-body">
                    <p style="font-size:20px;">HEDBOMADAIRE : 1000 F FCFA</p>
                    <p style="font-size:20px;">JOURNALIER : 100 F FCFA</p>
                </div>
            </div>
        </div>
@endsection
