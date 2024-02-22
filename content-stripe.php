
<!-- STRIPE STUFF -->

<section class="edit_connect_stripe">
    
<?php
        $cfg = searchConfigurationInfo();
	if ($cfg["test_mode"] == 1) { //sets the correct app client id and secret key 
		$app_client_id = $cfg["dev_app_client_id"];
	} else {
		$app_client_id = $cfg["prod_app_client_id"];
	}
        
    $details = $wpdb->get_row("SELECT * FROM wp_stripe_connect WHERE wp_user_id = ".get_current_user_id()."", ARRAY_A);
    if($details){ ?>
        <div class="form-username field stripe_data_hide">
            <label for="stripe_user_id">Stripe User ID:</label>
            <input readonly class="text-input" name="stripe_user_id" type="text" id="stripe_user_id" value="<?= $details['stripe_user_id'] ?>" />
        </div>
                    <div class="form-username field stripe_data_hide">
            <label for="access_token">Access Token</label>
            <input readonly class="text-input" name="access_token" type="text" id="access_token" value="<?= $details['stripe_access_token'] ?>" />
        </div>
                    <div class="form-username field stripe_data_hide">
            <label for="refresh_token">Refresh Token</label>
            <input readonly class="text-input" name="refresh_token" type="text" id="refresh_token" value="<?= $details['stripe_refresh_token'] ?>" />
        </div>
                    <div class="form-username field stripe_data_hide">
            <label for="publishable_key">Publishable Key</label>
            <input readonly class="text-input" name="publishable_key" type="text" id="publishable_key" value="<?= $details['stripe_publishable_key'] ?>" />
        </div>
        
        <div class="stripe_title_icon_wrapper">
            <div class="stripe_title_icon_ok"></div>
        </div>
        <h2 id="stripe-connect-header">Connected to Stripe <br><b> You will now receive donations directly in your bank account</b></h2>   
        
       <? 
    } elseif ($code) { ?>
        <div class="form-username field stripe_data_hide">
            <label for="stripe_user_id">Stripe User ID:</label>
            <input readonly class="text-input" name="stripe_user_id" type="text" id="stripe_user_id" value="<?= $resp['stripe_user_id'] ?>" />
        </div>
                    <div class="form-username field stripe_data_hide">
            <label for="access_token">Access Token</label>
            <input readonly class="text-input" name="access_token" type="text" id="access_token" value="<?= $resp['access_token'] ?>" />
        </div>
                    <div class="form-username field stripe_data_hide">
            <label for="refresh_token">Refresh Token</label>
            <input readonly class="text-input" name="refresh_token" type="text" id="refresh_token" value="<?= $resp['refresh_token'] ?>" />
        </div>
                    <div class="form-username field stripe_data_hide">
            <label for="publishable_key">Publishable Key</label>
            <input readonly class="text-input" name="publishable_key" type="text" id="publishable_key" value="<?= $resp['stripe_publishable_key']  ?>" />
        </div>
        
        <div class="stripe_title_icon_wrapper">
            <div class="stripe_title_icon"></div>
        </div>
        <h2 id="stripe-connect-header">Connected to Stripe <br><b> Click Update to save Stripe account information</b></h2>        
    
    <?php } else { ?>
        <div class="stripe_title_icon_wrapper">
            <div class="stripe_title_icon"></div>
        </div>
        <h2 id="stripe-connect-header">Connect with Stripe <br><b>... And receive donations directly in your bank account</b></h2>
    
    
    <div class="form-password field">
        <label for=""></label>
            <a href="https://connect.stripe.com/oauth/authorize?response_type=code&client_id=<?= $app_client_id ?>&scope=read_write" class="stripe-connect dark"><span>Connect with Stripe</span></a>

    </div>
    <?php } ?>

    <p>PledgeSports payments are powered by Stripe. Stripe is the preferred payments provider for Twitter, Apple and many more.</p>
        
    <div class="secured_info_wrapper">
        <div class="secured_info">
            <p>
            Online payments with PledgeSports are safe and secure.
            <br>
            Contact
            <i>info@pledgesports.org</i>
            if you have any questions.
        </p>
        </div>
    </div>


    <div class="powered_stripe"> <!-- Stripe logo -->
        <a href="http://www.stripe.com" target="_blank">
            <svg class="stripe_logo" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 119 26" enable-background="new 0 0 119 26" xml:space="preserve">
            <path class="stripe_logo_shape" fill-rule="evenodd" clip-rule="evenodd" fill="#AEAEAE" d="M113,26H6c-3.3,0-6-2.7-6-6V6c0-3.3,2.7-6,6-6h107c3.3,0,6,2.7,6,6
                v14C119,23.3,116.3,26,113,26L113,26z M118,6c0-2.8-2.2-5-5-5H6C3.2,1,1,3.2,1,6v14c0,2.8,2.2,5,5,5h107c2.8,0,5-2.2,5-5V6L118,6z"
                />
            <path class="stripe_logo_shape" fill="#AEAEAE" d="M12.5,13.9h-0.7V17h-1.6V8.4h2.5c2,0,3.1,0.9,3.1,2.6C15.7,12.9,14.4,13.9,12.5,13.9L12.5,13.9z M12.5,9.7
                h-0.8v2.8h0.7c1.1,0,1.7-0.4,1.7-1.4C14.1,10.2,13.6,9.7,12.5,9.7L12.5,9.7z M19.2,17.1c-1.6,0-2.8-1.2-2.8-3.1c0-2,1.2-3.1,2.8-3.1
                c1.6,0,2.8,1.2,2.8,3.1C22,16,20.8,17.1,19.2,17.1L19.2,17.1z M19.2,12.1c-0.9,0-1.4,0.8-1.4,1.9c0,1.1,0.5,1.9,1.4,1.9
                c0.9,0,1.4-0.8,1.4-1.9C20.6,12.9,20.1,12.1,19.2,12.1L19.2,12.1z M29.4,17H28l-1.1-4l-1.1,4h-1.4l-1.8-5.9l1.5-0.2l1.1,4.1l1.1-4
                h1.3l1.1,4l1-4h1.4L29.4,17L29.4,17z M37.2,14.3h-3.9c0.1,1.2,0.7,1.7,1.6,1.7c0.8,0,1.4-0.3,2.1-0.7l0.2,1.2
                c-0.6,0.4-1.4,0.7-2.4,0.7c-1.7,0-2.9-1-2.9-3.1c0-2,1.2-3.1,2.7-3.1c1.8,0,2.6,1.4,2.6,3.1C37.2,14.1,37.2,14.2,37.2,14.3
                L37.2,14.3z M34.5,11.9c-0.6,0-1.1,0.5-1.2,1.5h2.4C35.6,12.4,35.3,11.9,34.5,11.9L34.5,11.9z M40,13.6V17h-1.5v-6h1.3l0.2,1.2
                c0.4-0.7,1-1.3,1.9-1.3l0.2,1.5C41.2,12.4,40.4,12.9,40,13.6L40,13.6z M48.1,14.3h-3.9c0.1,1.2,0.7,1.7,1.6,1.7
                c0.8,0,1.4-0.3,2.1-0.7l0.2,1.2c-0.6,0.4-1.4,0.7-2.4,0.7c-1.7,0-2.9-1-2.9-3.1c0-2,1.2-3.1,2.7-3.1c1.8,0,2.6,1.4,2.6,3.1
                C48.1,14.1,48.1,14.2,48.1,14.3L48.1,14.3z M45.4,11.9c-0.6,0-1.1,0.5-1.2,1.5h2.4C46.5,12.4,46.2,11.9,45.4,11.9L45.4,11.9z
                 M53.4,17l-0.1-0.8c-0.4,0.5-1,1-1.8,1c-1.3,0-2.3-0.9-2.3-3c0-2.2,1.2-3.2,2.6-3.2c0.6,0,1,0.1,1.4,0.2V8.3L54.6,8v9H53.4L53.4,17z
                 M53.1,12.4c-0.4-0.2-0.7-0.3-1.2-0.3c-0.8,0-1.4,0.6-1.4,2c0,1.2,0.5,1.7,1.2,1.7c0.5,0,1-0.3,1.4-0.8V12.4L53.1,12.4z M61.5,17.1
                c-0.9,0-1.7-0.1-2.5-0.4V8.3L60.6,8v3.6c0.4-0.4,0.9-0.8,1.7-0.8c1.3,0,2.3,0.9,2.3,3C64.5,16.1,63.3,17.1,61.5,17.1L61.5,17.1z
                 M61.9,12.2c-0.5,0-0.9,0.3-1.3,0.8v2.7c0.3,0.1,0.5,0.2,0.9,0.2c0.9,0,1.5-0.6,1.5-1.9C63,12.8,62.6,12.2,61.9,12.2L61.9,12.2z
                 M68.7,17.4c-0.5,1.4-1.2,1.9-2.3,1.9c-0.3,0-0.5,0-0.6-0.1L65.6,18c0.2,0,0.4,0.1,0.7,0.1c0.5,0,0.8-0.2,1.1-0.8l0.1-0.2l-2.2-5.9
                l1.6-0.2l1.4,4.3l1.3-4.2H71L68.7,17.4L68.7,17.4z"/>
            <path class="stripe_logo_shape" fill-rule="evenodd" clip-rule="evenodd" fill="#AEAEAE" d="M110.8,15h-4.2c0.1,0.5,0.2,0.7,0.5,1c0.2,0.2,0.6,0.3,1.1,0.3
                c0.8,0,1.5-0.2,2.2-0.5l0.3,1.7c-0.6,0.4-1.6,0.7-2.7,0.7c-1.2,0-2.1-0.3-2.7-0.9c-0.7-0.7-1.1-1.8-1.1-3.2c0-2.6,1.3-4.2,3.5-4.2
                c1.1,0,1.9,0.4,2.4,1.1c0.5,0.7,0.8,1.9,0.8,3.1C110.8,14.3,110.8,14.8,110.8,15L110.8,15z M107.5,11.6c-0.6,0-0.9,0.7-1,1.8h1.9
                C108.4,12.3,108.1,11.6,107.5,11.6L107.5,11.6z M99.7,18.1c-0.4,0-0.8-0.1-1.1-0.2v2.6L96,21V10h2.2l0.1,0.8c0.6-0.6,1.3-1,2-1
                c0.8,0,1.4,0.3,1.9,0.9c0.5,0.7,0.8,1.7,0.8,3c0,1.5-0.3,2.7-1,3.4C101.2,18,100.3,18.1,99.7,18.1L99.7,18.1z M99.5,11.8
                c-0.1,0-0.5,0.1-1,0.5v3.8c0.2,0.1,0.4,0.2,0.7,0.2c0.4,0,0.7-0.2,0.9-0.6c0.2-0.4,0.3-1,0.3-1.8C100.5,12.5,100.1,11.8,99.5,11.8
                L99.5,11.8z M93.5,8.9c-0.7,0-1.3-0.6-1.3-1.3c0-0.7,0.6-1.3,1.3-1.3c0.7,0,1.3,0.6,1.3,1.3C94.9,8.3,94.3,8.9,93.5,8.9L93.5,8.9z
                 M89.6,12.8V18H87v-8h2.2l0.2,0.9c0.2-0.7,0.7-1.1,1.4-1.1c0.2,0,0.3,0,0.5,0.1v2.4c-0.2,0-0.3,0-0.5,0
                C90.2,12.3,89.9,12.4,89.6,12.8L89.6,12.8z M84.6,11.9v3.3c0,0.6,0.2,0.8,0.7,0.8c0.2,0,0.6-0.1,0.7-0.1v2c-0.3,0.1-0.7,0.2-1.3,0.2
                c-0.9,0-1.5-0.2-1.9-0.5c-0.5-0.4-0.7-1.1-0.7-2v-3.7H81l0.4-1.8l0.8-0.1l0.3-1.9l2.2-0.4V10h1.6l-0.3,1.9H84.6L84.6,11.9z M78.5,13
                c1.4,0.5,2.3,1.1,2.3,2.5c0,0.9-0.3,1.5-0.9,2c-0.5,0.4-1.3,0.6-2.2,0.6c-1.1,0-2.3-0.3-2.9-0.7l0.3-1.9c0.7,0.4,1.8,0.7,2.4,0.7
                c0.5,0,0.8-0.2,0.8-0.5c0-0.3-0.3-0.6-1.2-0.9c-1.4-0.5-2.2-1.1-2.2-2.5c0-0.8,0.3-1.4,0.8-1.8c0.5-0.4,1.2-0.6,2.1-0.6
                c1.2,0,1.9,0.3,2.3,0.5l-0.3,1.9c-0.5-0.3-1.1-0.6-1.9-0.6c-0.4,0-0.7,0.2-0.7,0.5C77.3,12.5,77.7,12.7,78.5,13L78.5,13z M94.8,18
                h-2.6v-8h2.6V18L94.8,18z"/>
            </svg>
        </a>
    </div>
</section>