<?php
require_once('functions.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Obtener el ID del autor a eliminar desde la solicitud GET
    $idAutor = $_GET['idAutor'];

    // Llamar a la función para eliminar el libro
    deleteAutor($idAutor);
}
?>
