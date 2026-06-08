<?php
/** Du học Nhật Bản - layout kiểu Services */
if (!defined('ABSPATH')) exit;
get_header();
$img = get_template_directory_uri() . '/assets/images';

itc_page_hero('Du học Nhật Bản', 'Môi trường kỷ luật, bằng cấp giá trị toàn cầu, lộ trình vừa học vừa làm rõ ràng - ITC đồng hành trọn lộ trình.', 'study-japan.jpg', true);
?>

<!-- DỊCH VỤ ITC HỖ TRỢ -->
<section class="section">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">ITC đồng hành</span>
      <h2>Tất cả những gì bạn cần để du học Nhật Bản</h2>
      <p class="lead">Từ buổi tư vấn đầu tiên đến khi bạn ổn định tại Nhật, ITC hỗ trợ trọn gói - minh bạch, tận tâm, không phát sinh phí ẩn.</p>
    </div>
    <div class="svc__grid reveal" data-delay="1">
      <?php
      $svcs = [
        ['why-photo.jpg','compass','Tư vấn &amp; chọn trường','Đánh giá học lực, tài chính và mục tiêu để chọn trường tiếng, senmon, đại học phù hợp.'],
        ['lang-japanese.jpg','cap','Đào tạo tiếng Nhật','Luyện tiếng Nhật &amp; JLPT đạt chuẩn đầu vào ngay tại ITC trước khi bay.'],
        ['gal-11.jpg','medal','Săn học bổng','Hỗ trợ ứng tuyển học bổng MEXT, JASSO và học bổng trường, luyện hồ sơ – phỏng vấn.'],
        ['act-5.jpg','doc','Hồ sơ &amp; COE / visa','Hoàn thiện hồ sơ, xin tư cách lưu trú (COE), hướng dẫn phỏng vấn và xử lý visa.'],
        ['gal-2.jpg','plane','Tiễn bay &amp; đón sân bay','Hỗ trợ vé máy bay, ký túc xá, đưa tiễn và đón học viên tại sân bay Nhật Bản.'],
        ['gal-1.jpg','network','Đồng hành tại Nhật','Kết nối cộng đồng người Việt, hỗ trợ xử lý phát sinh trong suốt thời gian học.'],
      ];
      $__c=itc_cards('nb-services'); if($__c){ $svcs=array_map(function($c){return [$c['img'],$c['icon'],$c['title'],$c['desc']];}, $__c); }
      foreach ($svcs as $s) {
        printf('<article class="svc"><img src="%s" alt="%s" loading="lazy"><div class="svc__overlay"></div><div class="svc__body"><span class="svc__ico">%s</span><h3>%s</h3><p>%s</p></div></article>',
          esc_url(strpos($s[0],'http')===0?$s[0]:$img.'/'.$s[0]), esc_attr(wp_strip_all_tags($s[2])), itc_icon($s[1],22), $s[2], $s[3]);
      }
      ?>
    </div>
  </div>
</section>

<!-- VÌ SAO CHỌN NHẬT BẢN -->
<section class="section section--alt">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Vì sao chọn Nhật Bản</span>
      <h2>Điểm đến du học bền vững hàng đầu châu Á</h2>
      <p class="lead">Nhật Bản kết hợp nền giáo dục chất lượng cao, môi trường kỷ luật và chính sách làm thêm hợp pháp rõ ràng.</p>
    </div>
    <div class="icards reveal" data-delay="1" style="grid-template-columns:repeat(3,1fr)">
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('medal',22); ?></span><div><b>Lộ trình rõ ràng</b><p>Từ trường tiếng đến senmon, đại học - từng bước minh bạch, dễ theo.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('network',22); ?></span><div><b>Làm thêm 28 giờ/tuần</b><p>Du học sinh được làm thêm hợp pháp, tích lũy kinh nghiệm và thu nhập.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('cap',22); ?></span><div><b>Bằng cấp toàn cầu</b><p>Giá trị bằng cấp được công nhận rộng rãi, mở ra cơ hội nghề nghiệp.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('plane',22); ?></span><div><b>Cơ hội ở lại làm việc</b><p>Chuyển sang visa lao động sau tốt nghiệp, hướng tới định cư lâu dài.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('shield',22); ?></span><div><b>An toàn, kỷ luật</b><p>Nhật Bản nổi tiếng an ninh tốt, giúp phụ huynh yên tâm khi con đi xa.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('torii',22); ?></span><div><b>Văn hóa &amp; kỹ năng</b><p>Rèn tác phong, tính tự lập và kỹ năng sống quý giá cho tương lai.</p></div></div>
    </div>
  </div>
</section>

<!-- CÁC HỆ -->
<section class="section">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Chương trình</span>
      <h2>Các hệ du học Nhật Bản</h2>
    </div>
    <div class="icards reveal" data-delay="1">
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('doc',22); ?></span><div><b>Trường tiếng (Nhật ngữ)</b><p>Học 1 – 2 năm đạt N3 – N2, bước đệm bắt buộc trước khi học lên cao.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('compass',22); ?></span><div><b>Trường nghề (Senmon)</b><p>Đào tạo nghề 2 – 3 năm, thực hành nhiều, ra trường đi làm ngay.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('cap',22); ?></span><div><b>Đại học &amp; cao đẳng</b><p>Hệ 2 – 4 năm, lấy bằng chính quy, theo đuổi công việc chuyên môn cao.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('medal',22); ?></span><div><b>Sau đại học</b><p>Thạc sĩ, tiến sĩ gắn với nhiều suất học bổng nghiên cứu giá trị.</p></div></div>
    </div>
  </div>
</section>

<!-- NGÀNH -->
<section class="section section--alt">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Ngành học nổi bật</span>
      <h2>Ngành Nhật Bản đang thiếu nhân lực</h2>
      <p class="lead">Chọn ngành Nhật thiếu nhân lực giúp bạn dễ xin việc và gia hạn visa lao động hơn sau tốt nghiệp.</p>
    </div>
    <div class="tags reveal" data-delay="1" style="justify-content:center">
      <span class="tag-pill"><?php echo itc_icon('network',16); ?> Công nghệ thông tin (IT)</span>
      <span class="tag-pill"><?php echo itc_icon('compass',16); ?> Cơ khí, tự động hóa, điện tử</span>
      <span class="tag-pill"><?php echo itc_icon('shield',16); ?> Điều dưỡng, chăm sóc (Kaigo)</span>
      <span class="tag-pill"><?php echo itc_icon('star',16); ?> Nhà hàng, khách sạn</span>
      <span class="tag-pill"><?php echo itc_icon('thumb',16); ?> Chế biến thực phẩm</span>
      <span class="tag-pill"><?php echo itc_icon('doc',16); ?> Kinh tế, quản trị</span>
      <span class="tag-pill"><?php echo itc_icon('torii',16); ?> Ngôn ngữ Nhật, biên – phiên dịch</span>
    </div>
  </div>
</section>

<!-- TRƯỜNG NHẬT BẢN TUYỂN SINH -->
<section class="section">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Trường tuyển sinh</span>
      <h2>Một số trường Nhật Bản tiêu biểu</h2>
      <p class="lead">Trường tiếng, senmon và đại học có chương trình tiếp nhận du học sinh Việt Nam mà ITC hỗ trợ làm hồ sơ. Liên hệ ITC để nhận lộ trình trường phù hợp với bạn.</p>
    </div>
    <div class="icards reveal" data-delay="1" style="grid-template-columns:repeat(3,1fr)">
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('doc',22); ?></span><div><b>Học viện Nhật ngữ ISI</b><p>Tokyo · Nagano · Kyoto · trường tiếng lớn, nhiều cơ sở, hỗ trợ học lên cao.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('doc',22); ?></span><div><b>Trường Nhật ngữ Akamonkai</b><p>Tokyo · lâu đời, tỉ lệ học viên lên đại học &amp; senmon cao.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('doc',22); ?></span><div><b>Học viện Nhật ngữ Kudan</b><p>Tokyo · mạnh luyện thi lên đại học / senmon, lớp quy mô nhỏ.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('cap',22); ?></span><div><b>ĐH Waseda</b><p>Tokyo · đại học danh tiếng, nhiều chương trình quốc tế và học bổng.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('cap',22); ?></span><div><b>ĐH Ritsumeikan</b><p>Kyoto · Osaka · mạnh quốc tế, kinh tế, CNTT, đông du học sinh.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('cap',22); ?></span><div><b>ĐH Teikyo</b><p>Tokyo · đa ngành, tiếp nhận du học sinh, hỗ trợ định hướng nghề.</p></div></div>
    </div>
    <p style="text-align:center;margin-top:22px;color:var(--muted);font-size:.92rem">* Danh sách mang tính tham khảo. ITC hỗ trợ hồ sơ nhiều trường khác - liên hệ để được tư vấn trường phù hợp với bạn.</p>
  </div>
</section>

<!-- ĐIỀU KIỆN -->
<section class="section section--alt">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Điều kiện du học</span>
      <h2>Cần chuẩn bị những gì?</h2>
    </div>
    <div class="split2 reveal" data-delay="1">
      <div class="panel">
        <h3><?php echo itc_icon('check',20); ?> Điều kiện du học 2026</h3>
        <ul class="ticks">
          <li><?php echo itc_icon('check',18); ?> Độ tuổi 18 – dưới 30</li>
          <li><?php echo itc_icon('check',18); ?> Tốt nghiệp THPT, điểm TB từ 5.0 (ưu tiên 6.0+)</li>
          <li><?php echo itc_icon('check',18); ?> Tối thiểu 150 giờ học tiếng hoặc chứng chỉ N5 trở lên</li>
          <li><?php echo itc_icon('check',18); ?> Chứng minh tài chính theo yêu cầu của Cục XNC Nhật</li>
          <li><?php echo itc_icon('check',18); ?> Sức khỏe tốt, không bệnh truyền nhiễm</li>
          <li><?php echo itc_icon('check',18); ?> Không thuộc diện cấm xuất – nhập cảnh</li>
        </ul>
      </div>
      <div class="panel">
        <h3><?php echo itc_icon('doc',20); ?> Hồ sơ cần chuẩn bị</h3>
        <ul class="ticks">
          <li><?php echo itc_icon('check',18); ?> Học bạ &amp; bằng tốt nghiệp (dịch thuật, công chứng)</li>
          <li><?php echo itc_icon('check',18); ?> Chứng chỉ tiếng Nhật (N5 trở lên) hoặc giờ học tiếng</li>
          <li><?php echo itc_icon('check',18); ?> Hộ chiếu, ảnh thẻ &amp; giấy khám sức khỏe</li>
          <li><?php echo itc_icon('check',18); ?> Hồ sơ chứng minh tài chính theo yêu cầu Cục XNC Nhật</li>
        </ul>
        <p class="price-note">ITC hỗ trợ hoàn thiện hồ sơ &amp; xin tư cách lưu trú (COE) - <a href="#register" style="color:var(--blue)">liên hệ để được hướng dẫn chi tiết</a>.</p>
      </div>
    </div>
  </div>
</section>

<!-- HỌC BỔNG -->
<section class="section">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Học bổng</span>
      <h2>Nhiều du học sinh nhận được học bổng</h2>
    </div>
    <div class="icards reveal" data-delay="1" style="grid-template-columns:repeat(3,1fr)">
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('medal',22); ?></span><div><b>Học bổng MEXT (Chính phủ)</b><p>Danh giá nhất, hỗ trợ học phí và trợ cấp sinh hoạt phí hàng tháng.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('cap',22); ?></span><div><b>Học bổng JASSO</b><p>Dành cho du học sinh tự túc kết quả tốt, hỗ trợ sinh hoạt phí hàng tháng.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('shield',22); ?></span><div><b>Học bổng trường &amp; doanh nghiệp</b><p>Miễn giảm học phí cho học viên xuất sắc hoặc chuyên cần.</p></div></div>
    </div>
  </div>
</section>

<!-- LỘ TRÌNH -->
<section class="section process">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Lộ trình</span>
      <h2>5 bước du học Nhật Bản cùng ITC</h2>
    </div>
    <div class="proc__track reveal" data-delay="1" style="grid-template-columns:repeat(5,1fr);gap:26px">
      <article class="proc"><span class="proc__no"><?php echo itc_icon('compass',26); ?><b>1</b></span><h3>Tư vấn định hướng</h3><p>Đánh giá học lực, tài chính, mục tiêu để chọn hệ và trường.</p></article>
      <article class="proc"><span class="proc__no"><?php echo itc_icon('cap',26); ?><b>2</b></span><h3>Học tiếng Nhật</h3><p>Đào tạo tại ITC đến trình độ đáp ứng điều kiện nhập học.</p></article>
      <article class="proc"><span class="proc__no"><?php echo itc_icon('doc',26); ?><b>3</b></span><h3>Hồ sơ &amp; COE</h3><p>Hoàn thiện hồ sơ, nộp xin tư cách lưu trú (COE).</p></article>
      <article class="proc"><span class="proc__no"><?php echo itc_icon('shield',26); ?><b>4</b></span><h3>Xin visa</h3><p>Hướng dẫn phỏng vấn, chuẩn bị giấy tờ xin visa.</p></article>
      <article class="proc"><span class="proc__no"><?php echo itc_icon('plane',26); ?><b>5</b></span><h3>Bay &amp; hỗ trợ</h3><p>Hỗ trợ thủ tục trước bay và kết nối khi sang Nhật.</p></article>
    </div>
  </div>
</section>

<?php
itc_faq(itc_faq_items('du-hoc-nhat-ban', [
  ['Du học Nhật Bản nên chọn trường nào?', 'ITC hỗ trợ apply trường tiếng, senmon và đại học Nhật Bản tiếp nhận du học sinh Việt Nam. Tùy trình độ tiếng, ngành và định hướng, ITC tư vấn lộ trình trường phù hợp - từ trường tiếng uy tín đến đại học danh tiếng.'],
  ['Điều kiện du học Nhật Bản là gì?', 'Cơ bản gồm: độ tuổi 18 – dưới 30, tốt nghiệp THPT với điểm trung bình từ 5.0 (nhiều trường ưu tiên 6.0+), có chứng chỉ hoặc tối thiểu 150 giờ học tiếng Nhật, và chứng minh tài chính theo yêu cầu. ITC sẽ đánh giá hồ sơ miễn phí cho bạn.'],
  ['Du học Nhật Bản có được đi làm thêm không?', 'Có. Du học sinh được làm thêm hợp pháp tối đa 28 giờ/tuần trong kỳ học và nhiều hơn vào kỳ nghỉ, vừa rèn kỹ năng vừa có thêm thu nhập. ITC tư vấn cách cân đối việc làm thêm để không ảnh hưởng tới việc học.'],
  ['Không biết tiếng Nhật có du học được không?', 'Bạn cần học tiếng trước khi đi, tối thiểu khoảng 150 giờ hoặc đạt chứng chỉ N5. ITC đào tạo tiếng Nhật ngay tại Thái Bình, giúp bạn vừa đáp ứng điều kiện vừa tăng tỉ lệ đậu visa.'],
  ['Du học Nhật Bản mất bao lâu?', 'Tùy hệ: trường tiếng 1 – 2 năm, trường nghề Senmon 2 – 3 năm, đại học 4 năm. Phần lớn học viên đi theo lộ trình học tiếng trước rồi học lên hệ chuyên sâu.'],
  ['Sau khi tốt nghiệp có được ở lại Nhật làm việc không?', 'Có. Học viên tốt nghiệp với tiếng Nhật tốt có thể chuyển sang visa lao động (kỹ sư, nhân văn, kỹ năng đặc định) để làm việc lâu dài, mở ra cơ hội định cư.'],
  ['ITC ở Thái Bình hỗ trợ những gì cho du học sinh?', 'ITC hỗ trợ trọn gói: tư vấn định hướng, đào tạo tiếng Nhật, làm hồ sơ, xin tư cách lưu trú và visa, hỗ trợ trước bay. Học viên Thái Bình và lân cận không phải đi nhiều nơi.'],
  ['Nên chọn du học Nhật Bản hay Đài Loan?', 'Tùy mục tiêu. Nhật Bản phù hợp bạn muốn lộ trình dài hạn, thu nhập làm thêm tốt và cơ hội định cư. Đài Loan mạnh về kỹ thuật, công nghệ và môi trường gần gũi. ITC tư vấn cả hai để bạn chọn hướng phù hợp nhất.'],
]));
itc_related_articles('duhoc-nhatban', 'Cẩm nang du học Nhật Bản');
itc_register_section('Bắt đầu hành trình du học Nhật Bản của bạn', 'Để lại thông tin, ITC sẽ gọi lại tư vấn miễn phí trong vòng 24 giờ và xây lộ trình phù hợp với năng lực, tài chính của bạn.', 'Du học Nhật Bản');
get_footer();
