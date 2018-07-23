$(function () {

    $('.data-delete-post').on('click', function () {
         $.ajax({
         method: "DELETE",
         url: document.location.origin + $(this).attr('data-delete'),
         timeout: 3000,
         success: function () {
             document.location.reload();
             }
         }
         );
    });
});
