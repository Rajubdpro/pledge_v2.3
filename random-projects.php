<?php
$project_count = 4;

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array( 'orderby' => 'rand', 'post_type', 'post_type' => 'projects', 'posts_per_page' => $project_count, 'paged' => $paged);
$newargs = apply_filters('project_query', $args);

$query = new WP_Query($newargs);
?>




<section class="fund">
    <div class="title">
        <h1 class="red"> Recommended Projects</h1>
    </div>
    <?php
        // The Query
        $args = array(  'post_type' => 'projects',
                        'posts_per_page' => 4,
                        'orderby' => 'rand');
        query_posts( $args ); 
        $counter = 1;
        
        while ( have_posts() ) : 
               the_post(); 
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
                <div class="sortHelper">
                    <?php $categories = get_the_terms( get_the_ID(), "projects_category" ); ?> 

                    <a 
                        id = "<?php echo get_the_ID(); ?>" 
                        href="<?php echo the_permalink(); ?>" 
                        class='fund-single fund-single-a <?php  if(is_old_post(14)){ ?>new<?php } ?> <?php if ($categories) { foreach ($categories as $category) { echo " " . $category->name; } }?>' 
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
                </div>
            <?php 
        endwhile; 
        wp_reset_query();
        ?>
   
</section>




<?php
wp_reset_postdata();
?>