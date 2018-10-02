$(function() {
    $(".dropdown-trigger")
        .dropdown(
        { hover: true }
    )
        .hover(() => {
        $('.dropdown-content').css('position','absolute').css('top','34px');
    });
    $('.sidenav').sidenav();
    $('#mobile-demo').collapsible();
});