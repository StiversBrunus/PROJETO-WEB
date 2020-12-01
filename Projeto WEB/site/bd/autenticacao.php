<?php

$login = (string) null;
$senha = (string) null;
$nomeUsuario = (string) null;

    if(isset($_POST['btnok'])){
        
        //echo("Edu");
        require_once('conexao.php');
        $conexao = conexaoMysql();
        
        $login = $_POST['txtusuario'];
        $senha = $_POST['txtsenha'];
        
        $sql = "select * from usuarios WHERE login = '".$login."' and senha = '".$senha."'";
        
        $select = mysqli_query($conexao, $sql);
        
        if($rsConsulta = mysqli_fetch_array($select)){
            
            $nomeUsuario = $rsConsulta['nome'];
            
            session_start();
            
            $_SESSION['nome'] = $nomeUsuario;
            
            //echo("Será enviado ao cms");
             header('location:../cms/index.php');
            
        }else{
            
            echo("<script> 
                        alert('Usuario ou Senha incorreta');
                </script>");
            
            
        }
        
        
    }
    

?>