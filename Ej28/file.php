<?php 

$mail = $_POST['email'];
$pass = $_POST['password'];
$year = $_POST['year'];

$mysqli = new mysqli("localhost", "root", "root", "examen");
if ($mysqli->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!($sentencia = $mysqli->prepare("INSERT INTO users(mail, pass, yearUser) VALUES (?, ?, ?)"))) {
    echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
}


if (!$sentencia->bind_param("sss", $mail, $pass, $year)) {
    echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
}

if (!$sentencia->execute()) {
    echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
}

echo "Se registro el usuario exitosamente";
?>