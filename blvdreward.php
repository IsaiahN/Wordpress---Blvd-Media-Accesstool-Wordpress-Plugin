<?php 
/*
Plugin Name: Blvd Media accessTool®
Plugin URI: http://blvd-media.com
Description: Gives Blvd Media users access to over 500 offers available on the Blvd Media site via the accessTool® widget.
Author: Blvd Media Group
Version: 1.0
Author URI: http://blvd-media.com
*/	

function blvdmedia_at_widget($content) {
	$blvdmedia_load 	= get_option('blvdmedia_load', 'loadall');
	$blvdmedia_pub_id 	= get_option('blvdmedia_pub_id', '123');
	$blvdmedia_status 	= get_option('blvdmedia_status', 'disabled');
	$blvdmedia_remove 	= get_option('blvdmedia_remove', 'yes');
	if ( !is_admin() ) {
		if ($blvdmedia_status == "enabled") {
			if ($blvdmedia_load  == "loadindividual") {
			$blvd_html_var  = '';
			$blvd_html_var  .= '<div style="margin:0;padding:0;position:fixed;width:100%;height:100%;" id="accessToolContainer">';
			$blvd_html_var  .= '<div style="margin:0;padding:0;position:fixed;width:100%;height:100%;">';
			$blvd_html_var  .= '<object type="application/x-shockwave-flash" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="100%" id="myFlashContent">';
			$blvd_html_var  .= '<param name="menu" value="true" />';
			$blvd_html_var  .= '<param name="quality" value="high" />';
			$blvd_html_var  .= '<param name="scale" value="exactfit" />';
			$blvd_html_var  .= '<param name="wmode" value="transparent" />';
			$blvd_html_var  .= '<param name="bgcolor" value="transpa" />';
			$blvd_html_var  .= '<param name="allowscriptaccess" value="always" />';
			$blvd_html_var  .= '<!--[if !IE]>-->';
			$blvd_html_var  .= '<object type="application/x-shockwave-flash" id="blvdflash" style="position:fixed;" data="http://www.blvd-media.com/AccessTool/AccessTool.swf" width="100%" height="100%"><param name="quality" value="high" />';
			$blvd_html_var  .= '<param name="menu" value="true" />';
			$blvd_html_var  .= '<param name="quality" value="high" />';
			$blvd_html_var  .= '<param name="scale" value="exactfit" />';
			$blvd_html_var  .= '<param name="wmode" value="transparent" />';
			$blvd_html_var  .= '<param name="bgcolor" value="transpa" />';
			$blvd_html_var  .= '<param name="allowscriptaccess" value="always" />';
			$blvd_html_var  .= '<!--<![endif]-->';
			$blvd_html_var  .= '<a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /';
			$blvd_html_var  .= '</a>';
			$blvd_html_var  .= '</div>';
			$blvd_html_var  .= '</object>';
			$blvd_html_var  .= '</object>';
			$blvd_html_var  .= '</div>';
				if (is_singular()) {
				    $tag = '[blvdmedia tool=at]';
					$string_search = strpos($content, $tag);
					if ($string_search == true) {
						if(isset($_GET['pubid'])) { 
							$content = str_replace("[blvdmedia tool=at]", $blvd_html_var, $content);
							add_action('get_footer','blvd_at_loadhead');
						} else {						
						 // function: publisher id added
						 add_action('get_footer','blvd_redirect_pubid');
						}
					} 		
				}
			}
			elseif ($blvdmedia_remove == "yes") {
				if (is_singular()) {
					$tag = '[blvdmedia tool=at]';
					$string_search = strpos($content, $tag);
					if ($string_search == true) {
						$content = str_replace("[blvdmedia tool=at]", " ", $content);
					}
				}				
			}
		}
		elseif ($blvdmedia_remove == "yes") {
			if (is_singular()) {
				$tag = '[blvdmedia tool=at]';
				$string_search = strpos($content, $tag);
				if ($string_search == true) {
					$content = str_replace("[blvdmedia tool=at]", " ", $content);
				}
			}				
		}
	}
	return $content;
}

add_filter( 'the_content', 'blvdmedia_at_widget' );

function blvd_at_loadhead() {

			wp_deregister_script('jquery');
echo '
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js?ver=1.7.1"></script>
<script type="text/javascript" src="http://www.blvd-media.com/AccessTool/accessTool.js"></script>
<script type="text/javascript" src="http://www.blvd-media.com/AccessTool/swfobject.js"></script>
<noscript><meta http-equiv=\'refresh\' content=\'0;url=http://www.blvd-media.com/nojava.html\' /></noscript>

<style type="text/css">
#blvdflash {
margin: 0px;
padding: 0px;
position: absolute;
top: 0px;
left: 0px;
right: 0px;
z-index: 9999;
}
</style>';
} 
function blvd_redirect_pubid() { 
$blvdmedia_pub_id 	= get_option('blvdmedia_pub_id', '123');
echo '
<script type="text/javascript">
var prefix = window.location;			
window.location = prefix + \'?&pubid='.$blvdmedia_pub_id.'\';
</script>
';
}

function blvd_at_html() {
echo '
<div style="margin:0;padding:0;position:fixed;width:100%;height:100%;" id="accessToolContainer">
<div style="margin:0;padding:0;position:fixed;width:100%;height:100%;">

<object type="application/x-shockwave-flash" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="100%" id="myFlashContent">
<param name="menu" value="true" />
<param name="quality" value="high" />
<param name="scale" value="exactfit" />
<param name="wmode" value="transparent" />
<param name="bgcolor" value="transpa" />
<param name="allowscriptaccess" value="always" />
<!--[if !IE]>-->
<object type="application/x-shockwave-flash" id="blvdflash" style="position:fixed;" data="http://www.blvd-media.com/AccessTool/AccessTool.swf" width="100%" height="100%"><param name="quality" value="high" />
<param name="menu" value="true" />
<param name="quality" value="high" />
<param name="scale" value="exactfit" />
<param name="wmode" value="transparent" />
<param name="bgcolor" value="transpa" />
<param name="allowscriptaccess" value="always" />
<!--<![endif]-->
<a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /
</a>
</div>
</object>
</object>
</div>
';
}

function blvd_at_loadall() {
	if ( !is_admin() ) {
		$blvdmedia_status 	= get_option('blvdmedia_status', 'disabled');
		$blvdmedia_pub_id 	= get_option('blvdmedia_pub_id', '123');
		$blvdmedia_load		= get_option('blvdmedia_load', 'loadall');
		if ($blvdmedia_status == "enabled") {
			if ($blvdmedia_load  == "loadall") {
				if(!isset($_GET['pubid'])) { 
					// function: publisher id added
					add_action('get_footer','blvd_redirect_pubid', 1);
				}
				else {	
					add_action('get_footer','blvd_at_loadhead', 1);
					add_action('get_footer', 'blvd_at_html', 1);
				}
			}
		}
	}
}

add_action('get_footer', 'blvd_at_loadall', 0);


//*************** Admin function ***************
function blvdmedia_at_admin() {
	include('blvdreward_import_admin.php'); 
}

function blvdmediatool_admin_actions() {  
add_menu_page( "Blvd-Media accessTool&#174; Configuration", "Blvd-Media accessTool&#174;", 1, "blvd-media-access-tool", "blvdmedia_at_admin", plugins_url( 'blvd_at/images/blvdicon.jpg' , dirname(__FILE__) ) );
}

add_action( 'admin_menu', 'blvdmediatool_admin_actions' );  
?>