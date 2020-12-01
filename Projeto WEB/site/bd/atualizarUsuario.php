<?php

    $nome = (string) null;
    $profissao = (string) null;
    $login = (string) null;
    $senha = (string) null;
    $nivel =  null;
    $codigo = null;



    if(isset($_POST['btnSalvarUsuario'])){
        if($_POST['btnSalvarUsuario'] == 'Atualizar'){
            
        
        
            require_once('conexao.php');

            $conexao = conexaoMysql();

            $codigo = $_POST['txtId'];

            $nome = $_POST['nomeUsuario'];
            $profissao = $_POST['profissao'];
            $login = $_POST['login'];
            $senha = $_POST['senha'];
            $nivel = $_POST['sltNivel'];

            $sql = "update usuarios set 
                nome = '".$nome."', 
               profissao = '".$profissao."', 
               login = '".$login."',
               senha = '".$senha."', 
               cod_nivel = '".$nivel."' where codigo=".$codigo; 

            
            if(mysqli_query($conexao,$sql))

                 header('location:../cms/usuario.php');

            else 

                echo('Erro no script!');
        }
    }

?>