<?php
require_once 'connection.php';
class Usuario extends Connection
{
    protected $usuario = array(
        "nombre" => "",
        "contraseña" => "",
        "email" => "",
        "sexo" => "",
        "dni" => "",
        "nacimiento" => "",
    	"rol" => "");

    public function __construct()
    {}

    public static function getUsuarios()
    {
        $conexion = parent::conectar();
        $sql = "SELECT * FROM " . Usuarios;
        try {
            $st = $conexion->prepare($sql);
            $st->execute();
            $usuarios = $st->fetchAll();
            parent::desconectar($conexion);
            return $usuarios;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: " . $e->getMessage());
        }
    }

    public static function getUsuario($dni)
    {
        $conexion = parent::conectar();
        $sql = "SELECT * FROM " . Usuarios . " WHERE dni = :dni";
        try {
            $st = $conexion->prepare($sql);
            $st->bindValue(":dni", $dni, PDO::PARAM_INT);
            $st->execute();
            $usuario = $st->fetchAll();
            parent::desconectar($conexion);
            return $usuario;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: " . $e->getMessage());
        }
    }

    public static function insertUsuario($nombre, $passwd, $email, $sexo, $dni, $fecha, $rol)
    {
        $conexion = parent::conectar();
        $sql = "INSERT INTO Usuarios  VALUES (:nombre, :passwd, :email, :sexo, :dni, :f_nacimiento, :rol)";
        echo '_________________________2<br>';
        echo $nombre;
        try {
            $st = $conexion->prepare($sql);

            $st->bindValue(":nombre", $nombre, PDO::PARAM_STR);
            $st->bindValue(":passwd", $passwd, PDO::PARAM_STR);
            $st->bindValue(":email", $email, PDO::PARAM_STR);
            $st->bindValue(":sexo", $sexo, PDO::PARAM_STR);
            $st->bindValue(":dni", $dni, PDO::PARAM_STR);
            $st->bindValue(":f_nacimiento", $fecha, PDO::PARAM_STR);
            $st->bindValue(":rol", $rol, PDO::PARAM_STR);

            $result = $st->execute();

            parent::desconectar($conexion);
            return $result;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: " . $e->getMessage());
        }
    }

    public static function deleteUsuario($dni)
    {
        $conexion = parent::conectar();
        $sql = "DELETE FROM  Usuarios  WHERE dni = :dni";

        try {
            $st = $conexion->prepare($sql);

            $st->bindValue(":dni", $dni, PDO::PARAM_INT);

            $result = $st->execute();

            parent::desconectar($conexion);
            return $result;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: " . $e->getMessage());
        }
    }
    public static function login($NombreUsuario, $Passw) {
      $conexion=parent::conectar();
      $sql="SELECT * FROM Usuarios WHERE nombre=:nombre AND passwd=:passwd";

      try{
        $sentencia=$conexion->prepare($sql);

        $sentencia->bindValue(":nombre", $NombreUsuario, PDO::PARAM_STR);
        $sentencia->bindValue(":passwd",  $Passw, PDO::PARAM_STR);
        $sentencia->execute();

        $filas=$sentencia->rowCount();
        echo $filas;
        if($filas==1){ // Solo un usuario
          parent::desconectar($conexion);
          return true;
        }else{
          parent::desconectar($conexion);
          return false;
        }
      }catch(PDOException $e){
        parent::desconectar($conexion);
        die("Petición fallida: ".$e->getMessage());
      }
    }
    public static function getDNI($NombreUsuario, $Passw) {
      $conexion=parent::conectar();
      $sql="SELECT dni FROM Usuarios WHERE nombre=:nombre AND passwd=:passwd";

      try{
        $sentencia=$conexion->prepare($sql);

        $sentencia->bindValue(":nombre", $NombreUsuario, PDO::PARAM_STR);
        $sentencia->bindValue(":passwd",  $Passw, PDO::PARAM_STR);
        $sentencia->execute();
        $dni=$sentencia->fetchAll();
        //echo'---------------------------<br> '.count($dni[0]);
        $vari=$dni[0];
        //echo$vari[0];
        //echo'<br>';
        //echo$vari[0];
        //echo $dni[dni];
        parent::desconectar($conexion);
        return $vari[0];
        
      }catch(PDOException $e){
        parent::desconectar($conexion);
        die("Petición fallida: ".$e->getMessage());
      }
    }
    public static function getRol($DNI){
      $conexion=parent::conectar();
      $sql="SELECT rol FROM Usuarios WHERE dni=:dni";

      try{
        $sentencia=$conexion->prepare($sql);

        $sentencia->bindValue(":dni", $DNI, PDO::PARAM_STR);
        $sentencia->execute();
        $vari=$sentencia->fetchAll();
        //echo count($vari);
        //print_r($vari);
        //echo'<br>';
        $rol=$vari[0];
        //print_r($rol);
         //echo $rol[0];
        parent::desconectar($conexion);
        return $rol[0];
        
      }catch(PDOException $e){
        parent::desconectar($conexion);
        die("Petición fallida: ".$e->getMessage());
      }
    }
    public static function getEmail($DNI){
      $conexion=parent::conectar();
      $sql="SELECT email FROM Usuarios WHERE dni=:dni";

      try{
        $sentencia=$conexion->prepare($sql);

        $sentencia->bindValue(":dni", $DNI, PDO::PARAM_STR);
        $sentencia->execute();
        $vari=$sentencia->fetchAll();
        //echo count($vari);
        //print_r($vari);
        //echo'<br>';
        $email=$vari[0];
        //print_r($email);
         //echo $email[0];
        parent::desconectar($conexion);
        return $email[0];
        
      }catch(PDOException $e){
        parent::desconectar($conexion);
        die("Petición fallida: ".$e->getMessage());
      }
    }
    public static function getFecha($DNI){
      $conexion=parent::conectar();
      $sql="SELECT f_nacimiento FROM Usuarios WHERE dni=:dni";

      try{
        $sentencia=$conexion->prepare($sql);

        $sentencia->bindValue(":dni", $DNI, PDO::PARAM_STR);
        $sentencia->execute();
        $vari=$sentencia->fetchAll();
        //echo count($vari);
        //print_r($vari);
        //echo'<br>';
        $rol=$vari[0];
        //print_r($rol);
         //echo $rol[0];
        parent::desconectar($conexion);
        return $rol[0];
        
      }catch(PDOException $e){
        parent::desconectar($conexion);
        die("Petición fallida: ".$e->getMessage());
      }
    }
    public static function getSexo($DNI){
      $conexion=parent::conectar();
      $sql="SELECT sexo FROM Usuarios WHERE dni=:dni";

      try{
        $sentencia=$conexion->prepare($sql);

        $sentencia->bindValue(":dni", $DNI, PDO::PARAM_STR);
        $sentencia->execute();
        $vari=$sentencia->fetchAll();
        //echo count($vari);
        //print_r($vari);
        //echo'<br>';
        $rol=$vari[0];
        //print_r($rol);
         //echo $rol[0];
        parent::desconectar($conexion);
        return $rol[0];
        
      }catch(PDOException $e){
        parent::desconectar($conexion);
        die("Petición fallida: ".$e->getMessage());
      }
    }
    public static function insertComentario($Usuario, $Comentario, $seccion)
    {
        $conexion = parent::conectar();
        //Insert Into Comentarios (usuario,comentario)values("Amador", "Esta exposicion me ha gustado mucho");
        $sql = "INSERT INTO Comentarios (usuario,comentario) VALUES (:usuario, :comentario)"; //" :seccion )";

        try {
            $st = $conexion->prepare($sql);
            echo $Usuario;
            $st->bindValue(":usuario", $Usuario, PDO::PARAM_STR);
            $st->bindValue(":comentario", $Comentario, PDO::PARAM_STR);
            //$st->bindValue(":seccion", $seccion, PDO::PARAM_STR);
            

            $result = $st->execute();
            //echo $Usuario,$Comentario;
            parent::desconectar($conexion);
            return $result;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: " . $e->getMessage());
        }
    }
    public static function obtenerComentarios(){
      $consulta="SELECT * FROM Comentarios";
      $conexion=parent::conectar();
      $resultados=$conexion->query($consulta);
      foreach($resultados as $fila){
        echo '
          <h5 class="col-sm-2 ">'.$fila["usuario"].': </h5><p class="col-sm-10 ">'.$fila["comentario"].'</p>
        ';
      }
      
      parent::desconectar($conexion);
    }
    public static function cambiarSexo($sexo){
        $conexion = parent::conectar();
        //Insert Into Comentarios (usuario,comentario)values("Amador", "Esta exposicion me ha gustado mucho");
        $sql ="UPDATE Usuarios SET sexo=:sexo where dni=:dni";

        try {
            $st = $conexion->prepare($sql);
            //echo $Usuario;
            $st->bindValue(":sexo", $sexo, PDO::PARAM_STR);
            $st->bindValue(":dni", $_SESSION['DNI'], PDO::PARAM_STR);
            

            $result = $st->execute();
            //echo $Usuario,$Comentario;
            parent::desconectar($conexion);
            //return $result;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: " . $e->getMessage());
        }
    }
    
    public static function cambiarFecha($fecha){
        $conexion = parent::conectar();
        //Insert Into Comentarios (usuario,comentario)values("Amador", "Esta exposicion me ha gustado mucho");
        $sql ="UPDATE Usuarios SET f_nacimiento=:fecha where dni=:dni";

        try {
            $st = $conexion->prepare($sql);
            //echo $Usuario;
            $st->bindValue(":fecha", $fecha, PDO::PARAM_STR);
            $st->bindValue(":dni", $_SESSION['DNI'], PDO::PARAM_STR);
            

            $result = $st->execute();
            //echo $Usuario,$Comentario;
            parent::desconectar($conexion);
            //return $result;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: " . $e->getMessage());
        }
    }
    
    public static function cambiarEmail($email){
        $conexion = parent::conectar();
        //Insert Into Comentarios (usuario,comentario)values("Amador", "Esta exposicion me ha gustado mucho");
        $sql ="UPDATE Usuarios SET email=:email where dni=:dni";

        try {
            $st = $conexion->prepare($sql);
            //echo $Usuario;
            $st->bindValue(":email", $email, PDO::PARAM_STR);
            $st->bindValue(":dni", $_SESSION['DNI'], PDO::PARAM_STR);
            

            $result = $st->execute();
            //echo $Usuario,$Comentario;
            parent::desconectar($conexion);
            //return $result;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: " . $e->getMessage());
        }
    }
    
    public static function cambiarDNI($dni){
        $conexion = parent::conectar();
        //Insert Into Comentarios (usuario,comentario)values("Amador", "Esta exposicion me ha gustado mucho");
        $sql ="UPDATE Usuarios SET dni=:dni where dni=:dni";

        try {
            $st = $conexion->prepare($sql);
            //echo $Usuario;
            $st->bindValue(":dni", $dni, PDO::PARAM_STR);
            $st->bindValue(":dni", $_SESSION['DNI'], PDO::PARAM_STR);
            

            $result = $st->execute();
            //echo $Usuario,$Comentario;
            parent::desconectar($conexion);
            //return $result;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: " . $e->getMessage());
        }
    }
    
    public static function cambiarContra($passwd){
        $conexion = parent::conectar();
        //Insert Into Comentarios (usuario,comentario)values("Amador", "Esta exposicion me ha gustado mucho");
        $sql ="UPDATE Usuarios SET passwd=:passwd where dni=:dni";

        try {
            $st = $conexion->prepare($sql);
            //echo $Usuario;
            $st->bindValue(":passwd", $passwd, PDO::PARAM_STR);
            $st->bindValue(":dni", $_SESSION['DNI'], PDO::PARAM_STR);
            

            $result = $st->execute();
            //echo $Usuario,$Comentario;
            parent::desconectar($conexion);
            //return $result;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: " . $e->getMessage());
        }
    }
    
    public static function CambiarNombre($nombre){
        $conexion = parent::conectar();
        //Insert Into Comentarios (usuario,comentario)values("Amador", "Esta exposicion me ha gustado mucho");
        $sql ="UPDATE Usuarios SET nombre=:nombre where dni=:dni";

        try {
            $st = $conexion->prepare($sql);
            //cho $Usuario;
            $st->bindValue(":nombre", $nombre, PDO::PARAM_STR);
            $st->bindValue(":dni", $_SESSION['DNI'], PDO::PARAM_STR);
            

            $result = $st->execute();
            //echo $Usuario,$Comentario;
            parent::desconectar($conexion);
            //return $result;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: " . $e->getMessage());
        }
    }


}
