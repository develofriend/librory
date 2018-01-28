@if (session()->has('nofitication'))
    <div class="alert alert-success">
        {!! session()->get('notification') !!}
    </div>
@endif
