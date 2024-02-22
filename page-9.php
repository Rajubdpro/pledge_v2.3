<?php
	/**
	 * The template for displaying the dashboard
	 *
	 * @package WordPress
	 * @subpackage Pledge Sports
	 * @since Pledge Sports 2.2
	 */
	get_header(); 
	$message = "";
	if (isset($_GET['updated'])) {
		if ($_GET['updated'] == true ) {
			$message = "Your project have been updated";
		}
	}
?>


<article id="content">
	<div id="post-9" class="post-9 page type-page status-publish hentry">
		<div class="entry-content">
			<div class="memberdeck">
				<ul class="dashboardmenu">
					<?php
						$dashboard = array(
							'theme_location' => 'dashboard',
							'menu' => '',
							'container' => false,
							'container_class' => '',
							'container_id' => '',
							'menu_class' => '',
							'menu_id' => '',
							'echo' => true,
							'fallback_cb' => 'wp_page_menu',
							'before' => '',
							'after' => '',
							'link_before' => '',
							'link_after' => '',
							'items_wrap' => '%3$s',
							'depth' => 0,
							'walker' => ''
						);
						
						wp_nav_menu($dashboard);
					?>
				</ul>
		
				<ul class="md-box-wrapper full-width cf">
					<li class="md-box full">
						<div class="md-profile dash_project">
							<?php if ($message != ""): ?>
								<aside class="message_box">
									<p><?= $message ?></p>
								</aside>
							<?php endif; ?>
							<ul>
								<?php 
									$args = array(
										'post_type'=> array('projects'),
										'post_status' => array(        
											'publish', // - a published post or page.
											'pending',  // - post is pending review.
											'draft', // - a post in draft status.
											//'auto-draft', // - a newly created post, with no content.
											'future', // - a post to publish in the future.
											'private', // - not visible to users who are not logged in.
											'inherit' ),
										'order'		=> 'DESC',
										'author' => get_current_user_id(),
                                                                                'posts_per_page' => -1
									);
									query_posts( $args ); 
								?>
								<?php while (have_posts()): the_post(); 
									$image = get_field('hero_image');
									$img_url = $image[sizes]['project_thumb_sml']; ?>
									
									<li class="myprojects">
										<div class="project-item project-thumb">
											<div class="image" style="background-image: url(<?php echo $img_url; ?>);"></div>
										</div>
										<div class="project-item project-name"><?php  the_title(); ?></div>
										<div class="project-item option-list">
											<?php if($post->post_status == 'draft'): ?>
											<a class="delete_btn"href="<?php echo get_permalink(2854); ?>?project=<?php echo get_the_ID(); ?>&author=<?php echo get_current_user_id()?>">DELETE</a>
											<?php endif; ?>
											<a href="<?php echo get_permalink(644); ?>?project=<?php echo get_the_ID(); ?>">EDIT</a>
											<a href="<?php the_permalink(); ?>">VIEW</a>
										</div>                                       
										<div class="project-item project-status <?php echo $post->post_status; ?>"><?php echo $post->post_status; ?></div>
									</li>
									<?php /*
									<section class="how">
										<h1><?= get_field('name') ?>, <?= get_field('address_1') ?></h1>
										<span>Unleaded: <?= number_format((float)get_field('petrol_price'), 2, '.', '') ?>cpl</span>
										<span>Diesel: <?= number_format((float)get_field('diesel_price'), 2, '.', '') ?>cpl</span>
										<a href="/edit-station/?station-id=<? the_ID(); ?>" class="edits button">Edit</a>
									</section>		 */ ?>
									
								<?php endwhile; wp_reset_query(); ?>
								 
								
							</ul>
							<a class="button create_project button-medium" href="<?php echo get_permalink(772); ?>">Create Project</a>
						</div>
					</li>
				</ul>
				</div>
			</div>
		</div>
	</article>
	

<?php get_footer(); ?>
















