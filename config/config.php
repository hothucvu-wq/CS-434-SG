<?php
// =========================================================
// config/config.php  —  CẤU HÌNH CHUNG (do nhóm quản lý)
// =========================================================

// Đường dẫn gốc khi chạy trên XAMPP.
// ĐỔI thành tên thư mục chứa dự án trong htdocs.
// Ví dụ: để vào http://localhost/CS-434-SG/ thì để '/CS-434-SG'
define('BASE_URL', '/CS-434-SG');

// ===== CSDL =====
// CẢ NHÓM: mỗi người chạy XAMPP local, tạo CSDL `quanlysan`
// và IMPORT `database/schema.sql` => cấu trúc bảng GIỐNG HỆT NHAU.
// Chỉ dùng MySQL nội bộ (XAMPP)
$DB = [
    'host' => 'localhost',
    'db'   => 'quanlysan',
    'user' => 'root',
    'pass' => '',
];

