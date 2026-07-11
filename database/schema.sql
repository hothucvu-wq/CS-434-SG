
-- Người dùng & Quản trị viên
CREATE TABLE users (
  id            INT AUTO_INCREMENT PRIMARY KEY,
  ho_ten        VARCHAR(100) NOT NULL,
  email         VARCHAR(100) NOT NULL UNIQUE,
  mat_khau      VARCHAR(255) NOT NULL,          -- luôn lưu bằng password_hash()
  so_dien_thoai VARCHAR(20),
  vai_tro       ENUM('user','admin') DEFAULT 'user',
  created_at    TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Sân thể thao
CREATE TABLE fields (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  ten_san    VARCHAR(100) NOT NULL,
  loai_san   VARCHAR(50),                       -- Bóng đá / Cầu lông / Tennis ...
  vi_tri     VARCHAR(255),
  gia_thue   DECIMAL(10,2) DEFAULT 0,          -- giá theo giờ (VND)
  mo_ta      TEXT,
  hinh_anh   VARCHAR(255),                      -- tên file trong uploads/
  trang_thai ENUM('hoat_dong','bao_tri') DEFAULT 'hoat_dong',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Lịch đặt sân
CREATE TABLE bookings (
  id           INT AUTO_INCREMENT PRIMARY KEY,
  user_id      INT NOT NULL,
  field_id     INT NOT NULL,
  ngay_dat     DATE NOT NULL,
  gio_bat_dau  TIME NOT NULL,
  gio_ket_thuc TIME NOT NULL,
  trang_thai   ENUM('cho_duyet','da_duyet','da_huy') DEFAULT 'cho_duyet',
  ghi_chu      TEXT,
  created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id)  REFERENCES users(id)  ON DELETE CASCADE,
  FOREIGN KEY (field_id) REFERENCES fields(id) ON DELETE CASCADE
) ENGINE=InnoDB;
