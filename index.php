<?php
/** Fallback: blog index / archive / search / category */
if (!defined('ABSPATH')) exit;
get_header();

if (is_search()) { $title = 'Kết quả tìm kiếm'; $sub = 'Từ khóa: “' . esc_html(get_search_query()) . '”'; }
elseif (is_category() || is_tag() || is_tax()) { $title = single_term_title('', false); $sub = 'Tin tức – Sự kiện ITC Thái Bình'; }
elseif (is_archive()) { $title = get_the_archive_title(); $sub = ''; }
else { $title = 'Tin tức – Sự kiện'; $sub = 'Cập nhật mới nhất về du học, học bổng và hoạt động của ITC.'; }
itc_page_hero($title, $sub, '', true);
?>
<section class="section">
  <div class="wrap">
    <div class="catbar reveal">
      <a class="catbar__chip<?php echo (is_home()||is_page('tin-tuc-su-kien'))?' is-active':''; ?>" href="<?php echo esc_url(home_url('/tin-tuc-su-kien/')); ?>">Tất cả</a>
      <?php
      $qcat = is_category() ? get_queried_object_id() : 0;
      foreach (get_categories(['hide_empty'=>true,'exclude'=>get_cat_ID('Uncategorized')]) as $c)
        printf('<a class="catbar__chip%s" href="%s">%s <span>%d</span></a>',
          ($c->term_id==$qcat?' is-active':''), esc_url(get_category_link($c->term_id)), esc_html($c->name), $c->count);
      ?>
    </div>

    <?php if (have_posts()) : ?>
      <div class="posts">
        <?php $d=0; while (have_posts()) : the_post(); $cat = itc_post_cat(); ?>
          <article class="pcard reveal" data-delay="<?php echo ($d++%3); ?>">
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
      <div class="pagination"><?php echo paginate_links(['prev_text'=>'‹','next_text'=>'›']); ?></div>
    <?php else : ?>
      <p style="text-align:center;color:var(--muted)">Không tìm thấy bài viết nào.</p>
    <?php endif; ?>
  </div>
</section>
<?php get_footer();
