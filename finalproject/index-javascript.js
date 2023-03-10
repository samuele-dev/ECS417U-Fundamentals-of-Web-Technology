/*Remember that margin is pointing left*/
function openSlideMenu(){
	document.getElementById('side-menu').style.width = '250px';
	/*document.getElementById('main').style.marginRight = '250px';*/
}
function closeSlideMenu(){
	document.getElementById('side-menu').style.width = '0';
	/*document.getElementById('main').style.marginRight = '0';*/
}

//Image position in the slideshow.
var slidePosition = 1;
// User can change the slide which will increment/decrement the number.
function changeImg(n) {
  displaySlides(slidePosition += n);
}
// Shows the current image of the slide.
function currentImg(n) {
  displaySlides(slidePosition = n);
}
//Results to the web page.
function displaySlides(n) {
  //Select the webSlides
  var slides = document.getElementsByClassName("webSlide");
  
  if (n > slides.length) {
    slidePosition = 1
  }    
  if (n < 1) {
    slidePosition = slides.length
  }
  for (var i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  slides[slidePosition - 1].style.display = "block";  
}