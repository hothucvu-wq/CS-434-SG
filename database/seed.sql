-- =========================================================
-- Dữ liệu mẫu (chạy SAU schema.sql và tools/setup_admin.php)
-- Tài khoản users được tạo bởi tools/setup_admin.php
--   admin@quanlysan.vn / admin123  (admin)
--   user@quanlysan.vn  / user123   (user, id = 2)
-- =========================================================
USE quanlysan;

INSERT INTO fields (ten_san, loai_san, vi_tri, gia_thue, mo_ta, trang_thai) VALUES
('Sân Cỏ Nhân Tạo A1', 'Bóng đá',  '123 Lê Lợi, Q.1',   200000, 'Sân 7 người, cỏ nhân tạo tiêu chuẩn', 'hoat_dong'),
('Sân Cầu Lông B2',   'Cầu lông', '45 Nguyễn Trãi, Q.5',  80000, '2 sân kín, sàn gỗ, điều hòa',        'hoat_dong'),
('Sân Tennis C3',      'Tennis',    '78 Hai Bà Trưng, Q.3',150000, 'Sân ngoài trời, view đẹp',            'bao_tri');

-- Một lượt đặt mẫu: user id=2 đặt sân id=1
INSERT INTO bookings (user_id, field_id, ngay_dat, gio_bat_dau, gio_ket_thuc, trang_thai, ghi_chu) VALUES
(2, 1, CURDATE(), '18:00:00', '19:00:00', 'da_duyet', 'Đặt qua website');
