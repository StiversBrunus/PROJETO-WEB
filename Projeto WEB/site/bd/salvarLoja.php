<?php

    $codigo = (string) null;
    $rua = (string) null;
    $bairro = (string) null;
    $cidade = (string) null;
    $estado = (string) null;
   
    session_start();

    if(isset($_POST['btnSalvar'])){
        
        require_once('conexao.php');
        
        $conexao = conexaoMysql();
        
            $rua = $_POST['txtRua'];
            $bairro = $_POST['txtBairro'];
            $cidade = $_POST['txtCidade'];
            $estado = $_POST['txtEstado'];
        
        
        $sql = "INSERT INTO tbl_lojas (rua,
            bairro,
            cidade,
            estado)
            
            VALUES('".$rua."','".$bairro."','".$cidade."','".$estado."')";
        
        if(mysqli_query($conexao,$sql))
            
             header('location:../cms/conteudoLoja.php');
        
        else 
            
            echo('Erro no script!');
            
        
    }else{
        if(isset($_POST['btnEditar'])){
             session_start();
             require_once('conexao.php');
        
            $conexao = conexaoMysql();
        
            $rua = $_POST['txtRua'];
            $bairro = $_POST['txtBairro'];
            $cidade = $_POST['txtCidade'];
            $estado = $_POST['txtEstado'];
            
            
            
            $sql = "update tbl_lojas set rua = '".$rua."', bairro = '".$bairro."', cidade = '".$cidade."', estado = '".$estado."' WHERE codigo=".$_SESSION['id'];
            
            if(mysqli_query($conexao, $sql))

                 header('location:../cms/conteudoLoja.php');

            else 

                echo('Erro no script!');
            
            
        }else{
            echo("botão editar inexistente");
        }
    }
?>