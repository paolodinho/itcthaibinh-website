<?php if (!defined('ABSPATH')) exit; ?>
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

<!-- Topbar -->
<div class="topbar">
  <div class="wrap">
    <div class="topbar__left">
      <span><?php echo itc_icon('compass', 15); ?> <?php echo esc_html(itc_contact('address')); ?></span>
    </div>
    <div class="topbar__right">
      <a href="mailto:<?php echo esc_attr(itc_contact('email')); ?>"><?php echo itc_icon('doc', 15); ?> <?php echo esc_html(itc_contact('email')); ?></a>
      <a class="topbar__call" href="tel:<?php echo esc_attr(itc_contact('hotline_raw')); ?>"><?php echo itc_icon('phone', 15); ?> <?php echo esc_html(itc_contact('hotline')); ?></a>
    </div>
  </div>
</div>

<!-- Header (1 thanh sạch) -->
<header class="site-header">
  <div class="wrap">
    <a class="site-logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr(get_bloginfo('name')); ?> - Trang chủ">
      <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.png'); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" width="124" height="60">
    </a>

    <nav class="primary-nav" id="primary-nav" aria-label="Menu chính">
      <?php
      if (has_nav_menu('primary')) {
          wp_nav_menu(['theme_location' => 'primary', 'container' => false, 'fallback_cb' => 'itc_fallback_menu']);
      } else {
          itc_fallback_menu();
      }
      ?>
    </nav>

    <div class="header-actions">
      <a class="header-hotline" href="tel:<?php echo esc_attr(itc_contact('hotline_raw')); ?>" aria-label="Hotline <?php echo esc_attr(itc_contact('hotline')); ?>">
        <span class="ico"><?php echo itc_icon('phone', 20); ?></span>
      </a>
      <a class="btn btn-red" href="#contact">Đăng ký tư vấn</a>
    </div>

    <button class="nav-toggle" aria-label="Mở menu" aria-controls="primary-nav" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>
  </div>
</header>

<main id="main">
