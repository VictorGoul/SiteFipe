<?php
    require_once 'pdoconfig.php';
    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    }catch(PDOException $pe){
        die("Não foi possível se conectar ao banco de dados $dbname :" . $pe ->getMessage());
    }
?>