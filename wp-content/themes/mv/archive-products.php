<?php get_header(); ?>

<main class="main">

  <!-- Products -->
  <section id="products" class="products">
    <h2 class="sec-title tween-animate-title"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></h2>
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
  </section>
</main>

<?php get_footer(); ?>