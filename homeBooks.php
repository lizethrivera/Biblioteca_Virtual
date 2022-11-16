<?php
    session_start();

    require('backend/config.php');

    $clase_iD = $_GET['clase'];

    $consulta = "SELECT * FROM clases WHERE iD = '$clase_iD'";
    $librosClase = mysqli_query($conn, $consulta);

    if($clase_iD == 0){
        $nombreClase = 'Todos';
    }else{
        while($row = mysqli_fetch_array($librosClase)){
            $nombreClase = $row['nombreClase'];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros - <?php echo $nombreClase?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e6dfebc255.js" crossorigin="anonymous"></script>
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
    <link rel="shortcut icon" href="img/logo_B.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/homeBooks.css">
    
</head>
<body>
    <!-- Navbar -->
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg" id="navBar">
            <!-- Left Side NavBar -->
            <div id="leftBar">
                <span><i class="fas fa-equals opened"></i></span> 
            </div>
            <!-- Center Side NavBar -->
        
            <!-- Right Side NavBar -->
            <!-- <div class="container"> -->
                <div class="search_wrap search_wrap_3">
                    <form action="" method="post">
                        <div class="search_box">
                            <input type="text" name="buscar_l" class="input" placeholder="Buscar..." autocomplete="new-search">
                            <!-- <i class="fas fa-search" id="search_icon"></i> -->
                            <?php
                                require('backend/config.php');
                                require('backend/buscar.php');
                            ?>
                            <input type="submit" name="buscar" class="btn btn_common" value="B">
                        </div>
                    </form>
                </div>
            <!-- </div> -->
            <div id="rightBar">
                <!-- <div class="rightBarIcons plusBar">
                    <span data-toggle="modal" data-target="#modalAddClass"><i class="fas fa-search" style="color: #000;"></i></span>
                </div> -->
                
                <div class="rightBarIcons dropdown" id="profilePicMenu">
                    <span data-toggle="dropdown" aria-expanded="false" id="profilePic"><img id="imgInstructor"
                        <?php 
                            require('backend/config.php');

                            $usuario_IMG = "SELECT * FROM usuarios WHERE iD = '$_SESSION[iD]'";
            
                            if($resultado = $conn->query($usuario_IMG)){
                                while($row = $resultado->fetch_array()){
                                    if($row['img_Perfil'] == NULL){ 
                                        echo 'src="img/images/default_user.png"';
                                    }else{ 
                                        echo 'src="data:'.$row["tipo_imagen"].';base64,'.base64_encode($row["img_Perfil"]).'"';
                                    }
                                }
                            }
                            
                        ?> 
                        alt="" srcset=""></span>
                    <!-- DropDownMenu -->
                    <div class="dropdown-menu dropdown-menu-right" style="width: 300px; border-radius: 3%;" aria-labelledby="imgInstructor" id="dropMenu">
                        <div class="instructor row" style="display: flex;">
                            <span class="dropdown-item infoInstructor col-1"><img id="imgInstructor"
                            <?php 
                                require('backend/config.php');

                                $usuario_IMG = "SELECT * FROM usuarios WHERE iD = '$_SESSION[iD]'";
                
                                if($resultado = $conn->query($usuario_IMG)){
                                    while($row = $resultado->fetch_array()){
                                        if($row['img_Perfil'] == NULL){ 
                                            echo 'src="img/images/default_user.png"';
                                        }else{ 
                                            echo 'src="data:'.$row["tipo_imagen"].';base64,'.base64_encode($row["img_Perfil"]).'"';
                                        }
                                    }
                                }
                                
                            ?> 
                        alt="" srcset=""></span>
                            <div class="infoInstructor col-11">
                                <h5 style="margin-left: 10px; margin-bottom: 0px; font-size: 15px;"><?php echo $_SESSION['nombreCompleto']?></h5>
                                <small class = "text-muted" style="margin-left: 10px;"><?php echo $_SESSION['correo']?></small>
                            </div>
                        </div>
                        <div class="instructor row" style="display: flex;">
                            <span class="dropdown-item infoInstructor"style ="display:flex; margin: 5px 0px 0px 13px;" id = "addUser">
                                <a class="config_Perfil" href="homeUser.php">
                                    <i class="fas fa-gear"></i>
                                    <h5 style="margin-bottom: 0px; font-size: 15px; margin-left: 18px;"> Configuracion</h5>
                                </a>
                            </span>
                            <span class="dropdown-item infoInstructor"style ="display:flex; margin: 5px 0px 0px 13px;" id = "addUser">
                                <a class="a_CerrarSesion" href="backend/cerrar_sesion.php">
                                    <i class="fas fa-right-from-bracket"></i>
                                    <h5 style="margin-bottom: 0px; font-size: 15px; margin-left: 18px; margin-top: -1px;"> Cerrar Sesion</h5>
                                </a>    
                            </span>
                        </div>
                    </div>
                    
                </div>        
            </div>
        </nav>

        <div class="navigation">
            <div class="logo">
                <a href="home.php">
                    <span><i class="fa-solid fa-circle-nodes"></i></span>
                    <span class="libraryTitle">Biblioteca Virtual</span>
                </a>
            </div>
            
            <ul id="clasesSideBar">
                <?php
                    require('backend/config.php');
                    require('backend/clases.php');

                    $resultado = mysqli_query($conn, $clases);
                    while($row = mysqli_fetch_array($resultado)){
                        if($row['iD'] == $_GET['clase']){
                            $class = "list active";
                        }else{
                            $class = "list";
                        }

                    $min = 0;
                    $max = 255;

                ?>

                <li class="<?php echo $class?>">
                    <!-- <b></b>
                    <b></b> -->
                    <a href="homeBooks.php?clase=<?php echo $row['iD']?>">
                        <span class="icon"><i class="rightBarIcons" style="margin-top: 12px; margin-left: 10px; background-color: rgb(<?php echo rand($min, $max)?>, <?php echo rand($min, $max)?>, <?php echo rand($min, $max)?>); color: white; font-weight: 600"><?php echo $row['nombreClase'][0]?></i></span>
                        <span class="title"><?php echo $row['nombreClase']?></span>
                    </a>
                </li>

                <?php }  ?>
            </ul>
        </div>
        
    </div>
    
    <div class="container bookDetails">
        <div class="booksTitles">
            <div class="iconBook">
                <span class="bookIcon"><i class="fa-solid fa-book"></i></span>
            </div>
            <span><h3>Libros</h3></span>
            <!-- <div class="iconBook">
                <span class="bookIcon"><i class="fa-solid fa-book"></i></span>
            </div> -->
            <?php
                if($_SESSION['rol'] == 'admin'){
                    echo '<div class="agg_libro">';
                        echo '<a href="homeAdmin.php?clase='.$clase_iD.'" class="btn mx-3">Agregar Libro</a>';
                        echo '<a href="homeBooks.php?clase=0" class="btn">Ver Libros</a>';
                    echo '</div>';
                }
            ?>
        </div>
    </div>

    <!-- Classes Info -->
    <!-- <div class="cuerpo" id="tarjetasClases">
        <?php
            require('backend/config.php');
            require('backend/libros.php');

            $resultado = mysqli_query($conn, $libros);
            while($row = mysqli_fetch_array($resultado)){
                if($row['id_clase'] == $clase_iD){
                    echo '<a href="bookDetails.php?libro='.$row['iD'].'">'.$row['titulo'].'</a>';
                }

            } 
        ?>
    </div> -->

    <!-- Libros -->
    <div class="container libros_Gallery mt-4 mb-5">
        <div class="row">

        <?php
            require('backend/config.php');
            require('backend/libros.php');

            $resultado = mysqli_query($conn, $libros);
            while ($row = mysqli_fetch_array($resultado)) {
                if ($clase_iD == '0') {
        ?>
            <div class="col-3 col-md-3 mt-4">
                <div class="card">
                    <img class="card-img-top" <?php echo 'src="data:'.$row["tipo_imgPortada"].';base64,'.base64_encode($row["imagen_portada"]).'"'?> alt="Card image cap">

                    <div class="card-body">
                        <a class="parte1 card-title" href="bookDetails.php?libro=<?php echo $row['iD'] ?>"><?php echo $row['titulo']?>
                        </a>
                        <div class="links card-info">
                            <?php
                                if ($_SESSION['rol'] == 'admin') {
                                    echo '<a href="bookEdit.php?libro='.$row['iD'].'" class="icon2 mx-3"><i class="fa-solid fa-pen"></i></a>';
                                }
                            ?>
                            <a href="backend/verPDF.php?libro=<?php echo $row['iD'] ?>" target="_blank" class="card-info mx-3"><i class="fa-solid fa-eye"></i></a>
                            <a href="bookDetails.php?libro=<?php echo $row['iD'] ?>" class="card-info mx-3"><i class="fa-solid fa-circle-info"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } elseif ($row['id_clase'] == $clase_iD) {
        ?>
            <div class="col-3 col-md-3 mt-4">
                <div class="card">
                    <img class="card-img-top" <?php echo 'src="data:'.$row["tipo_imgPortada"].';base64,'.base64_encode($row["imagen_portada"]).'"'?> alt="Card image cap">

                    <div class="card-body">
                        <a class="parte1 card-title" href="bookDetails.php?libro=<?php echo $row['iD'] ?>"><?php echo $row['titulo']?>
                        </a>
                        <div class="links card-info">
                            <?php
                                if ($_SESSION['rol'] == 'admin') {
                                    echo '<a href="bookEdit.php?libro='.$row['iD'].'" class="icon2 mx-3"><i class="fa-solid fa-pen"></i></a>';
                                }
                            ?>
                            <a href="backend/verPDF.php?libro=<?php echo $row['iD'] ?>" target="_blank" class="card-info mx-3"><i class="fa-solid fa-eye"></i></a>
                            <a href="bookDetails.php?libro=<?php echo $row['iD'] ?>" class="card-info mx-3"><i class="fa-solid fa-circle-info"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
        }   ?>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="js/arreglo.js"></script>
    <script src="js/controlador.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        var sideMenu = document.getElementById('btnMenu');
        let navigation = document.querySelector('.navigation');
        var hamburger = document.querySelector('#leftBar');
        var body = document.querySelector('body');
        var logo = document.querySelector('.logo');

        hamburger.onclick = function(){
            body.classList.toggle('active');
            logo.classList.toggle('active');
        }

    </script>
</body>
</html>