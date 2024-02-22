<?php
/*
 * Delete the project 
 */
$project_id = $_GET['project'];
$author = $_GET['author'];

//If user is logged in
if(is_user_logged_in()){
	if(get_current_user_id() == $author){//If user id matches project user id
		wp_delete_post($project_id, false);
		wp_redirect(get_permalink(9));
	}else{
		wp_redirect(get_permalink(68));//Redirect Homepage
	}
}else{
	wp_redirect(get_permalink(68));
}
?>
