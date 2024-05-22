<?php
require_once('others/functions.php'); // Incluye el archivo functions.php

// Obtener la lista de autores existentes
$autores = getAutores();

// Procesar formulario para agregar autor
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['autor'])) {
    addAutor($_POST['autor']);
}

// Procesar formulario para agregar libro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['titulo'])) {
    $titulo = $_POST['titulo'];
    $idAutor = $_POST['id_autor'];
    addLibro($titulo, $idAutor);
}
?>

<!-- registro.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!-- Bootstrap CSS desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Estilos personalizados */
        .formulario-container {
            background-color: #343a40;
            /* Color de fondo oscuro */
            padding: 20px;
            border-radius: 10px;
            /* Bordes redondeados */
            margin-top: 20px;
            color: white;
            /* Texto blanco */
        }
    </style>
</head>

<body>
    <?php include_once("includes/header.php"); ?>

    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <!-- formulario de registro de libros -->
                    <div class="formulario-container">
                        <h2>Agregar Libro</h2>
                        <form action="registro.php" method="post">
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título del Libro:</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" required>
                            </div>
                            <div class="mb-3">
                                <label for="autor" class="form-label">Autor:</label>
                                <select class="form-select" id="autor" name="id_autor" required>
                                    <option value="">Selecciona un autor</option>
                                    <?php foreach ($autores as $autor) { ?>
                                        <option value="<?php echo $autor['idautor']; ?>"><?php echo $autor['nombre']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Agregar Libro</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">

                    <!-- formulario de registro de autores -->
                    <div class="formulario-container">
                        <h2>Agregar Autor</h2>
                        <form action="registro.php" method="post">
                            <div class="mb-3">
                                <label for="autor" class="form-label">Nombre del Autor:</label>
                                <input type="text" class="form-control" id="autor" name="autor" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Agregar Autor</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>