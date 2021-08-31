<?php

include("../include/config.php");
include_once("../include/functions/import.php");
verify_login_admin();

if($_POST['submitform'] == "1")
{
	$arr = array("site_name", "contact_email", "site_email", "items_per_page", "quota", "mtrend", "approve_stories", "myes", "mno", "twitter", "FACEBOOK_APP_ID", "FACEBOOK_SECRET", "FACEBOOK_PROFILE", "FACEBOOK_ADMIN", "wm", "watermark", "re_mobile", "m_url", "infinity_paging", "enable_featured", "points_gag", "points_view", "profile_max");
	foreach ($arr as $value)
	{
		$sql = "update config set value='".mysql_real_escape_string($_POST[$value])."' where setting='$value'";
		$conn->execute($sql);
		Stemplate::assign($value,strip_mq_gpc($_POST[$value]));
	}
	$message = "Lưu thành công.";
	Stemplate::assign('message',$message);
}

$mainmenu = "2";
$submenu = "1";
Stemplate::assign('mainmenu',$mainmenu);
Stemplate::assign('submenu',$submenu);
STemplate::display("administrator/global_header.tpl");
STemplate::display("administrator/settings_general.tpl");
STemplate::display("administrator/global_footer.tpl");
?>
