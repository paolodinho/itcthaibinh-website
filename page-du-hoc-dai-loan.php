<?php
/** Du học Đài Loan - layout kiểu trang Services (banner giữa + card ảnh + quy trình) */
if (!defined('ABSPATH')) exit;
get_header();
$img = get_template_directory_uri() . '/assets/images';

itc_page_hero('Du học Đài Loan', 'Nền giáo dục chất lượng top châu Á, học bổng tới 100% học phí và cơ hội vừa học vừa làm - ITC đồng hành trọn lộ trình.', 'study-taiwan.jpg', true);
?>

<!-- DỊCH VỤ ITC HỖ TRỢ (card ảnh overlay - như trang Services) -->
<section class="section">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">ITC đồng hành</span>
      <h2>Tất cả những gì bạn cần để du học Đài Loan</h2>
      <p class="lead">Từ buổi tư vấn đầu tiên đến khi bạn ổn định tại Đài Loan, ITC hỗ trợ trọn gói - minh bạch, tận tâm, không phát sinh phí ẩn.</p>
    </div>
    <div class="svc__grid reveal" data-delay="1">
      <?php
      $svcs = [
        ['why-photo.jpg','compass','Tư vấn &amp; định hướng','Đánh giá học lực, tài chính và mục tiêu để chọn trường, ngành và hệ học phù hợp nhất.'],
        ['lang-chinese.jpg','cap','Đào tạo tiếng Trung','Luyện tiếng Hoa &amp; TOCFL đạt chuẩn đầu vào ngay tại trung tâm ITC trước khi bay.'],
        ['gal-11.jpg','medal','Săn học bổng','Hỗ trợ chọn &amp; chuẩn bị hồ sơ học bổng chính phủ MOE và học bổng trường, luyện phỏng vấn.'],
        ['act-5.jpg','doc','Hồ sơ &amp; visa','Hoàn thiện học bạ, dịch thuật, công chứng, apply trường và xử lý thủ tục visa nhanh, chính xác.'],
        ['gal-2.jpg','plane','Tiễn bay &amp; đón sân bay','Hỗ trợ vé máy bay, ký túc xá, đưa tiễn và đón học viên tại sân bay Đài Loan.'],
        ['gal-1.jpg','network','Đồng hành tại Đài Loan','Kết nối cộng đồng du học sinh, hỗ trợ xử lý phát sinh trong suốt thời gian học.'],
      ];
      $__c=itc_cards('dl-services'); if($__c){ $svcs=array_map(function($c){return [$c['img'],$c['icon'],$c['title'],$c['desc']];}, $__c); }
      foreach ($svcs as $s) {
        printf(
          '<article class="svc"><img src="%s" alt="%s" loading="lazy"><div class="svc__overlay"></div><div class="svc__body"><span class="svc__ico">%s</span><h3>%s</h3><p>%s</p></div></article>',
          esc_url(strpos($s[0],'http')===0?$s[0]:$img.'/'.$s[0]), esc_attr(wp_strip_all_tags($s[2])), itc_icon($s[1],22), $s[2], $s[3]
        );
      }
      ?>
    </div>
  </div>
</section>

<!-- VÌ SAO CHỌN ĐÀI LOAN -->
<section class="section section--alt">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Vì sao chọn Đài Loan</span>
      <h2>Điểm đến du học đáng giá hàng đầu châu Á</h2>
      <p class="lead">Đài Loan cân bằng hiếm có giữa chất lượng đào tạo và chi phí, đặc biệt mạnh về kỹ thuật, công nghệ bán dẫn và quản trị kinh doanh.</p>
    </div>
    <div class="icards reveal" data-delay="1" style="grid-template-columns:repeat(3,1fr)">
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('medal',22); ?></span><div><b>Chi phí chỉ bằng 1/2 – 1/3</b><p>So với du học Mỹ, Úc, châu Âu - phù hợp đa số gia đình Việt Nam.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('network',22); ?></span><div><b>Vừa học vừa làm</b><p>Làm thêm hợp pháp 20 giờ/tuần, tự trang trải phần lớn sinh hoạt phí.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('cap',22); ?></span><div><b>Học bổng đa dạng</b><p>Từ học bổng chính phủ MOE đến học bổng riêng của từng trường.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('torii',22); ?></span><div><b>Văn hóa gần gũi</b><p>Người Việt dễ hòa nhập, cộng đồng du học sinh đông đảo, an ninh tốt.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('shield',22); ?></span><div><b>Bằng cấp quốc tế</b><p>Được công nhận rộng rãi, thuận lợi cho định cư và làm việc lâu dài.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('compass',22); ?></span><div><b>Gần Việt Nam</b><p>Đi lại thuận tiện, vé máy bay hợp lý, dễ về thăm gia đình.</p></div></div>
    </div>
  </div>
</section>

<!-- CÁC HỆ -->
<section class="section">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Chương trình</span>
      <h2>Các hệ du học Đài Loan</h2>
    </div>
    <div class="icards reveal" data-delay="1">
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('cap',22); ?></span><div><b>Đại học chính quy</b><p>Học 4 năm bằng tiếng Hoa hoặc tiếng Anh, lấy bằng cử nhân bài bản.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('medal',22); ?></span><div><b>Thạc sĩ – Tiến sĩ</b><p>Nhiều suất học bổng giá trị cao, đặc biệt khối kỹ thuật, công nghệ.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('doc',22); ?></span><div><b>Hệ tiếng Hoa</b><p>Khóa 6 – 12 tháng làm nền tảng trước khi vào đại học hoặc đi làm.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('network',22); ?></span><div><b>Vừa học vừa làm</b><p>Học tại trường kết hợp thực tập có lương, giảm gánh nặng chi phí.</p></div></div>
    </div>
  </div>
</section>

<!-- NGÀNH HỌC -->
<section class="section section--alt">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Ngành học nổi bật</span>
      <h2>Học ngành Đài Loan mạnh nhất</h2>
      <p class="lead">Đài Loan là cái nôi của công nghệ bán dẫn với TSMC, Foxconn, ASUS - cơ hội thực tập và việc làm rộng mở.</p>
    </div>
    <div class="tags reveal" data-delay="1" style="justify-content:center">
      <span class="tag-pill"><?php echo itc_icon('network',16); ?> Công nghệ bán dẫn, vi mạch</span>
      <span class="tag-pill"><?php echo itc_icon('network',16); ?> CNTT, Khoa học máy tính, AI</span>
      <span class="tag-pill"><?php echo itc_icon('compass',16); ?> Cơ khí, tự động hóa, điện</span>
      <span class="tag-pill"><?php echo itc_icon('thumb',16); ?> Quản trị kinh doanh, kinh tế</span>
      <span class="tag-pill"><?php echo itc_icon('plane',16); ?> Logistics, xuất nhập khẩu</span>
      <span class="tag-pill"><?php echo itc_icon('star',16); ?> Du lịch, khách sạn, nhà hàng</span>
      <span class="tag-pill"><?php echo itc_icon('shield',16); ?> Công nghệ sinh học, y dược</span>
      <span class="tag-pill"><?php echo itc_icon('doc',16); ?> Ngôn ngữ &amp; văn hóa Trung Hoa</span>
    </div>
  </div>
</section>

<!-- ĐIỀU KIỆN + CHI PHÍ -->
<section class="section">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Điều kiện &amp; chi phí</span>
      <h2>Cần chuẩn bị những gì?</h2>
    </div>
    <div class="split2 reveal" data-delay="1">
      <div class="panel">
        <h3><?php echo itc_icon('check',20); ?> Điều kiện du học 2026</h3>
        <ul class="ticks">
          <li><?php echo itc_icon('check',18); ?> Độ tuổi 18 – 30 (hệ vừa học vừa làm)</li>
          <li><?php echo itc_icon('check',18); ?> Tốt nghiệp THPT trở lên, GPA từ 6.0/10</li>
          <li><?php echo itc_icon('check',18); ?> Chứng chỉ TOCFL (hệ tiếng Hoa) hoặc IELTS 5.0 / TOEIC 600</li>
          <li><?php echo itc_icon('check',18); ?> Đủ điều kiện sức khỏe, không bệnh truyền nhiễm</li>
          <li><?php echo itc_icon('check',18); ?> Lý lịch trong sạch, không tiền án tiền sự</li>
          <li><?php echo itc_icon('check',18); ?> Chứng minh tài chính theo yêu cầu của trường</li>
        </ul>
      </div>
      <div class="panel">
        <h3><?php echo itc_icon('doc',20); ?> Chi phí tham khảo</h3>
        <ul class="ticks">
          <li><?php echo itc_icon('check',18); ?> Học phí đại học <b>chỉ từ ~50 triệu/năm</b> (tùy trường &amp; ngành)</li>
          <li><?php echo itc_icon('check',18); ?> Hệ tiếng Hoa <b>chỉ từ ~25 triệu/khóa</b></li>
          <li><?php echo itc_icon('check',18); ?> Tổng năm đầu <b>chỉ từ ~150 triệu</b> (gồm học phí &amp; sinh hoạt)</li>
          <li><?php echo itc_icon('check',18); ?> Hệ vừa học vừa làm: thu nhập làm thêm bù phần lớn sinh hoạt phí</li>
        </ul>
        <p class="price-note">Con số mang tính tham khảo - <a href="#register" style="color:var(--blue)">liên hệ ITC để nhận báo giá chính xác</a> theo trường &amp; ngành bạn chọn.</p>
      </div>
    </div>
  </div>
</section>

<!-- HỌC BỔNG -->
<section class="section section--alt">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Học bổng</span>
      <h2>Cơ hội học bổng hào phóng bậc nhất châu Á</h2>
    </div>
    <div class="icards reveal" data-delay="1">
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('medal',22); ?></span><div><b>Học bổng Chính phủ (MOE Taiwan)</b><p>Hỗ trợ học phí và trợ cấp sinh hoạt hàng tháng tùy bậc học.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('cap',22); ?></span><div><b>Học bổng của trường</b><p>Miễn học phí lên tới 100%, ưu tiên sinh viên có thành tích tốt.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('network',22); ?></span><div><b>Học bổng hệ vừa học vừa làm</b><p>Ưu đãi học phí những kỳ đầu, có trường miễn phí ký túc xá.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('shield',22); ?></span><div><b>Học bổng doanh nghiệp</b><p>TSMC và các tập đoàn công nghệ dành cho sinh viên ngành kỹ thuật, bán dẫn.</p></div></div>
    </div>
  </div>
</section>

<!-- CALCULATOR CHI PHÍ -->
<section class="section">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Công cụ tính nhanh</span>
      <h2>Ước tính chi phí du học Đài Loan của bạn</h2>
      <p class="lead">Chọn hệ học, khu vực và học bổng để xem ngân sách dự kiến năm đầu. Con số tham khảo - ITC tính chính xác theo trường bạn chọn.</p>
    </div>
    <div class="calc reveal" data-calc data-delay="1">
      <div class="calc__form">
        <label>Hệ học
          <select name="calc_prog">
            <option value="lang">Hệ tiếng Hoa (語言中心)</option>
            <option value="uni">Hệ Đại học / Cao học</option>
          </select>
        </label>
        <label>Khu vực
          <select name="calc_city">
            <option value="taipei">Đài Bắc (đắt nhất)</option>
            <option value="central">Miền Trung (Đài Trung…)</option>
            <option value="south">Miền Nam (Cao Hùng, Đài Nam)</option>
          </select>
        </label>
        <label>Học bổng
          <select name="calc_sch">
            <option value="none">Chưa có học bổng</option>
            <option value="partial">Học bổng trường (~45%)</option>
            <option value="moe">Học bổng MOE (~70%)</option>
            <option value="icdf">ICDF toàn phần (~95%)</option>
          </select>
        </label>
      </div>
      <div class="calc__out">
        <div class="calc__row"><span>Chi phí gốc / năm</span><b data-calc-gross>-</b></div>
        <div class="calc__row calc__row--net"><span>Bạn cần chuẩn bị / năm</span><b data-calc-net>-</b></div>
        <p class="calc__note" data-calc-note></p>
        <a class="btn btn-red btn-lg" href="#register">Nhận báo giá chi tiết theo trường <?php echo itc_icon('arrow',16); ?></a>
      </div>
    </div>
  </div>
</section>

<!-- TEST TRÌNH ĐỘ TIẾNG TRUNG -->
<section class="section section--alt">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Miễn phí · 1 phút</span>
      <h2>Test nhanh trình độ tiếng Trung của bạn</h2>
      <p class="lead">5 câu hỏi để biết bạn đang ở band nào (HSK) và nên bắt đầu từ lớp nào trước khi du học.</p>
    </div>
    <div class="quiz reveal" data-quiz data-delay="1">
      <div class="quiz__progress"><i data-quiz-bar></i></div>
      <div class="quiz__stage" data-quiz-stage></div>
    </div>
  </div>
</section>

<!-- LỘ TRÌNH - vé lên máy bay (boarding pass) -->
<section class="section process">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Lộ trình</span>
      <h2>6 chặng bay tới giảng đường Đài Loan</h2>
      <p class="lead">Mỗi bước là một tấm vé - ITC đồng hành cùng bạn qua từng chặng, đến tận ngày nhập học.</p>
    </div>
    <div class="boarding reveal" data-delay="1">
      <?php
      $steps = [
        ['compass','Tư vấn & chọn trường','Đánh giá học lực, tài chính, định hướng để chọn trường và hệ phù hợp.'],
        ['cap','Học tiếng & luyện TOCFL','Đào tạo tiếng Trung tại ITC đạt chuẩn đầu vào của trường.'],
        ['doc','Chuẩn bị hồ sơ','Hoàn thiện học bạ, dịch thuật, công chứng, apply trường & học bổng.'],
        ['shield','Xin visa','Hướng dẫn giấy tờ, luyện phỏng vấn, nâng tỉ lệ đậu visa.'],
        ['plane','Trước khi bay','Định hướng văn hóa, hỗ trợ vé máy bay, ký túc xá, đón sân bay.'],
        ['star','Sau khi nhập học','Kết nối cộng đồng du học sinh, hỗ trợ xử lý phát sinh tại Đài Loan.'],
      ];
      foreach ($steps as $i => $s): ?>
      <article class="bpass">
        <div class="bpass__stub"><span class="bpass__no"><?php echo $i + 1; ?></span><span class="bpass__ico"><?php echo itc_icon($s[0],22); ?></span></div>
        <div class="bpass__body">
          <span class="bpass__tag">Chặng <?php echo $i + 1; ?>/6</span>
          <h3><?php echo esc_html($s[1]); ?></h3>
          <p><?php echo esc_html($s[2]); ?></p>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php
itc_faq(itc_faq_items('du-hoc-dai-loan', [
  ['Du học Đài Loan cần bao nhiêu tiền?', 'Tổng chi phí năm đầu chỉ từ khoảng 150 triệu VNĐ, tùy hệ học, trường và ngành. Hệ vừa học vừa làm có chi phí thấp hơn nhờ được hỗ trợ học phí và sinh viên có thể đi làm thêm. Liên hệ ITC để được tính toán ngân sách chi tiết theo trường bạn chọn.'],
  ['Du học Đài Loan có cần biết tiếng Trung không?', 'Tùy chương trình. Hệ tiếng Hoa và đại học dạy bằng tiếng Hoa yêu cầu chứng chỉ TOCFL, trong khi một số chương trình dạy bằng tiếng Anh chấp nhận IELTS 5.0 hoặc TOEIC 600. ITC có khóa đào tạo tiếng Trung giúp học viên đạt chuẩn đầu vào.'],
  ['Du học Đài Loan vừa học vừa làm có kiếm đủ tiền không?', 'Sinh viên được làm thêm hợp pháp, với mức lương theo giờ tại Đài Loan đủ trang trải phần lớn sinh hoạt phí. Tuy nhiên gia đình vẫn nên chuẩn bị đủ chi phí năm đầu, vì thu nhập làm thêm cần thời gian để ổn định.'],
  ['Điều kiện xin học bổng du học Đài Loan là gì?', 'Học bổng xét dựa trên học lực, trình độ ngoại ngữ và ngành học. Học bổng chính phủ MOE và học bổng trường thường yêu cầu GPA tốt và hồ sơ ấn tượng. ITC hỗ trợ học viên chọn loại học bổng phù hợp và chuẩn bị hồ sơ.'],
  ['Học sinh ở Thái Bình muốn du học Đài Loan bắt đầu từ đâu?', 'Học viên tại Thái Bình và khu vực lân cận có thể đến trực tiếp văn phòng ITC để được tư vấn miễn phí, đánh giá học lực và định hướng lộ trình. ITC hỗ trợ trọn gói từ học tiếng, làm hồ sơ đến xin visa và bay.'],
  ['Du học Đài Loan có dễ đậu visa không?', 'Tỉ lệ đậu visa phụ thuộc vào hồ sơ minh bạch, chứng minh tài chính rõ ràng và phần phỏng vấn. Với hồ sơ chuẩn bị kỹ, tỉ lệ đậu rất cao. ITC luyện phỏng vấn và rà soát hồ sơ kỹ lưỡng để hạn chế tối đa rủi ro trượt visa.'],
  ['Sau khi tốt nghiệp ở Đài Loan có được ở lại làm việc không?', 'Có. Sinh viên tốt nghiệp được xin giấy phép ở lại tìm việc và làm việc tại Đài Loan, đặc biệt thuận lợi với các ngành kỹ thuật, công nghệ đang thiếu nhân lực. Đây cũng là con đường hướng tới định cư dài hạn.'],
  ['Nên chọn ngành nào khi du học Đài Loan?', 'Các ngành kỹ thuật, công nghệ bán dẫn, công nghệ thông tin và quản trị kinh doanh được đánh giá cao và có cơ hội việc làm rộng mở tại Đài Loan. ITC sẽ tư vấn ngành phù hợp với từng học viên.'],
]));
itc_related_articles('duhoc-dailoan', 'Cẩm nang du học Đài Loan');
itc_register_section('Bắt đầu hành trình du học Đài Loan của bạn', 'Để lại thông tin, ITC sẽ gọi lại tư vấn miễn phí trong vòng 24 giờ và xây lộ trình phù hợp với năng lực, tài chính của bạn.', 'Du học Đài Loan');
get_footer();
