<? die(); ?>
@@
if (preg_match("#((.*?)|)/(i|h|z)/(.*?)$#", $_SERVER["REQUEST_URI"], $match)) {
if (isset($_SERVER["HTTPS"])) { $prot = "https://"; } else { $prot = "http://"; }
switch ($match[3]) { case 'h': $id = hexdec($match[4]); break; case 'i': $id = $match[4]; break; case 'z': $id = base_convert($match[4],36,10); break;  }
header("Location: ".$prot.$_SERVER["HTTP_HOST"].$match[2]."/?p=".$id,TRUE,301); exit; }
