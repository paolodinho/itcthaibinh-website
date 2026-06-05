<?php if (!defined('ABSPATH')) exit; ?>
</main>

<footer class="site-footer">
  <div class="wrap">
    <div class="foot-brand">
      <span class="foot-logo"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.png'); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" width="150" height="73"></span>
      <p><?php echo esc_html(itc_mod('itc_footer_about', 'Tư vấn du học Đài Loan – Nhật Bản & đào tạo tiếng Trung, tiếng Nhật uy tín tại Thái Bình. Đồng hành cùng học viên từ định hướng đến khi đặt chân tới giảng đường quốc tế.')); ?></p>
      <div class="foot-social">
        <span class="foot-social__label">Kết nối với ITC</span>
        <?php $fb_du = itc_contact('fb_duhoc'); $fb_hn = itc_contact('fb_hoangu'); ?>
        <?php if ($fb_du): ?><a href="<?php echo esc_url($fb_du); ?>" target="_blank" rel="noopener"><?php echo itc_icon('thumb', 17); ?> <span>Fanpage Du học ITC Thái Bình</span></a><?php endif; ?>
        <?php if ($fb_hn): ?><a href="<?php echo esc_url($fb_hn); ?>" target="_blank" rel="noopener"><?php echo itc_icon('thumb', 17); ?> <span>Fanpage Trung tâm Hoa ngữ ITC</span></a><?php endif; ?>
        <a href="<?php echo esc_url(itc_contact('zalo')); ?>" target="_blank" rel="noopener"><?php echo itc_icon('phone', 17); ?> <span>Zalo: <?php echo esc_html(itc_contact('hotline')); ?></span></a>
      </div>
    </div>

    <div class="foot-col">
      <h4>Du học</h4>
      <?php if (has_nav_menu('footer_duhoc')) {
        wp_nav_menu(['theme_location' => 'footer_duhoc', 'container' => false, 'depth' => 1]);
      } else { ?>
      <ul>
        <li><a href="<?php echo esc_url(home_url('/du-hoc-dai-loan/')); ?>">Du học Đài Loan</a></li>
        <li><a href="<?php echo esc_url(home_url('/du-hoc-nhat-ban/')); ?>">Du học Nhật Bản</a></li>
        <li><a href="<?php echo esc_url(home_url('/gioi-thieu/')); ?>">Về ITC</a></li>
        <li><a href="<?php echo esc_url(home_url('/tuyen-dung/')); ?>">Tuyển dụng</a></li>
      </ul>
      <?php } ?>
    </div>

    <div class="foot-col">
      <h4>Đào tạo</h4>
      <?php if (has_nav_menu('footer_daotao')) {
        wp_nav_menu(['theme_location' => 'footer_daotao', 'container' => false, 'depth' => 1]);
      } else { ?>
      <ul>
        <li><a href="<?php echo esc_url(home_url('/tieng-trung/')); ?>">Tiếng Trung</a></li>
        <li><a href="<?php echo esc_url(home_url('/tieng-nhat/')); ?>">Tiếng Nhật</a></li>
        <li><a href="<?php echo esc_url(home_url('/tin-tuc-su-kien/')); ?>">Tin tức – Sự kiện</a></li>
        <li><a href="<?php echo esc_url(home_url('/thu-vien-anh/')); ?>">Thư viện ảnh</a></li>
        <li><a href="<?php echo esc_url(home_url('/lien-he/')); ?>">Liên hệ</a></li>
      </ul>
      <?php } ?>
    </div>

    <div class="foot-col foot-col--contact">
      <h4>Liên hệ</h4>
      <ul class="foot-contact">
        <?php foreach (itc_branches() as $b): ?>
        <li><?php echo itc_icon('compass', 18); ?> <span><b><?php echo esc_html($b['name']); ?>:</b> <?php echo esc_html($b['addr']); ?></span></li>
        <?php endforeach; ?>
        <li><?php echo itc_icon('phone', 18); ?> <a href="tel:<?php echo esc_attr(itc_contact('hotline_raw')); ?>"><?php echo esc_html(itc_contact('hotline')); ?></a></li>
        <li><?php echo itc_icon('doc', 18); ?> <a href="mailto:<?php echo esc_attr(itc_contact('email')); ?>"><?php echo esc_html(itc_contact('email')); ?></a></li>
        <li><?php echo itc_icon('shield', 18); ?> <span><?php echo esc_html(itc_contact('working_hours')); ?></span></li>
      </ul>
    </div>
  </div>

  <div class="foot-bottom">
    <div class="wrap">
      <span>© <?php echo date('Y'); ?> Công ty Cổ phần Đầu tư Phát triển Quốc tế ITC. MST: 1001134777.</span>
      <span>Thiết kế bởi Digito Combat</span>
    </div>
  </div>
</footer>

<!-- Máy bay bay xuyên trang theo scroll -->
<div class="skyfly" data-skyfly aria-hidden="true">
  <svg class="skyfly__svg" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
    <path class="skyfly__path" d="M12 102 C 35 96, 60 82, 74 56 S 90 12, 93 -6" fill="none" stroke="none"/>
  </svg>
  <span class="skyfly__plane">
    <svg width="40" height="40" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M21 16v-2l-8-5V3.5A1.5 1.5 0 0 0 11.5 2 1.5 1.5 0 0 0 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5z"/></svg>
  </span>
</div>

<!-- Floating contact -->
<div class="float-contact">
  <a class="fc-phone" href="tel:<?php echo esc_attr(itc_contact('hotline_raw')); ?>" aria-label="Gọi hotline"><?php echo itc_icon('phone', 24); ?></a>
  <a class="fc-zalo" href="<?php echo esc_url(itc_contact('zalo')); ?>" target="_blank" rel="noopener" aria-label="Chat Zalo">Z</a>
</div>

<?php wp_footer(); ?>
</body>
</html>
