<?php
session_start();

include "utilities/verifySession.php";

function getNamesEstoque()
{


    include "utilities/mysqlconecta.php";
    $id_empresa = $_SESSION['id_empresa'];

    $query = mysqli_query($conexao, "select nome_produto, id_materiaPrima from estoque where estado != 'deletado' and id_empresa = $id_empresa");

    while ($produto = mysqli_fetch_array($query)) {

        echo "<option value='$produto[1]'>$produto[0]</option>";

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Notas</title>
</head>

<body class="bg-body-tertiary h-100">
    <nav class="navbar navbar-expand-lg border-bottom bg-body-secondary">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">ERP Logistico</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <a href="utilities/logout.php">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                        <path
                            d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z" />
                    </svg>
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="utilities/logout.php" class="nav-link active link-logout">Logout</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <div class="container text-center mt-3">
        <div class="row align-items-center border-bottom w-100 pb-2">
            <div class="col">
                <h1>Notas</h1>
            </div>
            <div class="col">
                <input class="form-control" type="text" placeholder="dd/mm/aaaa" name="filter-date" id="filter-date"
                    aria-label="default input example" maxlength="10" oninput="table('searchbar')">
            </div>
            <div class="col">
                <select class="form-select" id='estado' aria-label="Default select example"
                    oninput="table('searchbar')">
                    <option value="todos" selected>Todos os estados</option>
                    <option value="Requisitada">Requisitado</option>
                    <option value="Atendida">Atendida</option>
                    <option value="Cancelada">Cancelada</option>
                </select>
            </div>
            <div class="col">
                <div class="input-group">
                    <span class="input-group-text" id="inputGroup-sizing-default">
                        <i class="bi bi-search"></i>
                    </span>
                    <input class="form-control" type="text" placeholder="Pesquisar..." id='searchbar'
                        aria-label="default input example" oninput="table('searchbar')">
                </div>
            </div>
            <div class="col">
                <button type="button" class="btn btn-warning fw-bold" data-bs-toggle="modal"
                    data-bs-target="#modal_add">
                    <i class="bi bi-plus-circle bold"></i>
                    Nova nota
                </button>
            </div>
        </div>
    </div>

    <div class="table-container">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Quantidade do Produto</th>
                    <th scope="col">Data de chegada</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody id="table">
            </tbody>
        </table>
    </div>

    <!-- Modal de nova nota -->
    <div class="modal fade" id="modal_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form_add" class="needs-validation" novalidate>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <small class="form-text align-start mb-1">
                                    Nome do Produto:
                                </small>
                            </div>
                            <div class="col">
                                <small class="form-text align-start mb-1">
                                    Quantidade a receber:
                                </small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <select class="form-select" id="nome_produto" aria-label="Default select example"
                                    oninput="change_input_sufix(this.value); " required>
                                    <option selected hidden disabled value="">Produto...</option>
                                    <?php

                                    getNamesEstoque();

                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Insira um nome.
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input class="form-control" type="text" id="qtd_requisitada"
                                        oninput="int_js(this.value, this); limit_input(this.id)" disabled required>

                                    <span class="input-group-text" id="span_unidade_medida">
                                        ...
                                    </span>
                                </div>

                                <div class="invalid-feedback">
                                    Insira uma quantidade.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <small class="form-text align-start mb-1">
                                    Data de chegada:
                                </small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input class="form-control" type="text" id="data_chegada" placeholder="dd/mm/yyyy"
                                    required>
                                <div class="invalid-feedback">
                                    Insira uma data de chegada.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-warning">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Cancelar -->
    <div class="modal fade" id="modal_cancel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cancelar nota?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form_cancel" class="needs-validation" novalidate>
                    <div class="modal-body" id="modalCancel_body">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Cancelar</button>
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
<script src="../js/notas.js"></script>

</html>