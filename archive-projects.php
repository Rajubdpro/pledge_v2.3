<?php get_header(); ?>
<div class='archive archive_projects'>
    <section class='pldg'><!--123asd-->
        <article>
            <section>
                <h1 class='red'>Projects</h1>
                <?php get_search_form(); ?>
                
                
                <div class='sorting_buttons categories'>
                    <h3 class='sorting_buttons_title'>
                        Categories
                    </h3>
                    
                    
                    <!-- with 'on' class to show the currently selected categories -->
                    <?php
                    $taxonomy = 'projects_category';
                    $terms = get_terms($taxonomy); // Get all terms of a taxonomy

                    if ( $terms && !is_wp_error( $terms ) ) :
                    ?>
                       
                        <select class='nice_select' onChange = "filter($(this).val());">
                            <option value = "all">all</option>
                            <?php foreach ( $terms as $term ) { ?>
                                <option value = "<?php echo $term->name; ?>"><?php echo $term->name; ?></option>
                            <?php } ?>
                        </select>
                      
                    <?php endif;?>
                    
                  
                </div>
                
                <div class='sorting_buttons' id ="asc_btn">
                    <h3 class='sorting_buttons_title'>
                        Sort By
                    </h3>
                    <a id = "percentage" class='button transparent' href = "javascript: sort('percentageraised', $('#percentage'));">Percentage</a>
                    <a id = "amountraised" class='button transparent' href = "javascript: sort('amountraised', $('#amountraised'));">Amount Raised</a>
                    <a id = "daysleft" class='button transparent' href = "javascript: sort('daysleft', $('#daysleft')); ">Days Left</a>
                    <a id = "date" class='button transparent' href = "javascript: sort('date', $('#date')); ">Date</a>
                </div>
            </section>
        </article>
    </section>
    <section class="fund">
        
        <?php
            // The Query
            $args = array(  'post_type' => 'projects',
                            'posts_per_page' => -1);
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
if(get_field("is_open_project", $pid))
{
	$daysLeft = "Open";
}else
{
	$daysLeft = getDaysLeft(get_field("deadline", $pid))."<br><span>Days Left</span>";
}
                    
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
                                            <li><?php echo $daysLeft; ?></li>
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
</div>
<script>
    orderBy = 0;

    function sort(parameter, button){
        
        $('#asc_btn').find('.button').removeClass("asc");
        $('#asc_btn').find('.button').removeClass("desc");
        
        window.orderBy = window.orderBy + 1;
        
        if (window.orderBy % 2 == 0){
            button.addClass("desc");
             $('.sortHelper').sort(function (a, b) {
                return $(a).find('.fund-single').data(parameter) - $(b).find('.fund-single').data(parameter);
            }).each(function (_, container) {
                $(container).parent().append(container);
            });
        }else{
            button.addClass("asc");
            $('.sortHelper').sort(function (b,a) {
                return $(a).find('.fund-single').data(parameter) - $(b).find('.fund-single').data(parameter);
            }).each(function (_, container) {
                $(container).parent().append(container);
            });
        }
       
    }
    
    function filter(category){
        $('.fund').find('.fund-single').hide();
        
        if (category != "all")
            $('.fund').find('.'+category).show();
        else
            $('.fund').find('.fund-single').show();
        
        
    }
    
    $( document ).ready(function() {
        sort('percentageraised', $('#percentage'));
    });
</script>
<?php get_footer(); ?>