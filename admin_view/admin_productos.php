<?php

@include 'config.php';

if(isset($_POST['add_product'])){
   $p_name = $_POST['p_name'];
   $p_price = $_POST['p_price'];
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = 'uploaded_img/'.$p_image;

   $insert_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image) VALUES('$p_name', '$p_price', '$p_image')") or die('query failed');

   if($insert_query){
      move_uploaded_file($p_image_tmp_name, $p_image_folder);
      $message[] = 'Producto añadido correctamente';
   }else{
      $message[] = 'Se ha producido un error';
   }
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:admin_productos.php');
      $message[] = 'El producto se ha eliminado';
   }else{
      header('location:admin_productos.php');
      $message[] = 'No se ha podido eliminar el producto';
   };
};

if(isset($_POST['update_product'])){
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_price = $_POST['update_p_price'];
   $update_p_image = $_FILES['update_p_image']['name'];
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder = 'uploaded_img/'.$update_p_image;

   $update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_p_name', price = '$update_p_price', image = '$update_p_image' WHERE id = '$update_p_id'");

   if($update_query){
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      $message[] = 'Se ha actualizado correctamente';
      header('location:admin_productos.php');
   }else{
      $message[] = 'Error al actualizar';
      header('location:admin_productos.php');
   }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Productos</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="../styles/style_admin.css">
   <link rel="stylesheet" href="../styles/styles_headeradmin.css">
   <script src="../scripts/script_header.js" async></script>

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
   
            </div>
        </nav>
        <button id="button-menu" class="button-menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
       
    </header>
<div class="container">

<section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>Añadir nuevo producto</h3>
   <input type="text" name="p_name" placeholder="Nombre" class="box" required>
   <input type="number" name="p_price" min="0" placeholder="Precio" class="box" required>
   <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
   <?php

      if(isset($message)){
         foreach($message as $message){
         echo '
         <div class="message">
            <span>' . $message . '</span>
            <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i>
         </div>';
         };
      };

   ?>
   <input type="submit" value="Añadir" name="add_product" class="resetBtn">
   <input type="reset" class="resetBtn" value="Cancelar">
</form>

</section>

<section class="display-product-table">

   <table>

      <thead>
         <th>Imagen</th>
         <th>Nombre</th>
         <th>Precio</th>
         <th>ʕっ•ᴥ•ʔっ</th>
      </thead>

      <tbody>
         <?php
         
            $select_products = mysqli_query($conn, "SELECT * FROM `products`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td>$<?php echo $row['price']; ?>.00</td>
            <td>
               <a href="admin_productos.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('¿Estás seguro de eliminar este producto?');"> <i class="fas fa-trash"></i> Eliminar </a>
               <a href="admin_productos.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> Actualizar </a>
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>No se han añadido productos ⊙︿⊙ </div>";
            };
         ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
      <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
      <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
      <input type="submit" value="Actualizar" name="update_product" class="resetBtn">
      <input type="reset" class="resetBtn" value="Cancelar">
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>

</section>

</div>















<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>