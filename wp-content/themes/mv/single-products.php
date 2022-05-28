<?php get_header(); ?>

<main class="main">
  <div class="article">
    <?php if(have_posts()): ?>
      <?php while(have_posts()):the_post(); ?>
        <?php 
          $terms = get_the_terms($post->ID, 'genre');
          $prev_post = get_previous_post();
          $next_post = get_next_post();
        ?>
        <div class="article__inner">
          <div class="article__img appear right">
            <img class="item" src="<?php the_post_thumbnail_url('full'); ?>" alt="">
          </div>
          <div class="article__text appear left">
            <ul class="article__cat item">
              <li><a href="<?php echo esc_url(home_url()); ?>">TOP</a></li>
              <li><span>&gt;</span><a href="<?php echo esc_url(home_url('/products/')); ?>">PRODUCTS</a></li>
              <?php if($terms): ?>
                <?php
                  foreach($terms as $term) {
                  echo '<li><span>&gt;</span><a href="' . get_term_link($term->slug, 'genre') .'">' . $term->name . '</a></li>';
                  }
                ?>
              <?php endif; ?>
            </ul>
            <h2 class="page-title item"><?php the_title(); ?></h2>
            <div class="article__description item">
              <?php the_content(); ?>
              <p>&yen;<?php echo esc_html(number_format(get_post_meta(get_the_ID(), 'price', 'true'))); ?> +tax</p>
              <dl class="article__dl">
                <dt>SIZE：</dt>
                <dd><?php echo esc_html(get_post_meta(get_the_ID(), 'size', true)); ?></dd>
                <dt>COLOR：</dt>
                <dd><?php echo esc_html(get_post_meta(get_the_ID(), 'color', true)); ?></dd>
                <dt>FOR：</dt>
                <dd><?php echo esc_html(get_post_meta(get_the_ID(), 'gender', true)); ?></dd>
              </dl>
              <?php if($prev_post || $next_post): ?>
                <nav class="article__nav">
                <?php if($prev_post):?>
                  <a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="prev-link">
                  <span>NEXT&nbsp;&rsaquo;&rsaquo;</span><br/>
                  <?php echo get_the_title( $prev_post->ID ); ?>
                  </a>
                <?php endif; ?>
                <?php if($next_post):?>
                  <a href="<?php echo get_permalink( $next_post->ID ); ?>" class="next-link">
                    <span>&lsaquo;&lsaquo;&nbsp;BACK</span><br/>
                    <?php echo get_the_title( $next_post->ID ); ?>
                  </a>
                <?php endif; ?>
                </nav>
              <?php endif; ?>
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