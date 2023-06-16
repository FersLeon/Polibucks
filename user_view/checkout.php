<?php

@include 'config.php';
session_start();
$usuario_email= $_SESSION['usuario_email'];
$email = $_SESSION['usuario_email'];
if(!isset($usuario_email)){
    header('location:checkout.php');
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
    

   
if(isset($_POST['order_btn'])){


   $number = $_POST['number'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `order`(name, number, email, method, flat, state, country, pin_code, total_products, total_price) VALUES('$name','$number','$email','$method','$flat','$state','$country','$pin_code','$total_product','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>★ ۰ ໋࣭  ¡Gracias por tu compra! ۰ ໋࣭★ ⋆.</h3>
         <div class='order-detail'>
            <span class='total'> Compra total : $".$price_total.".00  </span>
         </div>
         <div class='customer-details'>
            <p> Nombre: <span>".$name."</span> </p>
            <p> Número : <span>".$number."</span> </p>
            <p> Email : <span>".$email."</span> </p>
            <p> Dirección : <span>".$flat.",".$state.", ".$country." - ".$pin_code."</span> </p>
            <p> Método de pago : <span>".$method."</span> </p>
         </div>
            <a href='menu_user.php' class='btn'>¡Seguir comprando!</a>
         </div>
      </div>
      ";
   }

}

?>

<?php
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout</title>
   <link rel="icon" href="../images/icon.ico">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../styles/style_orden.css">

   <link rel="stylesheet" href="../styles/styles_headeradmin.css">

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
<div class="banner">
        <p> ⊹ ໋. ‧˚ Completa tu orden ۰ ໋࣭࿐</p>
    </div>

<div class="container">

<section class="checkout-form">

   

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>¡El carrito está vacio!</span></div>";
      }
      ?>
      <span class="grand-total"> Total : $<?= $grand_total; ?>.00 </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>Nombre</span> <br> <br>
            <span><?php echo $_SESSION['usuario_nombre']; ?></span>
         </div>
         <div class="inputBox">
            <span>Número de teléfono</span>
            <input type="number" placeholder="Ingresa tu número de teléfono" name="number" required>
         </div>
         <div class="inputBox">
            <span>Email</span> <br> <br>
            <span name="email"><?php echo $_SESSION['usuario_email']; ?></span>
            
         </div>
         <div class="inputBox">
            <span>Método de pago</span>
            <select name="method">
               <option value="Efectivo" selected>Efectivo</option>
               <option value="Tarjeta de credito">Tarjeta de credito</option>
               <option value="Paypal">Paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Direccion</span>
            <input type="text" placeholder="e.g. Tlaxcala" name="flat" required>
         </div>

         <div class="inputBox">
            <span>Estado</span>
            <input type="text" placeholder="e.g. Tlaxcala" name="state" required>
         </div>
         <div class="inputBox">
            <span>País</span>
            <input type="text" placeholder="e.g. México" name="country" required>
         </div>
         <div class="inputBox">
            <span>Código postal</span>
            <input type="text" placeholder="e.g. 90830" name="pin_code" required>
         </div>
      </div>
      <input type="submit" value="¡Listo calisto! 	ฅ (• ㅅ • ❀) ฅ" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="../scripts/script.js"></script>
   
</body>
</html>