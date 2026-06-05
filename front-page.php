<?php
/**
 * Front Page - Trang chủ ITC Thái Bình (v7 - bám layout taiwaneduconsult.com)
 * Royal blue + đỏ · hero ảnh full-bleed + overlay · khối số màu · blue split
 */
if (!defined('ABSPATH')) exit;
get_header();
$img = get_template_directory_uri() . '/assets/images';
$tel = esc_attr(itc_contact('hotline_raw'));
?>

<!-- ============ HERO (full-bleed ảnh + overlay) ============ -->
<section class="hero" style="--bg:url('<?php echo esc_url($img.'/hero-wide.jpg'); ?>')">
  <div class="hero__overlay"></div>
  <div class="wrap hero__inner">
    <span class="hero__kicker reveal in"><?php echo itc_icon('star', 15); ?> <?php echo esc_html(itc_mod('itc_hero_kicker', 'Tư vấn du học Đài Loan · Nhật Bản & đào tạo ngoại ngữ')); ?></span>
    <h1 class="hero__title reveal in" data-delay="1"><?php echo itc_hl(itc_mod('itc_hero_title', 'Chạm tới [r]giảng đường quốc tế[/r][br]- tương lai gần hơn bạn nghĩ')); ?></h1>
    <p class="hero__sub reveal in" data-delay="2"><?php echo esc_html(itc_mod('itc_hero_sub', 'ITC đồng hành trọn vẹn từ học tiếng, định hướng ngành nghề đến hoàn tất hồ sơ visa - minh bạch chi phí, tận tâm tới ngày bạn nhập học.')); ?></p>
    <div class="hero__cta reveal in" data-delay="3">
      <a class="btn btn-red btn-lg" href="#register"><?php echo esc_html(itc_mod('itc_hero_cta', 'Đăng ký tư vấn ngay')); ?> <?php echo itc_icon('arrow', 16); ?></a>
      <a class="btn btn-ghost btn-lg" href="tel:<?php echo $tel; ?>"><?php echo itc_icon('phone', 17); ?> <?php echo esc_html(itc_contact('hotline')); ?></a>
    </div>
  </div>
</section>

<!-- ============ 3 KHỐI ĐIỂM NHẤN ============ -->
<section class="usp">
  <div class="wrap usp__grid">
    <?php
    $usp = itc_cards('home-usp') ?: [
      ['title'=>'Du học không áp lực điểm số','desc'=>'Lộ trình phù hợp năng lực từng học viên, hỗ trợ học tiếng từ mất gốc.'],
      ['title'=>'Chi phí hợp lý, chất lượng cao','desc'=>'Học bổng tới 100% học phí, vừa học vừa làm hợp pháp tại Đài Loan & Nhật Bản.'],
      ['title'=>'Tỉ lệ đậu visa 98%','desc'=>'Đội ngũ giàu kinh nghiệm xử lý hồ sơ – phỏng vấn – visa nhanh, chính xác.'],
    ];
    $colors = ['usp__item--red','usp__item--blue','usp__item--blue2'];
    foreach (array_slice($usp,0,3) as $i=>$c) {
      printf('<article class="usp__item %s reveal" data-delay="%d"><span class="usp__no">%02d</span><h3>%s</h3><p>%s</p></article>',
        $colors[$i%3], $i, $i+1, esc_html($c['title']), esc_html($c['desc']));
    } ?>
  </div>
</section>

<!-- ============ DỊCH VỤ (card ảnh overlay) ============ -->
<section class="section services">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Dịch vụ của ITC</span>
      <h2>Tất cả những gì bạn cần cho<br>hành trình du học thành công</h2>
    </div>
    <div class="svc__grid">
      <?php
      $svc = itc_cards('home-services') ?: [
        ['icon'=>'tower','title'=>'Du học Đài Loan','desc'=>'Hệ đại học, thạc sĩ, hệ tiếng Hoa - học bổng & việc làm thêm hấp dẫn.','img'=>$img.'/study-taiwan.jpg','link'=>'/du-hoc-dai-loan/'],
        ['icon'=>'fuji','title'=>'Du học Nhật Bản','desc'=>'Hệ trường tiếng, senmon, đại học - bằng cấp giá trị toàn cầu, vừa học vừa làm.','img'=>$img.'/study-japan.jpg','link'=>'/du-hoc-nhat-ban/'],
        ['icon'=>'cap','title'=>'Đào tạo ngoại ngữ','desc'=>'Tiếng Trung (HSK·TOCFL) & tiếng Nhật (JLPT) - cam kết đầu ra theo cấp độ.','img'=>$img.'/lang-chinese.jpg','link'=>'/tieng-trung/'],
      ];
      foreach ($svc as $i=>$c) {
        $cimg = !empty($c['img']) ? $c['img'] : $img.'/study-taiwan.jpg';
        $link = !empty($c['link']) ? $c['link'] : '#register';
        printf('<article class="svc reveal" data-delay="%d"><img src="%s" alt="%s" loading="lazy"><div class="svc__overlay"></div><div class="svc__body"><span class="svc__ico">%s</span><h3>%s</h3><p>%s</p><a class="svc__link" href="%s">Tìm hiểu thêm %s</a></div></article>',
          $i, esc_url($cimg), esc_attr($c['title']), itc_icon($c['icon']?:'star',22), esc_html($c['title']), esc_html($c['desc']), esc_url($link), itc_icon('arrow',15));
      } ?>
    </div>
  </div>
</section>

<!-- ============ VÌ SAO CHỌN ITC (blue split + ảnh) ============ -->
<section class="why">
  <div class="why__media">
    <img src="<?php echo esc_url($img.'/why-photo.jpg?v='.ITC_VER); ?>" alt="Đội ngũ ITC Thái Bình" width="860" height="1368" loading="lazy">
  </div>
  <div class="why__panel">
    <div class="why__inner reveal">
      <span class="kicker kicker--light">Vì sao chọn ITC?</span>
      <h2>Lý do phụ huynh &amp; học viên<br>tin chọn ITC Thái Bình</h2>
      <ul class="why__list">
        <?php
        $why = itc_cards('home-why') ?: [
          ['title'=>'Tư vấn chuyên môn cao','desc'=>'Đội ngũ am hiểu thực tế du học, đồng hành ở từng bước của hành trình.'],
          ['title'=>'Quy trình minh bạch','desc'=>'Chi phí rõ ràng từ đầu, ký hợp đồng trách nhiệm, tỉ lệ đậu visa cao.'],
          ['title'=>'Cơ hội toàn cầu','desc'=>'Hơn 50 trường đối tác tại Đài Loan & Nhật Bản, mở ra sự nghiệp quốc tế.'],
          ['title'=>'Đồng hành tới khi nhập học','desc'=>'Hỗ trợ hồ sơ, visa, đón sân bay và ổn định cuộc sống nơi xứ người.'],
        ];
        foreach ($why as $c)
          printf('<li><span class="why__check">%s</span><div><b>%s</b><p>%s</p></div></li>',
            itc_icon('check',16), esc_html($c['title']), esc_html($c['desc'])); ?>
      </ul>
      <a class="btn btn-red btn-lg" href="#register">Nhận tư vấn miễn phí <?php echo itc_icon('arrow', 16); ?></a>
    </div>
  </div>
</section>

<!-- ============ SO SÁNH ĐÀI LOAN vs NHẬT (card lật) ============ -->
<section class="section section--alt">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Phân vân chọn nước?</span>
      <h2>Đài Loan hay Nhật Bản - đâu là lựa chọn của bạn?</h2>
      <p class="lead">Di chuột (hoặc chạm) vào mỗi thẻ để lật xem nhanh chi phí, học bổng và cơ hội làm thêm. ITC tư vấn khách quan cả hai thị trường.</p>
    </div>
    <div class="cmp reveal" data-delay="1">
      <div class="cmp__card" data-flip tabindex="0">
        <div class="cmp__inner">
          <div class="cmp__face cmp__front"><span class="cmp__flag">🇹🇼</span><h3>Du học Đài Loan</h3><span class="cmp__hint">Lật để xem chi tiết →</span></div>
          <div class="cmp__face cmp__back">
            <h4>Chi phí &amp; cơ hội</h4>
            <ul>
              <li><?php echo itc_icon('medal',17); ?><span>Chi phí <b>chỉ từ ~150tr/năm</b> - rẻ hơn Nhật rõ rệt</span></li>
              <li><?php echo itc_icon('cap',17); ?><span>Học bổng <b>MOE, ICDF toàn phần</b></span></li>
              <li><?php echo itc_icon('network',17); ?><span>Được làm thêm hợp pháp</span></li>
              <li><?php echo itc_icon('doc',17); ?><span>Học bằng <b>tiếng Trung hoặc tiếng Anh</b></span></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="cmp__card" data-flip tabindex="0">
        <div class="cmp__inner">
          <div class="cmp__face cmp__front"><span class="cmp__flag">🇯🇵</span><h3>Du học Nhật Bản</h3><span class="cmp__hint">Lật để xem chi tiết →</span></div>
          <div class="cmp__face cmp__back">
            <h4>Chi phí &amp; cơ hội</h4>
            <ul>
              <li><?php echo itc_icon('medal',17); ?><span>Chi phí <b>chỉ từ ~160tr/năm</b> tùy thành phố</span></li>
              <li><?php echo itc_icon('cap',17); ?><span>Học bổng <b>MEXT, JASSO</b></span></li>
              <li><?php echo itc_icon('network',17); ?><span>Làm thêm hợp pháp <b>28h/tuần</b></span></li>
              <li><?php echo itc_icon('doc',17); ?><span>Đầu vào <b>JLPT N5–N4</b></span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============ QUY TRÌNH - Hộ chiếu đóng dấu ============ -->
<section class="section process">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Quy trình</span>
      <h2>4 bước đơn giản để du học cùng ITC</h2>
      <p class="lead">ITC lo trọn từ A đến Z - bạn chỉ cần đi theo lộ trình 4 bước rõ ràng dưới đây.</p>
    </div>
    <div class="steps reveal" data-delay="1">
      <?php
      $proc = itc_cards('home-process') ?: [
        ['icon'=>'compass','title'=>'Tư vấn & định hướng','desc'=>'Lắng nghe mục tiêu, đánh giá năng lực và đề xuất lộ trình phù hợp.'],
        ['icon'=>'cap','title'=>'Học tiếng & luyện thi','desc'=>'Đào tạo ngoại ngữ đạt chuẩn đầu vào của trường và kỳ thi chứng chỉ.'],
        ['icon'=>'doc','title'=>'Hồ sơ & visa','desc'=>'Chuẩn bị hồ sơ, phỏng vấn và xử lý thủ tục visa nhanh, chính xác.'],
        ['icon'=>'plane','title'=>'Lên đường & hỗ trợ','desc'=>'Đón sân bay, ổn định chỗ ở và đồng hành suốt thời gian học.'],
      ];
      foreach ($proc as $i=>$c)
        printf('<article class="step"><div class="step__top"><span class="step__ico">%s</span><span class="step__num">%02d</span></div><span class="step__label">Bước %02d</span><h3>%s</h3><p>%s</p></article>',
          itc_icon($c['icon']?:'star',24), $i+1, $i+1, esc_html($c['title']), esc_html($c['desc'])); ?>
    </div>
  </div>
</section>

<!-- ============ KHOẢNH KHẮC (gallery ảnh thật) ============ -->
<section class="section section--alt gallery">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Khoảnh khắc tại ITC</span>
      <h2>Hành trình thật của học viên ITC</h2>
    </div>
    <div class="gallery__masonry reveal" data-delay="1">
      <?php
      $gal = [
        ['gal-1.jpg','Học viên ITC xếp hình bản đồ Việt Nam'],
        ['gal-2.jpg','Tiễn học viên lên đường du học'],
        ['gal-4.jpg','Học viên ITC đạt chứng chỉ'],
        ['gal-3.jpg','Lớp học tại ITC'],
        ['gal-8.jpg','Đội ngũ &amp; học viên ITC Thái Bình'],
        ['gal-5.jpg','Buổi gặp gỡ phụ huynh tại ITC'],
        ['gal-9.jpg','Học viên ITC nhận kết quả'],
        ['gal-6.jpg','Tiễn học viên tại sân bay'],
        ['gal-11.jpg','Học viên ITC với chứng chỉ'],
        ['gal-7.jpg','Buổi học &amp; định hướng du học'],
        ['gal-10.jpg','Tư vấn du học tại ITC'],
      ];
      foreach ($gal as $g) {
        printf('<figure class="gitem"><img src="%s" alt="%s" loading="lazy"></figure>',
          esc_url($img.'/'.$g[0]), esc_attr($g[1]));
      }
      ?>
    </div>
  </div>
</section>

<!-- ============ CẢM NGHĨ ============ -->
<section class="section testi">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Cảm nghĩ học viên</span>
      <h2>Học viên nói gì về ITC</h2>
    </div>
    <div class="tgrid">
      <?php
      // Cảm nghĩ lấy từ CPT (Cảm nghĩ HV); nếu chưa có → dùng mẫu mặc định
      $revs = new WP_Query(['post_type'=>'itc_review','posts_per_page'=>6,'orderby'=>'menu_order date','order'=>'ASC']);
      if ($revs->have_posts()) :
        $rd=0; while ($revs->have_posts()) : $revs->the_post();
          $avatar = has_post_thumbnail() ? get_the_post_thumbnail_url(null,'thumbnail') : $img.'/student-'.(($rd%3)+1).'.jpg';
          $role = get_post_meta(get_the_ID(),'_itc_role',true); ?>
      <article class="tcard reveal" data-delay="<?php echo $rd++; ?>">
        <div class="tcard__stars" aria-label="5 sao">★★★★★</div>
        <p class="tcard__quote"><?php echo esc_html(wp_strip_all_tags(get_the_content())); ?></p>
        <div class="tcard__person">
          <img src="<?php echo esc_url($avatar); ?>" alt="<?php the_title_attribute(); ?>" width="54" height="54" loading="lazy">
          <div><b><?php the_title(); ?></b><span><?php echo esc_html($role); ?></span></div>
        </div>
      </article>
      <?php endwhile; wp_reset_postdata(); else :
        $fb = [
          ['Em mất gốc tiếng Trung, nhờ thầy cô ITC kèm sát mà thi đậu TOCFL và nhận học bổng Đài Loan. Cảm ơn trung tâm rất nhiều!','Nguyễn Thị Hiền','Du học Đài Loan - Hệ Ngôn ngữ','student-1.jpg'],
          ['Quy trình rõ ràng, chi phí minh bạch. Gia đình em yên tâm khi cho con đi Nhật vì ITC hỗ trợ tới tận nơi ở.','Trần Quỳnh Anh','Du học Nhật Bản - Hệ Thạc sĩ','student-2.jpg'],
          ['Lớp tiếng Nhật ở ITC vui và chắc kiến thức. Em đã đạt JLPT N4 và chuẩn bị bay sang Nhật học tiếp.','Phạm Minh Tuấn','Học viên tiếng Nhật JLPT N4','student-3.jpg'],
        ];
        foreach ($fb as $i=>$t) : ?>
      <article class="tcard reveal" data-delay="<?php echo $i; ?>">
        <div class="tcard__stars" aria-label="5 sao">★★★★★</div>
        <p class="tcard__quote"><?php echo esc_html($t[0]); ?></p>
        <div class="tcard__person">
          <img src="<?php echo esc_url($img.'/'.$t[3]); ?>" alt="<?php echo esc_attr($t[1]); ?>" width="54" height="54" loading="lazy">
          <div><b><?php echo esc_html($t[1]); ?></b><span><?php echo esc_html($t[2]); ?></span></div>
        </div>
      </article>
      <?php endforeach; endif; ?>
    </div>
  </div>
</section>

<!-- ============ TIN TỨC ============ -->
<?php
$news = new WP_Query(['post_type' => 'post', 'posts_per_page' => 3, 'ignore_sticky_posts' => true]);
if ($news->have_posts()) : ?>
<section class="section section--alt news">
  <div class="wrap">
    <div class="section-head section-head--center reveal">
      <span class="kicker">Tin tức – Sự kiện</span>
      <h2>Cập nhật mới nhất từ ITC</h2>
    </div>
    <div class="posts">
      <?php $d=0; while ($news->have_posts()) : $news->the_post(); ?>
      <?php $cat = itc_post_cat(); ?>
      <article class="pcard reveal" data-delay="<?php echo $d++; ?>">
        <a class="pcard__media" href="<?php the_permalink(); ?>">
          <img src="<?php echo esc_url(itc_post_image_url()); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
          <?php if ($cat) : ?><span class="pcard__cat"><?php echo esc_html($cat->name); ?></span><?php endif; ?>
        </a>
        <div class="pcard__body">
          <span class="pcard__date"><?php echo get_the_date('d/m/Y'); ?></span>
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <p><?php echo esc_html(get_the_excerpt()); ?></p>
          <a class="pcard__more" href="<?php the_permalink(); ?>">Đọc tiếp <?php echo itc_icon('arrow',14); ?></a>
        </div>
      </article>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ============ CTA BAND (ảnh + overlay) ============ -->
<section class="ctaband" style="--bg:url('<?php echo esc_url($img.'/cta-wide.jpg'); ?>')">
  <div class="ctaband__overlay"></div>
  <div class="wrap ctaband__inner reveal">
    <h2>Sẵn sàng bắt đầu hành trình du học của bạn?</h2>
    <p>Để lại thông tin, đội ngũ ITC sẽ gọi lại tư vấn miễn phí trong vòng 24 giờ.</p>
    <a class="btn btn-red btn-lg" href="#register">Đăng ký tư vấn miễn phí <?php echo itc_icon('arrow', 16); ?></a>
  </div>
</section>

<!-- ============ ĐĂNG KÝ ============ -->
<section class="section register" id="register">
  <div class="wrap register__grid">
    <div class="register__text reveal">
      <span class="kicker">Liên hệ ITC</span>
      <h2>Để lại thông tin,<br>ITC gọi lại tư vấn miễn phí</h2>
      <p class="lead">Đội ngũ tư vấn của ITC sẽ liên hệ trong vòng 24 giờ, giải đáp mọi thắc mắc về du học và lộ trình học ngoại ngữ phù hợp với bạn.</p>
      <ul class="reg__contact">
        <li><span class="reg__ico"><?php echo itc_icon('phone', 18); ?></span><div><small>Hotline</small><a href="tel:<?php echo $tel; ?>"><?php echo esc_html(itc_contact('hotline')); ?></a></div></li>
        <li><span class="reg__ico"><?php echo itc_icon('doc', 18); ?></span><div><small>Email</small><a href="mailto:<?php echo esc_attr(itc_contact('email')); ?>"><?php echo esc_html(itc_contact('email')); ?></a></div></li>
        <li><span class="reg__ico"><?php echo itc_icon('compass', 18); ?></span><div><small>Địa chỉ</small><span><?php echo esc_html(itc_contact('address')); ?></span></div></li>
      </ul>
    </div>
    <form class="register__form reveal" data-delay="1" action="#" method="post" onsubmit="return false;">
      <h3>Đăng ký nhận tư vấn</h3>
      <div style="position:absolute;left:-9999px" aria-hidden="true">
        <label>Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label>
      </div>
      <div class="field">
        <label for="c-name">Họ và tên <i>*</i></label>
        <input type="text" id="c-name" name="name" required autocomplete="name" placeholder="Nguyễn Văn A">
      </div>
      <div class="field">
        <label for="c-phone">Số điện thoại <i>*</i></label>
        <input type="tel" id="c-phone" name="phone" required autocomplete="tel" inputmode="numeric" pattern="[0-9]{9,11}" placeholder="09xx xxx xxx">
      </div>
      <div class="field">
        <label for="c-program">Quan tâm tới</label>
        <select id="c-program" name="program">
          <option>Du học Đài Loan</option>
          <option>Du học Nhật Bản</option>
          <option>Học tiếng Trung</option>
          <option>Học tiếng Nhật</option>
        </select>
      </div>
      <button type="submit" class="btn btn-red btn-lg" style="width:100%">Gửi đăng ký <?php echo itc_icon('arrow', 16); ?></button>
      <p class="register__note"><?php echo itc_icon('shield', 15); ?> Thông tin của bạn được bảo mật tuyệt đối.</p>
    </form>
  </div>
</section>

<?php
$schema = [
  '@context' => 'https://schema.org','@type' => 'EducationalOrganization',
  'name' => 'Công ty Cổ phần Đầu tư Phát triển Quốc tế ITC','alternateName' => 'ITC Thái Bình',
  'url' => home_url('/'),'logo' => $img . '/logo.png',
  'telephone' => itc_contact('hotline_raw'),'email' => itc_contact('email'),
  'address' => ['@type'=>'PostalAddress','streetAddress'=>itc_contact('address'),'addressLocality'=>'Phường Trần Hưng Đạo','addressRegion'=>'Hưng Yên','addressCountry'=>'VN'],
];
echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_UNICODE) . '</script>';
get_footer();
