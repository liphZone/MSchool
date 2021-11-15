@extends('layout.utilisateur.index')
@section('content')
@section('title','Inscription partie III')
    <div class="panel panel-info">
        <h3 class="panel-heading"> FORMULAIRE D'INSCRIPTION DES ELEVES | PAGE 3 </h3>
    </div>

    <div class="panel panel-info">
        <div class="panel-body">
            <form action="{{route('fourth_part_entry_action')}}" method="POST" id="student_form">
                @csrf
                <div class="form-group">
                    <label>NOM D'UTILISATEUR</label>
                    <input hidden class="form-control" type="text" name="matricule" value="{{ request('matricule') }}" readonly>
                    <input class="form-control" type="text" name="username" value="{{old('username')}}" required>
                    @error('username')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="password">MOT DE PASSE</label>
                    <input class="form-control" type="password" name="password" required>
                    @error('password')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="password_confirmation">CONFIRMATION DU MOT DE PASSE</label>
                    <input class="form-control" type="password" name="password_confirmation">
                    @error('password_confirmation')
                        <div style="color:red;"> {{$message}} </div>
                    @enderror
                </div>
                <button type="submit" style="float: right" class="btn btn-primary">
                    suivant <i class="fa fa-arrow-right">  </i>
                </button>
            </form>

        </div>
    </div>

@endsection
