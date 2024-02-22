<?php
/*
  Template Name: About Page
 */
?>
<?php get_header(); ?>

<section class="pldg">
    <article>
        <section class='about_hero'>
            <h1 class=""><?= the_field("main_title"); ?></h1>
            <div class="controls">
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
            <div class='bg' >
                <div class='bg_in' >&nbsp;
</div></div>
        </section>
        
        <section class="small left">
            <h1 class="red"><?= the_field("small_block_on_left_title"); ?></h1>
            <?= the_field("small_block_on_left_text"); ?>
        </section>
        <section class="small right">
            <h1 class="red"><?= the_field("small_block_on_right_title"); ?></h1>
            <?= the_field("small_block_on_right_text"); ?>
        </section>
        <div class="top">
        </div>
        <section>
            <h1 class="red"><?= the_field("big_text_block_1_title"); ?></h1>
            <?= the_field("big_text_block_1_text_part_1"); ?>
            <div class="cut_content">
                <?= the_field("big_text_block_1_text_part_2"); ?>
            </div>
            <div class="cut_image">
                <?php $image = get_field('big_text_block_1_image'); ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
            </div>
        </section>

        <section>
            <div class="cut_content">
                <?= the_field("big_text_block_2_text"); ?>
            </div>
            <div class="cut_image">
                <?php $image = get_field('big_text_block_2_image'); ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
            </div>
        </section>

        <section>
            <div class="cut_content">
                <?= the_field("big_text_block_3_text"); ?>
            </div>
            <div class="cut_image">
                <?php $image = get_field('big_text_block_3_image'); ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
            </div>
        </section>


        <div class="bottom">
        </div>
       
    </article>
</section>

<?php get_template_part('random', 'projects'); ?>

<?php get_footer(); ?>