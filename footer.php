<?php if (!defined('ABSPATH')) exit; ?>
</main>

<?php
$fb_du = itc_contact('fb_duhoc'); $fb_hn = itc_contact('fb_hoangu');
$tel   = esc_attr(itc_contact('hotline_raw'));
$flinks = [
  ['Giới thiệu', home_url('/gioi-thieu/')],
  ['Chương trình du học', home_url('/du-hoc-dai-loan/')],
  ['Dịch vụ', home_url('/dich-vu/')],
  ['Tin tức', home_url('/tin-tuc-su-kien/')],
  ['Học bổng', home_url('/hoc-bong/')],
  ['Liên hệ', home_url('/lien-he/')],
];
?>
<footer class="site-footer">
  <div class="foot-wave" aria-hidden="true">
    <svg viewBox="0 0 1440 90" preserveAspectRatio="none">
      <defs><linearGradient id="fw-grad" x1="0" y1="0" x2="0" y2="1">
        <stop offset="0" stop-color="#E0210F"></stop><stop offset="1" stop-color="#C71B0C"></stop>
      </linearGradient></defs>
      <!-- lớp sóng mờ phía sau: tạo gợn nước có chiều sâu -->
      <path class="fw-echo" d="M0 62 C 250 42 470 40 720 54 C 980 68 1200 72 1440 54 L1440 90 L0 90 Z"></path>
      <!-- sóng chính: đường cong thoải, hơi lệch cho tự nhiên -->
      <path class="fw-main" d="M0 50 C 240 26 470 24 720 42 C 980 60 1200 64 1440 40 L1440 90 L0 90 Z"></path>
      <!-- vạch sáng mảnh ôm mép sóng -->
      <path class="fw-hi" d="M0 50 C 240 26 470 24 720 42 C 980 60 1200 64 1440 40" fill="none"></path>
    </svg>
  </div>

  <div class="wrap foot-grid">
    <div class="foot-c1">
      <span class="foot-logo"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.png'); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" width="150" height="73"></span>
      <h4 class="foot-h">Du học &amp; Đào tạo ngoại ngữ ITC</h4>
      <ul class="foot-addr">
        <?php foreach (itc_branches() as $b): ?>
        <li><span class="foot-pin"><?php echo itc_icon('pin', 15); ?></span><span><b><?php echo esc_html($b['name']); ?>:</b> <?php echo esc_html($b['addr']); ?></span></li>
        <?php endforeach; ?>
      </ul>
      <div class="foot-reach">
        <a class="foot-phone" href="tel:<?php echo $tel; ?>"><span class="foot-ri"><?php echo itc_icon('phone', 16); ?></span><?php echo esc_html(itc_contact('hotline')); ?></a>
        <a class="foot-mail" href="mailto:<?php echo esc_attr(itc_contact('email')); ?>"><span class="foot-ri"><?php echo itc_icon('doc', 16); ?></span><?php echo esc_html(itc_contact('email')); ?></a>
        <p class="foot-hours"><span class="foot-ri"><?php echo itc_icon('clock', 16); ?></span><span>Giờ làm việc: <b><?php echo esc_html(itc_contact('working_hours')); ?></b></span></p>
      </div>
    </div>

    <div class="foot-c2">
      <h4 class="foot-h foot-h--u">Liên kết nhanh</h4>
      <ul class="foot-nav">
        <?php foreach ($flinks as $l): ?>
        <li><a href="<?php echo esc_url($l[1]); ?>"><?php echo itc_icon('arrow', 12); ?> <?php echo esc_html($l[0]); ?></a></li>
        <?php endforeach; ?>
      </ul>
      <h5 class="foot-qh">Kết nối với ITC</h5>
      <div class="foot-soc">
        <?php if ($fb_du): ?><a class="foot-soc--fb" href="<?php echo esc_url($fb_du); ?>" target="_blank" rel="noopener" aria-label="Fanpage Du học ITC"><span class="foot-soc__ic"><?php echo itc_brand('facebook'); ?></span></a><?php endif; ?>
        <?php if ($fb_hn): ?><a class="foot-soc--fb" href="<?php echo esc_url($fb_hn); ?>" target="_blank" rel="noopener" aria-label="Fanpage Ngoại ngữ ITC"><span class="foot-soc__ic"><?php echo itc_brand('facebook'); ?></span></a><?php endif; ?>
        <a class="foot-soc--zalo" href="<?php echo esc_url(itc_contact('zalo')); ?>" target="_blank" rel="noopener" aria-label="Zalo"><span class="foot-soc__ic">Zalo</span></a>
        <?php if (itc_contact('messenger')): ?><a class="foot-soc--mess" href="<?php echo esc_url(itc_contact('messenger')); ?>" target="_blank" rel="noopener" aria-label="Messenger"><span class="foot-soc__ic"><?php echo itc_brand('messenger'); ?></span></a><?php endif; ?>
      </div>
    </div>

    <div class="foot-c3">
      <div class="foot-map">
        <iframe src="https://maps.google.com/maps?q=20.4543879,106.3140482&z=15&output=embed" width="100%" height="320" loading="lazy" style="border:0" title="Bản đồ ITC Thái Bình" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>

  <div class="foot-bottom">
    <div class="wrap">
      <span>© <?php echo date('Y'); ?> Công ty Cổ phần Đầu tư Phát triển Quốc tế ITC.</span>
      <span class="foot-links"><a href="<?php echo esc_url(home_url('/chinh-sach-bao-mat/')); ?>">Chính sách bảo mật</a> · <a href="<?php echo esc_url(home_url('/dieu-khoan-su-dung/')); ?>">Điều khoản sử dụng</a> · <a href="<?php echo esc_url(home_url('/sitemap/')); ?>">Sitemap</a></span>
    </div>
  </div>
</footer>

<!-- Floating contact (FAB speed-dial) -->
<div class="fab" id="itcFab" data-open="false">
  <ul class="fab__list">
    <li class="fab__item" style="--i:3;--x:-116px;--y:-2px">
      <span class="fab__label">Nhắn Messenger</span>
      <a class="fab__btn fab__btn--mess" href="<?php echo esc_url(itc_contact('messenger')); ?>" target="_blank" rel="noopener" aria-label="Chat Messenger">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path fill="#fff" d="M12 2.2C6.3 2.2 2 6.38 2 11.95c0 2.9 1.18 5.42 3.1 7.16.16.15.26.36.27.58l.05 1.75c.02.56.6.93 1.11.7l1.95-.86c.17-.07.36-.09.54-.04 1 .27 2.05.42 3.13.42 5.7 0 10-4.18 10-9.75S17.7 2.2 12 2.2Z"/><path fill="#0084FF" d="m6 14.85 2.94-4.66c.47-.74 1.46-.92 2.16-.4l2.34 1.75c.21.16.5.16.72 0l3.16-2.4c.42-.32.97.18.69.62l-2.94 4.66c-.47.74-1.46.92-2.16.4l-2.34-1.75a.6.6 0 0 0-.72 0l-3.16 2.4c-.42.32-.97-.18-.69-.62Z"/></svg>
      </a>
    </li>
    <li class="fab__item" style="--i:2;--x:-84px;--y:-84px">
      <span class="fab__label">Chat Zalo</span>
      <a class="fab__btn fab__btn--zalo" href="<?php echo esc_url(itc_contact('zalo')); ?>" target="_blank" rel="noopener" aria-label="Chat Zalo">Zalo</a>
    </li>
    <li class="fab__item" style="--i:1;--x:-2px;--y:-116px">
      <span class="fab__label">Gọi: <?php echo esc_html(itc_contact('hotline')); ?></span>
      <a class="fab__btn fab__btn--phone" href="tel:<?php echo esc_attr(itc_contact('hotline_raw')); ?>" aria-label="Gọi hotline"><?php echo itc_icon('phone', 24); ?></a>
    </li>
  </ul>
  <button type="button" class="fab__toggle" aria-expanded="false" aria-controls="itcFab" aria-label="Mở liên hệ nhanh">
    <span class="fab__dot" aria-hidden="true"></span>
    <span class="fab__ic fab__ic--open" aria-hidden="true">
      <svg width="26" height="26" viewBox="0 0 24 24" fill="none"><path d="M12 2.6c-5 0-9 3.55-9 7.93 0 2.5 1.3 4.74 3.35 6.2v3.4l3.18-1.78c.78.17 1.6.26 2.47.26 5 0 9-3.55 9-7.93S17 2.6 12 2.6Z" fill="#fff"/><circle cx="8.2" cy="10.5" r="1.25" fill="#EE200F"/><circle cx="12" cy="10.5" r="1.25" fill="#EE200F"/><circle cx="15.8" cy="10.5" r="1.25" fill="#EE200F"/></svg>
    </span>
    <span class="fab__ic fab__ic--close" aria-hidden="true">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M6 6l12 12M18 6L6 18" stroke="#fff" stroke-width="2.4" stroke-linecap="round"/></svg>
    </span>
  </button>
</div>
<script>
(function(){
  var fab=document.getElementById('itcFab');if(!fab)return;
  var tg=fab.querySelector('.fab__toggle');
  function set(o){fab.dataset.open=o?'true':'false';tg.setAttribute('aria-expanded',o?'true':'false');tg.setAttribute('aria-label',o?'Đóng liên hệ nhanh':'Mở liên hệ nhanh');}
  tg.addEventListener('click',function(e){e.stopPropagation();set(fab.dataset.open!=='true');});
  document.addEventListener('click',function(e){if(!fab.contains(e.target))set(false);});
  document.addEventListener('keydown',function(e){if(e.key==='Escape')set(false);});
  fab.querySelectorAll('.fab__btn').forEach(function(a){a.addEventListener('click',function(){set(false);});});
})();
</script>

<?php wp_footer(); ?>
</body>
</html>
