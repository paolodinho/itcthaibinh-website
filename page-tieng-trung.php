<?php
/** Tiếng Trung - layout kiểu Services */
if (!defined('ABSPATH')) exit;
get_header();
$img = get_template_directory_uri() . '/assets/images';

itc_page_hero('Đào tạo tiếng Trung', 'Từ mất gốc đến giao tiếp tự tin và luyện thi HSK · TOCFL - lớp nhỏ, giáo viên kinh nghiệm, cam kết đầu ra.', 'lang-chinese.jpg', true);
?>

<!-- CÁC KHÓA HỌC (card ảnh) -->
<section class="section">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Khóa học</span>
      <h2>Khóa tiếng Trung phù hợp mọi mục tiêu</h2>
      <p class="lead">ITC thiết kế khóa học theo từng mục tiêu - bạn chỉ học đúng phần mình cần, tiết kiệm thời gian và chi phí.</p>
    </div>
    <div class="svc__grid reveal" data-delay="1">
      <?php
      $svcs = [
        ['lang-chinese.jpg','cap','Tiếng Trung mất gốc','Bắt đầu từ pinyin, thanh điệu và nét chữ Hán - dành cho người chưa từng học.'],
        ['act-3.jpg','compass','Lộ trình HSK 1 – 6','Học bài bản theo giáo trình New HSK, lên cấp độ theo năng lực thực tế.'],
        ['gal-7.jpg','doc','Luyện thi HSK · TOCFL','Tập trung cấu trúc đề, kỹ năng làm bài và quản lý thời gian thi.'],
        ['gal-10.jpg','thumb','Tiếng Trung giao tiếp','Ưu tiên nghe – nói theo chủ đề công việc, du lịch, đời sống.'],
        ['gal-11.jpg','tower','Tiếng Trung du học Đài Loan','Đạt HSK 4 / TOCFL phục vụ xét tuyển và săn học bổng du học.'],
        ['why-photo.jpg','network','Lớp tối &amp; cuối tuần','Dành riêng cho người đi làm bận rộn, tập trung giao tiếp ứng dụng.'],
      ];
      $__c=itc_cards('tt-courses'); if($__c){ $svcs=array_map(function($c){return [$c['img'],$c['icon'],$c['title'],$c['desc']];}, $__c); }
      foreach ($svcs as $s) {
        printf('<article class="svc"><img src="%s" alt="%s" loading="lazy"><div class="svc__overlay"></div><div class="svc__body"><span class="svc__ico">%s</span><h3>%s</h3><p>%s</p></div></article>',
          esc_url(strpos($s[0],'http')===0?$s[0]:$img.'/'.$s[0]), esc_attr(wp_strip_all_tags($s[2])), itc_icon($s[1],22), $s[2], $s[3]);
      }
      ?>
    </div>
  </div>
</section>

<!-- VÌ SAO HỌC TIẾNG TRUNG -->
<section class="section section--alt">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Vì sao học tiếng Trung</span>
      <h2>Cơ hội du học &amp; việc làm rộng mở</h2>
      <p class="lead">Hàng nghìn doanh nghiệp Trung Quốc, Đài Loan đầu tư vào Việt Nam - nhu cầu nhân sự biết tiếng Trung tăng đều mỗi năm.</p>
    </div>
    <div class="icards reveal" data-delay="1" style="grid-template-columns:repeat(3,1fr)">
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('tower',22); ?></span><div><b>Du học Đài Loan</b><p>HSK / TOCFL là điều kiện đầu vào và chìa khóa săn học bổng giá trị.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('thumb',22); ?></span><div><b>Lương cao hơn đáng kể</b><p>So với vị trí tương đương không có ngoại ngữ tại doanh nghiệp FDI.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('network',22); ?></span><div><b>Cơ hội nghề nghiệp</b><p>Phiên dịch, xuất nhập khẩu, thương mại điện tử, khu công nghiệp.</p></div></div>
    </div>
  </div>
</section>

<!-- PHƯƠNG PHÁP & CAM KẾT -->
<section class="section">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Phương pháp &amp; cam kết</span>
      <h2>Vì sao học viên ITC tiến bộ nhanh</h2>
    </div>
    <div class="icards reveal" data-delay="1">
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('thumb',22); ?></span><div><b>Học 4 kỹ năng từ buổi đầu</b><p>Nghe – nói – đọc – viết song song, không bị "câm điếc tiếng Trung".</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('star',22); ?></span><div><b>Lớp quy mô nhỏ</b><p>Giáo viên sửa phát âm, thanh điệu trực tiếp cho từng học viên.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('shield',22); ?></span><div><b>Cam kết đầu ra</b><p>Mục tiêu rõ ràng theo cấp độ, hỗ trợ học lại phần chưa đạt theo chính sách.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('compass',22); ?></span><div><b>Kiểm tra tiến độ định kỳ</b><p>Biết mình đang ở đâu trên lộ trình để điều chỉnh kịp thời.</p></div></div>
    </div>
  </div>
</section>

<!-- LỘ TRÌNH 4 GIAI ĐOẠN + HỌC PHÍ -->
<section class="section section--alt">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Lộ trình &amp; học phí</span>
      <h2>Từ mất gốc đến HSK 6</h2>
    </div>
    <div class="split2 reveal" data-delay="1">
      <div class="panel">
        <h3><?php echo itc_icon('compass',20); ?> 4 giai đoạn rõ ràng</h3>
        <ul class="ticks">
          <li><?php echo itc_icon('check',18); ?> <strong>Làm quen</strong> (0 → HSK 1): 1 – 2 tháng</li>
          <li><?php echo itc_icon('check',18); ?> <strong>Sơ cấp</strong> (HSK 1 → 3): 3 – 4 tháng</li>
          <li><?php echo itc_icon('check',18); ?> <strong>Trung cấp</strong> (HSK 3 → 4): 3 – 5 tháng</li>
          <li><?php echo itc_icon('check',18); ?> <strong>Cao cấp</strong> (HSK 4 → 6): 6 – 9 tháng</li>
        </ul>
        <p class="price-note">Người đi làm 2 buổi/tuần đạt giao tiếp cơ bản trong 4 – 6 tháng.</p>
      </div>
      <div class="panel">
        <h3><?php echo itc_icon('doc',20); ?> Học phí tham khảo</h3>
        <table style="width:100%;border-collapse:collapse;font-size:.95rem">
          <thead><tr><th style="background:var(--blue);color:#fff;text-align:left;padding:11px 13px;border-radius:8px 0 0 0">Khóa học</th><th style="background:var(--blue);color:#fff;text-align:left;padding:11px 13px;border-radius:0 8px 0 0">Thời lượng</th></tr></thead>
          <tbody>
            <tr><td style="padding:10px 13px;border-top:1px solid var(--line)">Mất gốc (0 → HSK 1–2)</td><td style="padding:10px 13px;border-top:1px solid var(--line)">2 – 3 tháng</td></tr>
            <tr style="background:var(--paper-2)"><td style="padding:10px 13px">Lộ trình HSK 3 – 4</td><td style="padding:10px 13px">3 – 5 tháng</td></tr>
            <tr><td style="padding:10px 13px;border-top:1px solid var(--line)">Luyện thi HSK / TOCFL</td><td style="padding:10px 13px;border-top:1px solid var(--line)">6 – 16 buổi</td></tr>
            <tr style="background:var(--paper-2)"><td style="padding:10px 13px">Giao tiếp theo chủ đề</td><td style="padding:10px 13px">2 – 3 tháng</td></tr>
          </tbody>
        </table>
        <p class="price-note">Ưu đãi đăng ký sớm, đăng ký nhóm &amp; trọn lộ trình. <a href="#register" style="color:var(--blue)">Liên hệ ITC nhận báo giá</a> &amp; kiểm tra trình độ miễn phí.</p>
      </div>
    </div>
  </div>
</section>

<?php
itc_faq(itc_faq_items('tieng-trung', [
  ['Học tiếng Trung từ mất gốc mất bao lâu để thi HSK?', 'Từ mất gốc đến HSK 4 thường mất 8 – 12 tháng nếu học đều 2 – 3 buổi mỗi tuần. Riêng HSK 1 – 3 có thể đạt trong khoảng 4 – 5 tháng. Thời gian thực tế phụ thuộc cường độ học và khả năng tiếp thu của từng người.'],
  ['Học phí khóa tiếng Trung tại ITC khoảng bao nhiêu?', 'Học phí tính theo cấp độ và thời lượng khóa, dao động theo mặt bằng trung tâm tại Thái Bình. Để có mức chính xác cùng ưu đãi đang áp dụng, bạn gọi 0985 653 868 hoặc đến ITC làm bài kiểm tra trình độ miễn phí.'],
  ['Nên thi HSK hay TOCFL khi du học Đài Loan?', 'Phần lớn trường Đài Loan chấp nhận cả hai, nhưng TOCFL là chứng chỉ bản địa của Đài Loan nên được ưu tiên trong nhiều chương trình học bổng. ITC tư vấn chọn chứng chỉ phù hợp dựa trên trường và ngành bạn nhắm tới.'],
  ['Người đi làm bận rộn có học được không?', 'Hoàn toàn được. ITC có lớp buổi tối và cuối tuần dành riêng cho người đi làm, tập trung tiếng Trung giao tiếp theo chủ đề công việc. Với lịch học 2 buổi mỗi tuần, bạn vẫn đạt giao tiếp cơ bản trong 4 – 6 tháng.'],
  ['Lớp học có sĩ số bao nhiêu người?', 'ITC duy trì lớp quy mô nhỏ để giáo viên kèm sát từng học viên, đặc biệt ở khâu sửa phát âm và thanh điệu. Sĩ số ít giúp bạn được nói nhiều hơn và sửa lỗi ngay - điều lớp đông không làm được.'],
  ['Học viên mất gốc nên bắt đầu từ đâu?', 'Bắt đầu từ hệ thống pinyin và thanh điệu, sau đó học nét chữ Hán cơ bản. ITC xếp người mất gốc vào lớp riêng để xây nền phát âm chuẩn ngay từ đầu, tránh sai từ gốc khó sửa về sau.'],
  ['ITC có hỗ trợ học lại nếu chưa đạt mục tiêu không?', 'Có. ITC áp dụng chính sách hỗ trợ học lại phần chưa đạt theo từng khóa và cấp độ. Chi tiết điều kiện học lại được tư vấn rõ khi bạn đăng ký, gắn với cam kết đầu ra của khóa.'],
  ['Học tiếng Trung tại ITC có thể chuyển sang học tiếng Nhật không?', 'Được. ITC đào tạo cả tiếng Trung và tiếng Nhật, nhiều học viên học song song hoặc chuyển hướng theo định hướng du học. Bạn có thể trao đổi với tư vấn viên để chọn ngôn ngữ và lộ trình phù hợp mục tiêu của mình.'],
]));
itc_register_section('Đăng ký học thử tiếng Trung miễn phí', 'Để lại thông tin, ITC sẽ kiểm tra trình độ và xếp lớp phù hợp với bạn - hoàn toàn miễn phí.', 'Học tiếng Trung');
get_footer();
