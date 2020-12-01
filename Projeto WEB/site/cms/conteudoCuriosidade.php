<?php

$codigo = (string) null;
$titulo = (string) null;
$texto = (string) null;
$nomeImagem = (string) null;
$botao = null; 

    require_once('../bd/conexao.php');
    $conexao = conexaoMysql();
    session_start();
    
    if(isset($_GET['modo']))
    {
        
        if($_GET['modo']=="editar"){
            
            session_start();
            
            $codigo = $_GET['codigo'];
            
            $_SESSION['id'] = $codigo;
            
            //echo("$codigo");
            
            $sql = "SELECT curiosidade.titulo, curiosidade.texto, curiosidade.imagem FROM tbl_curiosidade AS curiosidade WHERE codigo=".$codigo;
            
            //echo("$sql");
            
            $select = mysqli_query($conexao, $sql);
            
            if($rsConsulta = mysqli_fetch_array($select)){
                
                //echo("entrou");
                
                $titulo = $rsConsulta['titulo'];
                $texto = $rsConsulta['texto'];
                $nomeImagem = $rsConsulta['imagem'];
                
                //echo("$titulo e $texto e $nomeImagem");
            
                
            }else{
                
                echo("Erro");
                
            }
            
             
        }else{
            
           
        }

    }else{
        //echo("inexistente");
        
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
                <h1>SGC - Sistema de Gerenciamento de Conteúdo </h1>
            </div>
            <!--CPrimeira caixa de tabela-->
            <div class="first_box_insert center">
                <div class="caixa_inserir_conteudo center">
                    <form name="frmConteudo" method="post" action="../bd/salvarCuriosidade.php" enctype="multipart/form-data">

                        <div class="caixa_texto center">
                            <h1>Curiosidade</h1>

                            <p><label>Titulo: <input type="text" name="txtTitulo" value="<?=$titulo?>" placeholder="titulo"></label></p>
                            <p><label> Texto: <input type="text" name="txtTexto" value="<?=$texto?>" placeholder="Tetxo"> </label> </p>
                            <p><label> Imagem: <input type="file" accept="" name="flefoto"></label>
                            </p>
                            <input type="submit" name="btnSalvar" value="Inserir">
                            <input type="submit" name="btnEditar" value="Atualizar">

                        </div>
                        <div class="caixa_imagem center">
                            <img class="imgFoto" id="imgGrande" src="../bd/arquivos/<?=$nomeImagem?>">
                        </div>
                    </form>
                </div>

                <div id="tabelaUser" class="center">

                    <table id="consulta_conteudo" class="center">
                        <tr class="cab">
                            <th>Titulo</th>
                            <th>Texto</th>
                            <th> Imagem </th>
                            <th>Opções</th>
                        </tr>
                        <?php

                            $sql = 'SELECT * FROM tbl_curiosidade ORDER BY codigo DESC';
                            $select = mysqli_query($conexao, $sql);

                            while($rs = mysqli_fetch_array($select)){

                        ?>
                        <tr id="linha_consulta">
                            <th><?=($rs['titulo']); ?></th>
                            <th> <?=($rs['texto']); ?></th>
                            <th>
                                <img class="imgFoto" src="../bd/arquivos/<?=$rs['imagem']?>">
                            </th>
                            <th>
                                <a href="conteudoCuriosidade.php?modo=editar&codigo=<?=$rs['codigo']?>">
                                    <img src="img/edit.png">
                                </a>

                                <a href="../bd/deletarCuriosidade.php?codigo=<?=$rs['codigo'];?>&nomeImagem=<?=$rs['imagem']?>">
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