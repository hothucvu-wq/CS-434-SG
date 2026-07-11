<?php
// =========================================================
// includes/auth_check.php  —  BẢO VỆ TRANG (phải đăng nhập)
// Đặt ĐẦU file cần bảo vệ:
//   require_once __DIR__ . '/../includes/auth_check.php';
// =========================================================
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/../config/db.php';   // nạp BASE_URL + $pdo

if (empty($_SESSION['user'])) {
    header('Location: ' . BASE_URL . '/auth/login.php');
    exit;
}
