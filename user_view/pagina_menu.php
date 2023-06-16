
<?php

@include 'config.php';

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = '¡Este producto ya está en tu carrito! Elige otro ૮ • ﻌ - ა ';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = '¡El producto se ha añadido correctamente! ૮꒰ ˶• ༝ •˶꒱ა ♡';
   }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Menú</title>
   <link rel="icon" href="../images/icon.ico">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../styles/style_admin.css">
   <link rel="stylesheet" href="../styles/styles_headeradmin.css">
   <link rel="stylesheet" href="../styles/styles_menu.css">
   <link rel="stylesheet" href="../styles/modal.css">
   <script src="../scripts/modal.js" defer></script>
</head>
<body>
   


<header class="main-header">
        <img src="../images/logo.png" class="logo">
        <nav id="nav" class="main-nav">
            <div class="nav-links">
                <a class="link-item" href="../index_user.php">Inicio</a>
                <a class="link-item" href="pagina_menu.php">Menú</a>
                <a class="link-item" href="../normal_view/pagina_rewards.html">Rewards</a>
                <a class="link-item" href="../normal_view/PaginaEventos.html">Eventos</a>
                <a class="link-item" href="../normal_view/nosotros.html">Nosotros</a>
                <a class="link-item" href="../login.php">Log In</a>

            
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

<div class="container">

<section class="products">
   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">

            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <h3><?php echo $fetch_product['name']; ?></h3>
            <img src="../admin_view/uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
            <div class="price">$<?php echo $fetch_product['price']; ?>.00</div>
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
         
         </div>
      </form>
      

      <?php
         };
      };
      ?>

   </div>

</section>

</div>

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

<!-- custom js file link  -->
<script src="js/script.js"></script>
<div class="popup">
        <button id="close">&times;</button>
        <h2 class="modal_title">¿Se te antoja algo? <a href="../login.php">Inicia Sesión</a> para ordenar algo rico </h2>
        <h2 class="modal_title">૮꒰˵• ﻌ •˵꒱ა </h2>

    </div>

<footer class="footer">
        <p>Todos los derechos reservados 2023. </p>
        <p> &copy; Polibucks S.A de C.V</p>
    </footer>

</body>
</html>