@extends('mail.layout')

@section("section-salutation")
Hello agence : {{$agence->agence_name}}
@endsection

@section("section-action")
<h4>Un commentaire a été posté sur votre immobilier `{{ $estate->title }}`</h4>
Venez sur le site pour le consulter.
@endsection
