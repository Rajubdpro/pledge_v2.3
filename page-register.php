<?php
/*
Template Name: Register Page
*/
?>
<?php

    $registerPage = $post;
    $errors = array();
    $shareProtocol = 'http';
    if ($_SERVER['HTTPS'] == "on") {
	$shareProtocol .= 's';
    }
    $shareDomain = $_SERVER['SERVER_NAME'];
    
if (is_user_logged_in()) {
    header ( 'Location: /index.php' );
} else {
    $user_login = '';
    $user_email = '';
    if ( count($_POST) > 0 ) {
	    $user_login = $_POST['user_login'];
	    $user_email = $_POST['user_email'];
	    $errors = register_new_user($user_email, $user_email);	    
	    if ( !is_wp_error($errors) ) {
		    $user = get_user_by( 'email', $user_email );
		    tml_new_user_registered($user->ID);
	    } else {
		$errors = $errors->get_error_messages();
	    }
    }
	
    get_header();
?>

<section class="pldg pldg-register">
    <article>
	<section id="register">
	    <div>
		<h1 id="heading"><?= the_field("heading"); ?></h1>
		<h2 id="sub-heading"><?= the_field("sub-heading"); ?></h2>
		<?php 
		    if (count($errors) > 0) {
			?>
		<ul>   
			<?php
			foreach ($errors as $error) {
			    if (strpos($error,'Password couldn&#8217;t be empty') !== false) {
				$error = str_replace("Password couldn&#8217;t be empty", "Please type your password", $error);
			    } else if (strpos($error,'Password confirmation couldn&#8217;t be empty') !== false) {
				$error = str_replace("Password confirmation couldn&#8217;t be empty", "Please confirm your password", $error);
			    }
			    ?>
		<li><?=$error?></li>
			    <?php
			}?>
		</ul>
		<?php
		    }
		?>
		<style>		    
		    @media screen and (min-width: 781px) {
			#register-form {
			    background-image:url('<?= the_field("background-image"); ?>');
			}	
		    }
		    @media screen and (max-width: 780px) {
			#register-form {
			    background-color: #2d425c;
			}
		    }
		</style>

		<div id="register-form" style="">
		    <div id="register-form-form">
			<h3 id="register-form-title"><?= the_field("register_form_title"); ?></h3>
			<form name="registerform" id="registerform" action="/register/" method="post">
			    <input type="text" style="display:none" name="user_login" id="user_login" class="input" placeholder="Username" value="<?php echo esc_attr(wp_unslash($user_login)); ?>" size="20" /></label>
			    <input type="text" name="user_email" id="user_email" class="input" placeholder="Email *" value="<?php echo esc_attr(wp_unslash($user_email)); ?>" size="25" /></label>
			    
			    <?php
			    /**
			     * Fires following the 'E-mail' field in the user registration form.
			     *
			     * @since 2.1.0
			     */
			    do_action( 'register_form' );
			    ?>			    
			    <input type="hidden" name="redirect_to" value="/create-project/"/>
			    <p class="submit"><input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="<?= the_field("register_form_button"); ?>" /></p>
			</form>
			<h3 id="register-form-footer"><?= the_field("register_form_footer"); ?></h3>
		    </div>
		</div>
	    </div>
	</section>	    
	<section id="testimonial-upper">
	    <img class="testimonial-image" src="<?= the_field("upper_testimonial_image"); ?>"/>	
	    <div class="testimonial"><?= the_field("upper_testimonial_text"); ?></div>
	</section>
	<section id="success-stories" class="fund">
	    <h3><?= the_field("success_stories_title"); ?></h3>
	    <?php
		$projects = array();
		$projects[0] = get_field("success_story_project_1");
		$projects[1] = get_field("success_story_project_2");
		$projects[2] = get_field("success_story_project_3");
	    ?>
	    <?php 
		foreach ($projects as $project) {
		    
		    $post = $project;

		    $image = get_field('hero_image'); 
		    $img_url = $image[sizes]['project_thumb']; 


		     $pid = get_the_ID();
		     $amountRaised = amountRaised($pid);
		     $goal = get_field("goal", $pid);
		     $percentage = getPercentage($amountRaised, $goal);
		     $currency = getCurrencyCode(get_field("currency", $id));
		     $daysLeft = getDaysLeft(get_field("deadline", $pid));
		     $date = get_the_date( $pid );
		     ?>
	    <div class="success-story">
		    <a 
		    id = "<?php echo get_the_ID(); ?>" 
		    href="<?php echo the_permalink(); ?>" 
		    class='fund-single fund-single-a <?php  if(is_old_post(14)){ ?>new<?php } ?> <?php  foreach ($categories as $category) { echo " " . $category->name; }?>' 
		    style="background: url('<?php echo $img_url; ?> ')" 
		    data-percentageraised = "<?php echo $percentage; ?>" 
		    data-amountraised = "<?php echo $amountRaised; ?>" 
		    data-daysleft = "<?php echo $daysLeft; ?>" 
		    data-date="<?php echo $date;?>">

		    <div clas='info'>
			<div class='status'>
			    <h1><?= the_title(); ?></h1>
			    <h2><?= the_field("athlete_name") ?></h2>
			    <div class="funding">
				<div class="progress" style="width: <?php echo $percentage;?>%">
				</div>
			    </div>
			    <div class="pledge">
				<ul>
				    <li><?php echo $percentage;?>%<br><span>Funded</span></li>
				    <li><?php echo $currency; ?> <?php echo number_format($amountRaised); ?><br><span>Pledged</span></li>
				    <li><?php echo $daysLeft; ?><br><span>Days Left</span></li>
				</ul>
			    </div>
			</div>
		    </div>
		</a>
		<h3 class="success-story-name"><a href="about/successes"><?= the_field("athlete_name") ?></a></h3>
		<p class="success-story-find-out"><a href="about/successes">Find out more about <?= the_field("athlete_name") ?>'s story.....</a></p>
	    </div>
	    <?php   
		} 
		
		$post = $registerPage;
	    ?>
	</section>
	<section id="benefits">
	    <h3><?= the_field("benefits_title"); ?></h3>
	    <div id="benefits-image-div"><img id="benefits-image" src="<?= the_field("benefits_image"); ?>"/></div>
	    <div id="benefits-content"><?= the_field("benefits_content"); ?>
	    
	    </div><h3><?= the_field("benefits_footer"); ?></h3>
	    <div class="social-tiles">
		    <div id="fb-root"></div>
		    <script>(function(d, s, id) {
		      var js, fjs = d.getElementsByTagName(s)[0];
		      if (d.getElementById(id)) return;
		      js = d.createElement(s); js.id = id;
		      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
		      fjs.parentNode.insertBefore(js, fjs);
		    }(document, 'script', 'facebook-jssdk'));</script>
		    <div class="social-tile">
			<!-- Place this tag in your head or just before your close body tag. -->
			<script src="https://apis.google.com/js/platform.js" async defer></script>
	
			<!-- Place this tag where you want the share button to render. -->
			<div class="g-plus" data-action="share" data-annotation="vertical-bubble" data-height="60" data-href="<?=$shareProtocol?>://<?=$shareDomain?>"></div>
		    </div>
		    <div class="social-tile">
			<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
			<script type="IN/Share" data-url="<?=$shareProtocol?>://<?=$shareDomain?>" data-counter="top"></script>
		    </div>
		    <div class="social-tile">
		    
			    <a href="https://twitter.com/share" class="twitter-share-button" data-count="vertical" data-url="<?=$shareProtocol?>://<?=$shareDomain?>" data-via="pledgesports">Tweet</a>
			    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
		    </div>
		    <div class="social-tile">
			<div class="fb-like" data-href="<?=$shareProtocol?>://<?=$shareDomain?>" data-layout="box_count" data-action="like" data-show-faces="true" data-share="false"></div>
		    </div>
		</div>
	    
	</section>	    
	<section id="testimonial-lower">
	    <img class="testimonial-image" src="<?= the_field("lower_testimonial_image"); ?>"/>	
	    <div class="testimonial"><?= the_field("lower_testimonial_text"); ?></div>
	</section>
	<!--<section id="testimonials">	 
	    <div class="testimonial-div">
		<img src="<?= the_field("footer_testimonial_-_left_image"); ?>"/>
		<div class="testimonial-text">
		    <p><?= the_field("footer_testimonial_-_left_text"); ?></p>
		    <p class="testimonial-name"><?= the_field("footer_testimonial_-_left_name"); ?></p>
		</div>
	    </div>
	    <div class="testimonial-div">
		<img src="<?= the_field("footer_testimonial_-_right_image"); ?>"/>
		<div class="testimonial-text">
		    <p><?= the_field("footer_testimonial_-_right_text"); ?></p>
		    <p class="testimonial-name"><?= the_field("footer_testimonial_-_right_name"); ?></p>
		</div>
	    </div>
	</section>-->
    </article>
</section>

<script type="text/javascript">
    $("input[name='cimy_uef_wp_FIRSTNAME']").attr("placeholder", "Firstname");
    $("input[name='cimy_uef_wp_LASTNAME']").attr("placeholder", "Lastname");
    $("input[name='cimy_uef_wp_PASSWORD']").attr("placeholder", "Password *");
    $("input[name='cimy_uef_wp_PASSWORD2']").attr("placeholder", "Confirm Password *");
    $("input[name='cimy_uef_PHONENUMBER']").attr("placeholder", "Phone Number");
</script>
    
<?php 
    get_footer();
}
?>