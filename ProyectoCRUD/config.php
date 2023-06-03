<?php
class config{
    private $servidor;
    private $db;
    private $usuario;
    private $pwd;
    private $conexion;

    public function __construct(){
        $this->servidor = "localhost";
        $this->db = "gimnasio_poo";
        $this->usuario = "root";
        $this->pwd = "";
    }

    public function conectar(){
        try {
            $opcion = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
            $this->conexion = new PDO('mysql:host='.$this->servidor.'; dbname='.$this->db,$this->usuario,$this->pwd,$opcion);
        } catch (PDOException $e) {
            echo "Error de conexion: " . $e->getMessage();
            die();
        }
    }

    public function getConnection(){
        return $this->conexion;
    }

    public function desconectar(){
        $this->conexion = null;
    }
    
}

?>