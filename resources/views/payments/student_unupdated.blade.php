@extends('layout.utilisateur.index')
@section('content')
@section('title','Liste des élèves à jour')
<style>
    @media print{
        .no-print{
            /*visibility: hidden;*/
            display: none;
        }
        .formulaire{
            visibility: hidden;
            display: none;
        }

        .impression{
            visibility: hidden;
            display: none;
        }

        .print{
            visibility: visible;
        }
        .tt{
            margin-top: 5em;
        }
        .date{
            margin-left: 50%;
        }
        .titre{
            text-align: left;
            margin-bottom: 0;
        }

        textarea{
            overflow: auto;
            overflow: hidden;
        }
    }

</style>
<div class="impression">
    <p>
        <button class="btn btn-secondary" onclick="imprimer('SectionAImprimer')">
            <i class="fa fa-print"> </i> <b>Imprimer</b>
        </button>
    </p>
</div>
<div id="SectionAImprimer">
    <div class="card-header py-3">
        <h1 class="m-0 font-weight-bold text-primary text-center"> LISTE DES ELEVES NON A JOUR </h1>
    </div>
<h4> LISTE DES ELEVES N'AYANT PAS ENCORE SOLDE L'ECOLAGE </h4>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NOM & PRENOM(S) </th>
                        <th>NIVEAU</th>
                        <th>CLASSE</th>
                        <th>SCOLARITE</th>
                        <th>MONTANT PAYE</th>
                        <th>MONTANT RESTANT </th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NOM & PRENOM(S) </th>
                        <th>NIVEAU</th>
                        <th>CLASSE</th>
                        <th>SCOLARITE</th>
                        <th>MONTANT PAYE</th>
                        <th>MONTANT RESTANT </th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($eleve as $eleves)
                        @foreach ($year as $years)
                            @if ($eleves->annee_scolaire === "$years->annee_debut-$years->annee_fin")
                                @php
                                    $scolarite = \App\Models\Level::where('libelle',$eleves->niveau)->get();
                                    $montant_paye = \App\Models\Payment::where('nom',$eleves->nom)->where('prenom',$eleves->prenom)->sum('montant_paye');
                                @endphp
                                <tr>
                                    <td> {{"$eleves->nom $eleves->prenom"}} </td>
                                    <td> {{$eleves->niveau}} </td>
                                    <td> {{$eleves->classe}} </td>
                                    @foreach ($scolarite as $scolarites)
                                        <td> {{ $scolarites->montant }}  </td>
                                    @endforeach
                                    <td> {{ $montant_paye }}</td>
                                    <td>
                                    {{$scolarites->montant - $montant_paye}}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <hr>
<h4> LISTE DES ELEVES AYANT SOLDE UNE PARTIE DE L'ECOLAGE</h4>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NOM & PRENOM(S) </th>
                        <th>NIVEAU</th>
                        <th>CLASSE</th>
                        <th>SCOLARITE</th>
                        <th>MONTANT PAYE</th>
                        <th>MONTANT RESTANT </th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NOM & PRENOM(S) </th>
                        <th>NIVEAU</th>
                        <th>CLASSE</th>
                        <th>SCOLARITE</th>
                        <th>MONTANT PAYE</th>
                        <th>MONTANT RESTANT </th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($eleve_two as $eleves)
                        @foreach ($year as $years)
                            @if ($eleves->annee_scolaire === "$years->annee_debut-$years->annee_fin")

                                @php
                                    $scolarite = \App\Models\Level::where('libelle',$eleves->niveau)->get();
                                    $montant_paye = \App\Models\Payment::where('nom',$eleves->nom)->where('prenom',$eleves->prenom)->sum('montant_paye');
                                    $pay = DB::select("SELECT *,sum(montant_paye) as 'mp' FROM payments ");
                                @endphp
                                @foreach ($pay as $pays)
                                    @if ("$eleves->nom $eleves->prenom" === "$pays->nom $pays->prenom"
                                    AND $pays->scolarite > $pays->mp)
                                        <tr>
                                            <td> {{"$eleves->nom $eleves->prenom"}} </td>
                                            <td> {{$eleves->niveau}} </td>
                                            <td> {{$eleves->classe}} </td>
                                            @foreach ($scolarite as $scolarites)
                                                <td> {{ $scolarites->montant }}  </td>
                                            @endforeach
                                            <td> {{ $montant_paye }}</td>
                                            <td>
                                            {{$scolarites->montant - $montant_paye}}
                                            </td>
                                        </tr>
                                    @else
                                        <td> Aucune donnée. </td>
                                    @endif
                                @endforeach

                            @endif
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
<script>
    function imprimer(bulletin_eleve) {
    var printContents = document.getElementById(bulletin_eleve).innerHTML;
    var originalContents = document.body.innerHTML; document.body.innerHTML = printContents; window.print();
    document.body.innerHTML = originalContents; }
</script>
@endsection
