@extends('layouts.app')

@section('page-title', 'Authors')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="page-header">
                <h2>Authors</h2>
            </div>

            <div class="page-actions">
                <button type="button" data-url="{{ route('authors.add') }}" class="btn btn-primary add-author">
                    Add New Author
                </butto>
            </div>

            <table class="table table-bb">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th class="text-right">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($authors as $author)
                    @include('pages.authors.row')
                @empty
                    <tr>
                        <td colspan="5" class="text-center active noselect">
                            No authors yet
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

    // add author
    .on('click', '.add-author', function (e) {
        e.preventDefault();
        var dom = $(this),
            url = dom.data('url');

        bootbox.dialog({
            title: 'Add Author',
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
    });

});
</script>
@endsection
