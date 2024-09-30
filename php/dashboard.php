<?php

include "utilities/verifySession.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<html lang="pt-br" data-bs-theme="dark" class="h-100">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
<link rel="stylesheet" href="../css/style.css">
<title>DashBoard</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body class="bg-body-tertiary h-100">
    <nav class="navbar navbar-expand-xl border-bottom bg-body-secondary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ERP Logistico</a>

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
    <div class="title w-100 position-fixed text-center ">
        <h1 class="fs-1 mt-5">MENU</h1>
    </div>
    <div class="d-flex justify-content-evenly align-items-center" style="height:90%;">

        <div class="card text-center" style="width: 20em;">
            <h5 class="card-title text-center fs-3 pt-2">Notas</h5>
            <div class="card-body">
                <img src="../images/notas.png">
            </div>
            <a href="tabela_notas.php" class="btn btn-warning m-3 fw-bold">Ver Notas</a>
        </div>
        <div class="card text-center" style="width: 20em;">
            <h5 class="card-title text-center fs-3 pt-2">Estoque</h5>
            <div class="card-body">
                <img src="../images/estoque.png">
            </div>
            <a href="tabela_estoque.php" class="btn btn-warning m-3 fw-bold">Ver estoque</a>
        </div>
        <div class="card text-center" style="width: 20em;">
            <h5 class="card-title text-center fs-3 pt-2">Registros</h5>
            <div class="card-body">
                <img src="../images/registros.png">
            </div>
            <a href="tabela_registro.php" class="btn btn-warning m-3 fw-bold">Ver Registros</a>
        </div>
    </div>
    <footer class="bg-body-tertiary text-center text-lg-start">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05); font-size: .75em;">
            by Henrique Ailer & Murilo Martins. <br>
            <a class="text-body" style="font-size: .75em;"
                href="https://github.com/Ailer-h/erp_logistica">github.com</a>
        </div>
    </footer>

</body>

</html>