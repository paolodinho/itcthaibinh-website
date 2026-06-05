# ITC Thái Bình — Website (Custom WordPress Theme)

Website cho **ITC Thái Bình** — Tư vấn **Du học Đài Loan & Nhật Bản** và **Đào tạo ngoại ngữ** (tiếng Trung HSK/TOCFL, tiếng Nhật JLPT).

- 🌐 Tên miền: **itcthaibinh.vn**
- ☎️ Hotline: **0985 653 868** · ✉️ info@itcthaibinh.vn
- 📍 3 cơ sở tại Hưng Yên (Thái Bình cũ)

> Đây là **mã nguồn theme WordPress tùy chỉnh** (không dùng page builder). Để xem website chạy thật cần cài WordPress; repo này để khách hàng theo dõi tiến độ & nội dung.

---

## Tính năng chính

- **Trang chủ**: hero, dịch vụ, vì sao chọn ITC, so sánh Đài Loan ↔ Nhật (card lật), quy trình 4 bước, gallery, cảm nghĩ học viên, tin tức, form đăng ký.
- **Trang du học** (Đài Loan / Nhật Bản): điều kiện, chi phí tham khảo, học bổng, lộ trình, FAQ.
- **Đào tạo ngoại ngữ** (tiếng Trung / tiếng Nhật): khóa học, lộ trình, học phí, FAQ.
- **Thư viện ảnh**: gallery phân mục + bộ lọc + xem ảnh dạng flipbook (lật trang).
- **Liên hệ**: 3 cơ sở — mỗi cơ sở 1 bản đồ Google Map + chỉ đường riêng.
- **Tuyển dụng**: danh sách tin + trang chi tiết từng vị trí.
- **Hiệu ứng**: máy bay bay xuyên trang theo scroll (ẩn dụ "cất cánh du học").

## Sửa nội dung không cần code (no-code)

- **Giao diện → Tùy biến (Customizer) → "ITC – Nội dung website"**: hotline, email, địa chỉ, fanpage, hero, số liệu, footer.
- **Menu admin**: Cơ sở (chi nhánh), Thư viện ảnh, Tuyển dụng, Cảm nghĩ học viên, FAQ, Thẻ nội dung — đều thêm/sửa trực tiếp.
- **Menu điều hướng**: Giao diện → Menu.

## Công nghệ

- WordPress custom theme (PHP, không page builder)
- HTML/CSS/JS thuần · Google Fonts (Montserrat + Be Vietnam Pro)
- Màu thương hiệu: Royal Blue `#1C3E95` + Đỏ `#D32F2F`

## Cấu trúc

```
itc/
├── front-page.php          # Trang chủ
├── page-*.php              # Các trang con (du học, ngoại ngữ, liên hệ, gallery, tuyển dụng…)
├── single-itc_job.php      # Chi tiết tin tuyển dụng
├── header.php / footer.php
├── functions.php           # CPT, Customizer, helper, SEO schema
└── assets/
    ├── css/main.css
    ├── js/ (main.js, interactive.js)
    └── images/
```

---

*Thiết kế & phát triển bởi Digito Combat.*
