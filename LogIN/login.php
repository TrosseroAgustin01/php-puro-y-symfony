<?php
session_start();

// Conectar a la base de datos
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Verificar usuario y contraseña utilizando una consulta SQL
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
  // Iniciar sesión y redirigir al usuario a la página de bienvenida
  $_SESSION['username'] = $username;
  header("Location: welcome.php");
} else {
  // Mostrar un mensaje de error y volver a mostrar el formulario de log in
  $error_message = "Usuario o contraseña inválidos.";
}

mysqli_close($conn);
?>
