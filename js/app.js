//JAVASCRIPT 
 let menu = document.getElementById('header-menu')
 let presentation = document.getElementById('content-text')
 setTimeout(function () {
     presentation.innerHTML = "I'm Web Developer"
 }, 3000)
 setTimeout(function () {
     presentation.innerHTML = "With More Than 3 Years Of Experience"
 }, 5000)
 setTimeout(function () {
     presentation.innerHTML = "Welcome To My Portafolio"
 }, 8000)


 //JQUERY
 $(document).ready(function(){
    $("a").on('click', function(event) {
    //VERIFICATE HASH
    if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
            scrollTop: $(hash).offset().top
            }, 1000, function(){
            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
            });
        }
    });
});