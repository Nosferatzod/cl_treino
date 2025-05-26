<?php
require __DIR__ . '/config/config.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    die(json_encode(['erro' => 'Não autorizado']));
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_FILES['foto_perfil'])) {
    die(json_encode(['erro' => 'Requisição inválida']));
}

// Configurações
$diretorioUpload = 'assets/uploads/perfis/';
$tamanhoMaximo = 2 * 1024 * 1024; // 2MB
$tiposPermitidos = ['image/jpeg', 'image/png'];

// Verificações
$arquivo = $_FILES['foto_perfil'];
if ($arquivo['error'] !== UPLOAD_ERR_OK) {
    die(json_encode(['erro' => 'Erro no upload']));
}

if ($arquivo['size'] > $tamanhoMaximo) {
    die(json_encode(['erro' => 'Arquivo muito grande']));
}

if (!in_array($arquivo['type'], $tiposPermitidos)) {
    die(json_encode(['erro' => 'Tipo de arquivo não permitido']));
}

// Criar diretório se não existir
if (!is_dir($diretorioUpload)) {
    mkdir($diretorioUpload, 0755, true);
}

// Gerar nome único para o arquivo
$extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
$nomeArquivo = 'perfil_' . $_SESSION['usuario_id'] . '_' . time() . '.' . $extensao;
$caminhoCompleto = $diretorioUpload . $nomeArquivo;

// Mover arquivo
if (move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)) {
    // Atualizar banco de dados
    try {
        $stmt = $pdo->prepare("UPDATE usuarios SET foto_perfil = ? WHERE id = ?");
        $stmt->execute([$caminhoCompleto, $_SESSION['usuario_id']]);
        
        // Atualizar sessão
        $_SESSION['usuario_foto'] = $caminhoCompleto;
        
        echo json_encode(['sucesso' => true, 'caminho' => $caminhoCompleto]);
    } catch (PDOException $e) {
        unlink($caminhoCompleto); // Remove o arquivo se der erro no BD
        die(json_encode(['erro' => 'Erro ao salvar no banco de dados']));
    }
} else {
    die(json_encode(['erro' => 'Erro ao mover arquivo']));
}
?>