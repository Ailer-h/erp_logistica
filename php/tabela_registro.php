<?php

include "utilities/verifySession.php";
function getIdsNotas()
{

    include "utilities/mysqlconecta.php";

    $query = mysqli_query($conexao, "SELECT id_nota FROM nota");

    while ($ids = mysqli_fetch_array($query)) {

        echo "<option>$ids[0]</option>";

    }

}

?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Estoque</title>
</head>

<body class="bg-body-tertiary h-100">
    <nav class="navbar navbar-expand-lg border-bottom bg-body-secondary">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">ERP Logistico</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="utilities/logout.php" class="nav-link active link-logout">Logout</a>
                    </li>
                </ul>
            </div>
            <a href="utilities/logout.php">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                    <path
                        d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z" />
                </svg>
            </a>
        </div>
    </nav>

    <div class="container text-center mt-3">
        <div class="row align-items-center border-bottom w-100 pb-2">
            <div class="col">
                <h1>Registros</h1>
            </div>
            <div class="col">
                <input class="form-control" type="text" placeholder="dd/mm/aaaa" name="filter-date" id="filter-date"
                    aria-label="default input example">
            </div>
            <div class="col">
                <select class="form-select" aria-label="Default select example">
                    <option selected hidden>Estado do Registro</option>
                    <option value="1">Requisitado</option>
                    <option value="2">Em análise</option>
                    <option value="3">Devolvido</option>
                    <option value="4">Encaminhado para estoque</option>
                    <option value="5">Encaminhado para produção</option>
                </select>
            </div>
            <div class="col">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Pesquisar..."
                        aria-label="default input example">
                    <button type="button" class="btn btn-warning fw-bold">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
            <div class="col">
                <button type="button" class="btn btn-warning fw-bold" data-bs-toggle="modal"
                    data-bs-target="#modal_crud">
                    <i class="bi bi-plus-circle"></i>
                    Novo item
                </button>
            </div>
        </div>
    </div>

    <div class="table-container">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ID da nota</th>
                    <th scope="col">Quantidade recebida</th>
                    <th scope="col">Estado do Registro</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>

                <?php

                include "utilities/printRegistros.php";

                ?>

            </tbody>
        </table>
    </div>

    <!-- Modal do CRUD -->
    <div class="modal fade" id="modal_crud" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form" class="needs-validation" novalidate>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <small class="form-text align-start mb-1">
                                    Selecione o ID da nota:
                                </small>
                            </div>
                            <div class="col">
                                <small class="form-text align-start mb-1">
                                    Quantidade recebida no estoque:
                                </small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden>Open this select menu</option>
                                    <?php

                                    getIdsNotas();

                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Insira um nome.
                                </div>
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" id="qtd_padrao">
                                <div class="invalid-feedback">
                                    Insira uma quantidade.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <small class="form-text align-start mb-1">
                                    Defina um Estado:
                                </small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden>Estado do Registro</option>
                                    <option value="1">Requisitado</option>
                                    <option value="2">Em análise</option>
                                    <option value="3">Devolvido</option>
                                    <option value="4">Encaminhado para estoque</option>
                                    <option value="5">Encaminhado para produção</option>
                                </select>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-warning">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="bg-body-tertiary text-center text-lg-start">
        <div class="text-center p-2" style="background-color: rgba(0, 0, 0, 0.05); font-size: .75em;">
            by Henrique Ailer & Murilo Martins. <br>
            <a class="text-body" style="font-size: .75em;"
                href="https://github.com/Ailer-h/erp_logistica">github.com</a>
        </div>
    </footer>
</body>
<script>
    //Adicionando a mascara na data
    new Cleave('#filter-date', {
        date: true,
        delimiter: "/",
        datePattern: ['d', 'm', 'Y']
    });
    new Cleave('#data_chegada', {
        date: true,
        delimiter: '/',
        datePattern: ['d', 'm', 'Y']
    });
</script>

</html>