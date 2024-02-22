<?php
/*
  Template Name: Faq Page
 */
?>
<?php get_header(); ?>

<?php
$type = 'faq';
$args = array(
    'post_type' => $type,
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'caller_get_posts' => 1);

$my_query = new WP_Query($args);
?>


<section class="about">
    <article>
        <div class="title">
            <h1 class="red"> Frequently asked questions </h1>
        </div>


        <?php if ($my_query->have_posts()): ?>
            <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                <section>
                    <h2 class="red"><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                </section>
                <div class="bottom">
                </div>

                <?php if (($my_query->current_post + 1) != ($my_query->post_count)) { ?>
                    <div class="top">
                    </div>
                <?php } ?>

            <?php endwhile; ?>
        <?php endif; ?>

        <?php wp_reset_query(); ?>    

    </article>
</section>
<?php get_template_part('random', 'projects'); ?>
<?php get_footer(); ?>