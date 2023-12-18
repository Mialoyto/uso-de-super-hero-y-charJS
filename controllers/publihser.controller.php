<?php
require_once '../models/publisher.php';

if(isset($_POST['operacion'])){

  $publisher = new Publisher();

  if($_POST['operacion'] == 'listar'){
    $respuesta = $publisher->buscarPublisher(["publisher_id" => $_POST['publisher_id']]);

    echo json_encode($respuesta);
  }
  
}


/* $p = new Publisher();
$cons = $p->getAll();
echo json_encode($cons); */
