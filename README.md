Họ và tên: Ngô Đức Dũng

MSSV: 23810310264



# Laravel Filament Admin Lab - Quản lý Danh mục & Sản phẩm

Dự án thực hành xây dựng hệ thống quản trị nội dung sử dụng **Laravel 11** và **Filament v3.2**. Đáp ứng đầy đủ các yêu cầu bài tập thực hành N2 ngày 06/04/2026.

## Tính năng nổi bật

### 1. Hệ thống Database & Model tùy chỉnh
- Các bảng trong cơ sở dữ liệu (`categories` và `products`) được cấu hình tiền tố là Mã số sinh viên (MSSV: `23810310264`).
- Quan hệ dữ liệu chuẩn xác: Một Category có nhiều Products (One-to-Many).

### 2. Giao diện Filament Admin
- **Màu sắc tùy chỉnh:** Đã thay đổi Primary Color mặc định từ Amber sang **Indigo** tại `AdminPanelProvider`.
- **Category Resource (`/admin/23810310264-categories`):**
  - Tự động generate `slug` khi nhập `name`.
  - Hiển thị danh sách dạng bảng.
  - Bộ lọc (Filter) theo trạng thái hiển thị (`is_visible`).
- **Product Resource (`/admin/23810310264-products`):**
  - Form thêm mới/cập nhật sử dụng **Grid Layout** (2 cột).
  - Sử dụng **Rich Editor** cho trường mô tả (description).
  - Hỗ trợ upload ảnh đại diện (Image upload).
  - Tự động generate `slug` khi nhập `name`.
  - Form validation: Giá tiền (`price`) không được âm, Số lượng kho (`stock_quantity`) là số nguyên lớn hơn hoặc bằng 0.
  - Hiển thị bảng danh sách sản phẩm với định dạng tiền tệ **VNĐ**.
  - Tính năng tìm kiếm theo tên và lọc sản phẩm theo danh mục.
  - **Trường dữ liệu sáng tạo:** `discount_percent` (Phần trăm giảm giá) với logic validation từ 0 đến 100%, hiển thị badge màu sắc động trên bảng danh sách.

---

## Yêu cầu hệ thống
- PHP ^8.2
- Composer
- MySQL / MariaDB
- Node.js & NPM (tùy chọn cho build frontend)

---

## Hướng dẫn cài đặt

**Bước 1: Clone dự án về máy**
```bash
    git clone https://github.com/endydunxg/filament-admin-lab.git
    cd filament-admin-lab
```
**Bước 2: Cài đặt thư viện**
```bash
    composer install
```
**Bước 3: Cấu hình môi trường**
Copy file .env.example thành .env và thiết lập kết nối cơ sở dữ liệu.
```bash
    cp .env.example .env
    php artisan key:generate
```
Cập nhật file .env với thông tin Database của bạn:
```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=filament_lab
    DB_USERNAME=root
    DB_PASSWORD=
```
**Bước 4: Chạy Migration**
```bash
    php artisan migrate
```
**Bước 5: Tạo tài khoản Admin**
Tạo tài khoản để đăng nhập vào trang quản trị:
```bash
    php artisan make:filament-user
```
**Bước 6: Khởi chạy Server**
```bash
    php artisan serve
```
Truy cập vào trang quản trị tại: http://127.0.0.1:8000/admin
