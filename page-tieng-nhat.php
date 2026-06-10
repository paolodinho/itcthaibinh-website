<?php
/** Tiếng Nhật - layout kiểu Services */
if (!defined('ABSPATH')) exit;
get_header();
$img = get_template_directory_uri() . '/assets/images';

itc_diag_hero('Đào tạo tiếng Nhật', 'act-6.jpg');
?>

<!-- CÁC KHÓA HỌC -->
<section class="section">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Khóa học</span>
      <h2>Khóa tiếng Nhật phù hợp mọi mục tiêu</h2>
      <p class="lead">Lộ trình theo từng cấp độ JLPT, từ bảng chữ cái đến giao tiếp và thi chứng chỉ - mỗi khóa có mục tiêu đầu ra cụ thể.</p>
    </div>
    <div class="svc__grid reveal" data-delay="1">
      <?php
      $svcs = [
        ['lang-japanese.jpg','cap','Sơ cấp N5 – N4','Bảng chữ Hiragana, Katakana, ngữ pháp cơ bản - dành cho người mới hoàn toàn.'],
        ['act-3.jpg','compass','Trung cấp N3','Mở rộng vốn từ, ngữ pháp phức tạp, đọc hiểu - mốc quan trọng để xin việc.'],
        ['gal-7.jpg','medal','Cao cấp N2 – N1','Hướng tới phiên dịch, du học bậc cao, công việc chuyên môn.'],
        ['gal-10.jpg','thumb','Giao tiếp / XKLĐ','Tập trung phản xạ nói, phù hợp người đi xuất khẩu lao động, thực tập sinh.'],
        ['gal-3.jpg','doc','Luyện thi JLPT','Luyện đề sát kỳ thi, chữa đề chi tiết, thi thử bấm giờ.'],
        ['why-photo.jpg','network','Lớp tối &amp; cuối tuần','Dành cho người đi làm, học linh hoạt phục vụ công việc tại công ty Nhật.'],
      ];
      $__c=itc_cards('tn-courses'); if($__c){ $svcs=array_map(function($c){return [$c['img'],$c['icon'],$c['title'],$c['desc']];}, $__c); }
      foreach ($svcs as $s) {
        printf('<article class="svc"><img src="%s" alt="%s" loading="lazy"><div class="svc__overlay"></div><div class="svc__body"><span class="svc__ico">%s</span><h3>%s</h3><p>%s</p></div></article>',
          esc_url(strpos($s[0],'http')===0?$s[0]:$img.'/'.$s[0]), esc_attr(wp_strip_all_tags($s[2])), itc_icon($s[1],22), $s[2], $s[3]);
      }
      ?>
    </div>
  </div>
</section>

<!-- VÌ SAO HỌC TIẾNG NHẬT -->
<section class="section section--alt">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Vì sao học tiếng Nhật</span>
      <h2>Tấm vé du học, việc làm &amp; XKLĐ</h2>
      <p class="lead">Nhu cầu nhân lực biết tiếng Nhật tăng đều mỗi năm, trong khi doanh nghiệp Nhật vẫn mở rộng đầu tư tại Việt Nam.</p>
    </div>
    <div class="icards reveal" data-delay="1" style="grid-template-columns:repeat(3,1fr)">
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('fuji',22); ?></span><div><b>Du học Nhật Bản</b><p>Trường Nhật yêu cầu tối thiểu N5 - tiếng Nhật tốt giúp săn học bổng, đỗ visa.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('plane',22); ?></span><div><b>Xuất khẩu lao động</b><p>Đơn Tokutei &amp; thực tập sinh cần tiếng Nhật; N4+ được chọn đơn lương cao.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('thumb',22); ?></span><div><b>Việc làm lương hấp dẫn</b><p>Công ty Nhật tại Thái Bình, Hưng Yên, Hải Phòng luôn tuyển nhân sự tiếng Nhật.</p></div></div>
    </div>
  </div>
</section>

<!-- PHƯƠNG PHÁP & CAM KẾT -->
<section class="section">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Phương pháp &amp; cam kết</span>
      <h2>Cách ITC giúp bạn tiến bộ nhanh</h2>
    </div>
    <div class="icards reveal" data-delay="1">
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('cap',22); ?></span><div><b>Bảng chữ &amp; phát âm chuẩn</b><p>Học Hiragana, Katakana đúng cách ngay từ đầu, tránh sai khó sửa.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('doc',22); ?></span><div><b>Ngữ pháp theo tình huống</b><p>Mỗi mẫu ngữ pháp gắn ví dụ thực tế, học xong dùng được ngay.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('torii',22); ?></span><div><b>Lồng ghép văn hóa Nhật</b><p>Hiểu văn hóa để dùng kính ngữ, giao tiếp đúng ngữ cảnh khi làm việc.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('shield',22); ?></span><div><b>Cam kết đầu ra</b><p>Gắn kết quả với cấp độ JLPT cụ thể, hỗ trợ học lại nếu chưa đạt.</p></div></div>
    </div>
  </div>
</section>

<!-- ĐỐI TƯỢNG + HỌC PHÍ -->
<section class="section section--alt">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Đối tượng &amp; học phí</span>
      <h2>Ai cũng có lớp phù hợp</h2>
    </div>
    <div class="split2 reveal" data-delay="1">
      <div class="panel">
        <h3><?php echo itc_icon('thumb',20); ?> Đối tượng phù hợp</h3>
        <ul class="ticks">
          <li><?php echo itc_icon('check',18); ?> Người mất gốc, mới bắt đầu từ con số 0</li>
          <li><?php echo itc_icon('check',18); ?> Học sinh – sinh viên tăng cơ hội nghề nghiệp</li>
          <li><?php echo itc_icon('check',18); ?> Người chuẩn bị du học Nhật Bản</li>
          <li><?php echo itc_icon('check',18); ?> Người đi XKLĐ / thực tập sinh</li>
          <li><?php echo itc_icon('check',18); ?> Người đi làm tại công ty Nhật</li>
        </ul>
      </div>
      <div class="panel">
        <h3><?php echo itc_icon('doc',20); ?> Học phí tham khảo</h3>
        <table style="width:100%;border-collapse:collapse;font-size:.95rem">
          <thead><tr><th style="background:var(--blue);color:#fff;text-align:left;padding:11px 13px;border-radius:8px 0 0 0">Khóa / Cấp độ</th><th style="background:var(--blue);color:#fff;text-align:left;padding:11px 13px;border-radius:0 8px 0 0">Học phí tham khảo</th></tr></thead>
          <tbody>
            <tr><td style="padding:10px 13px;border-top:1px solid var(--line)">Sơ cấp N5</td><td style="padding:10px 13px;border-top:1px solid var(--line)">2.000.000 – 3.500.000 đ</td></tr>
            <tr style="background:var(--paper-2)"><td style="padding:10px 13px">N4</td><td style="padding:10px 13px">2.500.000 – 4.000.000 đ</td></tr>
            <tr><td style="padding:10px 13px;border-top:1px solid var(--line)">Trung cấp N3</td><td style="padding:10px 13px;border-top:1px solid var(--line)">3.500.000 – 5.500.000 đ</td></tr>
            <tr style="background:var(--paper-2)"><td style="padding:10px 13px">N2 – N1 / Luyện thi</td><td style="padding:10px 13px">Liên hệ ITC</td></tr>
          </tbody>
        </table>
        <p class="price-note">Học thử miễn phí, tặng giáo trình, ưu đãi combo &amp; nhóm. <a href="#register" style="color:var(--blue)">Liên hệ ITC nhận báo giá mới nhất</a>.</p>
      </div>
    </div>
  </div>
</section>

<?php
itc_faq(itc_faq_items('tieng-nhat', [
  ['Người mất gốc hoàn toàn có học tiếng Nhật tại ITC được không?', 'Hoàn toàn được. ITC có khóa sơ cấp N5 dành riêng cho người chưa biết gì, bắt đầu từ bảng chữ Hiragana, Katakana. Lớp nhỏ và giáo viên kiên nhẫn giúp người mất gốc theo kịp và tiến bộ đều.'],
  ['Học tiếng Nhật từ N5 đến N3 mất bao lâu?', 'Trung bình từ 8 đến 12 tháng nếu học liên tục và chăm chỉ. Khóa N5 mất khoảng 2,5 – 3,5 tháng, N4 tương tự, N3 cần 3 – 4 tháng. Thời gian thực tế phụ thuộc khả năng tiếp thu và tần suất học của mỗi người.'],
  ['Học phí một khóa tiếng Nhật tại ITC khoảng bao nhiêu?', 'Học phí khóa sơ cấp chỉ từ khoảng 2.000.000 đồng, tùy cấp độ và lịch học. Các cấp cao hơn (N3, N2 – N1) học phí cao hơn. Để biết mức chính xác và ưu đãi, vui lòng liên hệ ITC qua 0985 653 868.'],
  ['ITC có dạy tiếng Nhật giao tiếp cho người đi XKLĐ không?', 'Có. ITC có khóa giao tiếp tập trung phản xạ nói, phù hợp người chuẩn bị đi xuất khẩu lao động hoặc thực tập sinh tại Nhật. Nội dung bám sát tình huống thực tế và phỏng vấn đơn hàng.'],
  ['Lớp học tiếng Nhật tại ITC có bao nhiêu học viên?', 'ITC duy trì lớp quy mô nhỏ để giáo viên theo sát từng học viên. Sĩ số nhỏ giúp người học được sửa lỗi phát âm, ngữ pháp trực tiếp - đặc biệt quan trọng với người mới và người mất gốc.'],
  ['ITC có hỗ trợ luyện thi JLPT không?', 'Có. ITC có khóa luyện thi JLPT riêng với hệ thống luyện đề sát kỳ thi, chữa đề chi tiết và thi thử bấm giờ. Khóa này dành cho học viên đã có nền tảng, muốn tối ưu điểm số để đỗ chứng chỉ.'],
  ['Học tiếng Nhật tại ITC có được tư vấn du học luôn không?', 'Có. ITC vừa đào tạo ngôn ngữ vừa tư vấn du học Nhật Bản và Đài Loan. Học viên được hỗ trợ trọn lộ trình từ học tiếng đến làm hồ sơ du học, tiết kiệm thời gian và chi phí.'],
  ['Đăng ký học thử tiếng Nhật tại ITC như thế nào?', 'Bạn chỉ cần gọi hotline 0985 653 868 hoặc để lại thông tin tại trang liên hệ. ITC sẽ kiểm tra trình độ, tư vấn lộ trình phù hợp và sắp xếp buổi học thử miễn phí.'],
]));
itc_related_articles('hoc-tieng-nhat', 'Cẩm nang &amp; luyện thi tiếng Nhật');
itc_register_section('Đăng ký học thử tiếng Nhật miễn phí', 'Để lại thông tin, ITC sẽ kiểm tra trình độ và xếp lớp phù hợp với bạn - hoàn toàn miễn phí.', 'Học tiếng Nhật');
get_footer();
