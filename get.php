<?php 

    $mysqli = new mysqli("localhost", "root", "root", "examen");
    if ($mysqli->connect_errno) {
        echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    if (!($resultado = $mysqli->query("SELECT * FROM users"))) {
        echo "Falló la ejecución: (" . $mysqli->errno . ") " . $mysqli->error;
    }

    while($res=mysqli_fetch_assoc($resultado)) {
        $arr[]=$res;
    }
    echo json_encode($arr);
?>