<?php get_header(); ?>

	<main class="general-page resources-page">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="heading solid">
				<div class="row">
					<div class="columns medium-12">
						<h1><?php the_title(); ?></h1>
					</div>
				</div>
			</div>
			<div class="contents body-text">
				<div class="row">
					<div class="columns medium-8">
						<?php
							$args = array (
									'post_type' => 'resources',
									'posts_per_page' => -1
							);

							$categoryId = get_the_ID();
							$resources = [];


							// The Query
							$theQuery = new WP_Query( $args );

							while ( $theQuery->have_posts() ) {
								$theQuery->the_post();

								if (get_field('category')->ID == $categoryId) {
									$resources[] = $theQuery->post;
								}
							}

						$numResources = count($resources);
							$count = 0;
						?>
						<?php foreach ($resources as $resource): setup_postdata( $GLOBALS['post'] =& $resource ); $count++;  ?>
							<div class="resource row">
								<div class="columns medium-2">
									<?php $image = get_field('image'); if (!empty($image)): ?>
										<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
									<?php endif;?>
								</div>
								<div class="columns medium-10">
									<h4><?php the_title(); ?></h4>
									<p><?php the_field('description'); ?></p>
									<a href="<?php the_field('link'); ?>" target="_blank" class="button">Visit Website</a>
								</div>
							</div>
							<?php if ($count != $numResources): ?>
								<div class="line"></div>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				    <?php wp_reset_postdata(); ?>
					<div class="columns medium-4">
						<h3>Our Advice</h3>
						<p><?php the_field('our_advice'); ?></p>
					</div>
				</div>
			</div>
		<?php endwhile; endif; ?>
	</main>

<?php get_footer(); ?>