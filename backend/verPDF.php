<?php
    require('config.php'); 

    $consulta ="SELECT nombre_ArchivoPDF, archivo_pdf, tipo_ArchivoPDF, tam_ArchivoPDF FROM libros WHERE iD='".$_GET['libro']."'";

    $resultado = mysqli_query ($conn,$consulta);

    $row=mysqli_fetch_assoc($resultado);

    $archivo_pdf = $row['archivo_pdf'];
    $nombre_archivo = $row['nombre_ArchivoPDF'];
    $tipo_ArchivoPDF = $row['tipo_ArchivoPDF'];
    $tam_ArchivoPDF = $row['tam_ArchivoPDF'];

    header("Content-type: $tipo_ArchivoPDF");
    header("Content-length: $tam_ArchivoPDF");
    header("Content-Disposition: inline; filename='$nombre_archivo'");
    echo $archivo_pdf;


?>