<?php	$url = "https://pledgesports.org/"; 
		global $VisitorCountry;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    
    <head>
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- country: <?php echo getenv('HTTP_GEOIP_COUNTRY_CODE') ?> -->
    <title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?></title>
   
    <!-- Mobile viewport optimized: h5bp.com/viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script src="https://code.jquery.com/jquery-2.1.0.min.js"></script>
    
    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.fitvids.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/customSelect.jquery.js"></script>
    
    
    <script src="<?php echo get_template_directory_uri(); ?>/js/script.js?v=<?php echo wp_get_theme()->get( 'Version' ); ?>"></script>
    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery.wysiwyg.css" type="text/css" />

    <?php //for the dev server ?>
    <?php /*if(FALSE !== stripos($_SERVER['SERVER_NAME'], 'pledgesports-v2.lightboxdigital.ie')) { ?>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/measurems.css?v=<?php echo wp_get_theme()->get( 'Version' ); ?>">
    <?php } */?>
    
    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/pledge.css?v=<?php echo wp_get_theme()->get( 'Version' ); ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blog_new.css?v=<?php echo wp_get_theme()->get( 'Version' ); ?>">
    
    <link href="<?php echo get_template_directory_uri(); ?>/themes/ui-darkness/jquery-ui-1.8.12.custom.css?v=<?php echo wp_get_theme()->get( 'Version' ); ?>" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/slidebars/slidebars.min.css?v=<?php echo wp_get_theme()->get( 'Version' ); ?>">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/shame.css?v=<?php echo wp_get_theme()->get( 'Version' ); ?>">
    
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon" />
    <!--[if lt IE 9]>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie.css" />
        <script>
            document.createElement('header');
            document.createElement('nav');
            document.createElement('section');
            document.createElement('article');
            document.createElement('aside');
            document.createElement('footer');
            document.createElement('hgroup');
            document.createElement('blockquote');
        </script>
    <![endif]-->
    <script src="<?php echo get_template_directory_uri(); ?>/js/froogaloop.js"></script>
    
    


<link href="<?php echo get_template_directory_uri(); ?>/themes/jquery.videobackground.css?v=<?php echo wp_get_theme()->get( 'Version' ); ?>" rel="stylesheet" media="screen">

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47933127-1', 'pledgesports.org');
  ga('send', 'pageview');

</script>

<!-- Facebook Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window,document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1439552446189983');
    fbq('track', 'PageView');
</script>
<noscript>
    <img height="1" width="1" src="https://www.facebook.com/tr?id=1439552446189983&ev=PageView&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->

    <script type="text/javascript">
        $(document).ready(function() {
      
        $( ".close" ).click(function() {
          $( ".yui" ).slideToggle( "slow", function() {

        // Animation complete.
          });
           vimeoWrap = $('.vendor');
           vimeoWrap.html( vimeoWrap.html() );
        });

        $( ".open" ).click(function() {
          $( ".yui" ).slideToggle( "slow", function() {
        // Animation complete.
          });
        });
        $( ".dockslide_contact" ).click(function() {
          $( ".wrapper" ).slideToggle( "slow", function() {
          });
          $( ".closeboxs" ).slideToggle( "slow", function() {
          });
        });

     
        });
    </script>

    <?php wp_head(); ?>
            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/rrsb.css" type="text/css" />

   <?php 
echo "<!--page id is :".$pid.'-->';
if (get_post_type() == "projects"){
if (get_field("image_before", get_the_ID()))
{
$image = get_field("image_before", get_the_ID());
echo "<!--there's a before image : ".$image['url']."-->";
echo "<meta property='og:image' content='".$image['url']."'>";
}
else if (get_field("hero_image", get_the_ID()))
{
$image = get_field("hero_image", get_the_ID());
echo "<!--there's a cover image only : ".$image['url']."-->";
echo "<meta property='og:image' content='".$image['url']."'>";
}
}
?> 
</head>
<body style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/crossword.png')" >

<?php echo '<!--template:'.get_post_meta('_wp_page_template', true ).'-->' ?>
<div class="yui">
	<div class="closebox">
		<span class="close">
			<img src="<?php echo get_template_directory_uri(); ?>/img/close.png" alt="close" />
		</span>
	</div>
	<div class="vid">
		<div class="vendor">
			<iframe src="https://player.vimeo.com/video/86023234?title=0&amp;byline=0&amp;portrait=0" width="400" height="225" frameborder="0"></iframe>
		</div>
	</div>
</div>
<div id="sb-site">
    <header>
        <nav>
            <div class="nav_in">
                <div class="loctn">
                    <ul>
                         <li><a href="/" onclick="document.cookie='GEO=EU; path=/';return true;"><img src="<?php echo get_template_directory_uri(); ?>/img/eu.jpg" alt="Pledge Sports" /></a> </li>
                         <li><a href="/uk"><img src="<?php echo get_template_directory_uri(); ?>/img/flag_uk.png" alt="Pledge Sports" /></a> </li>
                         <li><a href="/usa"><img src="<?php echo get_template_directory_uri(); ?>/img/usa.png" alt="Pledge Sports" /></a> </li>
                    </ul>
                </div>

                <div class="logo">
                    <a href="/<?php if(getenv('HTTP_GEOIP_COUNTRY_CODE') == "GB"){
                                        echo 'uk/';
                                    } elseif (getenv('HTTP_GEOIP_COUNTRY_CODE') == "US"){
                                        echo "usa/";
                                    }?>"><img src="<?php echo get_template_directory_uri(); ?>/img/lgoo.png" alt="Pledge Sports" /></a>
                </div>
                
                <?php get_template_part('nav', 'above'); ?>

            </div>
        </nav>
    </header>