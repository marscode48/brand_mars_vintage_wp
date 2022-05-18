<?php get_header(); ?>

<main class="main">
  <div class="page">
    <div class="page__inner">
      <div class="page__img appear right">
        <img class="item" src="<?php the_post_thumbnail_url('full'); ?>" alt="">
      </div>
      <div class="page__text appear left">
        
        <h2 class="page-title item"><?php the_title(); ?></h2>

        <?php the_content(); ?>

      </div>
    </div>
  </div>
</main> 

<?php get_footer(); ?>