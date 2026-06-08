<?php
/** Liên hệ */
if (!defined('ABSPATH')) exit;
get_header();
$tel = esc_attr(itc_contact('hotline_raw'));
$addr = itc_contact('address');
$map = itc_contact('map_embed');
itc_page_hero('Liên hệ ITC', 'Đội ngũ ITC luôn sẵn sàng tư vấn miễn phí cho bạn.');
?>
<section class="section">
  <div class="wrap">
    <div class="infocards reveal">
      <div class="infocard">
        <span class="ico"><?php echo itc_icon('phone',24); ?></span>
        <h3>Hotline</h3>
        <a href="tel:<?php echo $tel; ?>"><?php echo esc_html(itc_contact('hotline')); ?></a>
        <p><?php echo esc_html(itc_contact('working_hours')); ?></p>
      </div>
      <div class="infocard">
        <span class="ico"><?php echo itc_icon('doc',24); ?></span>
        <h3>Email</h3>
        <a href="mailto:<?php echo esc_attr(itc_contact('email')); ?>"><?php echo esc_html(itc_contact('email')); ?></a>
        <p>Phản hồi trong vòng 24 giờ</p>
      </div>
      <div class="infocard">
        <span class="ico"><?php echo itc_icon('thumb',24); ?></span>
        <h3>Fanpage</h3>
        <a href="<?php echo esc_url(itc_contact('fb_duhoc')); ?>" target="_blank" rel="noopener">Du học ITC Thái Bình</a>
        <p><a href="<?php echo esc_url(itc_contact('fb_hoangu')); ?>" target="_blank" rel="noopener" style="color:var(--blue)">Trung tâm Hoa ngữ ITC</a></p>
      </div>
    </div>

    <div class="section-head reveal" style="margin-top:64px">
      <span class="kicker">Cơ sở ITC</span>
      <h2>Địa chỉ ITC Thái Bình</h2>
      <p class="lead">Bấm "Chỉ đường" để Google Maps dẫn đường từ vị trí của bạn. Đến trực tiếp để tư vấn và kiểm tra trình độ miễn phí.</p>
    </div>
    <div class="branches reveal" data-delay="1">
      <?php $branches = itc_branches(); foreach (array_slice($branches, 0, 1) as $i => $b):
        $dir = 'https://www.google.com/maps/dir/?api=1&destination=' . rawurlencode($b['addr']); ?>
      <article class="branch">
        <div class="branch__map">
          <?php if (!empty($b['map'])) : echo $b['map']; else : ?>
          <iframe src="https://maps.google.com/maps?q=<?php echo rawurlencode($b['addr']); ?>&z=16&output=embed" loading="lazy" title="Bản đồ <?php echo esc_attr($b['name']); ?>" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php endif; ?>
        </div>
        <div class="branch__info">
          <span class="branch__badge"><?php echo itc_icon('compass',15); ?> <?php echo esc_html($b['name']); ?></span>
          <h3><?php echo esc_html($b['addr']); ?></h3>
          <p class="branch__tel"><?php echo itc_icon('phone',16); ?> <a href="tel:<?php echo $tel; ?>"><?php echo esc_html(itc_contact('hotline')); ?></a> <span style="color:var(--muted)">· <?php echo esc_html(itc_contact('working_hours')); ?></span></p>
          <?php if (!empty($b['directions'])) : ?>
          <div class="branch__dir">
            <b><?php echo itc_icon('compass',15); ?> Hướng dẫn đường đi</b>
            <p><?php echo nl2br(esc_html($b['directions'])); ?></p>
          </div>
          <?php endif; ?>
          <div class="branch__actions">
            <a class="btn btn-red" href="<?php echo esc_url($dir); ?>" target="_blank" rel="noopener"><?php echo itc_icon('compass',16); ?> Chỉ đường</a>
            <a class="btn btn-outline" href="tel:<?php echo $tel; ?>"><?php echo itc_icon('phone',16); ?> Gọi tư vấn</a>
          </div>
        </div>
      </article>
      <?php endforeach; ?>
    </div>

    <div class="contact-grid contact-grid--form" style="margin-top:64px">
      <div class="reveal">
        <span class="kicker">Đặt lịch tư vấn</span>
        <h2 style="margin-bottom:14px">Chưa tiện tới cơ sở?</h2>
        <p class="lead">Để lại thông tin, đội ngũ ITC sẽ gọi lại tư vấn miễn phí trong vòng 24 giờ - giải đáp mọi thắc mắc về du học &amp; lộ trình học ngoại ngữ.</p>
        <ul class="ticks" style="margin-top:22px">
          <li><?php echo itc_icon('check',18); ?> Tư vấn lộ trình du học Đài Loan / Nhật Bản miễn phí</li>
          <li><?php echo itc_icon('check',18); ?> Kiểm tra trình độ ngoại ngữ &amp; định hướng khóa học</li>
          <li><?php echo itc_icon('check',18); ?> Dự toán chi phí, học bổng theo trường &amp; ngành</li>
        </ul>
      </div>
      <form class="register__form reveal" data-delay="1" action="#" method="post" onsubmit="return false;">
        <h3>Gửi yêu cầu tư vấn</h3>
        <div style="position:absolute;left:-9999px" aria-hidden="true"><label>Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
        <div class="field"><label for="c-name">Họ và tên <i>*</i></label><input type="text" id="c-name" name="name" required autocomplete="name" placeholder="Nguyễn Văn A"></div>
        <div class="field"><label for="c-phone">Số điện thoại <i>*</i></label><input type="tel" id="c-phone" name="phone" required autocomplete="tel" inputmode="numeric" pattern="[0-9]{9,11}" placeholder="09xx xxx xxx"></div>
        <div class="field"><label for="c-program">Quan tâm tới</label>
          <select id="c-program" name="program">
            <option>Du học Đài Loan</option><option>Du học Nhật Bản</option><option>Học tiếng Trung</option><option>Học tiếng Nhật</option><option>Khác</option>
          </select>
        </div>
        <div class="field"><label for="c-msg">Nội dung</label><textarea id="c-msg" name="message" rows="3" style="width:100%;padding:13px 15px;border:1.5px solid var(--line);border-radius:9px;font-family:inherit;font-size:.98rem" placeholder="Bạn cần ITC hỗ trợ gì?"></textarea></div>
        <button type="submit" class="btn btn-red btn-lg" style="width:100%">Gửi yêu cầu <?php echo itc_icon('arrow',16); ?></button>
        <p class="register__note"><?php echo itc_icon('shield',15); ?> Thông tin của bạn được bảo mật tuyệt đối.</p>
      </form>
    </div>
  </div>
</section>
<?php get_footer();
