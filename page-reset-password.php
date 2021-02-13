<?php

get_header()
?>
<header class="banner" <?php themezero_the_banner_image(); ?>>
	<div class="container">
		<h1 class="banner__title" itemprop="headline">
			<?php cascade_the_banner_title(); ?>
		</h1>

		<div class="banner__subtitle"></div>
	</div>
</header>
<div class="container">	
	<?php
			global $wpdb;

			$error = '';
			$success = '';

			// check if we're in reset form
			if( isset( $_POST['action'] ) && 'reset' == $_POST['action'] && isset( $_POST['user_password'] ) )
			{
				$current_user = wp_get_current_user();

				$email = $current_user->user_email;

				if( ! isset( $_POST['pwd_reset_field'] ) || ! wp_verify_nonce( $_REQUEST['pwd_reset_field'], 'pwd_reset_action' ) ) {

					$error = 'Unable to verify wp nonce';
				}

				if( empty( $email ) ) {
					$error = 'Enter a username or e-mail address..';
				} else if( ! is_email( $email )) {
					$error = 'Invalid username or e-mail address.';
				} else if( ! email_exists( $email ) ) {
					$error = 'There is no user registered with that email address.';


				} else {

					$password = $_POST['user_password'];
					$user = get_user_by( 'email', $email );


					$update_user = wp_update_user( array (
							'ID' => $user->ID,
							'user_pass' => $password
						)
					 );
					
					unset($_POST);


					// if  update user return true then lets send user an email containing the new password
					if( ! is_wp_error( $update_user ) ) {

						$to = $email;
						$subject = '[My Business Blueprint] Your new password';
						$sender = get_option('name');

						
						$success = 'Password has been successfully changed';

						

					} else {
						$error = 'Oops something went wrong updating your account.';
					}

				}

			}

			if( is_user_logged_in() ) {

				$id = get_current_user_id();
				$user = get_user_by('id', $id);	

			}

			?>
			<!--html code-->
			<?php if( $id ) : 

				if( ! empty( $error ) )
					echo '<div class="message"><p class="rfp-error"><strong>ERROR:</strong> '. $error .'</p></div>';

				if( ! empty( $success ) )
					echo '<div class="error_login"><p class="rfp-success">'. $success .'</p></div>';
			?>
				<form method="post" class="reset-password-form">
				    <?php 
				    	$rand = rand(); 
				    	$_SESSION['rand'] = $rand;
				    ?>
				
							<?php $user_login = isset( $_POST['user_login'] ) ? $_POST['user_login'] : ''; ?>

							<input type="hidden" name="randcheck"  value="<?php echo $rand; ?>" /> 

							<?php wp_nonce_field('pwd_reset_action', 'pwd_reset_field') ?>
							<p><label for="user_login">Enter your new password</label><input type="password" name="user_password" id="user_password" required/></p>
							<p><label for="user_login">Confirm new password</label><input type="password" name="retype_password" required/></p>
							<span id="password-strength"></span>
							<p class="password_hint"><?php echo __( 'Hint: To make it stronger, use upper and lower case letters, numbers, and symbols like ! " ? $ % ^ &amp; ).' ) ?></p>
						<p>
							<input type="hidden" name="action" value="reset" />
							<input type="submit" name="submit" value="Update Password" class="button" id="submit" />
						</p>
				
				</form>
			<?php else: ?>
				<p>Please login to view this page.</p>
			<?php endif; ?>	
</div>		
<style>
	.reset-password-form .button-error {
	    background: #2b2a2a !important;
	    cursor: no-drop;
	}
</style>
<script>
	(function(){
		function checkPasswordStrength( $pass1,
		                                $pass2,
		                                $strengthResult,
		                                $submitButton,
		                                blacklistArray ) {
		    var pass1 = $pass1.val();
		    var pass2 = $pass2.val();
		 
		    // Reset the form & meter
		    $submitButton.attr( 'disabled', 'disabled' );
		    $submitButton.addClass('button-error');
	

		    $strengthResult.removeClass( 'short bad good strong label label-danger label-success' );
		 
		    // Extend our blacklist array with those from the inputs & site data
		    blacklistArray = blacklistArray.concat( wp.passwordStrength.userInputBlacklist() )
		 
		    // Get the password strength
		    var strength = wp.passwordStrength.meter( pass1, blacklistArray, pass2 );
		 
		    // Add the strength meter results
		    console.log(strength);
		    switch ( strength ) {
		 
		        case 2:
		            $strengthResult.addClass( 'bad label label-danger' ).html( pwsL10n.bad );
		            break;
		 
		        case 3:
		            $strengthResult.addClass( 'good label label-success' ).html( pwsL10n.good );
		            break;
		 
		        case 4:
		            $strengthResult.addClass( 'strong label label-success' ).html( pwsL10n.strong );
		            break;
		 
		        case 5:
		            $strengthResult.addClass( 'short label label-danger' ).html( pwsL10n.mismatch );
		            break;
		 
		        default:
		            $strengthResult.addClass( 'short label label-danger' ).html( pwsL10n.short );
		 
		    }
		 
		    // The meter function returns a result even if pass2 is empty,
		    // enable only the submit button if the password is strong and
		    // both passwords are filled up
		    if ( 3 === strength && '' !== pass2.trim() ) {
		        $submitButton.removeAttr( 'disabled' );
		        $submitButton.removeClass('button-error');
		    }
		 
		    return strength;
		}

		 
		jQuery( document ).ready( function( $ ) {
		    // Binding to trigger checkPasswordStrength
		    $( 'body' ).on( 'keyup', 'input[name=user_password], input[name=retype_password]',
		        function( event ) {
		            checkPasswordStrength(
		                $('input[name=user_password]'),    // First password field
		                $('input[name=retype_password]'), // Second password field
		                $('#password-strength'),           // Strength meter
		                $('input[type=submit]'),           // Submit button
		                ['black', 'listed', 'word', 'test', 'qwerty']        // Blacklisted words
		            );
		        }
		    );
		});

	})(jQuery)

</script>
<?php 

get_footer();
?>