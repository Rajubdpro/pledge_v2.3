<?php get_header(); 
global $trueproject;
$trueproject = true;
?>
<!--single-projects-->
    <?php while ( have_posts() ) : the_post(); ?>
    <div id="container">
        <article id="content" class="ignition_project single_profile">

            <section class="single">
                <article>
                    <?php $image = get_field('hero_image'); ?>
                    <section class="first" style="background: url('<?php echo $image[sizes]['project_full']; ?>')">
                            <div class="status">
                                <div class="single_wrapper">
                                <h1><?php echo the_title(); ?></h1>
                                <h2><?= the_field("athlete_name") ?></h2>
                                <div class="funding">
                                    <div class="progress" style="width: <?php echo getPercentage(amountRaised(get_the_ID()), get_field("goal", get_the_ID()));?>%;">
                                    </div>
                                </div>
                                <div class="pledge">
                                    <ul>
<?php echo "<!--linklink :".get_permalink()."-->";
?>
                                        <li><?php echo getPercentage(amountRaised(get_the_ID()), get_field("goal", get_the_ID()));?>%&nbsp;<span>funded</span></li>
                                        <li><?php echo getCurrencyCode(get_field("currency", get_the_ID()));?> <?php echo number_format(amountRaised(get_the_ID()),2); ?>&nbsp;<span>pledged</span></li><!--stea-->
                                        <li><?php if(get_field("is_open_project", get_the_ID())){echo "<span>Open</span>";}else{echo getDaysLeft(get_field("deadline", get_the_ID())); ?>&nbsp;<span>Days Left</span><?php } ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="overlay">
                                <h1><?php // echo $content->name; ?></h1>
                                <h2>View Project</h2>
                            </div>
                        </div>
                    </section>
                </article>
            </section>

            <section class="single_share">
                <div class="single_wrapper">
                    <div class="share_buttons">
                        <h2>Support by sharing</h2>
<ul class="rrssb-buttons clearfix">
                            <li class="facebook">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo the_permalink(); ?>" target="_blank" class="popup" onClick="_gaq.push(['_trackEvent', 'social', 'Facebook', 'Like <?php the_field('athlete_name'); ?>', <?php the_ID(); ?>, false]);">
                                    <span class="icon">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
                                            <path d="M27.825,4.783c0-2.427-2.182-4.608-4.608-4.608H4.783c-2.422,0-4.608,2.182-4.608,4.608v18.434
                                                c0,2.427,2.181,4.608,4.608,4.608H14V17.379h-3.379v-4.608H14v-1.795c0-3.089,2.335-5.885,5.192-5.885h3.718v4.608h-3.726
                                                c-0.408,0-0.884,0.492-0.884,1.236v1.836h4.609v4.608h-4.609v10.446h4.916c2.422,0,4.608-2.188,4.608-4.608V4.783z"/>
                                        </svg>
                                    </span>
                                    <span class="text">facebook</span>
                                </a>
                            </li>
                            <li class="twitter">
                                <a href="http://twitter.com/home?status=I%20just%20supported%20this%20great%20campaign%20on%20@pledgesports%20check%20it%20out!%20<?php echo the_permalink(); ?>%20%23support"  target="_blank" class="popup" onClick="_gaq.push(['_trackEvent', 'social', 'Twitter', 'Follow <?php the_field('athlete_name'); ?>',<?php the_ID(); ?>, false]);">
                                    <span class="icon">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
                                        <path d="M24.253,8.756C24.689,17.08,18.297,24.182,9.97,24.62c-3.122,0.162-6.219-0.646-8.861-2.32
                                            c2.703,0.179,5.376-0.648,7.508-2.321c-2.072-0.247-3.818-1.661-4.489-3.638c0.801,0.128,1.62,0.076,2.399-0.155
                                            C4.045,15.72,2.215,13.6,2.115,11.077c0.688,0.275,1.426,0.407,2.168,0.386c-2.135-1.65-2.729-4.621-1.394-6.965
                                            C5.575,7.816,9.54,9.84,13.803,10.071c-0.842-2.739,0.694-5.64,3.434-6.482c2.018-0.623,4.212,0.044,5.546,1.683
                                            c1.186-0.213,2.318-0.662,3.329-1.317c-0.385,1.256-1.247,2.312-2.399,2.942c1.048-0.106,2.069-0.394,3.019-0.851
                                            C26.275,7.229,25.39,8.196,24.253,8.756z"/>
                                        </svg>
                                   </span>
                                    <span class="text">twitter</span>
                                </a>
                            <li class="linkedin">
                                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo the_permalink(); ?>&amp;title=<?php echo $the_title; ?>&amp;summary=I%20just%20supported%20this%20great%20campaign%20on%20www.pledgesports.org.%20Check%20it%20out!%20<?php echo the_permalink(); ?>%20You%20can%20support%20and%20become%20a%20part%20of%20their%20success%20too!"  target="_blank" class="popup" onClick="_gaq.push(['_trackEvent', 'social', 'LinkedIn', 'Linkedin <?php the_field('athlete_name'); ?>',<?php the_ID(); ?>, false]);">
                                    <span class="icon">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
                                            <path d="M25.424,15.887v8.447h-4.896v-7.882c0-1.979-0.709-3.331-2.48-3.331c-1.354,0-2.158,0.911-2.514,1.803
                                                c-0.129,0.315-0.162,0.753-0.162,1.194v8.216h-4.899c0,0,0.066-13.349,0-14.731h4.899v2.088c-0.01,0.016-0.023,0.032-0.033,0.048
                                                h0.033V11.69c0.65-1.002,1.812-2.435,4.414-2.435C23.008,9.254,25.424,11.361,25.424,15.887z M5.348,2.501
                                                c-1.676,0-2.772,1.092-2.772,2.539c0,1.421,1.066,2.538,2.717,2.546h0.032c1.709,0,2.771-1.132,2.771-2.546
                                                C8.054,3.593,7.019,2.501,5.343,2.501H5.348z M2.867,24.334h4.897V9.603H2.867V24.334z"/>
                                        </svg>
                                    </span>
                                    <span class="text">linkedin</span>
                                </a>
                            </li>
                            <li class="googleplus">
                                <a href="https://plus.google.com/share?url=I%20just%20supported%20this%20great%20campaign%20on%20www.pledgesports.org.%20Check%20it%20out!%20<?php echo the_permalink(); ?>%20You%20can%20support%20and%20become%20a%20part%20of%20their%20success%20too!"  target="_blank" class="popup" onClick="_gaq.push(['_trackEvent', 'social', 'Google+', 'Google+ <?php the_field('athlete_name'); ?>',<?php the_ID(); ?>, false]);">
                                    <span class="icon">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M14.703,15.854l-1.219-0.948c-0.372-0.308-0.88-0.715-0.88-1.459c0-0.748,0.508-1.223,0.95-1.663
                                                        c1.42-1.119,2.839-2.309,2.839-4.817c0-2.58-1.621-3.937-2.399-4.581h2.097l2.202-1.383h-6.67c-1.83,0-4.467,0.433-6.398,2.027
                                                        C3.768,4.287,3.059,6.018,3.059,7.576c0,2.634,2.022,5.328,5.604,5.328c0.339,0,0.71-0.033,1.083-0.068
                                                        c-0.167,0.408-0.336,0.748-0.336,1.324c0,1.04,0.551,1.685,1.011,2.297c-1.524,0.104-4.37,0.273-6.467,1.562
                                                        c-1.998,1.188-2.605,2.916-2.605,4.137c0,2.512,2.358,4.84,7.289,4.84c5.822,0,8.904-3.223,8.904-6.41
                                                        c0.008-2.327-1.359-3.489-2.829-4.731H14.703z M10.269,11.951c-2.912,0-4.231-3.765-4.231-6.037c0-0.884,0.168-1.797,0.744-2.511
                                                        c0.543-0.679,1.489-1.12,2.372-1.12c2.807,0,4.256,3.798,4.256,6.242c0,0.612-0.067,1.694-0.845,2.478
                                                        c-0.537,0.55-1.438,0.948-2.295,0.951V11.951z M10.302,25.609c-3.621,0-5.957-1.732-5.957-4.142c0-2.408,2.165-3.223,2.911-3.492
                                                        c1.421-0.479,3.25-0.545,3.555-0.545c0.338,0,0.52,0,0.766,0.034c2.574,1.838,3.706,2.757,3.706,4.479
                                                        c-0.002,2.073-1.736,3.665-4.982,3.649L10.302,25.609z"/>
                                                    <polygon points="23.254,11.89 23.254,8.521 21.569,8.521 21.569,11.89 18.202,11.89 18.202,13.604 21.569,13.604 21.569,17.004
                                                        23.254,17.004 23.254,13.604 26.653,13.604 26.653,11.89      "/>
                                                </g>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="text">google+</span></a>
                                </li>
                                </li>
                            <li class="email">
                                <?php $the_title = str_replace(' ', '%20', get_the_title()); ?>
<a href="mailto:?subject=<?php echo $the_title; ?>&amp;body=I%20just%20supported%20this%20great%20campaign%20on%20www.pledgesports.org.%20Check%20it%20out!%20<?php echo the_permalink(); ?>%20You%20can%20support%20and%20become%20a%20part%20of%20their%20success%20too!" onClick="_gaq.push(['_trackEvent', 'social', 'Email', 'Email <?php the_field('athlete_name'); ?>',<?php the_ID(); ?>, false]);">
                                    <span class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve"><g><path d="M20.111 26.147c-2.336 1.051-4.361 1.401-7.125 1.401c-6.462 0-12.146-4.633-12.146-12.265 c0-7.94 5.762-14.833 14.561-14.833c6.853 0 11.8 4.7 11.8 11.252c0 5.684-3.194 9.265-7.399 9.3 c-1.829 0-3.153-0.934-3.347-2.997h-0.077c-1.208 1.986-2.96 2.997-5.023 2.997c-2.532 0-4.361-1.868-4.361-5.062 c0-4.749 3.504-9.071 9.111-9.071c1.713 0 3.7 0.4 4.6 0.973l-1.169 7.203c-0.388 2.298-0.116 3.3 1 3.4 c1.673 0 3.773-2.102 3.773-6.58c0-5.061-3.27-8.994-9.303-8.994c-5.957 0-11.175 4.673-11.175 12.1 c0 6.5 4.2 10.2 10 10.201c1.986 0 4.089-0.43 5.646-1.245L20.111 26.147z M16.646 10.1 c-0.311-0.078-0.701-0.155-1.207-0.155c-2.571 0-4.595 2.53-4.595 5.529c0 1.5 0.7 2.4 1.9 2.4 c1.441 0 2.959-1.828 3.311-4.087L16.646 10.068z"/></g></svg>
                                    </span>
                                    <span class="text">email</span>
                                </a>
                            </li>

                        </ul> <!-- end of sharing buttons -->



                    </div>
                    <div class="like_buttons">

                        <h2>Like and Follow</h2>



                        <?php
                            $fields = get_fields();
                            $fb = $fields["facebook_url"];
                            $twit = $fields["twitter_url"];
                            $insta = $fields["instagram_url"];
                            if(($fb != null) || ($twit != null) || ($insta != null)){
                            ?>

                                <ul class="rrssb-buttons clearfix end_share_buttons">
                                    <?php if ($fb != null): ?>
                                        <li class="facebook">
                                            <a href="<?php echo $fb; ?>" target="_blank" class="popup" onClick="_gaq.push(['_trackEvent', 'social', 'Facebook', 'Like <?php the_field('athlete_name'); ?>', <?php the_ID(); ?>, false]);">
                                                <span class="icon">
                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                         width="15px" height="15px" viewBox="0 0 15 15" enable-background="new 0 0 15 15" xml:space="preserve">
                                                        <g>
                                                            <path fill="#F7FAFC" d="M-854.648,126.567c8.868,0,11.909-11.293,3.045-11.293c-6.075,0-29.9,0-29.9,0
                                                                c1.085-4.301,3.083-18.033,3.083-18.033c-0.451-6.659-4.91-15.034-4.91-15.034c-5.294-2.229-7.678,0.837-7.678,0.837
                                                                s0.276,10.59,0.276,13.036s-12.104,22.025-15.065,24.538c-2.961,2.521-10.32,6.811-10.32,6.811
                                                                c-8.78,21.189,2.016,29.784,2.016,29.784s2.191,0,5.677,0c2.106,0,4.71,3.259,7.569,3.259c13.284,0,32.424,0,37.07,0
                                                                c8.865,0,11.913-11.301,3.045-11.301c8.868,0,11.916-11.293,3.052-11.293C-848.825,137.877-845.78,126.567-854.648,126.567z"/>
                                                        </g>
                                                        <g>
                                                            <path fill="#FFFFFF" d="M-886.954,82.895c0.782,0,1.638,0.168,2.546,0.499c0.914,1.821,4.064,8.435,4.479,13.792
                                                                c-0.228,1.551-2.038,13.791-3.029,17.721l-0.472,1.867h1.926h29.9c1.345,0,2.397,0.306,3.045,0.885
                                                                c0.514,0.459,0.774,1.085,0.774,1.861c0,2.268-2.444,5.547-6.864,5.547v3c1.345,0,2.398,0.307,3.046,0.886
                                                                c0.515,0.46,0.775,1.089,0.775,1.867c0,2.271-2.443,5.558-6.862,5.558v3c1.344,0,2.396,0.306,3.043,0.884
                                                                c0.514,0.458,0.773,1.084,0.773,1.859c0,2.269-2.445,5.55-6.868,5.55v3c1.345,0,2.398,0.306,3.046,0.885
                                                                c0.514,0.459,0.774,1.086,0.774,1.863c0,2.27-2.445,5.553-6.865,5.553h-37.07c-1.098,0-2.341-0.802-3.544-1.576
                                                                c-1.343-0.865-2.611-1.683-4.025-1.683h-5.094c-1.67-1.671-8.43-9.861-1.402-27.248c1.659-0.98,7.46-4.46,10.095-6.703
                                                                c3.071-2.606,15.595-22.568,15.595-25.682c0-2.109-0.199-10.03-0.26-12.409C-889.064,83.347-888.235,82.894-886.954,82.895
                                                                 M-886.954,81.395c-2.772-0.001-4.055,1.648-4.055,1.648s0.276,10.59,0.276,13.036s-12.104,22.025-15.065,24.538
                                                                c-2.961,2.521-10.32,6.811-10.32,6.811c-8.78,21.189,2.016,29.784,2.016,29.784s2.191,0,5.677,0c2.106,0,4.71,3.259,7.569,3.259
                                                                c13.284,0,32.424,0,37.07,0c8.865,0,11.913-11.301,3.045-11.301c8.868,0,11.916-11.293,3.052-11.293
                                                                c8.864,0,11.909-11.311,3.041-11.311c8.868,0,11.909-11.293,3.045-11.293c-6.075,0-29.9,0-29.9,0
                                                                c1.085-4.301,3.083-18.033,3.083-18.033c-0.451-6.659-4.91-15.034-4.91-15.034C-884.742,81.613-885.947,81.395-886.954,81.395
                                                                L-886.954,81.395z"/>
                                                        </g>
                                                        <path fill="#FFFFFF" stroke="#13110C" stroke-width="0.2892" d="M-869.161,115.792"/>
                                                        <path fill="#5B719F" d="M-886.963,81.391c1.015,0,2.215,0.225,3.632,0.815c0,0,4.459,8.375,4.91,15.034
                                                            c0,0-1.998,13.732-3.083,18.033c0,0,23.825,0,29.9,0c8.864,0,5.823,11.293-3.045,11.293c8.868,0,5.823,11.311-3.041,11.311
                                                            c8.864,0,5.816,11.293-3.052,11.293c8.868,0,5.82,11.301-3.045,11.301c-4.646,0-23.786,0-37.07,0c-2.859,0-5.463-3.259-7.569-3.259
                                                            c-3.485,0-5.677,0-5.677,0s-10.796-8.595-2.016-29.784c0,0,7.359-4.29,10.32-6.811c2.961-2.513,15.065-22.092,15.065-24.538
                                                            s-0.276-13.036-0.276-13.036S-889.731,81.391-886.963,81.391"/>
                                                        <path fill="#5B719F" d="M-915.352,122.014v41.449h-24.843l-3.262-41.449H-915.352 M-915.352,117.958h-28.104
                                                            c-1.116,0-2.201,0.473-2.961,1.315c-0.777,0.822-1.151,1.929-1.061,3.049l3.252,41.466c0.164,2.089,1.91,3.73,4.031,3.73h24.843
                                                            c2.236,0,4.042-1.816,4.042-4.056v-41.449C-911.31,119.771-913.115,117.958-915.352,117.958L-915.352,117.958z"/>
                                                        <path d="M70.559-24.078c0.949-0.945,0.656-2.857-0.988-2.857l-4.327,0.003c0.164-0.917,0.402-2.436,0.393-2.58
                                                            c-0.091-1.358-0.958-3.011-0.994-3.079c-0.157-0.294-0.955-0.693-1.758-0.521c-1.038,0.222-1.144,0.883-1.14,1.066
                                                            c0,0,0.046,1.81,0.05,2.292c-0.495,1.089-2.206,3.952-2.725,4.173c-0.124-0.075-0.266-0.115-0.411-0.115h-5.467
                                                            c-0.463,0-0.838,0.375-0.838,0.837l0.001,7.555c0.032,0.408,0.378,0.727,0.787,0.727h4.908c0.436,0,0.79-0.354,0.79-0.789v-0.251
                                                            c0,0,0.183-0.012,0.265,0.04c0.315,0.201,0.706,0.453,1.215,0.453h7.328c2.737,0,2.444-2.431,2.194-2.764
                                                            c0.462-0.504,0.749-1.392,0.358-2.095C70.502-22.3,71.031-23.174,70.559-24.078z M69.281-24.142l-0.045,0.187
                                                            c1.263,0.359,0.591,1.813-0.313,1.909l-0.045,0.187c1.21,0.308,0.634,1.806-0.313,1.908l-0.045,0.186
                                                            c0.988,0.162,0.75,1.849-0.748,1.849l-7.452,0.003c-0.526,0-1.004-0.6-1.393-0.6H58.59v-5.803c0.421-0.262,0.938-0.6,1.227-0.845
                                                            c0.543-0.463,2.768-4.059,2.768-4.509s-0.051-2.396-0.051-2.396s0.438-0.562,1.411-0.152c0,0,0.819,1.537,0.903,2.762
                                                            c0,0-0.368,2.523-0.567,3.314h5.166C70.712-26.143,70.47-24.33,69.281-24.142z"/>
                                                        <path fill="#FFFFFF" d="M14.586,8.149c0.372-0.461,0.479-1.12,0.256-1.659c-0.217-0.524-0.691-0.825-1.302-0.825l-3.046,0.002
                                                            c0.098-0.567,0.268-1.612,0.257-1.762c-0.074-1.129-0.789-2.459-0.794-2.467c-0.201-0.381-1-0.656-1.615-0.524
                                                            C7.289,1.139,7.273,1.89,7.275,1.976c0,0,0.032,1.274,0.037,1.708C6.898,4.573,5.816,6.318,5.436,6.673
                                                            C5.34,6.638,5.24,6.62,5.14,6.62H0.929c-0.488,0-0.885,0.397-0.885,0.885l0.003,5.835c0.033,0.438,0.404,0.782,0.844,0.782h3.78
                                                            c0.422,0,0.771-0.308,0.837-0.711c0.236,0.142,0.536,0.29,0.91,0.29h5.643c1.143,0,1.641-0.516,1.857-0.948
                                                            c0.252-0.503,0.218-1.068,0.113-1.382c0.323-0.429,0.497-1.064,0.279-1.614C14.576,9.409,14.841,8.798,14.586,8.149z M13.28,7.818
                                                            l-0.16,0.025L13,8.369l0.22,0.062c0.255,0.072,0.376,0.211,0.359,0.411c-0.022,0.252-0.267,0.558-0.562,0.589l-0.171,0.018
                                                            l-0.123,0.54l0.228,0.058c0.243,0.062,0.359,0.198,0.345,0.402c-0.019,0.255-0.25,0.562-0.554,0.596l-0.17,0.018l-0.132,0.56
                                                            l0.255,0.042c0.26,0.042,0.261,0.285,0.254,0.358c-0.022,0.283-0.28,0.589-0.792,0.589l-5.738,0.002
                                                            c-0.148,0-0.319-0.111-0.486-0.219c-0.186-0.12-0.377-0.243-0.586-0.243H5.327V8.055c0.396-0.251,0.686-0.453,0.859-0.602
                                                            c0.372-0.317,2.215-3.17,2.215-3.654c0-0.291-0.026-1.39-0.035-1.742c0.099-0.069,0.363-0.141,0.67-0.03
                                                            c0.136,0.271,0.579,1.198,0.632,1.901C9.666,3.948,9.385,5.866,9.235,6.457L9.16,6.755h4.286c0.315,0,0.396,0.187,0.408,0.343
                                                            C13.877,7.398,13.665,7.758,13.28,7.818z"/>
                                                    </svg>

                                                </span>
                                                <span class="text">Like</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if ($twit != null): ?>
                                        <li class="twitter">
                                            <a href="<?php echo $twit; ?>" target="_blank" class="popup" onClick="_gaq.push(['_trackEvent', 'social', 'Twitter', 'Follow <?php the_field('athlete_name'); ?>',<?php the_ID(); ?>, false]);">
                                                <span class="icon">
                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                         width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
                                                    <path d="M24.253,8.756C24.689,17.08,18.297,24.182,9.97,24.62c-3.122,0.162-6.219-0.646-8.861-2.32
                                                        c2.703,0.179,5.376-0.648,7.508-2.321c-2.072-0.247-3.818-1.661-4.489-3.638c0.801,0.128,1.62,0.076,2.399-0.155
                                                        C4.045,15.72,2.215,13.6,2.115,11.077c0.688,0.275,1.426,0.407,2.168,0.386c-2.135-1.65-2.729-4.621-1.394-6.965
                                                        C5.575,7.816,9.54,9.84,13.803,10.071c-0.842-2.739,0.694-5.64,3.434-6.482c2.018-0.623,4.212,0.044,5.546,1.683
                                                        c1.186-0.213,2.318-0.662,3.329-1.317c-0.385,1.256-1.247,2.312-2.399,2.942c1.048-0.106,2.069-0.394,3.019-0.851
                                                        C26.275,7.229,25.39,8.196,24.253,8.756z"/>
                                                    </svg>
                                               </span>
                                                <span class="text">Follow</span>
                                            </a>
                                        </li>
                                    <?php endif;?>
                                    <?php if ($insta != null): ?>
                                        <li class="instagram">
                                            <a href="<?php echo $insta; ?>" target="_blank" class="popup" onClick="_gaq.push(['_trackEvent', 'social', 'Twitter', 'Follow <?php the_field('athlete_name'); ?>',<?php the_ID(); ?>, false]);">
                                                <span class="icon">
                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                         width="18px" height="18px" viewBox="0 0 18 18" enable-background="new 0 0 18 18" xml:space="preserve">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M2.341,0.038h13.322c1.266,0,2.299,1.035,2.299,2.301v13.323
                                                            c0,1.266-1.033,2.3-2.299,2.3H2.341c-1.266,0-2.303-1.034-2.303-2.3V2.339C0.038,1.073,1.075,0.038,2.341,0.038L2.341,0.038z
                                                             M13.095,2.029c-0.443,0-0.807,0.362-0.807,0.808v1.931c0,0.443,0.363,0.808,0.807,0.808h2.028c0.445,0,0.807-0.364,0.807-0.808
                                                            V2.837c0-0.445-0.361-0.808-0.807-0.808H13.095L13.095,2.029z M15.938,7.618h-1.58c0.15,0.487,0.232,1.003,0.232,1.538
                                                            c0,2.981-2.495,5.396-5.573,5.396c-3.076,0-5.572-2.415-5.572-5.396c0-0.535,0.082-1.051,0.232-1.538H2.029v7.571
                                                            c0,0.392,0.322,0.715,0.715,0.715h12.479c0.393,0,0.715-0.323,0.715-0.715V7.618L15.938,7.618z M9.018,5.474
                                                            c-1.988,0-3.601,1.562-3.601,3.487s1.612,3.488,3.601,3.488c1.989,0,3.602-1.562,3.602-3.488S11.007,5.474,9.018,5.474z"/>
                                                    </svg>
                                               </span>
                                                <span class="text">Follow</span>
                                            </a>
                                        </li>
                                    <?php endif;?>
                                </ul>  <!-- end of like + follow buttons -->

                        <?php } ?>

                    </div>
                </div>
            </section>




            <section class="detail single_detail">
                <article>
                    <div class="meet">
                    <div class="top">
                    </div>
                    <section>

                        <a href='#ign-product-levels' class='button transparent support_button'>Support</a>




                        <div class='copy'>

                            <?php $image_before = get_field('image_before'); ?>
                            <img width='608' src='<?php echo $image_before[sizes]['large']; ?>' />




                            <?php the_field('content'); ?>

                            <?php $image_after = get_field('image_after'); ?>
                            <img width='608' src='<?php echo $image_after[sizes]['large']; ?>' />

                            <?php if(get_field('video')){ ?>
                                <div class="vd">
                                    <?php the_field('video'); ?>
                                </div>
                            <?php } ?>
                        </div>





                        <small class='help_cta'>Help this project by sharing</small>
                        <ul class="rrssb-buttons clearfix end_share_buttons">
                            <li class="facebook">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo the_permalink(); ?>" target="_blank" class="popup" onClick="_gaq.push(['_trackEvent', 'social', 'Facebook', 'Like <?php the_field('athlete_name'); ?>', <?php the_ID(); ?>, false]);">
                                    <span class="icon">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
                                            <path d="M27.825,4.783c0-2.427-2.182-4.608-4.608-4.608H4.783c-2.422,0-4.608,2.182-4.608,4.608v18.434
                                                c0,2.427,2.181,4.608,4.608,4.608H14V17.379h-3.379v-4.608H14v-1.795c0-3.089,2.335-5.885,5.192-5.885h3.718v4.608h-3.726
                                                c-0.408,0-0.884,0.492-0.884,1.236v1.836h4.609v4.608h-4.609v10.446h4.916c2.422,0,4.608-2.188,4.608-4.608V4.783z"/>
                                        </svg>
                                    </span>
                                    <span class="text">facebook</span></a></li>
                            <li class="twitter">
                                <a href="http://twitter.com/home?status=I%20just%20supported%20this%20great%20campaign%20on%20@pledgesports%20check%20it%20out!%20<?php echo the_permalink(); ?>%20%23support" target="_blank" class="popup" onClick="_gaq.push(['_trackEvent', 'social', 'Twitter', 'Follow <?php the_field('athlete_name'); ?>',<?php the_ID(); ?>, false]);">
                                    <span class="icon">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
                                        <path d="M24.253,8.756C24.689,17.08,18.297,24.182,9.97,24.62c-3.122,0.162-6.219-0.646-8.861-2.32
                                            c2.703,0.179,5.376-0.648,7.508-2.321c-2.072-0.247-3.818-1.661-4.489-3.638c0.801,0.128,1.62,0.076,2.399-0.155
                                            C4.045,15.72,2.215,13.6,2.115,11.077c0.688,0.275,1.426,0.407,2.168,0.386c-2.135-1.65-2.729-4.621-1.394-6.965
                                            C5.575,7.816,9.54,9.84,13.803,10.071c-0.842-2.739,0.694-5.64,3.434-6.482c2.018-0.623,4.212,0.044,5.546,1.683
                                            c1.186-0.213,2.318-0.662,3.329-1.317c-0.385,1.256-1.247,2.312-2.399,2.942c1.048-0.106,2.069-0.394,3.019-0.851
                                            C26.275,7.229,25.39,8.196,24.253,8.756z"/>
                                        </svg>
                                   </span>
                                    <span class="text">twitter</span></a></li>
                            <li class="email">
                                <?php $the_title = str_replace(' ', '%20', get_the_title()); ?>
<a href="mailto:?subject=<?php echo $the_title; ?>&amp;body=I%20just%20supported%20this%20great%20campaign%20on%20www.pledgesports.org.%20Check%20it%20out!%20<?php echo the_permalink(); ?>You%20can%20support%20and%20become%20a%20part%20of%20their%20success%20too!" onClick="_gaq.push(['_trackEvent', 'social', 'Email', 'Email <?php the_field('athlete_name'); ?>',<?php the_ID(); ?>, false]);">
                                    <span class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve"><g><path d="M20.111 26.147c-2.336 1.051-4.361 1.401-7.125 1.401c-6.462 0-12.146-4.633-12.146-12.265 c0-7.94 5.762-14.833 14.561-14.833c6.853 0 11.8 4.7 11.8 11.252c0 5.684-3.194 9.265-7.399 9.3 c-1.829 0-3.153-0.934-3.347-2.997h-0.077c-1.208 1.986-2.96 2.997-5.023 2.997c-2.532 0-4.361-1.868-4.361-5.062 c0-4.749 3.504-9.071 9.111-9.071c1.713 0 3.7 0.4 4.6 0.973l-1.169 7.203c-0.388 2.298-0.116 3.3 1 3.4 c1.673 0 3.773-2.102 3.773-6.58c0-5.061-3.27-8.994-9.303-8.994c-5.957 0-11.175 4.673-11.175 12.1 c0 6.5 4.2 10.2 10 10.201c1.986 0 4.089-0.43 5.646-1.245L20.111 26.147z M16.646 10.1 c-0.311-0.078-0.701-0.155-1.207-0.155c-2.571 0-4.595 2.53-4.595 5.529c0 1.5 0.7 2.4 1.9 2.4 c1.441 0 2.959-1.828 3.311-4.087L16.646 10.068z"/></g>
                                        </svg>
                                    </span>
                                    <span class="text">email</span></a></li>
                            <li class="linkedin">
                                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo the_permalink(); ?>&amp;title=<?php echo $the_title; ?>&amp;summary=I%20just%20supported%20this%20great%20campaign%20on%20www.pledgesports.org.%20Check%20it%20out!%20<?php echo the_permalink(); ?>You%20can%20support%20and%20become%20a%20part%20of%20their%20success%20too!" target="_blank" class="popup" onClick="_gaq.push(['_trackEvent', 'social', 'LinkedIn', 'Linkedin <?php the_field('athlete_name'); ?>',<?php the_ID(); ?>, false]);">
                                    <span class="icon">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
                                            <path d="M25.424,15.887v8.447h-4.896v-7.882c0-1.979-0.709-3.331-2.48-3.331c-1.354,0-2.158,0.911-2.514,1.803
                                                c-0.129,0.315-0.162,0.753-0.162,1.194v8.216h-4.899c0,0,0.066-13.349,0-14.731h4.899v2.088c-0.01,0.016-0.023,0.032-0.033,0.048
                                                h0.033V11.69c0.65-1.002,1.812-2.435,4.414-2.435C23.008,9.254,25.424,11.361,25.424,15.887z M5.348,2.501
                                                c-1.676,0-2.772,1.092-2.772,2.539c0,1.421,1.066,2.538,2.717,2.546h0.032c1.709,0,2.771-1.132,2.771-2.546
                                                C8.054,3.593,7.019,2.501,5.343,2.501H5.348z M2.867,24.334h4.897V9.603H2.867V24.334z"/>
                                        </svg>
                                    </span>
                                    <span class="text">linkedin</span></a></li>
                            <li class="googleplus">
<a href="https://plus.google.com/share?url=I%20just%20supported%20this%20great%20campaign%20on%20www.pledgesports.org.%20Check%20it%20out!%20<?php echo the_permalink(); ?>You%20can%20support%20and%20become%20a%20part%20of%20their%20success%20too!" target="_blank" class="popup" onClick="_gaq.push(['_trackEvent', 'social', 'Google+', 'Google+ <?php the_field('athlete_name'); ?>',<?php the_ID(); ?>, false]);">
                                    <span class="icon">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M14.703,15.854l-1.219-0.948c-0.372-0.308-0.88-0.715-0.88-1.459c0-0.748,0.508-1.223,0.95-1.663
                                                        c1.42-1.119,2.839-2.309,2.839-4.817c0-2.58-1.621-3.937-2.399-4.581h2.097l2.202-1.383h-6.67c-1.83,0-4.467,0.433-6.398,2.027
                                                        C3.768,4.287,3.059,6.018,3.059,7.576c0,2.634,2.022,5.328,5.604,5.328c0.339,0,0.71-0.033,1.083-0.068
                                                        c-0.167,0.408-0.336,0.748-0.336,1.324c0,1.04,0.551,1.685,1.011,2.297c-1.524,0.104-4.37,0.273-6.467,1.562
                                                        c-1.998,1.188-2.605,2.916-2.605,4.137c0,2.512,2.358,4.84,7.289,4.84c5.822,0,8.904-3.223,8.904-6.41
                                                        c0.008-2.327-1.359-3.489-2.829-4.731H14.703z M10.269,11.951c-2.912,0-4.231-3.765-4.231-6.037c0-0.884,0.168-1.797,0.744-2.511
                                                        c0.543-0.679,1.489-1.12,2.372-1.12c2.807,0,4.256,3.798,4.256,6.242c0,0.612-0.067,1.694-0.845,2.478
                                                        c-0.537,0.55-1.438,0.948-2.295,0.951V11.951z M10.302,25.609c-3.621,0-5.957-1.732-5.957-4.142c0-2.408,2.165-3.223,2.911-3.492
                                                        c1.421-0.479,3.25-0.545,3.555-0.545c0.338,0,0.52,0,0.766,0.034c2.574,1.838,3.706,2.757,3.706,4.479
                                                        c-0.002,2.073-1.736,3.665-4.982,3.649L10.302,25.609z"/>
                                                    <polygon points="23.254,11.89 23.254,8.521 21.569,8.521 21.569,11.89 18.202,11.89 18.202,13.604 21.569,13.604 21.569,17.004
                                                        23.254,17.004 23.254,13.604 26.653,13.604 26.653,11.89      "/>
                                                </g>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="text">google+</span></a></li>
                        </ul> <!-- end of sharing buttons -->

















                    </section>
                    <div class="bottom">
                    </div>




                    <?php if( have_rows('achievements') ): ?>
                        <div class="top">
                        </div>
                        <section>
                            <div class="ignitiondeck">
                                <h3 class="js_slide product-dashed-heading"><span class="sign">+</span>Achievements</h3>
                                <div class='repeater_in copy'>
                                    <?php while ( have_rows('achievements') ) : the_row(); ?>
                                        <h2><?php the_sub_field('title'); ?></h2>
                                        <p><?php the_sub_field('copy'); ?></p>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </section>
                        <div class="bottom">
                        </div>
                    <?php endif; ?>




                    <?php if( have_rows('updates') ): ?>
                        <div class="top">
                        </div>
                        <section>
                            <div class="ignitiondeck">
                                <h3 class="js_slide product-dashed-heading1"><span class="sign">+</span>Thank Yous and Updates</h3>
                                <div class='repeater_in copy'>
                                    <?php while ( have_rows('updates') ) : the_row(); ?>
                                        <h2><?php the_sub_field('title'); ?></h2>
                                        <p><?php the_sub_field('copy'); ?></p>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </section>
                        <div class="bottom">
                        </div>
                    <?php endif; ?>



                    <?php if( have_rows('faqs') ): ?>
                        <div class="top">
                        </div>
                        <section>
                            <div class="ignitiondeck">
                                <h3 class="js_slide product-dashed-heading"><span class="sign">+</span>The Project FAQ's</h3>
                                <div class='repeater_in copy'>
                                    <?php while ( have_rows('faqs') ) : the_row(); ?>
                                        <h2><?php the_sub_field('title'); ?></h2>
                                        <p><?php the_sub_field('copy'); ?></p>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </section>
                        <div class="bottom">
                        </div>
                    <?php endif; ?>


                    </div>








                    <div class="support">

                        <aside id="sidebar">
<!--                             <h3 id="ign-levels-headline"><?php echo the_title(); ?></h3>
                            <h4 class='support_levels'>Support Levels</h4> -->



                    <?php
                        $num = 1;
                        $radio = get_fields();
                        $supporters = showSupportersByProject(get_the_id());
                        $num = count($supporters);
                        $choice = $radio["show_hide_supporters"];
                        if($choice != "no"){ ?>
                        <?php if(showSupportersByProject(get_the_id()) != null){ ?>
                                <section class="ignitiondeck nb_backers">
                                    <h3 class="js_slide product-dashed-heading"><?= $num ?><small>Supporters</small></h3>
                                    <div class='repeater_in copy'>
                                        <section class="how copy">
                                            <table>
                                                <tbody>
                                                    <?php
                                                        $supporters = showSupportersByProject(get_the_id());
                                                        foreach($supporters as $supporter){ ?>
                                                        <tr>
                                                            <td class="s_t_name"><?php echo $supporter["user_name"]; ?></td>
                                                            <td><?php echo $supporter["amount"]; ?></td>
                                                            <td><?php echo substr($supporter["date"], 0, 10); ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            <p>...Be one of them!</p>
                                        </section>
                                    </div>
                            </section>
                        <?php } ?>
                    <?php } ?>




                    <?php if (get_field('enable_disable_donations') != 'disable') { ?>
                            <div id="ign-product-levels" data-projectid="41">
                                <a href='/support?project=<?php echo get_the_ID();?>' class='button support_button'>
                                    <span class='cta_text'>Support</span>
                                    <span class='subtitle'>Choose your own payment</span>
                                </a>
                                <section class="small left">

                                    <?php if( have_rows('fund_levels') ):
                                    // loop through the rows of data
                                        while ( have_rows('fund_levels') ) : the_row(); ?>
                                            <a class="level-binding <?php if ((getTakenLevels(get_sub_field('cost'), get_the_id()) >= get_sub_field('limit')) && (get_sub_field('limited'))) { ?>disabled<?php } ?> "
                                                <?php if (get_sub_field('limited')): ?>
                                                    <?php if (getTakenLevels(get_sub_field('cost'), get_the_id()) < get_sub_field('limit')):?>
                                                    href="/support?project=<?php echo get_the_id(); ?>&amount=<?php echo get_sub_field('cost') * 100; ?>"
                                                    <?php endif;?>
                                                 <?php else: ?>
                                                    href="/support?project=<?php echo get_the_id(); ?>&amount=<?php echo get_sub_field('cost') * 100; ?>"
                                                 <?php endif;?>>

                                                <div class="level-group">
                                                    <div class="ign-level-title">
                                                        <h1 class="red"><?php echo getCurrencyCode(get_field("currency"));?><?php the_sub_field('cost'); ?> <?php the_sub_field('title'); ?></h1>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="ign-level-desc">
                                                        <?php the_sub_field('description'); ?>
                                                    </div>

                                                    <div class="ign-level-counts">
                                                        <?php if (get_sub_field('limited')): ?>
                                                                <span><b><?php echo getTakenLevels(get_sub_field('cost'), get_the_id());?></b> out of <b><?php the_sub_field('limit'); ?></b> taken.</span>

                                                        <?php else: ?>
                                                                <span><b><?php echo getTakenLevels(get_sub_field('cost'), get_the_id());?></b> taken.</span>
                                                         <?php endif; ?>
                                                       </div>


                                                </div>
                                            </a>
                                        <?php endwhile;

                                    endif; ?>

                                </section>

                                <a href='/support?project=<?php echo get_the_ID();?>' class='button support_button'>
                                    <span class='cta_text'>Support</span>
                                    <span class='subtitle'>Choose your own payment</span>
                                </a>
                            </div>
                        <?php } ?>
                            <div class="clear"></div>
                        </aside>
                    </div>
                    <aside class="comments_out">
                        <?php comments_template( ); ?>
                    </aside>
                </article>
            </section>
        </article>
    <div class="clear"></div>
    </div>








    <script>


        jQuery(document).ready(function($){
            $('.repeater_in').hide();

            $('.js_slide ').click(function() {
                $(this).next().slideToggle();
                $(this).toggleClass('open');
            });


        }); // END jQuery document ready function




    </script>



    <?php endwhile; ?>



<?php get_footer(); ?>
