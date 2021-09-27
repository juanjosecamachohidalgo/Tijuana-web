<?php 
header('content-type:text/css');
echo "
	
.mevento {
	margin: 0 auto;
	border-color: green;
	border-width: 2px;
	border-style: solid;
	margin-top: 1%;
	background-image: -webkit-gradient(linear, left top, left bottom, from(#B0B0B0), to(#8F8F8F)); /*para chrome y safari*/
    background-image: -moz-linear-gradient(top center, #FFF, #CCC);/*Para Firefox*/
    background-image: -o-linear-gradient(top, #FFF, #CCC);/*Para Opera*/
    background-image: linear-gradient(top, #FFF, #CCC);/*El estandar por defecto*/
	
}

.style-evento-general{
	/*margin-left: auto;*/
	height: auto;
	margin: 0 auto;
	width: 70%;
	/*padding:10px;*/
	margin-bottom: 4%;
	border-color: red;
	border-width: 5px;
	border-style: solid;
	overflow: hiden;
	margin-top:1%;
	
}

.style-checkbox{
	display: inline-block;
	color: white;
	padding: 1%;
	text-align:center;
	position: center;
	margin-top:auto;
	margin-bottom: auto;
	margin-right: 1%;
}

.style-crear-evento{
	margin-left: 0;
	height: auto;
	margin: 0 auto;
	width: 70%;
	padding:10px;
	/*display: inline-block;*/
	overflow: hiden;
}

.style-evento-boton{
	height: 60px;
	width: 150px;
}

.style-title-evento{
	margin-left: 2%;
	margin-top: 2%;
}

form {
	 /* S�lo para centrar el formulario a la p�gina */
   	
    /*width: 600px;*/
    /* Para ver el borde del formulario */
  	padding: 1em;
    border: 3px solid #422;
    border-radius: 1em;
	margin-bottom: 2%;
}

form div + div {
	margin-top: 1em;
}

label{
	display: inline-block;
	width: 90px;
	text-align: right;
	font-family: verdana;
}
input{
	height:30px;
}
input, textarea {
	/* Para asegurarse de que todos los campos de texto tienen las mismas propiedades de fuente
       Por defecto, las areas de texto tienen una fuente con monospace */
	   font: 1em sans-serif;
	   
	   /* Para darle el mismo tama�o a todos los campos de texto */
	   width: 300px;
	   -moz-box-sizing: border-box;
		box-sizing: border-box;
		
		/* Para armonizar el look&feel del borde en los campos de texto */
		border: 1px solid #999;
}

input:focus, textarea:focus {
    /* Para dar un peque�o destaque en elementos activos*/
    border-color: #000;
}

textarea {
    /* Para alinear campos de texto multil�nea con sus labels */
    vertical-align: top;
	
    /* Para dar suficiente espacio para escribir texto */
    height: 5em;
    /* Para permitir a los usuarios cambiar el tama�o de cualquier textarea verticalmente
        No funciona en todos los navegadores */
    resize: vertical;
	border: 1px solid;
}

.button {
    /* Para posicionar los botones a la misma posici�n que los campos de texto */
    padding-left: 90px; /* mismo tama�o a todos los elementos label */
}
button {
    /* Este margen extra representa aproximadamente el mismo espacio que el espacio
       entre los labels y sus campos de texto */
    margin-left: .5em;
	width: 150px;
	height:50px;
}
";


?>