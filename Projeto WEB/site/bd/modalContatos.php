<?php

            $codigo = $_POST['codigo'];
            
             require_once('conexao.php');
        
            //abre a conexao com bd
            $conexao = conexaoMysql();
            
            
            $sql = "select * from tbl_contatos where codigo = ".$codigo;
            
            $select = mysqli_query($conexao, $sql);
            /*
            se exisitr algum registro no BD, converte em array e garda na 
            variavel $rsVisualizar
            */
            if($rsVisualizar = mysqli_fetch_array($select))
            {
                //resgata todos os dados do BD em arrays locais
                $nome = $rsVisualizar['nome'];
                $telefone = $rsVisualizar['telefone'];
                $celular = $rsVisualizar['celular'];
                $email = $rsVisualizar['email'];
                $home_page = $rsVisualizar['home_page'];
                $facebook = $rsVisualizar['facebook'];
                $tipo_mensagem = $rsVisualizar['tipo_mensagem'];
                $profissao = $rsVisualizar['profissao'];
                $sexo = $rsVisualizar['sexo'];
                $mensagem = $rsVisualizar['mensagem'];
            }
            
            
        
?>

<html>
    <head>
        <title>
            
        </title>
     <link rel="stylesheet" type="text/css" href="css/modais.css">
    </head>
    <body>
        <div class="box_form center">
           <p>&nbsp;&nbsp;&nbsp;&nbsp;<label>Nome: <input type="text" name="txtNome" value="<?php echo($nome)?>"> </label> </p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;<label>Telefone <input type="text" name="txtTelefone" value="<?php echo($telefone)?>"> </label></p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;<label>Celular: <input type="text" name="txtCelular" value="<?php echo($celular)?>" ></label></p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;<label>Email: <input type="text" name="txtEmail" value="<?php echo($email)?>" ></label></p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;<label>Home Page: <input type="text" name="txthome" value="<?php echo($home_page)?>" ></label></p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;<label>Facebook: <input type="text" name="txtFacebook" value="<?php echo($facebook)?>" ></label><p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;<label>Tipo da mensagem: <input type="text" name="txtTipoMsg" value="<?php echo($tipo_mensagem)?>" ></label></p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;<label>Profissão: <input type="text" name="txtProfissao" value="<?php echo($profissao)?>" ></label></p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;<label>Sexo: <input type="text" name="txtSexo" value="<?php echo($sexo)?>" ></label></p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;<label>Mensagem: <textarea type="textarea" name="txtMsg" rows="8" cols="50"><?php echo($mensagem)?></textarea> </label></p>
        </div>
    </body>

</html>


