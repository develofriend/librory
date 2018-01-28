@if (session('nofitication'))
    <div class="alert alert-success">
        <ul>
            <li>
                <i class="fas fa-check-circle"></i>
                {!! session('notification') !!}
            </li>
        </ul>
    </div>
@endif
