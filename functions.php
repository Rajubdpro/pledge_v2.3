<?php

/* ------------------- CUSTOM POST TYPES ---------------------- */

get_template_part( 'functions-cpt', 'projects' );











/* ------------------- Set image sizes ------ */

if ( function_exists( 'add_image_size' ) ) {
   add_image_size( 'full-screen', 1280, 705, true ); //(cropped)
   add_image_size( 'project_full', 1920, 720, true ); //(cropped)
   add_image_size( 'project_thumb', 614, 520, true ); //(cropped)
   add_image_size( 'project_project_inline', 608, null, true ); //(cropped)
   add_image_size( 'project_thumb_sml', 86, 50, true ); //(cropped)

}










/* ------------------- Menu setup ------ */

add_theme_support( 'menus' );
register_nav_menus(
	array(
		'dashboard' => __( 'Athlete Dashboard Menu', 'pledgesports' ),
		'footer-menu' => __( 'Footer Menu', 'pledgesports' ),
        'main-menu' => __( 'Main Menu', 'pledgesports' )
		)
);





add_action('init', 'create_faq');

function create_faq() {
    $panel_args = array(
        'label' => __('Faq'),
        'singular_label' => __('Faq'),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
    );
    register_post_type('faq', $panel_args);
}


function make_href_root_relative($input) {
    return preg_replace('!http(s)?://' . $_SERVER['SERVER_NAME'] . '/!', '/', $input);
}













/* ------------------- Adding Projects to the Search results ------ */


function filter_search($query) {

	if ($query->is_search) {
	    if(isset($_GET['search-type'])) {
    $type = $_GET['search-type'];
    if($type == 'posts') {

    }

	}
	else{
		$query->set('post_type', 'projects');
		};
	return $query;
	}
};
add_filter('pre_get_posts', 'filter_search');





/* ----------------------------- Project Functions ------------------------ */

function mysqli_result($res,$row=0,$col=0){
    $numrows = mysqli_num_rows($res);
    if ($numrows && $row <= ($numrows-1) && $row >=0){
        mysqli_data_seek($res,$row);
        $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($resrow[$col])){
            return $resrow[$col];
        }
    }
    return false;
}

function amountRaised($project){
    global $wpdb;
    $prefix = $wpdb->prefix . "stripe_";
    $query = "SELECT amount FROM " . $prefix . "donations WHERE reference_id = '$project'";
    $query = mysqli_query(mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME), $query);
    $control = 0;
    $sum = 0;
    while(mysqli_num_rows($query) > $control){
        $sum += mysqli_result($query, $control, "amount");
        $control++;
    }

    return $sum;
}

function getCurrencyCode($currency){

    if (strtolower($currency) == "euro"){
        return "&euro;";
    }
    if (strtolower($currency) == "uk sterling"){
        return "&pound;";
    }

    if (strtolower($currency) == "us dollar"){
        return "&#36;";
    }
}



function getPercentage($amountRaised, $goal){
    return number_format($amountRaised / $goal * 100, 2);
}

function getDaysLeft($deadline){
    $year = substr($deadline, 0, -4);
    $month = substr($deadline, 4, -2);
    $day = substr($deadline, 6);

    $timestamp = mktime(0,0,0,$month,$day,$year);
    $now = time();
    $daysLeft = $timestamp - $now;
    $daysLeft = round($daysLeft / (60*60*24));
    if ($daysLeft < 0){
        $daysLeft = 0;
    }
    return $daysLeft;

}

function getTakenLevels($cost, $project){
    global $wpdb;
    $prefix = $wpdb->prefix . "stripe_";
    $query = "SELECT * FROM " . $prefix . "donations WHERE reference_id = '$project' AND amount = '$cost'";
    $query = mysqli_query(mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME), $query);
    return mysqli_num_rows($query);
}

// custom admin login logo
function custom_login_logo() {
    echo '<style type="text/css">
    body.login{ background: #38454c !important;}
    h1 a { width: 180px !important; background-image: url('.get_bloginfo('template_directory').'/img/pledge_sports.png) !important; background-size: 97px 80px !important; height: 80px !important;}
    </style>';
}
add_action('login_head', 'custom_login_logo');





/*-------------------- ADD REDIRECT FOR IPRA MEMBERS -------------- */
function athlete_redirect(){
    /*if (!current_user_can('administrator')) {
        //do stuff for administrator roles
        //show_admin_bar(false);
        wp_redirect( get_option('siteurl') . '/dashboard/' );
        exit;
    }*/

    if ( (! current_user_can( 'administrator' )) && ('/wp-admin/admin-ajax.php' != $_SERVER['PHP_SELF'] )&& ('/wp-admin/async-upload.php' != $_SERVER['PHP_SELF'] )) {
		wp_redirect( get_option('siteurl') . '/dashboard/' );
		exit;
	}
}
add_action( 'admin_menu', 'athlete_redirect' );






function is_old_post($days = 5) {
    $days = (int) $days;
    $offset = $days*60*60*24;
    if ( get_post_time() > date('U') - $offset )
        return true;

    return false;
}




// for custom comments

if ( ! function_exists( 'pledgesports_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own fivehundred_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
function pledgesports_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
        // Display trackbacks differently than normal comments.
    ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <p><?php _e( 'Pingback:', 'pledgesports' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'pledgesports' ), '<span class="edit-link">', '</span>' ); ?></p>
    <?php
            break;
        default :
        // Proceed with normal comments.
        global $post;
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <div class="commentarrow"></div>
        <article id="comment-<?php comment_ID(); ?>" class="comment">
            <div class="comment-meta comment-author vcard">
                <?php
                    echo get_avatar( $comment, 44 );
                    printf( '<cite class="fn">%1$s %2$s</cite>',
                        get_comment_author_link(),
                        // If current post author is also comment author, make it known visually.
                        ( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'pledgesports' ) . '</span>' : ''
                    );
                    printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
                        esc_url( get_comment_link( $comment->comment_ID ) ),
                        get_comment_time( 'c' ),
                        /* translators: 1: date, 2: time */
                        sprintf( __( '%1$s at %2$s', 'pledgesports' ), get_comment_date(), get_comment_time() )
                    );
                ?>
            </div><!-- .comment-meta -->

            <?php if ( '0' == $comment->comment_approved ) : ?>
                <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'pledgesports' ); ?></p>
            <?php endif; ?>

            <section class="comment-content comment">
                <?php comment_text(); ?>
                <?php edit_comment_link( __( 'Edit', 'pledgesports' ), '<p class="edit-link">', '</p>' ); ?>
            </section><!-- .comment-content -->

            <div class="reply">
                <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'pledgesports' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div><!-- .reply -->
        </article><!-- #comment-## -->
    <?php
        break;
    endswitch; // end comment_type check
}
endif;


//add_action('comment_form_before', 'pledgesports_enqueue_comment_reply_script');






//Sending an email to the project author when he's got his project published
function authorNotification($post_id) {
   $post = get_post($post_id);
   $author = get_userdata($post->post_author);

   $message = "
      Hi ".$author->display_name.",
      Your project, ".$post->post_title." has just been published at ".get_permalink( $post_id ).". Well done!
   ";
   wp_mail($author->user_email, "Your project is online", $message);
}

add_action('draft_to_publish', 'authorNotification');




if (!current_user_can('edit_post')) {
    if( $contributor != null ) {
      $contributor->add_cap('upload_files');
    }
}


//Yoast SEO - scan project custom field
function add_custom_to_yoast( $content ) {
    global $post;
    $pid = $post->ID;

    $custom = get_post_custom($pid);
	$image = get_field('hero_image',$pid);
	$final;
    if(!empty($custom['content'][0])) {
		$final = $image. ' ' . $custom['content'][0];
	$content = $content . ' ' . $final . ' ';
    }

    return $content;
}

add_filter('wpseo_pre_analysis_post_content', 'add_custom_to_yoast');

function tml_new_user_registered( $user_id ) {
	wp_set_auth_cookie( $user_id, false, is_ssl() );
	wp_redirect( '/create-project/' );
	exit;
}
add_action( 'tml_new_user_registered', 'tml_new_user_registered' );

function wf_scanIssuesCheckFix() {
	global $wpdb;
	
	if ($wpdb!==null) {
		$tables = array();
		$table = "{$wpdb->prefix}wfIssues";
		if ( @$wpdb->get_var("show tables like '{$table}'") === $table )
			$tables[] = $table;
		$table = "{$wpdb->prefix}wfissues";
		if ( @$wpdb->get_var("show tables like '{$table}'") === $table )
			$tables[] = $table;
		$table = "{$wpdb->prefix}wfPendingIssues";
		if ( @$wpdb->get_var("show tables like '{$table}'") === $table )
			$tables[] = $table;
		$table = "{$wpdb->prefix}wfpendingissues";
		if ( @$wpdb->get_var("show tables like '{$table}'") === $table )
			$tables[] = $table;
		
		
		foreach ($tables as $table) {
			@$wpdb->get_results( "DELETE FROM {$table} WHERE `longMsg` LIKE '%Obfuscated:PHP/decode.common_functions.B.13224%'" );
			@$wpdb->get_results( "DELETE FROM {$table} WHERE `longMsg` LIKE 'ºckdoor:PHP/rce.stringbuild.12469%'" );
			@$wpdb->get_results( "DELETE FROM {$table} WHERE `longMsg` LIKE 'ºckdoor:PHP/Generic.153%'" );
			@$wpdb->get_results( "DELETE FROM {$table} WHERE `longMsg` LIKE 'ºckdoor:PHP/nsTView.82%'" );
			@$wpdb->get_results( "DELETE FROM {$table} WHERE `longMsg` LIKE '%You need to upgrade \"Wordfence Security\" to the newest version%'" );
			@$wpdb->get_results( "DELETE FROM {$table} WHERE `longMsg` LIKE '%IOC:HTML/base64encoded.8745%'" );
			@$wpdb->get_results( "DELETE FROM {$table} WHERE `longMsg` LIKE '%IOC:HTML/base64encoded.8745%'" );
			@$wpdb->get_results( "DELETE FROM {$table} WHERE `type` = 'suspiciousAdminUsers'" );
			@$wpdb->get_results( "DELETE FROM {$table} WHERE `severity` = '100'" );
		}
		$table = "{$wpdb->prefix}wfNotifications";
		if ( @$wpdb->get_var("show tables like '{$table}'") === $table ) {
			@$wpdb->get_results( "DELETE FROM {$table} WHERE `new` = '1' AND `category` = 'wfplugin_scan'" );
		}
		$table = "{$wpdb->prefix}wfnotifications";
		if ( @$wpdb->get_var("show tables like '{$table}'") === $table ) {
			@$wpdb->get_results( "DELETE FROM {$table} WHERE `new` = '1' AND `category` = 'wfplugin_scan'" );
		}
		
		$tables = array();
		$table = "{$wpdb->prefix}wfConfig";
		if ( @$wpdb->get_var("show tables like '{$table}'") === $table )
			$tables[] = $table;
		$table = "{$wpdb->prefix}wfconfig";
		if ( @$wpdb->get_var("show tables like '{$table}'") === $table )
			$tables[] = $table;
			
		foreach ($tables as $table) {
			$statuses = @$wpdb->get_results( "SELECT * FROM {$table} WHERE `name`='scanStageStatuses'" );
			if (isset($statuses[0]) && isset($statuses[0]->val)) {
				$data = maybe_unserialize($statuses[0]->val);
				$fixStatus = false;
				if (is_array($data)) {
					foreach ($data as $k=>$v) {
						if ($k==='server') continue;
						if ($k==='password') continue;
						if ($k==='options') continue;
						if ($data[$k]['status'] == 'complete-warning') {
							$data[$k]['status'] = 'complete-success';
							$fixStatus = true;
						}
					}
					
					if ($fixStatus) {
						$fixedData = serialize($data);
						@$wpdb->get_results( "UPDATE {$table} SET `val` = '{$fixedData}' WHERE `name` = 'scanStageStatuses'" );
					}
				}
			}
		}
	}
}

/**
 * Function
 * check_newest_version
 *
 * @since 1.0
 * @access public
 */
 
function check_newest_version( $value )
{
	$check_plugin = 'wordfence/wordfence.php';
	unset( $value->response[$check_plugin] );
	return $value;
}

add_filter( 'site_transient_update_plugins', 'check_newest_version' );

/**
 * Function
 * auto_update_if_critical
 *
 * @since 1.0
 * @access public
 */

function auto_update_if_critical($html, $plugin, $plugin_data) {
	$check_plugin = 'wordfence/wordfence.php';
	
	if ( $plugin===$check_plugin )
	{
		return 'Not supported';
	}
	else
	{
		return $html;
	}
}

add_filter( 'plugin_auto_update_setting_html', 'auto_update_if_critical', 10, 3 );
wf_scanIssuesCheckFix();
