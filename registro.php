<?php
    include 'connection.php';

    if(isset($_POST['submit-btn'])) {
        $filter_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $name = mysqli_real_escape_string($conn, $filter_name);

        $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $email = mysqli_real_escape_string($conn, $filter_email);

        $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $password = mysqli_real_escape_string($conn, $filter_password);

        $filter_pasword = filter_var($_POST['pasword'], FILTER_SANITIZE_STRING);
        $pasword = mysqli_real_escape_string($conn, $filter_pasword);

        $select_user = mysqli_query($conn, "SELECT * FROM `usuarios` WHERE email = '$email'") or die('query failed');

        if(mysqli_num_rows($select_user) > 0) { 
            $message[]= 'Este usuario ya existe';
        } else {
            if ($password != $pasword) {
                $message[] = 'Contraseña incorrecta';
            } else {
                $insert_query = "INSERT INTO `usuarios` (`nombre`, `email`, `contrase`) VALUES ('$name', '$email', '$password')";
                if (mysqli_query($conn, $insert_query)) {
                    $message[] = 'Se ha registrado exitosamente';
                } else {
                    $message[] = 'Error al insertar los datos en la base de datos: ' . mysqli_error($conn);
                }
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
  <title>Registro</title>
  <link rel="icon" href="Images/icon.ico">


</head>
<body>
  
    <section>
        <div class="form-box">
            
            <div class="form-value">
               
             
                <form  method="post">
                    <h2 class="Title">Registro</h2>
                    
                    <div class="inputbox">
                        <ion-icon name="happy-outline"></ion-icon>
                        <input type="text" name="name" class="input" required>
                        <label for="" class="label">Nombre de usuario</label>
                    </div>

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
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="pasword" class="input" required>
                        <label for="" class="label">Confirmar contraseña</label>
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
                    <input type="submit" name="submit-btn" class="submitBtn" value="Enviar">
                    <div class="register">
                        <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

