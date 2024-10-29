<?php
  session_start();
?>
<!DOCTYPE html>
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
	<!--El documento principal, index.php, contendrá el nombre del centro, su logotipo, su ubicación y contacto, un formulario para que los usuarios registrados entren, un enlace para darse de alta como público y para que un hipotético administrador dé de alta a los comisarios, una zona de últimas noticias. Todo esto en una cabecera. Dispondrá de una zona principal para mostrar las exposiciones actuales. También tendrán un menú que muestre las exposiciones por tipo (por ejemplo, escultura, pintura, fotografía, etc.). Por último, albergará un pie de página con enlaces un documento contacto.html, con los datos del desarrollador, y al fichero pdf con el informe de la práctica como_se_hizo.pdf.-->
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
					require_once('Usuario.inc.php');
						if(!empty($_SESSION['Usuario'])){
							//echo '<h3> '.$_SESSION['ROL'].' </h3>';
							echo '<h2> '.$_SESSION['Usuario'].' </h2><h4> '.$_SESSION['ROL'].' </h4>
								<a class="link-dark" href="logout.php"> Cerrar Sesión </a> <br>';
							if($_SESSION['ROL']=="Administrador"){
								echo '<a class="link-dark" href="administrar.php"> Administrar Página </a>';
								echo '<br><a class="link-dark"  href="http://bahia.ugr.es/~pw15520560/pe2/html/altacomisario.php">Alta Comisario</a>';
							}else if($_SESSION['ROL']=="Comisario"){
								echo '<a class="link-dark" href="modificar_p.php"> Modificar Perfil</a><br>';
								echo '<a class="link-dark" href="administrar.php"> Administrar Página </a>';
								echo '<br><a class="link-dark"  href="http://bahia.ugr.es/~pw15520560/pe2/html/altacomisario.php">Alta Comisario</a>';
							}else{
								echo '<a class="link-dark" href="modificar_p.php"> Modificar Perfil</a>';
							}
						}else{
							echo'<form method="get" name="Registro" action="login.php" onsubmit="return validar()">
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
					<li class="nav-item"><a class="nav-link link-secondary"  href="index.php">Pagina Principal </a></li> 
                    <br>
					<li class="nav-item"><a class="nav-link link-secondary"  href="escultura.php"> Escultura </a></li>
                    <br>
					<li class="nav-item"><a class="nav-link link-secondary"  href="fotografia.php"> Fotografía </a></li>
          
					<li class="nav-item"><a class="nav-link link-secondary"  href="pintura.php"> Pintura </a></li>
				</ul> 
			</nav>
			</header>
	<main>
		<h1 class="text-center">Exposiciones</h1>
		<!-- Permitir que usuarios comisarios puedan crear exposiciones (asignándolas a un tipo de exposición), editarlas (sólo datos básicos, no piezas) y borrarlas (borrando todas las piezas asignadas), así como añadir piezas a las exposiciones.-->
		<div class=text-center>
			<h5>Nueva Expo</h5><br>
			<?php
	          echo'
	          <form class="text-center" action="administrar_script.php" name="nuevaExp" method="get" onsubmit="return ValidarNuevaExpo()">
	              <label for="Titulo">Titulo:</label>
								<input type="text" name="Titulo">
								<br>
								<label for="Imagen">URL Imagen:</label>
								<input type="text" name="Imagen" >
								<br>
								<label for="Texto">Texto:</label>
								<input type="text" name="Texto" >
								<br>
								<label for="id_expo">Id_exposicion:</label>
								<input type="int" name="id_expo" >
								<br>
								<label for="Tipo">Tipo:</label>
									<select name="Tipo">
										<option value = "Pintura">Pintura</option> 
										<option value = "Escultura">Escultura</option> 
										<option value = "Fotografia">Fotografia</option> 
									</select>
									<input type="submit" name="a_exp" value="Anadir_Expo"/>
	          </form>
	          <script type="text/javascript">
										function ValidarNuevaExpo(){
											if (document.nuevaExp.Titulo.value.length==0){
								      		alert("Tiene que escribir el titulo");
								      		return false;
								   		}
								   		if (document.nuevaExp.Imagen.value.length==0){
								      		alert("Tiene que escribir la url de la imagen");
								      		return false;
								   		}
								   		if (document.nuevaExp.Texto.value.length==0){
								      		alert("Tiene que escribir el texto explicativo");
								      		return false;
								   		}
								   	alert("Datos enviados");
							   	}
								</script>
	          ';
	        ?>
	        <br><h5>Editar Expo</h5>
	        <br><h6>Borrar Expo</h6>
	        <?php
	          echo'
	          <form class="text-center" name="borrarExp" action="administrar_script.php" method="get" onsubmit="return ValidarBorrarExp()">
	              <label for="Titulo">Titulo:</label>
								<input type="text" name="Titulo">
	              <input type="submit" name="e_exp" value="Eliminar_Expo"/>
	          </form>
	          <script type="text/javascript">
										function ValidarBorrarExp(){
											if (document.borrarExp.Titulo.value.length==0){
								      		alert("Tiene que escribir el titulo");
								      		return false;
								   		}
								   	alert("Datos enviados");
							   	}
								</script>
	          ';
	        ?>
	        <br><h6>Cambiar Titulo Expo</h6>
	        <?php
	          echo'
	          <form class="text-center" name="cambioTit" action="administrar_script.php" method="get" onsubmit="return ValidarNueTit()">
	              <label for="Titulo">Titulo:</label>
								<input type="text" name="Titulo">
								<br>

	              <label for="Titulo_n">Titulo Nuevo:</label>
								<input type="text" name="Titulo_n">
								<br>

	              <input type="submit" name="m_exp_tit" value="Modificar Nombre Sección"/>
	          </form>
	          <script type="text/javascript">
										function ValidarNueTit(){
											if (document.cambioTit.Titulo.value.length==0){
								      		alert("Tiene que escribir el titulo");
								      		return false;
								   		}
								   		if (document.cambioTit.Titulo_n.value.length==0){
								      		alert("Tiene que escribir la url de la imagen");
								      		return false;
								   		}
								   		
								   	alert("Datos enviados");
							   	}
								</script>
	          ';
	        ?>
					<br><h6>Cambiar imagen Expo</h6>
	        <?php
	          echo'
	          <form class="text-center" name="cambioImg" action="administrar_script.php" method="get" onsubmit="return ValidarNueImg()">
	              <label for="Titulo">Titulo:</label>
								<input type="text" name="Titulo">
								<br>

	              <label for="Imagen_n">URL Imagen Nueva:</label>
								<input type="text" name="Image_n">
								<br>

	              <input type="submit" name="m_exp_img" value="Modificar Nombre Sección"/>
	          </form>
	          <script type="text/javascript">
										function ValidarNueImg(){
											if (document.cambioImg.Titulo.value.length==0){
								      		alert("Tiene que escribir el titulo");
								      		return false;
								   		}
								   		if (document.cambioImg.Image_n.value.length==0){
								      		alert("Tiene que escribir la url de la imagen");
								      		return false;
								   		}
								   		
								   	alert("Datos enviados");
							   	}
								</script>
	          ';
	        ?>
	       <br> <h6>Cambiar texto Expo</h6>
	        <?php
		        echo'
		          <form class="text-center" name="cambioText" action="administrar_script.php" method="get" onsubmit="return ValidarNueText()">

		            <label for="Titulo">Titulo:</label>
								<input type="text" name="Titulo">
								<br>

	              <label for="texto">texto Nuevo:</label>
								<input type="text" name="texto">

		              <input type="submit" name="m_exp_tex" value="Modificar Texto Sección"/>

		          </form>
		          <script type="text/javascript">
										function ValidarNueText(){
											if (document.cambioText.Titulo.value.length==0){
								      		alert("Tiene que escribir el titulo");
								      		return false;
								   		}
								   		if (document.cambioText.texto.value.length==0){
								      		alert("Tiene que escribir la url de la imagen");
								      		return false;
								   		}
								   		
								   	alert("Datos enviados");
							   	}
								</script>
		          ';
					?>
					<br><h6>Cambiar tipo Expo</h6>
					<?php
		        echo'
		          <form class="text-center" action="administrar_script.php" method="get">


	              <label for="Tipo">Tipo Nuevo:</label>
									<select name="Tipo">
										<option value = "Pintura">Pintura</option> 
										<option value = "Escultura">Escultura</option> 
										<option value = "Fotografia">Fotografia</option> 
									</select>

		              <input type="submit" name="m_exp_tipo" value="Modificar Texto Sección"/>

		          </form>
		          ';
					?>
					<h1 class="text-center">Piezas</h1>
					<br><h5>Nueva Pieza</h5>
					<?php
	          echo'
	          <form class="text-center" name="nuevaPie" action="administrar_script.php" method="get" onsubmit="return ValidarNuevaPieza()">
	              <label for="Titulo">Titulo pieza:</label>
								<input type="text" name="Titulo">
								<br>
								<label for="Imagen">URL Imagen:</label>
								<input type="text" name="Imagen" >
								<br>
								<label for="Texto">Texto:</label>
								<input type="text" name="Texto" >
								<br>
								<label for="id_expo">Id de la exposicion a la que pertenece:</label>
								<input type="int" name="id_expo" >
								<br>
								<input type="submit" name="a_pieza" value="Anadir_pieza"/>
	          </form>
	          <script type="text/javascript">
										function ValidarNuevaPieza(){
											if (document.nuevaPie.Titulo.value.length==0){
								      		alert("Tiene que escribir el titulo");
								      		return false;
								   		}
								   		if (document.nuevaPie.Imagen.value.length==0){
								      		alert("Tiene que escribir la url de la imagen");
								      		return false;
								   		}
								   		if (document.nuevaPie.Texto.value.length==0){
								      		alert("Tiene que escribir el texto explicativo");
								      		return false;
								   		}
								   		if (document.nuevaPie.id_expo.value.length<=0){
								      		alert("Tiene que añadir el numero de la exposicion a la que pertenece");
								      		return false;
								   		}
								   	alert("Datos enviados");
							   	}
								</script>
	          ';
	        ?>
        </div>

		
	</main>
	<footer class="mt-5 p-4 bg-dark text-white text-center">
			<a class="link-secondary" href="contacto.php">Contacto</a>
			<a class="link-secondary" href="como_se_hizo.pdf">Como se hizo</a>	
	</footer>
</body>
</html>