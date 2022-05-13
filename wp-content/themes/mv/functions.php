<?php

add_theme_support('post-thumbnails');
// キャッシュ対策する

/**************************************************
CSSファイルの読み込み
**************************************************/
function my_enqueue_styles() {
  wp_enqueue_style('ress', '//unpkg.com/ress/dist/ress.min.css', array(), false, 'all');
  wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css2?family=Crimson+Text:wght@400;700&display=swap', false);
  wp_enqueue_style('swiper', get_theme_file_uri('/styles/vendors/swiper.min.css'), array(), false, 'all');
  wp_enqueue_style('style', get_stylesheet_uri(), array('ress'), false, 'all');
}
add_action('wp_enqueue_scripts', 'my_enqueue_styles');

/**************************************************
JSファイルの読み込み
**************************************************/
function st_enqueue_scripts() {
  wp_enqueue_script('swiper', get_theme_file_uri('/scripts/vendors/swiper.min.js'), array(), false, true);
  wp_enqueue_script('scroll-polyfill', get_theme_file_uri('/scripts/vendors/scroll-polyfill.js'), array(), false, true);
  wp_enqueue_script('gsap', get_theme_file_uri('/scripts/vendors/gsap.min.js'), array(), false, true);
  wp_enqueue_script('menu-open', get_theme_file_uri('/scripts/libs/menu-open.js'), array(), false, true);
  wp_enqueue_script('hero-slider', get_theme_file_uri('/scripts/libs/hero-slider.js'), array(), false, true);
  wp_enqueue_script('text-animation', get_theme_file_uri('/scripts/libs/text-animation.js'), array(), false, true);
  wp_enqueue_script('scroll', get_theme_file_uri('/scripts/libs/scroll.js'), array(), false, true);
  wp_enqueue_script('main', get_theme_file_uri('/scripts/main.js'), array(), false, true);
}
add_action('wp_enqueue_scripts', 'st_enqueue_scripts');

