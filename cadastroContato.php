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

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
</head>

<body>

    <div class="wrapper">


        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-info">
                <div class="container-fluid">

                    <h4 class="m-0 font-weight-bold text-dark text-center">Cadastro Contato</h4>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">

                            <li class="nav-item">
                                <button type="button" class="btn btn-warning btn-sm"><a href="index.php">Voltar</a></button>
                            </li>
                        </ul>
                    </div>


                </div>
            </nav>

            <div>
                <div class="wrapper wrapper--w680">
                    <div class="card card-4">
                        <div class="card-body">
                            <h2 class="title">Cadastro</h2>
                            <?php
                            //Se o name existe e o botão cadastrar foi acionado, então as informações vão ser recolhidas
                            if (isset($_POST['nome'])) {
                                //Função permite bloquear códigos maliciosos que terceiros podem colocar ao registrar informação
                                $nome = addslashes($_POST['nome']);
                                $empresa = addslashes($_POST['empresa']);
                                $identificacao = addslashes($_POST['identificacao']);
                                $apartamento = addslashes($_POST['apartamento']);
                                $bloco = addslashes($_POST['bloco']);
                               

                                if ($con->cadastrarContato($nome, $empresa, $identificacao, $apartamento, $bloco) == true) {

                                    header('location: /cadastroPortaria/index.php');
                                }
                            }
                            ?>
                            <form method="POST">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="empresa">Empresa</label>
                                        <input type="text" class="form-control" id="empresa" name="empresa">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="identificacao">RG / CPF/ MATRÍCULA</label>
                                        <input type="text" class="form-control" id="identificacao" name = "identificacao">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputZip">Apto</label>
                                        <input type="text" class="form-control" id="inputZip" name="apartamento">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputState">Bloco</label>
                                        <select id="inputState" class="form-control">
                                            <option selected></option>
                                            <option>1</option>
                                            <option>2</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });
        });
    </script>
</body>

</html>