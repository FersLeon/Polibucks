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
    if(isset($_GET['delete_all'])){
        mysqli_query($conn, "DELETE FROM `order`");
        header('location:admin2.php');
    }

    if(isset($_GET['remove'])){
        $remove_id = $_GET['remove'];
        mysqli_query($conn, "DELETE FROM `order` WHERE id = '$remove_id'");
        header('location:admin2.php');
     };
     
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
    <link rel="icon" href="../images/icon.ico">
    <script src="../scripts/script_header.js" async></script>
    <!--Se agrega el titulo de la pagina-->
    <title>Ordenes</title>
    <!--Enlace hacia los estilos-->
    <link rel="stylesheet" href="../styles/styles_indexadmin2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../styles/styles_header.css">


</head>
<body>
    <header class="main-header">
        <img src="../images/logo.png" class="logo">
        <nav id="nav" class="main-nav">
            <div class="nav-links">
                <a class="link-item" href="../index_admin.php">Inicio</a>
                <a class="link-item" href="admin_user.php">Usuarios</a>
                <a class="link-item" href="admin_mensajes.php">Mensajes</a>
                <a class="link-item" href="admin2.php">Ordenes</a>
                <a class="link-item" href="admin_productos.php">Productos</a>
                <br>
                <form method = 'post' >
                    <a class="link-item" href="../index.php">Salir</a>
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
            <span>⊹ ໋. ‧˚ Ordenes ۰ ໋࣭࿐</span>
        </div>

        <div class="box-container">
            <?php
                $select_order=mysqli_query($conn, "SELECT * FROM `order`") or die('query failed');
                if(mysqli_num_rows($select_order)>0){
                    while($fetch_order = mysqli_fetch_assoc($select_order)){

            ?>
            <div class="box">
                <p> PEDIDO ID: <br> <span><?php echo $fetch_order['id'];?> </span> </p>
                <p> USUARIO: <br> <span><?php echo $fetch_order['name'];?> </span> </p>
                <p> EMAIL: <br> <span><?php echo $fetch_order['email'];?> </span> </p>
                <p> NÚMERO: <br> <span><?php echo $fetch_order['number'];?><span></p>
                <p> MÉTODO DE PAGO: <br> <span><?php echo $fetch_order['method'];?><span></p>
                <p> DIRECCION: <br> <span><?php echo $fetch_order['flat'];?>,<?php echo $fetch_order['state'];?>,
                <?php echo $fetch_order['country'];?>,<?php echo $fetch_order['pin_code'];?><span></p>
                <p> ORDEN: <br><span><?php echo $fetch_order['total_products'];?><span></p> <br>
                <td><a href="admin2.php?remove=<?php echo $fetch_order['id']; ?>" onclick="return confirm('¿Seguro de la orden está lista? Σ (O_O;)');" class="delete-btn"> <i class="fas fa-trash"></i> ¡Orden Lista!</a></td>


            </div>
            <?php
                    }
                }
            ?>
        </div>

        
        

    </main>
   
    <!--Lienea para dividir el contenido principal del footer
    <hr class="linea">
    <footer class="footer">
        <p>Todos los derechos reservados 2023. </p>
        <p> &copy; Polibucks S.A de C.V</p>
    </footer>-->
    
</body>
</html>