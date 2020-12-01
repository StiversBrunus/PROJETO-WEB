<?php

    
    
            

    require_once('conexao.php');
    $conexao = conexaoMysql();
            
    if(isset($_POST['modo'])){
                
        if($_POST['modo'] == 'editar'){
            
            
            $codigo = $_POST['codigo'];
                    
            $sql = "select * from nivel_acesso where codigo = ".$codigo;
                    
            $select = mysqli_query($conexao, $sql);
                    
            if($rsVisualizar = mysqli_fetch_array($select)){
                     
                    $nome = $rsVisualizar['nome'];
                    $conteudo = $rsVisualizar['adm_conteudo'];
                    $faleConosco = $rsVisualizar['adm_faleConosco'];
                    $usuario = $rsVisualizar['adm_usuario'];
                
                
                    if($conteudo == 1){
                        $chkConteudo = 'checked';
                    }else $chkConteudo = '';
                        
                    if($faleConosco == 1 ){
                        $chkFaleConosco = 'checked';
                    }else $chkFaleConosco = '';
                        
                    if($usuario == 1){
                        $chkUsuario = 'checked';
                    }else $chkUsuario = '';
                            
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
    <body>
        <div class="center">
            <form action="../bd/atualizarNivel.php" name="frmNivel" method="post">
                <input type='text' name='txtId' value="<?=$codigo?>" style="visibility: hidden;"/>     
                <p><label>Nome :</label><input type="text" name="nomeUsuario" value="<?=$nome?>"></p>
                <p><label>Conteudo:</label> <input type="checkbox" name="chkConteudo" <?=$chkConteudo?>> </p>
                <p><label>Fale Conosco :</label> <input type="checkbox" name="chkFaleConosco" <?=$chkFaleConosco?>></p>
                <p><label>Usuario :</label> <input type="checkbox" name="chkUsuario" <?=$chkUsuario?>></p>
                
                <input type="submit" value="editar" name="btnEditarNivel" class="btns">
                        
            </form>
        </div>
    </body>

</html>
