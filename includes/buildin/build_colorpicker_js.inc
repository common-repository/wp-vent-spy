<?php
//build colorpicker scripts.
?>
<script type="text/javascript">
	// Color Picker Specific Ajax.
	jQuery(document).ready(function() {
		jQuery('#bgcolor').ColorPicker({
			color: '#<?php if(get_option('bgcolor') == ""){echo 'ffffff';}else{ echo get_option('bgcolor');} ?>',
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				jQuery('#bgcolor').css('backgroundColor', '#' + hex);
				jQuery('#bgcolor').val(hex);
			}
		});
		jQuery('#chcolor').ColorPicker({
			color: '#<?php if(get_option('chcolor') == ""){echo 'c4c4c4';}else{ echo get_option('chcolor');} ?>',
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				jQuery('#chcolor').css('backgroundColor', '#' + hex);
				jQuery('#chcolor').val(hex);
			}
		});
		jQuery('#uscolor').ColorPicker({
			color: '#<?php if(get_option('uscolor') == ""){echo '386DA1';}else{ echo get_option('uscolor');} ?>',
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				jQuery('#uscolor').css('backgroundColor', '#' + hex);
				jQuery('#uscolor').val(hex);
			}
		});
		jQuery('#adcolor').ColorPicker({
			color: '#<?php if(get_option('adcolor') == ""){echo '8F2E11';}else{ echo get_option('adcolor');} ?>',
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				jQuery('#adcolor').css('backgroundColor', '#' + hex);
				jQuery('#adcolor').val(hex);
			}
		});
		jQuery('#phcolor').ColorPicker({
			color: '#<?php if(get_option('phcolor') == ""){echo '98A019';}else{ echo get_option('phcolor');} ?>',
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				jQuery('#phcolor').css('backgroundColor', '#' + hex);
				jQuery('#phcolor').val(hex);
			}
		});
	});
</script>
<?php echo "\n\n"; ?>