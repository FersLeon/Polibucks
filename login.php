<?php
    include 'connection.php';
    session_start();

    if(isset($_POST['submit-btn'])) {
        
        $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $email = mysqli_real_escape_string($conn, $filter_email);

        $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $password = mysqli_real_escape_string($conn, $filter_password);

        $select_user = mysqli_query($conn, "SELECT * FROM `usuarios` WHERE email = '$email'") or die('query failed');

        if(mysqli_num_rows($select_user) > 0) { 
            $row = mysqli_fetch_assoc($select_user);
            
            if($row['tipo']=='admin'){
                $_SESSION['admin_nombre'] = $row['nombre'];
                $_SESSION['admin_email'] = $row['email'];
                $_SESSION['admin_id'] = $row['id'];
                header('location:index_admin.php');
            } else if($row['tipo']=='usuario'){
                $_SESSION['usuario_nombre'] = $row['nombre'];
                $_SESSION['usuario_email'] = $row['email'];
                $_SESSION['usuario_id'] = $row['id'];
                header('location:index_user.php');
            } else{
                $message[]='Correo o contraseña incorrecta';
            }

  
        }

      
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&family=Tilt+Warp&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">    
  <link rel="stylesheet" href="styles/style.css">
  <title>Iniciar Sesion</title>



</head>
<body>
  
    <section>
        <div class="form-box">
            
            <div class="form-value">
               
             
                <form  method="post">
                    <h2 class="Title">Iniciar Sesion</h2>
                    
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" class="input" required>
                        <label for="" class="label">Email</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" class="input" required>
                        <label for="" class="label">Contraseña</label>
                    </div>

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
                   
                    <input type="reset" class="resetBtn" value="Cancelar">
                    <input type="submit" name="submit-btn" class="submitBtn" value="Iniciar">
                    <div class="register">
                        <p>¿No tienes una cuenta? <a href="registro.php">¡Registrate ahora!</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

