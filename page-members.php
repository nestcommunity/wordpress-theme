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
				<div class="columns small-10 small-offset-1 end">
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
							<div class="columns medium-3 <?php if ($postCounter == $numberOfPosts) echo 'end'; ?>">
								<?php if (get_post_type() == 'startup'): ?>
									<a class="member company" href="<?php echo get_the_ID(); ?>">
										<?php $logo = get_field('logo'); ?>
										<img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>" />
										<h4><?php the_field('startup_name'); ?></h4>
										<p><?php the_field('short_description'); ?></p>
									</a>
								<?php else: ?>
									<a class="member individual" href="<?php echo get_the_ID(); ?>">
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
			<div class="overlay" style="display: none">
				<div class="overlay-box">
					<a href="#" id="cross">x</a>
					<div class="row">
						<div class="columns medium-3">
							<img src="#" class="image" />
							<div class="row">
								<div class="columns medium-1 facebook-container">
									<a href="#" class="ss-icon facebook">&#xF610;</a>
								</div>
								<div class="columns medium-1 twitter-container">
									<a href="#" class="ss-icon twitter">&#xF611;</a>
								</div>
								<div class="columns medium-1 linkedin-container">
									<a href="#" class="ss-icon linkedin">&#xF612;</a>
								</div>
								<div class="columns end"></div>
							</div>
						</div>
						<div class="columns medium-9">
							<h2 class="overlay-heading">Heading</h2>
							<p class="overlay-description">Description</p>
							<div class="row">
								<div class="columns medium-7 end">
									<a href="#" target="_blank" class="button website">Visit Website</a>
									<div class="contact-details">
										<div class="contact email-container">
											<span class="letter">
												E:
											</span>
											<span class="email"></span>
										</div>
										<div class="contact phone-container">
											<span class="letter">
												T:
											</span>
											<span class="phone"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

<?php get_footer(); ?>