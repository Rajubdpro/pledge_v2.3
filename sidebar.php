<?php $args = array(
	'type'            => 'yearly',
	'limit'           => '',
	'format'          => 'html', 
	'before'          => '',
	'after'           => '',
	'show_post_count' => true,
	'echo'            => 1,
	'order'           => 'DESC'
); ?>
<div class="arch">
    <h1 class="red">Archive</h1>
    <ul>
        <?php wp_get_archives( $args ); ?>
    </ul>
</div><div class="clear"></div>
