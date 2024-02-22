<?php
/**
 * The template for displaying the 
 * CREATE PROJECT PAGE
 *
 * @package WordPress
 * @subpackage Pledge Sports
 * @since Pledge Sports 2.2
 */
get_header();
$message = "";
if (isset($_GET['updated'])) {
    if ($_GET['updated'] == true) {
        $message = "Your projects prices have been created";
    }
}

if (isset($_GET['project'])) {
    $project_ID = $_GET['project'];
    $project_Status = get_post_status($project_ID);
    // client ACF fields ID = 611
    // if the project is still pending, the user may yet edit adtional fields

    $field_groups = array(627, 611);


    $Project_Info = array(
        'post_id' => $project_ID,
        'field_groups' => $field_groups,
        'form_attributes' => array(// attributes will be added to the form element
            'class' => 'dropit '
        )
    );
}
?>


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
                            <?php
                            if ($_POST) {
                                $insert = wp_insert_post(array("post_title" => $_POST["project_name"],
                                    "post_type" => "projects",
                                    "post_status" => "draft"));
				$_SESSION['new_project_id'] = $insert;
                                ?>
                                <script>
                                    window.open("/edit-project/?project=<?php echo $insert; ?>", "_self");
                                </script>

                                <?php
                            } else {
                                ?>
                                <h3><?php echo get_the_title($project_ID); ?> </h3>
                                <section class="how">

                                    <form id = "" action = "" method = "POST" class="nice_form">
                                        <div class='field'>
                                            <label for='project_name'>Project Name:</label>
                                             <input type ="text" name = "project_name" id = "project_name"/>
                                        </div>

                                        <input id='submit' type ="submit" value = "Create Project"/>
                                    </form>




                                </section>
                                <?php
                            }
                            ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</article>


<?php get_footer(); ?>












