<?php
/** Tuyển dụng - danh sách tin (CPT itc_job) */
if (!defined('ABSPATH')) exit;
get_header();
itc_page_hero('Tuyển dụng', 'Gia nhập ITC - cùng kiến tạo tương lai cho thế hệ trẻ Việt Nam.', '', true);
$jobs = new WP_Query(['post_type'=>'itc_job','posts_per_page'=>20,'orderby'=>'menu_order date','order'=>'ASC']);
?>
<section class="section">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="kicker">Cơ hội nghề nghiệp</span>
      <h2>Vị trí đang tuyển</h2>
      <p class="lead">ITC luôn chào đón những con người tận tâm, cầu tiến. Bấm vào từng vị trí để xem mô tả chi tiết và ứng tuyển.</p>
    </div>

    <?php if ($jobs->have_posts()) : ?>
    <div class="joblist reveal" data-delay="1">
      <?php while ($jobs->have_posts()) : $jobs->the_post();
        $loc = get_post_meta(get_the_ID(),'_job_loc',true) ?: 'Hưng Yên';
        $type = get_post_meta(get_the_ID(),'_job_type',true);
        $qty = get_post_meta(get_the_ID(),'_job_qty',true); ?>
      <article class="job">
        <div>
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <p style="color:var(--muted);margin:4px 0 10px"><?php echo esc_html(get_the_excerpt()); ?></p>
          <div class="job__meta">
            <span><?php echo itc_icon('compass',15); ?> <?php echo esc_html($loc); ?></span>
            <?php if ($type): ?><span><?php echo itc_icon('shield',15); ?> <?php echo esc_html($type); ?></span><?php endif; ?>
            <?php if ($qty): ?><span><?php echo itc_icon('network',15); ?> <?php echo esc_html($qty); ?> người</span><?php endif; ?>
          </div>
        </div>
        <a class="btn btn-blue" href="<?php the_permalink(); ?>">Xem &amp; ứng tuyển <?php echo itc_icon('arrow',15); ?></a>
      </article>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <?php else : ?>
      <p style="text-align:center;color:var(--muted)">Hiện chưa có vị trí tuyển dụng. Vui lòng quay lại sau hoặc gửi CV về <?php echo esc_html(itc_contact('email')); ?>.</p>
    <?php endif; ?>

    <div class="sidebar__card is-blue reveal" style="margin-top:34px;max-width:880px">
      <h3>Gửi hồ sơ ứng tuyển</h3>
      <p>Gửi CV về email <b><?php echo esc_html(itc_contact('email')); ?></b> hoặc gọi hotline <b><?php echo esc_html(itc_contact('hotline')); ?></b>. ITC sẽ liên hệ lại trong thời gian sớm nhất.</p>
      <a class="btn btn-red" href="mailto:<?php echo esc_attr(itc_contact('email')); ?>">Gửi CV ngay <?php echo itc_icon('arrow',15); ?></a>
    </div>
  </div>
</section>
<?php get_footer();
