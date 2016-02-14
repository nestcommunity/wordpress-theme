<?php get_header(); ?>

	<main class="general-page">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="heading">
				<div class="row">
					<div class="columns medium-12">
						<h1><?php the_title(); ?></h1>
					</div>
				</div>
			</div>
			<div class="contents body-text">
				<div class="row">
					<?php the_content(); ?>
				</div>
			</div>
		<?php endwhile; endif; ?>
	</main>

<?php get_footer(); ?>