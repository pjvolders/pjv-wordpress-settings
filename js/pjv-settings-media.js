jQuery(document).ready(function($){

	$('.pjv_settings_media_upload').click(function() {
		console.log("klik");
        var send_attachment_bkp = wp.media.editor.send.attachment;
        var button = $(this);

        wp.media.editor.send.attachment = function(props, attachment) {

            $(button).prev().prev().attr('src', attachment.url);
            $(button).prev().val(attachment.url);

            wp.media.editor.send.attachment = send_attachment_bkp;
        }

        wp.media.editor.open(button);

        return false;       
    });

});