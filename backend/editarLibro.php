<?php
    if(!empty($_POST['portada'])){
        echo "<p class='error'>¡Debe seleccionar un archivo para la portada!</p>";
    }else{
        require('config.php'); 

        $archivo_img = $_FILES['portada']['tmp_name'];
        $imagen_portada = addslashes(fread(fopen($archivo_img, "rb"), filesize($archivo_img)));
        $nombre_imgPortada = $_FILES['portada']['name'];
        $tam_imgPortada = $_FILES['portada']['size'];
        $tipo_imgPortada = $_FILES['portada']['type'];

        $update = "UPDATE libros SET imagen_portada = '$imagen_portada', tipo_imgPortada = '$tipo_imgPortada', tam_imgPortada = '$tam_imgPortada', nombre_imgPortada = '$nombre_imgPortada' WHERE iD = '$_GET[libro]'";

        $resultado = mysqli_query($conn, $update);

        $libro_iD = $_GET['libro'];

        header("Location: ../bookEdit.php?libro=$libro_iD");
    }
?>