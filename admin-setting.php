<?php

add_action('admin_menu' , function()
{
    add_menu_page('تنظیمات استودیو 9' ,
        'تنظیمات استودیو 9' ,
        'manage_options' ,
        'acf' ,
        'acf_studio9_setting' ,
        plugins_url('wb-quiz/assets/images/icon.png') ,
        80);
});
function acf_studio9_setting()
{
    $acf_header_image = get_option( 'acf_header_image', 0 );
    $acf_footer_image = get_option( 'acf_footer_image', 0 );
    ?>
    <div class="wrap">
        <h1 id="add-new-user">تنظیمات</h1>
        <div id="ajax-response"></div>
        <p>تنظیمات مرتبط با افزونه آزمون ساز</p>
        <form method="post" name="createuser" id="createuser" class="validate" action="">
            <table class="form-table" role="presentation">
                <tbody>
                <tr class="form-field form-required">
                    <td>تصویر هدر فاکتور</td>
                    <td>
                        <?php wp_enqueue_media(); ?>
                        <div class='image-preview-wrapper'>
                            <img id='image-header-preview' src='<?=wp_get_attachment_image_url($acf_header_image,100,100)?>' width='100' height='100'
                                 style='max-height: 100px; width: 100px;'>
                        </div>
                        <input id="upload_image_header_button" type="button" class="button"
                               value="<?php _e('Upload image'); ?>"/>
                        <input type='hidden' name='image_header_attachment_id' id='image_header_attachment_id' value='<?=$acf_header_image?>'>
                    </td>
                </tr>
                <tr class="form-field form-required">
                    <td>تصویر فوتر فاکتور</td>
                    <td>
                        <?php wp_enqueue_media(); ?>
                        <div class='image-preview-wrapper'>
                            <img id='image-footer-preview' src='<?=wp_get_attachment_image_url($acf_footer_image,100,100)?>' width='100' height='100'
                                 style='max-height: 100px; width: 100px;'>
                        </div>
                        <input id="upload_image_footer_button" type="button" class="button"
                               value="<?php _e('Upload image'); ?>"/>
                        <input type='hidden' name='image_footer_attachment_id' id='image_footer_attachment_id' value='<?=$acf_footer_image?>'>
                    </td>
                </tr>
                </tbody>
            </table>
            <hr>
            <p class="submit"><input type="submit" name="btn-acf-studio9" id="createusersub" class="button button-primary"
                                     value="ذخیره تنظیمات"></p>
        </form>
    </div>
    <?php
    add_action( 'admin_footer', 'media_selector_print_scripts' );

    function media_selector_print_scripts() {

        $acf_header_image = get_option( 'acf_header_image', 0 );
        $acf_footer_image = get_option( 'acf_footer_image', 0 );
        ?>
        <script type='text/javascript'>
            attachment_upload_selector('#upload_image_header_button','#image-header-preview','#image_header_attachment_id',<?=$acf_header_image?>)
            attachment_upload_selector('#upload_image_footer_button','#image-footer-preview','#image_footer_attachment_id',<?=$acf_footer_image?>)
            function attachment_upload_selector(button,preview,input,$post_id){
                jQuery( document ).ready( function( $ ) {

                    // Uploading files
                    var file_frame;
                    var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
                    var set_to_post_id = $post_id; // Set this

                    jQuery(button).on('click', function( event ){

                        event.preventDefault();

                        // If the media frame already exists, reopen it.
                        if ( file_frame ) {
                            // Set the post ID to what we want
                            file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
                            // Open frame
                            file_frame.open();
                            return;
                        } else {
                            // Set the wp.media post id so the uploader grabs the ID we want when initialised
                            wp.media.model.settings.post.id = set_to_post_id;
                        }

                        // Create the media frame.
                        file_frame = wp.media.frames.file_frame = wp.media({
                            title: 'Select a image to upload',
                            button: {
                                text: 'Use this image',
                            },
                            multiple: false	// Set to true to allow multiple files to be selected
                        });

                        // When an image is selected, run a callback.
                        file_frame.on( 'select', function() {
                            // We set multiple to false so only get one image from the uploader
                            attachment = file_frame.state().get('selection').first().toJSON();

                            // Do something with attachment.id and/or attachment.url here
                            $( preview ).attr( 'src', attachment.url ).css( 'width', 'auto' );
                            $( input ).val( attachment.id );

                            // Restore the main post ID
                            wp.media.model.settings.post.id = wp_media_post_id;
                        });

                        // Finally, open the modal
                        file_frame.open();
                    });

                    // Restore the main ID when the add media button is pressed
                    jQuery( 'a.add_media' ).on( 'click', function() {
                        wp.media.model.settings.post.id = wp_media_post_id;
                    });
                });
            }

        </script>
        <?php
        print_r($_POST);
        if(isset($_POST['btn-acf-studio9'])){
            print_r($_POST);
            update_option('acf_header_image' , $_POST['image_header_attachment_id']);
            update_option('acf_footer_image' , $_POST['image_footer_attachment_id']);
        }

    }

}
