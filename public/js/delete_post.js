$(function () {
    $('a.data-delete-post').on('click', function (e) {
         e.preventDefault(this);
         $.ajax({
         method: "DELETE",
         url: $(this).attr('data-delete'),
         timeout: 3000,
         success: function (data) {
             M.toast({html: data});
                 setTimeout(function () {
                     document.location.reload();
                 }, 2500);
             }
         });
    });
});
