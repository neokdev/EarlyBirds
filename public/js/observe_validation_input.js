$(function() {
    let photo = $('input[type="file"]');
    photo.on('change', function (e) {
        if (e.target.files.length === 1) {
            let nameId = $('#' + e.target.parentElement.id);
            console.log(nameId.attr('class'));
            nameId.toggleClass('green').text('téléchargement réussi').css('text-transform', 'Capitalize');
        }
    });
});