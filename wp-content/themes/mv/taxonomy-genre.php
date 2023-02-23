<?php get_header(); ?>

<main class="main">

  <!-- Products -->
  <section id="products" class="products">
    <h2 class="sec-title tween-animate-title"><?php single_term_title(); ?></h2>
    <div class="products__grid">
      <?php if(have_posts()): ?>
        <?php get_template_part('loop'); ?>
      <?php endif; ?>
    </div>

    <?php
      if (function_exists("pagination")) {
        pagination($wp_query->max_num_pages);
      }
    ?>

    <div class="products__btn appear up">
      <a href="<?php echo esc_url(home_url('/products/')); ?>">
        <button class="btn slide-bg item">Back To Products</button>
      </a>
    </div>
  </section>
</main>

<?php get_footer(); ?>