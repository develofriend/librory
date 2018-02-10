@extends('layouts.app')

@section('page-title', 'Shelves')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="page-header">
                <h2>Shelves</h2>
            </div>

            <div class="page-actions">
                <button type="button" data-url="{{ route('shelves.add') }}" class="btn btn-primary add-shelf">
                    Add New Shelf
                </button>
            </div>

            <table class="table table-bb">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th class="text-right">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($shelves as $shelf)
                        @include('pages.shelves.row')
                    @empty
                        <tr>
                            <td colspan="5" class="text-center active noselect">
                                No shelves yet
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection

@section('footer-addon')
<script>
$(function () {

    @include('components.status')

    $(document)

    // add shelf
    .on('click', '.add-shelf, .edit-shelf', function (e) {
        e.preventDefault();
        var dom = $(this),
            url = dom.data('url'),
            title = 'Add Shelf';

        if (dom.hasClass('edit-shelf')) {
            title = 'Edit Shelf';
        }

        bootbox.dialog({
            title: title,
            message: '<div class="bootbox-preloader text-center"><i class="fas fa-circle-notch fa-spin"></i> Loading</div>',
            onEscape: true
        });

        $.get(url)
            .done(function (r) {
                var target = $('.bootbox-preloader');
                if (target.length == 1) {
                    target.replaceWith(r.view);
                } else {
                    bootbox.hideAll();
                }
            })
            .fail(function (r) {
                bootbox.hideAll();
            });
    })

    // save shelf
    .on('submit', '.ajax-form', function (e) {
        e.preventDefault();
        var form = $(this),
            url = form.attr('action'),
            data = form.serialize();

        form.find('.buttons .btn').prop('disabled', true);
        $.post(url, data)
            .done(function (r) {
                if (r.error) {
                    form.find('.form-errors').html(r.error);
                    form.find('.buttons .btn').prop('disabled', false);
                }
                if (r.done) {
                    location.reload();
                }
            })
            .fail(function (r) {
                form.find('.buttons .btn').prop('disabled', false);
            });
    });

});
</script>
@endsection
