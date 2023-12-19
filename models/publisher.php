<?php
require_once 'Conexion.php';
class Publisher extends Conexion
{
  private $pdo;

  public function __construct()
  {
    $this->pdo = parent::getConexion();
  }

  public function getAllPublisher()
  {
    try {
      $consulta = $this->pdo->prepare("CALL spu_publisher_listar()");
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public function buscarPublisherSH($data = [])
  {
    try {
      $consulta = $this->pdo->prepare("CALL spu_publisher_search(?)");
      $consulta->execute(
        array($data['_publisher_id'])
      );
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }
}
