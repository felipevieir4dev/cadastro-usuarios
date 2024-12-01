<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../../config/config.php';
$response = array();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $response['status'] = 'error';
    $response['message'] = 'Método não permitido';
    echo json_encode($response);
    exit;
}

try {
    // Verificar conexão com o banco
    if (!isset($pdo)) {
        throw new Exception("Erro: Conexão com o banco de dados não estabelecida");
    }

    // Limpar a tabela
    $stmt = $pdo->prepare("TRUNCATE TABLE usuarios");
    $stmt->execute();
    
    $response['status'] = 'success';
    $response['message'] = 'Registros limpos com sucesso!';
    
} catch (Exception $e) {
    error_log("Erro ao limpar registros: " . $e->getMessage());
    $response['status'] = 'error';
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
