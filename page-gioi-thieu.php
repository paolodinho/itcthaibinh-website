<?php
/**
 * page-gioi-thieu.php - Giới thiệu ITC
 * Dựng lại bám sát sharingtaiwan.vn/ve-sharing-taiwan (clone layout), đổi màu:
 *   vàng -> ĐỎ #EE200F, chữ đen -> NAVY #153D8B, giữ in hoa ở cover.
 * Thứ tự section theo taiwan: Cover chéo -> Intro -> Tầm nhìn/Sứ mệnh so le ->
 *   Giá trị cốt lõi (icon) -> Ban lãnh đạo/Đội ngũ -> Ưu điểm khác biệt (icon) ->
 *   Cơ sở vật chất -> FAQ -> Đăng ký tư vấn.
 * (Section "Giấy phép & chứng nhận" của taiwan tạm bỏ - chờ file scan thật từ ITC.)
 */
if (!defined('ABSPATH')) exit;
get_header();
$img = get_template_directory_uri() . '/assets/images';

itc_diag_hero('Về ITC Thái Bình', 'cover-about.jpg', 'Học viên ITC Thái Bình lên đường du học');
?>

<!-- A. INTRO -->
<section class="clx-sec">
  <div class="wrap">
    <div class="clx-head clx-head--left reveal">
      <span class="kk">ITC Thái Bình</span>
      <h2>Cùng bạn mở ra <span class="u">cánh cửa tri thức</span></h2>
    </div>
    <div class="gtw-intro__body reveal" data-delay="1">
      <div class="gtw-intro__text">
        <p>Nền giáo dục Đài Loan và Nhật Bản trong những năm gần đây đã và đang thu hút sự quan tâm của đông đảo học sinh, sinh viên Việt Nam. Sở hữu hệ thống giáo dục chất lượng cao, môi trường học tập hiện đại cùng chi phí hợp lý và nhiều chính sách học bổng, đây được đánh giá là những điểm đến du học lý tưởng cho các bạn trẻ mong muốn trải nghiệm nền giáo dục tiên tiến và mở rộng cánh cửa tương lai.</p>
        <p>ITC Group là đơn vị tư vấn du học và đào tạo ngoại ngữ uy tín tại Thái Bình, hợp tác và liên kết cùng hơn 100 trường đối tác tại Đài Loan và Nhật Bản. Với hơn 15 năm kinh nghiệm cùng đội ngũ am hiểu thực tế du học, ITC đã đồng hành cùng hơn 2.000 học viên trên hành trình chạm tới giảng đường quốc tế - bằng lộ trình minh bạch và sự tận tâm trong từng bước đi.</p>
        <p>ITC ra đời với sứ mệnh chắp cánh ước mơ du học Đài Loan, Nhật Bản cho thế hệ trẻ Việt Nam. Du học là một quyết định quan trọng, ảnh hưởng sâu sắc đến tương lai của mỗi người, vì vậy ITC luôn cam kết mang đến các dịch vụ chuyên nghiệp, uy tín, đồng hành cùng học viên trong suốt hành trình - từ những bước đầu chuẩn bị hồ sơ, học ngoại ngữ đến khi hòa nhập thành công với môi trường học tập và cuộc sống nơi đất khách.</p>
        <div class="gtw-mini">
          <div class="gtw-mini__i"><b>15+</b><span>Năm kinh nghiệm</span></div>
          <div class="gtw-mini__i"><b>2.000+</b><span>Học viên đồng hành</span></div>
          <div class="gtw-mini__i"><b>100+</b><span>Trường đối tác</span></div>
        </div>
      </div>
      <figure class="gtw-intro__fig reveal-zoom">
        <img src="<?php echo esc_url($img.'/team-1.jpg'); ?>" alt="Đội ngũ ITC Group Thái Bình" width="600" height="546" loading="lazy">
        <figcaption>ITC Group</figcaption>
      </figure>
    </div>
  </div>
</section>

<!-- B. TẦM NHÌN / SỨ MỆNH (so le) -->
<section class="clx-sec clx-sec--pale">
  <div class="wrap">
    <div class="gtw-mv reveal">
      <div class="gtw-mv__col">
        <h3>Tầm nhìn</h3>
        <p>Với mong muốn chắp cánh cho những ước mơ du học Đài Loan, Nhật Bản của học sinh, sinh viên Việt Nam, ITC hướng tới mục tiêu trở thành đơn vị tư vấn du học đáng tin cậy hàng đầu. Trở thành cầu nối vững chắc giữa học sinh Việt Nam và nền giáo dục Đài Loan, Nhật Bản, ITC mong muốn góp phần xây dựng một thế hệ trẻ tự tin, sáng tạo và thành công trên toàn cầu.</p>
        <figure class="reveal-zoom"><img src="<?php echo esc_url($img.'/gal-2.jpg'); ?>" alt="Học viên ITC lên đường du học Đài Loan, Nhật Bản" loading="lazy"></figure>
      </div>
      <div class="gtw-mv__col">
        <h3>Sứ mệnh</h3>
        <p>Với kim chỉ nam lấy học viên làm trung tâm, ITC luôn nỗ lực đồng hành cùng học viên mở ra cánh cửa tri thức, nuôi dưỡng một thế hệ trẻ tự tin, đầy tiềm năng trước sự phát triển của nền kinh tế toàn cầu. ITC tin rằng, với sự hỗ trợ và dẫn dắt tận tâm, mỗi học viên sẽ có một hành trình du học suôn sẻ, thành công và tràn đầy những trải nghiệm đáng nhớ.</p>
        <figure class="reveal-zoom"><img src="<?php echo esc_url($img.'/gal-4.jpg'); ?>" alt="Chuyên viên ITC tư vấn, đồng hành cùng học viên" loading="lazy"></figure>
      </div>
    </div>
  </div>
</section>

<!-- C. GIÁ TRỊ CỐT LÕI -->
<section class="clx-sec">
  <div class="wrap">
    <div class="clx-head reveal">
      <span class="kk">Giá trị cốt lõi</span>
      <h2>Kim chỉ nam của <span class="u">ITC</span></h2>
    </div>
    <div class="gtw-cols gtw-cols--cards reveal" data-delay="1">
      <?php
      $values = [
        ['medal',  'Chuyên nghiệp', 'Cung cấp dịch vụ du học Đài Loan, Nhật Bản chuyên nghiệp, uy tín với chất lượng cao nhất.'],
        ['heart',  'Tận tâm',       'Đặt lợi ích của học viên lên hàng đầu, luôn lắng nghe nhu cầu, mong muốn và hỗ trợ học viên hết mình trong suốt quá trình du học.'],
        ['compass','Cầu tiến',      'Luôn cập nhật xu hướng mới nhất trong lĩnh vực du học, nâng cao chất lượng dịch vụ, phát triển đội ngũ và mở rộng hợp tác quốc tế.'],
      ];
      foreach ($values as $v): ?>
      <div class="gtw-col">
        <span class="gtw-col__ic"><?php echo itc_icon($v[0], 34); ?></span>
        <h3><?php echo esc_html($v[1]); ?></h3>
        <p><?php echo esc_html($v[2]); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- D. BAN LÃNH ĐẠO / ĐỘI NGŨ -->
<section class="clx-sec gtw-leaders">
  <div class="wrap">
    <div class="clx-head clx-head--left reveal">
      <span class="kk">Đội ngũ</span>
      <h2>Con người làm nên <span class="u">ITC</span></h2>
    </div>
    <?php $members = function_exists('itc_members') ? itc_members() : []; if ($members): ?>
    <div class="gtw-team reveal" data-delay="1">
      <?php foreach ($members as $m): ?>
      <article class="gtw-mem">
        <div class="gtw-mem__ph"><img src="<?php echo esc_url($m['photo']); ?>" alt="<?php echo esc_attr($m['name']); ?>" loading="lazy"></div>
        <h3><?php echo esc_html($m['name']); ?></h3>
        <?php if (!empty($m['role'])): ?><span class="gtw-mem__role"><?php echo esc_html($m['role']); ?></span><?php endif; ?>
      </article>
      <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="gtw-people reveal" data-delay="1">
      <div class="gtw-people__txt">
        <p>Đứng sau mỗi bộ hồ sơ du học thành công là một tập thể ITC tận tâm. Đội ngũ ITC quy tụ các chuyên viên tư vấn giàu kinh nghiệm, giáo viên ngoại ngữ bản ngữ và chuẩn quốc tế, cùng bộ phận xử lý hồ sơ - visa am hiểu thực tế Đài Loan, Nhật Bản.</p>
        <p>Không chỉ vững chuyên môn, mỗi thành viên ITC đều coi học viên như người nhà - lắng nghe, đồng hành và sẵn sàng hỗ trợ ở mọi bước, từ buổi tư vấn đầu tiên đến tận ngày các em ổn định nơi xứ người.</p>
        <div class="gtw-people__dept">
          <?php
          $depts = [
            ['user',    'Tư vấn du học',      'Định hướng ngành, chọn trường, săn học bổng phù hợp.'],
            ['compass', 'Giáo viên ngoại ngữ', 'Luyện tiếng Trung (HSK · TOCFL) và tiếng Nhật (JLPT).'],
            ['shield',  'Xử lý hồ sơ & visa',  'Chuẩn bị giấy tờ, luyện phỏng vấn, hoàn tất thủ tục visa.'],
            ['heart',   'Chăm sóc học viên',   'Đồng hành từ ngày nhập học đến khi hòa nhập cuộc sống.'],
          ];
          foreach ($depts as $d): ?>
          <div class="gtw-people__dept-i">
            <span class="gtw-people__dept-ic"><?php echo itc_icon($d[0], 24); ?></span>
            <div><b><?php echo esc_html($d[1]); ?></b><span><?php echo esc_html($d[2]); ?></span></div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <figure class="gtw-people__fig reveal-zoom" data-delay="1">
        <img src="<?php echo esc_url($img.'/team-feature.jpg'); ?>" alt="Đội ngũ ITC Group - tư vấn du học và đào tạo ngoại ngữ tại Thái Bình" loading="lazy">
        <figcaption>Tập thể ITC Group - tận tâm đồng hành cùng học viên</figcaption>
      </figure>
    </div>
    <div class="gtw-strip reveal" data-delay="2">
      <?php
      $tphotos = [
        ['team-3.jpg', 'Đội ngũ ITC Group Thái Bình'],
        ['team-2.jpg', 'Chuyên viên tư vấn du học ITC'],
        ['about-team.jpg', 'Cán bộ, nhân viên ITC Group'],
        ['gal-9.jpg', 'Văn phòng tư vấn ITC tại Thái Bình'],
      ];
      foreach ($tphotos as $tp): ?>
      <figure><img src="<?php echo esc_url($img.'/'.$tp[0]); ?>" alt="<?php echo esc_attr($tp[1]); ?>" loading="lazy"><figcaption><?php echo esc_html($tp[1]); ?></figcaption></figure>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- E. ƯU ĐIỂM KHÁC BIỆT -->
<section class="clx-sec">
  <div class="wrap">
    <div class="clx-head reveal">
      <span class="kk">Vì sao chọn ITC</span>
      <h2>Ưu điểm tạo nên <span class="u">ITC</span> khác biệt</h2>
    </div>
    <div class="gtw-cols gtw-cols--4 reveal" data-delay="1">
      <?php
      $adv = [
        ['user',   'Đội ngũ tư vấn chuyên môn cao', 'ITC sở hữu đội ngũ tư vấn chuyên nghiệp, nhiệt tình, giàu kinh nghiệm thực tế trong lĩnh vực du học Đài Loan và Nhật Bản.', home_url('/lien-he/')],
        ['network','Mạng lưới hơn 100 trường đối tác', 'ITC là đối tác liên kết của hơn 100 trường đại học, học viện tại Đài Loan và Nhật Bản, mở ra nhiều lựa chọn ngành học phù hợp.', home_url('/du-hoc-dai-loan/')],
        ['medal',  'Học bổng ưu đãi và độc quyền', 'ITC luôn nỗ lực mang đến cho học viên những cơ hội học bổng du học Đài Loan, Nhật Bản giá trị và hấp dẫn nhất.', home_url('/du-hoc-nhat-ban/')],
        ['shield', 'Chương trình hỗ trợ toàn diện', 'Học viên của ITC được hỗ trợ toàn diện từ A đến Z, từ khâu tư vấn chọn ngành, chọn trường đến các thủ tục hồ sơ, visa liên quan.', home_url('/lien-he/')],
      ];
      foreach ($adv as $a): ?>
      <div class="gtw-col">
        <span class="gtw-col__ic"><?php echo itc_icon($a[0], 34); ?></span>
        <h3><?php echo esc_html($a[1]); ?></h3>
        <p><?php echo esc_html($a[2]); ?></p>
        <a class="btn btn-outline" href="<?php echo esc_url($a[3]); ?>">Xem thêm</a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- F. CƠ SỞ VẬT CHẤT -->
<section class="clx-sec clx-sec--pale">
  <div class="wrap">
    <div class="clx-head reveal">
      <span class="kk">Cơ sở vật chất</span>
      <h2>Môi trường học tập <span class="u">hiện đại</span></h2>
      <p>Không gian học tập và tư vấn được đầu tư bài bản - sẵn sàng đồng hành cùng bạn trên cả hành trình du học.</p>
    </div>
    <div class="gtw-fac reveal" data-delay="1">
      <?php
      $fac = [
        ['Phòng học hiện đại', ['act-3.jpg','gal-7.jpg'],
          'Các phòng học tại ITC được thiết kế rộng rãi, thoáng mát, trang bị đầy đủ thiết bị giảng dạy hiện đại như tivi, hệ thống âm thanh,... Sĩ số lớp hợp lý cùng môi trường học tập yên tĩnh giúp học viên tập trung và tiếp thu kiến thức một cách hiệu quả nhất.'],
        ['Trung tâm tư vấn khang trang', ['gal-8.jpg','gal-5.jpg'],
          'Trung tâm ITC tọa lạc tại vị trí thuận tiện ở Thái Bình với không gian khang trang, chuyên nghiệp. Mỗi học viên đều được đón tiếp, lắng nghe và xây dựng lộ trình du học phù hợp trong một môi trường thân thiện, tin cậy - ngay từ buổi tư vấn đầu tiên.'],
      ];
      foreach ($fac as $f): ?>
      <article class="gtw-fac__card">
        <div class="gtw-fac__imgs">
          <?php foreach ($f[1] as $im): ?><img src="<?php echo esc_url($img.'/'.$im); ?>" alt="<?php echo esc_attr($f[0]); ?>" loading="lazy"><?php endforeach; ?>
        </div>
        <h3><?php echo esc_html($f[0]); ?></h3>
        <p><?php echo esc_html($f[2]); ?></p>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php
itc_faq([
  ['ITC Thái Bình là đơn vị nào?', 'ITC Group là đơn vị tư vấn du học và đào tạo ngoại ngữ uy tín tại Thái Bình, với hơn 15 năm kinh nghiệm và 100+ trường đối tác tại Đài Loan, Nhật Bản.'],
  ['ITC cung cấp những dịch vụ gì?', 'ITC tư vấn du học Đài Loan và Nhật Bản (trọn gói từ chọn trường, hồ sơ đến visa), đồng thời đào tạo tiếng Trung (HSK · TOCFL) và tiếng Nhật (JLPT) ngay tại trung tâm.'],
  ['Văn phòng ITC ở đâu?', 'ITC đặt tại ' . esc_html(itc_contact('address')) . '. Bạn có thể đến trực tiếp hoặc gọi hotline ' . esc_html(itc_contact('hotline')) . ' để được tư vấn.'],
  ['Vì sao nên chọn ITC?', 'ITC mang đến lộ trình cá nhân hóa, chi phí minh bạch, hệ sinh thái khép kín từ học tiếng đến du học, và sự đồng hành tới tận ngày nhập học - tất cả ngay tại Thái Bình.'],
  ['Học viên ở xa Thái Bình có được hỗ trợ không?', 'Có. Ngoài học viên Thái Bình, ITC hỗ trợ học viên các tỉnh lân cận. Bạn có thể liên hệ hotline hoặc để lại thông tin để được tư vấn từ xa và sắp xếp lịch phù hợp.'],
  ['ITC cam kết điều gì với học viên?', 'ITC cam kết minh bạch chi phí, ký hợp đồng trách nhiệm, cam kết đầu ra theo cấp độ với các khóa ngoại ngữ, và đồng hành xử lý phát sinh trong suốt quá trình học tập, du học.'],
]);
itc_register_section('Đăng ký tư vấn', 'Để lại thông tin, ITC sẽ liên hệ tư vấn miễn phí trong vòng 24 giờ.');
get_footer();
