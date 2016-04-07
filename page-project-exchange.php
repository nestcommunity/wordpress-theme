<?php
/*
Template Name: Project Exchange Page
*/

get_header(); ?>

	<main class="resources-page general-page">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="heading">
				<div class="row">
					<div class="columns medium-12">
						<h1><?php the_field('page_heading'); ?></h1>
						<h2><?php the_field('sub-heading'); ?></h2>
					</div>
				</div>
			</div>
			<div class="contents body-text">
				<div class="row">
					<div class="columns medium-8">
						<?php
						$args = array (
							'post_type' => 'project-exchange',
							'posts_per_page' => -1
						);

						$projects = [];

						// The Query
						$theQuery = new WP_Query( $args );

						while ( $theQuery->have_posts() ) {
							$theQuery->the_post();
							$projects[] = $theQuery->post;
						}

						$numProjects = count($projects);
						$count = 0;
						?>
						<?php if ($numProjects == 0): ?>
							<p>Sorry, there aren't any projects listed at the moment.</p>
						<?php endif; ?>
						<?php foreach ($projects as $project): setup_postdata( $GLOBALS['post'] =& $project ); $count++;  ?>
							<div class="resource row">
								<div class="columns medium-2">
									<?php $image = get_field('image'); if (!empty($image)): ?>
										<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
									<?php endif;?>
								</div>
								<div class="columns medium-10">
									<h4><?php the_title(); ?></h4>
									<p><?php the_content(); ?></p>
								</div>
							</div>
							<?php if ($count != $numProjects): ?>
								<div class="line"></div>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
					<?php wp_reset_postdata(); ?>
					<div class="columns medium-4">
						<h3>Post a Project</h3>
						<p><?php the_field('sidebar_description'); ?></p>
						<a href="mailto:nest@port.ac.uk" target="_blank" class="button project-exchange">Post Project</a>
					</div>
				</div>
			</div>
		<?php endwhile; endif; ?>
	</main>

<?php get_footer(); ?>