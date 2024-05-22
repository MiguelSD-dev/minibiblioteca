<?php
require_once('functions.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Obtener el ID del libro a eliminar desde la solicitud POST
    $idLibro = $_GET['idLibro'];

    // Llamar a la función para eliminar el libro
    deleteLibro($idLibro);
}
?>
