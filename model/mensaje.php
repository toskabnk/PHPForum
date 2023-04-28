<?php
require_once '../model/conexion/conexion.php';
class mensaje {
    private int $mensajeId;
    private string $mensaje;
    private int $userId;
    private int $postId;
    private int $respuestaMensajeId;

    /**
     * @param int $mensajeId
     * @param string $mensaje
     * @param int $userId
     * @param int $postId
     * @param int $respuestaMensajeId
     */
    public function __construct(int $mensajeId, string $mensaje, int $userId, int $postId, int $respuestaMensajeId)
    {
        $this->mensajeId = $mensajeId;
        $this->mensaje = $mensaje;
        $this->userId = $userId;
        $this->postId = $postId;
        $this->respuestaMensajeId = $respuestaMensajeId;
    }


    /**
     * @return int
     */
    public function getMensajeId(): int
    {
        return $this->mensajeId;
    }

    /**
     * @param int $mensajeId
     */
    public function setMensajeId(int $mensajeId): void
    {
        $this->mensajeId = $mensajeId;
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
     * @return int
     */
    public function getRespuestaMensajeId(): int
    {
        return $this->respuestaMensajeId;
    }

    /**
     * @param int $respuestaMensajeId
     */
    public function setRespuestaMensajeId(int $respuestaMensajeId): void
    {
        $this->respuestaMensajeId = $respuestaMensajeId;
    }

    public function consigueMensajesPublicacion($postId){
        try {
            $conexion = Conectar::Conexion();

            if (gettype($conexion) == "string") {
                return $conexion;
            }

            $sql = "SELECT * FROM mensajes WHERE postId = :idPost";
            $respuesta = $conexion->prepare($sql);
            $respuesta->execute(array(":idPost" => $postId));
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