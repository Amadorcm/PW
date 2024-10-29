<?php
  require_once('Usuario.inc.php');
  if(isset($_GET['Enviar'])){
    $nombre=$_GET['NombreUsuario'];
    $psswd=$_GET['Passw'];
    $email=$_GET['email'];
    $sexo=$_GET['Sexo'];
    $dni=$_GET['DNI'];
    if($_GET['Fecha_de_nacimiento']==Null){
      $fecha="0000/00/00";
    }else{
      $fecha=$_GET['Fecha_de_nacimiento'];
    }
    
    $rol="Publico";
    if($_GET['DNI']!=Null){
      Usuario::insertUsuario($nombre, $psswd, $email, $sexo, $dni, $fecha, $rol);
      echo'<script type="text/javascript">
        window.location.href="index.php";
        alert("Usuario registrado satisfacctoriamente");
        </script>';
        exit;
    }else{
      echo'<script type="text/javascript">
        window.location.href="altapublico.php";
        alert("Error al procesar los datos");
        </script>';
        exit;
    }
    exit;
  }else{
    echo'<script type="text/javascript">
        window.location.href="index.php";
        alert("Error al procesar los datos");
        </script>';
  }
?>