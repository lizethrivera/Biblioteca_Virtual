<?php
    if(!empty($_POST['archivo_img'])){
        echo "<p class='error'>¡Debe seleccionar un archivo!</p>";
    }else{
        require('config.php'); 

        // $imagen = $_POST['archivo_img'];
        session_start();

        $archivo_img = $_FILES['archivo_img']['tmp_name'];
        $img_Perfil = addslashes(fread(fopen($archivo_img, "rb"), filesize($archivo_img)));
        $nombre_imagen = $_FILES['archivo_img']['name'];
        $tam_imagen = $_FILES['archivo_img']['size'];
        $tipo_imagen = $_FILES['archivo_img']['type'];

        $update = "UPDATE usuarios SET img_Perfil = '$img_Perfil', tipo_imagen = '$tipo_imagen', tam_imagen = '$tam_imagen', nombre_imagen = '$nombre_imagen' WHERE iD=".$_SESSION['iD']."";

        $resultado = mysqli_query($conn, $update);

        header("Location: cerrar_sesion.php");
    }
?>