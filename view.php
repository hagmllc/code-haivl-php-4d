<?php

include("include/config.php");
include("include/functions/import.php");
$thebaseurl = $config['baseurl'];

function getPageUrl(){
     static $pageURL = '';
     if(empty($pageURL)){
          $pageURL = 'http';
          if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on')$pageURL .= 's';
          $pageURL .= '://';
          if($_SERVER['SERVER_PORT'] != '80')$pageURL .= $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
          else $pageURL .= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
     }
     return $pageURL;
} 

if (is_numeric($_REQUEST['pid']))
{
	$pid = $_REQUEST['pid'];
	STemplate::assign('pid',$pid);
}
else
{
	$error = $lang['138'];
}

if ($error == "")
{
	if (does_post_exist($pid))
	{		
		$query = "SELECT A.*, B.username FROM posts A, members B WHERE A.PID='".mysql_real_escape_string($pid)."' AND A.USERID=B.USERID";
       	$executequery = $conn->execute($query);
       	$parray = $executequery->getarray();
		STemplate::assign('p',$parray[0]);	
		$active = intval($parray[0]['active']);
		$videourl = trim($parray[0]['url']);
		$USERID = $parray[0]['USERID'];
		STemplate::assign('USERID',$USERID);
		$SID = $_SESSION['USERID'];
		if($SID != "" && $USERID != "")
		{
			if($SID == $USERID)
			{
				$owner = "1";
				STemplate::assign('owner', 1);
			}
		}
		if($active == "1" || $owner == "1")
		{
			STemplate::assign('gagtitle',stripslashes($parray[0]['story']));
			$gagkeys = stripslashes($parray[0]['tags']);
			if($gagkeys !=  "")
			{
				$gagkeys = str_replace("   ", " ", $gagkeys);
				$gagkeys = str_replace("  ", " ", $gagkeys);
				$gagkeys = str_replace(" ", ", ", $gagkeys);
				STemplate::assign('gagkeys',$gagkeys);
			}
			$PID = $parray[0]['PID'];
			STemplate::assign('PID',$PID);
			update_last_viewed($PID);
			update_post_viewed($PID);
			update_your_viewed($USERID);
			if (session_verification())
			{
				update_you_viewed($SID);
			}	
			$url = getPageUrl();
			$pos = strrpos($url,"new");
			if($pos > 0)
			{
				STemplate::assign('new',1);
			}
			
			$queryr = "SELECT A.*, B.username FROM posts A, members B WHERE A.USERID=B.USERID AND A.PID!='".mysql_real_escape_string($pid)."' AND A.url='' AND A.active='1' ORDER BY rand() desc limit 6";
			$executequeryr = $conn->execute($queryr);
			$r =  $executequeryr->getarray();
			STemplate::assign('r',$r);
			
			$encodedurl = urlencode($thebaseurl."/gag/");
			STemplate::assign('encodedurl',$encodedurl);
			$eurl = base64_encode("/gag/".$pid);
			STemplate::assign('eurl',$eurl);
			
			$query="SELECT PID FROM posts WHERE PID!='".mysql_real_escape_string($pid)."' AND PID>'".mysql_real_escape_string($pid)."' AND active='1' order by PID asc limit 1";
        	$executequery=$conn->execute($query);
        	$next = $executequery->fields['PID'];
			STemplate::assign('next',$next);
			$query="SELECT PID FROM posts WHERE PID!='".mysql_real_escape_string($pid)."' AND PID<'".mysql_real_escape_string($pid)."' AND active='1' order by PID desc limit 1";
        	$executequery=$conn->execute($query);
        	$prev = $executequery->fields['PID'];
			STemplate::assign('prev',$prev);
			$query="SELECT postviewed FROM posts WHERE PID='".mysql_real_escape_string($pid)."'";
        	$executequery=$conn->execute($query);
        	$postview = $executequery->fields['postviewed'];
			STemplate::assign('postview',$postview);
		}
		else
		{
			$error = $lang['140'];
		}
	}	
	else
	{
		$error = $lang['139'];
	}
}
if ($error == "")
{
	$theme = "view.tpl";
}
else
{
	$theme = "empty.tpl";
}


//TEMPLATES BEGIN
STemplate::assign('viewpage',1);
STemplate::assign('error',$error);
STemplate::assign('message',$message);
STemplate::display('header.tpl');
STemplate::display($theme);
STemplate::display('footer.tpl');
//TEMPLATES END
?>
