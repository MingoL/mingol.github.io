var slideIndex = 0;
carousel();

function plusDivs(n) {
    showDivs(slideIndex += n);
}
  
function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("slideshow");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length} ;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideIndex-1].style.display = "block";
    // setTimeout(showDivs, 10000);
    setTimeout(carousel, 10000);
}
  
function carousel() {
    var i;
    var x = document.getElementsByClassName("slideshow");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1}
    x[slideIndex-1].style.display = "block";
    setTimeout(carousel, 1000);
}