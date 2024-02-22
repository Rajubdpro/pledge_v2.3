<?php
	/**
	 * The template for displaying the 
	 * MY PROFILE PAGE
	 *
	 * @package WordPress
	 * @subpackage Pledge Sports
	 * @since Pledge Sports 2.2
	 */
	get_header(); 
	$cfg = searchConfigurationInfo();
	if ($cfg["test_mode"] == 1) { //sets the correct app client id and secret key 
		$app_client_id = $cfg["dev_app_client_id"];
		$secret_key = $cfg["test_secret_key"];
	} else {
		$app_client_id = $cfg["prod_app_client_id"];
		$secret_key = $cfg["live_secret_key"];
	}
	//OAuth2.0 Request to Stripe
	   define('CLIENT_ID', $app_client_id);
	   define('API_KEY', $secret_key);
	   define('TOKEN_URI', 'https://connect.stripe.com/oauth/token');
	   define('AUTHORIZE_URI', 'https://connect.stripe.com/oauth/authorize');
	   //var_dump(isset($_GET['code']));
	   if (isset($_GET['code'])) { // Redirect w/ code
			$code = $_GET['code'];
			$token_request_body = array(
				'client_secret' => API_KEY,
				'grant_type' => 'authorization_code',
				'client_id' => CLIENT_ID,
				'code' => $code,
			);
			$req = curl_init(TOKEN_URI);
			curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($req, CURLOPT_POST, true );
			curl_setopt($req, CURLOPT_POSTFIELDS, http_build_query($token_request_body));
			// TODO: Additional error handling
			$respCode = curl_getinfo($req, CURLINFO_HTTP_CODE);
			$resp = json_decode(curl_exec($req), true);
			


			curl_close($req);
	   } else if (isset($_GET['error'])) { // Error
			 echo $_GET['error_description'];
	   } 
	
	
	/* Get user info. */
	global $current_user, $wp_roles;
	get_currentuserinfo();

	/* Load the registration file. */
	require_once( ABSPATH . WPINC . '/registration.php' );
	$error = array();    
	/* If profile was saved, update profile. */
	if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {

	    /* Update user password. */
	    if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
	        if ( $_POST['pass1'] == $_POST['pass2'] )
	            wp_update_user( array( 'ID' => $current_user->ID, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
	        else
	            $error[] = __('The passwords you entered do not match.  Your password was not updated.', 'profile');
	    }

	    /* Update user information. */
	    if ( !empty( $_POST['url'] ) )
	        update_user_meta( $current_user->ID, 'user_url', esc_url( $_POST['url'] ) );
	    if ( !empty( $_POST['email'] ) ){
	        if (!is_email(esc_attr( $_POST['email'] )))
	            $error[] = __('The Email you entered is not valid.  please try again.', 'profile');
	        elseif(email_exists(esc_attr( $_POST['email'] )) != $current_user->id )
	            $error[] = __('This email is already used by another user.  try a different one.', 'profile');
	        else{
	            wp_update_user( array ('ID' => $current_user->ID, 'user_email' => esc_attr( $_POST['email'] )));
	        }
	    }

	    if ( !empty( $_POST['first-name'] ) )
	        update_user_meta( $current_user->ID, 'first_name', esc_attr( $_POST['first-name'] ) );
	    if ( !empty( $_POST['last-name'] ) )
	        update_user_meta($current_user->ID, 'last_name', esc_attr( $_POST['last-name'] ) );
	    if ( !empty( $_POST['description'] ) )
	        update_user_meta( $current_user->ID, 'description', esc_attr( $_POST['description'] ) );

		//Save Stripe Account Details in wp_stripe_connect
            
                if ( !empty( $_POST['access_token'] ) && !empty( $_POST['publishable_key'] ) && !empty( $_POST['refresh_token'] ) && !empty( $_POST['stripe_user_id'] ) ){
                    
                
			$wp_user_id = get_current_user_id();
			$access_token = $_POST['access_token'];
			$publishable_key = $_POST['publishable_key'];
			$refresh_token = $_POST['refresh_token'];
			$stripe_user_id = $_POST['stripe_user_id'];
	 
			
			//Only if it doesn't exist
			if($wpdb->get_row("SELECT * FROM wp_stripe_connect WHERE wp_user_id = $current_user->ID")){
				$wpdb->update(
					'wp_stripe_connect',
					array(
						'wp_user_id' => $wp_user_id,
						'stripe_access_token' => $access_token,
						'stripe_publishable_key' => $publishable_key,
						'stripe_refresh_token' => $refresh_token,
						'stripe_user_id' => $stripe_user_id
					),
					array('wp_user_id' => $current_user->ID),
					array(
						'%d',
						'%s',
						'%s',
						'%s',
						'%s'
					)
				);
			}else{
				$wpdb->insert(
					'wp_stripe_connect',
					array(
						'wp_user_id' => $wp_user_id,
						'stripe_access_token' => $access_token,
						'stripe_publishable_key' => $publishable_key,
						'stripe_refresh_token' => $refresh_token,
						'stripe_user_id' => $stripe_user_id
					),
					array(
						'%d',
						'%s',
						'%s',
						'%s',
						'%s'
					)
				);
			}
                }
	    /* Redirect so the page will show updated info.*/
	  /*I am not Author of this Code- i dont know why but it worked for me after changing below line to if ( count($error) == 0 ){ */
	    if ( count($error) == 0 ) {
	        //action hook for plugins and extra fields saving
	        do_action('edit_user_profile_update', $current_user->ID);
	        wp_redirect( get_permalink() );
	        //exit;
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
				
				
				<div class="md-box-wrapper full-width cf my_profile_wrapper">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<div class="entry-content entry">
						    <?php the_content(); ?>
						    <?php if ( !is_user_logged_in() ) : ?>
						            <p class="warning">
						                <?php _e('You must be logged in to edit your profile.', 'profile'); ?>
						            </p>
						    <?php else : ?>
						        <?php if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>
						        <form class='nice_form' method="post" id="adduser" action="<?php the_permalink(); ?>">
						        	<h2>Personal Information</h2>
						            <div class="form-username field">
						                <label for="first-name"><?php _e('First Name', 'profile'); ?></label>
						                <input class="text-input" name="first-name" type="text" id="first-name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" />
						            </div><!-- .form-username -->
						            <div class="form-username field">
						                <label for="last-name"><?php _e('Last Name', 'profile'); ?></label>
						                <input class="text-input" name="last-name" type="text" id="last-name" value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>" />
						            </div>
						            <div class="form-email field">
						                <label for="email"><?php _e('E-mail *', 'profile'); ?></label>
						                <input class="text-input" name="email" type="text" id="email" value="<?php the_author_meta( 'user_email', $current_user->ID ); ?>" />
						            </div>
						            <div class="form-password field">
						                <label for="pass1"><?php _e('New Password *', 'profile'); ?> </label>
						                <input class="text-input" name="pass1" type="password" id="pass1" />
						            </div>
						            <div class="form-password field">
						                <label for="pass2"><?php _e('Repeat Password *', 'profile'); ?></label>
						                <input class="text-input" name="pass2" type="password" id="pass2" />
						            </div>
									
                                    <?php include(get_query_template('content-stripe')) ?>

									
						            <?php 
						                //action hook for plugin and extra fields
						                do_action('edit_user_profile',$current_user); 
						            ?>
						            <div class="form-submit">
						                <?php echo $referer; ?>
						                <input name="updateuser" type="submit" id="updateuser" class="submit button" value="<?php _e('Update', 'profile'); ?>" />
						                <?php wp_nonce_field( 'update-user' ) ?>
						                <input name="action" type="hidden" id="action" value="update-user" />
						            </div><!-- .form-submit -->
						        </form><!-- #adduser -->
								
								
								
						    <?php endif; ?>
						</div><!-- .entry-content -->
					<?php endwhile; ?>
					<?php else: ?>
						<p class="no-data">
						    <?php _e('Sorry, no page matched your criteria.', 'profile'); ?>
						</p><!-- .no-data -->
					<?php endif; ?>
				</div>
				
				
				
				
				
				
				
			
				
				
				
				
				
				
				
				</div>
			</div>
		</div>
	</article>
	

<?php get_footer(); ?>












