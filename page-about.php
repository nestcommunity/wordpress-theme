<?php
/*
Template Name: About Page
*/

get_header(); ?>

	<main class="home">
		<div class="page-background about-background"></div>
		<?php while ( have_rows('sections') ) : the_row(); ?>
			<div class="row about contents">
				<div class="columns large-6 charlottely-headings">
					<h3><?php the_sub_field('heading'); ?></h3>
				</div>
				<div class="columns large-6 body-text">
					<p><?php the_sub_field('contents'); ?></p>
				</div>
			</div>
		<?php endwhile; ?>
	</main>

<?php get_footer(); ?>