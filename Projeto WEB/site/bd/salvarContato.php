<?php

    $nome = (string) null;
    $telefone = (string) null;
    $celular = (string) null;
    $email = (string) null;
    $page = (string) null;
    $link = (string) null;
    $tipoMensagem = (string) null;
    $profissao = (string) null;
    $sexo = (string) null;
    $mensagem = (string) null;
    
    session_start();

    if(isset($_POST['btnSalvar'])){
        
        require_once('conexao.php');
        
        $conexao = conexaoMysql();
        
        $nome = $_POST['txtNome'];
        $telefone = $_POST['txtTelefone'];
        $celular = $_POST['txtCelular'];
        $email = $_POST['txtEmail'];
        $page = $_POST['txtHomePage'];
        $link = $_POST['txtFacebook'];
        $tipoMensagem = $_POST['rdoOpcao'];
        $profissao = $_POST['txtProfissao'];
        $sexo = $_POST['rdoSexo'];
        $mensagem = $_POST['txtMensagem']; 
        
        $sql = "INSERT INTO tbl_contatos (nome,
            telefone,
            celular,
            email, 
            home_page,
            facebook, 
            tipo_mensagem, 
            profissao,
            sexo,
            mensagem)
            VALUES('".$nome."','".$telefone."','".$celular."','".$email."','".$page."','".$link."','".$tipoMensagem."','".$profissao."','".$sexo."','".$mensagem."')";
            
            
        if(mysqli_query($conexao,$sql))
            
            header('location:../contato.php');
        
        else 
            
            echo('Erro no script!');
            
        
    }
?>