<?php
  session_start();
?>
<?php
  require_once('Exposiciones.inc.php');
  //require_once('Usuario.inc.php');
  if(isset($_GET['a_exp'])){
    $titulo=$_GET['Titulo'];
    $tipo=$_GET['Tipo'];
    $texto=$_GET['Texto'];
    $imagen=$_GET['Imagen'];
    $id_exp=$_GET['id_expo'];
    //echo '<br>titulo:'.$titulo.'<br>IMAGEN:'.$imagen.'<br>texto:'.$texto.'<br>id:'.$id_exp.'<br>tipo:'.$tipo;
    Exposiciones::insertExpo($titulo,$imagen,$texto,$id_exp,$tipo);
    //header("Location: index.php");
    echo'<script type="text/javascript">
        window.location.href="index.php";
        alert("Exposicion añadida satisfacctoriamente");
        </script>';
    exit;
    
    
  }elseif(isset($_GET['e_exp'])){
    $titulo=$_GET['Titulo'];
    
      Usuario::deleteExpo($titulo);
      
      //header("Location: index.php");
      echo'<script type="text/javascript">
          window.location.href="index.php";
          alert("Exposicion borrrada satisfacctoriamente");
          </script>';
      exit;
  }elseif(isset($_GET['m_exp_tit'])){
    $titulo=$_GET['Titulo'];
    $titulo_n=$_GET['Titulo_n'];
      Usuario::cambiarTitulo($titulo_n, $titulo);
      
      //header("Location: index.php");
      echo'<script type="text/javascript">
          window.location.href="index.php";
          alert("Titulo Cambiado Satisfacctoriamente");
          </script>';
      exit;
  }elseif(isset($_GET['m_exp_img'])){
    $titulo=$_GET['Titulo'];
    $Image_n=$_GET['Image_n'];
      Usuario::cambiarImg($Image_n, $titulo);
      
      //header("Location: index.php");
      echo'<script type="text/javascript">
          window.location.href="index.php";
          alert("Imagen Cambiado Satisfacctoriamente");
          </script>';
      exit;
  }elseif(isset($_GET['m_exp_tex'])){
    $titulo=$_GET['Titulo'];
    $texto=$_GET['texto'];
      Usuario::cambiarTexto($texto, $titulo);
      
      //header("Location: index.php");
      echo'<script type="text/javascript">
          window.location.href="index.php";
          alert("Texto Cambiado Satisfacctoriamente");
          </script>';
      exit;
  }elseif(isset($_GET['m_exp_tipo'])){
    $titulo=$_GET['Titulo'];
    $tipo=$_GET['tipo'];
      Usuario::cambiarTipo($tipo, $titulo);
      
      //header("Location: index.php");
      echo'<script type="text/javascript">
          window.location.href="index.php";
          alert("Titulo Cambiado Satisfacctoriamente");
          </script>';
      exit;
  }elseif(isset($_GET['a_pieza'])){
    $titulo=$_GET['Titulo'];
    $texto=$_GET['Texto'];
    $imagen=$_GET['Imagen'];
    $id_exp=$_GET['id_expo'];
    echo '<br>titulo:'.$titulo.'<br>IMAGEN:'.$imagen.'<br>texto:'.$texto.'<br>id:'.$id_exp;
    Exposiciones::insertPieza($titulo,$imagen,$texto,$id_exp,);
    //header("Location: index.php");
    echo'<script type="text/javascript">
        window.location.href="index.php";
        alert("Pieza añadida Satisfacctoriamente");
        </script>';
    exit;
  }

?>