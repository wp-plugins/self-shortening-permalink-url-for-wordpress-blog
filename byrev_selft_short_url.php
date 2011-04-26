<?php
/*
Plugin Name: ByREV Shortening URL.
Plugin URI: http://byrev.org/
Description: Self Shortening Permalink URL for Wordpress Blog. ATENTION: one of these files, "wp-config.php" or "index.php", must have write access. Otherwise, shortened links will not work. For more information please read "read.me.txt" file from plugin folder.
Author: ByREV ( Robert Emilian Vicol )
Author URI: http://byrev.org
Version: 1.3.0
*/

define('_SELF_SHORT_URL_MODE',2); #== For more information please read "read.me.txt" file from plugin folder.
define('_SELF_SHORT_URL_AUTO',true); 
define('_SELF_SHORT_URL_STYLE','border-top: 1px solid #ccf; background-color: #eef; margin: 3px auto; padding: 3px;');
define('_SELF_SHORT_URL_TITLE','Short URL');

register_activation_hook( __FILE__, 'byrev_ssu_activate' );

function get_self_short_url($mode=1, $echo_mode=false) {
    global $post;
    switch ($mode) {
    	case 1: $id = 'h/'.dechex($post->ID); break;
    	case 0: $id = 'i/'.$post->ID; break;
    	case 2: $id = 'z/'.base_convert($post->ID,10,36); break;
    }
    $url = get_bloginfo('url').'/'.$id;
    if ($echo_mode) { echo $url; } else { return $url; }
}
function insert_self_short_url($data) {
	$url = get_self_short_url(_SELF_SHORT_URL_MODE);
	$data .= '<div style="'._SELF_SHORT_URL_STYLE.'">[ <a title="'.$url.'" rel="nofollow" href="'.$url.'">'._SELF_SHORT_URL_TITLE.'</a> ... ]</div>';
	return $data;
}

define('_BYREV_SSU_VER','1.2');
define('_STARTCODE_BSSU','#~~~ [ByREV-Self-Short-URL]');
define('_ENDCODE_BSSU','#~~~ [/ByREV-Self-Short-URL]');

function byrev_ssu_activate() {	
	$_bssu_php_code = explode('@@',file_get_contents(dirname(__FILE__).'/bssu_php_code.php'));
	if ((count($_bssu_php_code)) !=2 ) return;	
	$_bssu_php_code = _STARTCODE_BSSU."[V:"._BYREV_SSU_VER."]".$_bssu_php_code[1]._ENDCODE_BSSU;	
	$ar_file_update = array(ABSPATH.'wp-config.php',ABSPATH.'index.php');	
	foreach ($ar_file_update as $file_update) {		
		if (is_writable($file_update)) {				   
			$_php_code = file_get_contents($file_update);
			if (stristr($_php_code, _STARTCODE_BSSU) === false) { 
				$ar_code = explode('<?php',$_php_code);
				$_php_code = "<?php \r\n".$_bssu_php_code."\r\n".$ar_code[1];
				file_put_contents($file_update, $_php_code);
			}
			return true;
		}
	}
	return false;
}
if (_SELF_SHORT_URL_AUTO) {
	add_filter('the_content', 'insert_self_short_url');
}
?>