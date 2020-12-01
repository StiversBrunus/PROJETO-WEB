<?php

        $codigo = $_GET['codigo'];

        $nameFotoUm = $_GET['nomeImagemUm'];
        $nameFotoDois = $_GET['nomeImagemDois'];
        $nameFotoTres = $_GET['nomeImagemTres'];
    
        echo("Enviado para o arquivo deletarConteudo!");
        //echo("<html><br></html>");
        echo("$codigo");
        //echo("<html><br></html>");
        echo("$nameFotoUm, $nameFotoDois, $nameFotoTres");

        $sql = "DELETE FROM tbl_two_empresa where codigo=".$codigo;
        
        require_once('conexao.php');
        $conexao = conexaoMysql();
        
        if(mysqli_query($conexao, $sql))
        {
           unlink('arquivos/'.$nameFotoUm);
            unlink('arquivos/'.$nameFotoDois);
            unlink('arquivos/'.$nameFotoTres);
             header('location:../cms/conteudoEmpresa.php');
        }else{
            echo("Erro na exclusão");
        }


                
?>

