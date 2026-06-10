<?php
/**
 * Template Name: Sitemap
 * Sơ đồ website ITC dạng HTML cho người dùng (XML cho bot dùng wp-sitemap.xml của WP core).
 */
if (!defined('ABSPATH')) exit;
get_header();
itc_diag_hero('Sơ đồ website', 'about-wide.jpg', 'Sơ đồ website ITC');

/* Các nhóm trang chính (slug => nhãn) */
$mainpages = [
  ''                  => 'Trang chủ',
  'gioi-thieu'        => 'Giới thiệu ITC',
  'du-hoc-dai-loan'   => 'Du học Đài Loan',
  'du-hoc-nhat-ban'   => 'Du học Nhật Bản',
  'tieng-trung'       => 'Học tiếng Trung',
  'tieng-nhat'        => 'Học tiếng Nhật',
  'thu-vien-anh'      => 'Thư viện ảnh',
  'tin-tuc-su-kien'   => 'Tin tức - Sự kiện',
  'tuyen-dung'        => 'Tuyển dụng',
  'lien-he'           => 'Liên hệ',
];
$legalpages = [
  'chinh-sach-bao-mat' => 'Chính sách bảo mật',
  'dieu-khoan-su-dung' => 'Điều khoản sử dụng',
  'sitemap'            => 'Sơ đồ website',
];
?>
<section class="section">
  <div class="wrap">
    <div class="prose reveal" style="max-width:none">
      <p class="lead">Sơ đồ tổng quan các trang và nội dung trên website ITC. Bấm vào từng mục để truy cập nhanh. Phiên bản XML cho công cụ tìm kiếm: <a href="<?php echo esc_url(home_url('/wp-sitemap.xml')); ?>" target="_blank" rel="noopener">wp-sitemap.xml</a>.</p>
    </div>

    <div class="itc-sitemap reveal" data-delay="1">
      <div class="smap-col">
        <h2 class="smap-h"><?php echo itc_icon('compass',20); ?> Trang chính</h2>
        <ul class="smap-list">
          <?php foreach ($mainpages as $slug => $label) {
            $url = $slug === '' ? home_url('/') : home_url('/'.$slug.'/');
            printf('<li><a href="%s">%s</a></li>', esc_url($url), esc_html($label));
          } ?>
        </ul>

        <h2 class="smap-h" style="margin-top:30px"><?php echo itc_icon('shield',20); ?> Thông tin pháp lý</h2>
        <ul class="smap-list">
          <?php foreach ($legalpages as $slug => $label) {
            printf('<li><a href="%s">%s</a></li>', esc_url(home_url('/'.$slug.'/')), esc_html($label));
          } ?>
        </ul>
      </div>

      <div class="smap-col">
        <h2 class="smap-h"><?php echo itc_icon('doc',20); ?> Tin tức - Sự kiện</h2>
        <?php
        $cats = get_categories(['hide_empty' => true, 'number' => 12]);
        if ($cats) : foreach ($cats as $cat) : ?>
          <h3 class="smap-sub"><a href="<?php echo esc_url(get_category_link($cat)); ?>"><?php echo esc_html($cat->name); ?></a> <span class="smap-count"><?php echo (int)$cat->count; ?></span></h3>
          <?php
          $posts = get_posts(['posts_per_page' => 8, 'category' => $cat->term_id, 'orderby' => 'date', 'order' => 'DESC']);
          if ($posts) : ?>
          <ul class="smap-list smap-list--sub">
            <?php foreach ($posts as $p) : ?>
            <li><a href="<?php echo esc_url(get_permalink($p)); ?>"><?php echo esc_html(get_the_title($p)); ?></a></li>
            <?php endforeach; ?>
          </ul>
          <?php endif;
        endforeach;
        else : ?>
          <p style="color:var(--muted)">Chưa có bài viết.</p>
        <?php endif; ?>

        <?php
        $jobs = get_posts(['post_type' => 'itc_job', 'posts_per_page' => 20, 'orderby' => 'menu_order date', 'order' => 'ASC']);
        if ($jobs) : ?>
        <h2 class="smap-h" style="margin-top:30px"><?php echo itc_icon('network',20); ?> Tuyển dụng</h2>
        <ul class="smap-list">
          <?php foreach ($jobs as $j) : ?>
          <li><a href="<?php echo esc_url(get_permalink($j)); ?>"><?php echo esc_html(get_the_title($j)); ?></a></li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php
itc_cta_band();
get_footer();
