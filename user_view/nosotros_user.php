<?php
 @include 'config.php';
    session_start();
    $usuario_email= $_SESSION['usuario_email'];
    $email = $_SESSION['usuario_email'];
    if(!isset($usuario_email)){
         header('location:nosotros_user.php');
    }
    if(isset($_POST['logout'])){
        session_destroy();
        header('location:index.php');
    }
    $usuario_id= $_SESSION['usuario_nombre'];
    $name = $_SESSION['usuario_nombre'];
    if(!isset($usuario_id)){
         header('location:login.php');
        }
     
 
    
?>

<?php
  

    if(isset($_POST['submit-btn'])) {
        $filter_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $name = mysqli_real_escape_string($conn, $filter_name);

        $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $email = mysqli_real_escape_string($conn, $filter_email);

        $filter_cel = filter_var($_POST['cel'], FILTER_SANITIZE_STRING);
        $cel = mysqli_real_escape_string($conn, $filter_cel);

        $filter_msj = filter_var($_POST['msj'], FILTER_SANITIZE_STRING);
        $msj = mysqli_real_escape_string($conn, $filter_msj);

        $select_user = mysqli_query($conn, "SELECT * FROM `mensajes`") or die('query failed');

        if(mysqli_num_rows($select_user) > 0) { 
            $row = mysqli_fetch_assoc($select_user);
        } else {
            $insert_query = "INSERT INTO `mensajes` (`nombre`, `email`, `numero`,`mensaje`) VALUES ('$name', '$email', '$cel','$msj')";
            if (mysqli_query($conn, $insert_query)) {
                $message[] = 'Se ha registrado exitosamente';
            } else {
                $message[] = 'Error al insertar los datos en la base de datos: ' . mysqli_error($conn);
            }
            
        }

      
        
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Script JS-->
    <script src="../scripts/AJAX.js" defer></script>
    <script src="../scripts/menu.js" defer></script>
    <script src="../scripts/formulario.js" defer></script>
    <script src="../scripts/script_header.js" defer></script>
    <!--Link icono-->
    <link rel="shortcut icon" href="../images/icon.ico" type="../images/icon.ico">
    <!--Estilo de imágenes-->
    <link rel="stylesheet" href="../styles/estiloimages.css">
    <!--Estilo de pagina-->
    <link rel="stylesheet" href="../styles/styles_header.css">
    <link rel="stylesheet" href="../styles/estilosgeneral.css">
    <!--Estilo formulario-->
    <link rel="stylesheet" href="../styles/estiloform.css">
    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sono&family=Tilt+Warp&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Tilt+Neon&display=swap" rel="stylesheet">
    <title>Nosotros-Polibucks</title>
</head>

<body>  
    <!--Primera barra de navegacion-->  
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
    <!--Segunda barra de navegacion-->
    <header class="main-header2">
        <a class="main-logo2" href="https://progradudi.netlify.app" ></a>
        <nav id="nav2" class="main-nav2">
            <div class="nav-links2" >
                <a class="link-item2" href="#Contactanos">Contáctanos</a>
                <a class="link-item2" href="#unetef">Únete</a>
                <a class="link-item2" href="#Ubicacion">Ubicación</a>
                <a class="link-item2" href="#Finanzas">Finanzas</a> 
            </div>
            <br>
        </nav> 
        <button id="button-menu2" class="button-menu2" >
            <span></span>
            <span></span>
            <span></span>
        </button>  
    </header>

    <main>
        <h2 class="contactanoss">Contáctanos</h2> <br>
        <!--Seccion de contactos-->
        <div class="Contactanos" id="Contactanos">
            <!--Primera imagen de contacto-->
            <section class="tele1">
                <img class="img1" src="../images/teletubbie1.jpg" alt="teletubbie1" width="200" height="200">
                <p><img src="../images/insta.png" alt="insta" width="30" height="30"><a href="https://instagram.com/fany_fer_?igshid=ZDdkNTZiNTM=">@fany_fer_</a></p>
                <p>Teléfono: <a href="tel:+522462238417">2462238417</a></p>
                <p>Correo: <a href="mailto:ferosoorno@gmail.com">ferosoorno@gmail.com</a></p>
            </section>
            <!--Segunda imagen de contacto-->
            <section class="tele2">
                <img class="img2" src="../images/teletubbie2.jpg" alt="teletubbie2" width="200" height="200">
                <p><img src="../images/insta.png" alt="insta" width="30" height="30"><a href="https://instagram.com/naomi_peraltal?igshid=YmMyMTA2M2Y=">@naomi_peraltal</a></p>
                <p>Teléfono: <a href="tel:+522411156459">2411156459</a></p>
                <p>Correo: <a href="mailto:naomi.alvarez.2003@hotmail.com">naomi.alvarez.2003@hotmail.com</a></p>
            </section>
            <!--Tercera imagen de contacto-->
            <section class="tele3">
                <img class="img3" src="../images/teletubbie3.jpg" alt="teletubbie3" width="200" height="200">
                <p><img src="../images/insta.png" alt="insta" width="30" height="30"><a href="https://instagram.com/janet.tecuapacho?igshid=ZDdkNTZiNTM=">@janet.tecuapacho</a></p>
                <p>Teléfono: <a href="tel:+522411758390">2411758390</a></p>
                <p>Correo: <a href="mailto:janet.badillo111@gmail.com">janet.badillo111@gmail.com</a></p>
            </section>
            <!--Cuarta imagen de contacto-->
            <section class="tele4">
                <img class="img4" src="../images/teletubbie4.jpg" alt="teletubbie4" width="200" height="200">
                <p><img src="../images/insta.png" alt="insta" width="30" height="30"><a href="https://instagram.com/fers.leon?igshid=ZDdkNTZiNTM=">@fers.leon</a></p>
                <p>Teléfono: <a href="tel:+522461506316">2461506316</a></p>
                <p>Correo: <a href="mailto:maferleonpl10@gmail.com">maferleonpl10@gmail.com</a></p>
            </section>
        </div>
        <br>
        <!--Título formulario-->
        <p class="unete">¡Queremos saber tu opinión!</p>

        <!--Seccion de formulario-->
        <div class="unetef" id="unetef">
        <p class="pform">Envíanos tus datos y se parte de nosotros</p> <br>
        <form class="form" method="post">
            <!--Etiqueta de nombre-->
            <section class="inputContainer">
            <input type="tel" class="input" placeholder="a"  name="cel" required>
            <p class="labell"><?php echo $_SESSION['usuario_nombre']; ?></p>
            <p class="label">Nombre:</p> <br>
            
            </section>
            <!--Etiqueta de apellidos-->
            <section class="inputContainer">
                <input type="tel" class="input" placeholder="a"  name="cel" required>
                <p class="labell"><?php echo $_SESSION['usuario_email']; ?></p>
                <p  class="label">Email:</p> <br>
                
            </section>
            <!--Etiqueta de telefono-->
            <section class="inputContainer">
                <input type="tel" class="input" placeholder="a"  name="cel" required>
                <p  class="label">Teléfono:</p>
            </section>
            <!--Etiqueta de correo-->
            <section class="inputContainer">
                <input type="text" class="input"  name="msj" placeholder="a" required>
                <p  class="label">Mensaje:</p>
            </section>

            <?php
                if (isset($message)) {
                    foreach ($message as $msg) {
                        echo '
                            <div class="message">
                                <span>' . $msg . '</span>
                                <i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i>
                            </div>
                       ';
                    }
                }
            ?>
        
            <!--Botones-->
            <p>
            <input id="cargar" class="boton1" type="submit"  name="submit-btn" value="Enviar">
            <input class="boton2" type="reset" value="Clean">
            <p id="contenido"></p>
            </p>
        </form>
        </div>
       <br>
       <!--Seccion de ubicacion-->
       <section class="Ubicacion" id="Ubicacion">
        <h2 class="ubi">Ubicación</h2>
        <br>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3765.0574906306006!2d-98.23635749006053!3d19.3233114440883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cfd92e87bd454b%3A0xc7b932134f10a37b!2sUPIIT%3A%20Unidad%20Profesional%20Interdisciplinaria%20en%20Ingenier%C3%ADa%20Campus%20Tlaxcala%20IPN!5e0!3m2!1ses-419!2smx!4v1682887234902!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">MAPA</iframe>
       </section>
       <br>
        <!--Seccion de finanzas-->
        <h2 class="fin">Finanzas</h2>
       <section class="dropdown" id="Finanzas">
        <div class='title pointerCursor'>Click! <i class="fa fa-angle-right"></i></div>
        <div class='menu pointerCursor hide'>
            <p> <strong> Polibucks S.A de C.V </strong><br> Cofee shop <br> Estado de resultados <br> del 1 de Enero al 31 de Diciembre del 2022</p>
            <p>Ventas:____________________1.000.000</p>
            <p>Costo de ventas:__________-585.800</p>
            <p> <strong>Utilidad bruta:</strong>__________-414.200</p>
            <p>Gastos de operacion:_____-306.750</p>
            <p><strong>Utilidad en operacion:</strong>_____-107.450</p>
            <p>Otros gastos:_______________-25.000</p>
            <p><strong>Utilidad antes de impuestos:</strong>__100.710</p>
            <p>Impuestos:____________________-55.999</p>
            <p><strong>Utilidad neta:</strong>______________-55.769</p>
            </div>
        </div>
       </section>
    </main>

    <hr class="linea">
    
    <!--Pie de página-->
    <footer class="footer">
        <p>Todos los derechos reservados 2023. </p>
        <p> &copy; Polibucks S.A de C.V</p>
    </footer>

</body>
</html>
