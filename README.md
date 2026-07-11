# Quản Lý Sân — Nhóm 4 Anh Em Siêu Nhân

Website quản lý đặt sân thể thao (thuần PHP, MySQL/XAMPP). Hệ thống 2 vai trò: **Người dùng** và **Quản trị viên**.

## Cấu trúc thư mục
```
CS-434-SG/
├── index.php              # Trang chủ
├── config/               # config.php (BASE_URL, chọn CSDL) + db.php (kết nối PDO)
├── includes/             # header.php, footer.php, auth_check.php, role_check.php  ← DÙNG CHUNG
├── auth/                 # 👤 A: login, register, logout, forgot_password, profile
├── fields/               # 🏟️ B: list.php (tìm sân), admin.php (CRUD), create/update/delete
├── bookings/             # 📅 C: create (đặt sân), list (lịch), update, delete
├── admin/                # 🛠️ D: customers.php, stats.php
├── assets/  uploads/     # css/js, ảnh sân
├── database/             # schema.sql (cấu trúc), seed.sql (dữ liệu mẫu)
```

## Hướng dẫn cài đặt (cho mỗi thành viên)
1. Cài XAMPP, bật **Apache** + **MySQL**.
2. Copy thư mục dự án vào `C:\xampp\htdocs\CS-434-SG` (tên thư mục = `BASE_URL` trong `config/config.php`).
3. Mở `http://localhost/phpMyAdmin` → tạo CSDL `quanlysan` → chạy **`database/schema.sql`**.
4. Mở `http://localhost/CS-434-SG/tools/setup_admin.php` để tạo tài khoản mẫu.
5. (Tuỳ chọn) Chạy `database/seed.sql` để có sân & lịch mẫu.
6. Vào `http://localhost/CS-434-SG/` → Đăng nhập:
   - Admin: `admin@quanlysan.vn` / `admin123`
   - User : `user@quanlysan.vn`  / `user123`

## Mỗi người 1 CSDL riêng, cấu trúc GIỐNG NHAU
- Ai cũng tạo CSDL `quanlysan` rồi **IMPORT `database/schema.sql`** → bảng giống hệt nhau.
- Muốn test **cùng dữ liệu mẫu**, chạy thêm `database/seed.sql` (sân & lịch mẫu).
- Nhờ vậy code của người này chạy trên máy người kia mà không lệch cấu trúc.
- `config/config.php` để mặc định `$USE_REMOTE = false` (local).

## Quy tắc viết code (tránh xung đột)
- Mỗi người chỉ sửa thư mục module của mình (A→`auth/`, B→`fields/`, C→`bookings/`, D→`admin/` + `config/` + `includes/`).
- Đầu mỗi trang: `session_start(); require_once __DIR__.'/../config/db.php';`
- Trang cần đăng nhập: `require_once __DIR__.'/../includes/auth_check.php';`
- Trang chỉ admin: `require_once __DIR__.'/../includes/role_check.php';`
- Đầu trang gọi: `$tieu_de='Tên'; require_once '.../header.php';` và cuối: `require_once '.../footer.php';`
- Luôn lưu mật khẩu bằng `password_hash()`; kiểm tra bằng `password_verify()`.
