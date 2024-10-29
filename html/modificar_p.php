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
		<?php
					require_once('Usuario.inc.php');
						if(!empty($_SESSION['Usuario'])){
							echo '<div class="text-center"><h1>Datos</h1>Usuario: '.$_SESSION['Usuario'].'<br>
							 Rol: '.$_SESSION['ROL'].' <br>';
							echo 'Email: '.Usuario::getEmail($_SESSION['DNI']);
							echo '<br>Fecha de Nacimiento: '.Usuario::getFecha($_SESSION['DNI']);
							echo '<br>Sexo: '.Usuario::getSexo($_SESSION['DNI']).'</div>';
							echo '<h1 class="text-center">Cambiar Datos:</h1>
								<form class="text-center" name="cambioNombre" method="get" action="modificar_p_script.php" onsubmit="return validarCamNombre()">
								<label for="NombreNuevo">Nombre Usuario Nuevo:</label>
								<input type="text" name="NombreNuevo" placeholder = "Xxxxxx" >
								<br>
								<input type = "submit" id = "button1" name="EnviarN" value ="Cambiar Nombre" /> 
								</form>
								<script type="text/javascript">
										function validarCamNombre(){
											if (document.cambioNombre.NombreNuevo.value.length==0){
								      		alert("Tiene que escribir su nuevo nombre")
								      		
								      		return false;
								   		}
								   	alert("Datos enviados");
								   	
							   	}
								</script>';
							echo '<form class="text-center" name="cambioContra" method="get" action="modificar_p_script.php" onsubmit="return validarCamContraseña()">
								<label for="contraNueva">Contraseña Nueva:</label>
								<input type="text" name="contraNueva" placeholder = "Xxxxxx" >
								<br>
								<input type = "submit" id = "button1" name="EnviarP" value = "Cambiar Contraseña" /> 
								</form>
								<script type="text/javascript">
										function validarCamContraseña(){
											if (document.cambioContra.contraNueva.value.length==0){
								      		alert("Tiene que escribir su nueva contraseña")
								      		
								      		return false;
								   		}
								   	alert("Datos enviados");
								   	
							   	}
								</script>';
							echo '<form class="text-center" name="cambioDNI" method="get" action="modificar_p_script.php" onsubmit="return validarCamDNI()">
								<label for="DNInuevo">DNI Nuevo:</label>
								<input type="text" name="DNInuevo" placeholder = "Xxxxxx" >
								<br>
								<input type = "submit" id = "button1" name="EnviarDNI" value = "Cambiar DNI" /> 
								</form>
								<script type="text/javascript">
										function validarCamDNI(){
											if (document.cambioDNI.DNInuevo.value.length==0){
								      		alert("Tiene que escribir su nuevo DNI")
								      		
								      		return false;
								   		}else if(document.cambioDNI.DNInuevo.value.length>=10){
								   				alert("El DNI no puede contener mas de 10 caracteres")
								      		
								      		return false;
								   		}
								   		alert("Datos enviados")
								   		
								   	
							   	}
								</script>';
							echo '<form class="text-center" name="cambioEmail" method="get" action="modificar_p_script.php" onsubmit="return validarCamEmail()">
								<label for="emailNuevo">email nuevo:</label>
								<input type="text" name="emailNuevo" placeholder = "xxxxxx@xxxx.com" >
								<br>
								<input type = "submit" id = "button1" name="EnviarE" value = "Cambiar Email" /> 
								</form>
								<script type="text/javascript">
										function validarCamEmail(){
											if (document.cambioEmail.emailNuevo.value.length==0){
								      		alert("Tiene que escribir su nuevo email")
								      		
								      		return false;
								   		}if(!validarEmail(document.altapublico.email.value)){
								   				alert("Tiene que escribir bien su email");
								      		return false;
								   		}
								   	alert("Datos enviados");
								   	
							   	}
							   	function validarEmail(email){
							   		return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
							   	}
								</script>';
							echo '<form class="text-center" name="cambioFecha" method="get" action="modificar_p_script.php" onsubmit="return validarCamFecha()">
								<label for="Fecha de nacimiento N">Fecha de nacimiento nueva:</label>
								<input type = "datetime" id = "Fecha de nacimiento N"  name="Fecha_de_nacimiento_N" placeholder = "0000/00/00" />
								<br>
								<input type = "submit" id = "button1" name="EnviarF" value = "Cambiar Fecha de Nacimiento" /> 
								</form>
								<script type="text/javascript">
										function validarCamFecha(){
											if (document.cambioFecha.Fecha_de_nacimiento_N.value.length==0){
								      		alert("Tiene que escribir la nueva fecha")
								      		
								      		return false;
								   		}
								   	alert("Datos enviados");
								   	
							   	}
								</script>';	
							echo '<form class="text-center" name="cambioSexo" method="get" action="modificar_p_script.php" onsubmit=" return validarCamSexo()">
								<label for="Sexo">Sexo Nuevo:</label>
								<select name="Sexo_N">
									<option value = "Masculino">Masculino</option> 
									<option value = "Femenino">Femenino</option> 
									<option value = "Otro">Otro</option> 
								</select>
								<br>
								<input type = "submit" id = "button1" name="EnviarS" value = "Cambiar Sexo" /> 
								</form>
								<script type="text/javascript">
									//aqui en realidad no es necesario
								   	alert("Datos enviados");
								   	
							   	}
								</script>';	
							echo '<form class="text-center" method="get" action="modificar_p_script.php">
								<br>
								<input type = "submit" id = "button1" name="BorrarPerfil" value = "Borrar Perfil"/> 
								</form>';	
						}else{
							echo'<a class="link-dark text-center"  href="http://bahia.ugr.es/~pw15520560/pe2/html/altapublico.php">Registrar Usuario </a>';
						}
					?>
		
	</main>
	<footer class="mt-5 p-4 bg-dark text-white text-center">
			<a class="link-secondary" href="contacto.php">Contacto</a>
			<a class="link-secondary" href="como_se_hizo.pdf">Como se hizo</a>	
	</footer>
</body>
</html>