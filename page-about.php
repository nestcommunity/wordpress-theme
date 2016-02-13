<?php
/*
Template Name: About Page
*/

get_header(); ?>

	<main class="home">
		<div class="page-background about-background"></div>
		<div class="row about contents">
			<?php while ( have_rows('sections') ) : the_row(); ?>
				<div class="columns medium-6 charlottely-headings">
					<h3><?php the_sub_field('heading'); ?></h3>
				</div>
				<div class="columns medium-6 body-text">
					<p><?php the_sub_field('contents'); ?></p>
				</div>
			<?php endwhile; ?>
		</div>
	</main>

<?php get_footer(); ?>