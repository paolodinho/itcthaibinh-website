<?php
/**
 * Template Name: Chính sách bảo mật
 * Trang chính sách bảo mật ITC - hero chéo đỏ + prose 2 cột + sidebar.
 */
if (!defined('ABSPATH')) exit;
get_header();
itc_diag_hero('Chính sách bảo mật', 'cover-about.jpg', 'Chính sách bảo mật thông tin ITC');
$mail = itc_contact('email');
$tel  = itc_contact('hotline');
$addr = itc_contact('address');
?>
<section class="section">
  <div class="wrap">
    <div class="page-layout">
      <div class="prose reveal">
        <p class="lead">Công ty Cổ phần Đầu tư Phát triển Quốc tế ITC (sau đây gọi là "ITC", "chúng tôi") cam kết bảo vệ thông tin cá nhân của Quý khách khi truy cập và sử dụng website itcthaibinh.vn. Chính sách này giải thích cách chúng tôi thu thập, sử dụng, lưu trữ và bảo vệ dữ liệu của bạn.</p>
        <p style="color:var(--muted)"><em>Cập nhật lần cuối: <?php echo date('d/m/Y'); ?></em></p>

        <h2>1. Thông tin chúng tôi thu thập</h2>
        <p>Chúng tôi chỉ thu thập những thông tin cần thiết để phục vụ việc tư vấn du học và đào tạo ngoại ngữ, bao gồm:</p>
        <ul>
          <li><b>Thông tin liên hệ:</b> họ tên, số điện thoại, email, địa chỉ khi bạn đăng ký tư vấn hoặc để lại thông tin trên website.</li>
          <li><b>Thông tin chương trình quan tâm:</b> chương trình du học, khóa học ngoại ngữ bạn lựa chọn.</li>
          <li><b>Thông tin kỹ thuật:</b> địa chỉ IP, loại trình duyệt, thiết bị, dữ liệu truy cập (cookie) nhằm cải thiện trải nghiệm.</li>
        </ul>

        <h2>2. Mục đích sử dụng thông tin</h2>
        <p>Thông tin của bạn được sử dụng cho các mục đích sau:</p>
        <ul>
          <li>Liên hệ tư vấn, giải đáp thắc mắc và xây dựng lộ trình du học, học ngoại ngữ phù hợp.</li>
          <li>Hỗ trợ hồ sơ, thủ tục trong suốt quá trình bạn sử dụng dịch vụ của ITC.</li>
          <li>Gửi thông tin về chương trình, học bổng, sự kiện khi được bạn đồng ý.</li>
          <li>Cải thiện chất lượng dịch vụ và nội dung website.</li>
        </ul>

        <h2>3. Bảo mật và lưu trữ</h2>
        <p>ITC áp dụng các biện pháp kỹ thuật và quản lý phù hợp để bảo vệ dữ liệu cá nhân khỏi việc truy cập, sử dụng hoặc tiết lộ trái phép. Thông tin được lưu trữ trong thời gian cần thiết để hoàn thành mục đích thu thập hoặc theo quy định của pháp luật.</p>

        <h2>4. Chia sẻ thông tin</h2>
        <p>Chúng tôi <b>không mua bán, trao đổi</b> thông tin cá nhân của bạn cho bên thứ ba vì mục đích thương mại. Thông tin chỉ được chia sẻ trong các trường hợp:</p>
        <ul>
          <li>Với đối tác trường học, tổ chức giáo dục để hoàn thiện hồ sơ du học của bạn, khi có sự đồng ý.</li>
          <li>Theo yêu cầu hợp pháp của cơ quan nhà nước có thẩm quyền.</li>
        </ul>

        <h2>5. Cookie</h2>
        <p>Website sử dụng cookie để ghi nhớ tùy chọn và phân tích lưu lượng truy cập. Bạn có thể tắt cookie trong cài đặt trình duyệt, tuy nhiên một số tính năng của website có thể không hoạt động đầy đủ.</p>

        <h2>6. Quyền của bạn</h2>
        <p>Bạn có quyền yêu cầu xem, chỉnh sửa hoặc xóa thông tin cá nhân của mình, cũng như rút lại sự đồng ý nhận thông tin bất kỳ lúc nào bằng cách liên hệ với chúng tôi.</p>

        <h2>7. Liên hệ</h2>
        <p>Mọi thắc mắc liên quan đến chính sách bảo mật, vui lòng liên hệ:</p>
        <ul>
          <li><b>Công ty Cổ phần Đầu tư Phát triển Quốc tế ITC</b></li>
          <li>Điện thoại: <a href="tel:<?php echo esc_attr(itc_contact('hotline_raw')); ?>"><?php echo esc_html($tel); ?></a></li>
          <li>Email: <a href="mailto:<?php echo esc_attr($mail); ?>"><?php echo esc_html($mail); ?></a></li>
          <li>Địa chỉ: <?php echo esc_html($addr); ?></li>
        </ul>
      </div>
      <?php itc_page_sidebar('chinh-sach-bao-mat'); ?>
    </div>
  </div>
</section>
<?php
itc_cta_band();
get_footer();
