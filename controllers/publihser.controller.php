<?php
require_once '../models/publisher.php';

if(isset($_GET['operacion'])){

  $publisher = new Publisher();

  if($_GET['operacion'] == 'listar'){
    $respuesta = $publisher->getAllPublisher();

    echo json_encode($respuesta);
  }

  
  if($_GET['operacion']== 'search'){
    $consulta = $publisher->buscarPublisherSH(["publisher_id" => $_GETT["publisher_id"]]);
    echo json_encode($consulta);
  }
  
}


if(isset($_POST['operacion'])){

  $publisher = new Publisher();


}


/* $p = new Publisher();
$cons = $p->getAll();
echo json_encode($cons); */
