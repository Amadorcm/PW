<?php
	session_start();
	require_once'Usuario.inc.php';

	if(isset($_GET['Enviar'])){

		//echo 'usuario :'.$_GET['NombreUsuario'];
		$nombre=$_GET['NombreUsuario'];
		$contra= $_GET['Passw'];

		$validado=Usuario::login($nombre,$contra);

	  	if($validado){
	    	$_SESSION['Usuario']=$_GET['NombreUsuario'];
	    	$_SESSION['DNI']=Usuario::getDNI($_GET['NombreUsuario'],$_GET['Passw']);
	    	$_SESSION['ROL']=Usuario::getRol($_SESSION['DNI']);
	    	//echo $_SESSION['ROL'];
	    	//echo $_SESSION['DNI'];
	    	header("Location: index.php");
	    	//exit;
	  	}else{
	  		echo'<script type="text/javascript">
				window.location.href="index.php";
				alert("Contraseña o usuario incorrecto");
    		</script>';
	    	header("Location: index.php");
	    	//exit;
	  	}
	}else{
		echo'<script type="text/javascript">
				window.location.href="index.php";
				alert("Error al procesar los datos");
    		</script>';
	}
  
?>