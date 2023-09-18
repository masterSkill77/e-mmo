@extends('mail.layout')

@section("section-salutation")
Hello agence : {{$agence->agence_name}}
@endsection

@section("section-action")
<h4>Un commentaire a été posté sur votre immobilier <a href="{{ env('CLIENT_APP_URL')}}/public/emmo/{{$estate->id}}"></a>`{{ $estate->title }}`</h4>
Venez sur le site pour le consulter.
@endsection
