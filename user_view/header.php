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
       