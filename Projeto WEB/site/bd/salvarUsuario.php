<?php

    $nome = (string) null;
    $profissao = (string) null;
    $login = (string) null;
    $senha = (string) null;
    $nivel =  null;
   
    session_start();

    if(isset($_POST['btnSalvarUsuario'])){
        
        require_once('conexao.php');
        
        $conexao = conexaoMysql();
        
        $nome = $_POST['nomeUsuario'];
        $profissao = $_POST['profissao'];
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $nivel = $_POST['sltNivel'];
        
        $sql = "INSERT INTO usuarios (nome,
            profissao, login,
            senha,
            cod_nivel)
            
            VALUES('".$nome."','".$profissao."','".$login."','".$senha."','".$nivel."')";
        
        if(mysqli_query($conexao,$sql))
            
             header('location:../cms/usuario.php');
        
        else 
            
            echo('Erro no script!');
            
        
    }
?>