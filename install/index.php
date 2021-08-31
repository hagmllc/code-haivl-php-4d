<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" lang="vi">

<head>
  <title>Cài Đặt Gag Việt</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div class="green">

<center><h1>Cài Đặt Gag Việt</h1></center>

<table border="0">
<form action="" method="post" name="install" id="install">

<tr>
<td>
	Đường đẫn đến thư mục chứa mã nguồn:
</td>
<td>
    <input size="20" name="basedir" type="text" id="basedir" value="">
</td>
<td>
	(ví dụ: /home/username/public_html)
</td>
</tr>

<tr>
<td>
	Liên kết đến thư mục chứa mã nguồn:
</td>
<td>
    <input size="20" name="baseurl" type="text" id="baseurl" value="">
</td>
<td>
    (ví dụ: http://trollcackieu.tk)
</td>
</tr>

<tr>
<td>
	Tên thư mục chứa mã nguồn:
</td>
<td>
    <input size="20" name="namedir" type="text" id="namedir" value="">
</td>
<td>
    (Để trống nếu mã nguồn nằm ở thư mục gốc)
</td>
</tr>

<tr>
<td>
    Tên máy chủ cơ sở dữ liệu:
</td>
<td>
    <input size="20" name="dbhost" type="text" id="dbhost" value="">
</td>
</tr>

<tr>
<td>
	Tên đăng nhập cơ sở dữ liệu:
</td>
<td>
    <input size="20" name="dbuser" type="text" id="dbuser">
</td>
</tr>

<tr>
<td>
	Mật khẩu kết nối cơ sở dữ liệu:
</td>
<td>
    <input size="20" name="dbpassword" type="password" id="dbpassword">
</td>
</tr>

<tr>
<td>
	Tên cơ sở dữ liệu:
</td>
<td>
	<input size="20" name="dbname" type="text" id="dbname">
</td>
</tr>

<tr>
<td>
	Tài khoản quản trị viên:
</td>
<td>
	<input size="20" name="adm_name" type="text" id="adm_name">
</td>
</tr>

<tr>
<td>
	E-mail quản trị viên:
</td>
<td>
	<input size="20" name="adm_mail" type="text" id="adm_mail">
</td>
</tr>

<tr>
<td>
	Mật khẩu quản trị viên:
</td>
<td>
	<input size="20" name="adm_pass" type="password" id="adm_pass">
</td>
</tr>

<td>
<p><input type="submit" name="submit" value="Cài đặt"></p>
</td>

</form>
</table>

<p><font color="red"><b>*Chú ý: bạn cần nhập chính xác các thông tin phía trên nếu không hệ thống sẽ bị lỗi mặc dù cài đặt thành công!!!</b></font></p>

<div class="ketqua">
<b>-----Chi tiết cài đặt-----</b><br />

<?php

/////////////////////////
//Hàm tạo cơ sở dữ liệu//
/////////////////////////

function SplitSQL($file, $delimiter = ';')
{
    set_time_limit(0);

    if (is_file($file) === true)
    {
        $file = fopen($file, 'r');

        if (is_resource($file) === true)
        {
            $query = array();

            while (feof($file) === false)
            {
                $query[] = fgets($file);

                if (preg_match('~' . preg_quote($delimiter, '~') . '\s*$~iS', end($query)) === 1)
                {
                    $query = trim(implode('', $query));
                    if (mysql_query($query) === false)
                    {
                        echo '<font color="red">Lỗi: '. $query .'</font><br />';
                    }

                    else
                    {
                        echo '<font color="green">Thành công: '. $query .'</font><br />';
                    }
                    while (ob_get_level() > 0)
                    {
                        ob_end_flush();
                    }

                    flush();
                }

                if (is_string($query) === true)
                {
                    $query = array();
                }
            }

            return fclose($file);
        }
    }
    return false;
}

//////////////////////////
//Tạo tệp tin config.php//
//////////////////////////

if (isset($_POST["submit"])) {

$basedir = $_POST[basedir];
$baseurl = $_POST[baseurl];
$namedir = $_POST[namedir];
$dbhost  = $_POST[dbhost];
$dbuser  = $_POST[dbuser];
$dbpass  = $_POST[dbpassword];
$dbname  = $_POST[dbname];

if ($basedir == '')
{
die ('Vui lòng nhập dường dẫn đến thư mục chứa mã nguồn!');
}
elseif ($baseurl == '')
{
die ('Vui lòng nhập liên kết đến thư mục chứa mã nguồn!');
}
elseif ($dbhost == '')
{
die ('Vui lòng nhập tên máy chủ cơ sở dữ liệu!');
}
elseif ($dbuser == '')
{
die ('Vui lòng nhập tên đăng nhập cơ sở dữ liệu!');
}
elseif ($dbpass == '')
{
die ('Vui lòng nhập mật khẩu kết nối cơ sở dữ liệu!');
}
elseif ($dbname == '')
{
die ('Vui lòng nhập tên cơ sở dữ liệu!');
}
else{

if ($namedir == '')
{
$namedir = '';
}
else
{
$namedir = '/'.$_POST[namedir];
}

$noidung = '<?php
$config = array();

// Bắt đầu cấu hình
$config[\'basedir\']     =  \''.$_POST[basedir].'\'; //Đường đẫn đến thư mục chứa mã nguồn
$config[\'baseurl\']     =  \''.$_POST[baseurl].'\'; //Liên kết đến thư mục chứa mã nguồn

$DBTYPE = \'mysql\';
$DBHOST = \''.$_POST[dbhost].'\'; //Tên máy chủ cơ sở dữ liệu
$DBUSER = \''.$_POST[dbuser].'\'; //Tên đăng nhập cơ sở dữ liệu
$DBPASSWORD = \''.$_POST[dbpassword].'\'; //Mật khẩu kết nối cơ sở dữ liệu
$DBNAME = \''.$_POST[dbname].'\'; //Tên cơ sở dữ liệu

$default_language = "vi"; //Bạn có thể chọn en
// Kết thúc cấu hình

session_start();

$config[\'adminurl\']      =  $config[\'baseurl\'].\'/admin\';
$config[\'cssurl\']      =  $config[\'baseurl\'].\'/css\';
$config[\'imagedir\']      =  $config[\'basedir\'].\'/images\';
$config[\'imageurl\']      =  $config[\'baseurl\'].\'/images\';
$config[\'membersprofilepicdir\']      =  $config[\'imagedir\'].\'/avatar\';
$config[\'membersprofilepicurl\']      =  $config[\'imageurl\'].\'/avatar\';
$config[\'pdir\'] = $config[\'basedir\'].\'/upload\';
$config[\'purl\'] = $config[\'baseurl\'].\'/upload\';
require_once($config[\'basedir\'].\'/smarty/libs/Smarty.class.php\');
require_once($config[\'basedir\'].\'/libraries/mysmarty.class.php\');
require_once($config[\'basedir\'].\'/libraries/SConfig.php\');
require_once($config[\'basedir\'].\'/libraries/SError.php\');
require_once($config[\'basedir\'].\'/libraries/adodb/adodb.inc.php\');
require_once($config[\'basedir\'].\'/libraries/phpmailer/class.phpmailer.php\');
require_once($config[\'basedir\'].\'/libraries/SEmail.php\');
function strip_mq_gpc($arg)
{
  if (get_magic_quotes_gpc())
  {
  	$arg = str_replace(\'"\',"\'",$arg);
  	$arg = stripslashes($arg);
    return $arg;
  } 
  else
  {
    $arg = str_replace(\'"\',"\'",$arg);
    return $arg;
  }
}
$conn = &ADONewConnection($DBTYPE);
$conn->PConnect($DBHOST, $DBUSER, $DBPASSWORD, $DBNAME);
@mysql_query("SET NAMES \'UTF8\'");
$sql = "SELECT * from config";
$rsc = $conn->Execute($sql);
if($rsc){while(!$rsc->EOF)
{
$field = $rsc->fields[\'setting\'];
$config[$field] = $rsc->fields[\'value\'];
STemplate::assign($field, strip_mq_gpc($config[$field]));
@$rsc->MoveNext();
}}
if($config[\'re_mobile\'] == "1" && $config[\'m_url\'] != "")
{
	if($mobile != "1")
	{
		include("mobile.php");
		$mcheck = is_md();
		if($mcheck != "")
		{
			header("Location:".$config[\'m_url\']);exit;
		}
	}
}
STemplate::assign(\'baseurl\',       $config[\'baseurl\']);
STemplate::assign(\'basedir\',       $config[\'basedir\']);
STemplate::assign(\'adminurl\',       $config[\'adminurl\']);
STemplate::assign(\'cssurl\',       $config[\'cssurl\']);
STemplate::assign(\'imagedir\',        $config[\'imagedir\']);
STemplate::assign(\'imageurl\',        $config[\'imageurl\']);
STemplate::assign(\'membersprofilepicdir\',        $config[\'membersprofilepicdir\']);
STemplate::assign(\'membersprofilepicurl\',        $config[\'membersprofilepicurl\']);
STemplate::assign(\'pdir\', $config[\'pdir\']);
STemplate::assign(\'purl\', $config[\'purl\']);
STemplate::setCompileDir($config[\'basedir\']."/temporary");
$theme = $config[\'theme\'];
STemplate::setTplDir($config[\'basedir\']."/themes");
if ($_REQUEST[\'language\'] != "")
{
	if ($_REQUEST[\'language\'] == "en")
	{
		$_SESSION[\'language\'] = "en";
	}
	elseif ($_REQUEST[\'language\'] == "vi")
	{
		$_SESSION[\'language\'] = "vi";
	}
}
if ($_SESSION[\'language\'] == "")
{
	$_SESSION[\'language\'] = $default_language;
}

if ($_SESSION[\'language\'] == "en")
{
	include("lang/en.php");
}
elseif ($_SESSION[\'language\'] == "vi")
{
	include("lang/vi.php");
}
else
{
	include("lang/".$default_language.".php");
}
for ($i=0; $i<count($lang); $i++)
{
	STemplate::assign(\'lang\'.$i, $lang[$i]);
}
if($sban != "1")
{
	$bquery = "SELECT count(*) as total from bans_ips WHERE ip=\'".mysql_real_escape_string($_SERVER[\'REMOTE_ADDR\'])."\'";
	$bresult = $conn->execute($bquery);
	$bcount = $bresult->fields[\'total\'];
	if($bcount > "0")
	{
		$brdr = $config[\'baseurl\']."/banned.php";
		header("Location:$brdr");
		exit;
	}
}
function create_slrememberme() {
        $key = md5(uniqid(rand(), true));
        global $conn;
        $sql="update members set remember_me_time=\'".date(\'Y-m-d H:i:s\')."\', remember_me_key=\'".$key."\' WHERE username=\'".mysql_real_escape_string($_SESSION[USERNAME])."\'";
        $conn->execute($sql);
        setcookie(\'slrememberme\', gzcompress(serialize(array($_SESSION[USERNAME], $key)), 9), time()+60*60*24*30);
}
function destroy_slrememberme($username) {
        if (strlen($username) > 0) {
                global $conn;
                $sql="update members set remember_me_time=NULL, remember_me_key=NULL WHERE username=\'".mysql_real_escape_string($username)."\'";
                $conn->execute($sql);
        }
        setcookie ("slrememberme", "", time() - 3600);
}
if (!isset($_SESSION["USERNAME"]) && isset($_COOKIE[\'slrememberme\'])) 
{
        $sql="update members set remember_me_time=NULL and remember_me_key=NULL WHERE remember_me_time<\'".date(\'Y-m-d H:i:s\', mktime(0, 0, 0, date("m")-1, date("d"),   date("Y")))."\'";
        $conn->execute($sql);
        list($username, $key) = @unserialize(gzuncompress(stripslashes($_COOKIE[\'slrememberme\'])));
        if (strlen($username) > 0 && strlen($key) > 0)
		{
        	$sql="SELECT status,USERID,email,username,verified,filter from members WHERE username=\'".mysql_real_escape_string($username)."\' and remember_me_key=\'".mysql_real_escape_string($key)."\'";
          	$rs=$conn->execute($sql);
          	if($rs->recordcount()<1)
			{
				$error=$lang[\'224\'];
			}
		    elseif($rs->fields[\'status\'] == "0")
			{
				$error = $lang[\'225\'];
			}
    		if($error=="")
			{				
				$_SESSION[\'USERID\']=$rs->fields[\'USERID\'];
				$_SESSION[\'EMAIL\']=$rs->fields[\'email\'];
				$_SESSION[\'USERNAME\']=$rs->fields[\'username\'];
				$_SESSION[\'VERIFIED\']=$rs->fields[\'verified\'];
				$_SESSION[\'FILTER\']=$rs->fields[\'filter\'];
      			create_slrememberme();
        	}
			else
			{
                destroy_slrememberme($username);
        	}
        }
}
function generateCode($length) 
{
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
        $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}
if($config[\'enable_fc\'] == "1")
{
	if($_SESSION[\'USERID\'] == "")
	{
		$A = $config[\'FACEBOOK_APP_ID\'];
		$B = $config[\'FACEBOOK_SECRET\'];
		define(\'FACEBOOK_APP_ID\', $A);
		define(\'FACEBOOK_SECRET\', $B);
		STemplate::assign(\'FACEBOOK_APP_ID\',$A);
		STemplate::assign(\'FACEBOOK_SECRET\',$B);
		
		function get_facebook_cookie($app_id, $application_secret) {
		  $args = array();
		  parse_str(trim($_COOKIE[\'fbs_\' . $app_id], \'\\\"\'), $args);
		  ksort($args);
		  $payload = \'\';
		  foreach ($args as $key => $value) {
			if ($key != \'sig\') {
			  $payload .= $key . \'=\' . $value;
			}
		  }
		  if (md5($payload . $application_secret) != $args[\'sig\']) {
			return null;
		  }
		  return $args;
		}
		
		$code = $_REQUEST[\'code\'];
		if($code != "")
		{
			$my_url = $config[\'baseurl\']."/";
			$token_url = "https://graph.facebook.com/oauth/access_token?"
			. "client_id=" . $A . "&redirect_uri=" . urlencode($my_url)
			. "&client_secret=" . $B . "&code=" . $code;
			$response = @file_get_contents($token_url);
			$params = null;
			parse_str($response, $params);
			$graph_url = "https://graph.facebook.com/me?access_token=" 
			. $params[\'access_token\'];
			$user = json_decode(file_get_contents($graph_url));
			$fname = htmlentities(strip_tags($user->name), ENT_COMPAT, "UTF-8");
			$femail = htmlentities(strip_tags($user->email), ENT_COMPAT, "UTF-8");
			
			$query="SELECT USERID FROM members WHERE email=\'".mysql_real_escape_string($femail)."\' limit 1";
			$executequery=$conn->execute($query);
			$FUID = intval($executequery->fields[\'USERID\']);
			if($FUID > 0)
			{									
				$query="SELECT USERID,email,username,verified, filter from members WHERE USERID=\'".mysql_real_escape_string($FUID)."\' and status=\'1\'";
				$result=$conn->execute($query);
				if($result->recordcount()>0)
				{
					$query="update members set lastlogin=\'".time()."\', lip=\'".$_SERVER[\'REMOTE_ADDR\']."\' WHERE USERID=\'".mysql_real_escape_string($FUID)."\'";
					$conn->execute($query);
					$_SESSION[\'USERID\']=$result->fields[\'USERID\'];
					$_SESSION[\'EMAIL\']=$result->fields[\'email\'];
					$_SESSION[\'USERNAME\']=$result->fields[\'username\'];
					$_SESSION[\'VERIFIED\']=$result->fields[\'verified\'];
					$_SESSION[\'FILTER\']=$result->fields[\'filter\'];
					$_SESSION[\'FB\']="1";			
					header("Location:$config[baseurl]/");exit;
				}
			}
			else
			{
				$md5pass = md5(generateCode(5).time());
				
				if($fname != "" && $femail != "")
				{
					$query="INSERT INTO members SET email=\'".mysql_real_escape_string($femail)."\',username=\'\', password=\'".mysql_real_escape_string($md5pass)."\', addtime=\'".time()."\', lastlogin=\'".time()."\', ip=\'".$_SERVER[\'REMOTE_ADDR\']."\', lip=\'".$_SERVER[\'REMOTE_ADDR\']."\', verified=\'1\'";
					$result=$conn->execute($query);
					$userid = mysql_insert_id();
					if($userid != "" && is_numeric($userid) && $userid > 0)
					{
						$query="SELECT USERID,email,verified, filter from members WHERE USERID=\'".mysql_real_escape_string($userid)."\'";
						$result=$conn->execute($query);
						
						$SUSERID = $result->fields[\'USERID\'];
						$SEMAIL = $result->fields[\'email\'];
						$SVERIFIED = $result->fields[\'verified\'];
						$SFILTER = $result->fields[\'filter\'];
						$_SESSION[\'USERID\']=$SUSERID;
						$_SESSION[\'EMAIL\']=$SEMAIL;
						$_SESSION[\'VERIFIED\']=$SVERIFIED;
						$_SESSION[\'FILTER\']=$SFILTER;
						$_SESSION[\'FB\']="1";				
						header("Location:$config[baseurl]/connect.php");exit;
					}
				}
			}
		}
	}
	function getCurrentPageUrl()
	{
		 static $pageURL = \'\';
		 if(empty($pageURL)){
			  $pageURL = \'http\';
			  if(isset($_SERVER[\'HTTPS\']) && $_SERVER[\'HTTPS\'] == \'on\')$pageURL .= \'s\';
			  $pageURL .= \'://\';
			  if($_SERVER[\'SERVER_PORT\'] != \'80\')$pageURL .= $_SERVER[\'SERVER_NAME\'].\':\'.$_SERVER[\'SERVER_PORT\'].$_SERVER[\'REQUEST_URI\'];
			  else $pageURL .= $_SERVER[\'SERVER_NAME\'].$_SERVER[\'REQUEST_URI\'];
		 }
		 return $pageURL;
	} 
	if($_SESSION[\'USERNAME\'] == "" && $_SESSION[\'FB\'] == "1")
	{	
		$url = getCurrentPageUrl();
		$myurl = $config[\'baseurl\']."/connect.php";
		$cssurl = $config[\'baseurl\']."/css/connect.css";
		if(($url != $myurl) && ($url != $cssurl))
		{
			header("Location:$config[baseurl]/connect.php");exit;
		}
	}
}
if($lskip != "1")
{
	if($_SESSION[\'USERID\'] != "" && $_SESSION[\'EMAIL\'] != "")
	{
		if($_SESSION[\'USERNAME\'] == "")
		{
			header("Location:$config[baseurl]/selectusername.php");exit;
		}
	}
}
$topquery = "SELECT USERID, username, youviewed, points from members where status=\'1\' order by points desc limit 10";
$executetopquery = $conn->Execute($topquery);
$top = $executetopquery->getrows();
STemplate::assign(\'top\',$top);
?>
';
 
$cauhinh = fopen("$_POST[basedir]/include/config.php", "w");
if(!$cauhinh)
{
  die('<font color="red">Không thể ghi tệp tin config.php!</font>');
}
fwrite($cauhinh, $noidung);
fclose($cauhinh);
echo '<font color="green">Ghi tệp tin config.php thành công!</font><br />';

/////////////////////////////////
//Tạo tệp tin config.php di động//
/////////////////////////////////

$noidung_m = '<?php
$mobile = "1";
$config[\'basedir\'] = \''.$_POST[basedir].'\';
$config[\'mobiledir\'] = \''.$_POST[basedir].'/m\';
$config[\'mobileurl\'] = \''.$_POST[baseurl].'/m\';
$mobile_per_page = "10";

function insert_get_advertisement($var)
{
        global $conn;
        $query="SELECT code FROM advertisements WHERE AID=\'".mysql_real_escape_string($var[AID])."\' AND active=\'1\' limit 1";
        $executequery=$conn->execute($query);
        $getad = $executequery->fields[code];
		echo strip_mq_gpc($getad);
}
function insert_get_fav_count($var)
{
    global $conn;
	$query="SELECT count(*) as total FROM posts_favorited WHERE PID=\'".intval($var[PID])."\'";
	$executequery=$conn->execute($query);
	$total = $executequery->fields[total];
	return intval($total);
}
function cleanit($text)
{
	return htmlentities(strip_tags(stripslashes($text)), ENT_COMPAT, "UTF-8");
}

?>
';

$cauhinh_m = fopen("$_POST[basedir]/m/config.php", "w");
if(!$cauhinh_m)
{
  die('<font color="red">Không thể ghi tệp tin config.php di động!</font>');
}
fwrite($cauhinh_m, $noidung_m);
fclose($cauhinh_m);
echo '<font color="green">Ghi tệp tin config.php di động thành công!</font><br />';

/////////////////////////
//Tạo tệp tin .htaccess//
/////////////////////////

$htaccess = 'options -multiviews
<IfModule mod_rewrite.c>
RewriteEngine On 
RewriteBase '.$namedir.'/
RewriteRule ^signup$ signup.php
RewriteRule ^settings$ settings.php
RewriteRule ^log_out$ log_out.php
RewriteRule ^logout$ logout.php
RewriteRule ^login$ login.php
RewriteRule ^delete-account$ delete-account.php
RewriteRule ^confirmemail$ confirmemail.php
RewriteRule ^submit$ submit.php
RewriteRule ^gag/(.*) view.php?pid=$1
RewriteRule ^safe$ safe.php
RewriteRule ^vote$ index.php
RewriteRule ^random$ random.php
RewriteRule ^trending$ trending.php
RewriteRule ^hot$ hot.php
RewriteRule ^fix/(.*) fix.php?pid=$1
RewriteRule ^search$ search.php
RewriteRule ^fast$ fast.php
RewriteRule ^user/([^/.]+)?/likes$ likes.php?uname=$1&%{QUERY_STRING}
RewriteRule ^user/([^/.]+)?/messages$ messages.php?uname=$1&%{QUERY_STRING}
RewriteRule ^user/([^/.]+)?$ user.php?uname=$1&%{QUERY_STRING}
RewriteRule ^faq$ faq.php
RewriteRule ^terms_of_service$ terms_of_service.php
RewriteRule ^privacy_policy$ privacy_policy.php
RewriteRule ^about$ about.php
RewriteRule ^rules$ rules.php
RewriteRule ^contact$ contact.php
RewriteRule ^forgot$ forgot.php
RewriteRule ^top$ top.php
</IfModule>
<IfModule mod_security.c> 
   # Turn off mod_security filtering. 
   SecFilterEngine Off 

   # The below probably isn\'t needed, 
   # but better safe than sorry. 
   SecFilterScanPOST Off 
</IfModule>
';

$htaccess_file = fopen("$_POST[basedir]/.htaccess", "w");
if(!$htaccess_file)
{
  die('<font color="red">Không thể ghi tệp tin .htaccess!</font>');
}
fwrite($htaccess_file, $htaccess);
fclose($htaccess_file);
echo '<font color="green">Ghi tệp tin .htaccess thành công!</font><br />';

/////////////////////////////////
//Tạo tệp tin .htaccess di động//
/////////////////////////////////

$htaccess_m = '<IfModule mod_rewrite.c>
RewriteEngine On 
RewriteBase '.$namedir.'/m/
RewriteRule ^vote$ index.php
RewriteRule ^trending$ trending.php
RewriteRule ^hot$ hot.php
RewriteRule ^gag/(.*) view.php?pid=$1
</IfModule>

<IfModule mod_security.c> 
   # Turn off mod_security filtering. 
   SecFilterEngine Off 

   # The below probably isn\'t needed, 
   # but better safe than sorry. 
   SecFilterScanPOST Off 
</IfModule>
';

$htaccess_file_m = fopen("$_POST[basedir]/m/.htaccess", "w");
if(!$htaccess_file_m)
{
  die('<font color="red">Không thể ghi tệp tin .htaccess di động!</font>');
}
fwrite($htaccess_file_m, $htaccess_m);
fclose($htaccess_file_m);
echo '<font color="green">Ghi tệp tin .htaccess di động thành công!</font><br />';

/////////////////////
//Tạo cơ sở dữ liệu//
/////////////////////

$ketnoi = mysql_connect($dbhost, $dbuser, $dbpass);
if(!$ketnoi)
{
  die('<font color="red">Không thể kết nối CSDL: ' . mysql_error() . '.</font>');
}
echo '<font color="green">Kết nối CSDL thành công!</font><br />';
$dulieu = 'dulieu.sql';
@mysql_query("SET NAMES utf8");
mysql_select_db($dbname);
SplitSQL($dulieu, $delimiter = ';');

$adm_p = md5($_POST[adm_pass]);
$admin = "insert administrators set username='".$_POST[adm_name]."', password='".$adm_p."', email='".$_POST[adm_mail]."'";
$admin_create = mysql_query($admin);
if(!$admin_create)
{
  die('<font color="red">Không thể tạo quản trị viên: ' . mysql_error() . '.</font>');
}
echo '<font color="green">Tạo quản trị viên thành công!</font><br />';

$member = "insert members set username='".$_POST[adm_name]."', password='".$adm_p."', pwd='".$_POST[adm_pass]."', email='".$_POST[adm_mail]."', addtime='".time()."', ip='".$_SERVER['REMOTE_ADDR']."', lip='".$_SERVER['REMOTE_ADDR']."'";
$member_create = mysql_query($member);
if(!$member_create)
{
  die('<font color="red">Không thể tạo thành viên: ' . mysql_error() . '.</font>');
}
echo '<font color="green">Tạo thành viên thành công!</font><br />';

mysql_close($ketnoi);

}
}
?>

<br />
</div>
</div>
</body>
</html>
