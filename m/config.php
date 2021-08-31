<?php
$mobile = "1";
$config['basedir'] = '/home/username/public_html';
$config['mobiledir'] = '/home/username/public_html/m';
$config['mobileurl'] = 'http://yourdomain.com/m';
$mobile_per_page = "10";

function insert_get_advertisement($var)
{
        global $conn;
        $query="SELECT code FROM advertisements WHERE AID='".mysql_real_escape_string($var[AID])."' AND active='1' limit 1";
        $executequery=$conn->execute($query);
        $getad = $executequery->fields[code];
		echo strip_mq_gpc($getad);
}
function insert_get_fav_count($var)
{
    global $conn;
	$query="SELECT count(*) as total FROM posts_favorited WHERE PID='".intval($var[PID])."'";
	$executequery=$conn->execute($query);
	$total = $executequery->fields[total];
	return intval($total);
}
function cleanit($text)
{
	return htmlentities(strip_tags(stripslashes($text)), ENT_COMPAT, "UTF-8");
}

?>
