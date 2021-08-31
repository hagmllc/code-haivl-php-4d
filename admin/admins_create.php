<?php

include("../include/config.php");
include_once("../include/functions/import.php");
verify_login_admin();

if($_POST['submitform'] == "1")
{
	$username = $_POST[username];
	$password = $_POST[password];
	$email = $_POST[email];
	
	if($username == "")
	{
		$error = "Lỗi: Vui lòng điền tên đăng nhập.";
	}
	elseif($password == "")
	{
		$error = "Lỗi: Vui lòng nhập mật khẩu.";
	}
	elseif($email == "")
	{
		$error = "Lỗi: Vui lòng nhập một e-mail.";
	}
	else
	{
		$sql="select count(*) as total from administrators WHERE username='".mysql_real_escape_string($username)."'";
		$executequery = $conn->Execute($sql);
		$tadmins = $executequery->fields[total];
		
		if($tadmins == "0")
		{ 
			$sql="select count(*) as total from administrators WHERE email='".mysql_real_escape_string($email)."'";
			$executequery = $conn->Execute($sql);
			$tadmins = $executequery->fields[total];
			
			if($tadmins == "0")
			{
				$sql = "insert administrators set username='".mysql_real_escape_string($username)."', password='".md5($password)."', email='".mysql_real_escape_string($email)."'";
				$conn->execute($sql);
				$message = "Tạo quản trị viên thành công.";
				Stemplate::assign('message',$message);
			}
			else
			{
				$error = "Lỗi: E-mail $email đã được sử dụng.";
			}
		}
		else
		{
			$error = "Lỗi: Tên đăng nhập $username đã được sử dụng.";
		}
	}
}

$mainmenu = "12";
$submenu = "1";
Stemplate::assign('error',$error);
Stemplate::assign('mainmenu',$mainmenu);
Stemplate::assign('submenu',$submenu);
STemplate::display("administrator/global_header.tpl");
STemplate::display("administrator/admins_create.tpl");
STemplate::display("administrator/global_footer.tpl");
?>
