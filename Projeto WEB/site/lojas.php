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
        <div id="testeConteudo">
            <?php

                $sql = 'SELECT * FROM tbl_lojas ORDER BY codigo DESC';
                $select = mysqli_query($conexao, $sql);

                while($rs = mysqli_fetch_array($select)){

            ?>
            <div id="caixa_slider">

                <div class=" slider center" id="bannerLojas">

                    <div>
                        <h1>Encontre as Nossas Lojas</h1>

                        <h2> <?=($rs['rua']); ?></h2>
                        <h2> <?=($rs['bairro']); ?> </h2>
                        <h2> <?=($rs['cidade']); ?> / <?=($rs['estado']); ?> </h2>
                    </div>

                </div>
                <?php
                }
            ?>
            </div>
            <div id="redes_sociais">
                <div id="facebook" class="redes_sociais center"></div>
                <div id="instagram" class="redes_sociais center"></div>
                <div id="whatsapp" class="redes_sociais center backgroundLogo"></div>
            </div>

            <div id="caixa_conteudo">
                <div id="conteudoLojas" class="center">


                    <div id="caixa_lojas">

                        <div id="lojas">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7313.292558498061!2d-46.968865798134935!3d-23.5811442180589!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1569815741215!5m2!1spt-BR!2sbr" width="1500px" height="600px" style="border:0;" allowfullscreen=""></iframe>
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
    </div>

    <script src="js/main.js"></script>
</body>

</html>