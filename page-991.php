<?php
/*
  Home page
 */

?>

<?php get_header(); ?>
<!--page-991-->
<style>
    dt {
        float: left;
        width: 160px;
    }
    dd {
        margin: 0 0 10px 160px;
    }
    /*
     * If developing a full page background the styles from .video-background will be required.
     * The classname itself is unimportant.
     *
     */
    .video-background {
        top: 0;
        left: 0;
        overflow: hidden;
        width: 100%;
        height: 100%;
        max-height: 700px !important;
        z-index: 0;
    }
    .video-background video {
        min-height: 100%; 
        min-width:100%; 
    }
</style>




<?php
    // The Query
    // $args = array(  'post_type' => 'slides',                        
    //                 'order_by' => 'rand');
    // query_posts( $args ); 
    if( have_rows('slides') ):
    $counter = 1;
?>

<div class="full-slider-wrapper  slider-wrapper ">
    <div class="slides box_height" id="slides">
        <div class="slide active slide_0<?= $counter++ ?>">
            <div class="first_slide container">
                <div class="copy">
                    <h1><?= the_field("main_message"); ?></h1>
                    <a class="button button_play open" href="#">Play Video</a>
                </div>
                
                
                <div class="controls_front">
                    <ul>
                        <li class="search">
                            <a href="/projects">Browse Athletes</a></li>
                            
                        <li class="star">
			    <?php
				if (is_user_logged_in()) {
				    $link = '/create-project/';
				} else {
				    $link = '/register/';
				}
			    ?>
                            <a href="<?=$link?>">Create Your Campaign</a></li>
                            
                        <li class="question">
                            <a href="<?php echo get_permalink(363); ?>">How It works</a></li>
                    </ul>
                </div>
            </div>
            <?php $hero_image = get_field('hero_image'); ?>
            <img alt='Pledge Sports' src="<?= $hero_image[sizes]['full-screen'] ?>" width="1280" />
        </div>
        <?php while ( have_rows('slides') ) : 
            the_row(); 
            $image = get_sub_field('image'); ?>
            
            <div class="slide <?php if($counter == 1){ ?>active<?php } else{ ?>next<?php } ?> slide_0<?= $counter++ ?>">
                <div class="content_out container">
                    <div class="copy basic_info">
                        <h1><?php echo get_sub_field('title'); ?></h1>
                        <p><?php echo get_sub_field('copy'); ?></p>
                        <?php $id = get_sub_field('call_to_action'); ?>
                        
                        <a href="<?php echo get_permalink($id[0]); ?>" class="button" ><?php the_sub_field('call_to_action_text'); ?></a>
                    </div>
                    
                    
                </div>
                <img alt='<?php echo $image[alt] ?>' src="<?= $image[sizes]['full-screen'] ?>" width="1280" />
            </div>
        
        <?php endwhile; ?>
    </div>
    <?php $counter = 1; ?>
    <nav class="slide_navigation" id="slide_nav">
        <ul>
            <li><a href="#" class="<?php if($counter == 1){ ?>active<?php } ?> nav_0<?= $counter++ ?>"><?php the_title(); ?></a></li>
            
            <?php while ( have_rows('slides') ) : 
                the_row(); 
                $image = get_sub_field('image'); ?>
                
                <li><a href="#" class="<?php if($counter == 1){ ?>active<?php } ?> nav_0<?= $counter++ ?>"><?php the_title(); ?></a></li>
                
            <?php endwhile; ?>
        </ul>
    </nav>
</div>
<?php endif; ?>

<section class="fund fancy_arrangement">
    <?php
        $posts = get_field('featured_projects');
        $counter = 1;
        
        if( $posts ): 
            
            ?>
            <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                <?php 
                    setup_postdata($post); 
                    
                    $image = get_field('hero_image');
                    
                    if($counter == 1){
                        $img_url = $image[sizes]['project_full']; } 
                    else{ 
                        $img_url = $image[sizes]['project_thumb']; } 
                    
                    $pid = get_the_ID();
                    $amountRaised = amountRaised($pid);
                    $goal = get_field("goal", $pid);
                    $percentage = getPercentage($amountRaised, $goal);
                    $currency = getCurrencyCode(get_field("currency", $id));
                    $daysLeft = getDaysLeft(get_field("deadline", $pid));
                    $date = get_the_date( $pid );
                
                ?>
                <a 
                    id = "<?php echo get_the_ID(); ?>" 
                    href="<?php echo the_permalink(); ?>" 
                    class='fund-single fund-single-a <?php  if(is_old_post(14)){ ?>new<?php } ?>' 
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
            <?php 
                $counter++;
                endforeach; 
                wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
                endif; ?>
        
        
</section>

<script>
    // Basic FitVids Test
    $(".vid").fitVids();
    // Custom selector and No-Double-Wrapping Prevention Test
    $(".vid").fitVids({customSelector: "iframe[src^='http://socialcam.com']"});
</script>
<?php get_footer(); ?>