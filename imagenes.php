<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/imagenes.css">
    <link href="css/lightbox.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
    <?php include("header.php"); ?>

    <div class="main-container-section">
            <div class="marca-agua">
            <h2>Imágenes con PHP</h2>
            <div class="detalle">
			<p>En este ejemplo se utiliza PHP "imagecreate", "imagecopy" y otras funciones para manipular imágenes. <br> <a target="_blank" href="https://github.com/nahuelmd/PHP-Imagenes">Ver código fuente en GitHub</a>   </p>
		    </div>
            <h2>Sube una imágen para aplicar marca de agua</h2>
            <h2>Se aplicara la siguiente imagen como marca de Agua 👇🏻</h2>
            <img src="/marca.png" alt="">
        
            <div class="form-container">
                <form action="" method="post" enctype="multipart/form-data">
                    <h2>Selecciona la imagen a la que quieres aplicar la marca de agua</h2>
                    <input type="file" name="file">
                    <input type="submit" name="submit" value="Aplicar marca de agua">
                </form>
            </div>
            <div class="imagen-con-marca">
                    <?php
                    include_once 'marcaDeAgua.php'
                    ?>
            </div>
            <h2>Imagen con marca de Agua 👇</h2>
            <div class="imagen-con-marca-de-agua">
                <img src="<?php echo $targetFilePath.$uploadedFileName; ?>" alt="">
            </div>

        </div>
    
    </div>

    <!--EMPIEZA IMAGEN THUMB  -->
    <?php
		$original = "images/unidad4.jpg";
		$copia = imagecreatefromjpeg($original);
		$imagen_ancho = imagesx($copia);
		$imagen_alto = imagesy($copia);
		$ancho = 150;
		$alto = 150;
		$imagen = imagecreate($ancho, $alto);
		imagecopyresized($imagen, $copia, 0, 0, 0, 0, $ancho, $alto, $imagen_ancho, $imagen_alto);
        imagejpeg($imagen, "images/unidad4-thumb.jpg")
        
    ?>

    <div class="imagenes-thumbnails">
        <h1>Crear imagen en miniatura y mostrar imagenes con Libreria Light Box</h1>

        <div class="imagenes-section">
            
            <div class="primera-imagen">
            <h3>Imagen original</h3>
                <img src="images/unidad4.jpg" alt="">
            </div>
            
            <div class="segunda-imagen">
                <h3>Imagen miniatura (thumbnails) 150px X 150px</h3>
                <img src="images/unidad4-thumb.jpg" alt="">
            </div>
            
            <div class="libreria-light-box">
            <h3>Visualizar imagen en Light Box</h3>
                <a href="images/unidad4.jpg" data-lightbox="image-1" data-title="Este es un comentario"> <img
                        src="images/unidad4-thumb.jpg" alt="">
                </a>
            </div>
                
        </div>

    </div>



    <script>
    type = "text/javascript"
    src = "js/lightbox-plus-jquery.js"
    </script>
    <script src="js/lightbox.js"></script>


    <?php include("footer.php"); ?>
</body>

</html>