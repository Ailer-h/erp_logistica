<?php

    include "utilities/verifySession.php";

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
    <title>Estoque</title>
</head>

<body class="bg-body-tertiary h-100" id="body">
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
                <h1>Estoque</h1>
            </div>
            <div class="col">
                <select class="form-select" id='estado' aria-label="Default select example"
                    oninput="table('searchbar')">
                    <option value="todos" selected>Todos</option>
                    <option value="falta">Em falta</option>
                    <option value="em_estoque">Em estoque</option>
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
                    Novo item
                </button>
            </div>
        </div>
    </div>

    <div class="table-container">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Quantidade em estoque</th>
                    <th scope="col">Estado do estoque</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody id="table"></tbody>
        </table>
    </div>

    <!-- Modal de novo item -->
    <div class="modal fade" id="modal_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Item</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        onclick="clear_form()"></button>
                </div>
                <form id="form_add" class="needs-validation" novalidate>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <small class="form-text align-start mb-1">
                                    Nome do produto:
                                </small>
                            </div>
                            <div class="col">
                                <small class="form-text align-start mb-1">
                                    Quantidade maxima:
                                </small>
                            </div>
                            <div class="col">
                                <small class="form-text align-start mb-1">
                                    Unidade de medida:
                                </small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <input class="form-control" type="text" id="nome_prod" required>
                                <div class="invalid-feedback">
                                    Insira um nome.
                                </div>
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" id="qtd_padrao" oninput="int_js(this.value, this)" required>
                                <div class="invalid-feedback">
                                    Insira uma quantidade.
                                </div>
                            </div>
                            <div class="col">
                                <select class="form-select" id='unidade_medida' aria-label="Default select example"
                                    required>
                                    <option selected disabled hidden value="">Choose...</option>
                                    <option value="kg">kg</option>
                                    <option value="g">g</option>
                                    <option value="l">l</option>
                                    <option value="ml">ml</option>
                                    <option value="unidades">unidade</option>
                                    <option value="duzias">duzia</option>
                                </select>
                                <div class="invalid-feedback">
                                    Insira a unidade de medida.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            onclick="clear_form()">Cancelar</button>
                        <button type="submit" class="btn btn-warning">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Item</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form_edit" class="needs-validation" novalidate>
                    <div class="modal-body" id="modalEdit_body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-warning">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="modal_delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar Item?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form_delete" class="needs-validation" novalidate>
                    <div class="modal-body" id="modalDelete_body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de baixa -->
    <div class="modal fade" id="modal_baixa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Dar baixa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form_baixa" class="needs-validation" novalidate>
                    <div class="modal-body" id="modalBaixa_body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-warning">Dar baixa</button>
                    </div>
                </form>
            </div>
        </div>
         <!-- Aviso de quantidade recebida invalida -->
         <div class="toast align-items-center text-bg-danger border-0 position-absolute top-0 end-0 m-4" role="alert"
            aria-live="assertive" id="alert-qtd" aria-atomic="true" d-block" data-bs-delay='4000'
            data-bs-autohide="true">
            <div class="d-flex">
                <div class="toast-body fw-bold">
                    Quantidade enviada não pode exceder quantidade em estoque.
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
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
<script src="../js/estoque.js"></script>

</html>