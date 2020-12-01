<?php

$codigo = (string) null;


$tituloUm = (string) null;
$imagemUm = (string) null;
$tituloDois = (string) null;
$imagemDois = (string) null;
$tituloTres = (string) null;
$imagemTres = (string) null;

$diretorio = (string) "arquivos/";
$tamanhoPermitido = (int) 1000;
$arquivoPermitido = array("imagem/jpeg", "imagem/jpg", "imagem/png");
$arquivosPermitidos = array("image/jpeg", "image/jpg", "image/png"); 

session_start();

//echo("Entrou na salvarEmpresaDois");

if(isset($_POST['btnSalvar'])){
    
    require_once("conexao.php");
    $conexao = conexaoMysql();
    
    $tituloUm = $_POST['txtTituloUm'];
    $imagemUm = $_POST['flefotoUm'];
    $tituloDois = $_POST['txtTituloDois'];
    $imagemDois = $_POST['flefotoDois'];
    $tituloTres = $_POST['txtTituloTres'];
    $imagemTres = $_POST['flefotoTres'];
    
    //echo("$tituloUm, $tituloDois, $tituloTres");
    
    if($_FILES['flefotoUm']['type'] != "" && $_FILES['flefotoDois']['type'] != "" && $_FILES['flefotoTres']['type'] != ""){
        
        //echo("Arquivo existente!");
        
        if($_FILES['flefotoUm']['size'] > 0 && $_FILES['flefotoDois']['size'] > 0 && $_FILES['flefotoTres']['size'] > 0 ){
            
            
            
            $tipoArquivoUm = $_FILES['flefotoUm']['type'];
            $tipoArquivoDois = $_FILES['flefotoDois']['type'];
            $tipoArquivoTres = $_FILES['flefotoTres']['type'];
            

                    //Permite buscar dentro de um array um 
                    //conteudo especifico
                    if(in_array($tipoArquivoUm, $arquivosPermitidos) && in_array($tipoArquivoDois, $arquivosPermitidos) && in_array($tipoArquivoTres, $arquivosPermitidos))
                    {
                        $tamanhoArquivoUm = round($_FILES['flefotoUm']['size']/1024);
                        $tamanhoArquivoDois = round($_FILES['flefotoDois']['size']/1024);
                        $tamanhoArquivoTres = round($_FILES['flefotoTres']['size']/1024);
                        
                        if($tamanhoArquivoUm <= $tamanhoPermitido && $tamanhoArquivoDois <= $tamanhoPermitido && $tamanhoArquivoTres <= $tamanhoPermitido){
                            
                            //echo("Tamanho de arquivo permitido");
                            
                            $nomeCompletoArquivoUm = $_FILES['flefotoUm']['name'];
                            $nomeCompletoArquivoDois = $_FILES['flefotoDois']['name'];
                            $nomeCompletoArquivoTres = $_FILES['flefotoTres']['name'];
                            
                            //echo("$nomeCompletoArquivoUm, $nomeCompletoArquivoDois, $nomeCompletoArquivoTres, <html><br></html>");
                            
                            $nomeArquivoUm = pathinfo($nomeCompletoArquivoUm, PATHINFO_FILENAME);
                            $extArquivoUm = pathinfo($nomeCompletoArquivoUm, PATHINFO_EXTENSION);
                            
                            $nomeArquivoDois = pathinfo($nomeCompletoArquivoDois, PATHINFO_FILENAME);
                            $extArquivoDois = pathinfo($nomeCompletoArquivoDois, PATHINFO_EXTENSION);
                            
                            $nomeArquivoTres = pathinfo($nomeCompletoArquivoTres, PATHINFO_FILENAME);
                            $extArquivoTres = pathinfo($nomeCompletoArquivoTres, PATHINFO_EXTENSION);
                            
                            //echo("$nomeArquivoUm, $extArquivoUm, $nomeArquivoDois, $extArquivoDois, $nomeArquivoTres, $extArquivoTres, <html><br></html>");
                            
                            $nomeCriptoUm = md5(uniqid(time()).$nomeArquivoUm);
                            $nomeCriptoDois = md5(uniqid(time()).$nomeArquivoDois);
                            $nomeCriptoTres = md5(uniqid(time()).$nomeArquivoTres);
                            
                            //echo("$nomeCriptoUm, $nomeCriptoDois, $nomeCriptoTres");
                            
                            $nomeFotoUm = $nomeCriptoUm.".".$extArquivoUm;
                            $nomeFotoDois = $nomeCriptoDois.".".$extArquivoDois;
                            $nomeFotoTres = $nomeCriptoTres.".".$extArquivoTres;
                            
                            //echo("$nomeFotoUm, $nomeFotoDois, $nomeFotoTres");
                            
                            $arquivoTemporarioUm = $_FILES['flefotoUm']['tmp_name'];
                            $arquivoTemporarioDois = $_FILES['flefotoDois']['tmp_name'];
                            $arquivoTemporarioTres = $_FILES['flefotoTres']['tmp_name'];
                            
                            if(move_uploaded_file($arquivoTemporarioUm, $diretorio.$nomeFotoUm) && move_uploaded_file($arquivoTemporarioDois, $diretorio.$nomeFotoDois) && move_uploaded_file($arquivoTemporarioTres, $diretorio.$nomeFotoTres)){
                                
                                echo("Arquivo Transferido");
                                
                               $sql = "INSERT INTO tbl_two_empresa (titulo1, imagem1, titulo2, imagem2, titulo3, imagem3) values('".$tituloUm."', '".$nomeFotoUm."',
                                                    '".$tituloDois."', '".$nomeFotoDois."', '".$tituloTres."', '".$nomeFotoTres."')";
                                
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
    
    if(isset($_POST['btnEditarSegunda'])){
        
        require_once("conexao.php");
        $conexao = conexaoMysql();

        $tituloUm = $_POST['txtTituloUm'];
        $imagemUm = $_POST['flefotoUm'];
        $tituloDois = $_POST['txtTituloDois'];
        $imagemDois = $_POST['flefotoDois'];
        $tituloTres = $_POST['txtTituloTres'];
        $imagemTres = $_POST['flefotoTres'];

        //echo("$tituloUm, $tituloDois, $tituloTres");

        if($_FILES['flefotoUm']['type'] != "" && $_FILES['flefotoDois']['type'] != "" && $_FILES['flefotoTres']['type'] != ""){

            //echo("Arquivo existente!");

            if($_FILES['flefotoUm']['size'] > 0 && $_FILES['flefotoDois']['size'] > 0 && $_FILES['flefotoTres']['size'] > 0 ){



                $tipoArquivoUm = $_FILES['flefotoUm']['type'];
                $tipoArquivoDois = $_FILES['flefotoDois']['type'];
                $tipoArquivoTres = $_FILES['flefotoTres']['type'];


                        //Permite buscar dentro de um array um 
                        //conteudo especifico
                        if(in_array($tipoArquivoUm, $arquivosPermitidos) && in_array($tipoArquivoDois, $arquivosPermitidos) && in_array($tipoArquivoTres, $arquivosPermitidos))
                        {
                            $tamanhoArquivoUm = round($_FILES['flefotoUm']['size']/1024);
                            $tamanhoArquivoDois = round($_FILES['flefotoDois']['size']/1024);
                            $tamanhoArquivoTres = round($_FILES['flefotoTres']['size']/1024);

                            if($tamanhoArquivoUm <= $tamanhoPermitido && $tamanhoArquivoDois <= $tamanhoPermitido && $tamanhoArquivoTres <= $tamanhoPermitido){

                                //echo("Tamanho de arquivo permitido");

                                $nomeCompletoArquivoUm = $_FILES['flefotoUm']['name'];
                                $nomeCompletoArquivoDois = $_FILES['flefotoDois']['name'];
                                $nomeCompletoArquivoTres = $_FILES['flefotoTres']['name'];

                                //echo("$nomeCompletoArquivoUm, $nomeCompletoArquivoDois, $nomeCompletoArquivoTres, <html><br></html>");

                                $nomeArquivoUm = pathinfo($nomeCompletoArquivoUm, PATHINFO_FILENAME);
                                $extArquivoUm = pathinfo($nomeCompletoArquivoUm, PATHINFO_EXTENSION);

                                $nomeArquivoDois = pathinfo($nomeCompletoArquivoDois, PATHINFO_FILENAME);
                                $extArquivoDois = pathinfo($nomeCompletoArquivoDois, PATHINFO_EXTENSION);

                                $nomeArquivoTres = pathinfo($nomeCompletoArquivoTres, PATHINFO_FILENAME);
                                $extArquivoTres = pathinfo($nomeCompletoArquivoTres, PATHINFO_EXTENSION);

                                //echo("$nomeArquivoUm, $extArquivoUm, $nomeArquivoDois, $extArquivoDois, $nomeArquivoTres, $extArquivoTres, <html><br></html>");

                                $nomeCriptoUm = md5(uniqid(time()).$nomeArquivoUm);
                                $nomeCriptoDois = md5(uniqid(time()).$nomeArquivoDois);
                                $nomeCriptoTres = md5(uniqid(time()).$nomeArquivoTres);

                                //echo("$nomeCriptoUm, $nomeCriptoDois, $nomeCriptoTres");

                                $nomeFotoUm = $nomeCriptoUm.".".$extArquivoUm;
                                $nomeFotoDois = $nomeCriptoDois.".".$extArquivoDois;
                                $nomeFotoTres = $nomeCriptoTres.".".$extArquivoTres;

                                //echo("$nomeFotoUm, $nomeFotoDois, $nomeFotoTres");

                                $arquivoTemporarioUm = $_FILES['flefotoUm']['tmp_name'];
                                $arquivoTemporarioDois = $_FILES['flefotoDois']['tmp_name'];
                                $arquivoTemporarioTres = $_FILES['flefotoTres']['tmp_name'];

                                if(move_uploaded_file($arquivoTemporarioUm, $diretorio.$nomeFotoUm) && move_uploaded_file($arquivoTemporarioDois, $diretorio.$nomeFotoDois) && move_uploaded_file($arquivoTemporarioTres, $diretorio.$nomeFotoTres)){

                                    echo("Arquivo Transferido");

                                   $sql = "UPDATE tbl_two_empresa SET titulo1 = '".$tituloUm."', imagem1 = '".$nomeFotoUm."', titulo2 = '".$tituloDois."', imagem2 = '".$nomeFotoDois."', titulo3 = '".$tituloTres."', imagem3 = '".$nomeFotoTres."' WHERE codigo=".$_SESSION['id'];

                                }else{
                                    echo("erro na transação");
                                }

                                if(mysqli_query($conexao, $sql))
                                {
                                    echo("Arquivo salvo no banco");
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

            echo("Botao editar segunda tabela ine");
        }
}

?>