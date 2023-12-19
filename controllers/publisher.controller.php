<?php
require_once '../models/publisher.php';

if(isset($_GET['operacion'])){

  $publisher = new Publisher();

  if($_GET['operacion'] == 'listar'){
    $respuesta = $publisher->getAllPublisher();

    echo json_encode($respuesta);
  }

  
  if($_GET['operacion']== 'search'){
    $consulta = $publisher->buscarPublisherSH(["_publisher_id" => $_GET["_publisher_id"]]);
    echo json_encode($consulta);
  }
  
}


if(isset($_POST['operacion'])){

  $publisher = new Publisher();


}

/* $p = new Publisher();
$cons = $p->buscarPublisherSH(["_publisher_id" => 2]);
echo json_encode($cons); */


/* $p = new Publisher();
$cons = $p->getAll();
echo json_encode($cons); */

