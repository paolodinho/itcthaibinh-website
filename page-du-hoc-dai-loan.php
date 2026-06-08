<?php
/** Du học Đài Loan - layout kiểu trang Services (banner giữa + card ảnh + quy trình) */
if (!defined('ABSPATH')) exit;
get_header();
$img = get_template_directory_uri() . '/assets/images';

itc_page_hero('Du học Đài Loan', 'Nền giáo dục chất lượng top châu Á, học bổng giá trị cao và cơ hội vừa học vừa làm - ITC đồng hành trọn lộ trình.', 'study-taiwan.jpg', true);
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
      <p class="lead">Đài Loan có nền giáo dục chất lượng top châu Á, đặc biệt mạnh về kỹ thuật, công nghệ bán dẫn và quản trị kinh doanh.</p>
    </div>
    <div class="icards reveal" data-delay="1" style="grid-template-columns:repeat(3,1fr)">
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('medal',22); ?></span><div><b>Giáo dục chất lượng cao</b><p>Hệ thống đại học top châu Á, chương trình gắn với doanh nghiệp và thực tiễn.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('network',22); ?></span><div><b>Vừa học vừa làm</b><p>Làm thêm hợp pháp 20 giờ/tuần, tích lũy kinh nghiệm và kỹ năng thực tế.</p></div></div>
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
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('network',22); ?></span><div><b>Vừa học vừa làm</b><p>Học tại trường kết hợp thực tập có lương, tích lũy kinh nghiệm thực tế.</p></div></div>
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

<!-- TRƯỜNG ĐÀI LOAN TUYỂN SINH -->
<section class="section">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Trường tuyển sinh</span>
      <h2>Một số trường Đài Loan tiêu biểu</h2>
      <p class="lead">Các trường có chương trình tiếp nhận du học sinh Việt Nam mà ITC hỗ trợ làm hồ sơ. Liên hệ ITC để nhận danh sách trường &amp; ngành phù hợp nhất với bạn.</p>
    </div>
    <div class="icards reveal" data-delay="1" style="grid-template-columns:repeat(3,1fr)">
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('tower',22); ?></span><div><b>ĐH KH Kỹ thuật Quốc lập Đài Loan (NTUST)</b><p>Đài Bắc · nhóm quốc lập top đầu, mạnh kỹ thuật, công nghệ, thiết kế.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('cap',22); ?></span><div><b>ĐH Minh Truyền (Ming Chuan)</b><p>Đài Bắc · Đào Viên · nhiều chương trình quốc tế, truyền thông, quản trị.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('network',22); ?></span><div><b>ĐH KHKT Kiện Hành (Chien Hsin)</b><p>Đào Viên · phổ biến với hệ vừa học vừa làm, đông du học sinh Việt.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('compass',22); ?></span><div><b>ĐH Phùng Giáp (Feng Chia)</b><p>Đài Trung · mạnh kỹ thuật, kiến trúc, kinh doanh, khuôn viên lớn.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('shield',22); ?></span><div><b>ĐH Nghĩa Thủ (I-Shou)</b><p>Cao Hùng · đa ngành, cộng đồng sinh viên quốc tế đông đảo.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('medal',22); ?></span><div><b>ĐH Á Châu (Asia University)</b><p>Đài Trung · mạnh CNTT, thiết kế, y sinh; nhiều học bổng cho sinh viên giỏi.</p></div></div>
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
          <li><?php echo itc_icon('check',18); ?> Độ tuổi 18 – 30 (hệ vừa học vừa làm)</li>
          <li><?php echo itc_icon('check',18); ?> Tốt nghiệp THPT trở lên, GPA từ 6.0/10</li>
          <li><?php echo itc_icon('check',18); ?> Chứng chỉ TOCFL (hệ tiếng Hoa) hoặc IELTS 5.0 / TOEIC 600</li>
          <li><?php echo itc_icon('check',18); ?> Đủ điều kiện sức khỏe, không bệnh truyền nhiễm</li>
          <li><?php echo itc_icon('check',18); ?> Lý lịch trong sạch, không tiền án tiền sự</li>
          <li><?php echo itc_icon('check',18); ?> Chứng minh tài chính theo yêu cầu của trường</li>
        </ul>
      </div>
      <div class="panel">
        <h3><?php echo itc_icon('doc',20); ?> Hồ sơ cần chuẩn bị</h3>
        <ul class="ticks">
          <li><?php echo itc_icon('check',18); ?> Học bạ &amp; bằng tốt nghiệp (dịch thuật, công chứng)</li>
          <li><?php echo itc_icon('check',18); ?> Chứng chỉ ngoại ngữ (TOCFL / IELTS / TOEIC)</li>
          <li><?php echo itc_icon('check',18); ?> Hộ chiếu, ảnh thẻ &amp; giấy khám sức khỏe</li>
          <li><?php echo itc_icon('check',18); ?> Hồ sơ chứng minh tài chính theo yêu cầu của trường</li>
        </ul>
        <p class="price-note">ITC hỗ trợ hoàn thiện toàn bộ hồ sơ &amp; apply trường - <a href="#register" style="color:var(--blue)">liên hệ để được hướng dẫn chi tiết</a>.</p>
      </div>
    </div>
  </div>
</section>

<!-- HỌC BỔNG -->
<section class="section">
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
  ['Du học Đài Loan nên chọn trường nào?', 'ITC hỗ trợ apply nhiều trường Đài Loan tiếp nhận du học sinh Việt Nam - từ nhóm quốc lập mạnh kỹ thuật đến các trường có nhiều học bổng. Tùy học lực, ngành và định hướng, ITC sẽ tư vấn danh sách trường phù hợp nhất với bạn.'],
  ['Du học Đài Loan có cần biết tiếng Trung không?', 'Tùy chương trình. Hệ tiếng Hoa và đại học dạy bằng tiếng Hoa yêu cầu chứng chỉ TOCFL, trong khi một số chương trình dạy bằng tiếng Anh chấp nhận IELTS 5.0 hoặc TOEIC 600. ITC có khóa đào tạo tiếng Trung giúp học viên đạt chuẩn đầu vào.'],
  ['Du học Đài Loan có được đi làm thêm không?', 'Có. Du học sinh được làm thêm hợp pháp theo quy định, vừa tích lũy kinh nghiệm vừa có thêm thu nhập hỗ trợ cuộc sống. ITC tư vấn cách sắp xếp việc làm thêm hợp lý để không ảnh hưởng tới việc học.'],
  ['Điều kiện xin học bổng du học Đài Loan là gì?', 'Học bổng xét dựa trên học lực, trình độ ngoại ngữ và ngành học. Học bổng chính phủ MOE và học bổng trường thường yêu cầu GPA tốt và hồ sơ ấn tượng. ITC hỗ trợ học viên chọn loại học bổng phù hợp và chuẩn bị hồ sơ.'],
  ['Học sinh ở Thái Bình muốn du học Đài Loan bắt đầu từ đâu?', 'Học viên tại Thái Bình và khu vực lân cận có thể đến trực tiếp văn phòng ITC để được tư vấn miễn phí, đánh giá học lực và định hướng lộ trình. ITC hỗ trợ trọn gói từ học tiếng, làm hồ sơ đến xin visa và bay.'],
  ['Du học Đài Loan có dễ đậu visa không?', 'Tỉ lệ đậu visa phụ thuộc vào hồ sơ minh bạch, chứng minh tài chính rõ ràng và phần phỏng vấn. Với hồ sơ chuẩn bị kỹ, tỉ lệ đậu rất cao. ITC luyện phỏng vấn và rà soát hồ sơ kỹ lưỡng để hạn chế tối đa rủi ro trượt visa.'],
  ['Sau khi tốt nghiệp ở Đài Loan có được ở lại làm việc không?', 'Có. Sinh viên tốt nghiệp được xin giấy phép ở lại tìm việc và làm việc tại Đài Loan, đặc biệt thuận lợi với các ngành kỹ thuật, công nghệ đang thiếu nhân lực. Đây cũng là con đường hướng tới định cư dài hạn.'],
  ['Nên chọn ngành nào khi du học Đài Loan?', 'Các ngành kỹ thuật, công nghệ bán dẫn, công nghệ thông tin và quản trị kinh doanh được đánh giá cao và có cơ hội việc làm rộng mở tại Đài Loan. ITC sẽ tư vấn ngành phù hợp với từng học viên.'],
]));
itc_related_articles('duhoc-dailoan', 'Cẩm nang du học Đài Loan');
itc_register_section('Bắt đầu hành trình du học Đài Loan của bạn', 'Để lại thông tin, ITC sẽ gọi lại tư vấn miễn phí trong vòng 24 giờ và xây lộ trình phù hợp với năng lực, tài chính của bạn.', 'Du học Đài Loan');
get_footer();
