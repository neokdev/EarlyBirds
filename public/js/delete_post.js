$(function () {

    $('.data-delete-post').on('click', function (e) {
        e.preventDefault();

         $.ajax({
         method: "DELETE",
                 url: $(this).attr('data-delete'),
         timeout: 3000,
             success: function (data) {
                 // console.log(data);
             document.location.reload();
             }
         });
    });
});
