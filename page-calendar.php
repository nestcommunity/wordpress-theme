<?php
/*
Template Name: Calendar Page
*/

$args = array (
		'post_type' => 'event',
		'order' => 'ASC',
		'meta_key' => 'date',
		'orderby' => 'meta_value_num',
		'posts_per_page' => -1,
);

// The Query
$theQuery = new WP_Query( $args );
$postCounter = 0;
$numberOfPosts = sizeof($theQuery->posts);
$previousMonth = '';

get_header(); ?>

	<main class="home">
		<div class="page-background event-background"></div>
		<div class="calendar contents">
			<?php if (get_field('featured_event') == 'yes'): ?>
				<div class="row featured">
					<div class="columns medium-8 medium-offset-2 ends">
						<h1>Featured Event</h1>
						<h2><?php echo DateTime::createFromFormat('Ymd', get_field('date'))->format('F Y'); ?></h2>
						<img src="<?php echo get_field('image')['url']; ?>" />
						<?php the_field('description'); ?>
					</div>
					<div class="row">
						<div class="columns medium-4 medium-offset-4 end">
							<a href="<?php the_field('link'); ?>" class="button">Find out More</a>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<div class="row">
				<div class="columns medium-8 medium-offset-2 ends">
					<h1>Upcoming Events</h1>
					<?php while ( $theQuery->have_posts() ) : $theQuery->the_post(); ?>
						<?php
							$date = DateTime::createFromFormat('Ymd', get_field('date'));
							$currentDate = new DateTime();
							if ($previousMonth != $date->format('F Y')):
						?>
								<div class="month-divider"><?php echo $date->format('F Y'); ?></div>
						<?php else: ?>
							<div class="row">
								<div class="columns medium-8 medium-offset-2 end">
									<div class="line"></div>
								</div>
							</div>
						<?php endif;
							$previousMonth = $date->format('F Y');
						?>
						<div class="calendar-item">
							<h3><?php the_title(); ?></h3>
							<div class="row details">
								<div class="columns medium-2 medium-offset-3">
									<?php echo $date->format('j F Y'); ?>
								</div>
								<div class="columns medium-2">
									<?php the_field('time'); ?>
								</div>
								<div class="columns medium-2 end">
									<?php the_field('location'); ?>
								</div>
							</div>
							<div class="row">
								<div class="columns medium-8 medium-offset-2 end">
									<p><?php the_content(); ?></p>
								</div>
							</div>
							<?php if (get_field('button_text') != ''):
								$link = get_field('button_link');
								if (get_field('button_should_email') == 'yes') {
									$eventName = get_the_title();
									$date = $date->format('j F Y');
									$body = "Event Name: $eventName \nDate: $date \n\nStudent Number:\nName:";
									$body = urlencode($body);
									$link = "mailto:enterprise@port.ac.uk?subject=Register - $eventName&body=$body";
								}
								?>
								<div class="row">
									<div class="columns medium-4 medium-offset-4 end">
										<a href="<?php echo $link; ?>" class="button"><?php the_field('button_text'); ?></a>
									</div>
								</div>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</main>

<?php get_footer(); ?>