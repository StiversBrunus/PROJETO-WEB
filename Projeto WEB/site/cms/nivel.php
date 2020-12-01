<?php

$codigo =  null;


    require_once('../bd/conexao.php');
    $conexao = conexaoMysql();

    session_start();
    
    $_SESSION['id'] = $codigo;
    
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
        });
        function visualizarDados(idItem) {
            $.ajax({
                type: "POST",
                url: "../bd/modalNivel.php",
                data: {
                    modo: 'visualizar',
                    codigo: idItem
                },
                success: function(dados) {
                    $('.conteudoModal').html(dados);
                }
            });
        }
         
        function editarDados(idItem) {
            $.ajax({
                type: "POST",
                url: "../bd/modalNivel.php",
                data: {
                    modo: 'editar',
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
            <div class="fechar">
                 <img src="img/close.png">
            </div>
            <div class="conteudoModal">
                <div class="center">
                    <form action="../bd/salvarNivel.php" name="frmNivel" method="post">
                        
                        <p><label>Nome :</label><input type="text" name="nomeUsuario"></p>
                        
                        <p><label>Conteudo:</label> <input type="checkbox" name="chkConteudo"></p>
                        <p><label>Fale Conosco :</label> <input type="checkbox" name="chkFaleConosco"></p>
                        <p><label>Usuario :</label> <input type="checkbox" name="chkUsuario"></p>
                        

                        <input type="submit" value="Salvar" name="btnSalvarNivel">
                        
                    </form>
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
                <h1>SGN - Sistema de Gerenciamento de Níveis</h1>
            </div>
            <div class="caixa_opcoes center">

                <div class="opcoes">
                    <a class="visualizar">
                        <div id="cardAddNivel">

                        </div>
                    
                    </a>
                    
                </div>
                <div class="opcoes">
                    <div id="cardNivel">

                    </div>
                </div>

            </div>

            <div id="tabelaNivel" class="center">
                
                <?php echo($codigo)?>
                <table id="consultaNivel" class="center">
                    <tr class="cab">
                        <th>Nome</th>
                        <th>Adm. Conteudo</th>
                        <th>Adm. Fale Conosco</th>
                        <th>Adm. Usuario </th>
                        <th>Opções</th>

                    </tr>
                    <?php

                            $sql = 'SELECT * FROM nivel_acesso ORDER BY codigo DESC';
                            $select = mysqli_query($conexao, $sql);

                            while($rs = mysqli_fetch_array($select)){


                        ?>
                    <tr>
                        <th><?=($rs['nome']); ?></th>
                        <th> <?=($rs['adm_conteudo']); ?></th>
                        <th><?=($rs['adm_faleConosco']); ?></th>
                        <th><?=($rs['adm_usuario']); ?></th>
                        <th>
                            <a class="visualizar" onclick="editarDados(<?=$rs['codigo'];?>);">
                                
                                <img href="#" src="img/edit.png"></a>

                            <a href="../bd/deletarNivel.php?codigo=<?=$rs['codigo'];?>">
                                <img src="img/delete.png"></a></th>
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