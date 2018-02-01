@extends('layouts.app')

@section('page-title', 'Add New Book')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="d-flex justify-content-center">
            <div class="form-container">

                @include('components.errors')

                <div class="page-header">
                    <h3>Add New Book</h3>
                </div>

                <form action="{{ route('books.save') }}" method="post" autocomplete="off">

                    <div class="form-group">
                        <label for="b-title">Title</label>
                        <input type="text" id="b-title" name="title" class="form-control" required
                            value="{{ old('title') }}"
                        />
                    </div>

                    <div class="form-group">
                        <label for="b-publisher">Publisher</label>
                        <select class="custom-select" name="publisher_id" id="b-publisher">
                            <option></option>
                            @foreach ($publishers as $publisher)
                                <option value="{{ $publisher->id }}"
                                    @if (old('publisher_id') == $publisher->id) selected @endif
                                >
                                    {{ $publisher->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <br />

                    <div class="form-group">
                        <label for="b-isbn">ISBN</label>
                        <input type="text" id="b-isbn" name="isbn" class="form-control" required
                            value="{{ old('isbn') }}"
                        />
                    </div>

                    <div class="form-group">
                        <label for="b-edition">Edition</label>
                        <input type="text" id="b-edition" name="edition" class="form-control"
                            value="{{ old('edition') }}"
                        />
                    </div>

                    <div class="form-group">
                        <label for="b-volume">Volume</label>
                        <input type="text" id="b-volume" name="volume" class="form-control"
                            value="{{ old('volume') }}"
                        />
                    </div>

                    <div class="form-group last">
                        <label for="b-issue">Issue</label>
                        <input type="text" id="b-issue" name="issue" class="form-control"
                            value="{{ old('issue') }}"
                        />
                    </div>

                    <div class="form-group buttons">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                        <a href="{{ route('categories.all') }}" class="btn btn-link">
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
