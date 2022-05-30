<?php get_header(); ?>

<main class="main">
  <!-- メインビジュアル -->
  <div class="mainvisual">
    <img src="<?php echo esc_url(get_theme_file_uri('/images/mainvisual1.jpg')); ?>" alt="" class="fade-slide">
    <img src="<?php echo esc_url(get_theme_file_uri('/images/mainvisual2.jpg')); ?>" alt="" class="fade-slide">
    <img src="<?php echo esc_url(get_theme_file_uri('/images/mainvisual3.jpg')); ?>" alt="" class="fade-slide">
  </div>

  <!-- New Arrival -->
  <section id="arrival" class="arrival">
    <h2 class="sec-title tween-animate-title">NEW ARRIVAL</h2>

    <!-- swiper.js-->
    <div class="swiper">
      <div class="swiper-wrapper">
        <?php
          $args = array(
            'post_type' => 'products',
            'posts_per_page' => 5
          );
        ?>
        <?php $posts = get_posts($args); ?>
        <?php foreach($posts as $post): ?>
          <?php setup_postdata($post); ?>
          <div class="swiper-slide">
            <img src="<?php the_post_thumbnail_url('full'); ?>" alt="ピックアップ">
          </div>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </div>
  </section>

  <!-- Products -->
  <section id="products" class="products">
    <h2 class="sec-title tween-animate-title">PRODUCTS</h2>

    <div class="products__grid">
      <?php
        $args = array(
          'post_type' => 'products',
          'posts_per_page' => 6
        );
      ?>
      <?php $posts = get_posts($args); ?>
      <?php foreach($posts as $post): ?>
        <?php setup_postdata($post); ?>
        <?php $term = get_the_terms($post->ID, 'genre'); ?>
        <div class="products__item">
          <a href="<?php the_permalink(); ?>">
            <div class="cover-slide hover-darken">
              <img class="img-zoom" src="<?php the_post_thumbnail_url('full'); ?>" alt="">
            </div>
            <div class="products__content">
              <?php if($term): ?>
              <p class="products__category"><?php echo esc_html($term[0]->name); ?></p>
              <?php endif; ?>
              <p class="products__title"><?php the_title(); ?></p>
              <p class="products__price">&yen;<?php echo esc_html(number_format(get_post_meta($post->ID, 'price', true))); ?> +tax</p>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
      <?php wp_reset_postdata(); ?>
    </div>

    <div class="products__btn appear up">
      <a href="<?php echo esc_url(home_url('/products/')); ?>">
        <button class="btn cover-3d item">
          <span>
            View More
          </span>
        </button>
      </a>
    </div>
  </section>
</main>

<?php get_footer(); ?>