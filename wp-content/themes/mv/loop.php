<?php if(have_posts()): ?>
  <?php while(have_posts()):the_post(); ?>
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
  <?php endwhile; ?>
<?php endif; ?>