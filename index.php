<?php
session_start();

//importa o UsuarioController.php
require_once 'controller/UsuarioController.php';
require_once 'controller/ImovelController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>    
</head>
<body>
    <?php
        if(isset($_SESSION['logado']) && $_SESSION['logado'] == true){
            require_once 'view/menu.php';
        
            require_once 'view/otherviews/home.php';
            if (isset($_GET['page'])) {
                if ($_GET['page'] == "usuario") {
                    if(isset($_GET['action'])){
                        if($_GET['action'] == 'editar'){
                            $usuario = call_user_func(array('UsuarioController','editar'),$_GET['id']);
                            require_once 'view/cadUsuario.php';
                        }
                    
                        if($_GET['action'] == 'listar'){
                            require_once 'view/listUsuario.php';
                        }
                    
                        if($_GET['action'] == 'excluir'){
                            $usuario = call_user_func(array('UsuarioController','excluir'),$_GET['id']);
                            require_once 'view/listUsuario.php';
                    
                        }
                    }else{
                        require_once 'view/cadUsuario.php';
                    }
                    
                    if(isset($_GET['page'])){
                        if($_GET['page'] == 'usuario'){
                            
                        }
                    
                        if($_GET['page'] == 'imovel'){
                    
                        }
                    }
                }
                if ($_GET['page'] == "imovel") {
                    if(isset($_GET['action'])){
                        if($_GET['action'] == 'editar'){
                            $usuario = call_user_func(array('ImovelController','editar'),$_GET['id']);
                            require_once 'view/cadImovel.php';
                        }
                    
                        if($_GET['action'] == 'listar'){
                            require_once 'view/listImovel.php';
                        }
                    
                        if($_GET['action'] == 'excluir'){
                            $usuario = call_user_func(array('ImovelController','excluir'),$_GET['id']);
                            require_once 'view/listImovel.php';
                    
                        }
                    }else{
                        require_once 'view/cadImovel.php';
                    }
                    
                    if(isset($_GET['page'])){
                        if($_GET['page'] == 'usuario'){
                            
                        }
                    
                        if($_GET['page'] == 'imovel'){
                    
                        }
                    }
                }
            }
        }else{
            if(isset($_GET['logar'])){
                require_once 'view/login.php';
            }else{
                require_once 'principal.php';
            }
        }    

    ?>    
</body>
</html>