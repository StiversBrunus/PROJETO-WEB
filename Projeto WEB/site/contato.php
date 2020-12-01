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

                            <li class="menu_itens center"> <a href="curiosidades.php"> CURIOSIDADES</a> </li>

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
                <div id="introducaoContato">
                    <h1> &nbsp; Entre em contato com nosso time! </h1>

                    <div>
                        <h4> Se não encontrar a informação que procura, por favor, entre em contato. </h4>
                        <h4> Envie-nos suas perguntas e sugestões e ficaremos felizes em respondê-las. </h4>



                        <h4> Você pode encontrar os telefones de contato e endereços das nossas unidades.</h4>
                        <h4>Ou então pode entrar em contato através do formulário na parte de baixo desta página. </h4>
                        <h4>Escolha o assunto e ajude-nos a encontrar um expert para responder as suas dúvidas. </h4>
                        <h4>Você pode agilizar a resposta utilizando o formulário de contato do site local para o seu país ou região. </h4>


                    </div>


                </div>
                <div id="caixaSAC">
                    <div id="imgSAC">
                        <div></div>

                    </div>
                    <div id="txtSAC">

                        <div>
                            <h3>
                                Delícia Gelada no Brasil
                            </h3>
                            <h4>
                                Sac - (Serviço de Atendimento ao Cliente)

                            </h4>
                            <h4>
                                0800-704-723
                            </h4>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <div id="redes_sociais">
            <div id="facebook" class="redes_sociais center"></div>
            <div id="instagram" class="redes_sociais center"></div>
            <div id="whatsapp" class="redes_sociais center backgroundLogo"></div>
        </div>

        <div id="caixa_conteudo">

            <div id="caixa_formulario" class="center">

                <form class="formulario" action="bd/salvarContato.php" name="frmFormulario" method="post">

                    <h1> &nbsp; ENVIE A SUA MENSAGEM</h1>

                    <div>
                        <p> &nbsp;&nbsp;&nbsp;&nbsp; <label> Nome Completo: * </label> </p>
                        <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="txtNome" class="inputs" placeholder="Bruno de Oliveira Araujo"> </p>
                    </div>
                    <div>
                        <p> &nbsp;&nbsp;&nbsp;&nbsp; <label> Telefone: * </label> </p>
                        <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="number" name="txtTelefone" class="inputs" placeholder="11 4040-2070"> </p>
                    </div>
                    <div>
                        <p> &nbsp;&nbsp;&nbsp;&nbsp; <label> Celular: * </label> </p>
                        <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="number" name="txtCelular" class="inputs" placeholder="11 9587-7663"> </p>
                    </div>
                    <div>
                        <p> &nbsp;&nbsp;&nbsp;&nbsp; <label> Email: * </label> </p>
                        <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="email" name="txtEmail" class="inputs" placeholder="joao@outlook.com"> </p>
                    </div>
                    <div>
                        <p> &nbsp;&nbsp;&nbsp;&nbsp; <label> Home Page: * </label> </p>
                        <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="txtHomePage" class="inputs" placeholder="http://www.sp.senai.br/"> </p>

                    </div>
                    <div>
                        <p> &nbsp;&nbsp;&nbsp;&nbsp; <label> Link do Facebook: * </label> </p>
                        <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="txtFacebook" class="inputs" placeholder="https://www.facebook.com/Galera-de-Sampa"> </p>
                    </div>
                    <div>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="rdoOpcao" value="Sugestão" class="btnRadio"> Sugestão</p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="rdoOpcao" value="Crítica" class="btnRadio"> Crítica </p>
                    </div>
                    <div>
                        <p> &nbsp;&nbsp;&nbsp;&nbsp; <label> Profissão: * </label> </p>
                        <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="txtProfissao" class="inputs" placeholder="Tecnologo em desenvolvimento de software"> </p>
                    </div>
                    <div>
                        <p> &nbsp;&nbsp;&nbsp;&nbsp; <label> Sexo: * </label> </p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="rdoSexo" value="Masculino" class="btnRadio"> Masculino</p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="rdoSexo" value="Feminino" class="btnRadio"> Feminino</p>
                    </div>
                    <div>
                        <p> &nbsp;&nbsp;&nbsp;&nbsp; <label> Mensagem: * </label> </p>

                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="txtMensagem" rows="20" cols="145"></textarea> </p>
                    </div>
                    <div class="center">
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="btnSalvar" value="ENVIAR" id="btnEnviar"> </p>
                    </div>
                </form>



            </div>

        </div>


    </div>
    <footer id="caixa_rodape">

        <div id="rodape" class="center">
            <div id="sistema_interno">

                <div id="btn_sistema" class="center">
                    <input type="button" value="SISTEMA INTERNO">
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

                    <input type="button" value="BAIXE O APP">

                </div>


            </div>

        </div>


    </footer>
    <script src="js/main.js"></script>
</body>

</html>