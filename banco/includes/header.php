<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$basePath = str_repeat('../', substr_count($_SERVER['PHP_SELF'], '/') - 1);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Banco Novo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS PRINCIPAL -->
    <link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/style.css">

</head>
<body>

<header class="header">
    <div class="header-container">

        <a href="<?php echo $basePath; ?>index.php" class="logo-area">
            <img src="<?php echo $basePath; ?>assets/img/logo.png" alt="Banco Novo" class="logo-img">
            <span>BANCO NOVO</span>
        </a>


        <nav class="nav">
            <a href="<?php echo $basePath; ?>index.php">Home</a>
            <a href="<?php echo $basePath; ?>#contas">Contas</a>
            <a href="<?php echo $basePath; ?>public/sobre.php">Ajuda</a>

            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="<?php echo $basePath; ?>cliente/perfil.php" class="btn">
                    Área de Cliente
                </a>
            <?php else: ?>
                <a href="<?php echo $basePath; ?>public/login.php" class="btn">
                    Área de Cliente
                </a>
            <?php endif; ?>
        </nav>


    </div>
</header>



