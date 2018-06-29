$(document).ready(function() {
    $('.js-delete-user').on('click', function (e) {
        e.preventDefault();

        let $link = $(e.currentTarget);

        $link.find('.material-icons').hide();
        $link.find('#ajaxLoading').show();
        let id = $link.data('id');

        $.ajax({
            method: 'DELETE',
            url: $link.attr('href')
        }).done(function () {
            $('.modal').modal('close');
            $('.userContainer-' + id).fadeOut('normal', function () {
                $(this).hide();
            });
        });
    });
});
