const text = 'Hi, I am Grzegorz :D';
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

    }, 100);

}

greeting.addEventListener('load',writing(), false);


