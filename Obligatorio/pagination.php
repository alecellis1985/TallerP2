<?php

require_once("includes/class.Conexion.BD.php");
require_once("config/parametros.php");
$pagina = (int) $_POST['pagenumber'];
$conn = new ConexionBD(DRIVER, SERVIDOR, BASE, USUARIO, CLAVE);

if ($conn->conectar()) {
    if (empty($pagina)) {
        $pagina = 1;
    }
    $sql = "SELECT * FROM videos WHERE deleted <> 1 LIMIT " . (($pagina - 1) * CANTPAG) . "," . CANTPAG;
    if ($conn->consulta($sql, array())) {
        $videos = $conn->restantesRegistros();
        echo json_encode($videos);
    } else {
        echo "Error de SQL";
    }
} else {
    echo "Error de Conexion";
}    
