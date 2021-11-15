@extends('layout.utilisateur.index')
@section('content')
@section('title','Liste de tous les messages')

<div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary text-center"> LISTE DES MESSAGES </h1>
    @if (auth()->user()->grade === 'Administrateur' || auth()->user()->grade === 'Secretaire' ||
    auth()->user()->grade === 'Comptable' ||
    auth()->user()->grade === 'Professeur' || auth()->user()->grade === 'Surveillant')
        <a type="button" class="btn btn-success" href=" {{route('message_broadcastin_form')}} ">
            <i class="fa fa-plus-circle"></i> Diffuser un message
        </a>
    @endif
</div>

<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#md" class="d-block card-header py-3" data-toggle="collapse"
        role="button" aria-expanded="true" aria-controls="md">
        <h6 class="m-0 font-weight-bold text-primary text-center">LISTE DES MESSAGES DE DIFFUSION</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse" id="md">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>UTILISATEUR </th>
                            <th>MESSAGE </th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>UTILISATEUR </th>
                            <th>MESSAGE </th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($message_diffusion as $md)
                            <tr>
                                <td> {{$md->utilisateur}} </td>
                                <td> {{$md->commentaire}} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#mr" class="d-block card-header py-3" data-toggle="collapse"
        role="button" aria-expanded="true" aria-controls="mr">
        <h6 class="m-0 font-weight-bold text-primary text-center">LISTE DES MESSAGES RECU</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse" id="mr">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>EMETTEUR </th>
                            <th>RECEPTEUR</th>
                            <th>SUJET </th>
                            <th>MESSAGE </th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>EMETTEUR </th>
                            <th>RECEPTEUR</th>
                            <th>SUJET </th>
                            <th>MESSAGE </th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($message_prive_receive as $mpr)
                            <tr>
                                <td> {{$mpr->emetteur}} </td>
                                <td> {{$mpr->recepteur}} </td>
                                <td> {{$mpr->sujet}} </td>
                                <td> {{$mpr->contenu}} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
        role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary text-center"> LISTE DES MESSAGES ENVOYES </h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse" id="collapseCardExample">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>EMETTEUR </th>
                            <th>RECEPTEUR</th>
                            <th>SUJET </th>
                            <th> MESSAGE </th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>EMETTEUR </th>
                            <th>RECEPTEUR</th>
                            <th>SUJET </th>
                            <th>MESSAGE </th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($message_prive_send as $mps)
                            <tr>
                                <td> {{$mps->emetteur}} </td>
                                <td> {{$mps->recepteur}} </td>
                                <td> {{$mps->sujet}} </td>
                                <td> {{$mps->contenu}} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
