<div>
    You have been selected to be staff on the agence<b>{{$agence->agence_name}}</b>
    <hr style="width: 100%;height: 10px" />
    Please, click the link belows to access to this agence : <a href="{{env('APP_URL') . '/' . $agence->id . '/staff/accept/' . $email }}">Test link</a>
</div>
