  <footer>
    <div class="row">
        <div class="columns medium-2">
            <a href="http://www.port.ac.uk">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/uop-logo.svg" alt="University of Portsmouth" />
            </a>
        </div>
        <div class="columns medium-8">
            <a href="https://www.instagram.com/nestportsmouth/" class="ss-icon ss-instagram"></a>
            <a href="<?php the_field('twitter', 'option'); ?>" class="ss-icon">&#xF611;</a>
            <a href="<?php the_field('facebook', 'option'); ?>" class="ss-icon">&#xF610;</a>
            <p>For inquiries, email <?php the_field('email', 'option'); ?></p>
        </div>
    </div>
  </footer>
  <script src="//code.jquery.com/jquery-2.2.0.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/scripts.min.js" type="text/javascript"></script>
  <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-75376605-1', 'auto');
      ga('send', 'pageview');

  </script>
</body>
  <?php wp_footer(); ?>
  </html>
