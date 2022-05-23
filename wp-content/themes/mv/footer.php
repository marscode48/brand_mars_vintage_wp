<footer id="footer" class="footer appear up">
      <div class="footer__inner">
        <div class="footer__logo item">
          <a href="#"><img src="<?php echo esc_url(get_theme_file_uri('/images/logo.png')); ?>" alt="Mars Vintage">
          </a>
        </div>
        <nav class="footer__nav">
          <ul class="footer__ul">
            <li class="item"><a href="<?php echo esc_url(home_url('/category/products/')); ?>">PRODUCTS</a></li>
            <li class="item"><a href="<?php echo esc_url(home_url('/about/')); ?>">ABOUT</a></li>
            <li class="item"><a href="<?php echo esc_url(home_url('/company/')); ?>">COMPANY</a></li>
            <li class="item"><a href="<?php echo esc_url(home_url('/contact/')); ?>">CONTACT</a></li>
          </ul>
        </nav>        
      </div>
      <div class="footer__copyright item">
        &copy; <?php echo bloginfo('name'); ?>
      </div>
    </footer>

    <?php wp_footer(); ?>
  </body>
</html>