<?php require_once('htmlHeader.php') ?>
<div class="header">
  <div class="row">
    <div class="medium-2 columns">
      <a href="/"><h1 class="logo logo--black">nest</h1></a>
    </div>
    <div class="medium-10 columns">
      <?php wp_nav_menu( array(
            'theme_location' => 'top-menu',
            'container' => false,
            'items_wrap' => '<ul class="menu">%3$s</ul>',
          )
      ); ?>
    </div>
  </div>
</div>
