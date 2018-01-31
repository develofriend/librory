<form action="{{ $shelf->updateUrl() }}" method="post" autocomplete="off" class="ajax-form">

    <div class="form-errors"></div>

    <div class="form-group last">
        <label for="a-name">Name</label>
        <input type="text" class="form-control" id="a-name" name="name" required
            value="{{ $shelf->name }}"
        />
    </div>

    <div class="form-group buttons">
        <button type="submit" class="btn btn-primary btn-submit">
            Submit Changes
        </button>
        <button type="button" class="btn btn-link" onclick="bootbox.hideAll();">
            Cancel
        </button>
    </div>

    {!! csrf_field() !!}
</form>
