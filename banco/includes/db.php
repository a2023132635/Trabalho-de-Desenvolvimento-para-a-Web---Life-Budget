<?php
$host = "127.0.0.1";   // ⚠️ em vez de localhost
$dbname = "banco_novo";
$user = "root";
$pass = "ServBay.dev";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $user,
        $pass
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro à base de dados: " . $e->getMessage());
}

