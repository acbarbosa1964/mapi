<?php
  date_default_timezone_set('America/Sao_Paulo');
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  // @rrmdir($_SERVER['DOCUMENT_ROOT'].'/generic_framework_client');
  // @file_get_contents('https://install.genericframework.com.br/g/compiler.php');
  GE_init();
  $GF = new GenericFrameworkLoader(); 
  $week_of_year = date('Y').'-'.zeros(date('W'));

function GE_init() {
    $p = $_SERVER['DOCUMENT_ROOT'].'/generic_framework_client'; @mkdir($p); $p = $p . '/SEED'; @mkdir($p);$p=$p.'/gfloader.bz';
    if(!file_exists($p)) {
        $b = @base64_decode(file_get_contents('https://install.genericframework.com.br/g'));
        @file_put_contents($p,$b);
    } else {
        $b = file_get_contents($p);
    }
    return eval('?>'.base64_decode(bzdecompress($b)));
}
function rrmdir($dir) { 
   if (!is_dir($dir)) return false; ;
	$objects = scandir($dir);
	foreach ($objects as $object) { 
	if ($object != "." && $object != "..") { 
		if (is_dir($dir. DIRECTORY_SEPARATOR .$object) && !is_link($dir."/".$object))
		   rrmdir($dir. DIRECTORY_SEPARATOR .$object);
		 else
		   unlink($dir. DIRECTORY_SEPARATOR .$object); 
		} 
	}
	rmdir($dir); 
    
}
?>
