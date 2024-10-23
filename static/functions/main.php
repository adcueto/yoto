<?php
#---------------------------------------------------------------------------------------------------------------------------------------------------------------------
#---------------------------------------------------------------------------------------------------------------------------------------------------------------------
function printHtmlHead($HEAD){
	echo "<meta charset=UTF-8\">";
	echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">";
	echo "<link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"./lib/multimedia/img/icono.ico\">";
	echo "<title>$HEAD</title>";
	echo "<script src=\"./lib/bootstrap/5.3.0/js/bootstrap.bundle.min.js\"></script>";
	echo "<script src=\"./lib/js/main.js\"></script>";
	echo "<link href=\"./lib/css/main_style.css\" rel=\"stylesheet\">";
	echo "<link href=\"./lib/bootstrap/5.3.0/css/bootstrap.min.css\" rel=\"stylesheet\">";
	echo "<link href=\"./lib/FontAwesome/6.4.0/css/fontawesome.css\" rel=\"stylesheet\">";
	echo "<link href=\"./lib/FontAwesome/6.4.0/css/brands.css\" rel=\"stylesheet\">";
	echo "<link href=\"./lib/FontAwesome/6.4.0/css/solid.css\" rel=\"stylesheet\">";
}
#---------------------------------------------------------------------------------------------------------------------------------------------------------------------
#---------------------------------------------------------------------------------------------------------------------------------------------------------------------
function printNav($chk){
	$indexChk = '';
	if($chk){$indexChk = 'index.php';}
	echo "<div class=\"container-fluid\">";
		echo "<a class=\"navbar-brand\" href=\"index.php\">";
			echo "<img src=\"./lib/multimedia/img/YOTO.svg\" alt=\"Logo Yoto\" id=\"logoYoto\">";
		echo "</a>";
		echo "<button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">";
			echo "<span class=\"navbar-toggler-icon\"></span>";
		echo "</button>";
		echo "<div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">";
			echo "<ul class=\"navbar-nav ms-auto fw-bold\">";
				echo "<li class=\"nav-item\"><a class=\"nav-link active\" onclick=\"topBody('navbarSupportedContent')\">Inicio</a></li>";
				echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"" . $indexChk . "#Servicios\" onclick=\"closeMenu('navbarSupportedContent')\">Servicios</a></li>";
				echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"" . $indexChk . "#Nosotros\" onclick=\"closeMenu('navbarSupportedContent')\">Nosotros</a></li>";
				echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"login.php\" onclick=\"closeMenu('navbarSupportedContent')\">Usuarios</a></li>";
			echo "</ul>";
		echo "</div>";
	echo "</div>";
}
#---------------------------------------------------------------------------------------------------------------------------------------------------------------------
#---------------------------------------------------------------------------------------------------------------------------------------------------------------------
function carousel(){
	echo "<div id=\"carouselExampleAutoplaying\" class=\"carousel slide\" data-bs-ride=\"carousel\">";
		echo "<div class=\"carousel-indicators\">";
			echo "<button type=\"button\" data-bs-target=\"#carouselExampleIndicators\" data-bs-slide-to=\"0\" aria-label=\"Slide 1\"></button>";
			echo "<button type=\"button\" data-bs-target=\"#carouselExampleIndicators\" data-bs-slide-to=\"1\" aria-label=\"Slide 2\"></button>";
			echo "<button type=\"button\" data-bs-target=\"#carouselExampleIndicators\" data-bs-slide-to=\"2\" aria-label=\"Slide 3\"></button>";
			echo "<button type=\"button\" data-bs-target=\"#carouselExampleIndicators\" data-bs-slide-to=\"3\" aria-label=\"Slide 4\" class=\"active\" aria-current=\"true\"></button>";
		echo "</div>";
		echo "<div class=\"carousel-inner\">";
			echo "<div class=\"carousel-item\" data-bs-interval=\"10000\">";
				echo "<video id=\"vid_data\" src=\"./lib/multimedia/video/data_480.mp4\" loading=\"lazy\" width=\"100%\" height=\"100%\" loop autoplay muted></video>";
			echo "</div>";
			echo "<div class=\"carousel-item\" data-bs-interval=\"9000\">";
				echo "<video id=\"vid_iot\" src=\"./lib/multimedia/video/iot_480.mp4\" loading=\"lazy\" width=\"100%\" height=\"100%\" loop autoplay muted></video>";
			echo "</div>";
			echo "<div class=\"carousel-item\" data-bs-interval=\"7000\">";
				echo "<video id=\"vid_pymes\" src=\"./lib/multimedia/video/pymes_480.mp4\" loading=\"lazy\" width=\"100%\" height=\"100%\" loop autoplay muted></video>";
			echo "</div>";
			echo "<div class=\"carousel-item active\" data-bs-interval=\"10000\">";
				echo "<video id=\"vid_telecom\" src=\"./lib/multimedia/video/telecom_480.mp4\" loading=\"lazy\" width=\"100%\" height=\"100%\" loop autoplay muted></video>";
			echo "</div>";
		echo "</div>";
		echo "<button class=\"carousel-control-prev\" type=\"button\" data-bs-target=\"#carouselExampleAutoplaying\" data-bs-slide=\"prev\">";
			echo "<span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>";
			echo "<span class=\"visually-hidden\">Previous</span>";
		echo "</button>";
		echo "<button class=\"carousel-control-next\" type=\"button\" data-bs-target=\"#carouselExampleAutoplaying\" data-bs-slide=\"next\">";
			echo "<span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>";
			echo "<span class=\"visually-hidden\">Next</span>";
		echo "</button>";
	echo "</div>";
}
#---------------------------------------------------------------------------------------------------------------------------------------------------------------------
#---------------------------------------------------------------------------------------------------------------------------------------------------------------------
function services($service1,$service2){
	echo "<div class=\"page\">";
		echo "<div class=\"row featurette\">";
			echo "<div class=\"container text-center\">";
				echo "<div class=\"row\">";
					echo "<a class=\"fw-bolder fs-3\" style=\"color:#000000\" name=\"ser\"> " . $service1 . "</a>";
					echo "<br>";
					echo "<p class=\"fw-bolder fs-1\" style=\"color:#000000\"> " . $service2 . "</p>";
					echo "<br>";
					echo "<div class=\"gallery\">";
						echo "<div class=\"container-lg\">";
							echo "<div class=\"row gy-4 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4\">";
								echo "<div class=\"col\">";
									echo "<a href=\"pymes.php\"><img class=\"gallery-item\" alt=\"gallery_pymes\" src=\"./lib/multimedia/img/pymes.jpg\"></a>";
								echo "</div>";
								echo "<div class=\"col\">";
									echo "<a href=\"iot.php\"><img class=\"gallery-item\" alt=\"gallery_iot\" src=\"./lib/multimedia/img/iot.jpg\"></a>";
								echo "</div>";
								echo "<div class=\"col\">";
									echo "<a href=\"telecom.php\"><img class=\"gallery-item\" alt=\"gallery_telecom\" src=\"./lib/multimedia/img/telecom.jpg\"></a>";
								echo "</div>";
								echo "<div class=\"col\">";
									echo "<a href=\"data.php\"><img class=\"gallery-item\" alt=\"gallery_data\" src=\"./lib/multimedia/img/data.jpg\"></a>";
								echo "</div>";
							echo "</div>";
						echo "</div>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	echo "</div>";
	echo "<br>";
	echo "<div class=\"Center \"><img class=\"business\" src=\"./lib/multimedia/img/banner.jpg\"></div>";
}
#---------------------------------------------------------------------------------------------------------------------------------------------------------------------
#---------------------------------------------------------------------------------------------------------------------------------------------------------------------
function aboutUs($aboutus){
	echo "<p class=\"fw-bolder fs-1\" style=\"color:#000000\"> " . $aboutus . " </p>";
	echo "<div class=\"gallery\">";
		echo "<div class=\"container-lg\">";
			echo "<div class=\"row gy-4 row-cols-1 row-cols-sm-2 row-cols-md-3\">";
				echo "<div class=\"col\">";
					echo "<img class=\"gallery-item\" alt=\"gallery_pymes\" src=\"./lib/multimedia/img/vision.jpg\">";
				echo "</div>";
				echo "<div class=\"col\">";
					echo "<img class=\"gallery-item\" alt=\"gallery_iot\" src=\"./lib/multimedia/img/mision.jpg\">";
				echo "</div>";
				echo "<div class=\"col\">";
					echo "<img class=\"gallery-item\" alt=\"gallery_telecom\" src=\"./lib/multimedia/img/valores.jpg\">";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	echo "</div>";
}
#---------------------------------------------------------------------------------------------------------------------------------------------------------------------
#---------------------------------------------------------------------------------------------------------------------------------------------------------------------
function contact($chk){
	$iframeSrc = 'https://www.google.com/maps/embed?pb=!4v1686093323024!6m8!1m7!1s7PezeCo-VeMPdTyfXOSDIg!2m2!1d20.58004795645535!2d-100.3625400833502!3f223.74404035388523!4f38.62857577007014!5f0.7820865974627469';
	echo "<div class=\"container p-4\">";
		echo "<div class=\"mb-4\">";
			echo "<a class=\"btn btn-outline-light btn-floating m-1\" href=\"#\" role=\"button\"><i class='fa-brands fa-facebook fa-beat-fade'></i></a>";
			echo "<a class=\"btn btn-outline-light btn-floating m-1\" href=\"#\" role=\"button\"><i class='fa-brands fa-twitter fa-beat-fade'></i></a>";
			echo "<a class=\"btn btn-outline-light btn-floating m-1\" href=\"#\" role=\"button\"><i class='fa fa-envelope fa-beat-fade'></i></a>";
			echo "<a class=\"btn btn-outline-light btn-floating m-1\" href=\"#\" role=\"button\"><i class='fa-brands fa-instagram fa-beat-fade'></i></a>";
			echo "<a class=\"btn btn-outline-light btn-floating m-1\" href=\"#\" role=\"button\"><i class='fa-brands fa-linkedin fa-beat-fade'></i></a>";
		echo "</div>";
		echo "<div class=\"mb-4\">";
			echo "<p><a class=\"link-opacity-10-hover\" href=\"#\"><a>Llama al xxxx xxxx xxx </a></p>";
			echo "<p>Prolongación Blvd. Bernardo Quintana 300 Piso 14, Centro Sur. Santiago de Querétaro, Qro. C.P. 76090</p>";
		echo "</div>";
		if($chk){
			echo "<div class=\"container px-4 text-center\">";
				echo "<div class=\"row gx-5\">";
					echo "<div class=\"col\">";
						echo "<div class=\"map-responsive\">|";
							echo "<iframe loading=lazy src=\"" . $iframeSrc . "\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>";
						echo "</div>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		}
	echo "</div>";
}
#---------------------------------------------------------------------------------------------------------------------------------------------------------------------
#---------------------------------------------------------------------------------------------------------------------------------------------------------------------
function printFooter($footer1,$footer2){
	echo "<div class=\"text-center p-3 text-white footer\">" . $footer1 . ": <a class=\"text-white fw-bold\" href=\"index.php\">" . $footer2 . "</a></div>";
}
#---------------------------------------------------------------------------------------------------------------------------------------------------------------------
#---------------------------------------------------------------------------------------------------------------------------------------------------------------------
function upButton(){
	echo "<button type=\"button\" class=\"btn btn-danger btn-floating btn-lg fw-bold\" id=\"btn-back-to-top\" onclick=\"topFunction()\" title=\"Go to top\">TOP</button>";
}
#---------------------------------------------------------------------------------------------------------------------------------------------------------------------
#---------------------------------------------------------------------------------------------------------------------------------------------------------------------
function printBanner1($srcImg,$type){
	$type = strtolower($type);
	echo "<div class=\"card text-bg-dark\">";
		echo "<img src=\"" . $srcImg . "\" loading=\"lazy\" class=\"card-img\" alt=\"Banner " . $type . "\">";
		echo "<div class=\"card-img-overlay\">";
			if(strpos($type, "pymes") !== false){
				echo "<h1 class=\"fs-1 fw-bold\">Pequeñas y Medianas</h1>";
				echo "<h1 class=\"fs-1 fw-bold\">Empresas</h1>";
				echo "<p class=\"fs-3 fw-medium\">This is a wider card with supporting text below as a natural lead-in to additional content.</p>";
				echo "<p class=\"fs-3 fw-medium\">This content is a little bit longer.</p>";
				echo "<p class=\"card-text\"><small>Last updated 3 mins ago</small></p>";
			}	
			elseif(strpos($type, "iot") !== false){
				echo "<h1 class=\"fs-1 fw-bold\">Internet</h1>";
				echo "<h1 class=\"fs-1 fw-bold\">de las</h1>";
				echo "<h1 class=\"fs-1 fw-bold\">Cosas</h1>";
				echo "<p class=\"fs-3 fw-medium\">This is a wider card with supporting text below as a natural lead-in to additional content.</p>";
				echo "<p class=\"fs-3 fw-medium\">This content is a little bit longer.</p>";
				echo "<p class=\"card-text\"><small>Last updated 3 mins ago</small></p>";
			}
			elseif(strpos($type, "telecom") !== false){
				echo "<h1 class=\"fs-1 fw-bold\">Telecomunicaciones</h1>";
				echo "<p class=\"fs-3 fw-medium\">This is a wider card with supporting text below as a natural lead-in to additional content.</p>";
				echo "<p class=\"fs-3 fw-medium\">This content is a little bit longer.</p>";
				echo "<p class=\"card-text\"><small>Last updated 3 mins ago</small></p>";
			}
			elseif(strpos($type, "data") !== false){
				echo "<h1 class=\"fs-1 fw-bold\">Análisis</h1>";
				echo "<h1 class=\"fs-1 fw-bold\">de Datos</h1>";
				echo "<p class=\"fs-3 fw-medium\">This is a wider card with supporting text below as a natural lead-in to additional content.</p>";
				echo "<p class=\"fs-3 fw-medium\">This content is a little bit longer.</p>";
				echo "<p class=\"card-text\"><small>Last updated 3 mins ago</small></p>";
			}
		echo "</div>";
	echo "</div>";		
}
#---------------------------------------------------------------------------------------------------------------------------------------------------------------------
#---------------------------------------------------------------------------------------------------------------------------------------------------------------------
function printCards($srcImg1,$srcImg2,$type){
	$type = strtolower($type);
	echo "<div  class=\"card mb-3\" style=\"background:#BC1024; color:white\">";
		echo "<div class=\"row g-0\">";
			echo "<div class=\"col-md-8\">";
				echo "<div class=\"card-body\">";
					if(strpos($type, "pymes") !== false){
						echo "<h5 class=\"fs-1 fw-medium\">Card title</h5>";
						echo "<p class=\"fs-3 fw-normal\">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>";
					}
					elseif(strpos($type, "iot") !== false){
						echo "<h5 class=\"fs-1 fw-medium\">Card title</h5>";
						echo "<p class=\"fs-3 fw-normal\">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>";
					}
					elseif(strpos($type, "telecom") !== false){
						echo "<h5 class=\"fs-1 fw-medium\">Card title</h5>";
						echo "<p class=\"fs-3 fw-normal\">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>";
					}
					elseif(strpos($type, "data") !== false){
						echo "<h5 class=\"fs-1 fw-medium\">Card title</h5>";
						echo "<p class=\"fs-3 fw-normal\">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>";
					}
				echo "</div>";
			echo "</div>";
			echo "<div class=\"col-md-4\">";
				echo "<img src=\"" . $srcImg1 . "\" loading=\"lazy\" class=\"img-fluid rounded-start\" alt=\"Cards " . $type . " 01\">";
			echo "</div>";
		echo "</div>";
	echo "</div>";
	echo "<div  class=\"card text-bg-dark mb-3\">";
		echo "<div class=\"row g-0\">";
			echo "<div class=\"col-md-4\">";
				echo "<img src=\"" . $srcImg2 . "\" loading=\"lazy\" class=\"img-fluid rounded-start\" alt=\"Cards " . $type . " 02\">";
			echo "</div>";
			echo "<div class=\"col-md-8\">";
				echo "<div class=\"card-body\">";
					if(strpos($type, "pymes") !== false){
						echo "<h5 class=\"fs-1 fw-medium\">Card title</h5>";
						echo "<p class=\"fs-3 fw-normal\">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>";
					}
					elseif(strpos($type, "iot") !== false){
						echo "<h5 class=\"fs-1 fw-medium\">Card title</h5>";
						echo "<p class=\"fs-3 fw-normal\">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>";
					}
					elseif(strpos($type, "telecom") !== false){
						echo "<h5 class=\"fs-1 fw-medium\">Card title</h5>";
						echo "<p class=\"fs-3 fw-normal\">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>";
					}
					elseif(strpos($type, "data") !== false){
						echo "<h5 class=\"fs-1 fw-medium\">Card title</h5>";
						echo "<p class=\"fs-3 fw-normal\">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>";
					}
				echo "</div>";
			echo "</div>";
		echo "</div>";
	echo "</div>";
}
#---------------------------------------------------------------------------------------------------------------------------------------------------------------------
#---------------------------------------------------------------------------------------------------------------------------------------------------------------------
?>
