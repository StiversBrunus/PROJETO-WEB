<?php

        $codigo = $_GET['codigo'];

        $nameFoto = $_GET['nomeImagem'];
    
        //echo("Enviado para o arquivo deletarConteudo!");
        //echo("<html><br></html>");
        //echo("$codigo");
        //echo("<html><br></html>");
        //echo("$nameFoto");

        $sql = "DELETE FROM tbl_one_empresa where codigo=".$codigo;
        
        echo("$sql");
        

        require_once('conexao.php');
        $conexao = conexaoMysql();
        
        if(mysqli_query($conexao, $sql))
        {
           unlink('arquivos/'.$nameFoto);
            
             header('location:../cms/conteudoEmpresa.php');
        }else{
            echo("Erro na exclusão");
        }


                
?>

