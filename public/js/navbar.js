M.AutoInit();
$(function() {
    $(".dropdown-trigger").dropdown(
        { hover: true }
    );
    $(".dropdown-trigger").hover( function () {
        $('.dropdown-content').css('position','absolute').css('top','60px');
    });
    $('.sidenav').sidenav();

    // Line disabled for making observe map working in card profile
    $('#mobile-demo').collapsible();
});