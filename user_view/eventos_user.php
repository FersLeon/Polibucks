

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Se agrega un titulo de pagina-->
    <title>Eventos</title>
    <link rel="stylesheet" href="../styles/PaginaEventos.css">
    <link rel="stylesheet" href="../styles/styles_header.css">
    <!--Se agrega el icono dde la paguina-->
    <link rel="shortcut icon" href="../images/icon.ico" type="../images/icon.ico">
    <script src="../scripts/script_header.js" defer></script>
</head>

<body>
    <!--Navegador principal-->
    <header class="main-header">
        <img src="../images/logo.png" class="logo">
        <nav id="nav" class="main-nav">
            <div class="nav-links">
                <a class="link-item" href="../index_user.php">Inicio</a>
                <a class="link-item" href="menu_user.php">Menú</a>
                <a class="link-item" href="rewards_user.php">Rewards</a>
                <a class="link-item" href="eventos_user.php">Eventos</a>
                <a class="link-item" href="nosotros_user.php">Nosotros</a>
                <a class="link-item" href="carrito_user.php">Carrito</a>
                <a class="link-item" href="../index.php">Salir</a>
                
            </div>
        </nav>
        <button id="button-menu" class="button-menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
       
    </header>
    <header class="Evento">
        <h1>Conoce nuestros proximos eventos</h1>
    </header>
    <main class="Principio">
        <!--Se crea una seccion donde se contendra un evento-->
        <section class="Prima2">
            <h2>Jacarandas Day!</h2>
            <p>Fecha: 12 de Mayo</p>
            <!--Se agregan las imagenes-->
            <div class="Prima1">
                <img src="../images/Jacaranda.jpg" alt="Prima" height="220" width="200">
                <img src="../images/Jaca.gif" alt="Bebida1" height="220" width="200">
                <img src="../images/Jacaranda1.jpg" alt="Primav1" height="220" width="200">
            </div>
        </section>
        <!--Se crea una seccion donde se contendra un evento-->
        <section class="Prima">
            <h2>Dia del Maestro</h2>
            <p>Fecha: 15 de Mayo</p>
            <!--Se agregan las imagenes-->
            <div class="Prima1">
                <img src="../images/TeachesDay.jpg" alt="Prima" height="220" width="220">
                <img src="../images/Libreta.jpg" alt="Bebida1" height="220" width="250">
            </div>
        </section>
        <!--Se crea una seccion donde se contendra un evento-->
        <section class="Poliday">
            <h2>PoliDay</h2>
            <p>Fecha: 21 de Mayo</p>
            <div class="Prima1">
                <img src="../images/burrito.jpg" alt="Poli" height="250" width="200">
                <img src="../images/Logo.jpg" alt="Poli" height="250" width="200">
                <img src="../images/Amigurrumi.jpg" alt="Ami" height="250" width="200">
            </div>
        </section>
        <!--Se crea una seccion donde se contendra un evento-->
        <section class="Pet">
            <h2>Pet Friendly</h2>
            <h3>Clientes Frecuentes</h3>
            <!--Se agregan las imagenes-->
            <aside class="Frien">
                <img src="../images/Caro.jpeg" alt="Maya" height="250" width="250">
                <img src="../images/Nieves.jpeg" alt="Nieves" height="250" width="250">
                <img src="../images/Fanny.jpeg" alt="Nieves" height="250" width="250">
                <img src="../images/MFre.jpeg" alt="Nieves" height="250" width="250">
            </aside>
        </section>
    </main>
    <!--Lienea para dividir el contenido principal del footer-->
    <hr class="linea">
    
    <!--Pie de página-->
    <footer class="footer">
        <p>Todos los derechos reservados 2023. </p>
        <p> &copy; Polibucks S.A de C.V</p>
    </footer>
</body>

</html>