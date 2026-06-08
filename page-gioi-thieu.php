<?php
/** Giới thiệu - layout kiểu Services, nội dung đầy đủ */
if (!defined('ABSPATH')) exit;
get_header();
$img = get_template_directory_uri() . '/assets/images';

itc_page_hero('Giới thiệu ITC Thái Bình', 'Cầu nối vững chắc giữa thế hệ trẻ Việt Nam và nền giáo dục Đài Loan – Nhật Bản.', 'hero-wide.jpg', true);
?>

<!-- ABOUT SPLIT -->
<section class="section">
  <div class="wrap about__grid" style="display:grid;grid-template-columns:5fr 6fr;gap:clamp(36px,5vw,72px);align-items:center">
    <div class="about__media reveal">
      <img src="<?php echo esc_url($img.'/about-team.jpg'); ?>" alt="Đội ngũ ITC Thái Bình" width="540" height="720" loading="lazy" style="border-radius:14px;width:100%">
    </div>
    <div class="reveal" data-delay="1">
      <span class="kicker">Về ITC Group</span>
      <h2>Công ty Cổ phần Đầu tư<br>Phát triển Quốc tế ITC</h2>
      <p class="lead" style="margin-top:16px">ITC là đơn vị tư vấn du học và đào tạo ngoại ngữ uy tín tại Thái Bình, hợp tác cùng hệ thống trường đối tác tại Đài Loan và Nhật Bản. Với hơn 15 năm, ITC đồng hành cùng hơn 2.000 học viên trên hành trình chạm tới giảng đường quốc tế - bằng lộ trình minh bạch, đội ngũ tận tâm và sự cam kết tới tận ngày nhập học.</p>
      <ul class="flist" style="margin-top:24px">
        <li><span class="fico"><?php echo itc_icon('cap',22); ?></span><div><b>Tư vấn chuyên môn cao</b><p>Đội ngũ am hiểu thực tế du học, đồng hành ở từng bước hành trình.</p></div></li>
        <li><span class="fico"><?php echo itc_icon('shield',22); ?></span><div><b>Minh bạch &amp; trách nhiệm</b><p>Chi phí rõ ràng từ đầu, ký hợp đồng trách nhiệm với mỗi học viên.</p></div></li>
        <li><span class="fico"><?php echo itc_icon('network',22); ?></span><div><b>Mạng lưới đối tác rộng</b><p>Hơn 100 trường tại Đài Loan &amp; Nhật Bản với nhiều suất học bổng.</p></div></li>
      </ul>
    </div>
  </div>
</section>

<!-- STATS -->
<section class="section section--alt" style="padding-top:0">
  <div class="wrap" style="padding-top:clamp(56px,7vw,90px)">
    <div class="figrow reveal">
      <?php for ($n=1; $n<=4; $n++):
        $defs = [1=>['15','+','Năm kinh nghiệm'],2=>['2000','+','Học viên du học'],3=>['98','%','Tỉ lệ đậu visa'],4=>['100','+','Trường đối tác']];
        $d = $defs[$n]; $num = itc_mod("itc_stat{$n}_num",$d[0]); $suf = itc_mod("itc_stat{$n}_suf",$d[1]); $lab = itc_mod("itc_stat{$n}_label",$d[2]); ?>
      <div class="fig"><b><span data-count="<?php echo esc_attr($num); ?>">0</span><i><?php echo esc_html($suf); ?></i></b><span><?php echo esc_html($lab); ?></span></div>
      <?php endfor; ?>
    </div>
  </div>
</section>

<!-- SỨ MỆNH - TẦM NHÌN - GIÁ TRỊ -->
<section class="section">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Kim chỉ nam</span>
      <h2>Sứ mệnh – Tầm nhìn – Giá trị</h2>
    </div>
    <div class="icards reveal" data-delay="1" style="grid-template-columns:repeat(3,1fr)">
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('compass',22); ?></span><div><b>Sứ mệnh</b><p>Mở ra cánh cửa giáo dục quốc tế cho thế hệ trẻ Việt Nam bằng con đường minh bạch, an toàn và hiệu quả.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('star',22); ?></span><div><b>Tầm nhìn</b><p>Trở thành trung tâm tư vấn du học &amp; đào tạo ngoại ngữ uy tín hàng đầu khu vực đồng bằng Bắc Bộ.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('shield',22); ?></span><div><b>Giá trị cốt lõi</b><p>Tận tâm – Uy tín – Đồng hành: đặt lợi ích và tương lai của học viên lên hàng đầu trong mọi quyết định.</p></div></div>
    </div>
  </div>
</section>

<!-- VÌ SAO CHỌN ITC -->
<section class="section section--alt">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Vì sao chọn ITC</span>
      <h2>Điều làm nên sự khác biệt</h2>
    </div>
    <div class="icards reveal" data-delay="1" style="grid-template-columns:repeat(3,1fr)">
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('cap',22); ?></span><div><b>Lộ trình cá nhân hóa</b><p>Tư vấn theo học lực, tài chính, mục tiêu thật - không gói cứng.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('doc',22); ?></span><div><b>Minh bạch chi phí</b><p>Cam kết rõ từng khoản, không phát sinh phí ẩn, ký hợp đồng trách nhiệm.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('plane',22); ?></span><div><b>Đồng hành tới khi nhập học</b><p>Hỗ trợ hồ sơ, visa, đón sân bay và ổn định cuộc sống nơi xứ người.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('network',22); ?></span><div><b>Hệ sinh thái khép kín</b><p>Học ngoại ngữ và du học trong cùng một nơi, liền mạch, tiết kiệm.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('medal',22); ?></span><div><b>Kinh nghiệm 15+ năm</b><p>Hơn 2.000 học viên, tỉ lệ đậu visa cao, 100+ trường đối tác.</p></div></div>
      <div class="icard"><span class="icard__ico"><?php echo itc_icon('thumb',22); ?></span><div><b>Ngay tại Thái Bình</b><p>Học viên địa phương tiết kiệm thời gian, chi phí đi lại.</p></div></div>
    </div>
  </div>
</section>

<!-- LĨNH VỰC HOẠT ĐỘNG -->
<section class="section">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Lĩnh vực hoạt động</span>
      <h2>ITC đồng hành cùng bạn ở mọi chặng đường</h2>
      <p class="lead">Từ học ngoại ngữ tại quê nhà đến khi đặt chân tới giảng đường quốc tế - tất cả trong một hệ sinh thái.</p>
    </div>
    <div class="svc__grid reveal" data-delay="1" style="grid-template-columns:repeat(4,1fr)">
      <a class="svc" href="<?php echo esc_url(home_url('/du-hoc-dai-loan/')); ?>"><img src="<?php echo esc_url($img.'/study-taiwan.jpg'); ?>" alt="Du học Đài Loan" loading="lazy"><div class="svc__overlay"></div><div class="svc__body"><span class="svc__ico"><?php echo itc_icon('tower',22); ?></span><h3>Du học Đài Loan</h3><p>Tư vấn chọn trường, học bổng, hệ vừa học vừa làm.</p></div></a>
      <a class="svc" href="<?php echo esc_url(home_url('/du-hoc-nhat-ban/')); ?>"><img src="<?php echo esc_url($img.'/study-japan.jpg'); ?>" alt="Du học Nhật Bản" loading="lazy"><div class="svc__overlay"></div><div class="svc__body"><span class="svc__ico"><?php echo itc_icon('fuji',22); ?></span><h3>Du học Nhật Bản</h3><p>Trường tiếng, senmon, đại học - lộ trình rõ ràng.</p></div></a>
      <a class="svc" href="<?php echo esc_url(home_url('/tieng-trung/')); ?>"><img src="<?php echo esc_url($img.'/lang-chinese.jpg'); ?>" alt="Tiếng Trung" loading="lazy"><div class="svc__overlay"></div><div class="svc__body"><span class="svc__ico"><?php echo itc_icon('cap',22); ?></span><h3>Đào tạo tiếng Trung</h3><p>Lộ trình HSK · TOCFL, cam kết đầu ra.</p></div></a>
      <a class="svc" href="<?php echo esc_url(home_url('/tieng-nhat/')); ?>"><img src="<?php echo esc_url($img.'/lang-japanese.jpg'); ?>" alt="Tiếng Nhật" loading="lazy"><div class="svc__overlay"></div><div class="svc__body"><span class="svc__ico"><?php echo itc_icon('torii',22); ?></span><h3>Đào tạo tiếng Nhật</h3><p>Lộ trình JLPT N5 – N1, luyện thi chứng chỉ.</p></div></a>
    </div>
  </div>
</section>

<!-- ĐỘI NGŨ ITC -->
<section class="section section--alt">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Đội ngũ</span>
      <h2>Con người làm nên ITC</h2>
      <p class="lead">Đội ngũ tư vấn am hiểu thực tế du học cùng giáo viên giàu kinh nghiệm - đồng hành cùng bạn từ buổi tư vấn đầu tiên đến khi đặt chân tới giảng đường.</p>
    </div>
    <?php $members = itc_members(); if ($members): ?>
    <div class="team reveal" data-delay="1">
      <?php foreach ($members as $m): ?>
      <article class="member">
        <div class="member__photo"><img src="<?php echo esc_url($m['photo']); ?>" alt="<?php echo esc_attr($m['name']); ?>" loading="lazy"></div>
        <h3><?php echo esc_html($m['name']); ?></h3>
        <?php if (!empty($m['role'])): ?><span class="member__role"><?php echo esc_html($m['role']); ?></span><?php endif; ?>
      </article>
      <?php endforeach; ?>
    </div>
    <?php else:
      $img = get_template_directory_uri() . '/assets/images';
      $tm = [['about-team.jpg','Đội ngũ tư vấn ITC'],['lang-chinese.jpg','Giáo viên tiếng Trung'],['lang-japanese.jpg','Giáo viên tiếng Nhật'],['gal-8.jpg','Tư vấn viên &amp; học viên']]; ?>
    <div class="team-strip reveal" data-delay="1">
      <?php foreach ($tm as $t): ?>
      <figure class="team-strip__item"><img src="<?php echo esc_url($img.'/'.$t[0]); ?>" alt="<?php echo esc_attr(wp_strip_all_tags($t[1])); ?>" loading="lazy"><figcaption><?php echo $t[1]; ?></figcaption></figure>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>

<?php
itc_faq([
  ['ITC Thái Bình là đơn vị nào?', 'ITC là Công ty Cổ phần Đầu tư Phát triển Quốc tế ITC, đơn vị tư vấn du học và đào tạo ngoại ngữ uy tín tại Thái Bình, với hơn 10 năm kinh nghiệm và 50+ trường đối tác tại Đài Loan, Nhật Bản.'],
  ['ITC cung cấp những dịch vụ gì?', 'ITC tư vấn du học Đài Loan và Nhật Bản (trọn gói từ chọn trường, hồ sơ đến visa), đồng thời đào tạo tiếng Trung (HSK · TOCFL) và tiếng Nhật (JLPT) ngay tại trung tâm.'],
  ['Văn phòng ITC ở đâu?', 'ITC đặt tại ' . esc_html(itc_contact('address')) . '. Bạn có thể đến trực tiếp hoặc gọi hotline ' . esc_html(itc_contact('hotline')) . ' để được tư vấn.'],
  ['Vì sao nên chọn ITC?', 'ITC mang đến lộ trình cá nhân hóa, chi phí minh bạch, hệ sinh thái khép kín từ học tiếng đến du học, và sự đồng hành tới tận ngày nhập học - tất cả ngay tại Thái Bình.'],
  ['Học viên ở xa Thái Bình có được hỗ trợ không?', 'Có. Ngoài học viên Thái Bình, ITC hỗ trợ học viên các tỉnh lân cận. Bạn có thể liên hệ hotline hoặc để lại thông tin để được tư vấn từ xa và sắp xếp lịch phù hợp.'],
  ['ITC cam kết điều gì với học viên?', 'ITC cam kết minh bạch chi phí, ký hợp đồng trách nhiệm, cam kết đầu ra theo cấp độ với các khóa ngoại ngữ, và đồng hành xử lý phát sinh trong suốt quá trình học tập, du học.'],
]);
itc_register_section('Để ITC đồng hành cùng bạn', 'Để lại thông tin hoặc gọi hotline, đội ngũ ITC sẽ tư vấn miễn phí và xây lộ trình phù hợp với mục tiêu của bạn.');
get_footer();
