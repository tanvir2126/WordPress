<?php


//admin.js start


(function( $ ){

	$( document ).ready( function(){

		$( 'button#button_er_id' ).live( "click", function( e ){
			e.preventDefault();
			
			var imageUploader;

			imageUploader = wp.media({
				'title' : 'Upload Author Image (array title)',
				'button' : {
							'text' : 'SelectImg(array button)'
							},
				'multiple' : true //Multiple Image Selection
			});

			imageUploader.open();

			var button = $( this );


			imageUploader.on( "select", function(){
			var	image = imageUploader.state().get( 'selection' ).first().toJSON();

			var image_link = image.url;

			button.next( "input.img_er_class_link" ).val( image_link );

			button.parent( ".total_image_er_div_class" ).find( 'img' ).attr( 'src', image_link );

			});
		});

	});
}(jQuery))


//admin.js end



//Function.php
public function form( $hey ){
?>
		<div class="total_image_er_div_class" style="margin: 10px 0;">
			<button id="button_er_id" class="button button-primary">Upload Image</button>
			<input type="hidden" value="<?php echo $hey['Author_box_image']; ?>"name="<?php echo $this->get_field_name('Author_box_image'); ?>" class="img_er_class_link" id="">
			<div class="image_show">
				<img src="<?php echo $hey['Author_box_image']; ?>" width="300" height="auto" alt="">
			</div>
		</div>
<?php
}
