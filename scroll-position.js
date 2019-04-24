window.onload = function(){
    const buton = document.getElementById("ScroolButton");

    window.onscroll = function(){
        const test = document.getElementById("buttonScroll");
        const yscroll = window.pageYOffset;

        if(yscroll > 1600){
            ScroolButton.style.display = "block";
        }
        else{
            ScroolButton.style.display = "none";
        }

        test.innerHTML = yscroll;

        if(yscroll>700 || yscroll<1500){
            $('#photo-me').css('transform','scale(1.3)');
        }

        if(yscroll<699 || yscroll>1501){
            $('#photo-me').css('transform','none');
        }

        if(yscroll>1800 & yscroll<2600){
            
            for(let i=0; i<9; i++){
                const $bla = $('progress').eq(i).attr('data-values');
                $('progress').eq(i).attr('value', '1').animate({value: $bla},2600,'swing');
            }
            
        }

    }

    ScroolButton.onclick = function(){
        window.scrollBy(0,-1*window.pageYOffset);
    }

}