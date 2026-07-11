<?php
// =========================================================
// includes/role_check.php  —  CHỈ ADMIN MỚI ĐƯỢC VÀO
// Đặt ĐẦU các trang quản trị:
//   require_once __DIR__ . '/../includes/role_check.php';
// =========================================================
require_once __DIR__ . '/auth_check.php';   // đã kiểm tra đăng nhập

if (($_SESSION['user']['vai_tro'] ?? '') !== 'admin') {
    header('Location: ' . BASE_URL . '/index.php');
    exit;
}
