<?php get_header(); ?>

<main class="main">

  <!-- Products -->
  <section id="products" class="products">
    <h2 class="sec-title tween-animate-title"><?php wp_title(''); ?></h2>
    <div class="products__grid">
      <?php if(have_posts()): ?>
        <?php while(have_posts()):the_post(); ?>
          <?php
          $cat = get_the_category();
          $catname = $cat[1]->cat_name;
          ?>
          <div class="products__item">
            <a href="<?php the_permalink(); ?>">
              <div class="cover-slide hover-darken">
                <img class="img-zoom" src="<?php the_post_thumbnail_url('full'); ?>" alt="">
              </div>
              <div class="products__content">
                <p class="products__category"><?php echo $catname; ?></p>
                <p class="products__title"><?php the_title(); ?></p>
                <p class="products__price">&yen;<?php echo esc_html(number_format(get_post_meta($post->ID, 'price', true))); ?> +tax</p>
              </div>
            </a>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>

    <?php
      if (function_exists("pagination")) {
        pagination($wp_query->max_num_pages);
      }
    ?>
  </section>
</main>

<?php get_footer(); ?>