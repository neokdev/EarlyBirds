$(document).ready(function() {
    $('.js-upgrade-user').on('click', function (e) {
        e.preventDefault();

        let $link = $(e.currentTarget);

        $link.find('.material-icons').hide();
        $link.find('#ajaxLoading').show();

        $.ajax({
            method: 'PATCH',
            url: $link.attr('href')
        }).done(function (data) {
            $('.modal').modal('close');
        });
    });
});
