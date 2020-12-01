<?php

$codigo = (string) null;


    require_once('../bd/conexao.php');
    $conexao = conexaoMysql();

    session_start();
    
    $_SESSION['id'] = $codigo;

    //script a ser execultado no banco
    //$sql = "SELECT * FROM sac WHERE codigo=".$codigo;
            
    //execulta o script no banco
    //$select = mysqli_query($conexao, $sql);


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
    <script type="text/javascript">
        $(document).ready(function() {
            /*function para abrir a modal*/
            $('.visualizar').click(function() {
                $('.container').fadeIn(1000);


            });

            $('.fechar').click(function() {
                $('.container').fadeOut(1000);
            });

            /* 
                Trás as colunas de cada linha da tabela 
                nth-child() retorna o indice do elemento filho
            */
            $consulta = document.querySelectorAll("#consulta tbody tr:nth-child(2) th:nth-child(3)");

            /* Trás cada linha da tabela */
            $table = document.querySelectorAll("#consulta tbody tr:nth-child(2)");

            $th = document.querySelectorAll("#consulta tbody tr:nth-child(2)");

        });
        $(document).ready(function() {

            $('#filtro').change(function() {
                if ($("#filtro option:selected").val() == 'critica') {

                    for ($cont = 0; $cont < $consulta.length; $cont++) {
                        if ($consulta[$cont].innerHTML == 'Critica') {

                        } else {}
                    }

                } else if ($("#filtro option:selected").val() == 'sugestao') {

                    for ($cont = 0; $cont < $consulta.length; $cont++) {
                        if ($consulta[$cont].innerHTML == 'Sugestão') {

                        } else {

                        }
                    }
                }
            });
        });

        function visualizarDados(idItem) {
            $.ajax({
                type: "POST",
                url: "../bd/modalContatos.php",
                data: {
                    modo: 'visualizar',
                    codigo: idItem
                },
                success: function(dados) {
                    $('.conteudoModal').html(dados);
                }
            });
        }

    </script>
</head>

<body>
    <div class="container">

        <div class="modal">
            <div class="modal_box center">
                <a href="#" class="fechar">
                    <img src="img/close.png">
                </a>

                <div class="tituloModal">
                    <h1>Visualização de Contatos</h1>
                </div>

                <div class="conteudoModal">
                    
                </div>
            </div>

        </div>

    </div>
    <div class="caixa center">
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
        <div class="conteudo center">
            <div class="titulo center">
                <h1>SAC - Sistema de Atendimento ao Cliente</h1>
            </div>
            <div id="caixa_filtro">
                <div class="filtro">
                    <select name="filtro" id="filtro">
                        <option value="neutro" disabled selected>Selecione um tipo de mensagem</option>
                        <option value="todos">Listar Todos</option>
                        <option value="critica"> Crítica</option>
                        <option value="sugestao">Sugestão</option>
                    </select>
                </div>

            </div>

            <div class="center caixa_table">

                <table id="consulta" class="center">
                    <tr class="cab">
                        <th>Nome</th>
                        <th>Celular</th>
                        <th>Tipo da Mensagem</th>
                        <th> Opções </th>

                    </tr>
                    <?php

                            $sql = 'SELECT * FROM tbl_contatos ORDER BY codigo DESC';
                            $select = mysqli_query($conexao, $sql);

                            while($rs = mysqli_fetch_array($select)){


                        ?>
                    <tr>
                        <th><?=($rs['nome']); ?></th>
                        <th> <?=($rs['celular']); ?></th>
                        <th><?=($rs['tipo_mensagem']); ?></th>
                        <th>
                            <a class="visualizar" onclick="visualizarDados(<?=$rs['codigo'];?>);">
                                <img href="#" src="img/visualizar.png"></a>

                            <a href="../bd/deletarContato.php?codigo=<?=$rs['codigo'];?>">
                                <img src="img/delete.png"></a>
                        </th>
                    </tr>
                    <?php
                            }
                        ?>
                </table>
            </div>


        </div>
        <div class="rodape center">
            <h1> Desenvolvido por: Bruno de Oliveira Araujo</h1>
        </div>

    </div>


</body>

</html>
