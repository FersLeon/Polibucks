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
<html lang="es">

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
    <link rel="stylesheet" href="../styles/styles_menu.css">
    <link rel="icon" href="images/icon.ico">
    <script src="../scripts/script_menu.js" async></script>
    <script src="../scripts/script_header.js" async></script>
    <link rel="stylesheet" href="../styles/styles_header.css">
    <title>Menu</title>
</head>

<body>

    <header class="main-header">
        <img src="../images/logo.png" class="logo">
        <nav id="nav" class="main-nav">
            <div class="nav-links">
                <a class="link-item" href="../index_user.php">Inicio</a>
                <a class="link-item" href="menu_user.php">Menú</a>
                <a class="link-item" href="rewards_user.php">Rewards</a>
                <a class="link-item" href="eventos_user.php">Eventos</a>
                <a class="link-item" href="nosotros_user.php">Nosotros</a>
                <br>
                <form method = 'post' >
                    <a class="link-item" href="../index.php">Salir</a>
                    <!--<button type="submit" class="logout"> Salir </button>-->
                </form><br>
                <a><span><?php echo $_SESSION['usuario_nombre']; ?></span></a>
            </div>
        </nav>
        <button id="button-menu" class="button-menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
       
    </header>
    <div class="banner">
        <p>Menú</p>
    </div>
    <section class="contenedor">
        <!-- Productos -->
       
        <section class="contenedor-items">
            <div class="item">
                <span class="badge">¡Nuevo!</span>

                <span class="titulo-i">
                    Capucchino
                </span>
                <img src="../images/capucchino.png" alt="" class="img-item">
                <span class="precio-p">
                    $25.00
                </span>
                <button class="boton_1">Agregar al Carrito</button>
            </div>
       
            <div class="item">
                <span class="badge">¡Nuevo!</span>
                <span class="titulo-i">
                    Caramel Frapucchino
                </span>
                
                <img src="../images/caramel_frappuchino.png" alt="" class="img-item">
                <span class="precio-p">
                    $25.00
                </span>
                
                <button class="boton_1">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="badge">¡Nuevo!</span>
                <span class="titulo-i">
                    Dolce Cold
                </span>
                <img src="../images/dolce_cold.png" class=" img-item">
                <span class="precio-p">
                    $30.00
                </span>
                <button class="boton_1">Agregar al Carrito</button>
            </div>

            <div class="item">
                <span class="titulo-i">
                    Calabaza Calabacín
                </span>
                <img src="../images/capuuchino_pumpki.png" alt="" class="img-item">
                <span class="precio-p">
                    $28.00
                </span>
                <button class="boton_1">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-i">
                    Fresas con Crema
                </span>
                <img src="../images/fresasconcrema.png" alt="" class="img-item">
                <span class="precio-p">
                    $22.00
                </span>
                <button class="boton_1">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-i">
                    Ice Ice Baby
                </span>
                <img src="../images/vanilla_cream.png" alt="" class="img-item">
                <span class="precio-p">
                    $27.00
                </span>
                <button class="boton_1">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-i">
                    Mokka
                </span>
                <img src="../images/mocha.png" alt="" class="img-item">
                <span class="precio-p">
                    $30.00
                </span>
                <button class="boton_1">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-i">
                    Mokkachio
                </span>
                <img src="../images/mokacchino.png" alt="" class="img-item">
                <span class="precio-p">
                    $29.00
                </span>
                <button class="boton_1">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-i">
                    Soda Italiana
                </span>
                <img src="../images/soda_italiana.png" alt="" class="img-item">
                <span class="precio-p">
                    $20.00
                </span>
                <button class="boton_1">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-i">
                    Matcha
                </span>
                <img src="../images/matcha.png" alt="" class="img-item">
                <span class="precio-p">
                    $42.00
                </span>
                <button class="boton_1">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-i">
                    Tea Frutos Rojos
                </span>
                <img src="../images/te_frutosrojos.png" alt="" class="img-item">
                <span class="precio-p">
                    $25.00
                </span>
                <button class="boton_1">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-i">
                    Dragon Mango
                </span>
                <img src="../images/mango_dragon.png" alt="" class="img-item">
                <span class="precio-p">
                    $38.00
                </span>
                <button class="boton_1">Agregar al Carrito</button>
            </div>



        </section>

        <!-- Carrito de Compras -->
        <section class="carrito" id="carrito">
            <div class="titulo-carrito">
                <h2>Carrito de compras</h2>
            </div>

            <div class="carrito-items">

            </div>
            <div class="total">
                <div class="fila">
                    <strong>Total</strong>
                    <span class="totaltotal">
                        $10.00
                    </span>
                </div>
                <button class="boton-2">Pagar <i class="fa-solid fa-bag-shopping"></i> </button>
            </div>
        </section>
    </section>


    <hr class="linea">
    <footer class="footer">
        <p>Todos los derechos reservados </p>
        <p>Copyright &copy; Polibucks S.A de C.V</p>
    </footer>
</body>


</html>