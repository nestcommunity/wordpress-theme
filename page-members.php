<?php
/*
Template Name: Members Page
*/

get_header(); ?>

	<main class="members general-page">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="heading">
				<div class="row">
					<div class="columns medium-12">
						<h1><?php the_field('page_heading'); ?></h1>
						<h2><?php the_field('sub-heading'); ?></h2>
					</div>
				</div>
			</div>
		<?php endwhile; endif; ?>
		<div class="contents">
			<div class="row selector">
				<div class="columns medium-offset-4 medium-2 company-selector active">
					Companies
				</div>
				<div class="columns medium-2 end individual-selector active">
					Individuals
				</div>
			</div>
			<div class="row">
				<div class="columns medium-10 medium-offset-1 end">
					<div class="row">
						<?php
						$args = array (
								'post_type' => ['startup', 'member'],
								'orderby' => 'rand'
						);

						// The Query
						$theQuery = new WP_Query( $args );
						$postCounter = 0;
						$numberOfPosts = sizeof($theQuery->posts);
						?>
						<?php while ( $theQuery->have_posts() ) : $theQuery->the_post(); ?>
							<?php $postCounter++; ?>
							<div class="columns large-3 <?php if ($postCounter == $numberOfPosts) echo 'end'; ?>">
								<?php if (get_post_type() == 'startup'): ?>
									<a class="member company" href="#">
										<?php $logo = get_field('logo'); ?>
										<img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>" />
										<h4><?php the_field('startup_name'); ?></h4>
										<p><?php the_field('short_description'); ?></p>
									</a>
								<?php else: ?>
									<a class="member individual" href="#">
										<?php $profileImage = get_field('profile_image'); ?>
										<img src="<?php echo $profileImage['url'] ?>" alt="<?php echo $profileImage['alt'] ?>" />
										<h4><?php the_field('first_name'); ?> <?php the_field('last_name'); ?></h4>
										<p><?php the_field('short_bio'); ?></p>
									</a>
								<?php endif; ?>
							</div>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div>
	</main>

<?php get_footer(); ?>