<?php

    $nome = null;
    $conteudo = null;
    $faleConosco = null;
    $usuario = null;

    $codigo = null;



    if(isset($_POST['btnEditarNivel'])){
        if($_POST['btnEditarNivel'] == 'editar'){
            
            require_once('conexao.php');

            $conexao = conexaoMysql();
            
            $codigo = $_POST['txtId'];
            
            $nome = $_POST['nomeUsuario'];
            $conteudo = isset($_POST['chkConteudo']) ? 1:0;
            $faleConosco = isset($_POST['chkFaleConosco']) ? 1:0;
            $usuario = isset($_POST['chkUsuario']) ? 1:0;

            $sql = "update nivel_acesso set 
                nome = '".$nome."', 
               adm_conteudo = '".$conteudo."', 
               adm_faleConosco = '".$faleConosco."', 
               adm_usuario = '".$usuario."' where codigo=".$codigo; 
            

            if(mysqli_query($conexao,$sql))

                 header('location:../cms/nivel.php');

            else 
                
                echo('Erro no script!');
        }
    }

?>