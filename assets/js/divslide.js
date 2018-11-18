// When the user scrolls down 20px from the top of the document, slide down the navbar
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        document.getElementById("ImgGrid").style.left = "0";
    } else {
        document.getElementById("ImgGrid").style.left = "-50px";
    }
}