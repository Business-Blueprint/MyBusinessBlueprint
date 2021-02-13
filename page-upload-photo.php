<?php 

get_header(); ?> 

<main id="content" class="content">
	<div class="container">
        <section class="photo-uploader-form">
		  	<h2>Step 1: Upload an Image</h2>
		  	<form action="<?php echo esc_url( admin_url('admin-ajax.php') ) ?>" id="uploaderForm" method="POST"  enctype="multipart/form-data" autocomplete="off">
		  	    <p>Supported File Format: PNG & JPEG</p> 
			 	<input type="hidden" name="action" value="upload_new_photo" />
	   			<?php wp_nonce_field( 'update_photo_action', 'update_photo_field' ); ?>
		  		<div class="img-inner">
		  		  <input type="file" name="image" size="30" id="tempImage" required/>
		  		</div> 
		  		<input type="submit" name="upload" id="uploadPhoto" class="button button--success" value="Upload Photo" />
		  		<div class="upload-status"></div>
		  	</form>
			<h2>Step 2: Crop The Image</h2> 
		  	<div class="photoCropper">
		  		<div class="inner-crop">
		  		   <span>Image will show up here!</span>
		  		</div>
				<form action="<?php echo esc_url( admin_url('admin-ajax.php') ) ?>" method="POST"  enctype="multipart/form-data" autocomplete="off">
				 	<input type="hidden" name="action" value="update_profile_photo" />
		   			<?php wp_nonce_field( 'update_photo_action', 'update_photo_field' ); ?>
					<input type="hidden" id="x" name="x" />
					<input type="hidden" id="y" name="y" />
					<input type="hidden" id="w" name="w" />
					<input type="hidden" id="h" name="h" />
					<h2>Step 3: Submit The New Image</h2>
					<button type="submit" value="Crop Image" id="submitCropImage" class="button button--success" >Crop and Submit</button>
				</form>
		  	</div>
		    <div class="spin-loader">
	     	 <span class="fa fa-spinner fa-spin spin-normal"></span>
	        </div>
		</section>  	
	</div>			
</main>

<?php get_footer(); ?>