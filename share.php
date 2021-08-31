<?php

include("include/config.php");
include("include/functions/import.php");
$thebaseurl = $config['baseurl'];

$PID = intval(cleanit($_REQUEST['id']));
if($PID > 0)
{
	STemplate::assign('PID',$PID);
	STemplate::display('share.tpl');
}
?>
