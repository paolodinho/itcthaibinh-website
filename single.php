<?php
/** Bài viết đơn - layout 2 cột (nội dung + sidebar) kiểu sharingtaiwan */
if (!defined('ABSPATH')) exit;
get_header();
while (have_posts()) : the_post();
  $cover = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : itc_post_image_url();
  itc_diag_hero(get_the_title(), $cover);
?>
<section class="section">
  <div class="wrap page-layout">
    <main class="single">
      <div class="post-meta">
        <span><?php echo itc_icon('doc',15); ?> <?php echo get_the_date('d/m/Y'); ?></span>
        <span><?php echo itc_icon('thumb',15); ?> <?php the_author(); ?></span>
        <?php $cats=get_the_category(); if($cats): ?><span><?php echo itc_icon('compass',15); ?> <a href="<?php echo esc_url(get_category_link($cats[0]->term_id)); ?>"><?php echo esc_html($cats[0]->name); ?></a></span><?php endif; ?>
      </div>
      <?php if (has_post_thumbnail()) : ?>
      <div class="post-thumb"><?php the_post_thumbnail('large'); ?></div>
      <?php endif; ?>
      <div class="prose"><?php the_content(); ?></div>
      <div class="prose" style="margin-top:30px">
        <a class="btn btn-outline" href="<?php echo esc_url(home_url('/tin-tuc-su-kien/')); ?>"><?php echo itc_icon('arrow',15); ?> Về trang Tin tức</a>
      </div>
    </main>
    <?php itc_page_sidebar('', true); ?>
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
