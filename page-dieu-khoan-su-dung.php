<?php
/**
 * Template Name: Điều khoản sử dụng
 * Trang điều khoản sử dụng ITC - hero chéo đỏ + prose 2 cột + sidebar.
 */
if (!defined('ABSPATH')) exit;
get_header();
itc_diag_hero('Điều khoản sử dụng', 'gal-5.jpg', 'Điều khoản sử dụng website ITC');
$mail = itc_contact('email');
$tel  = itc_contact('hotline');
?>
<section class="section">
  <div class="wrap">
    <div class="page-layout">
      <div class="prose reveal">
        <p class="lead">Khi truy cập và sử dụng website itcthaibinh.vn của Công ty Cổ phần Đầu tư Phát triển Quốc tế ITC, bạn đồng ý tuân thủ các điều khoản dưới đây. Vui lòng đọc kỹ trước khi sử dụng.</p>
        <p style="color:var(--muted)"><em>Cập nhật lần cuối: <?php echo date('d/m/Y'); ?></em></p>

        <h2>1. Chấp nhận điều khoản</h2>
        <p>Việc bạn tiếp tục truy cập, duyệt nội dung hoặc để lại thông tin trên website đồng nghĩa với việc bạn đã đọc, hiểu và đồng ý với toàn bộ điều khoản sử dụng này. Nếu không đồng ý, vui lòng ngừng sử dụng website.</p>

        <h2>2. Quyền sở hữu nội dung</h2>
        <p>Toàn bộ nội dung trên website (bài viết, hình ảnh, logo, video, thiết kế giao diện) thuộc quyền sở hữu của ITC hoặc được sử dụng hợp pháp. Bạn <b>không được</b> sao chép, phân phối, chỉnh sửa hay sử dụng cho mục đích thương mại khi chưa có sự đồng ý bằng văn bản của ITC.</p>

        <h2>3. Sử dụng hợp lệ</h2>
        <p>Khi sử dụng website, bạn cam kết:</p>
        <ul>
          <li>Cung cấp thông tin chính xác, trung thực khi đăng ký tư vấn.</li>
          <li>Không thực hiện hành vi gây ảnh hưởng đến hoạt động, an ninh của website.</li>
          <li>Không phát tán nội dung vi phạm pháp luật, xâm phạm quyền lợi của bên thứ ba.</li>
        </ul>

        <h2>4. Thông tin tư vấn</h2>
        <p>Nội dung trên website mang tính tham khảo và có thể thay đổi theo chính sách của các trường, tổ chức giáo dục đối tác. Thông tin tư vấn chính thức về chương trình, học phí và lộ trình sẽ được ITC xác nhận trực tiếp với từng học viên.</p>

        <h2>5. Liên kết bên ngoài</h2>
        <p>Website có thể chứa liên kết tới trang web của bên thứ ba. ITC không chịu trách nhiệm về nội dung, chính sách bảo mật hoặc hoạt động của các trang web đó.</p>

        <h2>6. Giới hạn trách nhiệm</h2>
        <p>ITC nỗ lực bảo đảm thông tin chính xác và website hoạt động ổn định, tuy nhiên không bảo đảm website luôn không có gián đoạn hoặc sai sót. ITC không chịu trách nhiệm cho các thiệt hại phát sinh từ việc sử dụng website ngoài phạm vi dịch vụ đã cam kết.</p>

        <h2>7. Thay đổi điều khoản</h2>
        <p>ITC có quyền cập nhật, chỉnh sửa điều khoản sử dụng bất kỳ lúc nào. Phiên bản mới sẽ có hiệu lực ngay khi đăng tải trên website. Bạn nên kiểm tra định kỳ để nắm thông tin mới nhất.</p>

        <h2>8. Liên hệ</h2>
        <p>Mọi câu hỏi về điều khoản sử dụng, vui lòng liên hệ qua điện thoại <a href="tel:<?php echo esc_attr(itc_contact('hotline_raw')); ?>"><?php echo esc_html($tel); ?></a> hoặc email <a href="mailto:<?php echo esc_attr($mail); ?>"><?php echo esc_html($mail); ?></a>.</p>
      </div>
      <?php itc_page_sidebar('dieu-khoan-su-dung'); ?>
    </div>
  </div>
</section>
<?php
itc_cta_band();
get_footer();
