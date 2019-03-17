$(function(){
    for(let i=0; i<9; i++){
        let $bla = $('progress').eq(i).attr('data-values');
        $('progress').eq(i).on('mousemove', function(){
            $(this).attr('value', '1');
            $(this).animate({
                value: $bla
            },600,'swing');
        }); 
        let text = '<span>'+ $bla +'%</span>';
        $('progress').eq(i).after(text);
    }
    $('span').css({'padding-left':'10px','font-size':'20px'})
    $('span').hide().delay(300).fadeIn(800);

    if ($(window).outerWidth() < 1300) {
        $('img').css('width', '80%');
      }
});


