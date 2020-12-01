<?php

    require_once('bd/conexao.php');
    $conexao = conexaoMysql();


?>
<!DOCTYPE html>
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
                        <form  action="bd/autenticacao.php" name="frmFormulario" method="post">
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
                <img src="imagem/banner-suco.png" id="imgBanner" alt="Promoções">
            </div>
        </div>
        <div id="redes_sociais">
            <div id="facebook" class="redes_sociais center"></div>
            <div id="instagram" class="redes_sociais center"></div>
            <div id="whatsapp" class="redes_sociais center backgroundLogo"></div>
        </div>

        <div id="caixa_conteudo">
            <div id="conteudo" class="center">

                <div id="caixa_empresa">
                    <?php

                            $sql = 'SELECT * FROM tbl_one_empresa ORDER BY codigo DESC';
                            $select = mysqli_query($conexao, $sql);

                            while($rs = mysqli_fetch_array($select)){

                        ?>
                    <section id="sobreEmpresa" class="center">
                        <h1><?=($rs['titulo']); ?></h1>

                        <div>
                            <?=($rs['texto']); ?>
                        </div>
                    </section>
                    <div id="fotoEmpresa" class="center backgroundLogo">
                        <img class="imgFoto background" src="bd/arquivos/<?=$rs['imagem']?>">
                    </div>
                    <?php
                            }
                    ?>

                    <section id="EstruturaEmpresa" class="center">
                        <h1> ESTRUTURA FÍSICA </h1>
                        <div>
                            <p>
                                Nossas Sedes Administrativas e Centros de Distribuição estão localizados estrategicamente próximos às principais vias do País, facilitando e acelerando o tempo de entrega dos pedidos. O maior e mais moderno CD da Delicia Gelada! opera na região sudeste, em uma área de mais de 12 mil m².
                                Em 2013, a empresa inaugurou sua unidade nos Estados Unidos com o objetivo de acelerar o acesso ao público brasileiro aos mais recentes lançamentos em produtos alimentício.


                            </p>

                        </div>
                    </section>
                    <?php

                            $sql = 'SELECT * FROM tbl_two_empresa ORDER BY codigo DESC';
                            $select = mysqli_query($conexao, $sql);

                            while($rs = mysqli_fetch_array($select)){

                    ?>
                    <div id="EstruturaCard" class="center">
                        <div>
                            <div class="caixa_card" id="card1">
                                <div id="tituloUm">
                                    <h1>  <?=($rs['titulo1']); ?>  <br> </h1>
                                </div>
                                <div id="imgCard1" class="backgroundLogo">
                                    <img class="imgFoto background" src="bd/arquivos/<?=$rs['imagem1']?>">
                                </div>
                            </div>
                            <div class="caixa_card" id="card2">
                                <div>
                                    <h1> <?=($rs['titulo2']); ?><br> </h1>
                                </div>
                                <div id="imgCard2" class="backgroundLogo">
                                    <img class="imgFoto background" src="bd/arquivos/<?=$rs['imagem2']?>">
                                </div>
                            </div>
                            <div class="caixa_card" id="card3">
                                <div>
                                    <h1> <?=($rs['titulo3']); ?></h1>
                                </div>
                                <div id="imgCard3" class="backgroundLogo">
                                    <img class="imgFoto background" src="bd/arquivos/<?=$rs['imagem3']?>">
                                </div>
                            </div>
                        </div>


                    </div>
                    <?php
                            }
                    ?>
                    <section id="ContatoEmpresa" class="center">
                        <h1> CONTATOS </h1>

                        <div id="caixaContato">
                            <div id="imgContato">

                            </div>
                            <div id="infoContato">
                                <div>
                                    <h2>
                                        Delicia Gelada - Explosão de Ofertas!

                                        Razão Social: Delicia Gelada! Comércio Bebidas Ltda

                                        CNPJ: 00.000.000/0000-00

                                        atendimento.com.br

                                        www.DeliciaGelada.com.br
                                    </h2>


                                </div>

                            </div>

                        </div>

                    </section>



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



    <script src="js/main.js"></script>
</body>

</html>