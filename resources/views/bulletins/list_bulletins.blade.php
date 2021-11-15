@extends('layout.utilisateur.index')
@section('content')
@section('title','Liste des bulletins')
    <div class="card-header py-3">
        <h1 class="m-0 font-weight-bold text-primary text-center"> LISTE DES MOYENNES MATIERE </h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>PERIODE </th>
                        <th>NOM & PRENOM(S) </th>
                        <th>CLASSE</th>
                        <th>NIVEAU</th>
                        <th>MOYENNE</th>
                        <th>RANG</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>PERIODE </th>
                        <th>NOM & PRENOM(S) </th>
                        <th>CLASSE</th>
                        <th>NIVEAU</th>
                        <th>MOYENNE</th>
                        <th>RANG</th>
                        <th>ACTION</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach($bulletin as $bulletins)
                        @foreach ($year as $years)
                            @if ($bulletins->annee_scolaire === "$years->annee_debut-$years->annee_fin")
                                <tr>
                                    <td> {{"$bulletins->periode $bulletins->term"}} </td>
                                    <td> {{"$bulletins->nom $bulletins->prenom"}} </td>
                                    <td> {{$bulletins->classe}} </td>
                                    <td> {{$bulletins->niveau}} </td>
                                    <td> {{$bulletins->moyenne}} </td>
                                    <td> {{ $rang = $i++ }} </td>
                                    <td>
                                        @if (auth()->user()->grade === 'Administrateur' || auth()->user()->grade === 'Secretaire')
                                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#{{ $bulletins->nom }}"> <i class="fa fa-arrow-up"></i> mettre à jour le rang </a>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @php
        $r = 1;
    @endphp
    @foreach($bulletin as $bulletins)

        <!-- Modal -->
        <div class="modal fade" id="{{ $bulletins->nom }}" tabindex="-1" role="dialog" aria-labelledby="RankLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="RankLabel">MISE A JOUR DU RANG DE L'ELEVE  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('bulletins.update',$bulletins->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>PERIODE</label>
                                        <input type="text" class="form-control" name="periode" value="{{ $bulletins->periode }}" readonly>
                                        @error('periode')
                                            <div style="color:red;"> {{$message}} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>TERME </label>
                                        <input type="text" class="form-control" name="term" value="{{ $bulletins->term }}" readonly>
                                        @error('term')
                                            <div style="color:red;"> {{$message}} </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NOM</label>
                                        <input class="form-control" type="text" name="nom" value="{{ $bulletins->nom }}" readonly>
                                        @error('nom')
                                            <div style="color:red;"> {{$message}} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>PRENOM</label>
                                        <input class="form-control" type="text" name="prenom" value="{{$bulletins->prenom}}" readonly>
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
                                        <input class="form-control" type="text" name="classe" value="{{ $bulletins->classe }}" readonly>
                                        @error('classe')
                                            <div style="color:red;"> {{$message}} </div>
                                        @enderror
                                    </div>
                            </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NIVEAU</label>
                                        <input class="form-control" type="text" name="niveau" value="{{$bulletins->niveau }}" readonly>
                                        @error('niveau')
                                            <div style="color:red;"> {{$message}} </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label>MOYENNE OBTENUE</label>
                                <input class="form-control" type="text" name="moyenne" value="{{ $bulletins->moyenne }}" id="moyenne" readonly>
                                @error('moyenne')
                                    <div style="color:red;"> {{$message}} </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>RANG</label>
                                <input class="form-control" type="text" name="rang" value="{{ $r++ }}" readonly>
                                @error('rang')
                                    <div style="color:red;"> {{$message}} </div>
                                @enderror
                            </div>

                            <div hidden class="form-group">
                                <input type="text" class="form-control" name="annee_scolaire" value="{{ $bulletins->annee_scolaire }}" readonly>
                            </div>

                            <button type="submit" class="btn btn-block btn-success" id="btn"> Mettre à jour </button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

@endsection
