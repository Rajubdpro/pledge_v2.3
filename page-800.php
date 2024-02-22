<?php
/**
	 * The template for displaying the 
	 * SUCCESSES
	 *
	 * @package WordPress
	 * @subpackage Pledge Sports
	 * @since Pledge Sports 2.2
 * */
 
?>
<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<!--page-800.php-->
<section class="about">
    <article>
        <div class="title">
            <h1 class="red"> <?php the_title(); ?> </h1>
        </div>


       
                <section>
                    
                    <?php echo get_the_content(); ?>
                </section>
                <div class="bottom">
                </div>

          
                    

<?php endwhile; ?>          
        

        <?php wp_reset_query(); ?>    

    </article>
</section>

<?php get_template_part('random', 'success-projects'); ?>
<?php get_footer(); ?>