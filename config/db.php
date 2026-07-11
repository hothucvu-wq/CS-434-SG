<?php
// =========================================================
// config/db.php  —  KẾT NỐI CSDL (PDO)
// Mọi file chỉ cần: require_once __DIR__ . '/../config/db.php';
// => có sẵn biến $pdo và hằng BASE_URL
// =========================================================
require_once __DIR__ . '/config.php';

try {
    $pdo = new PDO(
        "mysql:host={$DB['host']};dbname={$DB['db']};charset=utf8mb4",
        $DB['user'],
        $DB['pass'],
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {
    die("Lỗi kết nối CSDL: " . $e->getMessage());
}
