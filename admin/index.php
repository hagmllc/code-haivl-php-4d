<?php

include("../include/config.php");

if ($_SESSION['ADMINID'] != "" && $_SESSION['ADMINUSERNAME'] != "" && $_SESSION['ADMINPASSWORD'] != "")
{
	$redirect = $config['adminurl']."/home.php";
    header("location: $redirect");
}
else
{

if($_POST['login']!="")
{
	$adminusername = $_POST['username'];
	$adminpassword = $_POST['password'];
	if ($adminusername == "")
	{
     	$error = "Lỗi: Chưa điền tên đăng nhập.";
	}
	elseif ($adminpassword == "")
	{
     	$error = "Lỗi: Chưa nhập mật khẩu.";
	}
	else
	{
		$encodedadminpassword = md5($adminpassword);
        $query="SELECT * FROM administrators WHERE username='".mysql_real_escape_string($adminusername)."' AND password='".mysql_real_escape_string($encodedadminpassword)."'";
        $executequery=$conn->execute($query);
		$getid = $executequery->fields[ADMINID];
        $getusername = $executequery->fields[username];
		$getpassword = $executequery->fields[password];

		if (is_numeric($getid) && $getusername != "" && $getpassword != "" && $getusername == $adminusername && $getpassword == $encodedadminpassword)
		{
        	$_SESSION['ADMINID'] = $getid;
        	$_SESSION['ADMINUSERNAME'] = $getusername;
			$_SESSION['ADMINPASSWORD'] = $encodedadminpassword;
			$redirect = $config['adminurl']."/home.php";
        	header("location: $redirect");
		}
		else
		{
			$error = "Tên đăng nhập hoặc mật khẩu không đúng.";
		}
    }
}

STemplate::assign('message',$message);
STemplate::assign('error',$error);
STemplate::display('administrator/index.tpl');

}

?>
