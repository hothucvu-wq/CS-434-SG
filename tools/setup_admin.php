<?php
// =========================================================
// tools/setup_admin.php  —  TẠO TÀI KHOẢN MẪU (admin + user)
// Mở trên trình duyệt: http://localhost/CS-434-SG/tools/setup_admin.php
// Mật khẩu LUÔN được băm bằng password_hash() (đúng chuẩn app).
// Chạy lại nhiều lần vẫn an toàn: nếu email đã có thì băm lại mật khẩu.
// =========================================================
require_once __DIR__ . '/../config/db.php';   // có sẵn $pdo + BASE_URL

// Danh sách tài khoản mẫu — sửa ở đây nếu muốn
$accounts = [
    [
        'ho_ten'        => 'Quản Trị Viên',
        'email'         => 'admin@quanlysan.vn',
        'mat_khau'      => 'admin123',
        'so_dien_thoai' => '0900000001',
        'vai_tro'       => 'admin',
    ],
    [
        'ho_ten'        => 'Nguyễn Văn A',
        'email'         => 'user@quanlysan.vn',
        'mat_khau'      => 'user123',
        'so_dien_thoai' => '0900000002',
        'vai_tro'       => 'user',
    ],
];

$ket_qua = [];

foreach ($accounts as $acc) {
    $hash = password_hash($acc['mat_khau'], PASSWORD_DEFAULT);

    // Đã tồn tại email chưa?
    $st = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $st->execute([$acc['email']]);
    $id = $st->fetchColumn();

    if ($id) {
        // Cập nhật lại mật khẩu (băm) + thông tin
        $up = $pdo->prepare(
            "UPDATE users SET ho_ten=?, mat_khau=?, so_dien_thoai=?, vai_tro=? WHERE email=?"
        );
        $up->execute([$acc['ho_ten'], $hash, $acc['so_dien_thoai'], $acc['vai_tro'], $acc['email']]);
        $ket_qua[] = "🔄 Cập nhật: {$acc['email']} ({$acc['vai_tro']})";
    } else {
        // Tạo mới
        $ins = $pdo->prepare(
            "INSERT INTO users (ho_ten, email, mat_khau, so_dien_thoai, vai_tro)
             VALUES (?, ?, ?, ?, ?)"
        );
        $ins->execute([$acc['ho_ten'], $acc['email'], $hash, $acc['so_dien_thoai'], $acc['vai_tro']]);
        $ket_qua[] = "✅ Tạo mới: {$acc['email']} ({$acc['vai_tro']})";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <title>Setup tài khoản mẫu</title>
  <style>
    body{font-family:system-ui,Arial,sans-serif;max-width:640px;margin:40px auto;padding:0 16px;color:#1e293b}
    .box{background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;padding:24px}
    li{margin:6px 0}
    code{background:#eef2ff;padding:2px 6px;border-radius:4px}
    a{color:#4f46e5}
  </style>
</head>
<body>
  <div class="box">
    <h2>⚙️ Kết quả tạo tài khoản mẫu</h2>
    <ul>
      <?php foreach ($ket_qua as $dong): ?>
        <li><?= htmlspecialchars($dong) ?></li>
      <?php endforeach; ?>
    </ul>

    <h3>Tài khoản đăng nhập</h3>
    <ul>
      <li>Admin: <code>admin@quanlysan.vn</code> / <code>admin123</code></li>
      <li>User&nbsp;: <code>user@quanlysan.vn</code> / <code>user123</code></li>
    </ul>

    <p>👉 <a href="<?= BASE_URL ?>/auth/login.php">Đến trang đăng nhập</a></p>
    <p style="color:#b91c1c">⚠️ Sau khi dùng xong, nên XÓA hoặc đổi tên file này để bảo mật.</p>
  </div>
</body>
</html>
