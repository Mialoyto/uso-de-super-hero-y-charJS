<?php
class Conexion
{

  private $servidor = "localhost";
  private $puerto = "3306";
  private $baseDatos ="superhero";
  private $usuario = "root";
  private $clave = "";

  public function getConexion()
  {
    
    try {

      $conex = new PDO(
        
        "mysql:host={$this->servidor};
        port={$this->puerto};
        dbname={$this->baseDatos};
        charset=UTF8",
        $this->usuario,
        $this->clave

      );

      $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      return $conex;
      
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}




