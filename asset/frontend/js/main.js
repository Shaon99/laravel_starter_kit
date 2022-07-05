//Get the button
let mybutton = document.getElementById("btn-back-to-top");



var myNav = document.getElementById('navbar');
window.onscroll = function () { 
    "use strict";
    if (document.body.scrollTop >= 100 || document.documentElement.scrollTop >= 100 ) {
        myNav.classList.add("nav-colored");
        myNav.classList.remove("nav-transparent");
        mybutton.style.display = "block";
      

    } 
    else {
        myNav.classList.add("nav-transparent");
        myNav.classList.remove("nav-colored");
        mybutton.style.display = "none";
    }
};

// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}


