<?php
// Build Options scripts
?>
<script type="text/javascript">
	//Validation Options Specific scripts.
	function getValid(){
	  jQuery.post("<?php echo $plugin_url; ?>includes/getvalid.php", {donID: jQuery('#donateid').val(), site: "<?php echo get_bloginfo('url');?>"}, 
	  function(data){
		  if(data != ''){
		  	jQuery('#valid').val(data);
		  	jQuery('#showvalid').css('color','#00ff00');
		  	jQuery('#validate').fadeOut(500);
		  	jQuery('#showvalid').html('Validation Passed');
		  	//jQuery('#donateid').attr('disabled', 'disabled');
		  	jQuery('#validate').attr('value', 'Validated');
		  	jQuery('#adremove').fadeOut(500);
		  	document.opionsform.submit();
	  	}else{
		  	jQuery('#showvalid').css('color','#ff0000');
		  	jQuery('#showvalid').html('Validation Failed');
		  	jQuery('#showvalid').fadeOut(5000);
	  	}
		//alert("Data Loaded: " + data);
		  });
	}
	function usedefaultloader(){
		if(document.getElementById("usedefault").checked == true){
			document.getElementById("usedefault").value = "1";
			jQuery('#loadingimg').val("<?php echo $plugin_url; ?>includes/images/loading.gif");
			jQuery('#loadingimg').attr("disabled", "disabled");
		}else{
			document.getElementById("usedefault").value = "0";
			jQuery('#loadingimg').attr("disabled", "");
		}
	}
</script>
<?php echo "\n\n"; ?>