<?php
  include_once("conectar.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Lista de Contatos</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style4.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    
</head>

<body>

    <div class="wrapper">


        <!-- Page Content  -->
        <div id="content">
            <div class="d-flex justify-content-center">
                <h1 class="mb-3 font-weight-bold text-dark text-center">Registro Saída</h1>
            </div>
            <div>
                <div class="wrapper wrapper--w680">
                    <?php
                        if (isset($_GET['id'])) {
                            $id = addslashes($_GET['id']);
                            $res = $con->buscarDadosContato($id);
                        }
                    ?>
                    <div class="card card-4">
                        <div class="card-body">
                            <h2 class="title mb-2">Formulário Saída</h2>
                            <hr class="mb-2">
                            <?php
                            //Se o name existe e o botão cadastrar foi acionado, então as informações vão ser recolhidas
                            if (isset($_POST['nome'])) {
                                if (isset($_GET['id']) && !empty($_GET['id'])) {
                                    $id = addslashes($_GET['id']);
                                    $nome = addslashes($_POST['nome']);
                                    $empresa = addslashes($_POST['empresa']);
                                    $identificacao = addslashes($_POST['identificacao']);
                                    $apartamento = addslashes($_POST['apartamento']);
                                    $bloco = addslashes($_POST['bloco']);
                                    $saida = addslashes($_POST['saida']);

                                    if ($con->saida($id, $nome, $empresa, $identificacao, $apartamento, $bloco, $saida)) {
                                        header('location: /cadastroPortaria/index.php');
                                    }
                                }
                            }
                            ?>
                            <form method="POST" autocomplete="on">
                            <div class="form-row MT-5">
                                    <div class="form-group col-md-12">
                                        <input type="time" class="form-control" id="inputZip" name="saida" value="<?php if (isset($res)) {echo $res['saida'];} ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input class="input--style-4" type="hidden" class="form-control" id="nome" name="nome" value="<?php if (isset($res)) {echo $res['nome_aluno'];} ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input class="input--style-4" type="hidden" class="form-control" id="empresa" name="empresa" value="<?php if (isset($res)) {echo $res['empresa'];} ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    
                                    <div id="rg" class="form-group col-md-5">
                                        <input class="input--style-4" type="hidden" class="form-control" id="identificacao" name = "identificacao" placeholder="Nº do Documento" value="<?php if (isset($res)) {echo $res['CPF'];} ?>">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input class="input--style-4" type="hidden" class="form-control" id="inputZip" name="apartamento" value="<?php if (isset($res)) {echo $res['apartamento'];} ?>">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <select hidden class="input--style-4" id="inputState" class="form-control" name = "bloco">
                                            <option selected><?php if (isset($res)) {echo $res['bloco'];} ?>    </option>
                                            <option>1</option>
                                            <option>2</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="d-flex bd-highlight mb-3">
                                    <div class=" mt-2 p-2 bd-highlight">
                                        <button type="submit" class="btn btn-warning">Salvar</button>
                                    </div>
                                    <div class="mt-2 ml-auto p-2 bd-highlight">
                                        <a href="index.php">
                                            <button type="button" class="btn btn-dark btn-sm justify-content-end">
                                                Voltar
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="copyright py-4 text-center text-dark ">
            <div class="container"><small>Copyright &copy; Código da Nathi 2023</small></div>
        </div>
    </footer>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="./js/script.js"></script>   
    <script src="./js/jquery.mask.js"></script>    
</body>

</html>