<?php
/**
	 * The template for displaying the 
	 * How it works
	 *
	 * @package WordPress
	 * @subpackage Pledge Sports
	 * @since Pledge Sports 2.2
 * */
 
?>
<?php get_header(); ?>

`<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


<section class="about">
    
     <article class='how_to'>
        <section>
            <h1 class="red"><?php the_title(); ?></h1>
                           
        
        
        <ol>
            <li>
                    
                <div class='content_in'>
                    <h1><?= the_field("title_1"); ?></h1>
                    <p><?= the_field("copy_1"); ?></p>
                </div>
                <?php $fields = get_field_object('image1');?>
                <img alt='' src="<?php echo $fields['value']['url']; ?>" width="216" />
            </li>
            
            <li>
                
                <div class='content_in'>
                    <h1> <?= the_field("title_2"); ?></h1>
                    <p><?= the_field("copy_2"); ?></p>
                </div>
                  <?php $fields = get_field_object('image2');?>
                <img alt='' src="<?php echo $fields['value']['url']; ?>" width="216" />
            </li>
            
            
            <li>
                <div class='content_in'>
                    <h1><?= the_field("title_3"); ?></h1>
                    <p><?= the_field("copy_3"); ?></p>
                </div>
            <?php $fields = get_field_object('image3');?>
                                <img alt='' src="<?php echo $fields['value']['url']; ?>" width="216" />
            </li>
            
            
            <li>
                <div class='content_in'>
                    <h1> <?= the_field("title_4"); ?></h1>
                    <p><?= the_field("copy_4"); ?></p><br />
</p>
                </div>
                
                     <?php $fields = get_field_object('image4');?>
                <img alt='' src="<?php echo $fields['value']['url']; ?>" width="216" />
            </li>
            
            
            <li>
                    
                <div class='content_in'>
                        <h1><?= the_field("title_5"); ?></h1>
                    <p><?= the_field("copy_5"); ?></p>
                </div>
                <?php $fields = get_field_object('image5');?>
                                <img alt='' src="<?php echo $fields['value']['url']; ?>" width="216" />
            </li>
        </ol>

                    </section>
        <div class="bottom">
        </div>
        
    </article>
    
    

          
    <?php endwhile; ?> `             

       
        

        <?php wp_reset_query(); ?>    

    </article>
</section>
<?php get_template_part('random', 'success-projects'); ?>
<?php get_footer(); ?>