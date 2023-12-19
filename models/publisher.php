<?php
require_once 'Conexion.php';
class Publisher extends Conexion
{
  private $pdo;

  public function __construct(){
    $this->pdo = parent::getConexion();
  }

  function getAllPublisher($data = [])
  {
    try {
      $consulta = $this->pdo->prepare("CALL spu_publisher_listar()");
      $consulta->execute(
        
      );
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  function buscarPublisherSH($data = [])
  {
    try {
      $consulta = $this->pdo->prepare("CALL spu_publisher_search(?)");
      $consulta->execute(
        array($data['publisher_id'])
      );
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}


/* $p = new Publisher();
$cons = $p->listarPublisher($data);
echo json_encode($cons);
 */