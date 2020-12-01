<?php

$codigo = (string) null;
$nome = (string) null;
$descricao = (string) null;
$preco = (string) null;
$desconto = (string) null; 
$imagem = (string) null;

$nomeImagemUm = (string) null;
$nomeImagemDois = (string) null;
$nomeImagemTres = (string) null;

    require_once('../bd/conexao.php');
    $conexao = conexaoMysql();

    
    session_start();
    
    
    if(isset($_GET['modo']))
    {
        
        if($_GET['modo']=="editar"){
            
            //echo("Editar");
            
            $codigo = $_GET['codigo'];
            
            $_SESSION['id'] = $codigo;
            
            //echo("$codigo");
            
            $sql = "select produtos.nome, produtos.descrição, produtos.preco, produtos.imagem, produtos.desconto from tbl_produtos AS produtos WHERE codigo=".$codigo;
            
            //echo("$sql");
            
            
            $select = mysqli_query($conexao, $sql);
            
            if($rsConsulta = mysqli_fetch_array($select)){
                
                //echo("entrou");
                
                $nome = $rsConsulta['nome'];
                $descricao = $rsConsulta['descrição'];
                $preco = $rsConsulta['preco'];
                $desconto = $rsConsulta['desconto'];
                $imagem = $rsConsulta['imagem'];
                
                //echo("$titulo e $texto e $nomeImagem");
                
            }else{
                
                echo("Erro ao retornar os dados do banco");
            }
            
        }else{
            //echo("modo editar inexistente");
        }
    }else{
        //echo("modo inexisyente");
    }

?>

<html>

<head>
    <title>
        CMS- Configuração do sistema
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>

    <div class="caixa center" id="caixa">
        <!-- CABECALHO -->
        <div class="caixa_cabecalho center">
            <a href="index.php">
                <div class="caixa_titulo">
                    <h1> CMS - Sistema de Gerenciamento do Site</h1>
                </div>
                <div class="caixa_logo backgroundLogo">
                </div>
            </a>
        </div>
        <!-- MENU -->
        <div class="caixa_menu center">
            <div class="menuFirst">
                <div class="card">
                    <a href="conteudo.php">
                        <div id="fotoCard1" class="fotoCard center backgroundLogo">

                        </div>
                        <div class="textoCard center">
                        Adm. Conteúdo
                        </div>
                    </a>
                    

                </div>
                <div class="card">
                    <a href="sac.php">
                        <div id="fotoCard2" class="fotoCard center">

                        </div>
                        <div class="textoCard center">
                            Adm. Fale Conosco
                        </div>
                    </a>

                </div>
                <div class="card">
                    <a href="produtos.php">
                        <div id="fotoCard2" class="fotoCard center">

                        </div>
                        <div class="textoCard center">
                            Adm. Produto
                        </div>
                    </a>

                </div>
                
            </div>
            <div class="menuSecond">
                <a href="usuario.php">
                    <div class="card">
                        <div id="fotoCard3" class="fotoCard center">

                        </div>
                        <div class="textoCard center">
                            Adm. Usuários
                        </div>
                    </div>
                </a>
                <div class="logout">
                    <div>Bem Vindo, {<?=$_SESSION['nome']?>}.</div>
                    <div id="txtLogout"><a href="../index.php"> Logout</a></div>

                </div>
            </div>

        </div>
        <div class="center" id="conteudo_admConteudo">
            <div class="titulo center">
                <h1>SGP - Sistema de Gerenciamento de Produtos </h1>
            </div>
            <!--CPrimeira caixa de tabela-->
            <div class="first_box_insert center" id="first_box_produto">
                <div class="caixa_inserir_conteudo center">
                    <form name="frmConteudo" method="post" action="../bd/salvarProduto.php" enctype="multipart/form-data">

                        <div class="caixa_texto center">
                            <h1>Primeira tabela de Produtos</h1>

                            <p><label>Nome: <input type="text" name="txtNome" value="<?=$nome?>" placeholder="titulo"></label></p>
                            <p><label> Descrição: <input type="text" name="txtDescricao" value="<?=$descricao?>" placeholder="Tetxo"> </label> </p>
                             <p><label> Preço: <input type="number" name="txtPreco" value="<?=$preco?>" placeholder="20,00"> </label> </p>
                            <p><label> Desconto: <input type="number" name="txtDesconto" value="<?=$desconto?>" placeholder="50"> </label> </p>
                            <p><label> Imagem: <input type="file" accept="" name="flefoto"></label>
                            </p>
                            <input type="submit" name="btnSalvar" value="Inserir">
                            <input type="submit" name="btnEditar" value="Atualizar">

                        </div>
                        <div class="caixa_imagem center">
                            <img class="imgFoto" id="imgGrande" src="../bd/arquivos/<?=$imagem?>">
                        </div>
                    </form>
                </div>
                <div id="padding_box">
                
                </div>

                <div id="tabelaProdutos" class="center">

                    <table id="consulta_produtos" class="center">
                        <tr class="cab">
                            <th>Nome</th>
                            <th>Descição</th>
                            <th>Preço</th>
                            <th>Imagem</th>
                            <th>Desconto</th>
                            <th>Opções</th>
                        </tr>
                        <?php

                            $sql = 'SELECT * FROM tbl_produtos ORDER BY codigo DESC';
                            $select = mysqli_query($conexao, $sql);

                            while($rs = mysqli_fetch_array($select)){

                        ?>
                        <tr id="linha_consulta_produtos">
                            <th><?=($rs['nome']); ?></th>
                            <th> <?=($rs['descrição']); ?></th>
                            <th> <?=($rs['preco']); ?></th>
                            <th>
                                <img class="imgFoto" src="../bd/arquivos/<?=$rs['imagem']?>">
                            </th>
                            <th> <?=($rs['desconto']); ?></th>
                            <th>
                                <a href="conteudoProduto.php?modo=editar&codigo=<?=$rs['codigo']?>">
                                    <img src="img/edit.png">
                                </a>

                                <a href="../bd/deletarProduto.php?codigo=<?=$rs['codigo'];?>&nomeImagem=<?=$rs['imagem']?>">
                                    <img src="img/delete.png"></a>

                                <a href="#?modo=excluir&codigo=<?=$rs['codigo'];?>&status=<?=$rs['codigo'];?>">
                                    <img src="img/desativado.png">
                                </a>
                            </th>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="rodape center" id="rodape_admConteudo">
            <h1> Desenvolvido por: Bruno de Oliveira Araujo</h1>
        </div>

    </div>


</body>

</html>