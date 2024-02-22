<?php
/*
Template Name: Standard Copy Page
*/
?>
<!-- @ngnuma -->
<?php get_header(); ?>
<!-- @ngnuma -->
<!--Page Template -->
<section class="pldg page page_id_<?php echo get_the_ID(); ?>">
    <article id="content">
        <?php 
           $count = 0; 
           if (have_posts()) : while (have_posts()) : if(++$count<22) { the_post();} ?>
            <section class='copy'>
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </section>
            <div class="bottom">
            </div>
        <?php endwhile; endif; ?>
    </article>
</section>
<br>
<div style = "text-align : center"><a href = "/projects"><span class = "button">SHOW ALL</span></a></div>
<?php get_footer(); ?>