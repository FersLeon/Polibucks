<?php

@include 'config.php';

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:carrito_user.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:carrito_user.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:carrito_user.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Carrito</title>
   <link rel="icon" href="../images/icon.ico">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../styles/style_orden.css">
   <script src="../scripts/script_header.js" async></script>
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
        <p>☆.。.:* Carrito ・°☆.。.:*</p>
    </div>


<div class="container">

<section class="shopping-cart">



   <table>

      <thead>
         <th></th>
         <th>Nombre</th>
         <th>$</th>
         <th>Cantidad</th>
         <th>Total</th>
         <th>ʕ • ᴥ • ʔ</th>
      </thead>

      <tbody>

         <?php 
         
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><img src="../admin_view/uploaded_img/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td>$<?php echo number_format($fetch_cart['price']); ?>.00</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                  <input type="submit" value="Actualizar" name="update_update_btn">
               </form>   
            </td>
            <td>$<?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?>.00</td>
            <td><a href="carrito_user.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('¿Está seguro de borrarlo? (⊙_⊙)')" class="delete-btn"> <i class="fas fa-trash"></i></a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
            };
         };
         ?>
         <tr class="table-bottom">
            <td><a href="products.php" class="option-btn" style="margin-top: 0;">¡Seguir comprando!</a></td>
            <td colspan="3">=</td>
            <td>$<?php echo $grand_total; ?>.00</td>
            <td><a href="carrito_user.php?delete_all" onclick="return confirm('¿Seguro de borrar todo? Σ (O_O;)');" class="delete-btn"> <i class="fas fa-trash"></i> Mejor no </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">Completa tu orden aquí</a>
   </div>

</section>

</div>
   
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>