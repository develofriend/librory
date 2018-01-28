$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(function () {

    $(document)

    // trigger nav
    .on('click', '.nav-trigger, .nav-backdrop', function () {
        var body = $('body');
        if (body.hasClass('show-nav')) {
            body.removeClass('show-nav');
            $('.nav-backdrop').remove();
        } else {
            body.addClass('show-nav');
            body.append('<div class="nav-backdrop"></div>')
        }
    });

});
