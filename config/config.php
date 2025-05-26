<?php
// config/config.php
define('DB_HOST', 'localhost');    // Normalmente é "localhost"
define('DB_NAME', 'cltreino');     // Nome do banco que você criou
define('DB_USER', 'root');         // Usuário padrão é "root"
define('DB_PASS', '');     // Senha definida no Docker

define('EMAIL_HOST', 'smtp.seuprovedor.com');
define('EMAIL_PORT', 587);
define('EMAIL_USER', 'seuemail@dominio.com');
define('EMAIL_PASS', 'suasenha');
define('EMAIL_FROM', 'seuemail@gmail.com');

$pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
// Configurações do site
define('SITE_NOME', 'CLTreino');
define('SITE_DESC', 'Site de ensino rápido para profissionais');

// URL do site
define('BASE_URL', 'http://localhost:3000/');

// Conexão com o banco de dados
try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>