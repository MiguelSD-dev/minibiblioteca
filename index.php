<?php
require_once('others/functions.php'); // Incluye el archivo functions.php
$libros = getLibrosDesc();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniBiblioteca</title>

    <!-- Bootstrap CSS desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include_once("includes/header.php"); ?>

    <!-- Aquí se incluirá el contenido dinámico de las páginas -->

    <div class="container">
        <div class="row">
            <?php
            // El bucle foreach para mostrar los libros
            foreach ($libros as $libro) {
            ?>
                <div class="col-md-4">
                    <div class="card mt-3"> <!-- Agregamos mt-3 aquí -->
                        <!-- Aquí iría la imagen del libro -->
                        <img src="images/imagenlibro.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $libro['titulo']; ?></h5>
                            <p class="card-text">Autor: <?php echo $libro['nombre']; ?></p>
                            <!-- Otros detalles del libro, si es necesario -->
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap JavaScript desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>