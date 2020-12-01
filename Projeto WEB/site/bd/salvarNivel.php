<?php

    $nome = null;
    $conteudo = null;
    $faleConosco = null;
    $usuario =  null;
   
    session_start();

        require_once('conexao.php');
        
        $conexao = conexaoMysql();

    if(isset($_POST['btnSalvarNivel'])){
        
        $nome = $_POST['nomeUsuario'];
        $conteudo = isset($_POST['chkConteudo']) ? 1:0;
        $faleConosco = isset($_POST['chkFaleConosco']) ? 1:0;
        $usuario = isset($_POST['chkUsuario']) ? 1:0;
        
        $sql = "INSERT INTO nivel_acesso (nome,
            adm_conteudo,
            adm_faleConosco,
            adm_usuario)
            
            VALUES('".$nome."','".$conteudo."','".$faleConosco."','".$usuario."')";
        
        if(mysqli_query($conexao,$sql))
            
             header('location:../cms/nivel.php');
        
        else 
            
            echo('Erro no script!');
            
        
    }
?>