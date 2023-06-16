<header class="header">

   <div class="flex">

      <img src="../images/logo.png" class="logo">

      <nav class="navbar">
         <a class="link-item" href="admin.php">Productos</a>
         <a class="link-item"  href="products.php">Menú</a>
         <a class="link-item" href="../index_admin.php">Inicio</a>
         <a class="link-item" href="admin_user.php">Usuarios</a>
         <a class="link-item" href="admin_mensajes.php">Mensajes</a>
         <a class="link-item" href="products.php">Productos</a>
         
      
      </nav>

      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>
      <a href="cart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a>

      

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>
