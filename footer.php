<?php
    if (is_user_logged_in()) {
	$link = '/create-project/';
    } else {
	$link = '/register/';
    }
?>
<div class="dock fix_menu">
    <a href='<?=$link?>'>
	<span class="dockslide dockslide_campaign fix_slide fix_slide_1">
	    Create a Campaign
	</span>
    </a>
    <span class="dockslide dockslide_contact fix_slide fix_slide_2">
        Get in touch
        <div class="closeboxs">
            <span class="closed">
                <img src="<?php echo get_template_directory_uri(); ?>/img/close2.png" alt="close" />
            </span>
        </div>
    </span>
    <div class="wrapper">
        <p>Looking for more information? Why not send us a quick message below and we'll get back to you shortly.</p>
        <?php echo do_shortcode("[contact-form-7 id='986' title='Contact form 1']"); ?>
    </div>
</div>

<div class="f_award_wrapper">
    <div class="f_award">
        <h4>They are speaking about us</h4>
        <ul>
            <li>
                <a href="http://eircomspiders.ie/winners/" target="_blank">
                    <p>Winner of best sports website at the 2014 Eircom Spider awards.</p>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/f_logo_eircom.png" class="footer_logo" alt="logo" />
                </a>
           </li>
            <li>
                <a href="http://www.bloomberg.com/news/2014-05-21/tennis-players-lacking-airfare-keep-wimbledon-dream-alive.html" target="_blank">
                    <p>"Tennis Players Lacking Airfare Keep Wimbledon Dream Alive"</p>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/f_logo_bloomberg.png" class="footer_logo" alt="logo" />
                </a>
           </li>
            <li>
                <a href="http://www.tennishead.net/news/academy/2014/08/08/is-crowdfunding-the-future-of-tennis" target="_blank">
                    <p>"Is crowdfunding the future of tennis?"</p>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/f_logo_tennishead.png" class="footer_logo" alt="logo" />
                </a>
           </li>
        </ul>
    </div>
</div>

<footer>
    <div class="foot">
        <img src="<?php echo get_template_directory_uri(); ?>/img/mini.png" class="footer_logo" alt="logo" />

        <form action="https://pledgesports.us3.list-manage.com/subscribe/post?u=f48ad6c7195d884c0334f2c28&amp;id=12a57e9a3f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" novalidate>
            <div id="mc_embed_signup_scroll">
                <label for="mce-EMAIL">Sign Up for Pledge Sport News</label>
                <input type="email" value="" name="EMAIL" id="mce-EMAIL" placeholder="Your Email...">


                <div>
                    <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe">
                </div>

                    <div id="mce-responses">
                    <div id="mce-error-response" style="display:none"></div>
                    <div id="mce-success-response" style="display:none"></div>
                </div> <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->

                 <div style="position: absolute; left: -5000px;">
                    <input type="text" name="b_f48ad6c7195d884c0334f2c28_12a57e9a3f" tabindex="-1" value="">
                </div>

            </div>
        </form>

<script type='text/javascript' src='https://s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='MMERGE3';ftypes[3]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->





        <div class='bottom_menu'>

            <menu class = "desk">
                <?php
                $defaults = array(
                    'theme_location' => 'footer-menu',
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

                wp_nav_menu($defaults);
                ?>
                <li>
                    <a href="mailto:info@pledgesports.org"> info@pledgesports.org</a>
                </li>
            </menu>
<ul class="socials">
    <li class="fb"><a target="_blank" href="https://www.facebook.com/pledgesports" onClick="_gaq.push(['_trackEvent', 'social', 'Facebook', 'Like Pledge Sports',, false]);"><img src="<?php echo get_template_directory_uri(); ?>/img/facebook.png" alt="Facebook" /></a></li>&nbsp;
    <li class="twit"><a target="_blank" href="https://twitter.com/PledgeSports" onClick="_gaq.push(['_trackEvent', 'social', 'Twitter', 'Follow Pledge Sports',, false]);"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.png" alt="Twitter" /></a></li>&nbsp;
    <li class="twit"><a target="_blank" href="http://instagram.com/PledgeSports" onClick="_gaq.push(['_trackEvent', 'social', 'Instagram', 'Follow Pledge Sports',, false]);"><img src="<?php echo get_template_directory_uri(); ?>/img/ins.png" alt="Instagram" /></a></li>
    <li class="twit"><a target="_blank" href="https://plus.google.com/u/0/112979063086892798130/posts" onClick="_gaq.push(['_trackEvent', 'social', 'Google+', 'Follow Pledge Sports',, false]);"><img src="<?php echo get_template_directory_uri(); ?>/img/gplus.png" alt="Google Plus" style="width:25px;height:25px;background-color:#dd4b39;border-radius:5px;" /></a></li>
</ul>
        </div>

        <?php if( in_array($_SERVER['REQUEST_URI'], ['/', '/uk/', '/usa/']) ) { ?>
          <div class="bottom_logos">
            <?php if( have_rows('logos',68) ): ?> 
                <?php while( have_rows('logos',68) ): the_row();  
                    $image = get_sub_field('image');
                    if( !empty( $image ) ): ?>
                    <div>
                        <a href="<?php the_sub_field('link'); ?>"> 
                            <img alt="<?php echo esc_attr($image['alt']); ?>" src="<?php echo esc_url($image['url']); ?>"/> 
                        </a>
                    </div>
                <?php endif; endwhile; ?> 
            <?php endif; ?> 
          </div>
        <?php } ?>

    </div>
</footer>
<div class="creator">
	<p><a target="_blank" href="http://www.lightbox.ie/">Design by Lightbox</a></p>
</div>
</div>
<div class="sb-slidebar sb-left">
    <div class="logo">
        <a href="/"><img src="<?php echo get_template_directory_uri(); ?>/img/mini.png" alt="Pledge Sports" /></a>
    </div>
    <?php
    $defaults = array(
        'theme_location' => '',
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
        'items_wrap' => '<ul>%3$s</ul>',
        'depth' => 0,
        'walker' => ''
    );

    wp_nav_menu($defaults);
    ?>
	<ul>
		<?php
		if (is_user_logged_in()) {
			$items .= '<li><a href="/dashboard/">' . __('My Account', 'fivehundred') . '</a></li>';
			$items .= '<li ><a href="/dashboard/">' . __('Logout', 'fivehundred') . '</a></li>';
		} else {
			$items .= '<li><a href="/register/">' . __('Create Account', 'fivehundred') . '</a></li>';
			$items .= '<li ><a href="/dashboard/">' . __('Login', 'fivehundred') . '</a></li>';
		}

		echo $items;
		?>
	</ul>


</div>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.customSelect.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/slidebars/slidebars.min.js"></script>

<script>
    (function($) {
        $(document).ready(function() {
            $.slidebars();

            $('.nice_select').customSelect();

           /* $(".vid").fitVids();
                // Custom selector and No-Double-Wrapping Prevention Test
            $(".vid").fitVids({customSelector: "iframe[src^='http://socialcam.com']"});*/
           });
    })(jQuery);
</script>


<!-- scripts concatenated and minified via build script -->

<!--[if (gte IE 6)&(lte IE 8)]>
  <script type="text/javascript" src="js/selectivizr.js"></script>
  <noscript><link rel="stylesheet" href="[fallback css]" /></noscript>
<![endif]-->

<!-- Prompt IE 6 users to install Chrome Frame -->
<!--[if lt IE 7 ]>
<script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
<script defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
<![endif]-->
<?php wp_footer(); ?>
</body>
</html>
