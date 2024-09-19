<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Estoque</title>
</head>

<body class="bg-body-tertiary h-100">
    <nav class="navbar navbar-expand-lg border-bottom bg-body-secondary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ERP Logistico</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul> -->
            </div>
        </div>
    </nav>

    <div class="container text-center mt-3">
        <div class="row align-items-center border-bottom w-100 pb-2">
            <div class="col">
                <h1>Estoque</h1>
            </div>
            <div class="col">
                <input class="form-control" type="text" placeholder="dd/mm/aaaa" name="filter-date" id="filter-date" aria-label="default input example">
            </div>
            <div class="col">
                <select class="form-select" aria-label="Default select example">
                    <option selected hidden>Estado no estoque</option>
                    <option value="1">Todos</option>
                    <option value="2">Em falta</option>
                    <option value="3">Em estoque</option>
                </select>
            </div>
            <div class="col">
                <button type="button" class="btn btn-warning fw-bold">
                    <i class="bi bi-plus-circle"></i>
                    Novo item
                </button>
            </div>
        </div>
    </div>


    <footer class="bg-body-tertiary text-center text-lg-start">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05); font-size: .75em;">
            by Henrique Ailer & Murilo Martins. <br>
            <a class="text-body" style="font-size: .75em;" href="https://github.com/Ailer-h/erp_logistica">github.com</a>
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
</script>

</html>