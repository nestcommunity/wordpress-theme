<?php
/*
Template Name: Home Page
*/

get_header(); ?>

	<main class="home">
		<div class="page-background home-background"></div>
		<div class="row about contents">
			<div class="columns medium-6 charlottely-headings">
				<h2>Turning ideas<br/>into action</h2>
			</div>
			<div class="columns medium-6 body-text">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</main>

<?php get_footer(); ?>