<?php
/** Bài viết đơn */
if (!defined('ABSPATH')) exit;
get_header();
$img = get_template_directory_uri() . '/assets/images';
while (have_posts()) : the_post();
  itc_page_hero(get_the_title());
?>
<section class="section single">
  <div class="wrap">
    <div class="prose" style="margin-inline:auto">
      <div class="post-meta">
        <span><?php echo itc_icon('doc',15); ?> <?php echo get_the_date('d/m/Y'); ?></span>
        <span><?php echo itc_icon('thumb',15); ?> <?php the_author(); ?></span>
        <?php $cats=get_the_category(); if($cats): ?><span><?php echo itc_icon('compass',15); ?> <?php echo esc_html($cats[0]->name); ?></span><?php endif; ?>
      </div>
    </div>
    <?php if (has_post_thumbnail()) : ?>
    <div class="post-thumb"><?php the_post_thumbnail('large'); ?></div>
    <?php endif; ?>
    <div class="prose" style="margin-inline:auto"><?php the_content(); ?></div>
    <div class="prose" style="margin-inline:auto;margin-top:30px">
      <a class="btn btn-outline" href="<?php echo esc_url(home_url('/tin-tuc-su-kien/')); ?>"><?php echo itc_icon('arrow',15); ?> Về trang Tin tức</a>
    </div>
  </div>
</section>

<?php
$__catids = wp_get_post_categories(get_the_ID());
$rel = new WP_Query(['post_type'=>'post','posts_per_page'=>3,'post__not_in'=>[get_the_ID()],
  'orderby'=>'date','order'=>'DESC','category__in'=>$__catids ?: [0]]);
if (!$rel->have_posts()) // không đủ bài cùng danh mục → lấy bài mới nhất
  $rel = new WP_Query(['post_type'=>'post','posts_per_page'=>3,'post__not_in'=>[get_the_ID()],'orderby'=>'date','order'=>'DESC']);
if ($rel->have_posts()) : ?>
<section class="section section--alt">
  <div class="wrap">
    <div class="section-head section-head--center"><span class="kicker">Đọc thêm</span><h2>Bài viết liên quan</h2></div>
    <div class="posts">
      <?php while ($rel->have_posts()) : $rel->the_post(); ?>
      <article class="pcard">
        <a class="pcard__media" href="<?php the_permalink(); ?>">
          <img src="<?php echo esc_url(itc_post_image_url()); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
        </a>
        <div class="pcard__body">
          <span class="pcard__date"><?php echo get_the_date('d/m/Y'); ?></span>
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        </div>
      </article>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</section>
<?php endif; ?>
<?php endwhile; itc_cta_band(); get_footer();
