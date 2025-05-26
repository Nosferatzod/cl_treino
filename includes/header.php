<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="./assets/svg/logo.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NOME . (isset($titulo) ? " - $titulo" : ""); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/">
</head>

<body>
    <style>
        body {
            background-color: #6c8898;
        }
    </style>


</body>
<?php include __DIR__ . '/nav.php'; ?>
<main class="container mt-4">