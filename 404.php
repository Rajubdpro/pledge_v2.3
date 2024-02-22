<?php get_header(); ?>
<div id="container">
	<div id="site-description">
		<h1><?php bloginfo( 'description' ) ?></h1>
	</div>
	<div id="post-<?php the_ID(); ?>">
		<div class="notfound">
			<section>
				<div id="content">
					<div id="404-grid">
						<div id="post-0" class="post error404 not-found">
							<h1 class="entry-title">We are sorry, there's nothing in here</h1>
							<div class="entry-content">
								<p>Nothing found for the requested page. Try a search instead?</p>
								<?php get_search_form(); ?>	
								<div id="home_button">
									<a href="<?php echo home_url(); ?>">Or try going to the homepage</a>	
								</div>						
							</div>
						</div>
						<div style="clear: both;"></div>
					</div>
					<p>Here's a map of the website that might help you to get what you want:</p>
					<?php get_template_part( 'nav', 'above' ); ?>
				</div>
			</section>
			<div class="bottom"></div>
		</div>
	</div>
<?php get_footer(); ?>