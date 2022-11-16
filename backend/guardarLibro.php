<?php

    if (!empty($_POST['agregar_libro'])) {
        if (empty($_POST['titulo']) and empty($_POST['autor']) and $_POST['editorial']  and $_POST['edicion']  and $_POST['isbn']  and $_POST['fecha']  and $_POST['no_paginas'] and $_FILES['portada'] and $_FILES['archivo']) {
            echo "<p class='error'>¡Todos los campos son obligatorios!</p>";
        } else {

            require('config.php'); 

            // echo '<script>alert('.$_GET['clase'].')</script>';

            $titulo = $conn->real_escape_string($_POST['titulo']);
            $autor = $conn->real_escape_string($_POST['autor']);
            $pais = $conn->real_escape_string($_POST['pais']);
            $editorial = $conn->real_escape_string($_POST['editorial']);
            $edicion = $conn->real_escape_string($_POST['edicion']);
            $isbn = $conn->real_escape_string($_POST['isbn']);
            $fecha = $conn->real_escape_string($_POST['fecha']);
            $no_paginas = $conn->real_escape_string($_POST['no_paginas']);

            // Portada
            $archivo_img = $_FILES['portada']['tmp_name'];
            $imagen_portada = addslashes(fread(fopen($archivo_img, "rb"), filesize($archivo_img)));
            $nombre_imgPortada = $_FILES['portada']['name'];
            $tam_imgPortada = $_FILES['portada']['size'];
            $tipo_imgPortada = $_FILES['portada']['type'];

            // Archivo PDF
            $archivo_PDF = $_FILES['archivo']['tmp_name'];
            $archivo_pdf = addslashes(fread(fopen($archivo_PDF, "rb"), filesize($archivo_PDF)));
            $nombre_ArchivoPDF = $_FILES['archivo']['name'];
            $tam_ArchivoPDF = $_FILES['archivo']['size'];
            $tipo_ArchivoPDF = $_FILES['archivo']['type'];

            $clase_iD = $_GET['clase'];

            if($clase_iD == 0){
                $clase_insertar = $_POST['clase'];
            }else{
                $clase_insertar = $clase_iD;
            }

            $insert = "INSERT INTO `libros`(`titulo`, `autor`, `pais`, `ISBN`, `anio`, `edicion`, `editorial`, `tam_ArchivoPDF`, `nombre_ArchivoPDF`, `archivo_pdf`, `tipo_ArchivoPDF`, `imagen_portada`, `tam_imgPortada`, `nombre_imgPortada`, `tipo_imgPortada`, `id_clase`, `no_paginas`) VALUES ('$titulo','$autor','$pais','$isbn','$fecha','$edicion','$editorial','$tam_ArchivoPDF','$nombre_ArchivoPDF','$archivo_pdf','$tipo_ArchivoPDF','$imagen_portada','$tam_imgPortada','$nombre_imgPortada','$tipo_imgPortada','$clase_insertar','$no_paginas')";
            

            mysqli_query($conn, $insert);

            header("Location: ../homeBooks.php?clase=$clase_insertar");

        }
    }

?>