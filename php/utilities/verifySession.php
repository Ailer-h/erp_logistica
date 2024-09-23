<?php

    session_status() === PHP_SESSION_ACTIVE ?: session_start();

if (!isset($_SESSION['id_empresa'])) {

    header("Location:utilities/sessionEnd.php");

}

?>