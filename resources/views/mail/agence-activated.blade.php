<div>
    Your agence <b>{{$agence->agence_name}}</b> has been successfully activated
    <hr style="width: 100%;height: 10px" />
    Please, click the link belows to access to this agence : <a href="{{env('APP_URL') . '/' . $agence->id }}">See you agence</a>
</div>
