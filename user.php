<?php

include("include/config.php");
include("include/functions/import.php");
$thebaseurl = $config['baseurl'];

$uname = cleanit($_REQUEST['uname']);
if($uname != "")
{
	STemplate::assign('uname',$uname);
	$queryp = "select USERID, username, country, description, color1, color2, website from members where username='".mysql_real_escape_string($uname)."' AND status='1'"; 
	$resultsp=$conn->execute($queryp);
	$p = $resultsp->getrows();
	STemplate::assign('p',$p[0]);
	$USERID = intval($p[0]['USERID']);
	
	if($USERID > 0)
	{
		$infinity_paging = $config['infinity_paging'];
		if($infinity_paging == "1")
		{
			$query = "SELECT A.*, B.username from posts A, members B where A.active='1' AND A.USERID=B.USERID AND A.USERID='".mysql_real_escape_string($USERID)."' order by A.PID desc limit $config[items_per_page]";
			$results=$conn->execute($query);
			$posts = $results->getrows();
			STemplate::assign('posts',$posts);
			STemplate::assign('pagetitle',$uname);
		}
		else
		{
			$query = "SELECT A.*, B.username from posts A, members B where A.active='1' AND A.USERID=B.USERID AND A.USERID='".mysql_real_escape_string($USERID)."' order by A.PID desc limit $config[profile_max]";
			$results=$conn->execute($query);
			$posts = $results->getrows();
			STemplate::assign('posts',$posts);
			STemplate::assign('pagetitle',$uname);
		}		
		
		$eurl = base64_encode("/user/".$uname);
		STemplate::assign('eurl',$eurl);
		
		$query = "select count(*) as total from posts_favorited where USERID='".mysql_real_escape_string($USERID)."' limit 1"; 
		$executequery = $conn->execute($query);
		$tl = $executequery->fields['total'];
		STemplate::assign('tl',$tl);
		
		$query = "select count(*) as total from posts where USERID='".mysql_real_escape_string($USERID)."' AND active='1' limit 1"; 
		$executequery = $conn->execute($query);
		$t2 = $executequery->fields['total'];
		STemplate::assign('t2',$t2);
	
		$t = 'user.tpl';
	}
	else
	{
		$t = 'empty.tpl';
	}
}
else
{
	$t = 'empty.tpl';
}

//TEMPLATES BEGIN
STemplate::assign('message',$message);
STemplate::display('header.tpl');
STemplate::display($t);
STemplate::display('footer.tpl');
//TEMPLATES END
?>
