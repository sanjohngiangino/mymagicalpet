
//se scrolla lancia la scrollFunction
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20){
        document.getElementById("topButton").style.display = "block";
    }
    else {
        document.getElementById("topButton").style.display = "none";
    }
}


//riporta su
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}