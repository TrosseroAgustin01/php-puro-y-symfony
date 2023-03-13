<?php
session_start();

if (!isset($_SESSION['username'])) {
  // Si el usuario no ha iniciado sesión, redirigir al usuario a la página de log in
  header("Location: login.php");
}

?>

<div class="container">
 
