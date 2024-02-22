<?php
/**
	 * The template for displaying the 
	 * BRAND PARTNER
	 *
	 * @package WordPress
	 * @subpackage Pledge Sports
	 * @since Pledge Sports 2.2
 * */


  
		session_start();
		if (getenv('HTTP_GEOIP_COUNTRY_CODE') == "GB" && !isset($_SESSION['isuk']) || wp_get_referer() == get_home_url()."/uk/") {
			$_SESSION['isuk'] = true;
			wp_redirect(get_home_url()."/uk-brand-partners");	
		} elseif (getenv('HTTP_GEOIP_COUNTRY_CODE') == "GB" && (isset($_SESSION['isuk']) && $_SESSION['isus'] == true)) {
			$_SESSION['isuk'] = false;
		} elseif (getenv('HTTP_GEOIP_COUNTRY_CODE') == "US" && !isset($_SESSION['isus']) || wp_get_referer() == get_home_url()."/usa/") {
			$_SESSION['isus'] = true;
			wp_redirect(get_home_url()."/usa-brand-partners");	
		} elseif (getenv('HTTP_GEOIP_COUNTRY_CODE') == "US" && (isset($_SESSION['isus']) && $_SESSION['isus'] == true)) {
			$_SESSION['isus'] = false;
		}
?>
<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


<section class="about bp_wrapper">
    <article>
        <div class="title">
            <h1 class="red"> <?php the_title(); ?> </h1>
        </div>


       
                <section class="bp">
                    
                     <?php if(get_field('brand')): ?>
                        <?php while(has_sub_field('brand')): ?>

                        <?php $image = get_sub_field('logo'); ?>


                        <div class="bp_item">
                            <div class="bp_logo">
                            <?php if( !empty($image) ): ?>
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                            <?php endif; ?>
                            </div>
                            <div class="bp_copy">
                                <?php the_sub_field('copy'); ?>
                            </div>
                        </div>    
                        <?php endwhile; ?>
                    <?php endif; ?>

                </section>
                <div class="bottom">
                </div>

          
                    

<?php endwhile; ?>          
        

        <?php wp_reset_query(); ?>    

    </article>
</section>

<?php get_footer(); ?>