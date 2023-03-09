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

                    <h4 class="m-0 font-weight-bold text-dark">Cadastro Contato</h4>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">

                            <li class="nav-item">
                                <a href="index.php">Lista de Contatos</a>
                            </li>
                        </ul>
                    </div>


                </div>
            </nav>

            <div>
                <div class="wrapper wrapper--w680">
                    <?php
                    if (isset($_GET['idEditar'])) {
                        $idEditar = addslashes($_GET['idEditar']);
                        $res = $con->buscarDadosContato($idEditar);
                    }
                    ?>
                    <div class="card card-4">
                        <div class="card-body">
                            <h2 class="title">Cadastro</h2>
                            <?php
                            //Se o name existe e o botão cadastrar foi acionado, então as informações vão ser recolhidas
                            if (isset($_POST['nome'])) {

                                if (isset($_GET['idEditar']) && !empty($_GET['idEditar'])) {
                                    //Função permite bloquear códigos maliciosos que terceiros podem colocar ao registrar informação
                                    $idEditar = addslashes($_GET['idEditar']);
                                    $nome = addslashes($_POST['nome']);
                                    $sobrenome = addslashes($_POST['sobrenome']);
                                    $email = addslashes($_POST['email']);
                                    $telefone = addslashes($_POST['telefone']);
                                    

                                    if ($con->atualizarDados($idEditar, $nome, $sobrenome, $email, $telefone) == true) {
                                        header('location: /apresentacao/index.php');
                                    }
                                }
                            }
                            ?>
                            <form method="POST">
                                <div class="row row-space">
                                    <div class="col-6">
                                        <div class="input-group">
                                            <label class="label">Primeiro Nome</label>
                                            <input class="input--style-4" type="text" name="nome" value="<?php if (isset($res)) {
                                                                                                                echo $res['nome'];
                                                                                                            } ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <label class="label">Sobrenome</label>
                                            <input class="input--style-4" type="text" name="sobrenome" value="<?php if (isset($res)) {
                                                                                                                    echo $res['sobrenome'];
                                                                                                                } ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-space">
                                    <div class="col-6">
                                        <div class="input-group">
                                            <label class="label">Email</label>
                                            <input class="input--style-4" type="email" name="email" value="<?php if (isset($res)) {
                                                                                                                echo $res['email'];
                                                                                                            } ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <label class="label">Telefone</label>
                                            <input class="input--style-4" type="number" name="telefone" value="<?php if (isset($res)) {
                                                                                                                    echo $res['telefone'];
                                                                                                                } ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="p-t-15">
                                    <button class="btn btn-primary" type="submit">Editar</button>
                                </div>
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