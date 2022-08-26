<?php
    require_once 'header.php';
?>
    <link rel="stylesheet" href="wwwroot/css/style.css"> 
    <nav id='navsup'class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="admin"><a class="navbar-brand">Olá: <?php echo $_SESSION['login']; ?></a></li>
            <div class="cadastrar">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Cadastrar
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="index.php?page=usuario">Usuário</a></li>
                    <li><a class="dropdown-item" href="?page=imovel">Imóvel</a></li>
                </ul>
                </li>
            </div>
            <div class="listar">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Listar
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="?page=usuario&action=listar">Usuário</a></li>
                    <li><a class="dropdown-item" href="?page=imovel&action=listar">Imóvel</a></li>
                </ul>
                </li>
            </div>
            <div class="sair">
                <li class="nav-item">
                <a class="nav-link" href="index.php">Sair</a>
                </li>
            </div>
        </ul>
        </div>
    </div>
    </nav>
</body>
</html>

<?php
require_once 'footer.php';
?>