<?php
    @include 'config.php';
    session_start();
    $admin_id= $_SESSION['admin_nombre'];
    if(!isset($admin_id)){
        header('location:login.php');
    }
    if(isset($_POST['logout'])){
        session_destroy();
        header('location:index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="icon" href="images/icon.ico">
    <script src="scripts/script_header.js" async></script>
    <!--Se agrega el titulo de la pagina-->
    <title>Administración</title>
    <!--Enlace hacia los estilos-->
    <link rel="stylesheet" href="styles/styles_indexadmin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles/styles_header.css">

</head>
<body>
    <header class="main-header">
        <img src="images/logo.png" class="logo">
        <nav id="nav" class="main-nav">
            <div class="nav-links">
                <a class="link-item" href="index_admin.php">Inicio</a>
                <a class="link-item" href="admin_view/admin_user.php">Usuarios</a>
                <a class="link-item" href="admin_view/admin_mensajes.php">Mensajes</a>
                <a class="link-item" href="admin_view/admin_prod.php">Productos</a>
                <br>
                <form method = 'post' >
                    <a class="link-item" href="index.php">Salir</a>
                    <!--<button type="submit" class="logout"> Salir </button>-->
                </form><br>
                <a><p><?php echo $_SESSION['admin_nombre']; ?></p></a>
            </div>
        </nav>
        <button id="button-menu" class="button-menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
       
    </header>
    <!--Contenido principal-->
    <main>
        <div class="banner">
            <span>Panel Administrativo</span>
        </div>

        <section class="tablero">
            
            <div class="box-container">
            
                <div class="box">
                    <?php
                        $select_mensajes = mysqli_query($conn, "SELECT * FROM `mensajes` ") or die ('query failed');
                        $num_of_mensajes = mysqli_num_rows($select_mensajes);
                    ?>
                    <h3> <?php echo $num_of_mensajes; ?></h3>
                    <p>Mensajes pendientes</p>
                </div>
                <div class="box">
                    <?php
                        $select_usuarios = mysqli_query($conn, "SELECT * FROM `usuarios` WHERE tipo = 'usuario' ") or die ('query failed');
                        $num_of_usuarios = mysqli_num_rows($select_usuarios);
                    ?>
                    <h3> <?php echo $num_of_usuarios; ?></h3>
                    <p>Usuarios Registrados</p>
                </div>
                <div class="box">
                    <?php
                        $select_ordenes = mysqli_query($conn, "SELECT * FROM `order`") or die ('query failed');
                        $num_of_ordenes = mysqli_num_rows($select_ordenes);
                    ?>
                    <h3> <?php echo $num_of_ordenes; ?></h3>
                    <p>Ordenes pendientes</p>
                </div>
            </div>
            <img src="Images/back.png" alt=""  class="image">
        </section>

        

    </main>
   
    <!--Lienea para dividir el contenido principal del footer
    <hr class="linea">
    <footer class="footer">
        <p>Todos los derechos reservados 2023. </p>
        <p> &copy; Polibucks S.A de C.V</p>
    </footer>-->
    
</body>
</html>