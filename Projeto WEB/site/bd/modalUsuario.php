<?php
            $codigo = $_POST['codigo'];
        
            
            require_once('conexao.php');
        
            //abre a conexao com bd
            $conexao = conexaoMysql();

            if(isset($_POST['modo'])){
                
                if($_POST['modo'] == 'visualizar'){
                    echo('Modo visualizar');
                
                }else if($_POST['modo'] == 'editar'){
                   
                    //echo('Modo Editar');
                    
                    $sql = "select * from usuarios where codigo = ".$codigo;

                    $select = mysqli_query($conexao, $sql);
                    
                    if($rsVisualizar = mysqli_fetch_array($select))
                    {
                        //resgata todos os dados do BD em arrays locais
                        $nome = $rsVisualizar['nome'];
                        $profissao = $rsVisualizar['profissao'];
                        $login = $rsVisualizar['login'];
                        $senha = $rsVisualizar['senha'];
                    }
                }
            } 
?>

<html>

<head>
    <title>

    </title>
    <link rel="stylesheet" type="text/css" href="../css/Style.css">
</head>

<body id="teste">
        <div class="box_form center">
            <form action="../bd/atualizarUsuario.php" name="frmUsuario" method="post">
                <input type='text' name='txtId' value="<?=$codigo?>" style="visibility: hidden;" />
                <p><label>Nome :</label><input type="text" name="nomeUsuario" value="<?=$nome?>"></p>
                <p><label>Profissão :</label><input type="text" name="profissao" value="<?=$profissao?>"></p>
                <p><label>Login :</label><input type="text" name="login" value="<?=$login?>"></p>
                <p><label>Senha:</label><input type="text" name="senha" value="<?=$senha?>"></p>
                <select name="sltNivel">
                    <option value="neutro" disabled selected>
                        Selecione um nivel
                    </option>
                    <?php

                            $sql = 'SELECT * FROM nivel_acesso ORDER BY codigo DESC';
                            $select = mysqli_query($conexao, $sql);

                            while($rs = mysqli_fetch_array($select)){


                        ?>
                    <option value="<?=($rs['codigo']); ?>">
                        <?=($rs['nome']); ?>
                    </option>

                    <?php
                            }
                        ?>
                </select>

                <input type="submit" name="btnSalvarUsuario" value="Atualizar">
            </form>
    </div>
</body>

</html>