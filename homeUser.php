<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e6dfebc255.js" crossorigin="anonymous"></script>
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
    <link rel="shortcut icon" href="img/logo_B.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/homeUser.css">
    
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
                    <span data-toggle="dropdown" aria-expanded="false" id="profilePic"><img id="imgInstructor" <?php
                        if($_SESSION['img_Perfil'] == NULL){ echo 'src="img/images/default_user.png"';}else{
                            echo 'src="data:'.$_SESSION["tipo_imagen"].';base64,'.base64_encode($_SESSION["img_Perfil"]).'"';}?>
                        alt="" srcset=""></span>
                    <!-- DropDownMenu -->
                    <div class="dropdown-menu dropdown-menu-right" style="width: 300px; border-radius: 3%;" aria-labelledby="imgInstructor" id="dropMenu">
                        <div class="instructor row" style="display: flex;">
                            <span class="dropdown-item infoInstructor col-1"><img id="imgInstructor" <?php
                        if($_SESSION['img_Perfil'] == NULL){ echo 'src="img/images/default_user.png"';}else{
                            echo 'src="data:'.$_SESSION["tipo_imagen"].';base64,'.base64_encode($_SESSION["img_Perfil"]).'"';}?>
                        alt="" srcset=""></span>
                            <div class="infoInstructor col-11">
                                <h5 style="margin-left: 10px; margin-bottom: 0px; font-size: 15px;"><?php echo $_SESSION['usuario']?></h5>
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
            <div class="logo" >
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

                    $min = 0;
                    $max = 255;

                ?>

                <li class="list">
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

    <div class="container">
    
    <div class="userTitle">
        <div class="iconBook">
            <span class="bookIcon"><i class="fa-solid fa-user"></i></span>
        </div>
        <span><h3>Datos Personales</h3></span>
    </div>

    <!-- Detalle Usuario -->
    <div class="container form-Actualizar">
        <form action="backend/actualizar_Perfil.php" method="post" enctype="multipart/form-data">
            <div class="row">

                <div class="col-md-6 img_Usuario">
                    <img class="img_usuarioF mb-3" <?php if($_SESSION['img_Perfil'] == NULL){ echo 'src="img/images/default_user.png"';}else{ echo 'src="data:'.$_SESSION["tipo_imagen"].';base64,'.base64_encode($_SESSION["img_Perfil"]).'"';}?> alt="" srcset="">
                    <!-- <img class="img_usuarioF mb-3" src="img/images/goku.jpg" alt="" srcset=""> -->
                    <input type="file" class="form-control" id="archivo_img" name="archivo_img" placeholder="Example input placeholder">
                </div>
                

                <div class="col-md-6 mb-3 mt-3">
                    <div class="info_Usuario">
                        <div class="col-12">
                            <p>Nombre Completo: <span><?php echo $_SESSION['nombreCompleto']?></span></p>
                        </div>
    
                        <div class="col-12">
                            <p>Usuario: <span><?php echo $_SESSION['usuario']?></span></p>
                        </div>
    
                        <div class="col-12">
                            <p>Correo Electronico: <span><?php echo $_SESSION['correo']?></span></p>
                        </div>
                    </div>
                </div>

                <div class="col-6 img_Usuario">
                    <input name="actualizar" type="submit" class="btn" value="Actualizar Perfil" />
                </div>
                
            </div>
        </form>
        
    </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalAddClass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <h5 class="modal-title" id="modalNuevaClase">Crear Clase</h5>
                <div class="modal-body modalBody">
                    <form class="row formInput">
                        <div class="col-12">
                        <input type="text" class="form-control marginForm inputFocus" id="nombreClase" placeholder="Nombre de la Clase (Obligatorio)">
                        <input type="text" class="form-control marginForm" id="seccion" placeholder="Sección">
                        <input type="text"class="form-control marginForm" id="codigo" placeholder="Código">
						<input type="text"class="form-control marginForm" id="descripcion" placeholder="Descripción">
                        <input type="text"class="form-control marginForm" id="aula" placeholder="Aula">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" style="
                    color: #717479;" data-dismiss="modal" onclick="vaciarCampos()">Cancelar</button>
                    <button type="button" id="btn-guardar" class="btn btn-outline-light" style="
                    color: #717479;" onclick="crearClase()">Crear</button>
                </div>
            </div>
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