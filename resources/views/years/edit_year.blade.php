@extends('layout.utilisateur.index')
@section('content')
@section('title','Ajouter une année scolaire')
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-info">
            <h3 class="panel-heading">FORMULAIRE AJOUTER ANNEE SCOLAIRE</h3>
            <div class="panel-body">
                <form  action="{{ route('years.update',$an->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>ANNEE  SCOLAIRE EN COURS </label>
                        <input class="form-control" type="text" name="annee_debut" value="{{ "$an->annee_debut - $an->annee_fin" }}" readonly>
                        @error('annee_debut')
                            <div style="color:red;">{{$message}} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="annee" required>
                            <option value=""> Choisir année scolaire </option>
                            @foreach ($year as $years)
                                <option value="{{ $years->annee_debut }}"> {{ "$years->annee_debut-$years->annee_fin" }} </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success btn-block">Changer</button>
                </form>
            </div>
        </div>
    </div>

    {{ request('annee') }}

    {{-- <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">ANNEE SCOLAIRE EN COURS </div>
            <div class="panel-body">
                @foreach ($year as $years)
                    <p style="font-size:20px;"> ***** {{"$years->annee_debut-$years->annee_fin"}} ***** </p>
                @endforeach
            </div>
        </div>
    </div> --}}
</div>

@endsection
