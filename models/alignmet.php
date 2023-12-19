<?php
require_once 'Conexion.php';



class Alignment extends Conexion
{
    private $pdo;

    public function __CONSTRUCT()
    {
        $this->pdo = parent::getConexion();
    }

    public function getResumenAlignment()
    {
        try{
            $consulta = $this->pdo->prepare("CALL spu_resumen_alignment()");
            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_ASSOC);

        }
        catch(PDOException $e){
            die($e->getMessage());
        }
    }
}


