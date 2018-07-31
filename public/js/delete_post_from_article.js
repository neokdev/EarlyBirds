$(function () {
    $('.data-delete-post').on('click', function () {
        $.ajax({
               method: "DELETE",
               url: $(this).attr('data-delete'),
               timeout: 3000,
               success: function () {
                   document.location.assign(document.referrer);
               }
           }
        );
    });
});
