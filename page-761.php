<?php
	/**
	 * The template for displaying the 
	 * PAYMENT SETTINGS
	 *
	 * @package WordPress
	 * @subpackage Pledge Sports
	 * @since Pledge Sports 2.2
	 */
	get_header(); 
	$message = "";
	if (isset($_GET['updated'])) {
		if ($_GET['updated'] == true ) {
			$message = "Your projects prices have been updated";
		}
	}
	
	
	
	
	

	if (isset($_GET['project'])) {
		$project_ID = $_GET['project'];
		
		// client ACF fields ID = 611
		
		$Project_Settings = array(
			'post_id' => $project_ID,
			'field_groups' => array( 627 ),
			'form_attributes' => array( // attributes will be added to the form element
				'class' => 'dropit '
			)
		);
		$Project_Client_Info = array(
			'post_id' => $project_ID,
			'field_groups' => array( 611 ),
			'form_attributes' => array( // attributes will be added to the form element
				'class' => 'dropit '
			)
		);
		
		
		
	}

	$getStationArgs = array(
		'p'=> $project_ID,
		'post_type'=> array('stations')
	);
	query_posts( $getStationArgs ); 
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
						<div class="md-profile">
							<h3>Edit <?php echo get_the_title($project_ID); ?> </h3>
							<? //while (have_posts()): the_post(); ?>
								
								<section class="how">
									
									<?php
										acf_form_head(); 
										acf_form( $Project_Client_Info ); 
									?>
									
									<?php
										//acf_form( $Project_Settings ); 
									?>
								</section>
							<? //endwhile; ?>
							
						</div>
					</li>
				</ul>
				</div>
			</div>
		</div>
	</article>
	

<?php get_footer(); ?>












