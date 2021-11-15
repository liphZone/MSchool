@extends('layout.utilisateur.index')
@section('content')
@section('title','Afficher bulletin')
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

<form action="" method="GET" name="">
    <div class="row">
        <div class="class col-md-4">
            <div class="form-group">
                <select class="form-control" name="classroom" required>
                    <option value="">QUELLE CLASSE CHOISISSEZ-VOUS ?</option>
                    @foreach ($classe as $classes)
                        <option>{{ "$classes->libelle $classes->serie$classes->groupe" }} </option>
                    @endforeach
                </select>
                @error('classroom')
                    <div style="color:red;"> {{ $message }} </div>
                @enderror
            </div>
        </div>
        <div class="class col-md-4">
            <div class="form-group">
                <select class="form-control" name="periode" required>
                    <option value=" "> QUELLE PERIODE CHOISISSEZ-VOUS ?</option>
                    <option value="semestre"> Semestre</option>
                    <option value="trimestre"> Trimestre </option>
                </select>
                @error('semester')
                    <div style="color:red;"> {{ $message }} </div>
                @enderror
            </div>
        </div>

        <div class="class col-md-4">
            <div class="form-group">
                <select class="form-control" name="term" required>
                    <option value=""> QUEL TERM CHOISISSEZ-VOUS </option>
                    <option value="1">1 </option>
                    <option value="2">2 </option>
                    <option value="3">3 </option>
                </select>
                @error('semester')
                    <div style="color:red;"> {{ $message }} </div>
                @enderror
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Chercher</button>
</form>
<br>
<div class="impression">
    <p>
        <button class="btn btn-secondary" onclick="imprimer('SectionAImprimer')">
            <i class="fa fa-print"> </i>  Imprimer
        </button>
    </p>
</div>

@if (request('classroom') === null AND request('periode') === null AND request('term') === null )
    <h3 class="text-danger"> Veuillez choisir les options ci-dessus !</h3>
@else



    <div id="SectionAImprimer" style="margin-top:60px;">
        @foreach ($eleve as $eleves)
            @foreach ($year as $years)
                @if ($eleves->annee_scolaire === "$years->annee_debut-$years->annee_fin")
                    <!--Entete -->
                    <div class="row" id="entete">
                        <div class="col-md-6">
                            <p> MINISTERE DES ENSEIGNEMENTS PRIMAIRE</p>
                            <p>SECONDAIRE ET DE L'ALPHABETISATION</p>
                            @foreach ($description as $descriptions)
                                <p> {{ $descriptions->nom_ecole }} </p>
                                <p> {{ $descriptions->information_ecole }}  </p>
                            @endforeach
                        </div>
                        <div class="col-md-6" align="right">
                            <p> DIRECTION REGIONALE DE L'EDUCATION  </p>
                            <p> PREFECTURE DU GOLFE </p>
                            <p>REPUBLIQUE TOGOLAISE</p>
                            <p>Travail-Liberte-Patrie</p>
                            <p>Lomé - TOGO</p>
                        </div>
                    </div>

                    <!--Information sur l'eleve -->
                    <div class="row" id="information_eleve">
                        <div class="col-md-4">
                            <p> Nom & Prenom : {{ "$eleves->nom $eleves->prenom" }} </p>
                            <p>Matricule : {{ $eleves->matricule }} </p>
                        </div>
                        <div class="col-md-4">
                            <p> Année Scolaire  : {{ $eleves->annee_scolaire }} </p>
                            <p> Classe : {{ $eleves->classe }} </p>
                            <p>Sexe : {{ $eleves->sexe }} </p>
                        </div>
                        <div class="col-md-4">
                            <p> Période : {{ request('periode').' '.request('term') }} </p>
                            <p>Etat :
                                @if ($eleves->etat === 'A')
                                    Ancien
                                @else
                                    Nouveau
                                @endif </p>
                        <!--Je compte le nombre d'eleves par classe -->
                            <p> Effectif : {{ $count_eleve_classe }}  </p>
                        </div>
                    </div>

                    <!--Tableau du bulletin -->
                    <div class="row" id="tableau">
                        <div class="container-fluid">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>MATIERES</th>
                                            <th>Coef</th>
                                            <th>Interrogation</th>
                                            <th>Devoir</th>
                                            <th>Compo</th>
                                            <th>Moy/20</th>
                                            <th>Moy Coef</th>
                                            <th>Appreciation</th>
                                            <th>Nom des Prof</th>
                                            <th>Signature</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Matieres Litterraires ----------------------->
                                        @foreach ($matiere_litteraire as $matiere_litteraires)
                                            <tr>
                                                <!-- Matieres -->
                                                <td> {{ $matiere_litteraires->libelle }} </td>

                                                <!-- Coefficient-->
                                                <td> {{ $matiere_litteraires->coefficient }} </td>

                                                <!-- Interrogation -->
                                                <td>
                                                    @foreach ($litteraire as $litteraires)
                                                        @if ("$litteraires->nom $litteraires->prenom" === "$eleves->nom $eleves->prenom" AND
                                                        $matiere_litteraires->libelle === $litteraires->matiere)
                                                            {{ $note_interro_litteraire = $litteraires->interrogation }}
                                                        @endif
                                                    @endforeach

                                                </td>

                                                <!-- Devoir -->
                                                <td>
                                                    @foreach ($litteraire as $litteraires)
                                                        @if ("$litteraires->nom $litteraires->prenom" === "$eleves->nom $eleves->prenom" AND
                                                        $matiere_litteraires->libelle === $litteraires->matiere)
                                                            {{ $note_devoir_litteraire = $litteraires->devoir }}
                                                        @endif
                                                    @endforeach
                                                </td>

                                                <!-- Examen -->
                                                <td>
                                                    @foreach ($litteraire as $litteraires)
                                                        @if ("$litteraires->nom $litteraires->prenom" === "$eleves->nom $eleves->prenom" AND
                                                        $matiere_litteraires->libelle === $litteraires->matiere)
                                                            {{ $note_examen_litteraire = $litteraires->examen }}
                                                        @endif
                                                    @endforeach
                                                </td>

                                                <!-- Moyenne /20 -->
                                                <td>
                                                    @foreach ($litteraire as $litteraires)
                                                        @if ("$litteraires->nom $litteraires->prenom" === "$eleves->nom $eleves->prenom" AND
                                                        $matiere_litteraires->libelle === $litteraires->matiere)
                                                            {{ number_format($litteraires->avg_matiere,2) }}
                                                        @endif
                                                    @endforeach
                                                </td>

                                                <!-- Moyenne Coefficiée -->
                                                <td>
                                                    @foreach ($litteraire as $litteraires)
                                                        @if ("$litteraires->nom $litteraires->prenom" === "$eleves->nom $eleves->prenom" AND
                                                        $matiere_litteraires->libelle === $litteraires->matiere)
                                                            {{ number_format($litteraires->avg_matiere_coef,2) }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <!-- Rang -->
                                                {{-- <td> </td> --}}

                                                <!-- Appreciation -->
                                                <td>
                                                    @foreach ($litteraire as $litteraires)
                                                        @if ("$litteraires->nom $litteraires->prenom" === "$eleves->nom $eleves->prenom" AND
                                                        $matiere_litteraires->libelle === $litteraires->matiere)
                                                            {{ $litteraires->appreciation }}
                                                        @endif
                                                    @endforeach
                                                </td>

                                                <!-- Nom des profs  -->
                                                <td>
                                                    @foreach ($litteraire as $litteraires)
                                                        @if ("$litteraires->nom $litteraires->prenom" === "$eleves->nom $eleves->prenom" AND
                                                        $matiere_litteraires->libelle === $litteraires->matiere)
                                                            {{ $litteraires->professeur }}
                                                        @endif
                                                    @endforeach
                                                </td>

                                                <!-- Signature -->
                                                <td> </td>

                                            </tr>
                                        @endforeach
                                        <tr>

                                            <th style="background-color:azure">  Matières Littéraires </th>

                                            <!--Somme des coefficients des matieres litteraires -->
                                            <td> {{$somme_coef_litteraire}} </td>

                                            <!-- Somme des matieres litteraires -->
                                            <td> Totaux</td>
                                            <td>
                                                @php
                                                    $somme_matiere_litteraire = \App\Models\Moyenne::where('classe',request('classroom'))
                                                    ->where('type_matiere','Litteraire')->where('nom',$eleves->nom)
                                                    ->where('prenom',$eleves->prenom)->sum('avg_matiere_coef');
                                                @endphp
                                                {{ $somme_matiere_litteraires = number_format(($somme_matiere_litteraire),2) }}
                                                </td>

                                                <!-- Moyenne des matieres litteraires -->
                                            <td>
                                                {{ number_format(($somme_matiere_litteraires/$somme_coef_litteraire),2) }}
                                            </td>

                                        </tr>
                                        <!-- Matieres Litterraires Fin ------------------->

                                        <!-- Matieres Scientifiques ----------------------->
                                        @foreach ($matiere_scientifique as $matiere_scientifiques)
                                            <tr>
                                                <!-- Matieres -->
                                                <td> {{ $matiere_scientifiques->libelle }} </td>

                                                <!-- Coefficient-->
                                                <td> {{ $matiere_scientifiques->coefficient }} </td>

                                                <!-- Interrogation -->
                                                <td>
                                                    @foreach ($scientifique as $scientifiques)
                                                        @if ("$scientifiques->nom $scientifiques->prenom" === "$eleves->nom $eleves->prenom" AND
                                                        $matiere_scientifiques->libelle === $scientifiques->matiere)
                                                            {{ $note_interro_scientifique = $scientifiques->interrogation }}
                                                        @endif
                                                    @endforeach

                                                </td>

                                                <!-- Devoir -->
                                                <td>
                                                    @foreach ($scientifique as $scientifiques)
                                                        @if ("$scientifiques->nom $scientifiques->prenom" === "$eleves->nom $eleves->prenom" AND
                                                        $matiere_scientifiques->libelle === $scientifiques->matiere)
                                                            {{ $note_devoir_scientifique = $scientifiques->devoir }}
                                                        @endif
                                                    @endforeach
                                                </td>

                                                <!-- Examen -->
                                                <td>
                                                    @foreach ($scientifique as $scientifiques)
                                                        @if ("$scientifiques->nom $scientifiques->prenom" === "$eleves->nom $eleves->prenom" AND
                                                        $matiere_scientifiques->libelle === $scientifiques->matiere)
                                                            {{ $note_examen_scientifique = $scientifiques->examen }}
                                                        @endif
                                                    @endforeach
                                                </td>

                                                <!-- Moyenne /20 -->
                                                <td>
                                                    @foreach ($scientifique as $scientifiques)
                                                        @if ("$scientifiques->nom $scientifiques->prenom" === "$eleves->nom $eleves->prenom" AND
                                                        $matiere_scientifiques->libelle === $scientifiques->matiere)
                                                            {{ number_format($scientifiques->avg_matiere,2) }}
                                                        @endif
                                                    @endforeach
                                                </td>

                                                <!-- Moyenne Coefficiée -->
                                                <td>
                                                    @foreach ($scientifique as $scientifiques)
                                                        @if ("$scientifiques->nom $scientifiques->prenom" === "$eleves->nom $eleves->prenom" AND
                                                        $matiere_scientifiques->libelle === $scientifiques->matiere)
                                                            {{ number_format($scientifiques->avg_matiere_coef,2) }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <!-- Rang -->
                                                {{-- <td> </td> --}}

                                                <!-- Appreciation -->
                                                <td>
                                                    @foreach ($scientifique as $scientifiques)
                                                        @if ("$scientifiques->nom $scientifiques->prenom" === "$eleves->nom $eleves->prenom" AND
                                                        $matiere_scientifiques->libelle === $scientifiques->matiere)
                                                            {{ $scientifiques->appreciation }}
                                                        @endif
                                                    @endforeach
                                                </td>

                                                <!-- Nom des profs  -->
                                                <td>
                                                    @foreach ($scientifique as $scientifiques)
                                                        @if ("$scientifiques->nom $scientifiques->prenom" === "$eleves->nom $eleves->prenom" AND
                                                        $matiere_scientifiques->libelle === $scientifiques->matiere)
                                                            {{ $scientifiques->professeur }}
                                                        @endif
                                                    @endforeach
                                                </td>

                                                <!-- Signature -->
                                                <td> </td>

                                            </tr>
                                        @endforeach
                                        <tr>

                                        <th style="background-color:azure">  Matières Scientifiques </th>

                                        <!--Somme des coefficients des matieres scientifiques -->
                                        <td> {{$somme_coef_scientifique}} </td>

                                        <!-- Somme des matieres scientifiques -->
                                        <td> Totaux</td>
                                        <td>
                                            @php
                                                $somme_matiere_scientifique = \App\Models\Moyenne::where('classe',request('classroom'))
                                                ->where('type_matiere','Scientifique')->where('nom',$eleves->nom)
                                                ->where('prenom',$eleves->prenom)->sum('avg_matiere_coef');
                                            @endphp
                                            {{ $somme_matiere_scientifiques = number_format(($somme_matiere_scientifique),2) }}
                                            </td>

                                            <!-- Moyenne des matieres scientifiques -->
                                        <td>
                                            {{ number_format(($somme_matiere_scientifiques/$somme_coef_scientifique),2) }}
                                        </td>

                                        </tr>
                                        <!-- Matieres Scientifiques Fin ------------------->

                                        <!-- Matieres Facultatives ----------------------->
                                        @foreach ($matiere_facultative as $matiere_facultatives)
                                            <tr>
                                                <!-- Matieres -->
                                                <td> {{ $matiere_facultatives->libelle }} </td>

                                                <!-- Coefficient-->
                                                <td> {{ $matiere_facultatives->coefficient }} </td>

                                                <!-- Interrogation -->
                                                <td>
                                                    @foreach ($facultative as $facultatives)
                                                        @if ("$facultatives->nom $facultatives->prenom" === "$eleves->nom $eleves->prenom" AND
                                                        $matiere_facultatives->libelle === $facultatives->matiere)
                                                            {{ $note_interro_facultative = $facultatives->interrogation }}
                                                        @endif
                                                    @endforeach

                                                </td>

                                                <!-- Devoir -->
                                                <td>
                                                    @foreach ($facultative as $facultatives)
                                                        @if ("$facultatives->nom $facultatives->prenom" === "$eleves->nom $eleves->prenom" AND
                                                        $matiere_facultatives->libelle === $facultatives->matiere)
                                                            {{ $note_devoir_facultative = $facultatives->devoir }}
                                                        @endif
                                                    @endforeach
                                                </td>

                                                <!-- Examen -->
                                                <td>
                                                    @foreach ($facultative as $facultatives)
                                                        @if ("$facultatives->nom $facultatives->prenom" === "$eleves->nom $eleves->prenom" AND
                                                        $matiere_facultatives->libelle === $facultatives->matiere)
                                                            {{ $note_examen_facultative = $facultatives->examen }}
                                                        @endif
                                                    @endforeach
                                                </td>

                                                <!-- Moyenne /20 -->
                                                <td>
                                                    @foreach ($facultative as $facultatives)
                                                        @if ("$facultatives->nom $facultatives->prenom" === "$eleves->nom $eleves->prenom" AND
                                                        $matiere_facultatives->libelle === $facultatives->matiere)
                                                            {{ number_format($facultatives->avg_matiere,2) }}
                                                        @endif
                                                    @endforeach
                                                </td>

                                                <!-- Moyenne Coefficiée -->
                                                <td>
                                                    @foreach ($facultative as $facultatives)
                                                        @if ("$facultatives->nom $facultatives->prenom" === "$eleves->nom $eleves->prenom" AND
                                                        $matiere_facultatives->libelle === $facultatives->matiere)
                                                            {{ number_format($facultatives->avg_matiere_coef,2) }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <!-- Rang -->
                                                {{-- <td> </td> --}}

                                                <!-- Appreciation -->
                                                <td>
                                                    @foreach ($facultative as $facultatives)
                                                        @if ("$facultatives->nom $facultatives->prenom" === "$eleves->nom $eleves->prenom" AND
                                                        $matiere_facultatives->libelle === $facultatives->matiere)
                                                            {{ $facultatives->appreciation }}
                                                        @endif
                                                    @endforeach
                                                </td>

                                                <!-- Nom des profs  -->
                                                <td>
                                                    @foreach ($facultative as $facultatives)
                                                        @if ("$facultatives->nom $facultatives->prenom" === "$eleves->nom $eleves->prenom" AND
                                                        $matiere_facultatives->libelle === $facultatives->matiere)
                                                            {{ $facultatives->professeur }}
                                                        @endif
                                                    @endforeach
                                                </td>

                                                <!-- Signature -->
                                                <td> </td>

                                            </tr>
                                        @endforeach
                                        <tr>

                                        <th style="background-color:azure">  Matières Facultatives </th>

                                        <!--Somme des coefficients des matieres facultatives -->
                                        <td> {{$somme_coef_facultative}} </td>

                                        <!-- Somme des matieres facultatives -->
                                        <td> Totaux</td>
                                        <td>
                                            @php
                                                $somme_matiere_facultative = \App\Models\Moyenne::where('classe',request('classroom'))
                                                ->where('type_matiere','Facultative')->where('nom',$eleves->nom)
                                                ->where('prenom',$eleves->prenom)->sum('avg_matiere_coef');
                                            @endphp
                                            {{ $somme_matiere_facultatives = number_format(($somme_matiere_facultative),2) }}
                                            </td>

                                            <!-- Moyenne des matieres facultatives -->
                                        <td>
                                            {{ number_format(($somme_matiere_facultatives/$somme_coef_facultative),2) }}
                                        </td>

                                        </tr>
                                        <!-- Matieres Facultatives Fin ------------------->
                                        <tr>
                                            <!--TOTAL GENERAL -->
                                            <th>TOTAL GENERAL</th>
                                            <!-- Somme coefficients des matieres litteraires + scientifiques + facultatives -->
                                            <td>@php
                                                $somme_coefficient = \App\Models\Moyenne::where('classe',request('classroom'))
                                                ->where('nom',$eleves->nom)->where('prenom',$eleves->prenom)->sum('coefficient');
                                                @endphp
                                            {{$somme_coefficient}} </td>
                                        </tr>
                                        <tr>
                                            <th>MOYENNE </th>
                                            <!-- Moyenne trimestrielle -->
                                            <td>
                                                @php
                                                    $moyenne_eleve = \App\Models\Bulletin::where('classe',request('classroom'))
                                                    ->where('nom',$eleves->nom)->where('prenom',$eleves->prenom)->get();
                                                @endphp

                                                @foreach ($moyenne_eleve as $moyennes)
                                                    <b> {{ $moyennes->moyenne }} </b>
                                                @endforeach
                                            </td>
                                    </tr>

                                    <tr>
                                            <th> Rang</th> <td colspan="2">
                                                @php
                                                    $rang_eleve = \App\Models\Bulletin::where('classe',request('classroom'))
                                                    ->where('nom',$eleves->nom)->where('prenom',$eleves->prenom)->get();
                                                @endphp
                                                @foreach ($rang_eleve as $rank)
                                                    {{ $rank->rang }}
                                                @endforeach
                                                </td>
                                            <td colspan="5"> Conseil des profs.</td>
                                            <td rowspan="5">
                                                <p>  Signature du prof. titulaire</p>
                                                {{-- @foreach ($professeur as $professeurs)
                                                    @foreach ($type_professeur as $type_professeurs)
                                                        @if ($type_professeurs->professeur === "$professeurs->nom $professeurs->prenom")
                                                                <p> {{$professeurs->type_professeur}} </p>
                                                                <p style="margin-top:20em">  {{ $type_professeurs->professeur }}  </p>
                                                        @endif
                                                    @endforeach
                                                @endforeach --}} TITULAIRE

                                                <p>Lomé le {{ date('d M Y') }} </p>
                                            </td>
                                            <td rowspan="5">
                                                <p> Signature et cachet du chef d'etablissement</p>
                                                @foreach ($description as $descriptions)
                                                    <p style="margin-top:20em">{{ $descriptions->nom_directeur }} </p>
                                                @endforeach
                                            </td>
                                        </tr>

                                        <tr>
                                            <th> Forte Moyenne</th>
                                            <td colspan="2"> {{ $moyenne_forte->moyenne }} </td>
                                        </tr>
                                        <tr>
                                            <th>Faible Moyenne </th>  <td colspan="2"> {{ $moyenne_faible->moyenne }} </td>
                                            {{-- <td colspan="2"> Encouragement</td>   <td colspan="4"> </td> --}}
                                        </tr>

                                        <tr>
                                            {{-- <th> Moyenne Annuelle </th> <td colspan="2"> </td> --}}
                                            <td colspan="2">Avertissement Discipline</td><td colspan="2"> </td>
                                        </tr>
                                        <tr>
                                            <th rowspan="2"> Décision du conseil des profs.</th> <td colspan="2"> </td>
                                            <td colspan="2"> Blame Travail</td>  <td colspan="4"> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"> </td><td colspan="2"> Blame Discipline</td> <td colspan="4"> </td>
                                        </tr>
                                        <tr>
                                            {{-- <td colspan="2"> </td> <td colspan="2"> Renvoi</td> <td colspan="4"> </td> --}}
                                        </tr>

                                        <tr>
                                            @php
                                                $absence = \App\Models\Warning::where('classe',request('classroom'))->where('type','Absence')
                                                ->where('nom',$eleves->nom)->where('prenom',$eleves->prenom)->count('nom');

                                                $retard = \App\Models\Warning::where('classe',request('classroom'))->where('type','Retard')
                                                ->where('nom',$eleves->nom)->where('prenom',$eleves->prenom)->count('nom');

                                            @endphp
                                            <td colspan="4">Nombre de retard </td>
                                            <td colspan="4">
                                            {{$retard}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"> Nombre abscence</td>
                                            <td colspan="4">
                                                {{$absence}}
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 30%;"></div>
                @endif
            @endforeach
        @endforeach

    </div>
@endif

<script>
    function imprimer(bulletin_eleve) {
    var printContents = document.getElementById(bulletin_eleve).innerHTML;
    var originalContents = document.body.innerHTML; document.body.innerHTML = printContents; window.print();
    document.body.innerHTML = originalContents; }
</script>
@endsection
