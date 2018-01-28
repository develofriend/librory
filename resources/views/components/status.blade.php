@if (session('status'))
    notify('{!! session('status') !!}');
@endif
