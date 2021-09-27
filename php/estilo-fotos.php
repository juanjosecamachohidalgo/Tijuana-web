<?php 
header('content-type:text/css');
echo "
	body {
    background: #444;
    margin: 0;
    font-family:  Montserrat, sans-serif;
}

h1 {
    color: #fff;
    text-align: center;
}

/*Estilos de la galeria*/

.galeria {
    width: 90%;
    margin: auto;
    list-style: none;
    padding: 20px;
    box-sizing: border-box;
    
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.galeria li {
    margin: 5px;
}

.galeria img {
    width: 150px;
    height: 100px;
}

/*Estilos del modal*/

.modal {
    display: none;
}
.modal button{
	width: 200px;
	height: 50px;
}
		
.modal:target {
    
    display: block;
    position: fixed;
    background: rgba(0,0,0,0.8);
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.modal h3 {
    color: #fff;
    font-size: 30px;
    text-align: center;
    margin: 15px 0;
}

.imagen {
    width: 100%;
    height: 50%;
    
    display: flex;
    justify-content: center;
    align-items: center;
}

.imagen a {
    color: #fff;
    font-size: 40px;
    text-decoration: none;
    margin: 0 10px;
}

.imagen a:nth-child(2) {
    margin: 0;
    height: 100%;
    flex-shrink: 2;
}

.imagen img {
    width: 500px;
    height: 100%;
    max-width: 100%;
    border: 7px solid #fff;
    box-sizing: border-box;
}

.cerrar {
    display: block;
    background: #fff;
    width: 25px;
    height: 25px;
    margin: 15px auto;
    text-align: center;
    text-decoration: none;
    font-size: 25px;
    color: #000;
    padding: 5px;
    border-radius: 50%;
    line-height: 25px;
}	
";


?>