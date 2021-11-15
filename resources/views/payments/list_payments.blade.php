@extends('layout.utilisateur.index')
@section('content')
@section('title','Liste payements écolage')
<div>
    <div class="card-header py-3">
        <h1 class="m-0 font-weight-bold text-primary text-center"> LISTE DES ELEVES </h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NOM & PRENOM(S) </th>
                        <th>NIVEAU</th>
                        <th>CLASSE</th>
                        <th>SCOLARITE</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NOM & PRENOM(S) </th>
                        <th>NIVEAU</th>
                        <th>CLASSE</th>
                        <th>SCOLARITE</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($eleve as $eleves)
                    @php
                        $scolarite = \App\Models\Level::where('libelle',$eleves->niveau)->get();
                        $verif_pay_updated = \App\Models\Payment::where('nom',$eleves->nom)->where('prenom',$eleves->prenom)->where('montant_restant',0)->first();
                    @endphp
                        <tr>
                            <td> {{"$eleves->nom $eleves->prenom"}} </td>
                            <td> {{$eleves->niveau}} </td>
                            <td> {{$eleves->classe}} </td>
                            @foreach ($scolarite as $scolarites)
                                <td> {{ $scolarites->montant }} </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
