<?php
/** Chi tiết tin tuyển dụng */
if (!defined('ABSPATH')) exit;
get_header();
while (have_posts()) : the_post();
  itc_page_hero(get_the_title(), '', '', true);
  $loc = get_post_meta(get_the_ID(),'_job_loc',true) ?: 'Hưng Yên';
  $type = get_post_meta(get_the_ID(),'_job_type',true);
  $salary = get_post_meta(get_the_ID(),'_job_salary',true);
  $qty = get_post_meta(get_the_ID(),'_job_qty',true);
  $deadline = get_post_meta(get_the_ID(),'_job_deadline',true);
  $subject = rawurlencode('Ứng tuyển: ' . get_the_title());
?>
<section class="section">
  <div class="wrap">
    <div class="page-layout">
      <article class="prose reveal">
        <?php $c = trim(get_the_content()); if ($c) the_content(); else echo '<p>Mô tả công việc đang được cập nhật. Vui lòng liên hệ ITC để biết thêm chi tiết.</p>'; ?>
        <p style="margin-top:30px">
          <a class="btn btn-red btn-lg" href="mailto:<?php echo esc_attr(itc_contact('email')); ?>?subject=<?php echo $subject; ?>">Ứng tuyển vị trí này <?php echo itc_icon('arrow',16); ?></a>
        </p>
      </article>
      <aside class="sidebar">
        <div class="sidebar__card">
          <h3>Thông tin tuyển dụng</h3>
          <ul class="ticks" style="display:grid;gap:12px">
            <li><?php echo itc_icon('compass',18); ?> <span><b>Địa điểm:</b> <?php echo esc_html($loc); ?></span></li>
            <?php if ($type): ?><li><?php echo itc_icon('shield',18); ?> <span><b>Hình thức:</b> <?php echo esc_html($type); ?></span></li><?php endif; ?>
            <?php if ($salary): ?><li><?php echo itc_icon('medal',18); ?> <span><b>Mức lương:</b> <?php echo esc_html($salary); ?></span></li><?php endif; ?>
            <?php if ($qty): ?><li><?php echo itc_icon('network',18); ?> <span><b>Số lượng:</b> <?php echo esc_html($qty); ?> người</span></li><?php endif; ?>
            <?php if ($deadline): ?><li><?php echo itc_icon('doc',18); ?> <span><b>Hạn nộp:</b> <?php echo esc_html($deadline); ?></span></li><?php endif; ?>
          </ul>
        </div>
        <div class="sidebar__card is-blue">
          <h3>Cách ứng tuyển</h3>
          <p>Gửi CV về email hoặc gọi hotline, ITC sẽ liên hệ lại sớm.</p>
          <a class="btn btn-red" style="width:100%;justify-content:center;margin-bottom:10px" href="mailto:<?php echo esc_attr(itc_contact('email')); ?>?subject=<?php echo $subject; ?>">Gửi CV ứng tuyển</a>
          <a class="btn btn-ghost" style="width:100%;justify-content:center" href="tel:<?php echo esc_attr(itc_contact('hotline_raw')); ?>"><?php echo itc_icon('phone',16); ?> <?php echo esc_html(itc_contact('hotline')); ?></a>
        </div>
        <?php itc_page_sidebar('tuyen-dung'); ?>
      </aside>
    </div>
  </div>
</section>
<?php
// Vị trí khác
$other = new WP_Query(['post_type'=>'itc_job','posts_per_page'=>3,'post__not_in'=>[get_the_ID()],'orderby'=>'rand']);
if ($other->have_posts()) : ?>
<section class="section section--alt">
  <div class="wrap">
    <div class="section-head section-head--center"><span class="kicker">Cơ hội khác</span><h2>Vị trí đang tuyển khác</h2></div>
    <div class="joblist" style="margin-inline:auto">
      <?php while ($other->have_posts()) : $other->the_post(); ?>
      <article class="job">
        <div><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <p style="color:var(--muted);margin-top:4px"><?php echo esc_html(get_the_excerpt()); ?></p></div>
        <a class="btn btn-blue" href="<?php the_permalink(); ?>">Xem chi tiết <?php echo itc_icon('arrow',15); ?></a>
      </article>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</section>
<?php endif; ?>
<?php endwhile; itc_cta_band('Chưa tìm thấy vị trí phù hợp?', 'Gửi CV của bạn về ITC, chúng tôi sẽ liên hệ khi có vị trí phù hợp.'); get_footer();
