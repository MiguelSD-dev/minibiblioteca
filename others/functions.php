<?php
// functions.php
require 'config.php';


function getLibros()
{
    global $pdo;

    // Consulta para obtener los libros
    $sql = "SELECT libro.idlibro, libro.titulo, autor.nombre
        FROM libro
        INNER JOIN autor ON libro.idautor = autor.idautor;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Obtener los resultados de la consulta
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getLibrosDesc()
{
    global $pdo;

    // Consulta para obtener los libros, ordenados en orden descendente (el más reciente primero)
    $sql = "SELECT libro.idlibro, libro.titulo, autor.nombre
        FROM libro
        INNER JOIN autor ON libro.idautor = autor.idautor
        ORDER BY libro.idlibro DESC;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Obtener los resultados de la consulta
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAutores()
{
    global $pdo;

    // Consulta para obtener los autores
    $sql = "SELECT * FROM autor;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Obtener los resultados de la consulta
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**function addLibrosAutor()
{
    global $pdo;

    // Obtener datos del formulario
    $titulo = $_POST['titulo'];
    $nombreAutor = $_POST['autor'];

    // Insertar el autor en la tabla "autor"
    $sql = "INSERT INTO autor (nombre) VALUES (:nombre)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre', $nombreAutor);
    $stmt->execute();

    // Obtener el ID del autor insertado
    $idAutor = $pdo->lastInsertId();

    // Insertar el libro en la tabla "libro" con el ID del autor correspondiente
    $sql = "INSERT INTO libro (titulo, idautor) VALUES (:titulo, :idAutor)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':idAutor', $idAutor);
    $stmt->execute();
}*/

// Función para agregar un libro
function addLibro($titulo, $idAutor)
{
    global $pdo;

    // Insertar el libro en la tabla "libro" con el ID del autor correspondiente
    $sql = "INSERT INTO libro (titulo, idautor) VALUES (:titulo, :idAutor)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':idAutor', $idAutor);
    $stmt->execute();
}

// Función para agregar un autor
function addAutor($nombreAutor)
{
    global $pdo;

    // Insertar el autor en la tabla "autor"
    $sql = "INSERT INTO autor (nombre) VALUES (:nombre)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre', $nombreAutor);
    $stmt->execute();

    // Obtener el ID del autor insertado y devolverlo
    return $pdo->lastInsertId();
}


function deleteLibro($idLibro)
{
    global $pdo;

    // Sentencia SQL para eliminar el libro
    $sql = "DELETE FROM libro WHERE idlibro = :idLibro";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idLibro', $idLibro);
    $stmt->execute();

}

function deleteAutor($idAutor)
{
    global $pdo;

    // Sentencia SQL para eliminar el libro
    $sql = "DELETE FROM autor WHERE idAutor = :idAutor";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idAutor', $idAutor);
    $stmt->execute();

}
