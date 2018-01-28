@if (count($errors->all()) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li><i class="fas fa-exclamation-triangle"></i>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
