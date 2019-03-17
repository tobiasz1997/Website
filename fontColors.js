$(function(){

    $('#git').on('mouseenter',function(){
            $(this).css({
                'background-color':'black'
            });
        }).on('mouseleave',function(){
            $(this).css({
                'background-color':'transparent'
            });
        });
    
    $('#gitlab').on('mouseenter',function(){
            $(this).css({
                'background-image':'linear-gradient(to right,#fc4a1a,#f7b733)'
            });
        }).on('mouseleave',function(){
            $(this).css({
                'background-image':'none'
         });
    });

    $('#facebook').on('mouseenter',function(){
            $(this).css({
                'background-color':'#3b5998'
            });
        }).on('mouseleave',function(){
            $(this).css({
                'background-color':'transparent'
            });
    });

    $('#twitter').on('mouseenter',function(){
            $(this).css({
                'background-color':'#1dcaff'
            });
        }).on('mouseleave',function(){
            $(this).css({
                'background-color':'transparent'
            });
    });

    $('#linkedin').on('mouseenter',function(){
            $(this).css({
                'background-color':'#0077B5'
            });
        }).on('mouseleave',function(){
            $(this).css({
                'background-color':'transparent'
            });
    });

    $('#gmail').on('mouseenter',function(){
            $(this).css({
                'background-color':'#c71610'
            });
        }).on('mouseleave',function(){
            $(this).css({
                'background-color':'transparent'
            });
    });

    $('#phone').on('mouseenter',function(){
            $(this).css({
                'background-image':'linear-gradient(to right,#1f4037,#99f2c8)'
            });
        }).on('mouseleave',function(){
            $(this).css({
                'background-image':'none'
            });
    });



});