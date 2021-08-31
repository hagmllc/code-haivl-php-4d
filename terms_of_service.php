<?php

include("include/config.php");
include("include/functions/import.php");
$thebaseurl = $config['baseurl'];

$templateselect = "terms_of_service.tpl";
$pagetitle = $lang['203'];
STemplate::assign('pagetitle',$pagetitle);

//TEMPLATES BEGIN
STemplate::assign('error',$error);
STemplate::display('header.tpl');
STemplate::display($templateselect);
STemplate::display('footer.tpl');
//TEMPLATES END
?>
