<?php

include("include/config.php");
include("include/functions/import.php");
	
$query="SELECT PID FROM posts WHERE active='1' order by rand() limit 1";
$executequery=$conn->execute($query);
$PID = intval($executequery->fields['PID']);
if($PID > 0)
{
	header("Location:$config[baseurl]/gag/".$PID);exit;
}
else
{
	header("Location:$config[baseurl]/");exit;
}
?>
