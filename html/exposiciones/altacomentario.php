<?php
require_once('../Usuario.inc.php');
session_start();
  if(isset($_GET['Enviar'])){
    $Comentario=$_GET['Comentario'];
    $Us=$_SESSION['Usuario'];
    $seccion="Publico";
    Usuario::insertComentario($Us, $Comentario, $seccion);
    
    //header("Location: index.php");
    echo'<script type="text/javascript">
        window.location.href="../index.php";
        alert("Comentario añadido satisfacctoriamente");
        </script>';
    exit;
  }else{
    echo'<script type="text/javascript">
        window.location.href="index.php";
        alert("Error al procesar los datos");
        </script>';
  }

?>