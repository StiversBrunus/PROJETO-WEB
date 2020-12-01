<!DOCTYPE html>
<?php
    
require_once('bd/conexao.php');
    $conexao = conexaoMysql();

?>
<html>

<head>
    <title> Delicía de Suco </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/Style.css">
    <script src="jquery/ancora.js"></script>
    <script src="jquery/jquery.js"> </script>
    <script src="jquery/scroll.js"> </script>

</head>

<body>
    <div id="caixa">
        <!-- HEADER --->
        <header id="caixa_cabecalho">
            <div class="conteudo center">
                <!-- CABEÇALHO -->
                <div id="cabecalho" class="center">
                    <!-- logo --->

                    <div class="logo">
                        <a href="index.php">
                            <div class="logo_img backgroundLogo">

                            </div>
                        </a>

                    </div>

                    <!-- menu --->
                    <nav id="caixa_menu">

                        <ul id="menu" class="center">

                            <li class="menu_itens center"> <a href="empresa.php"> EMPRESA </a> </li>

                            <li class="menu_itens center"> <a href="promocoes.php"> PROMOÇÕES </a> </li>

                            <li class="menu_itens center"> <a href="curiosidades.php"> CURIOSIDADES </a> </li>

                            <li class="menu_itens center"> <a href="lojas.php">LOJAS </a> </li>

                            <li class="menu_itens center"> <a href="contato.php"> CONTATO </a> </li>

                        </ul>


                    </nav>
                    <!-- login --->
                    <div id="cmsUsuario">
                        <form action="bd/autenticacao.php" name="frmFormulario" method="post">
                            <div class="login">
                                <p> Usuário : </p>

                                <input type="text" name="txtusuario">

                            </div>
                            <div class="login">
                                <p> Senha : </p>

                                <input type="password" name="txtsenha">

                            </div>
                            <div id="caixa_botao">
                                <input type="submit" name="btnok" id="btnok" value="OK">
                            </div>
                        </form>

                    </div>

                </div>


            </div>

        </header>
        <div id="caixa_slider">
            <div class=" slider center">

                <div class="seta_direita" id="proximo"></div>

                <img src="imagem/imgslide1.jpg" id="imgSlider" alt="Suco de frutas">

                <div class="seta_esquerda" id="anterior"></div>

            </div>
        </div>
        <div id="redes_sociais">
            <div id="facebook" class="redes_sociais center"></div>
            <div id="instagram" class="redes_sociais center"></div>
            <div id="whatsapp" class="redes_sociais center backgroundLogo"></div>
        </div>

        <div id="caixa_conteudo">
            <div id="conteudo" class="center">

                <div id="caixa_galeria" class="center">

                    <div id="galeria" class="center">
                        <?php
                        
                            $sql = 'SELECT * FROM tbl_produtos WHERE desconto is not null ORDER BY codigo DESC';
                            $select = mysqli_query($conexao, $sql);

                            while($rs = mysqli_fetch_array($select)){
                                
                                //var_dump($rs);
                                
                                $desconto = $rs['desconto'];
                                $preco = $rs['preco'];
                                
                                
                                
                                
                                $precoTotal = $desconto * $preco / 100;
                                $promocao = $preco - $precoTotal;
                                
                                
                        ?>

                        <aside class="produtos">
                            <div class="desconto"> <?=($rs['desconto']); ?>% de Desconto</div>
                            <div class="fotoProdutos"> <img class="imgFoto background" 
                                                            src="bd/arquivos/<?=$rs['imagem']?>"> 
                            </div>
                            <div class="infoProduto">
                                <div class="nomeProduto"> Nome : <?=($rs['nome']); ?></div>
                                <div class="descProduto"> Descrição :<br>
                                    <?=($rs['descrição']); ?>
                                </div>
                                <div class="precoAntigo">
                                    Preço : R$<?=($rs['preco']); ?>,00
                                </div>
                                <div class="precoAtual"> Promoção: R$<?=($promocao);?>,00 </div>
                                <div class="detalheProduto"> <a href=""> Detalhes </a> </div>
                            </div>

                        </aside>
                        <?php
                            }
                        ?>
                        
                    </div>

                </div>

            </div>


        </div>
        <footer id="caixa_rodape">

            <div id="rodape" class="center">
                <div id="sistema_interno">

                    <div id="btn_sistema" class="center">
                        <input type="button" value="SISTEMA INTERNO" class="botao">
                    </div>

                </div>
                <div id="endereco">
                    <div>
                        <h1> DELÍCIA GELADA </h1>

                        <h3> ESTRADA VICTOR SOARES </h3>
                        <h3> BAIRRO SÃO JOÃO </h3>
                        <h3> ITAPEVI / SP </h3>
                    </div>

                </div>
                <div id="app">

                    <div id="icone_app" class="backgroundLogo">

                    </div>

                    <div id="btn_baixar">

                        <input type="button" value="BAIXE O APP" class="botao">

                    </div>


                </div>

            </div>


        </footer>

    </div>

    <script src="js/main.js"></script>
</body>

</html>