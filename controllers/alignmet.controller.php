<?php
require_once '../models/alignmet.php';


if (isset($_GET['operacion'])) {

    $alignment = new Alignment();

    if ($_GET['operacion'] == 'getResumenAlignment') {
        echo json_encode($alignment->getResumenAlignment());
    }
}


/* $p = new Alignment();
$consulta = $p->getResumenAlignment();
echo json_encode($consulta); */