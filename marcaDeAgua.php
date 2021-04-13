<?php 
// rutas, carpeta destino y marca de agua 
$targetDir = "imagenes/"; 
$watermarkImagePath = 'marca.png'; 
 
$uploadedFileName = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    if(!empty($_FILES["file"]["name"])){ 
        // ruta carpeta destino y archivo
        $fileName = basename($_FILES["file"]["name"]); 
        $targetFilePath = $targetDir . $fileName; 
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 
         
        // Limitar tipo de archivo 
        $allowTypes = array('jpg','png','jpeg'); 
        if(in_array($fileType, $allowTypes)){ 
            // Sube el archivo a carpeta en el servidor 
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
                
                $watermarkImg = imagecreatefrompng($watermarkImagePath); 
                switch($fileType){ 
                    case 'jpg': 
                        $im = imagecreatefromjpeg($targetFilePath); 
                        break; 
                    case 'jpeg': 
                        $im = imagecreatefromjpeg($targetFilePath); 
                        break; 
                    case 'png': 
                        $im = imagecreatefrompng($targetFilePath); 
                        break; 
                    default: 
                        $im = imagecreatefromjpeg($targetFilePath); 
                } 
                 
                // Define ubicacion de marca de agua desde margen derecho y abajo 
                $marge_right = 50; 
                $marge_bottom = 50; 
                 
                // Obtener ancho y alto de imagen de marca de agua
                $sx = imagesx($watermarkImg); 
                $sy = imagesy($watermarkImg); 
                 
                // Inserta la marca de agua basandose en ancho y alto de la imagen 
                imagecopy($im, $watermarkImg, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($watermarkImg), imagesy($watermarkImg)); 
                 
                // guarda la imagen y libera la memoria 
                imagepng($im, $targetFilePath); 
                imagedestroy($im); 
     
                if(file_exists($targetFilePath)){ 
                    $statusMsg = "La imagen fue procesada correctamente."; 
                }else{ 
                    $statusMsg = "Algo ha fallado por favor intentalo de nuevo."; 
                }  
            }else{ 
                $statusMsg = "Hubo un error al subir la imagen."; 
            } 
        }else{ 
            $statusMsg = 'Solo puedes subir imagenes en formato JPG, JPEG y PNG.'; 
        } 
    }else{ 
        $statusMsg = 'Por favor seleccione la imagen a la que quiere aplicar la marca de agua.'; 
    } 
} 
 
// Mensaje de resultado de operacion
echo $statusMsg;