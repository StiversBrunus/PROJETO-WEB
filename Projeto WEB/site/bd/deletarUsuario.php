<?php

        //recebe o id enviado pelo html
        $codigo = $_GET['codigo'];
        
        //script para deletar o registros no BD
        $sql = "delete from usuarios where codigo=".$codigo;
        
        //abre a conexao com oBD
        require_once('conexao.php');
        $conexao = conexaoMysql();
        //executa o script no BD
        if(mysqli_query($conexao, $sql))
            header('location:../cms/usuario.php');
        else
            echo("Erro ao excluir o registro");
    
?>