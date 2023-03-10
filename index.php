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
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    
</head>

<body>
    <div class="d-flex justify-content-center">
        <h1 class="mb-5 mt-5 font-weight-bold text-dark text-center">Lista Registros </h1>
    </div>
    <div class="wrapper">
        <!-- Page Content  -->
        <div id="content">
            <div class="container-fluid">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="d-flex bd-highlight mb-3">
                            <div class=" mt-2 p-2 bd-highlight">
                                <a href="cadastroContato.php">
                                    <button class="btn btn-dark">Adicionar</button>
                                </a>
                            </div>
                            <div class="mt-2 ml-auto p-2 bd-highlight">
                                <a href="gerarPDF.php">
                                    <button class="btn btn-danger">Gerar PDF</button>
                                </a>
                            </div>               
                        </div>                       
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="110%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Empresa</th>
                                        <th>Documento</th>
                                        <th>Apartamento</th>
                                        <th>Bloco</th>
                                        <th>Data / Hora </th>
                                        <th>Sa??da</th>
                                        <th>Adicionar Sa??da</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $dados = $con->buscarDados();
                                    if (count($dados) > 0) {
                                        for ($i = 0; $i < count($dados); $i++) {
                                            echo "<tr>";
                                            foreach ($dados[$i] as $k => $v) {
                                                if ($k != "idContato") {
                                                    echo "<td>" . $v . "</td>";
                                                }
                                            }
                                    ?>
                                            <td>
                                                
                                                <div>
                                                    <a href="horaSaida.php?id=<?php echo $dados[$i]['idContato']; ?>">
                                                        <button class="btn-sm btn-dark rounded-circle">
                                                        <i class="fas fa-plus"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
                                    <?php
                                            echo "</tr>";
                                        }
                                    } else //N??o h?? registros.
                                    {
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="copyright py-4 text-center text-dark ">
            <div class="container"><small>Copyright &copy; C??digo da Nathi 2023</small></div>
        </div>
    </footer>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="./js/script.js"></script>    
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</body>

</html>