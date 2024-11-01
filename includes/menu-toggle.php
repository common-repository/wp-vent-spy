<script language='JavaScript' type='text/javascript'>
	jQuery(document).ready(function(){
		var tog = 1;
		jQuery('#button-area').css({ "display" : "none" });
		jQuery('#toggle-area').css({ "left" : "-4px" });
		jQuery('.toggle-area').click(function(){
			toggleMe();
		});
		jQuery('#refresh').click(function(){
				loadVspystatus();
				return false;
		});
		jQuery('#ventrilo').click(function(){
			document.location.href="http://ventrilo.com";
		});
		jQuery('#onykage').click(function(){
			document.location.href="http://superscriptz.net";
		});
		function toggleMe(){
			if(tog == 1){
				jQuery('#button-area').animate({ "left" : "-4px" },500);
				jQuery('#button-area').fadeIn(500);
				jQuery('#toggle-area').animate({ "left" : "34px" });
				
				tog = 0;
			}else{
				jQuery('#button-area').fadeOut(500);
				jQuery('#button-area').animate({ "left" : "-39px" },500);
				setTimeout(function(){
					jQuery('#toggle-area').animate({ "left" : "-4px" });
				}, 500);
				tog = 1;
			}
		}
  	});
</script>
<style>
	.click-toggle{
		cursor: help;
	}
	.click-button{
		cursor: pointer;
	}
	.visfix{
		padding: 0px;
		margin: 0px; 
		background: transparent;
		border: 0px;
	}
</style>
<table width='46' border='0' cellpadding='0' cellspacing='0' id="main-area" class="visfix" style="z-index: 55;">
	<tr>
		<td class="visfix">
			<table width='39' border='0' cellpadding='0' cellspacing='0' id='button-area' class="visfix" style="position: absolute; top: 5px; left: -43px; opacity: 0.6; filter: alpha(opacity=60); z-index: 55;">
				<tr>
					<td class="visfix"><img style="border: 0px;" src="wp-content/plugins/wp-vent-spy/includes/images/area_top.gif" width='39' height='4' alt=""></td>
				</tr>
				<tr>
					<td id="refresh" class="click-button visfix"><a style="border: 0px;" title="Refresh the Server"><img style="border: 0px;" src="wp-content/plugins/wp-vent-spy/includes/images/button_refresh.gif" width='39' height='30' alt="Refresh"></a></td>
				</tr>
				<tr>
					<td id="ventrilo" class="click-button visfix"><a style="border: 0px;" title="Get Ventrilo"><img style="border: 0px;" src="wp-content/plugins/wp-vent-spy/includes/images/button_ventrilo.gif" width='39' height='32' alt="Ventrilo"></a></td>
				</tr>
				<tr>
					<td id="onykage" class="click-button visfix"><a style="border: 0px;" title="Visit Super Scriptz"><img style="border: 0px;" src="wp-content/plugins/wp-vent-spy/includes/images/button_ss.gif" width='39' height='30' alt="Onykage"></a></td>
				</tr>
				<tr>
					<td class="visfix"><img style="border: 0px;" src="wp-content/plugins/wp-vent-spy/includes/images/area_bottom.gif" width='39' height='4' alt=""></td>
				</tr>
			</table>
		</td>
		<td class="visfix">
			<table width='7' border='0' cellpadding='0' cellspacing='0' id='toggle-area' class="visfix" style="position: absolute; top: 8px; opacity: 0.6; filter: alpha(opacity=60); z-index: 55;">
				<tr>
					<td class="toggle-area visfix"><img style="border: 0px;" src="wp-content/plugins/wp-vent-spy/includes/images/spacer_top.gif" width='7' height='4' alt=""></td>
				</tr>
				<tr>
					<td class="click-toggle toggle-area visfix"><img style="border: 0px;" src="wp-content/plugins/wp-vent-spy/includes/images/click_top.gif" width='7' height='30' alt=""></td>
				</tr>
				<tr>
					<td class="click-toggle toggle-area visfix"><img style="border: 0px;" src="wp-content/plugins/wp-vent-spy/includes/images/click_main.gif" width='7' height='32' alt=""></td>
				</tr>
				<tr>
					<td class="click-toggle toggle-area visfix"><img style="border: 0px;" src="wp-content/plugins/wp-vent-spy/includes/images/click_bottom.gif" width='7' height='30' alt=""></td>
				</tr>
				<tr>
					<td class="toggle-area visfix"><img style="border: 0px;" src="wp-content/plugins/wp-vent-spy/includes/images/spacer_bottom.gif" width='7' height='4' alt=""></td>
				</tr>
			</table>
		</td>
	</tr>
</table>