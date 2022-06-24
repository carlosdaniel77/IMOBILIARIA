<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="wwwroot/css/style.css"> 

</head>
<body>
  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=imovel&action=listar">Lista de Imóveis</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=usuario&action=listar">Lista de Usuários</a>
      </li>
      <div class="listacadastro">      
          <h1><label>Lista de Cadastro</label></h1>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <button><a class="dropdown-item" href="index.php?page=imovel">Cadastro do Imóvel</a></button>
          <button><a class="dropdown-item" href="index.php?page=usuario">Cadastro do Usuário</a></button>   
      </div>
        
    </ul>
  </div>
</body>
</html>