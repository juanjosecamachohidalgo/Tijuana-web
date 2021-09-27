<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Galeria - Tijuana Tequila</title>
</head>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <!--Css principal-->
<link href="../css/main.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="estilo-galeria.php">
<script src="../js/menu.js" type="text/javascript"></script>

<!-- Menú- Icon Library -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


<body class="body">
<?php

@session_start();
if(isset($_SESSION['username'])){
	unset ($_SESSION['username']);
	session_destroy();
	}
	?>
<!--Cabecera-->
<header class="header">
                      
<!--Logo-->
<div class="headerContainer">

<div class="containerLogo">
	<img class="logo" src="../images/logo.jpg">
</div>


                    <!--Menu-->
<div class="menuContainer">
<ul class="topnav" id="myTopnav">
 
  <li><a class="active" href="../index.php"><i class="fa fa-fw fa-home"></i>Inicio</a></li>
  <li><a href="galeria.php"><i class="fa fa-fw fa-camera"></i>Galer&iacutea</a></li>
  <li><a href="eventos.php"><i class="fa fa-fw fa-angellist"></i>Eventos</a></li>
  <li><a href="productos.php"><i class="fa fa-fw fa-coffee"></i>Productos</a></li>
  <li><a href="contacto.php"><i class="fa fa-fw fa-phone-square"></i>Contacto</a></li>
  <li class="icon">
    <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
  </li>
</ul></div>



</div>
</header>
<div>
<script>
// fbalbumJS2.js by zach@lysobey.com
(function ($) {
  $.fn.fbAlbum = function (options) {
    var $targetElement = this,
    graph = "https://graph.facebook.com/",
    settings = {
      'albumID' : '10150302289698306',
      'limit' : 100,
      'limitThumbs' : false,
      'ulClass' : 'album',
      'rel' : 'group',
      'callback' : '',
      'title' : true,
      'thumbSize' : 0,
      'fullSize' : 0,
      'caption' : false,
      'callback' : function () {}
    };
    if (options) {
      $.extend(settings, options);
    }
    graph += settings.albumID + "/photos?fields=name,picture,images,source&limit=" + settings.limit + "&callback=?";
    $.getJSON(graph, function (json) {
      var albumItem = [],
      currentIndex = 0,
      $ul = $('<ul>');
      $.each(json.data, function () {
        if (typeof this.picture !== "undefined") {
          var thumbImg = settings.thumbSize === 0 ? this.picture : this.images[9 - settings.thumbSize].source,
          fullImg = settings.fullSize === 0 ? this.source : this.images[9 - settings.fullSize].source,
          title = (settings.title && this.name) ? this.name : '',
          $noThumb = (settings.limitThumbs && (currentIndex += 1) >= settings.limitThumbs),
          $img = $noThumb ? null : $('<img>').attr({
            'src': thumbImg,
            'alt': title
          }),
          $caption = (!settings.caption || title === '') ? null : $('<p>').addClass('caption').text(title),
          $a = $('<a>').attr({
            'class': 'imageLink',
            'rel': settings.rel,
            'title': title,
            'href': fullImg
          }),
          $li = $('<li>').attr({
            'class': $noThumb ? 'noThumb' : 'fbThumb'
          });
          $ul.append($li.append($a.append($img, $caption))).addClass(settings.ulClass);
        }
      });
      $targetElement.append($ul);
      settings.callback();
    });
    return $targetElement;
  };
}(jQuery));
</script>
</div>
<!--Cookies--------------------------------------------------------------------------------------------------------------------------->
<script>
function getCookie(c_name){
    var c_value = document.cookie;
    var c_start = c_value.indexOf(" " + c_name + "=");
    if (c_start == -1){
        c_start = c_value.indexOf(c_name + "=");
    }
    if (c_start == -1){
        c_value = null;
    }else{
        c_start = c_value.indexOf("=", c_start) + 1;
        var c_end = c_value.indexOf(";", c_start);
        if (c_end == -1){
            c_end = c_value.length;
        }
        c_value = unescape(c_value.substring(c_start,c_end));
    }
    return c_value;
}
 
function setCookie(c_name,value,exdays){
    var exdate=new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
    document.cookie=c_name + "=" + c_value;
}
 
if(getCookie('tiendaaviso')!="1"){
    document.getElementById("barraaceptacion").style.display="block";
}
function PonerCookie(){
    setCookie('tiendaaviso','1',365);
    document.getElementById("barraaceptacion").style.display="none";
}
</script>
<!--//FIN BLOQUE COOKIES-->

<!--FinSeccionContenidos--------------------------------------------------------------------------->
 <!--pie--> 
 <footer class="footer">
	<div>
		<font color="#FFFFFF">Tijuana Tequila Hostelería S.L. CIF B-04759411. Calle Álvarez de Castro nº2, 04001, Almería. <a href="php/avisolegal.php">Aviso Legal.</a></font>     
     	
		
     </div>	
	 	
		<!--<font color="#FFFFFF">  
		     <i class="fa fa-facebook" aria-hidden="true"></i>	
             <i class="fa fa-instagram" aria-hidden="true"></i>  
        </font>			 -->
		
     </div>	
 </footer>
</body>

</html>
