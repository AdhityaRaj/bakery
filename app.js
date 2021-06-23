window.onscroll = function(){
  var  nav = document.getElementById('nav');
	if (window.pageYOffset >10) {
    nav.style.backgroundColor="#b5ead7";
    nav.style.backgroundImage="none";
	}
	else{
		nav.style.backgroundColor = "transparent";
		nav.style.backgroundImage = "linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0))";
	}
}
