<?php
/** Tin tức – Sự kiện (liệt kê bài viết + lọc danh mục) - layout 2 cột kiểu sharingtaiwan */
if (!defined('ABSPATH')) exit;
get_header();
itc_diag_hero('Tin tức – Sự kiện', 'about-wide.jpg');
$paged = max(1, get_query_var('paged'), get_query_var('page'));
$q = new WP_Query(['post_type'=>'post','posts_per_page'=>8,'paged'=>$paged,'ignore_sticky_posts'=>true]);
?>
<section class="section">
  <div class="wrap page-layout">
    <main>
      <!-- Lọc danh mục -->
      <div class="catbar reveal">
        <a class="catbar__chip is-active" href="<?php echo esc_url(home_url('/tin-tuc-su-kien/')); ?>">Tất cả</a>
        <?php
        $cats = get_categories(['hide_empty'=>true, 'exclude'=>get_cat_ID('Uncategorized')]);
        foreach ($cats as $c) printf('<a class="catbar__chip" href="%s">%s <span>%d</span></a>',
          esc_url(get_category_link($c->term_id)), esc_html($c->name), $c->count);
        ?>
      </div>

      <?php if ($q->have_posts()) : ?>
      <div class="posts">
        <?php $d=0; while ($q->have_posts()) : $q->the_post(); $cat = itc_post_cat(); ?>
        <article class="pcard reveal" data-delay="<?php echo ($d++%2); ?>">
          <a class="pcard__media" href="<?php the_permalink(); ?>">
            <img src="<?php echo esc_url(itc_post_image_url()); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
            <?php if ($cat) : ?><span class="pcard__cat"><?php echo esc_html($cat->name); ?></span><?php endif; ?>
          </a>
          <div class="pcard__body">
            <span class="pcard__date"><?php echo get_the_date('d/m/Y'); ?></span>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php echo esc_html(get_the_excerpt()); ?></p>
            <a class="pcard__more" href="<?php the_permalink(); ?>">Đọc tiếp <?php echo itc_icon('arrow',14); ?></a>
          </div>
        </article>
        <?php endwhile; ?>
      </div>
      <div class="pagination"><?php echo paginate_links(['total'=>$q->max_num_pages,'current'=>$paged,'prev_text'=>'‹','next_text'=>'›']); ?></div>
      <?php wp_reset_postdata(); else : ?>
        <p style="text-align:center;color:var(--muted)">Chưa có bài viết nào. Nội dung đang được cập nhật.</p>
      <?php endif; ?>
    </main>
    <?php itc_page_sidebar('', true); ?>
  </div>
</section>
<?php itc_cta_band(); get_footer();
