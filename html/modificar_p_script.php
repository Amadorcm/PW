<?php
  session_start();
?>
<?php
  require_once('Usuario.inc.php');
  if(isset($_GET['EnviarN'])){
    if($_GET['NombreNuevo']!=null){
      $nombre=$_GET['NombreNuevo'];
    
      Usuario::CambiarNombre($nombre);
      $_SESSION['Usuario']=$_GET['NombreNuevo'];
      //header("Location: index.php");
      echo'<script type="text/javascript">
          window.location.href="index.php";
          alert("Nombre Cambiado Satisfacctoriamente");
          </script>';
      exit;
    }
    
  }elseif(isset($_GET['EnviarP'])) {
    if($_GET['contraNueva']!=null){
      $passwd=$_GET['contraNueva'];
    
      Usuario::CambiarContra($passwd);
      
      //header("Location: index.php");
      echo'<script type="text/javascript">
          window.location.href="index.php";
          alert("Contraseña Cambiado Satisfacctoriamente");
          </script>';
      exit;
    }
    
  }elseif(isset($_GET['EnviarDNI'])){
    if($_GET['DNInuevo']!=null){
      $dni=$_GET['DNInuevo'];
    
      Usuario::cambiarDNI($dni);
      //header("Location: index.php");
      echo'<script type="text/javascript">
          window.location.href="index.php"
          </script>';
      exit;
    }elseif(strlen($_GET['EnviarDNI'])>9){
      echo'<script type="text/javascript">
      window.location.href="modificar_p.php"
      </script>';
    }
    
  }elseif(isset($_GET['EnviarE'])){
    if($_GET['emailNuevo']!=null){
      $email=$_GET['emailNuevo'];
    
      Usuario::cambiarEmail($email);
      
      //header("Location: index.php");
      echo'<script type="text/javascript">
          window.location.href="index.php";
          alert("Email Cambiado Satisfacctoriamente");
          </script>';
      exit;
    }
    
  }elseif(isset($_GET['EnviarF'])){
    if($_GET['Fecha_de_nacimiento_N']!=null){
      $fecha=$_GET['Fecha_de_nacimiento_N'];
    
      Usuario::cambiarFecha($fecha);
      
      //header("Location: index.php");
      echo'<script type="text/javascript">
          window.location.href="index.php";
          alert("FEcha Cambiada Satisfacctoriamente");
          </script>';
      exit;
    }
    
  }elseif(isset($_GET['EnviarS'])){
    if($_GET['Sexo_N']!=null){
      $sexo=$_GET['Sexo_N'];
    
      Usuario::cambiarSexo($sexo);
      
      //header("Location: index.php");
      echo'<script type="text/javascript">
          window.location.href="index.php";
          alert("Sexo Cambiado Satisfacctoriamente");
          </script>';
      exit;
    }
    
  }elseif(isset($_GET['BorrarPerfil'])){

    Usuario::deleteUsuario($_SESSION['DNI']);

    
    //header("Location: index.php");
    echo'<script type="text/javascript">
        window.location.href="index.php";
        alert("Usuario Eliminado");
        </script>';
    exit;
  }else{
    echo'<script type="text/javascript">
        window.location.href="index.php";
        alert("Error al procesar los datos");
        </script>';
  }
?>