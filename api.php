<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';

header('Content-Type: application/json; charset=utf-8');

try {
    $pdo = database();
    $stmt = $pdo->query("SELECT * FROM v_fiber_master_catalog ORDER BY fiber_id ASC");
    $fibers = $stmt->fetchAll();

    echo json_encode($fibers, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} catch (PDOException $e) {
    http_response_code(500);
    error_log($e->getMessage());
    echo json_encode(['error' => 'Database connection failed. Check the MAMP database settings.']);
}