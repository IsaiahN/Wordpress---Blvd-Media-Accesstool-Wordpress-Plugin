<?php 
	if($_POST['blvdmedia_at_hidden'] == 'Y') {
		//Form data sent
		$blvdmedia_status = $_POST['blvdmedia_status'];
		update_option('blvdmedia_status', $blvdmedia_status);
		
		$blvdmedia_pub_id = $_POST['blvdmedia_pub_id'];
		update_option('blvdmedia_pub_id', $blvdmedia_pub_id);
		
		$blvdmedia_load = $_POST['blvdmedia_load'];
		update_option('blvdmedia_load', $blvdmedia_load);
		
		$blvdmedia_remove = $_POST['blvdmedia_remove'];
		update_option('blvdmedia_remove', $blvdmedia_remove);
		
		?>
		  <div class="updated"><p><strong><?php _e('Your accessTool&#174; configurations have been saved.' ); ?></strong></p></div>  
		<?php
	} else {
		//Normal page display
		$blvdmedia_load		= get_option('blvdmedia_load');
		$blvdmedia_pub_id  	= get_option('blvdmedia_pub_id');
		$blvdmedia_status 	= get_option('blvdmedia_status');
		$blvdmedia_remove 	= get_option('blvdmedia_remove');
	}
?>

<div class="wrap">
<?php    echo "<h2>" . __( 'Blvd-Media accessTool&#174; Configuration', 'blvdmedia_at_trdom' ) . "</h2>"; ?>
<form name="blvdmedia_at_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="blvdmedia_at_hidden" value="Y">
	<?php    echo "<h4>" . __( 'accessTool&#174; Widget Settings', 'blvdmedia_at_trdom' ) . "</h4>"; ?>
	<p><b><?php _e("accessTool&#174; Widget: " ); ?></b><input type="radio" name="blvdmedia_status" value="enabled" <?php if ($blvdmedia_status == "enabled") { ?>  checked <?php } ?> ><?php _e("Enabled &nbsp;&nbsp;"); ?>
	<input type="radio" name="blvdmedia_status" value="disabled"<?php if ($blvdmedia_status == "disabled") { ?>  checked <?php } ?> ><?php _e("Disabled"); ?></p> 
	<p><b><?php _e("Hide Disabled Tags: " ); ?></b><input type="checkbox" <?php if ($blvdmedia_remove == "yes") { ?>  checked="yes" <?php } ?> name="blvdmedia_remove" value="yes" />
	<?php _e("&nbsp;&nbsp;<i style='color:#3f3f3f;'>(hides all </i><b>[blvdmedia tool=at]</b> <i> tags if the accessTool is disabled/loaded for every page.</i>)"); ?></p>
	<p><b><?php _e("Publisher ID: " ); ?></b>
	<input type="text" name="blvdmedia_pub_id" value="<?php echo $blvdmedia_pub_id; ?>" size="20"><?php _e(" example: 12345" ); ?></p>  
	<p><b><?php _e("Page Settings: " ); ?></b>
	<p><input type="radio" name="blvdmedia_load" value="loadall" <?php if ($blvdmedia_load == "loadall") { ?> checked <?php } ?> ><?php _e("Load the widget on every page"); ?></p>
	<p><input type="radio" name="blvdmedia_load" value="loadindividual" <?php if ($blvdmedia_load == "loadindividual") { ?> checked <?php } ?> ><?php _e("Load the widget on selected pages [recommended]"); ?></p> 
	<br/>
	<p><?php _e("<i style='color:#3f3f3f;'>Note: If you choose to load the widget individually, use the tag : </i><b>[blvdmedia tool=at]</b> <i>on any page.</i>"); ?></p>

	<p class="submit">
	<input type="submit" name="Submit" value="<?php _e('Update Options', 'blvdmedia_at_trdom' ) ?>" />
	</p>
</form>
</div>