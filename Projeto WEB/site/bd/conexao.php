<?php
    function conexaoMysql(){
        
        $server = (string) "localhost";
        $user = (string) "root";
        $password = (string) "Bruno997202985";
        $database = (string)"db_gelada";
        
        $conexao = mysqli_connect($server, $user, $password, $database);
        return $conexao;
    }

?>