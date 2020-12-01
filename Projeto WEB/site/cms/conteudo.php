<?php
    session_start();
?>
<!DOCTYPE html>

<html>

<head>
    <title>
        CMS- Configuração do sistema
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/modais.css">
    <script src="../jquery/jquery.js"></script>
    <script src="../jquery/filtro.js"></script>
</head>

<body>
    <div class="container">

        <div class="modal">
            <div>
                <a href="#" id="fechar">Fechar</a>

                <div class="teste11">
                    <h1>CMS</h1>
                </div>

                <div class="conteudoModal">
                    <div class="cms_menu">
                        teste cms_menu
                    </div>
                    <div class="cms_conteudo">

                    </div>
                    <div class="cms_rodape">

                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="caixa center">
        <!-- CABECALHO -->
        <div class="caixa_cabecalho center">
            <div class="caixa_titulo">
                <h1> CMS - Sistema de Gerenciamento do Site</h1>
            </div>
            <div class="caixa_logo backgroundLogo">

            </div>
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
        <div class="conteudo center">
            <div class="box_categoria center">
                <a href="conteudoLoja.php">
                    <div class="empresa center">
                        <div class="imgCategoria backgroundLogo">
                            <img src="img/store.png" id="imgStore">
                        </div>
                        <div class="textoCategoria">
                            Página da Lojas
                        </div>
                    </div>
                </a>
                <a href="conteudoCuriosidade.php">
                    <div class="loja center">
                        <div class="imgCategoria backgroundLogo">
                            <img src="img/curiosidadePage.png">
                        </div>
                        <div class="textoCategoria">
                            Página de Curiosidades
                        </div>
                    </div>
                </a>
                <a href="conteudoEmpresa.php">
                    <div class="curiosidade">
                        <div class="imgCategoria backgroundLogo">
                            <img src="img/lojas.png">
                        </div>
                        <div class="textoCategoria">
                            Página da Empresa
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="rodape center">
            <h1> Desenvolvido por: Bruno de Oliveira Araujo</h1>
        </div>

    </div>


</body>

</html>