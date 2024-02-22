<ul class="social">
    <li class="fb"><a target="_blank" href="https://www.facebook.com/pledgesports" onClick="_gaq.push(['_trackEvent', 'social', 'Facebook', 'Like Pledge Sports',, false]);"><img src="<?php echo get_template_directory_uri(); ?>/img/big_social_fb.svg" alt="Facebook" /></a></li>
	<li class="twit"><a target="_blank" href="https://twitter.com/PledgeSports" onClick="_gaq.push(['_trackEvent', 'social', 'Twitter', 'Follow Pledge Sports',, false]);"><img src="<?php echo get_template_directory_uri(); ?>/img/big_social_tw.svg" alt="Twitter" /></a></li>
    <li class="twit"><a target="_blank" href="http://instagram.com/PledgeSports" onClick="_gaq.push(['_trackEvent', 'social', 'Instagram', 'Follow Pledge Sports',, false]);"><img src="<?php echo get_template_directory_uri(); ?>/img/big_social_ig.svg" alt="Instagram" /></a></li>
    <li class="twit"><a target="_blank" href="https://plus.google.com/u/0/112979063086892798130/posts" onClick="_gaq.push(['_trackEvent', 'social', 'Google+', 'Follow Pledge Sports',, false]);"><img src="<?php echo get_template_directory_uri(); ?>/img/gplus.png" alt="Google Plus" style="border-radius:5px;background-color:#dd4b39;"/></a></li>
</ul>


<ul class = "desk">
<?php
$defaults = array(
    'theme_location' => '',
    'menu' => 'top-menu',
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

wp_nav_menu($defaults);
?>

    <li><a href='#'>Create a campaign</a>
         <?php $login_args = array(
            'echo'           => true,
            'redirect'       => site_url( $_SERVER['REQUEST_URI'] ),
            'form_id'        => 'loginform',
            'label_username' => __( 'Username' ),
            'label_password' => __( 'Password' ),
            'label_remember' => __( 'Remember Me' ),
            'label_log_in'   => __( 'Log In' ),
            'id_username'    => 'user_login',
            'id_password'    => 'user_pass',
            'id_remember'    => 'rememberme',
            'id_submit'      => 'wp-submit',
            'remember'       => true,
            'value_username' => NULL,
            'value_remember' => false
        ); ?>
        <?php if (is_user_logged_in()) { ?>
            <div class='loginform_out second_lv'>
                <a href="https://www.pledgesports.org/wp-content/uploads/2014/07/PSGuideToCrowdfunding.pdf" target="_blank">Guide to crowfunding</a>
                <a href="<?php echo get_permalink(9) ?>">My Account</a>
                <a href ="<?php echo wp_logout_url( "/" ) ?>">Logout</a>
            </div>
        <?php } else { ?>
            <div class='loginform_out'>
                <?php wp_login_form($login_args); ?>
                <a class='create_acc' href="/register">Register</a>
            </div>
        <?php } ?>
    </li>

</ul>


<a class = "sb-toggle-left"><ul class = "mob"><li>Menu</li></ul></a>
