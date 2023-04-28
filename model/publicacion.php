<?php
require_once '../model/conexion/conexion.php';
class publicacion {
    private int $postId;
    private string $titulo;
    private string $mensaje;
    private int $temaId;
    private int $userId;

    /**
     * @param int $postId
     * @param string $titulo
     * @param string $mensaje
     * @param int $temaId
     * @param int $userId
     */
    public function __construct(int $postId, string $titulo, string $mensaje, int $temaId, int $userId)
    {
        $this->postId = $postId;
        $this->titulo = $titulo;
        $this->mensaje = $mensaje;
        $this->temaId = $temaId;
        $this->userId = $userId;
    }


    /**
     * @return int
     */
    public function getPostId(): int
    {
        return $this->postId;
    }

    /**
     * @param int $postId
     */
    public function setPostId(int $postId): void
    {
        $this->postId = $postId;
    }

    /**
     * @return string
     */
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    /**
     * @param string $titulo
     */
    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }

    /**
     * @return string
     */
    public function getMensaje(): string
    {
        return $this->mensaje;
    }

    /**
     * @param string $mensaje
     */
    public function setMensaje(string $mensaje): void
    {
        $this->mensaje = $mensaje;
    }

    /**
     * @return int
     */
    public function getTemaId(): int
    {
        return $this->temaId;
    }

    /**
     * @param int $temaId
     */
    public function setTemaId(int $temaId): void
    {
        $this->temaId = $temaId;
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

    public function cosigueListaTema($idTema){
        try {
            $conexion = Conectar::Conexion();

            if (gettype($conexion) == "string") {
                return $conexion;
            }

            $sql = "SELECT * FROM publicaciones WHERE temaId = :idTema";
            $respuesta = $conexion->prepare($sql);
            $respuesta->execute(array(":idTema" => $idTema));
            $respuesta = $respuesta->fetchAll(PDO::FETCH_ASSOC);

            $conexion = null;

            if ($respuesta) {
                return $respuesta;
            } else {
                return $respuesta = null;
            }

        }catch (PDOException $e){
            return Conectar::mensajes($e->getCode());
        }
    }
}
