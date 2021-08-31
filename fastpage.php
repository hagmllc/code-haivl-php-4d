<?php

include("include/config.php");
include("include/functions/import.php");
$thebaseurl = $config['baseurl'];

$query="SELECT PID, story, pic FROM posts WHERE active='1' AND nsfw='0' AND pic!='' order by rand() limit 1";
$executequery=$conn->execute($query);
$PID = intval($executequery->fields['PID']);
$title = cleanit($executequery->fields['story']);
$image = cleanit($executequery->fields['pic']);
		
$arr = array('PID' => $PID, 'title' => $title, 'image' => $image);
echo json_encode($arr);
?>
