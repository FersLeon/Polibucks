<?php
    include 'connection.php';
    session_start();
    $usuario_id= $_SESSION['usuario_nombre'];
    if(!isset($usuario_id)){
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="icon" href="images/icon.ico">
    <script src="scripts/script_menu.js" async></script>
    <script src="scripts/script_header.js" async></script>
    <link rel="stylesheet" href="styles/styles_header.css">
    <!--Se agrega el titulo de la pagina-->
    <title>Polibucks</title>
    <!--Enlace hacia los estilos-->
    <link rel="stylesheet" href="styles/styles_index.css">
    <link rel="stylesheet" href="styles/modal.css">
    <link rel="stylesheet" href="styles/styles_header.css">
    <script src="scripts/modal.js" defer></script>
    <script src="scripts/reloj.js" defer></script>

</head>

<body>
    <header class="main-header">
        <img src="Images/logo.png" class="logo">
        <nav id="nav" class="main-nav">
            <div class="nav-links">
                <a class="link-item" href="user_view/index_user.php">Inicio</a>
                <a class="link-item" href="user_view/menu_user.php">Menú</a>
                <a class="link-item" href="user_view/rewards_user.php">Rewards</a>
                <a class="link-item" href="user_view/eventos_user.php">Eventos</a>
                <a class="link-item" href="user_view/nosotros_user.php">Nosotros</a>
                <br>
                <form method = 'post' >
                    <a class="link-item" href="index.php">Salir</a>
                    <!--<button type="submit" class="logout"> Salir </button>-->
                </form><br>
                <a><p><?php echo $_SESSION['usuario_nombre']; ?></p></a>
            </div>
        </nav>
        <button id="button-menu" class="button-menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
       
    </header>


    <!--Reloj-->
    <section class="relosjs">
        <nav>
            <form name="form_dia">
                <input class="dia" type="text" name="dia" size="15" onfocus="window.document.form_dia.dia.blur()">
            </form>
            <form name="form_reloj">
                <input class="reloj" type="text" name="reloj" size="10" onfocus="window.document.form_reloj.reloj.blur()">
            </form>
        </nav>
    </section>
    <!--Contenido principal-->
    <main>
        <div class="slider">
            <!--Se crea una lista desordenada-->
           <ul>
            <!--Elementos de la lista-->
            <li><a href="rewards_user.php"><img src="Images/Menu.jpeg" alt=""></a></li>
            <li><a href="menu_user.php"><img src="Images/HolaPrinav.jpeg" alt=""></a></li>
            <li><a href="nosotros_user.php"><img src="Images/Conocenos.jpeg" alt=""></a></li>
            <li><a href="eventos_user.php"><img src="Images/DayPoli.jpeg" alt=""></a></li>
           </ul> 
        </div>
        <!--Se agregara una seccion que contienen imagen y texto-->
        <div>
            <img src="Images/Frase&I.png" alt="" width="1200" height="400" class="Contend">
        </div>
    </main>
    <div class="popup">
        <button id="close">&times;</button>
        <h2 class="modal_title">¡Bienvenido <a><span><?php echo $_SESSION['usuario_nombre']; ?></span></a>, Gracias por Visitar!</h2>


        <p class="modal_paragram">Disfruta de tu instancia </p>
    </div>
    <!--Lienea para dividir el contenido principal del footer-->
    <hr class="linea">
    <!--Pie de página-->
    <footer class="footer">
        <p>Todos los derechos reservados 2023. </p>
        <p> &copy; Polibucks S.A de C.V</p>
    </footer>
</body>


</html>