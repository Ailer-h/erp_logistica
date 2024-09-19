<!doctype html>
<html lang="pt-br" data-bs-theme="dark" class="h-100">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <title>Login</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary h-100">

<div class="toast align-items-center text-bg-danger border-0 position-absolute top-0 end-0 m-4" role="alert" aria-live="assertive" id="alert-senha" aria-atomic="true" d-block" data-bs-delay='1000' data-bs-autohide="true">
      <div class="d-flex">
        <div class="toast-body fw-bold">
          Senha errado
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>

    <div class="toast align-items-center text-bg-danger border-0 position-absolute top-0 end-0 m-4" role="alert" aria-live="assertive" id="alert-email" aria-atomic="true" d-block" data-bs-delay='1000' data-bs-autohide="true">
      <div class="d-flex">
        <div class="toast-body fw-bold">
          Email errado
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>

  <main class="w-100 m-auto form-container">
    <form method="POST" action="login.php">

      <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368">
        <path d="M240.92-268.31q51-37.84 111.12-59.77Q412.15-350 480-350t127.96 21.92q60.12 21.93 111.12 59.77 37.3-41 59.11-94.92Q800-417.15 800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 62.85 21.81 116.77 21.81 53.92 59.11 94.92ZM480.01-450q-54.78 0-92.39-37.6Q350-525.21 350-579.99t37.6-92.39Q425.21-710 479.99-710t92.39 37.6Q610-634.79 610-580.01t-37.6 92.39Q534.79-450 480.01-450ZM480-100q-79.15 0-148.5-29.77t-120.65-81.08q-51.31-51.3-81.08-120.65Q100-400.85 100-480t29.77-148.5q29.77-69.35 81.08-120.65 51.3-51.31 120.65-81.08Q400.85-860 480-860t148.5 29.77q69.35 29.77 120.65 81.08 51.31 51.3 81.08 120.65Q860-559.15 860-480t-29.77 148.5q-29.77 69.35-81.08 120.65-51.3 51.31-120.65 81.08Q559.15-100 480-100Zm0-60q54.15 0 104.42-17.42 50.27-17.43 89.27-48.73-39-30.16-88.11-47Q536.46-290 480-290t-105.77 16.65q-49.31 16.66-87.92 47.2 39 31.3 89.27 48.73Q425.85-160 480-160Zm0-350q29.85 0 49.92-20.08Q550-550.15 550-580t-20.08-49.92Q509.85-650 480-650t-49.92 20.08Q410-609.85 410-580t20.08 49.92Q450.15-510 480-510Zm0-70Zm0 355Z" />
      </svg>

      <div class="form-floating mb-3 mt-3">
        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating mb-3">
        <input type="password" class="form-control" id="floatingPassword" name="senha" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>

      <button class="btn btn-outline-warning w-100 py-2" name="login">Login</button>

    </form>

    
 </main>

</body>

</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {

  $email_empresa = $_POST["email"];
  $senha_empresa = $_POST["senha"];

  include "utilities/mysqlconecta.php";

  $query = mysqli_query($conexao, "SELECT email_empresa, senha_empresa,id_empresa FROM empresa WHERE email_empresa LIKE '$email_empresa'");

  $infos = mysqli_fetch_array($query);

  if (!empty($infos)) {

    if ($infos[0] == $email_empresa && $infos[1] == $senha_empresa) {

      session_start();

      $_SESSION['Empresa'] = $infos[2];

      header("Location: dashboard.php");
      
    
    }else{

      echo "<script>

      const toastContent = document.querySelector('#alert-senha');
      const toast = new bootstrap.Toast(toastContent);

      toast.show();

    </script>';";

    }

  }else{
    
    echo "<script>

      const toastContent = document.querySelector('#alert-email');
      const toast = new bootstrap.Toast(toastContent);

      toast.show();

    </script>';";

  }
}
?>