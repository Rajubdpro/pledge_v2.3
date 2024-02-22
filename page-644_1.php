<?php
	/**
	 * The template for displaying the 
	 * EDIT PROJECT PAGE
	 *
	 * @package WordPress
	 * @subpackage Pledge Sports
	 * @since Pledge Sports 2.2
	 */
        acf_form_head(); 
	get_header(); 
        
        ?>


<?php
	$message = "";
	if (isset($_GET['updated'])) {
		if ($_GET['updated'] == true ) {
			$message = "Your projects prices have been updated";
		}
	}
        
	
	
	
	
	

	if (isset($_GET['project'])) {
		$project_ID = $_GET['project'];
		$project_Status = get_post_status($project_ID);
		// client ACF fields ID = 611
		
		// if the project is still pending, the user may yet edit adtional fields
		if(($project_Status == 'pending' ) || ( $project_Status == 'draft' )){
			$field_groups = array(627, 611, 751 );
		} else {
			$field_groups = array(611 );
		}
		
		$Project_Info = array(
			'post_id' => $project_ID,
			'field_groups' => $field_groups,
			'form_attributes' => array( // attributes will be added to the form element
				'class' => 'dropit '
			)
		);
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
						<div class="md-profile">
							<h3>Edit <?php echo get_the_title($project_ID); ?> </h3>
							<section class="how">
								
								<?php
									acf_form( $Project_Info ); 
									//acf_form( $Project_Settings ); 
								?>
							</section>
						</div>
					</li>
				</ul>
				</div>
			</div>
		</div>
	</article>
	

<?php get_footer(); ?>












