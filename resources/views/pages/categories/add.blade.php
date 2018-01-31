@extends('layouts.app')

@section('page-title', 'Add New Category')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="d-flex justify-content-center">
            <div class="form-container">

                @include('components.errors')

                <div class="page-header">
                    <h3>Add New Category</h3>
                </div>

                <form action="{{ route('categories.save') }}" method="post" autocomplete="off">

                    <div class="form-group">
                        <label for="c-name">Name</label>
                        <input type="text" id="c-name" name="name" class="form-control" required
                            value="{{ old('name') }}"
                        />
                    </div>

                    <div class="form-group last">
                        <label for="c-shelf">Shelf</label>
                        <select class="custom-select" name="shelf_id" id="c-shelf">
                            <option></option>
                            @foreach ($shelves as $shelf)
                                <option value="{{ $shelf->id }}"
                                    @if (old('shelf_id') == $shelf->id) selected @endif
                                >
                                    {{ $shelf->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group buttons">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                        <a href="{{ route('shelves.all') }}" class="btn btn-link">
                            Cancel
                        </a>
                    </div>

                    {{ csrf_field() }}
                </form>

            </div>
            </div>

        </div>
    </div>
</div>
@endsection
