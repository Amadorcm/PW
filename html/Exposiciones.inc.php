<?php
require_once 'connection.php';
class Exposiciones extends Connection{
	protected $usuario = array(
        "titulo" => "",
        "img" => "",
        "tipo" => "",
        "texto" => "",
        "id" => "");
	public function __construct()
    {}
    public static function insertExpo($titulo, $img, $texto, $id, $tipo)
    {
    	// echo '<br>titulo:'.$titulo.'<br>IMAGEN:'.$imagen.'<br>texto:'.$texto.'<br>id:'.$id_exp.'<br>tipo:'.$tipo;

        $conexion = parent::conectar();
        $sql = "INSERT INTO Expos  VALUES (:titulo, :img, :texto, :id, :tipo)";
        
        try {
            $st = $conexion->prepare($sql);

            $st->bindValue(":titulo", $titulo, PDO::PARAM_STR);
            $st->bindValue(":img", $img, PDO::PARAM_STR);
            $st->bindValue(":texto", $texto, PDO::PARAM_STR);
            $st->bindValue(":id", $id, PDO::PARAM_INT);
            $st->bindValue(":tipo", $tipo, PDO::PARAM_STR);
            

            $result = $st->execute();

            parent::desconectar($conexion);
            return $result;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: " . $e->getMessage());
        }
    }
    public static function insertPieza($titulo, $img, $texto, $id_expo)
    {
        $conexion = parent::conectar();
        $sql = "INSERT INTO Piezas VALUES (:titulo, :img, :texto, :id_expo)";
        echo '<br>titulo:'.$titulo.'<br>IMAGEN:'.$img.'<br>texto:'.$texto.'<br>id:'.$id_expo;
        try {
            $st = $conexion->prepare($sql);

            $st->bindValue(":titulo", $titulo, PDO::PARAM_STR);
            $st->bindValue(":img", $img, PDO::PARAM_STR);            
            $st->bindValue(":texto", $texto, PDO::PARAM_STR);
            $st->bindValue(":id_expo", $id_expo, PDO::PARAM_STR);
            

            $result = $st->execute();

            parent::desconectar($conexion);
            return $result;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: " . $e->getMessage());
        }
    }
    public static function deleteExpo($titulo)
    {
        $conexion = parent::conectar();
        $sql = "DELETE FROM  Expos  WHERE titulo = :titulo";

        try {
            $st = $conexion->prepare($sql);

            $st->bindValue(":titulo", $titulo, PDO::PARAM_INT);

            $result = $st->execute();

            parent::desconectar($conexion);
            return $result;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: " . $e->getMessage());
        }
    }
    public static function cambiarTitulo($titulo_n, $titulo){
        $conexion = parent::conectar();
        //Insert Into Comentarios (usuario,comentario)values("Amador", "Esta exposicion me ha gustado mucho");
        $sql ="UPDATE Expos SET nombre=:titulo_n where nombre=:titulo";

        try {
            $st = $conexion->prepare($sql);
            //echo $Usuario;
            $st->bindValue(":titulo_n", $titulo_n, PDO::PARAM_STR);
            $st->bindValue(":titulo", $titulo, PDO::PARAM_STR);
            

            $result = $st->execute();
            //echo $Usuario,$Comentario;
            parent::desconectar($conexion);
            //return $result;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: " . $e->getMessage());
        }
    }
    public static function cambiarImg($img, $titulo){
        $conexion = parent::conectar();
        //Insert Into Comentarios (usuario,comentario)values("Amador", "Esta exposicion me ha gustado mucho");
        $sql ="UPDATE Expos SET LinkImagen=:img where nombre=:titulo";

        try {
            $st = $conexion->prepare($sql);
            //echo $Usuario;
            $st->bindValue(":img", $img, PDO::PARAM_STR);
            $st->bindValue(":titulo", $titulo, PDO::PARAM_STR);
            

            $result = $st->execute();
            //echo $Usuario,$Comentario;
            parent::desconectar($conexion);
            //return $result;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: " . $e->getMessage());
        }
    }
    public static function cambiarTexto($texto, $titulo){
        $conexion = parent::conectar();
        //Insert Into Comentarios (usuario,comentario)values("Amador", "Esta exposicion me ha gustado mucho");
        $sql ="UPDATE Expos SET texto=:texto where nombre=:titulo";

        try {
            $st = $conexion->prepare($sql);
            //echo $Usuario;
            $st->bindValue(":texto", $texto, PDO::PARAM_STR);
            $st->bindValue(":titulo", $titulo, PDO::PARAM_STR);
            

            $result = $st->execute();
            //echo $Usuario,$Comentario;
            parent::desconectar($conexion);
            //return $result;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: " . $e->getMessage());
        }
    }
    public static function cambiarTipo($tipo, $titulo){
        $conexion = parent::conectar();
        //Insert Into Comentarios (usuario,comentario)values("Amador", "Esta exposicion me ha gustado mucho");
        $sql ="UPDATE Expos SET tipo=:tipo where nombre=:titulo";

        try {
            $st = $conexion->prepare($sql);
            //echo $Usuario;
            $st->bindValue(":tipo", $tipo, PDO::PARAM_STR);
            $st->bindValue(":titulo", $titulo, PDO::PARAM_STR);
            

            $result = $st->execute();
            //echo $Usuario,$Comentario;
            parent::desconectar($conexion);
            //return $result;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: " . $e->getMessage());
        }
    }

    public static function obtenerExposicion($id){//esto iria para Expo(id).php
      $consulta1="SELECT * FROM Expos WHERE id_expo=$id";
      $consulta2="SELECT * FROM Piezas";
      $conexion=parent::conectar();
      $resultados1=$conexion->query($consulta1);
      $resultados2=$conexion->query($consulta2);
      foreach($resultados1 as $fila){
        echo '<h1 class="text-center">'.$fila["nombre"].'</h1>
			<div class="row">
				<img class="col-sm-4 img-fluid"src="'.$fila["LinkImagen"].'" width="400" height="300">
				<p class="col-sm-8">'.$fila["texto"].'</p>
			</div class="row">
			<br>
			<br> 
			<div class="row">
				<section class="col-sm">
					<div class="row"> ';//imprimo la informacion de la exposicion estructurada con bootstrap
        foreach($resultados2 as $fila2){
        	if($fila2["id_expo"]==$id){
        		echo ' <article class="col-sm-4">
							<a class="link-secondary" href="http://bahia.ugr.es/~pw15520560/pe2/html/exposiciones/pieza1expo1.php">
								<img class="img-fluid" src="'.$fila2["LinkImagen"].'">
								<h3>'.$fila2["nombre"].'</h3>
							</a>
						</article> ';//imprimo las piezas estructurandolas con bootstrap
        	}
      	}
      }
      
      parent::desconectar($conexion);
    }
    public static function obtenerExpos(){
      $consulta="SELECT * FROM Expos";
      $conexion=parent::conectar();
      $resultados=$conexion->query($consulta);
      echo'';
      foreach($resultados as $fila){
        echo '
        
				<article class="col-sm-6">
					<a class="link-secondary" href="http://bahia.ugr.es/~pw15520560/pe2/html/exposiciones/expo1.php">
						<img class="img-fluid" src="'.$fila["LinkImagen"].'">
						<h3>'.$fila["nombre"].'</h3>
					</a>
					<p>'.$fila["tipo"].'</p>
				</article>
		
        ';
      }
      echo'';
      
      parent::desconectar($conexion);
    }
}