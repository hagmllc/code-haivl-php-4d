<?php

include("config.php");
$mobileurl = $config['mobileurl'];
include($config['basedir']."/include/config.php");
STemplate::assign('mobileurl',$mobileurl);

$pid = intval(cleanit($_REQUEST['pid']));
if($pid > 0)
{
	$query = "SELECT * FROM posts WHERE active='1' AND PID='".mysql_real_escape_string($pid)."' AND pic!='' AND nsfw='0' limit 1";
	$executequery = $conn->execute($query);
	$parray = $executequery->getarray();
	STemplate::assign('p',$parray[0]);	
	$templateselect = "view.tpl";
	$pagetitle = stripslashes($parray[0]['story']);
	STemplate::assign('pagetitle',$pagetitle);
}
//TEMPLATES BEGIN
STemplate::setTplDir($config['mobiledir']."/themes");
STemplate::display('header.tpl');
STemplate::display($templateselect);
STemplate::display('footer.tpl');
//TEMPLATES END
?>
