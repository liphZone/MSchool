@extends('errors::layout')

@section('title','Erreur')

{{-- @section('message','Page introuvable !') --}}

@section('message')
    <p> Page introuvable !  </p>
    <p> <a class="btn btn-info" href="{{ route('login_form') }}">Retour </a> </p>
@endsection
