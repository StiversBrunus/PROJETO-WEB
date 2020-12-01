<?php

$codigo = (string) null;
$titulo = (string) null;
$texto = (string) null;
$nomeImagem = (string) null;
$botao = null; 

$codigoTblDois = (string) null;
$tituloUm = (string) null;
$imagemUm = (string) null;
$tituloDois = (string) null;
$imagemDois = (string) null;
$tituloTres = (string) null;
$imagemTres = (string) null;

$nomeImagemUm = (string) null;
$nomeImagemDois = (string) null;
$nomeImagemTres = (string) null;

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
            
            $sql = "SELECT conteudoUm.titulo, conteudoUm.texto, conteudoUm.imagem FROM tbl_one_empresa AS conteudoUm WHERE codigo=".$codigo;
            
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
        
        if($_GET['modo']=="editarSegunda"){
            
            //echo("modo editar segunda tabela");
            session_start();
            
            $codigoTblDois = $_GET['codigo'];
            
            $_SESSION['id'] = $codigoTblDois;
            
            $sql = "SELECT two_empresa.titulo1, two_empresa.imagem1, two_empresa.titulo2, two_empresa.imagem2,
                    two_empresa.titulo3, two_empresa.imagem3 FROM tbl_two_empresa AS two_empresa WHERE codigo=".$codigoTblDois;
            
            $select = mysqli_query($conexao, $sql);
            
                if($rsConsulta = mysqli_fetch_array($select)){

                    //echo("entrou");

                    $tituloUm = $rsConsulta['titulo1'];
                    $nomeImagemUm = $rsConsulta['imagem1'];
                    $tituloDois = $rsConsulta['titulo2'];
                    $nomeImagemDois = $rsConsulta['imagem2'];
                    $tituloTres = $rsConsulta['titulo3'];
                    $nomeImagemTres = $rsConsulta['imagem3'];
                    

                    //echo("$titulo e $texto e $nomeImagem");



                }else{

                    echo("Erro");

                }
            
            
        }else{
            
            echo("erro");
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
                    <form name="frmConteudo" method="post" action="../bd/salvarEmpresa.php" enctype="multipart/form-data">

                        <div class="caixa_texto center">
                            <h1>Primeira tabela Sobre a empresa</h1>

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

                            $sql = 'SELECT * FROM tbl_one_empresa ORDER BY codigo DESC';
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
                                <a href="conteudoEmpresa.php?modo=editar&codigo=<?=$rs['codigo']?>">
                                    <img src="img/edit.png">
                                </a>

                                <a href="../bd/deletarConteudo.php?codigo=<?=$rs['codigo'];?>&nomeImagem=<?=$rs['imagem']?>">
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
            <!--SEGUNDA CAIXA DE TABELA -->

            <div class="second_box_insert center">
                <div class="caixa_inserir_conteudo center" id="caixa_inserir_conteudo_dois">
                    <form name="frmConteudo" method="post" action="../bd/salvarEmpresaDois.php" enctype="multipart/form-data">

                        <div class="center" id="caixa_formulario_dois">
                            <h1>Segunda tabela Sobre a empresa</h1>

                            <p><label>Titulo 1: <input type="text" name="txtTituloUm" value="<?=$tituloUm?>" placeholder="titulo"></label></p>
                            <p><label> Imagem 1: <input type="file" accept="" name="flefotoUm"></label>
                            </p>
                            <p><label>Titulo 2: <input type="text" name="txtTituloDois" value="<?=$tituloDois?>" placeholder="titulo"></label></p>
                            <p><label> Imagem 2: <input type="file" accept="" name="flefotoDois"></label>
                            </p>
                            <p><label>Titulo 3: <input type="text" name="txtTituloTres" value="<?=$tituloTres?>" placeholder="titulo"></label></p>
                            <p><label> Imagem 3: <input type="file" accept="" name="flefotoTres"></label>
                            </p>
                            <input type="submit" name="btnSalvar" value="Inserir">
                            <input type="submit" name="btnEditarSegunda" value="Atualizar">

                        </div>
                        <div class="caixa_imagem center">
                            <p><img class="imgFotoDois" src="../bd/arquivos/<?=$nomeImagemUm?>"></p>

                            <p><img class="imgFotoDois" src="../bd/arquivos/<?=$nomeImagemDois?>"></p>

                            <p><img class="imgFotoDois" src="../bd/arquivos/<?=$nomeImagemTres?>"></p>
                        </div>
                    </form>
                </div>

                <div id="tabelaUser" class="center">

                    <table id="consulta_conteudo" class="center">
                        <tr class="cab">
                            <th>Titulo</th>
                            <th> Imagem </th>
                            <th>Titulo</th>
                            <th> Imagem </th>
                            <th>Titulo</th>
                            <th> Imagem </th>
                            <th>Opções</th>
                        </tr>
                        <?php

                            $sql = 'SELECT * FROM tbl_two_empresa ORDER BY codigo DESC';
                            $select = mysqli_query($conexao, $sql);

                            while($rs = mysqli_fetch_array($select)){

                        ?>
                        <tr id="linha_consulta">
                            <th><?=($rs['titulo1']); ?></th>
                            <th>
                                <img class="imgFoto" src="../bd/arquivos/<?=$rs['imagem1']?>">
                            </th>
                            <th><?=($rs['titulo2']); ?></th>
                            <th>
                                <img class="imgFoto" src="../bd/arquivos/<?=$rs['imagem2']?>">
                            </th>
                            <th><?=($rs['titulo3']); ?></th>
                            <th>
                                <img class="imgFoto" src="../bd/arquivos/<?=$rs['imagem3']?>">
                            </th>
                            <th>
                                <a href="conteudoEmpresa.php?modo=editarSegunda&codigo=<?=$rs['codigo']?>">
                                    <img src="img/edit.png">
                                </a>

                                <a href="../bd/deletarConteudoDois.php?codigo=<?=$rs['codigo'];?>&nomeImagemUm=<?=$rs['imagem1']?>&nomeImagemDois=<?=$rs['imagem2']?>&nomeImagemTres=<?=$rs['imagem3']?>">
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