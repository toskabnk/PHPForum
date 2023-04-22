<?php
class tema {
    private int $temaId;
    private string $nombre;

    /**
     * @param int $temaId
     * @param string $nombre
     */
    public function __construct(int $temaId, string $nombre)
    {
        $this->temaId = $temaId;
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->nombre;
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



}