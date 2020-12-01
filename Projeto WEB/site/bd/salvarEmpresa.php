<?php

$codigo = (string) null;
$titulo = (string) null;
$texto = (string) null;
$nomeImagem = (string) null;

$diretorio = (string) "arquivos/";
$tamanhoPermitido = (int) 1000;
$arquivoPermitido = array("imagem/jpeg", "imagem/jpg", "imagem/png");
$arquivosPermitidos = array("image/jpeg", "image/jpg", "image/png"); 

session_start();


if(isset($_POST['btnSalvar'])){
    
    require_once("conexao.php");
    $conexao = conexaoMysql();
    
    $titulo = $_POST['txtTitulo'];
    $texto = $_POST['txtTexto'];
    $nomeImagem = $_POST['flefoto'];
    
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
                                $sql = "INSERT INTO tbl_one_empresa (titulo, texto, imagem) values('".$titulo."', '".$texto."',
                                                    '".$nomeFoto."')";
                                
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
                                        header('location:../cms/conteudoEmpresa.php');
                                
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
    
        echo("Botão Editar Clicado <br>");
        
        require_once("conexao.php");
        $conexao = conexaoMysql();

        $titulo = $_POST['txtTitulo'];
        $texto = $_POST['txtTexto'];
        $nomeImagem = $_POST['flefoto'];

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
                                    $sql = " UPDATE tbl_one_empresa SET titulo = '".$titulo."', texto = '".$texto."', imagem = '".$nomeFoto."' WHERE codigo=".$_SESSION['id'];
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
                                            header('location:../cms/conteudoEmpresa.php');

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