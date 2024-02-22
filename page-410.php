<?php
/**
 * The template for displaying the 
 * SUPPORTERS
 *
 * @package WordPress
 * @subpackage Pledge Sports
 * @since Pledge Sports 2.2
 */
get_header(); ?>


<article id="content">
    <div id="post-9" class="post-9 page type-page status-publish hentry">
        <div class="entry-content">
            <div class="memberdeck">
                <ul class="dashboardmenu">
                    <?php
                        $dashboard = array(
                            'theme_location' => 'dashboard',
                            'menu' => '',
                            'container' => false,
                            'container_class' => '',
                            'container_id' => '',
                            'menu_class' => '',
                            'menu_id' => '',
                            'echo' => true,
                            'fallback_cb' => 'wp_page_menu',
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'items_wrap' => '%3$s',
                            'depth' => 0,
                            'walker' => ''
                        );

                        wp_nav_menu($dashboard);
                    ?>
                </ul>

                <ul class="md-box-wrapper full-width cf">
                    <li class="md-box full">
                        <div class="md-profile">
                            <h3><?php echo get_the_title($project_ID); ?> </h3>
                            <section class="how copy">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Project</th>
                                            <th>Amount</th>
                                            <th>Address</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $supporters = showSupportersByProjectSender(wp_get_current_user()->ID);
                                        $control = 0;
                                        foreach($supporters as $supporter){
                                            
                                            ?>


                                            <tr>
                                                <td><?php echo $supporter["user_name"]; ?></td>
                                                <td><?php echo $supporter["user_email"]; ?></td>
                                                <td><?php echo $supporter["project_name"]; ?>Test Project</td>
                                                <td><?php echo $supporter["amount"]; ?></td>
                                                <td>
                                                    <?php foreach ($supporter["fields"] as $field=>$value): ?>
                                                        <b><?php echo $field; ?>: </b> <?php echo $value; ?><br/>
                                                    <?php endforeach;?>
                                                    
                                                </td>
                                                <td><?php echo substr($supporter["date"],0,10); ?></td>
                                            </tr>
                                        <?php
                                        
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </section>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</article>



<?php get_footer(); ?>












