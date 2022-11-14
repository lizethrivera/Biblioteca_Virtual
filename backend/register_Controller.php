<?php
    if(!empty($_POST['registro'])){
        if(empty($_POST['usuario']) && empty($_POST['password']) && empty($_POST['nombreCompleto']) && empty($_POST['correo'])){
            echo "<p class='error'>¡Los campos estan vacios!</p>";
        }else{

            $nombreCompleto = $conn->real_escape_string($_POST['nombreCompleto']);
            $usuario = $conn->real_escape_string($_POST['usuario']);
            $correo = $conn->real_escape_string($_POST['correo']);
            $password = $_POST['password'];

            $select = "SELECT * FROM usuarios WHERE correo = '$correo' OR usuario = '$usuario'";

            $resultado = mysqli_query($conn, $select);

            if($resultado->num_rows > 0){
                echo "<p class='error'>¡El usuario ya existe!</p>";

            }else{
                $insert = "INSERT INTO usuarios(nombreCompleto, usuario, correo, password) VALUES('$nombreCompleto', '$usuario', '$correo', '$password')";
                mysqli_query($conn, $insert);
                header('location:index.php');
            }

            
        }
    }
        
?>