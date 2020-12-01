<?php

$codigo = (string) null;
$nome = (string) null;
$descricao = (string) null;
$preco = (string) null;
$imagem = (string) null;
$desconto = (string) null;

$diretorio = (string) "arquivos/";
$tamanhoPermitido = (int) 1000;
$arquivoPermitido = array("imagem/jpeg", "imagem/jpg", "imagem/png");
$arquivosPermitidos = array("image/jpeg", "image/jpg", "image/png"); 

//$var = session_start();

//var_dump($var);

if(isset($_POST['btnSalvar'])){
    
    require_once("conexao.php");
    $conexao = conexaoMysql();
    
    session_start();
    
    $nome = $_POST['txtNome'];
    $descricao = $_POST['txtDescricao'];
    $preco = $_POST['txtPreco'];
    $imagem = $_POST['flefoto'];
    $desconto = $_POST['txtDesconto'];
    
    
    
    if($_FILES['flefoto']['type'] != ""){
        
        //echo("Arquivo existente!");
        
        if($_FILES['flefoto']['size'] > 0 ){
            
            
            
            $tipoArquivo = $_FILES['flefoto']['type'];

                    //Permite buscar dentro de um array um 
                    //conteudo especifico
                    if(in_array($tipoArquivo, $arquivosPermitidos))
                    {
                        $tamanhoArquivo = round($_FILES['flefoto']['size']/1024);
                        
                        if($tamanhoArquivo <= $tamanhoPermitido){
                            
                            //echo("Tamanho de arquivo permitido");
                            
                            $nomeCompletoArquivo = $_FILES['flefoto']['name'];
                            
                            $nomeArquivo = pathinfo($nomeCompletoArquivo, PATHINFO_FILENAME);
                            $extArquivo = pathinfo($nomeCompletoArquivo, PATHINFO_EXTENSION);
                            
                            $nomeCripto = md5(uniqid(time()).$nomeArquivo);
                            $nomeFoto = $nomeCripto.".".$extArquivo;
                            
                            $arquivoTemporario = $_FILES['flefoto']['tmp_name'];
                            
                            if(move_uploaded_file($arquivoTemporario, $diretorio.$nomeFoto)){
                                //echo("Arquivo Transferido");
                                //echo("$nomeFoto");
                                $sql = "INSERT INTO tbl_produtos (nome, descrição, preco, imagem, desconto) values('".$nome."', '".$descricao."',
                                                    '".$preco."', '".$nomeFoto."', '".$desconto."')";
                                
                            }else{
                                echo("erro na transação");
                            }
                                
                            if(mysqli_query($conexao, $sql))
                            {
                                
                                if(isset($_SESSION['foto']))
                                        {
                                            unlink('arquivos/'.$_SESSION['foto']);
                                            unset($_SESSION['foto']);
                                            unset($_SESSION['id']);
                                        }
                                        
                                        //permite redirecionar para uma página
                                        header('location:../cms/conteudoProduto.php');
                                
                            }else{
                                echo("Erro no script do banco");
                                
                            }
                            
                        }else{
                            
                            echo("Arquivo muito grande");
                        }
                        
                        
                        
                    }else{
                        
                        echo("
                                <script> 
                                        alert('Não é possível salvar um arquivo dessa extensaõ!');
                                </script>
                                    ");
                    }
            
        }else{
            echo("
                    <script> 
                            alert('Não é possível salvar um arquivo sem tamanho!');
                    </script>
                        "
                );
        }
    }else{
        echo("
                <script> 
                        alert('Não é possivel fazer o upload de um arquivo sem tamanho!');
                </script>
                    "
            );
    }
    
}else{

    if(isset($_POST['btnEditar'])){
    
        //echo("Botão Editar Clicado <br>");
        
        require_once("conexao.php");
        $conexao = conexaoMysql();
        
        session_start();

       $nome = $_POST['txtNome'];
        $descricao = $_POST['txtDescricao'];
        $preco = $_POST['txtPreco'];
        $imagem = $_POST['flefoto'];
        $desconto = $_POST['txtDesconto'];

        //echo("$titulo, $texto");

        if($_FILES['flefoto']['type'] != ""){

            //echo("Arquivo existente!");

            if($_FILES['flefoto']['size'] > 0 ){



                $tipoArquivo = $_FILES['flefoto']['type'];

                        //Permite buscar dentro de um array um 
                        //conteudo especifico
                        if(in_array($tipoArquivo, $arquivosPermitidos))
                        {
                            $tamanhoArquivo = round($_FILES['flefoto']['size']/1024);

                            if($tamanhoArquivo <= $tamanhoPermitido){

                                //echo("Tamanho de arquivo permitido");

                                $nomeCompletoArquivo = $_FILES['flefoto']['name'];

                                $nomeArquivo = pathinfo($nomeCompletoArquivo, PATHINFO_FILENAME);
                                $extArquivo = pathinfo($nomeCompletoArquivo, PATHINFO_EXTENSION);

                                $nomeCripto = md5(uniqid(time()).$nomeArquivo);
                                $nomeFoto = $nomeCripto.".".$extArquivo;

                                $arquivoTemporario = $_FILES['flefoto']['tmp_name'];

                                if(move_uploaded_file($arquivoTemporario, $diretorio.$nomeFoto)){
                                    
                                    //echo("Arquivo Transferido");
                                    //echo("$nomeFoto");
                                    $sql = "UPDATE tbl_produtos SET nome = '".$nome."', descrição = '".$descricao."', preco = '".$preco."', imagem = '".$nomeFoto."', desconto = '".$desconto."' WHERE codigo=".$_SESSION['id'];
                                    //echo("$sql");

                                }else{
                                    echo("erro na transação");
                                }

                                if(mysqli_query($conexao, $sql))
                                {


                                    if(isset($_SESSION['foto']))
                                            {
                                                unlink('arquivos/'.$_SESSION['foto']);
                                                unset($_SESSION['foto']);
                                                unset($_SESSION['id']);
                                            }

                                            //permite redirecionar para uma página
                                            header('location:../cms/conteudoProduto.php');

                                }else{
                                    echo("Erro no script do banco");
                                }

                            }else{

                                echo("Arquivo muito grande");
                            }



                        }else{

                            echo("
                                    <script> 
                                            alert('Não é possível salvar um arquivo dessa extensaõ!');
                                    </script>
                                        ");
                        }

            }else{
                echo("
                        <script> 
                                alert('Não é possível salvar um arquivo sem tamanho!');
                        </script>
                            "
                    );
            }
        }else{
            echo("
                    <script> 
                            alert('Não é possivel fazer o upload de um arquivo sem tamanho!');
                    </script>
                        "
                );
        }

    }else{
    
        echo("esperando ser clicado");
    }
}






?>