
const text = 'Cześć ! Jestem Grzesiek :)';
const greeting = document.getElementById('greeting');
const title = '';

function writing(){
    let i = 0;
    var interval = setInterval(() => {
        let content = document.getElementById('greeting');
        let itemContent = content.textContent;
        itemContent += text.charAt(i);
        content.innerHTML = '<h1>' + itemContent + '</h1>';
        i++;
        
        if( i > text.length ){
            clearInterval(interval);
        }

    }, 300, 'slow');

}

greeting.addEventListener('load',writing(), false);

window.addEventListener('scroll',function(){
    const scrollY = window.pageYOffset
    
    if(scrollY==0){
        writing();
    }
    if(scrollY>800){
        let content = document.getElementById('greeting'); 
        content.innerHTML = ' ';
    }

},false);

