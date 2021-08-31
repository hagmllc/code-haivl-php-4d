<div id="main">
    <div id="content-holder">
        <div class="post-info-pad">
            <h1>{$lang253}</h1>
        </div>
        <div id="content">
        	<div id="entries-content" class="list">
                {section name=i loop=$posts}
                <div style="margin-bottom: 15px; background: none repeat scroll 0% 0% rgb(248, 248, 248); border-radius: 5px 5px 5px 5px; padding: 15px; text-shadow: 0 1px rgb(255, 255, 255);">
                	{insert name=get_member_profilepicture assign=profilepicture value=var USERID=$posts[i].USERID}
                	<img src="{$membersprofilepicurl}/{$profilepicture}?{$smarty.now}" style="border: 2px solid rgb(187, 187, 187); float: left; margin-right: 10px;width:50px;height:50px;">
                    <div style="margin: 0 15px 0 60px;">
                    	<a href="{$baseurl}/user/{$posts[i].username|stripslashes}" style="font-size: 16px; font-weight: bold; padding-bottom: 5px; margin-bottom: 6px; border-bottom: 1px solid rgb(242, 242, 242); display: block;">{$posts[i].username|stripslashes}</a>
                    	<a href="{$baseurl}/user/{$posts[i].username|stripslashes}" style="font-size: 12px; color: rgb(68, 68, 68);">{$lang255}: {insert name=get_rank value=var assign=urank pg=$page ite=$smarty.section.i.iteration}{$urank}&nbsp;&nbsp;<span style="color: rgb(238, 238, 238);">|</span>&nbsp;&nbsp;{$lang257}: {insert name=get_posts_counts value=var assign=totpo USERID=$posts[i].USERID}{$totpo}&nbsp;&nbsp;<span style="color: rgb(238, 238, 238);">|</span>&nbsp;&nbsp;{$lang254}: {$posts[i].youviewed}<span style="color: rgb(238, 238, 238);">|</span>&nbsp;&nbsp;{$lang256}: {$posts[i].points}</a>
                    </div>
                	<div class="clear"></div>
                </div>
     			{/section}
            </div>            

            <br/>
            <div id="paging-buttons" class="paging-buttons">
            	{if $tpp ne ""}
                <a href="{$baseurl}/top?page={$tpp}" class="previous">&laquo; {$lang166}</a>
                {else}
                <a href="#" onclick="return false;" class="previous disabled">&laquo; {$lang166}</a>
                {/if}
                {if $tnp ne ""}
                <a href="{$baseurl}/top?page={$tnp}" class="older">{$lang167} &raquo;</a>
                {else}
                <a href="#" onclick="return false;" class="older disabled">{$lang167} &raquo;</a>
                {/if}
            </div>
        </div>
    </div>
</div>
{include file='right.tpl'}  
<div id="footer" class="">