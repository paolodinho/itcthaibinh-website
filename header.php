<?php if (!defined('ABSPATH')) exit;
$tel  = esc_attr(itc_contact('hotline_raw'));
$hot  = esc_html(itc_contact('hotline'));
$fb   = itc_contact('fb_duhoc');
$zalo = itc_contact('zalo');
$logo = get_template_directory_uri() . '/assets/images/logo.png';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main">Bỏ qua tới nội dung chính</a>

<header class="twn-head">
  <!-- Topbar: logo + hotline box + socials + CTA + search -->
  <div class="twn-top">
    <div class="wrap twn-top__in">
      <a class="twn-logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr(get_bloginfo('name')); ?> - Trang chủ">
        <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" width="120" height="54">
      </a>

      <a class="twn-top__phone twn-top__zalo" href="<?php echo esc_url($zalo); ?>" target="_blank" rel="noopener" aria-label="Chat Zalo <?php echo $hot; ?>">
        <span class="ic">Z</span>
        <span><small>Chat Zalo tư vấn</small><?php echo $hot; ?></span>
      </a>

      <div class="twn-socials">
        <?php if ($fb): ?><a href="<?php echo esc_url($fb); ?>" target="_blank" rel="noopener" aria-label="Facebook"><?php echo itc_icon('thumb', 17); ?></a><?php endif; ?>
        <a href="tel:<?php echo $tel; ?>" aria-label="Gọi <?php echo $hot; ?>"><?php echo itc_icon('phone', 17); ?></a>
      </div>

      <a class="twn-btn twn-btn--red" href="<?php echo esc_url(home_url('/lien-he/')); ?>">Đăng ký tư vấn</a>
      <span class="twn-search" aria-hidden="true"><?php echo itc_icon('compass', 18); ?></span>

      <button class="twn-toggle nav-toggle" aria-label="Mở menu" aria-controls="primary-nav" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>

  <!-- Nav pill navy (sticky) -->
  <div class="twn-navwrap">
    <div class="wrap">
      <nav class="twn-nav" id="primary-nav" aria-label="Menu chính">
        <?php
        if (has_nav_menu('primary')) {
            wp_nav_menu(['theme_location' => 'primary', 'container' => false, 'fallback_cb' => 'itc_fallback_menu']);
        } else {
            itc_fallback_menu();
        }
        ?>
      </nav>
    </div>
  </div>
</header>

<main id="main">
