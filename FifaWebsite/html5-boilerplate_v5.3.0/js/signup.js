$(document).ready(function(){
    $('#signup-trigger').click(function() {
        $(this).parent().addClass('open');
        $(this).next('#signup-content').slideToggle();
        $(this).toggleClass('active');

        if ($(this).hasClass('active')) {
            $(this).find('span').html('&#x25B2;');
        }
        else{
            $(this).find('span').html('&#x25BC;');
        }
    });
});
