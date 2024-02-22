<?php
/*
  Home page
 */
?>

<?php get_header(); ?>

<!--page-617.php -->
<section class="fund ">
    <?php
        // The Query
        $args = array(  'post_type' => 'projects',
                        'order_by' => 'rand');
        query_posts( $args ); 
        $counter = 1;
        
        while ( have_posts() ) : the_post(); $image = get_field('hero_image'); ?>
            <?php 
                if($counter == 1){
                    $img_url = $image[sizes]['project_full']; } 
                else{ 
                    $img_url = $image[sizes]['project_thumb']; } 
            ?>
            <section class='fund-single' style="background: url('<?php echo $img_url; ?> ')">
                <a href="<?php echo the_permalink(); ?>">
                    <div class='status'>
                        <h1><?= the_title(); ?></h1>
                        <h2><?= the_field("athlete_name") ?></h2>
                        <div class="funding">
                            <div class="progress" style="width: %;">
                            </div>
                        </div>
                        <div class="pledge">
                            <ul>
                                <li><?php //$summary->percentage; ?>%<br><span>Funded</span></li>
                                <li><?php //$summary->currency_code; ?><?php //$summary->total; ?><br><span>Pledged</span></li>
                                <li><?php //$summary->days_left; ?><br><span>Days Left</span></li>
                            </ul>
                        </div>
                    </div>
                </a>
            </section>
        <?php 
            $counter++;
            endwhile; 
            wp_reset_query();
        ?>
</section>
<?php get_footer(); ?>