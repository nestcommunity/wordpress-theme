<?php
/*
Template Name: Home Page
*/

get_header(); ?>

	<main class="home">
		<div class="page-background home-background"></div>
		<div class="row about contents">
			<div class="columns medium-6">
				<h2>Turning ideas<br/>into action</h2>
			</div>
			<div class="columns medium-6">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<p><?php the_content(); ?></p>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</main>

<?php get_footer(); ?>