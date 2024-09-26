<?php

    session_start();
    session_destroy();

?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"crossorigin="anonymous"></script>
    <title>Logout</title>
</head>
<body class="d-flex align-items-center justify-content-center h-100">
<div class="modal d-block">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Sessão expirada</h5>
      </div>
      <div class="modal-body">
        <p>Sua sessão expirou ou você não tem permissão para entrar aqui. Por favor volte para a página de login.</p>
      </div>
      <div class="modal-footer">
        <a href="../login.php"><button type="button" class="btn btn-danger">Voltar a tela de login</button></a>
      </div>
    </div>
  </div>
</div>
</body>
</html>