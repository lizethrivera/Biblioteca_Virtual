<?php
    if(!empty($_POST['login'])){
        if(empty($_POST['usuario']) and empty($_POST['password'])){
            echo "<p class='error'>¡Los campos estan vacios!</p>";
        }else{
            // session_start();
            // $_SESSION();
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];

            $select = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$password'";

            // $resultado = $conn->query($select);
            // $row = mysqli_fetch_array(($resultado));

            if($resultado = $conn->query($select)){
                while($row = $resultado->fetch_array()){
                    if ($row['rol'] == 'admin') {
                        session_start();
                        $_SESSION['iD'] = $row['iD'];
                        $_SESSION['nombreCompleto'] = $row['nombreCompleto'];
                        $_SESSION['usuario'] = $row['usuario'];
                        $_SESSION['correo'] = $row['correo'];
                        $_SESSION['img_Perfil'] = $row['img_Perfil'];
                        $_SESSION['tipo_imagen'] = $row['tipo_imagen'];
                        $_SESSION['rol'] = $row['rol'];
                        header("Location: home.php");
                    }elseif($row['rol'] == 'usuario'){
                        session_start();
                        $_SESSION['iD'] = $row['iD'];
                        $_SESSION['nombreCompleto'] = $row['nombreCompleto'];
                        $_SESSION['usuario'] = $row['usuario'];
                        $_SESSION['correo'] = $row['correo'];
                        $_SESSION['img_Perfil'] = $row['img_Perfil'];
                        $_SESSION['tipo_imagen'] = $row['tipo_imagen'];
                        $_SESSION['rol'] = $row['rol'];
                        header("Location: home.php");
                    }else {
                        echo "<p class='error'>¡La cuenta no existe!</p>";
                    }
                }
            }

            
        }
    }
?>