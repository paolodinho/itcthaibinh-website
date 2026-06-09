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
<section class="clx-hero clx-hero--photo clx-hero--slider" data-autoplay="6000" aria-roledescription="carousel" aria-label="Banner ITC">
  <div class="clx-hero__viewport">

    <!-- SLIDE 1: Du học -->
    <div class="clx-hero__slide clx-hero__slide--du is-active" aria-roledescription="slide">
      <div class="wrap clx-hero__grid">
        <div class="clx-hero__content">
          <span class="clx-hero__kk">Tư vấn du học &middot; Đào tạo ngoại ngữ uy tín tại Thái Bình</span>
          <h1 class="clx-hero__big">DU HỌC<br><span class="r">ĐÀI&nbsp;LOAN&nbsp;·&nbsp;NHẬT&nbsp;BẢN</span></h1>
          <span class="clx-hero__script">cùng ITC Thái Bình</span>
          <p class="clx-hero__sub">Đồng hành trọn vẹn từ học tiếng, định hướng ngành nghề đến hoàn tất hồ sơ visa. Minh bạch chi phí, tận tâm tới ngày bạn lên đường nhập học.</p>
          <div class="clx-hero__flags"><span>🇻🇳</span><span>🇹🇼</span><span>🇯🇵</span></div>
          <div class="clx-hero__box">
            <span>Tư vấn miễn phí ngay:</span>
            <a href="tel:<?php echo $tel; ?>"><span class="ic"><?php echo itc_icon('phone',18); ?></span> <?php echo $hot; ?></a>
          </div>
        </div>
      </div>
    </div>

    <!-- SLIDE 2: Đào tạo ngoại ngữ (ảnh banner đang chờ - tạm dùng ảnh slide 1) -->
    <div class="clx-hero__slide clx-hero__slide--nn" aria-roledescription="slide">
      <div class="wrap clx-hero__grid">
        <div class="clx-hero__content">
          <span class="clx-hero__kk">Đào tạo ngoại ngữ &middot; Luyện thi chứng chỉ TOCFL &middot; JLPT</span>
          <h1 class="clx-hero__big">HỌC NGOẠI NGỮ<br><span class="r">TIẾNG&nbsp;TRUNG&nbsp;·&nbsp;TIẾNG&nbsp;NHẬT</span></h1>
          <span class="clx-hero__script">cùng ITC Thái Bình</span>
          <p class="clx-hero__sub">Lộ trình bài bản từ mất gốc đến giao tiếp thành thạo &amp; luyện thi chứng chỉ. Giáo viên tận tâm, lớp nhỏ, cam kết đầu ra rõ ràng.</p>
          <div class="clx-hero__flags"><span>🇨🇳</span><span>🇹🇼</span><span>🇯🇵</span></div>
          <div class="clx-hero__box">
            <span>Học thử miễn phí:</span>
            <a href="tel:<?php echo $tel; ?>"><span class="ic"><?php echo itc_icon('phone',18); ?></span> <?php echo $hot; ?></a>
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
  <div class="wrap clx-head reveal">
    <span class="kk">Về ITC</span>
    <h2>Hơn 10 năm đồng hành cùng học viên Việt Nam</h2>
    <p>ITC Group là đơn vị tư vấn du học và đào tạo ngoại ngữ uy tín tại Thái Bình, liên kết với nhiều trường đối tác tại Đài Loan và Nhật Bản. Với hơn 2.000 học viên đã đồng hành, ITC cam kết lộ trình minh bạch, đội ngũ tận tâm và hỗ trợ tới tận ngày nhập học.</p>
    <a class="clx-more" href="<?php echo esc_url(home_url('/gioi-thieu/')); ?>">Xem thêm về ITC <?php echo itc_icon('arrow',15); ?></a>
  </div>
</section>

<!-- 3 CARD DỊCH VỤ -->
<section class="clx-sec clx-sec--pale">
  <div class="wrap">
    <div class="clx-head reveal"><span class="kk">Dịch vụ</span><h2>Du học &amp; ngoại ngữ cùng <span class="u">ITC</span></h2></div>
    <div class="clx-svc2 reveal" data-delay="1">
      <div class="clx-svc2__cards">
        <a class="clx-svc2__card" href="<?php echo esc_url(home_url('/du-hoc-dai-loan/')); ?>"><span class="clx-svc2__ic"><?php echo itc_icon('tower',28); ?></span><b>Du học Đài Loan</b><span class="clx-svc2__l">Tìm hiểu <?php echo itc_icon('arrow',13); ?></span></a>
        <a class="clx-svc2__card" href="<?php echo esc_url(home_url('/du-hoc-nhat-ban/')); ?>"><span class="clx-svc2__ic"><?php echo itc_icon('fuji',28); ?></span><b>Du học Nhật Bản</b><span class="clx-svc2__l">Tìm hiểu <?php echo itc_icon('arrow',13); ?></span></a>
        <a class="clx-svc2__card" href="<?php echo esc_url(home_url('/tieng-trung/')); ?>"><span class="clx-svc2__ic"><?php echo itc_icon('cap',28); ?></span><b>Đào tạo ngoại ngữ</b><span class="clx-svc2__l">Tìm hiểu <?php echo itc_icon('arrow',13); ?></span></a>
      </div>
      <figure class="clx-svc2__photo"><img src="<?php echo esc_url($img.'/hero-wide.jpg'); ?>" alt="Học viên ITC Thái Bình" loading="lazy"></figure>
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
      ['why-photo.jpg', 'Tư vấn chuyên môn, lộ trình cá nhân hóa', ['Đội ngũ am hiểu thực tế du học, đồng hành ở từng bước.','Tư vấn theo học lực, tài chính và mục tiêu thật của bạn.']],
      ['about-team.jpg', 'Minh bạch &amp; đồng hành tới khi nhập học', ['Cam kết rõ ràng, ký hợp đồng trách nhiệm.','Hỗ trợ hồ sơ, visa, đón sân bay và ổn định cuộc sống.']],
      ['gal-8.jpg', 'Hệ sinh thái khép kín tại Thái Bình', ['Học ngoại ngữ &amp; làm hồ sơ du học cùng một nơi.','Mạng lưới trường đối tác rộng tại Đài Loan &amp; Nhật Bản.']],
    ];
    foreach ($adv as $i => $a): ?>
    <article class="clx-adv__col">
      <span class="clx-adv__no"><?php printf('%02d', $i + 1); ?></span>
      <h3><?php echo $a[1]; ?></h3>
      <figure class="clx-adv__media"><img src="<?php echo esc_url($img.'/'.$a[0]); ?>" alt="<?php echo esc_attr(wp_strip_all_tags($a[1])); ?>" loading="lazy"></figure>
      <ul><?php foreach ($a[2] as $li): ?><li><?php echo itc_icon('check',18); ?> <span><?php echo $li; ?></span></li><?php endforeach; ?></ul>
    </article>
    <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- LỘ TRÌNH -->
<section class="clx-sec clx-sec--pale">
  <div class="wrap">
    <div class="clx-head reveal"><span class="kk">Lộ trình</span><h2>4 bước du học cùng ITC</h2></div>
    <div class="clx-road reveal" data-delay="1">
      <span class="clx-road__line" aria-hidden="true"></span>
      <?php $road = [['compass','Tư vấn &amp; định hướng','Đánh giá năng lực, đề xuất lộ trình phù hợp.'],['cap','Học tiếng &amp; luyện thi','Đào tạo ngoại ngữ đạt chuẩn đầu vào.'],['doc','Hồ sơ &amp; visa','Chuẩn bị hồ sơ, phỏng vấn, xử lý visa.'],['plane','Lên đường &amp; hỗ trợ','Đón sân bay, ổn định &amp; đồng hành.']];
      foreach ($road as $i => $r): ?>
      <div class="clx-road__s<?php echo $i === count($road)-1 ? ' clx-road__s--end' : ''; ?>"><span class="clx-road__ic"><?php echo itc_icon($r[0],28); ?><b><?php echo $i + 1; ?></b></span><div class="clx-road__cap"><h3><?php echo $r[1]; ?></h3><p><?php echo $r[2]; ?></p></div></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- HOẠT ĐỘNG (band navy) -->
<section class="clx-act">
  <div class="wrap">
    <div class="clx-head reveal"><span class="kk">Khoảnh khắc ITC</span><h2>Các hoạt động của ITC</h2></div>
    <div class="clx-gal clx-gal--scroll reveal" data-delay="1">
      <?php foreach (['gal-1.jpg','gal-2.jpg','gal-4.jpg','gal-3.jpg','gal-5.jpg','gal-6.jpg','gal-9.jpg','gal-11.jpg','act-1.jpg','act-3.jpg'] as $g): ?>
      <figure><img src="<?php echo esc_url($img.'/'.$g); ?>" alt="Hoạt động ITC" loading="lazy"></figure>
      <?php endforeach; ?>
    </div>
    <div style="text-align:center;margin-top:30px"><a class="twn-btn twn-btn--white twn-btn--lg" href="<?php echo esc_url(home_url('/thu-vien-anh/')); ?>">Xem thư viện ảnh <?php echo itc_icon('arrow',16); ?></a></div>
  </div>
</section>

<!-- CẢM NGHĨ -->
<section class="clx-sec">
  <div class="wrap">
    <div class="clx-head reveal"><span class="kk">Cảm nghĩ học viên</span><h2>Học viên nói gì về ITC</h2></div>
    <?php
    $rv = [
      ['student-1.jpg','Nguyễn Thị Hiền','Du học Đài Loan - Hệ Ngôn ngữ','Em mất gốc tiếng Trung, nhờ thầy cô ITC kèm sát mà thi đậu TOCFL và nhận học bổng Đài Loan.'],
      ['student-2.jpg','Trần Quỳnh Anh','Du học Nhật Bản - Hệ Thạc sĩ','Quy trình rõ ràng, minh bạch. Gia đình em yên tâm khi cho con đi Nhật vì ITC hỗ trợ tới tận nơi ở.'],
      ['student-3.jpg','Phạm Minh Tuấn','Học viên tiếng Nhật JLPT N4','Lớp tiếng Nhật ở ITC vui và chắc kiến thức. Em đã đạt JLPT N4 và chuẩn bị bay sang Nhật.'],
    ]; ?>
    <div class="clx-testi reveal" data-delay="1">
      <figure class="clx-testi__lead"><img src="<?php echo esc_url($img.'/'.$rv[0][0]); ?>" alt="<?php echo esc_attr($rv[0][1]); ?>" loading="lazy"><figcaption><b><?php echo $rv[0][1]; ?></b><span><?php echo $rv[0][2]; ?></span></figcaption></figure>
      <div class="clx-testi__list">
        <?php foreach ($rv as $r): ?>
        <article class="clx-q"><div class="st">&#9733;&#9733;&#9733;&#9733;&#9733;</div><p><?php echo $r[3]; ?></p><small><b><?php echo $r[1]; ?></b> · <?php echo $r[2]; ?></small></article>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- TIN TỨC -->
<section class="clx-sec">
  <div class="wrap">
    <div class="clx-head reveal"><span class="kk">Tin tức</span><h2>Tin tức - Sự kiện</h2></div>
    <div class="clx-news reveal" data-delay="1">
      <?php $n = new WP_Query(['post_type'=>'post','posts_per_page'=>3,'ignore_sticky_posts'=>true]);
      if ($n->have_posts()): while ($n->have_posts()): $n->the_post(); ?>
      <article class="clx-post">
        <a class="clx-post__m" href="<?php the_permalink(); ?>"><img src="<?php echo esc_url(itc_post_image_url()); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy"></a>
        <div class="clx-post__b"><span class="clx-post__d"><?php echo get_the_date('d/m/Y'); ?></span><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><p><?php echo esc_html(wp_trim_words(get_the_excerpt(),20)); ?></p></div>
      </article>
      <?php endwhile; wp_reset_postdata(); else: for ($k=1;$k<=3;$k++): ?>
      <article class="clx-post"><div class="clx-post__m"><img src="<?php echo esc_url($img.'/act-'.(($k%6)+1).'.jpg'); ?>" alt="Tin tức ITC" loading="lazy"></div><div class="clx-post__b"><span class="clx-post__d"><?php echo date('d/m/Y'); ?></span><h3>Tin tức &amp; sự kiện ITC</h3><p>Cập nhật hoạt động, học bổng và thông tin du học mới nhất từ ITC.</p></div></article>
      <?php endfor; endif; ?>
    </div>
    <div style="text-align:center;margin-top:30px"><a class="twn-btn twn-btn--red twn-btn--lg" href="<?php echo esc_url(home_url('/tin-tuc-su-kien/')); ?>">Xem tất cả tin tức <?php echo itc_icon('arrow',16); ?></a></div>
  </div>
</section>

<!-- ĐĂNG KÝ (navy + form) -->
<?php itc_register_section(); ?>

<?php get_footer(); ?>
