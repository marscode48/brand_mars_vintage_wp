<?php

/**************************************************
タイトルタグ、サムネイル画像を出力
**************************************************/ 
function setup_my_theme() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
}
add_action( 'after_setup_theme', 'setup_my_theme');

/**************************************************
カスタム投稿タイプの追加
**************************************************/
function add_custom_post_type() {
  register_post_type('products', [
    'label' => 'PRODUCTS',
    'public' => true,
    'has_archive' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-store',
    'show_in_rest' => true,
    'supports' => ['thumbnail', 'title', 'editor']
    ]
  );
}
add_action('init', 'add_custom_post_type');

/**************************************************
カスタムタクソノミーの追加
**************************************************/
function add_custom_taxonomy() {
  register_taxonomy('genre', 'products', [
    'label' => 'カテゴリー',
    'hierarchical' => true,
    'show_in_rest' => true,
    // 'rewrite' => array('slug' => 'products'),
    ]
  );
}
add_action('init', 'add_custom_taxonomy');


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

/**************************************************
タイトルを区切り文字に書き換え
**************************************************/
function rewrite_separator($separator) {
  $separator = '|';
  return $separator;
}
add_filter('document_title_separator', 'rewrite_separator');

/**************************************************
ページネーション
**************************************************/
function pagination($pages = '', $range = 2) {
  $showitems = ($range * 2) + 1;

  // 現在のページ数
  global $paged;
  if(empty($paged)) {
    $paged = 1;
  }

  // 全ページ数
  if($pages == '') {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if(!$pages) {
      $pages = 1;
    }
  }

  // ページ数が2ぺージ以上の場合のみ、ページネーションを表示
  if(1 != $pages) {
    echo '<div class="pagination">';
    echo '<ul class="appear up">';
    // 1ページ目でなければ、「前のページ」リンクを表示
    if($paged > 1) {
      echo '<li class="prev item"><a href="' . esc_url(get_pagenum_link($paged - 1)) . '">BACK</a></li>';
    }

    // ページ番号を表示（現在のページはリンクにしない）
    for ($i=1; $i <= $pages; $i++) {
      if (1 != $pages &&(!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
        if ($paged == $i) {
          echo '<li class="active item">' .$i. '</li>';
        } else {
          echo '<li class="item"><a href="' . esc_url(get_pagenum_link($i)) . '">' .$i. '</a></li>';
        }
      }
    }

    // 最終ページでなければ、「次のページ」リンクを表示
    if ($paged < $pages) {
      echo '<li class="next item"><a href="' . esc_url(get_pagenum_link($paged + 1)) . '">NEXT</a></li>';
    }
    echo '</ul>';
    echo '</div>';
  }
}