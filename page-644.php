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

<!-- page-644.php-->
<?php
	$message = "";
	$new_project_id = 0;
	if (isset($_GET['updated'])) {
		if ($_GET['updated'] == true ) {
			$message = "Wait while we save your project data";
			
			$new_project_id = $_SESSION["new_project_id"];
		}
	}
 
	if (isset($_GET['project'])) {
		$project_ID = $_GET['project'];
		$project_Status = get_post_status($project_ID);
		$pro_ID = get_post( $project_ID );
		$author = $pro_ID->post_author;
		$current_user = wp_get_current_user();
		$login_user_id = $current_user->id;		
		if ($author == $login_user_id && !empty($login_user_id) && !empty($author)) {

echo "<span id='spo123' style='display:none;'>";
echo "GET_id ".$_GET['project']."<br>";
echo "GET_id -> author ".$author."<br>";
echo "login_user_id ".$login_user_id."<br></span>";

		
		
		// client ACF fields ID = 611
		// if the project is still pending, the user may yet edit adtional fields
		if(($project_Status == 'pending' ) || ( $project_Status == 'draft' )){
			$field_groups = array(627, 611, 751 );
		} else {
			$field_groups = array(611, 751 );
                }
		
		/*$Project_Info = array(
			'post_id' => $project_ID,
			'field_groups' => $field_groups,
			'form_attributes' => array( // attributes will be added to the form element
				'class' => 'dropit '
			)
		);*/
	}else {
?>
<script>window.open("/dashboard", "_self");</script>
<?

}
	}
?>


<style>div#acf-is_open_project {
    display: none;
}</style>
<article id="content">
	<div id="post-9" class="post-9 page type-page status-publish hentry status-publish_edit">
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
                                                        <?php if ($message != ""):?>
                                                            <?php echo $message;?>
							    <?php if ($new_project_id > 0) { ?>
								<script>window.open("/campaign-created?project=<?=$new_project_id?>", "_self");</script>	
								<?php 
								unset($_SESSION['new_project_id']);
								?>
							    <?php } else { ?>
								<script>window.open("/dashboard", "_self");</script>		
							    <?php } ?>
                                                        <?php else:?>
							<h3 class="campaign_title">Edit <?php echo get_the_title($project_ID); ?></h3>
								<div class="campaign_awesome">
									<p>
									Click here for a guide on: <a target="_blank" href="https://www.pledgesports.org/wp-content/uploads/2014/07/PSGuideToCrowdfunding.pdf">How to Make an Awesome Project</a>
									</br>Contact info@pledgesports.org if you have any question.</p>
								</div>
								<div class="pb_iphone_wp">
									<p>If you are using iPad or iPhone there are compatibility issues with Wordpress and this may make it difficult to upload photos.  If this happens please use a laptop or a desktop computer</p>
								</div>
							<section class="how">
								
                                                            <?php $options = array("post_id"=>$project_ID,
                                                                                   "field_groups"=>$field_groups);
									
?>
                                                            <?php while ( have_posts() ) : the_post(); ?>
                                                                
                                                                <?php acf_form($options) ?>
 
                                                            <?php endwhile; ?>
									
								
							</section>
                                                        <?php endif;?>
                
                            <?php include(get_query_template('content-stripe')); ?>
                                                        
						</div>
					</li>
				</ul>
				</div>
			</div>
		</div>
	</article>
	

<?php get_footer(); ?>











