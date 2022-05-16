<?php get_header(); ?>

<main class="main">
  <div class="article">
    <?php if(have_posts()): ?>
      <?php while(have_posts()):the_post(); ?>
        <div class="article__inner">
          <div class="article__img appear right">
            <img class="item" src="<?php the_post_thumbnail_url('full'); ?>" alt="">
          </div>
          <div class="article__text appear left">
            <h2 class="page-title item"><?php the_title(); ?></h2>
            <div class="article__description item">
              <?php the_content(); ?>
              <p>&yen;<?php echo esc_html(number_format(get_post_meta(get_the_ID(), 'price', 'true'))); ?> +tax</p>
              <dl class="article__dl">
                <dt>SIZE：</dt>
                <dd><?php echo esc_html(get_post_meta(get_the_ID(), 'size', true)); ?></dd>
                <dt>COLOR：</dt>
                <dd><?php echo esc_html(get_post_meta(get_the_ID(), 'color', true)); ?></dd>
              </dl>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
    <div class="article__btn appear up">
      <a href="<?php echo esc_url(home_url('/category/products/')); ?>">
        <button class="btn slide-bg item">Back To Products</button>
      </a>
    </div>
  </div>
</main>

<?php get_footer(); ?>