<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title><?php echo bloginfo('name'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link rel="icon" href="<?php echo esc_url(get_theme_file_uri('images/favicon.ico')); ?>">

    <?php wp_head(); ?>
  </head>

  <body>
    <div class="nav-trigger"></div>
    <header class="header">
      <div class="header__inner appear up">
        <h1 class="site-title item">
          <a href="<?php echo esc_url(home_url()); ?>">
            <img src="<?php echo esc_url(get_theme_file_uri('images/logo.png')); ?>" alt="Mars Vintage">
          </a>
        </h1>
        <nav class="header__nav">
  
          <!-- Mobile -->
          <div class="mobile-logo">
            <img src="<?php echo esc_url(get_theme_file_uri('images/logo.png')); ?>" alt="Mars Vintage">
          </div>
          <ul class="mobile-ul">
            <li><a href="<?php echo esc_url(home_url('/category/products/')); ?>">PRODUCTS</a></li>
            <li><a href="<?php echo esc_url(home_url('/about/')); ?>">ABOUT</a></li>
            <li><a href="<?php echo esc_url(home_url('/company/')); ?>">COMPANY</a></li>
            <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">CONTACT</a></li>
          </ul>
          <ul class="mobile-sns">
            <li><a href="https://twitter.com/" target="_blank" class="twitter icon">Twitter</a></li>
            <li><a href="https://www.facebook.com/" target="_blank" class="facebook icon">Facebook</a></li>
            <li><a href="https://www.instagram.com/" target="_blank" class="instagram icon">Instagram</a></li>
          </ul>
  
          <!-- Desktop -->
          <ul class="header__ul">
            <li class="item"><a href="<?php echo esc_url(home_url('/category/products/')); ?>">PRODUCTS</a></li>
            <li class="item"><a href="<?php echo esc_url(home_url('/about/')); ?>">ABOUT</a></li>
            <li class="item"><a href="<?php echo esc_url(home_url('/company/')); ?>">COMPANY</a></li>
            <li class="item"><a href="<?php echo esc_url(home_url('/contact/')); ?>">CONTACT</a></li>
          </ul>
          <ul class="header__sns">
            <li><a href="https://twitter.com/" target="_blank" class="twitter icon">Twitter</a></li>
            <li><a href="https://www.facebook.com/" target="_blank" class="facebook icon">Facebook</a></li>
            <li><a href="https://www.instagram.com/" target="_blank" class="instagram icon">Instagram</a></li>
          </ul>
        </nav>
        <div class="header__btn">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div id="mask"></div>
      </div>
    </header>