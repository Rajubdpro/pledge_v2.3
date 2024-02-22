<?php
/**
	 * The template for displaying the 
	 * BRAND PARTNER UK
	 *
	 * @package WordPress
	 * @subpackage Pledge Sports
	 * @since Pledge Sports 2.2
 * */




?>
<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


<section class="about bp_wrapper">
    <article>
        <div class="title">
            <h1 class="red"> <?php the_title(); ?> </h1>
        </div>

                <p>
                    If you would like to become a brand partner of PledgeSports and advertise on this page please get in touch at <a href="mailto:info@pledgesports.org">info@pledgesports.org</a>
                </p>
       
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