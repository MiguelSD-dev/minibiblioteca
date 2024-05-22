<?php
require_once('others/functions.php'); // Incluye el archivo functions.php
$libros = getLibros();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniBiblioteca-Libros</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

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
            <?php foreach ($libros as $libro) { ?>
                <div class="col-md-4">
                    <div class="card mt-3">
                        <img src="images/imagenlibro.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $libro['titulo']; ?></h5>
                            <p class="card-text">Autor: <?php echo $libro['nombre']; ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Botones de eliminar y editar -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-danger rounded-pill me-2" onclick="eliminarLibro(<?php echo $libro['idlibro']; ?>)">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-primary rounded-pill">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <script>
        function eliminarLibro(idLibro) {
            if (confirm("¿Estás seguro de que deseas eliminar este libro?")) {
                // Enviar una solicitud POST al servidor para eliminar el libro
                fetch('others/eliminar_libro.php?idLibro=' + idLibro)
                    .then(response => {
                        if (response.ok) {
                            // Libro eliminado correctamente, puedes hacer algo aquí, como recargar la página
                            location.reload();
                        } else {
                            // Error al eliminar el libro, maneja el error aquí
                            console.error('Error al eliminar el libro');
                        }
                    })
                    .catch(error => {
                        console.error('Error de red:', error);
                    });
            }
        }
    </script>

    <!-- Bootstrap JavaScript desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>