

$(document).ready(function(){

// var scrollPos=scrollTop();
var wind_scr = $(window).scrollTop();
if(wind_scr >= 195){
    $('.container.banner').addClass('hidden');
    $('.navbar').addClass('move-top');
    // $('.main-container').addClass('margin-top-100');
}

else{
    $('.container.banner').removeClass('hidden');
    $('.container.header').removeClass('move-top');
    }


    });
