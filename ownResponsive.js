$(window).resize(function(){
    if($(window).width()<1100){
        $('#photo-header').css('display','none');
        $('#greeting').css('width','100%');
        $('h1').css('font-size','50px');
    }
    else{
        $('#photo-header').css('display','');
        $('#greeting').css('width','60%');
        $('h1').css('font-size','100px');
    }
});