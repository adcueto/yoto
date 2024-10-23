//======================================================================================
//======================= YOTO Soluciones & Servicios ==================================
//======================================================================================
//======================================================================================
function closeMenu(idCloseMenu){
	document.getElementById(idCloseMenu).classList.remove('show');
	document.getElementById(idCloseMenu).className += " hide";
}
//======================================================================================
function topBody(idCloseMenu){
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
	document.getElementById(idCloseMenu).classList.remove('show');
	document.getElementById(idCloseMenu).className += " hide";
}
//======================================================================================
let mybutton = document.getElementById("btn-back-to-top");
window.onscroll = function (){
	scrollFunction();
};
function scrollFunction() {
	if(document.body.scrollTop > 80 || document.documentElement.scrollTop > 80){
		document.getElementById('btn-back-to-top').style.display='block';
	}
	else{
		document.getElementById('btn-back-to-top').style.display='none';
	}
}
function topFunction() {
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
}
//======================================================================================
window.addEventListener("DOMContentLoaded", (event) => {
    //---------------------------------------
    if (document.querySelector("#Servicios")) { changeSpace("Servicios"); }
    if (document.querySelector("#Nosotros")) { changeSpace("Nosotros"); }
    if (document.querySelector("#Contacto")) { changeSpace("Contacto"); }
    if (document.querySelector("#cards_pymes")) { changeSpace("cards_pymes"); }
    if (document.querySelector("#cards_iot")) { changeSpace("cards_iot"); }
    if (document.querySelector("#cards_telecom")) { changeSpace("cards_telecom"); }
    if (document.querySelector("#cards_data")) { changeSpace("cards_data"); }
    //---------------------------------------
    
    let w = innerWidth;
    let res = "";
    if (w <= 300) { res = "240"; }
    else if ((w > 300) && (w <= 500)) { res = "320"; }
    else if ((w > 500) && (w <= 800)) { res = "480"; }
    else if ((w > 800) && (w < 1200)) { res = "720"; }
    else if (w >= 1200) { res = "1080"; }
    
    // Asigna las URLs correctas a los videos
    document.getElementById("vid_data").src = videoDataBaseURL + res + ".mp4";
    document.getElementById("vid_iot").src = videoIOTBaseURL + res + ".mp4";
    document.getElementById("vid_pymes").src = videoPymesBaseURL + res + ".mp4";
    // Se eliminó el acceso a vid_telecom
});
function changeSpace(idChangeSpace){
	let w = innerWidth;
	if(w < 575){
		document.getElementById(idChangeSpace).classList.remove('Space0');
    	document.getElementById(idChangeSpace).classList.remove('Space1');
		document.getElementById(idChangeSpace).classList.remove('Space2');
		document.getElementById(idChangeSpace).classList.remove('Space3');
		document.getElementById(idChangeSpace).className += " Space0";
    }
	else if((w >= 575) && (w < 800)){
    	document.getElementById(idChangeSpace).classList.remove('Space0');
    	document.getElementById(idChangeSpace).classList.remove('Space1');
		document.getElementById(idChangeSpace).classList.remove('Space2');
		document.getElementById(idChangeSpace).classList.remove('Space3');
		document.getElementById(idChangeSpace).className += " Space1";
    }
	else if((w >= 800) && (w < 1200)){
    	document.getElementById(idChangeSpace).classList.remove('Space0');
    	document.getElementById(idChangeSpace).classList.remove('Space1');
		document.getElementById(idChangeSpace).classList.remove('Space2');
		document.getElementById(idChangeSpace).classList.remove('Space3');
		document.getElementById(idChangeSpace).className += " Space2";
    }
	else if(w >= 1200){
    	document.getElementById(idChangeSpace).classList.remove('Space0');
    	document.getElementById(idChangeSpace).classList.remove('Space1');
		document.getElementById(idChangeSpace).classList.remove('Space2');
		document.getElementById(idChangeSpace).classList.remove('Space3');
		document.getElementById(idChangeSpace).className += " Space3";
    }
}
//======================================================================================
//======================================================================================
//======================================================================================



