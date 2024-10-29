<?php
  session_start();
?>
<!doctype html>
<html>
	<head>
		<META CHARSET="UTF-8">
		<!--<BASE HREF=""> Referencia todos los enlaces sin url a este enlace-->
		<TITLE>Exposiciones Amador Carmona </TITLE> 
		<META NAME="AUTHOR" CONTENT="Amador Carmona Méndez">
		<META NAME="DESCRIPTION" CONTENT="Practica 1 evaluable">
		
		<link rel = "stylesheet" type = "text/css" href = "http://bahia.ugr.es/~pw15520560/pe2/css/estilo1.css" />

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- Option 1: Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	</head>
	<!--El documento principal, index.php, contendrá el nombre del centro, su logotipo, su ubicación y contacto, un formulario para que los usuarios registrados entren, un enlace para darse de alta como público y para que un hipotético administrador dé de alta a los comisarios, una zona de últimas noticias. Todo esto en una cabecera. Dispondrá de una zona principal para mostrar las exposiciones actuales. También tendrán un menú que muestre las exposiciones por tipo (por ejemplo, escultura, pintura, fotografía, etc.). Por último, albergará un pie de página con enlaces un documento contacto.php, con los datos del desarrollador, y al fichero pdf con el informe de la práctica como_se_hizo.pdf.-->
	<body class="bg-secondary bg-opacity-10">
		<header class="bg-dark bg-opacity-10 text-secondary">
			<div class="row">

				<section class="col-sm-4">
					<img src="http://bahia.ugr.es/~pw15520560/pe2/imagenes/logo.png" class="sm-auto" width="300" height="200">
				</section>

				<section class="p-5 col-sm-4">
					<h1> Exposiciones Amador</h1>
				</section>

				<section  class="p-5 col-sm-4">
					<?php
					require_once('../Usuario.inc.php');
						if(!empty($_SESSION['Usuario'])){
							//echo '<h3> '.$_SESSION['ROL'].' </h3>';
							echo '<h2> '.$_SESSION['Usuario'].' </h2><h4> '.$_SESSION['ROL'].' </h4>
								<a class="link-dark" href="logout.php"> Cerrar Sesión </a> <br>';
							if($_SESSION['ROL']=="Administrador"){
								echo '<a class="link-dark" href="../administrar.php"> Administrar Página </a>';
								echo '<br><a class="link-dark"  href="http://bahia.ugr.es/~pw15520560/pe2/html/altacomisario.php">Alta Comisario</a>';
							}else if($_SESSION['ROL']=="Comisario"){
								echo '<a class="link-dark" href="../modificar_p.php"> Modificar Perfil</a><br>';
								echo '<a class="link-dark" href="../administrar.php"> Administrar Página </a>';
								echo '<br><a class="link-dark"  href="http://bahia.ugr.es/~pw15520560/pe2/html/altacomisario.php">Alta Comisario</a>';
							}else{
								echo '<a class="link-dark" href="modificar_p.php"> Modificar Perfil</a>';
							}
						}else{
							echo'<form method="get" name="Registro" action="../login.php" onsubmit="return validar()">
									<label for="NombreUsuario" id="NombreUsuario">Nombre Usuario:</label>
									<input type="text" name="NombreUsuario">
									<br>
									<label for="Passw" id="Passw">Contraseña:</label>
									<input type="password" name="Passw">	
									<br>
									<br>
									<input type="submit" name="Enviar" />
								</form>
								<a class="link-dark"  href="http://bahia.ugr.es/~pw15520560/pe2/html/altapublico.php">Registrarse como Publico</a>
								<script type="text/javascript">
										function validar(){
											if (document.Registro.NombreUsuario.value.length==0){
								      		alert("Tiene que escribir su nombre");
								      		return false;
								   		}
								   		if (document.Registro.Passw.value.length==0){
								      		alert("Tiene que escribir su contraseña");
								      		return false;
								   		}
								   	alert("Datos enviados");
							   	}
								</script>';
						}
					?>
				</section>
			</div>
			<nav class="navbar navbar-expand-sm bg-light justify-content-center border">
				<ul class="navbar-nav">
					<li class="nav-item"><a class="nav-link link-secondary"  href="http://bahia.ugr.es/~pw15520560/pe2/html/index.php">Pagina Principal </a></li> 
                    <br>
					<li class="nav-item"><a class="nav-link link-secondary"  href="http://bahia.ugr.es/~pw15520560/pe2/html/escultura.php"> Escultura </a></li>
                    <br>
					<li class="nav-item"><a class="nav-link link-secondary"  href="http://bahia.ugr.es/~pw15520560/pe2/html/fotografia.php"> Fotografía </a></li>
          
					<li class="nav-item"><a class="nav-link link-secondary"  href="http://bahia.ugr.es/~pw15520560/pe2/html/pintura.php"> Pintura </a></li>
				</ul> 
			</nav>
			</header>
		<main>
			<h1 class="text-center">Pintura Modernista</h1>
			<div class="row">
				<img class="col-sm-4 img-fluid"src="http://bahia.ugr.es/~pw15520560/pe2/imagenes/exp2.0.jpeg" width="400" height="300">
				<p class="col-sm-8"> Modernismo, o en francés Art nouveau, es el término con el que se designa a una corriente de renovación artística desarrollada a finales del siglo xix y principios del xx, durante el periodo denominado fin de siècle y belle époque. En distintos países recibió diversas denominaciones: Art nouveau en Bélgica y Francia, Modernismo en España e Hispanoamérica, Jugendstil o Art nouveau en Alemania y países nórdicos, Sezession en Austria, Art nouveau o Modern Style en los países anglosajones, Art nouveau o Nieuwe Kunst en Países Bajos, y Art nouveau o Style Liberty en Italia.</p>
			</div>		
			</div class="row">
			<br>
			<br>
			<div class="row">
				<section class="col-sm">
					<div class="row">
						<article class="col-sm-4">
							<a class="link-secondary" href="http://bahia.ugr.es/~pw15520560/pe2/html/exposiciones/pieza1expo2.php">
								<img class="img-fluid" src="http://bahia.ugr.es/~pw15520560/pe2/imagenes/exp2.1.jpeg">
								<h3>Pieza 1: Cuadro El Beso</h3>
							</a>
							<p>Autor Benulli</p>
						</article>
						<article class="col-sm-4">
							<a class="link-secondary" href="http://bahia.ugr.es/~pw15520560/pe2/html/exposiciones/pieza1expo2.php">
								<img class="img-fluid" src="http://bahia.ugr.es/~pw15520560/pe2/imagenes/exp2.1.jpeg">
								<h3>Pieza 1: Cuadro El Beso</h3>
							</a>
							<p>Autor Vang hiegen</p>
						</article>
						<article class="col-sm-4">
							<a class="link-secondary" href="http://bahia.ugr.es/~pw15520560/pe2/html/exposiciones/pieza1expo2.php">
								<img class="img-fluid" src="http://bahia.ugr.es/~pw15520560/pe2/imagenes/exp2.1.jpeg">
								<h3>Pieza 1: Cuadro El Beso</h3>
							</a>
							<p>Autor Benulli</p>
						</article>
						<article class="col-sm-4">
							<a class="link-secondary" href="http://bahia.ugr.es/~pw15520560/pe2/html/exposiciones/pieza1expo2.php">
								<img class="img-fluid" src="http://bahia.ugr.es/~pw15520560/pe2/imagenes/exp2.1.jpeg">
								<h3>Pieza 1: Cuadro El Beso</h3>
							</a>
							<p>Autor Vang hiegen</p>
						</article>
						<article class="col-sm-4">
							<a class="link-secondary" href="http://bahia.ugr.es/~pw15520560/pe2/html/exposiciones/pieza1expo2.php">
								<img class="img-fluid" src="http://bahia.ugr.es/~pw15520560/pe2/imagenes/exp2.1.jpeg">
								<h3>Pieza 1: Cuadro El Beso</h3>
							</a>
							<p>Autor Benulli</p>
						</article>
						<article class="col-sm-4">
							<a class="link-secondary" href="http://bahia.ugr.es/~pw15520560/pe2/html/exposiciones/pieza1expo2.php">
								<img class="img-fluid" src="http://bahia.ugr.es/~pw15520560/pe2/imagenes/exp2.1.jpeg">
								<h3>Pieza 1: Cuadro El Beso</h3>
							</a>
							<p>Autor Veng hiegen</p>
						</article>
					</div>
				</section>
		</div>
		<?php
		require_once('../Usuario.inc.php');
		if(!empty($_SESSION['Usuario'])){
		echo'<form method="get" name="comentario" action="altacomentario.php" onsubmit=" return validarComentario()">
			<div class="mb-3">
			  	<label for="Comentario" class="form-label">Comentario: </label>
			  	<textarea class="form-control" name="Comentario" rows="3"></textarea>
			  	<input type="submit" name="Enviar" >
			</div>

			</form>
			<script type="text/javascript">
										function validarComentario(){
											if (document.comentario.Comentario.value.length==0){
								      		alert("Tiene que escribir el comentario")
								      		return false;
								   		}
								   		
								   	alert("Datos enviados");
								   	
							   	}
				</script>';
			
		}
		echo'<h2 class="text-center">Comentarios:</h2><br>';
		echo '<div class="row>';
		Usuario::obtenerComentarios();
		echo '</div>';


		?>
		</main>
		<footer class="mt-5 p-4 bg-dark text-white text-center">
			<a class="link-secondary" href="http://bahia.ugr.es/~pw15520560/pe2/html/contacto.php">Contacto</a>
			<a class="link-secondary" href="http://bahia.ugr.es/~pw15520560/pe2/html/como_se_hizo.pdf">Como se hizo</a>	
		</footer>
	</body>

</html>