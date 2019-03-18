$(window).resize(function(){
    if($(window).width()<1100){
        $('#photo-header').css('display','none');
        $('#greeting').css('width','100%');
        $('h1').css('font-size','50px');
        $('.content-aboutMe').css('display','block');
        $('.gird-container h3').removeAttr('id').attr('id','gird-item3');

        $('.content-aboutMe').css('height','100vh');
        $('#aboutMe').css('height','120vh');
    }

    if($(window).width()<700){
        $('progress').hide();
        $('.gird-container h3').removeAttr('id').attr('id','gird-item4');
    }

    if($(window).width()>1100){
        $('.gird-container h3').removeAttr('id').attr('id','gird-item2');
        $('#photo-header').css('display','');
        $('#greeting').css('width','60%');
        $('h1').css('font-size','100px');
        $('.content-aboutMe').css('display','');
        $('progress').show();

        $('.content-aboutMe').css('height','76vh');
        $('#aboutMe').css('height','110vh');
    }

    // else{
    //     $('#photo-header').css('display','');
    //     $('#greeting').css('width','60%');
    //     $('h1').css('font-size','100px');
    //     $('.content-aboutMe').css('display','');
    //     $('progress').show();
    // }
});