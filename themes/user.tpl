{if $infinity_paging eq "1"}<script type="text/javascript" src="{$baseurl}/js/scroll.jquery.js"></script>{/if}
<div id="main">
    <div id="content-holder">		
        <div class="profile-pad">
            <div class="profile-image">
                <a href="{$baseurl}/user/{$p.username|stripslashes}">
                {insert name=get_member_profilepicture assign=profilepicture value=var USERID=$p.USERID}
                <img src="{$membersprofilepicurl}/{$profilepicture}?{$smarty.now}" alt="{$p.username|stripslashes}" />
                </a>
            </div>
            <div class="profile-info" href="#" style="background:#{$p.color1}">
                <h3><a href="{$baseurl}/user/{$p.username|stripslashes}">{$p.username|stripslashes}</a></h3>
                <h4>{insert name=country_code_to_country value=a assign=country code=$p.country}{$country}</h4>
                <p>{$p.description|stripslashes}</p>
                <a class="home" href="{$p.website|stripslashes}" target="_blank" style="color:#{$p.color2}">{$p.website|stripslashes}</a>
                <a class="friendship" href="{$baseurl}/user/{$p.username|stripslashes}/messages">Messages</a>
            </div>
        </div>
        <div class="main-filter with-topping">
            <ul class="content-type">            
                <li><a class="current" href="{$baseurl}/user/{$p.username|stripslashes}"><strong>{$lang192}</strong> ({$t2})</a></li>
                <li><a  href="{$baseurl}/user/{$p.username|stripslashes}/likes"><strong>{$lang193}</strong> ({$tl})</a></li>            
                <li><a class="" href="{$baseurl}/user/{$p.username|stripslashes}/messages"><strong>{$lang194}</strong> (<fb:comments-count href="{$baseurl}/user/{$p.username|stripslashes}/messages"></fb:comments-count>)</a></li>
            </ul>
        	{if $smarty.session.USERID ne ""}
                {if $smarty.session.FILTER eq "1"}
                <a class="safe-mode-switcher on" href="{$baseurl}/safe?m={$eurl}">&nbsp;</a>
                {else}
                <a class="safe-mode-switcher off" href="{$baseurl}/safe?m={$eurl}&o=1">&nbsp;</a>
                {/if}
            {else}
            	<a class="safe-mode-switcher on" href="{$baseurl}/login">&nbsp;</a>
            {/if}
        </div>
        <div id="content" listPage="">
            <div id="view-info" class="list-tips">
                <div id="shortcut-event-label" style="display:none">{$lang171}</div>
                <span><b>{$lang169}</b>: {$lang170}</span>
                <a href="#keyboard" class="keyboard_link">{$lang168}</a>                    
            </div>
            <div id="entries-content" class="list">
                <ul id="entries-content-ul" class="col-1">
                    {section name=i loop=$posts}
                    {include file="posts_bit.tpl"}
                    {/section}                    
                </ul>
                {if $infinity_paging eq "1"}
                <div id="lastPostsLoader"><img src="{$imageurl}/loading.gif" /></div>
                {literal}
                <script type="text/javascript">
				var tpage = 1;
				$(function(){
					$('#entries-content-ul').scrollPagination({
						'contentPage': '{/literal}{$baseurl}/{literal}usermore.php?UID={/literal}{$p.USERID}{literal}',
						'contentData': {page:function() {return tpage}},
						'scrollTarget': $(window),
						'heightOffset': 10,
						'beforeLoad': function(){
							$('#lastPostsLoader').fadeIn();	
							tpage = tpage+1;
						},
						'afterLoad': function(elementsLoaded){
							 $('#lastPostsLoader').fadeOut();
							 var i = 0;
							 $(elementsLoaded).fadeIn();
						 	$('#backtotop').show();
						}
					});
				});
				</script>
                {/literal}
                {/if}
            </div>
        </div>
    </div>
</div>
{include file='vote_js.tpl'}
{include file='right.tpl'}  
<div id="footer" class="">