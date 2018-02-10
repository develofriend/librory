<form action="{{ $book->addCountUrl() }}" method="post" autocomplete="off" class="ajax-form">

    <div class="form-errors"></div>

    <div class="form-group">
        <label for="a-book">Book</label>
        <input type="text" class="form-control" id="a-book" required
            readonly disabled value="{{ $book->title }}"
        />
    </div>

    <div class="form-group last">
        <label for="a-quantity">Quantity</label>
        <input type="number" class="form-control" id="a-quantity" name="quantity"
            required min="1" value="1"
        />
    </div>

    <div class="form-group buttons">
        <button type="submit" class="btn btn-primary btn-submit">
            Submit
        </button>
        <button type="button" class="btn btn-link" onclick="bootbox.hideAll();">
            Cancel
        </button>
    </div>

    {!! csrf_field() !!}
</form>
