<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    echo $email;
    echo $password;
    if ($email == "admin@gmail.com" && $password == "1234") {
        $_SESSION['user_id'] = true;
        header("Location: index.php");
        exit();
    } else {
        echo "Credenciais incorretas. Tente novamente.";
    }
}
?>