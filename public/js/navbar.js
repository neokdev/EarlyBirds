M.AutoInit();
$(function() {
    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown(
        { hover: true }
    );
    $(".dropdown-trigger").hover( function () {
        $('.dropdown-content').css('position','absolute').css('top','60px');
    });

});