@extends('layout.utilisateur.index')
@section('content')
@section('title','Liste des élèves inscrits')
@if (auth()->user()->grade === 'Administrateur' || auth()->user()->grade === 'Secretaire' ||
 auth()->user()->grade === 'Comptable' || auth()->user()->grade === 'Surveillant' )
<div>
    <div class="card-header py-3">
        <h1 class="m-0 font-weight-bold text-primary text-center"> LISTE DES INSCRIPTIONS </h1>

        @if (auth()->user()->grade === 'Administrateur' || auth()->user()->grade === 'Secretaire')
            <a type="button" class="btn btn-success" href=" {{route('first_part_entry_form')}}">
                <i class="fa fa-plus-circle"></i> Inscrire un élève
            </a>
            <a type="button" class="btn btn-success" href=" {{route('display_bulletin')}}">
                <i class="fa fa-list"></i>  Afficher bulletin
            </a>
        @endif

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th> MATRICULE </th>
                        <th>NOM & PRENOM(S) </th>
                        <th>CLASSE </th>
                        <th>ADRESSE</th>
                        <th>CONTACT</th>
                        <th>PARENT</th>
                        <th>ECOLAGE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th> MATRICULE </th>
                        <th>NOM & PRENOM(S) </th>
                        <th>CLASSE </th>
                        <th>ADRESSE</th>
                        <th>CONTACT</th>
                        <th>PARENT</th>
                        <th>ECOLAGE</th>
                        <th>ACTION</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($eleve as $eleves)
                        @php
                            $verif_pay_updated = \App\Models\Payment::where('nom',$eleves->nom)->where('prenom',$eleves->prenom)->where('montant_restant',0)->first();
                        @endphp
                        <tr>
                            <td> {{$eleves->matricule}} </td>
                            <td> {{"$eleves->nom $eleves->prenom"}} </td>
                            <td> {{$eleves->classe}} </td>
                            <td> {{$eleves->adresse}} </td>
                            <td> {{$eleves->contact}} </td>
                            <td> {{"$eleves->nom_parent($eleves->type_parent)"}} </td>
                            <td>
                                @if (auth()->user()->grade === 'Administrateur' || auth()->user()->grade === 'Secretaire' || auth()->user()->grade === 'Comptable')
                                    @if ($verif_pay_updated)
                                        <p style="color: green"> En règle <i class="fa fa-check"></i> </p>
                                    @else
                                        <a href="{{ route('add_payment',$eleves->id) }}" type="button" class="btn btn-sm btn-primary">
                                            <i class="fa fa-plus-circle"></i> Payer écolage
                                        </a>
                                    @endif
                                @else
                                    <p> - </p>
                                @endif
                            </td>
                            <td>
                                @if (auth()->user()->grade === 'Administrateur' || auth()->user()->grade === 'Secretaire')
                                    <p>
                                        <a href="{{ route('add_bulletin',$eleves->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-plus-circle"> Moyenne Elève </i>
                                        </a>
                                    </p>
                                @endif

                                @if ( auth()->user()->grade === 'Surveillant')
                                    <p>
                                        <a href="{{ route('add_warning',$eleves->id) }}" class="btn btn-sm btn-primary">
                                            Controler
                                        </a>
                                    </p>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@elseif (auth()->user()->grade === 'Professeur')
    <div>
        <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold text-primary text-center"> LISTE DES INSCRIPTIONS </h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> MATRICULE </th>
                            <th>NOM & PRENOM(S) </th>
                            <th>CLASSE </th>
                            <th>ADRESSE</th>
                            <th>CONTACT</th>
                            <th>PARENT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th> MATRICULE </th>
                            <th>NOM & PRENOM(S) </th>
                            <th>CLASSE </th>
                            <th>ADRESSE</th>
                            <th>CONTACT</th>
                            <th>PARENT</th>
                            <th>ACTION</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                          #Professeur connecté
                            $professeur_connected = \App\Models\Personne::where('id',auth()->user()->personne_id)->first();

                            #ici je met recupere le prof depuis la table matiere
                            $matiere = \App\Models\Matiere::where('professeur',"$professeur_connected->nom $professeur_connected->prenom")->first();

                            #Les eleves par classe du professeur connecté
                            $eleve_classe = \App\Models\Inscription::where('classe',$matiere->classe)
                            ->where('annee_scolaire',"$year->annee_debut-$year->annee_fin")->get();
                        @endphp
                        @foreach ($eleve_classe as $eleves)
                            <tr>
                                <td> {{$eleves->matricule}} </td>
                                <td> {{"$eleves->nom $eleves->prenom"}} </td>
                                <td> {{$eleves->classe}} </td>
                                <td> {{$eleves->adresse}} </td>
                                <td> {{$eleves->contact}} </td>
                                <td> {{"$eleves->nom_parent($eleves->type_parent)"}} </td>
                                <td>

                                    @if (auth()->user()->grade === 'Professeur')
                                        <p>
                                            <a href="{{ route('add_note',$eleves->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-plus-circle"> Noter </i>
                                            </a>
                                        </p>

                                        <p>
                                            <a href="{{ route('add_moyenne',$eleves->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-plus-circle"> Moyenne matiere </i>
                                            </a>
                                        </p>

                                        <p>
                                            <a href="{{ route('add_warning',$eleves->id) }}" class="btn btn-sm btn-primary">
                                                Controler
                                            </a>
                                        </p>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endif

@endsection
