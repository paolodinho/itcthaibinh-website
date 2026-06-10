<?php
/**
 * front-page.php - Trang chủ ITC theo bố cục sharingtaiwan.vn (màu ITC: navy + đỏ).
 */
if (!defined('ABSPATH')) exit;
get_header();
$img  = get_template_directory_uri() . '/assets/images';
$tel  = esc_attr(itc_contact('hotline_raw'));
$hot  = esc_html(itc_contact('hotline'));
?>

<!-- HERO SLIDER (auto 2 banner) -->
<section class="clx-hero clx-hero--photo clx-hero--slider" data-autoplay="5000" aria-roledescription="carousel" aria-label="Banner ITC">
  <div class="clx-hero__viewport">

    <!-- SLIDE 1: Du học -->
    <div class="clx-hero__slide clx-hero__slide--du is-active" aria-roledescription="slide">
      <div class="wrap clx-hero__grid">
        <div class="clx-hero__content">
          <span class="clx-hero__kk">Tư vấn du học &middot; Đào tạo ngoại ngữ uy tín tại Thái&nbsp;Bình</span>
          <h1 class="clx-hero__big">DU HỌC<br><span class="r">ĐÀI&nbsp;LOAN&nbsp;·&nbsp;NHẬT&nbsp;BẢN</span></h1>
          <span class="clx-hero__script">cùng ITC Thái Bình</span>
          <p class="clx-hero__sub">Đồng hành trọn vẹn từ học tiếng, định hướng ngành nghề đến hoàn tất hồ sơ visa. Minh bạch chi phí, tận tâm tới ngày bạn lên đường nhập học.</p>
          <div class="clx-hero__flags"><span>🇻🇳</span><span>🇹🇼</span><span>🇯🇵</span></div>
          <div class="clx-hero__box">
            <span>Tư vấn miễn phí ngay:</span>
            <a href="tel:<?php echo $tel; ?>"><span class="ic"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg></span> <?php echo $hot; ?></a>
          </div>
        </div>
      </div>
    </div>

    <!-- SLIDE 2: Đào tạo ngoại ngữ (bố cục typographic tạm - chờ ảnh banner thật) -->
    <div class="clx-hero__slide clx-hero__slide--nn" aria-roledescription="slide">
      <div class="clx-hero__lang" aria-hidden="true"><b>你好</b><i>こんにちは</i></div>
      <div class="wrap clx-hero__grid">
        <div class="clx-hero__content">
          <span class="clx-hero__kk">Đào tạo ngoại ngữ &middot; Luyện thi chứng chỉ TOCFL &middot; JLPT</span>
          <h1 class="clx-hero__big">HỌC NGOẠI NGỮ<br><span class="r">TIẾNG&nbsp;TRUNG&nbsp;·&nbsp;TIẾNG&nbsp;NHẬT</span></h1>
          <span class="clx-hero__script">cùng ITC Thái Bình</span>
          <p class="clx-hero__sub">Lộ trình bài bản từ mất gốc đến giao tiếp thành thạo &amp; luyện thi chứng chỉ. Giáo viên tận tâm, lớp nhỏ, cam kết đầu ra rõ ràng.</p>
          <div class="clx-hero__flags"><span>🇨🇳</span><span>🇹🇼</span><span>🇯🇵</span></div>
          <div class="clx-hero__box">
            <span>Học thử miễn phí:</span>
            <a href="tel:<?php echo $tel; ?>"><span class="ic"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg></span> <?php echo $hot; ?></a>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="clx-hero__dots" role="tablist" aria-label="Chọn banner">
    <button type="button" class="is-active" aria-label="Banner 1: Du học"></button>
    <button type="button" aria-label="Banner 2: Đào tạo ngoại ngữ"></button>
  </div>
  <div class="clx-hero__strip"><div class="wrap clx-hero__strip-in">
    <span><?php echo itc_icon('thumb',16); ?> Du học Đài Loan · Nhật Bản - ITC Thái Bình</span>
    <span><?php echo itc_icon('network',16); ?> itcthaibinh.vn</span>
    <span><?php echo itc_icon('medal',16); ?> Hơn 2.000 học viên đồng hành</span>
  </div></div>
</section>

<!-- VỀ ITC -->
<section class="clx-sec clx-about">
  <div class="clx-deco clx-deco--about" aria-hidden="true">
    <img class="ab-map" src="<?php echo $img; ?>/worldmap-dots.svg" alt="" width="1000" height="520" loading="lazy">
    <svg class="ab-fly" viewBox="0 0 360 300" preserveAspectRatio="xMidYMid meet">
      <path class="fa-arc" d="M16 150 C120 56 250 80 332 198"></path>
      <circle class="fa-pin-o" cx="332" cy="198" r="9"></circle><circle class="fa-pin-i" cx="332" cy="198" r="3.5"></circle>
      <g class="fa-plane" transform="translate(206 92) rotate(30)"><path d="M0 8 26 0 20 8 28 12 15 13 10 24 8 13Z"></path></g>
    </svg>
    <span class="ab-dots ab-dots--r"></span>
    <span class="ab-dots ab-dots--n"></span>
  </div>
  <div class="wrap clx-about__grid">
    <div class="clx-about__mtitle" aria-hidden="true">Về <span class="u">ITC</span></div>
    <div class="clx-about__media reveal-zoom">
      <img src="<?php echo $img; ?>/about-wide.jpg" alt="Học viên ITC trong hoạt động tập thể tại Thái Bình" width="940" height="788" loading="lazy">
    </div>
    <div class="clx-about__body reveal">
      <h2>Về <span class="u">ITC</span></h2>
      <p>Hơn 10 năm đồng hành cùng học viên Việt Nam, ITC Group là đơn vị tư vấn du học và đào tạo ngoại ngữ uy tín tại Thái Bình, liên kết với nhiều trường đối tác tại Đài Loan và Nhật Bản. Với hơn 2.000 học viên đã đồng hành, ITC cam kết lộ trình minh bạch, đội ngũ tận tâm và hỗ trợ tới tận ngày nhập học.</p>
      <a class="clx-about__btn clx-about__btn--d" href="<?php echo esc_url(home_url('/gioi-thieu/')); ?>">Xem thêm</a>
    </div>
    <a class="clx-about__btn clx-about__btn--m" href="<?php echo esc_url(home_url('/gioi-thieu/')); ?>">Xem thêm</a>
  </div>
</section>

<!-- 3 CARD DỊCH VỤ -->
<section class="clx-sec clx-sec--pale clx-svc-sec">
  <div class="wrap clx-svc2wrap">
    <div class="clx-head reveal"><span class="kk">Dịch vụ</span><h2>Du học &amp; học ngoại ngữ cùng <span class="u">ITC<svg class="clx-squiggle" viewBox="0 0 64 12" aria-hidden="true"><path d="M3 7C13 2 24 2 33 6s19 5 28 1"/></svg></span></h2></div>
    <div class="clx-svc2 reveal" data-delay="1">
      <div class="clx-svc2__cards">
        <a class="clx-svc2__card" href="<?php echo esc_url(home_url('/du-hoc-dai-loan/')); ?>"><span class="clx-svc2__ic"><?php echo itc_icon('tower',28); ?></span><span class="clx-svc2__body"><b>Du học Đài Loan</b><span class="clx-svc2__desc">Học bổng cao, chi phí hợp lý, bằng cấp quốc tế.</span><span class="clx-svc2__more">Xem chi tiết <?php echo itc_icon('arrow',13); ?></span></span></a>
        <a class="clx-svc2__card" href="<?php echo esc_url(home_url('/du-hoc-nhat-ban/')); ?>"><span class="clx-svc2__ic"><?php echo itc_icon('fuji',28); ?></span><span class="clx-svc2__body"><b>Du học Nhật Bản</b><span class="clx-svc2__desc">Vừa học vừa làm, cơ hội định cư rộng mở.</span><span class="clx-svc2__more">Xem chi tiết <?php echo itc_icon('arrow',13); ?></span></span></a>
        <a class="clx-svc2__card" href="<?php echo esc_url(home_url('/tieng-trung/')); ?>"><span class="clx-svc2__ic"><?php echo itc_icon('lang',28); ?></span><span class="clx-svc2__body"><b>Đào tạo ngoại ngữ</b><span class="clx-svc2__desc">Tiếng Trung, tiếng Nhật - luyện thi TOCFL, JLPT.</span><span class="clx-svc2__more">Xem chi tiết <?php echo itc_icon('arrow',13); ?></span></span></a>
      </div>
      <figure class="clx-svc2__photo reveal-zoom"><img src="<?php echo esc_url($img.'/svc3-wide.jpg'); ?>" alt="Học viên du học trong khuôn viên trường" width="1706" height="922" loading="lazy"></figure>
    </div>
  </div>
</section>

<!-- ƯU ĐIỂM (xen kẽ ảnh/text) -->
<section class="clx-sec">
  <div class="wrap">
    <div class="clx-head reveal"><span class="kk">Vì sao chọn ITC</span><h2>Điều làm nên <span class="u">sự khác biệt</span></h2></div>
    <div class="clx-adv reveal" data-delay="1">
    <?php
    $adv = [
      ['gal-4.jpg', 'Tư vấn chuyên môn, lộ trình cá nhân hóa',
        'Mỗi học viên một xuất phát điểm khác nhau, nên ITC không áp một lộ trình chung cho tất cả.',
        ['Đội ngũ am hiểu thực tế du học Đài Loan, Nhật Bản, đồng hành sát từng bước.',
         'Đánh giá đúng học lực, tài chính và mục tiêu để chọn nước, ngành, trường phù hợp.',
         'Tư vấn miễn phí, minh bạch ngay từ buổi đầu, không cam kết suông.']],
      ['gal-11.jpg', 'Minh bạch &amp; đồng hành tới khi nhập học',
        'Cam kết bằng hợp đồng rõ ràng và theo bạn tới tận ngày đặt chân vào giảng đường.',
        ['Ký hợp đồng trách nhiệm, công khai toàn bộ chi phí, không phát sinh mập mờ.',
         'Hỗ trợ trọn gói hồ sơ, dịch thuật, công chứng và luyện phỏng vấn visa.',
         'Đón sân bay, lo chỗ ở và ổn định cuộc sống những ngày đầu nơi đất khách.']],
      ['gal-7.jpg', 'Hệ sinh thái khép kín tại Thái Bình',
        'Học tiếng và làm hồ sơ du học tại cùng một nơi, tiết kiệm thời gian, yên tâm chất lượng.',
        ['Trung tâm ngoại ngữ tiếng Trung, tiếng Nhật luyện thi TOCFL, JLPT ngay tại chỗ.',
         'Mạng lưới trường đối tác rộng khắp tại Đài Loan và Nhật Bản.',
         'Một đầu mối lo trọn từ học tiếng, làm hồ sơ, bay tới ngày nhập học.']],
    ];
    foreach ($adv as $i => $a): ?>
    <article class="clx-adv__col">
      <figure class="clx-adv__media reveal-zoom"><img src="<?php echo esc_url($img.'/'.$a[0]); ?>" alt="<?php echo esc_attr(wp_strip_all_tags($a[1])); ?>" loading="lazy"></figure>
      <div class="clx-adv__head"><span class="clx-adv__no"><?php printf('%02d', $i + 1); ?></span><h3><?php echo $a[1]; ?></h3></div>
      <p class="clx-adv__lead"><?php echo $a[2]; ?></p>
      <ul><?php foreach ($a[3] as $li): ?><li><?php echo itc_icon('check',18); ?> <span><?php echo $li; ?></span></li><?php endforeach; ?></ul>
    </article>
    <?php endforeach; ?>
    </div>
    <div class="clx-adv__cta reveal"><a class="clx-about__btn" href="<?php echo esc_url(home_url('/lien-he/')); ?>"><?php echo itc_icon('plane',18); ?> Nhận tư vấn miễn phí từ chuyên viên</a></div>
  </div>
</section>

<!-- LỘ TRÌNH (infographic đường bay uốn) -->
<section class="clx-sec clx-sec--pale clx-road-sec">
  <div class="wrap">
    <div class="clx-head reveal"><span class="kk">Lộ trình</span><h2>Hành trình du học cùng <span class="u">ITC</span></h2></div>
    <?php $road = [
      ['compass','Tư vấn &amp; đánh giá','Đánh giá miễn phí, định hướng nước, ngành &amp; trường.'],
      ['lang','Học ngoại ngữ','Lớp tiếng Trung/Nhật từ mất gốc đến đạt chuẩn.'],
      ['medal','Luyện thi chứng chỉ','Ôn &amp; thi TOCFL/JLPT đạt chuẩn đầu vào.'],
      ['doc','Chọn trường &amp; hồ sơ','Chọn trường theo học bổng, hoàn thiện hồ sơ.'],
      ['network','Nộp hồ sơ &amp; phỏng vấn','Nộp đăng ký, phỏng vấn, nhận thư mời nhập học.'],
      ['shield','Chuẩn bị &amp; xin visa','Hoàn thiện hồ sơ &amp; phỏng vấn xin visa.'],
      ['plane','Lên đường','Vé máy bay, hành lý, định hướng trước khi bay.'],
      ['star','Nhập học &amp; đồng hành','Đón sân bay, nhập học &amp; đồng hành suốt khoá.'],
    ]; $rn = count($road);
    $pos = [[12.5,56],[37.5,28],[62.5,56],[87.5,28],[87.5,300],[62.5,272],[37.5,300],[12.5,272]]; ?>
    <div class="clx-rdg reveal" data-delay="1">
      <svg class="clx-rdg__path" viewBox="0 0 1200 500" preserveAspectRatio="none" aria-hidden="true">
        <path class="rd-line" d="M150 88 C250 88 350 60 450 60 C550 60 650 88 750 88 C850 88 950 60 1050 60 C1165 60 1165 332 1050 332 C950 332 850 304 750 304 C650 304 550 332 450 332 C350 332 250 304 150 304"/>
        <circle class="rd-mk" cx="1142" cy="150" r="7"/><circle class="rd-mk" cx="1142" cy="250" r="7"/><circle class="rd-mk" cx="360" cy="378" r="7"/>
        <g class="rd-plane" transform="translate(288 66) rotate(-19)"><path d="M0 7 22 0 17 7 24 10 13 11 9 20 7 11Z"/></g>
        <g class="rd-plane" transform="translate(888 66) rotate(-19)"><path d="M0 7 22 0 17 7 24 10 13 11 9 20 7 11Z"/></g>
        <g class="rd-plane" transform="translate(612 326) rotate(165)"><path d="M0 7 22 0 17 7 24 10 13 11 9 20 7 11Z"/></g>
      </svg>
      <?php foreach ($road as $i => $r): $p = $pos[$i]; $alt = ($i % 2 === 1); ?>
      <div class="clx-rdg__step<?php echo $alt ? ' clx-rdg__step--r' : ''; ?>" style="left:<?php echo $p[0]; ?>%;top:<?php echo $p[1]; ?>px;--d:<?php echo $i; ?>">
        <span class="clx-rdg__dot"><?php echo itc_icon($r[0], 24); ?><b><?php echo $i + 1; ?></b></span>
        <h3><?php echo $r[1]; ?></h3>
        <p><?php echo $r[2]; ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- HOẠT ĐỘNG (band đỏ - thẻ ảnh + nhãn, thẻ giữa nổi) -->
<section class="clx-act clx-act--cards">
  <div class="clx-deco clx-deco--act" aria-hidden="true">
    <span class="dco-dots dco-dots--w"></span>
    <span class="dco-dots dco-dots--w is-br"></span>
  </div>
  <div class="wrap">
    <div class="clx-head reveal"><span class="kk">Khoảnh khắc ITC</span><h2>Các hoạt động của ITC</h2></div>
    <?php
      // Ảnh thật từ Thư viện ảnh (CPT itc_photo) - mỗi danh mục lấy 1 ảnh bìa.
      $icon_map = ['tu-van'=>'compass','tien-bay'=>'plane','thanh-tich'=>'medal','doi-ngu'=>'users','hoat-dong'=>'heart'];
      $fallimg  = ['gal-1.jpg','gal-2.jpg','gal-3.jpg','gal-4.jpg','gal-5.jpg'];
      $acts = [];
      foreach (itc_photo_groups() as $gi => $gr) {
        $acts[] = [
          'icon'  => $icon_map[$gr['slug']] ?? 'heart',
          'name'  => $gr['name'],
          'cover' => !empty($gr['items'][0]['img']) ? $gr['items'][0]['img'] : $img.'/'.$fallimg[$gi % 5],
          'slug'  => $gr['slug'],
        ];
      }
    ?>
    <div class="clx-acts__wrap reveal" data-delay="1">
      <button type="button" class="clx-acts__arw clx-acts__arw--prev" aria-label="Ảnh trước"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 5l-7 7 7 7"/></svg></button>
      <div class="clx-acts">
        <div class="clx-acts__track">
          <?php foreach ($acts as $k => $a): ?>
          <a class="clx-acts__card" data-i="<?php echo $k; ?>" href="<?php echo esc_url(home_url('/thu-vien-anh/#'.$a['slug'])); ?>" aria-label="<?php echo esc_attr($a['name']); ?>">
            <img src="<?php echo esc_url($a['cover']); ?>" alt="<?php echo esc_attr($a['name']); ?>" loading="lazy">
            <figcaption><span class="clx-acts__ic"><?php echo itc_icon($a['icon'], 18); ?></span><b><?php echo esc_html($a['name']); ?></b></figcaption>
          </a>
          <?php endforeach; ?>
        </div>
      </div>
      <button type="button" class="clx-acts__arw clx-acts__arw--next" aria-label="Ảnh sau"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 5l7 7-7 7"/></svg></button>
    </div>
    <div class="clx-acts__dots"><?php foreach ($acts as $k => $a): ?><span<?php echo $k === 0 ? ' class="on"' : ''; ?>></span><?php endforeach; ?></div>
    <div class="clx-acts__cta"><a class="twn-btn twn-btn--white twn-btn--lg" href="<?php echo esc_url(home_url('/thu-vien-anh/')); ?>">Xem thư viện ảnh <?php echo itc_icon('arrow',16); ?></a></div>
  </div>
</section>

<!-- CẢM NGHĨ -->
<section class="clx-sec">
  <div class="wrap">
    <div class="clx-head reveal"><span class="kk">Cảm nghĩ học viên</span><h2>Học viên <span class="u">nói gì về ITC</span></h2><p>Những chia sẻ chân thực từ học viên chính là động lực để ITC không ngừng hoàn thiện và phát triển.</p></div>
    <?php
    $rv = [
      ['hv-1.jpg','Nguyễn Thị Hiền','Du học Đài Loan · Hệ Ngôn ngữ','Em từng mất gốc tiếng Trung và rất lo lắng về hồ sơ du học. Nhờ thầy cô ITC kèm sát từng buổi và lên lộ trình riêng, em đã thi đậu TOCFL rồi giành học bổng tại Đài Loan. Suốt chặng đường, ITC luôn đồng hành, giải đáp mọi thắc mắc từ chọn trường, làm hồ sơ cho đến ngày em lên máy bay.'],
      ['hv-2.jpg','Trần Quỳnh Anh','Du học Nhật Bản · Hệ Thạc sĩ','Điều em yên tâm nhất ở ITC là sự minh bạch trong từng bước. Gia đình em ở xa nhưng hoàn toàn tin tưởng vì mọi chi phí, thủ tục đều công khai và cam kết bằng hợp đồng. Khi sang Nhật, ITC còn hỗ trợ đón sân bay và ổn định chỗ ở những ngày đầu, nên em không hề bỡ ngỡ nơi đất khách.'],
      ['hv-3.jpg','Nguyễn Thu Trang','Học viên tiếng Nhật JLPT N4','Lớp tiếng Nhật ở ITC vừa vui vừa chắc kiến thức, giáo viên tận tâm và lớp nhỏ nên em được kèm sát từng người. Từ con số 0, em đã đạt JLPT N4 và giờ đang hoàn thiện hồ sơ bay sang Nhật. Em biết ơn vì ITC không chỉ dạy ngoại ngữ mà còn định hướng cả con đường du học cho em.'],
      ['student-1.jpg','Phạm Minh Đức','Du học Đài Loan · Hệ Kỹ sư','Em chọn ITC vì được tư vấn rất thật, không vẽ vời hay hứa suông. Các thầy cô phân tích rõ học lực và tài chính của gia đình rồi gợi ý trường phù hợp nhất. Ngày em ra sân bay bay sang Đài Loan, ITC vẫn nhắn tin dặn dò từng chút, cảm giác như có người nhà luôn dõi theo mình.'],
      ['student-2.jpg','Lê Hồng Nhung','Du học Đài Loan · Vừa học vừa làm','Cả đoàn chúng em bay cùng đợt và ai cũng yên tâm vì ITC lo trọn gói từ hồ sơ, visa đến đón tận nơi. Chương trình vừa học vừa làm giúp em tự trang trải chi phí mà vẫn theo kịp việc học. Sang đây rồi em mới thấy những gì ITC cam kết ở nhà đều đúng như vậy.'],
    ]; ?>
    <div class="clx-tw reveal" data-delay="1" data-autoplay="5000">
      <div class="clx-tw__viewport">
        <div class="clx-tw__track">
          <?php foreach ($rv as $k => $r): ?>
          <article class="clx-tw__slide">
            <figure class="clx-tw__img"><span class="clx-tw__qbadge" aria-hidden="true">&ldquo;</span><img src="<?php echo esc_url($img.'/'.$r[0]); ?>" alt="<?php echo esc_attr($r[1]); ?>" loading="lazy"></figure>
            <div class="clx-tw__card">
              <div class="clx-tw__who">
                <span class="clx-tw__avatar"><?php echo itc_icon('user',26); ?></span>
                <div><b class="clx-tw__name"><?php echo $r[1]; ?></b><span class="clx-tw__course"><?php echo $r[2]; ?></span></div>
              </div>
              <blockquote class="clx-tw__quote"><?php echo $r[3]; ?></blockquote>
            </div>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="clx-tw__dots"><?php foreach ($rv as $k => $r): ?><button type="button"<?php echo $k === 0 ? ' class="on"' : ''; ?> aria-label="Cảm nghĩ <?php echo $k + 1; ?>"></button><?php endforeach; ?></div>
    </div>
  </div>
</section>

<!-- TIN TỨC (1 bài lớn + 4 bài nhỏ, thumb phủ đỏ - kiểu taiwan) -->
<section class="clx-sec">
  <div class="wrap">
    <div class="clx-head reveal"><span class="kk">Tin tức</span><h2>Tin tức - Sự kiện</h2></div>
    <?php
    $tpl = [$img.'/news-tpl-1.jpg',$img.'/news-tpl-2.jpg',$img.'/news-tpl-3.jpg',$img.'/news-tpl-4.jpg',$img.'/news-tpl-5.jpg'];
    $np = []; $nq = new WP_Query(['post_type'=>'post','posts_per_page'=>5,'ignore_sticky_posts'=>true]);
    if ($nq->have_posts()) { while ($nq->have_posts()) { $nq->the_post();
      $fimg = get_the_post_thumbnail_url(get_the_ID(), 'large'); // featured image (thumb ghép tiêu đề từng bài)
      $np[] = ['l'=>get_permalink(),'t'=>get_the_title(),'d'=>get_the_date('d/m/Y'),'e'=>wp_trim_words(get_the_excerpt(),26),'img'=>$fimg];
    } wp_reset_postdata(); }
    for ($k=count($np); $k<5; $k++) $np[] = ['l'=>home_url('/tin-tuc-su-kien/'),'t'=>'Tin tức &amp; sự kiện ITC','d'=>date('d/m/Y'),'e'=>'Cập nhật hoạt động, học bổng và thông tin du học mới nhất từ ITC.','img'=>''];
    foreach ($np as $k=>$v) if (empty($v['img'])) $np[$k]['img'] = $tpl[$k % 5]; // fallback nếu bài chưa có featured image
    ?>
    <div class="clx-news2 clx-news2--tpl reveal" data-delay="1">
      <article class="clx-news2__feat">
        <a class="clx-news2__m" href="<?php echo esc_url($np[0]['l']); ?>"><img src="<?php echo esc_url($np[0]['img']); ?>" alt="<?php echo esc_attr(wp_strip_all_tags($np[0]['t'])); ?>" loading="lazy"></a>
        <div class="clx-news2__b"><span class="clx-post__d"><?php echo $np[0]['d']; ?></span><h3><a href="<?php echo esc_url($np[0]['l']); ?>"><?php echo $np[0]['t']; ?></a></h3><p><?php echo esc_html($np[0]['e']); ?></p></div>
      </article>
      <div class="clx-news2__side">
        <?php for ($k=1; $k<5; $k++): $p=$np[$k]; ?>
        <article class="clx-news2__item">
          <a class="clx-news2__m" href="<?php echo esc_url($p['l']); ?>"><img src="<?php echo esc_url($p['img']); ?>" alt="<?php echo esc_attr(wp_strip_all_tags($p['t'])); ?>" loading="lazy"></a>
          <div class="clx-news2__b"><span class="clx-post__d"><?php echo $p['d']; ?></span><h4><a href="<?php echo esc_url($p['l']); ?>"><?php echo $p['t']; ?></a></h4></div>
        </article>
        <?php endfor; ?>
      </div>
    </div>
    <div style="text-align:center;margin-top:34px"><a class="twn-btn twn-btn--red twn-btn--lg" href="<?php echo esc_url(home_url('/tin-tuc-su-kien/')); ?>">Xem thêm <?php echo itc_icon('arrow',16); ?></a></div>
  </div>
</section>

<!-- ĐĂNG KÝ (navy + form) -->
<?php itc_register_section(); ?>

<?php get_footer(); ?>
