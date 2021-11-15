@extends('layout.utilisateur.index')
@section('content')
@section('title','Liste des utilisateurs')
<div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary text-center"> LISTE DES UTILISATEURS </h1>
    @if (auth()->user()->grade === 'Administrateur' || auth()->user()->grade === 'Secretaire')
        <a type="button" class="btn btn-success" href=" {{route('add_person')}} ">
            <i class="fa fa-plus-circle"></i> Ajouter un utilisateur
        </a>
    @endif
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>NOM & PRENOM(S) </th>
                    <th>ADRESSE</th>
                    <th>CONTACT </th>
                    <th>EMAIL </th>
                    <th>STATUT </th>
                    <th>ACTION </th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>NOM & PRENOM(S) </th>
                    <th>ADRESSE</th>
                    <th>CONTACT </th>
                    <th>EMAIL </th>
                    <th>STATUT </th>
                    @if (auth()->user()->grade === 'Administrateur' || auth()->user()->grade === 'Secretaire' ||
                    auth()->user()->grade === 'Comptable' ||
                    auth()->user()->grade === 'Professeur' || auth()->user()->grade === 'Surveillant')
                        <th>ACTION </th>
                    @endif
                </tr>
            </tfoot>
            <tbody>
                @foreach($personne as $personnes)
                    <tr>
                        <td> {{ "$personnes->nom $personnes->prenom" }} </td>
                        <td> {{$personnes->adresse}} </td>
                        <td> {{$personnes->contact}} </td>
                        <td> {{$personnes->email}} </td>
                        <td> {{$personnes->statut}} </td>
                        <td>
                            @if (auth()->user()->grade === 'Administrateur' || auth()->user()->grade === 'Secretaire' ||
                            auth()->user()->grade === 'Comptable' ||
                            auth()->user()->grade === 'Professeur' || auth()->user()->grade === 'Surveillant')
                                <p>
                                    <a href="{{ route('add_message',$personnes->id) }}" class="btn btn-sm btn-success"> <i class="fa fa-plus-circle"></i> Envoyer message  </a>
                                </p>
                            @endif

                            @if (auth()->user()->grade === 'Administrateur' || auth()->user()->grade === 'Secretaire')
                                <p>
                                    @if ($personnes->statut === 'Professeur')
                                        <a href="{{ route('add_program',$personnes->id) }}" class="btn btn-sm btn-primary"> <i class="fa fa-table"></i> Programmer cours  </a>
                                    @endif
                                </p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
