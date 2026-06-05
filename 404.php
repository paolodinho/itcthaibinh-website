<?php
/** 404 */
if (!defined('ABSPATH')) exit;
get_header();
?>
<section class="section" style="text-align:center">
  <div class="wrap" style="max-width:620px">
    <span class="kicker">Lỗi 404</span>
    <h1 style="font-size:clamp(3rem,8vw,5rem);color:var(--blue)">404</h1>
    <h2 style="margin:10px 0 14px">Không tìm thấy trang</h2>
    <p class="lead">Trang bạn tìm có thể đã được di chuyển hoặc không tồn tại. Hãy quay về trang chủ hoặc liên hệ ITC để được hỗ trợ.</p>
    <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;margin-top:24px">
      <a class="btn btn-blue btn-lg" href="<?php echo esc_url(home_url('/')); ?>">Về trang chủ</a>
      <a class="btn btn-outline btn-lg" href="<?php echo esc_url(home_url('/lien-he/')); ?>">Liên hệ</a>
    </div>
  </div>
</section>
<?php get_footer();
