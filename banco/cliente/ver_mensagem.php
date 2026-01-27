<?php
include(__DIR__ . "/../includes/config.php");
include(BASE_DIR . "includes/auth.php");
include(BASE_DIR . "includes/db.php");

// segurança: só admin
if ($_SESSION["email"] !== "admin@gmail.com") {
    header("Location: perfil.php");
    exit();
}

$id = $_GET["id"] ?? null;

$stmt = $pdo->prepare("SELECT * FROM mensagens WHERE id = ?");
$stmt->execute([$id]);
$msg = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Mensagem</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<div class="dashboard">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            <img src="/assets/img/logo.png" class="logo-img">
            <span>BANCO NOVO</span>
        </div>

        <nav class="sidebar-nav">
            <a href="perfil.php">Perfil</a>
            <a href="clientes.php">Clientes</a>
            <a href="mensagens.php" class="active">Mensagens</a>
            <a href="logout.php">Logout</a>
        </nav>
    </aside>

    <!-- CONTEÚDO -->
    <main class="main-content">

        <h1><?= htmlspecialchars($msg["assunto"]) ?></h1>

        <div class="perfil-card">
            <p><strong>Nome:</strong> <?= htmlspecialchars($msg["nome"]) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($msg["email"]) ?></p>
            <p><strong>Data:</strong> <?= $msg["criada_em"] ?></p>
            <hr>
            <p><?= nl2br(htmlspecialchars($msg["mensagem"])) ?></p>
        </div>

        <a href="mensagens.php" class="btn">← Voltar</a>

    </main>
</div>

</body>
</html>
