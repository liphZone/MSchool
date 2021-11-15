@extends('layout.utilisateur.index')
@section('content')
@section('title','Accueil')

@if (auth()->user()->grade === 'Administrateur' || auth()->user()->grade === 'Secretaire')
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">
                                CLASSES </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"> {{ $total_classe }} </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-child fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-success text-uppercase mb-1">
                                PROFESSEURS</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"> {{ $total_professeur }} </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-info text-uppercase mb-1">ELEVES
                            </div>
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800 text-center"> {{ $total_eleve }} </div>
                                </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg tex font-weight-bold text-warning text-uppercase mb-1">
                                MATIERE</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center text-center"> {{ $total_matiere }} </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif



@if (auth()->user()->grade === 'Administrateur' || auth()->user()->grade === 'Secretaire' || auth()->user()->grade === 'Comptable')
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">
                                CAISSE ECOLE </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"> {{ $montant_caisse_ecole }} </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-success text-uppercase mb-1">
                                CAISSE SCOLARITE </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"> {{ $montant_scolarite }} </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-info text-uppercase mb-1">
                            TOTAL DEPENSES
                            </div>
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800 text-center"> {{ $montant_depense }} </div>
                                </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg tex font-weight-bold text-warning text-uppercase mb-1">
                                CAISSE GENERALE </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center text-center"> {{ $montant_general }} </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<div class="card mb-4 py-3 border-bottom-info">
    <div class="card-body">
        <h4 class="text-center">
           <p>
            <sup> {{ date('d-m-Y') }} </sup>
           </p>
            MIABESCHOOLVI - APPLICATION DE GESTION DES ACTIVITES D'UNE ECOLE
        </h4 class="text-center">
    </div>
</div>

@if (auth()->user()->grade === 'Professeur')
    <div class="card mb-4">
        <div class="card-header">
            @php
                $professeur_connected = \App\Models\Personne::where('id',auth()->user()->personne_id)->first();
                $matiere = \App\Models\Matiere::where('professeur',"$professeur_connected->nom $professeur_connected->prenom")->get();
            @endphp
            @if ($professeur_connected->sexe === 'M')
            <marquee behavior="" direction="">
                <h3>
                    Bienvenue Mr {{ "$professeur_connected->nom $professeur_connected->prenom" }}
                </h3>
            </marquee>

            @else
            <marquee behavior="" direction="">
                <h3>
                    Bienvenue Mme {{ "$professeur_connected->nom $professeur_connected->prenom" }}
                </h3>
            </marquee>
            @endif
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h2> VOUS INTERVENEZ EN : </h2>
                    @foreach ($matiere as $matieres)
                            <h4>
                                <ul>
                                    <li>{{ $matieres->classe }}</li>
                                </ul>
                            </h4>
                    @endforeach
                </div>

                <div class="col-md-6">
                    <h2> VOS MATIERES D'ENSEIGNEMENT </h2>
                    @foreach ($matiere as $matieres)
                            <h4>
                                <ul>
                                    <li>{{ $matieres->libelle }}</li>
                                </ul>
                            </h4>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
