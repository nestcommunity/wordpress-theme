<?php require_once('htmlHeader.php') ?>
<div class="header">
    <a href="/"><h1 class="logo logo--black">nest</h1></a>
    <?php wp_nav_menu( array(
          'theme_location' => 'top-menu',
          'container' => false,
          'items_wrap' => '<ul class="menu">%3$s</ul>',
        )
    ); ?>
</div>
