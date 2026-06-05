<?php
/**
 * Template trang mặc định
 */
if (!defined('ABSPATH')) exit;
get_header();
while (have_posts()) : the_post();
  itc_page_hero(get_the_title());
?>
<section class="section">
  <div class="wrap">
    <div class="page-layout">
      <div class="prose reveal">
        <?php
        $c = trim(get_the_content());
        if ($c !== '') the_content();
        else echo '<p>Nội dung đang được cập nhật. Vui lòng liên hệ ITC để được tư vấn chi tiết.</p>';
        ?>
      </div>
      <?php itc_page_sidebar(get_post_field('post_name')); ?>
    </div>
  </div>
</section>
<?php
endwhile;
itc_cta_band();
get_footer();
