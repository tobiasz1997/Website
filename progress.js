$(function(){
    for(let i=0; i<9; i++){
        let $bla = $('progress').eq(i).attr('data-values');
        let text = '<span>'+ $bla +'%</span>';
        $('progress').eq(i).after(text);
    }
    

        $('span').css({'padding-left':'10px','font-size':'20px'})
        $('span').hide().delay(300).fadeIn(800);

        if ($(window).outerWidth() < 1300) {
            $('img').css('width', '80%');
        }
  
});

$(function(){

    $('#CSS').on('click',function(){$('#CSS-info').toggle(1000,'swing')});
    $('#JavaScript').on('click',function(){$('#JavaScript-info').toggle(1000)});
    $('#MySQL').on('click',function(){$('#MySQL-info').toggle(1000)});
    $('#Net').on('click',function(){$('#Net-info').toggle(1000)});
    $('#AutoCad').on('click',function(){$('#AutoCad-info').toggle(1000)});


});


