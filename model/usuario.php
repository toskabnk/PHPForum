<?php
require_once('conexion/conexion.php');
class usuario {
    private int $userId;
    private string $nombre_usuario;
    private string $contrasenia;
    private string $rol;
    private string $nombre;
    private string $apellidos;
    private string $email;

    /**
     * @param int $userId
     * @param string $nombre_usuario
     * @param string $contrasenia
     * @param string $rol
     * @param string $nombre
     * @param string $apellidos
     * @param string $email
     */
    public function __construct(int $userId, string $nombre_usuario, string $contrasenia, string $rol, string $nombre, string $apellidos, string $email)
    {
        $this->userId = $userId;
        $this->nombre_usuario = $nombre_usuario;
        $this->contrasenia = $contrasenia;
        $this->rol = $rol;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->nombre_usuario;
    }


    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getNombreUsuario(): string
    {
        return $this->nombre_usuario;
    }

    /**
     * @param string $nombre_usuario
     */
    public function setNombreUsuario(string $nombre_usuario): void
    {
        $this->nombre_usuario = $nombre_usuario;
    }

    /**
     * @return string
     */
    public function getContrasenia(): string
    {
        return $this->contrasenia;
    }

    /**
     * @param string $contrasenia
     */
    public function setContrasenia(string $contrasenia): void
    {
        $this->contrasenia = $contrasenia;
    }

    /**
     * @return string
     */
    public function getRol(): string
    {
        return $this->rol;
    }

    /**
     * @param string $rol
     */
    public function setRol(string $rol): void
    {
        $this->rol = $rol;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    /**
     * @param string $apellidos
     */
    public function setApellidos(string $apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public static function consigueUsuario($nombre_usuario, $contrasenia){
        try{
            $contrasenia = self::cryptconmd5($contrasenia);
            $conexion = Conectar::Conexion();

            if(gettype($conexion) == "string"){
                return $conexion;
            }

            $sql = "SELECT userId, nombre_usuario, contrasenia, rol, nombre, apellidos, email FROM USUARIOS WHERE nombre_usuario=:usuario AND contrasenia:=contrasenia";
            $respuesta = $conexion->prepare($sql);
            $respuesta->execute(array(':nombre_usuario'=>$nombre_usuario, ':contrasenia'=>$contrasenia));
            $respuesta = $respuesta->fetch(PDO::FETCH_ASSOC);

            $conexion = null;

            if($respuesta){
                $usuario = new usuario($respuesta["idUser"],$respuesta["nombre_usuario"],$respuesta["contrasenia"],$respuesta["rol"],$respuesta["nombre"],$respuesta["apellidos"],$respuesta["email"]);
                $respuesta->closeCursor();
                return $usuario;
            } else {
                $respuesta->closeCursor();
                return $usuario = null;
            }
        } catch (PDOException $e){
            return Conectar::mensajes($e->getCode());
        }
    }

    public static function registraUsuario($nombre_usuario, $contrasenia, $nombre, $apellidos, $email){
        try{
            $contrasenia = self::cryptconmd5($contrasenia);
            $conexion = Conectar::Conexion();

            if(gettype($conexion) == "string"){
                return $conexion;
            }

            $sql = "INSERT INTO USUARIO(nombre_usuaio, contrasenia, rol, nombre, apellidos, email) VALUES (:nombre_usuaio, :contrasenia, :rol, :nombre, :apellidos, :email)";
            $respuesta = $conexion->prepare($sql);
            $respuesta = $respuesta->execute(array(":nombre_usuaio"=>$nombre_usuario, ":contrasenia"=>$contrasenia, ":rol"=>"user", ":nombre"=>$nombre, ":apellidos"=>$apellidos, ":email"=>$email));

            $conexion = null;
            return $respuesta;
        } catch (PDOException $e){
            return Conectar::mensajes($e->getCode());
        }
    }

    public static function cryptconmd5($password) {
        //Crea un salt
        $salt = md5($password."%*4!#$;.k~’(_@");
        $password = md5($salt.$password.$salt);
        return $password;
    }

}
