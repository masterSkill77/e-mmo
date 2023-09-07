                @extends('layouts.main')
                @section('section-main')
                @foreach($questions as $question)
                <div class="col-lg-12">
                    <iframe
                    src="{{ env('APP_METABASE_URL') }}/public/{{ $question->type }}/{{ $question->uuid }}"
                    frameborder="0"
                    width="800"
                    style="width: 100%"
                    height="600"
                    allowtransparency
                ></iframe>
                </div>
                @endforeach
                @endsection
