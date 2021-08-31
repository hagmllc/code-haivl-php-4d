	<div class="side-bar">
    	{if $smarty.session.USERID eq ""}
        <li id="side-bar-signup">
        	<a class="spcl-button green" href="{$baseurl}/signup" label="Header">{$lang148}</a>
        </li>
        {/if}
		{insert name=get_advertisement AID=1}
        {include file='top10.tpl'}
        <div class="msg-box">
            <h3>{$lang153} {$site_name}</h3>
            <div class="facebook-like">
                <iframe src="//www.facebook.com/plugins/like.php?href=http://facebook.com/{$FACEBOOK_PROFILE}%2F&amp;send=false&amp;layout=standard&amp;width=270&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px; height:80px;" allowTransparency="true"></iframe>
            </div>
            <div class="twitter-follow">
            	<a href="http://twitter.com/{$twitter}" class="twitter-follow-button">{$lang149} @{$twitter}</a>
            </div>          
            <div class="google-plus">
            	<p>{$lang150}</p>
            	<g:plusone size="medium" href="{$baseurl}"></g:plusone>
            </div>
        </div>        
        <div id="moving-boxes">
            <div id="post-gag-stay" class="_badge-sticky-elements" data-y="60">
                <div class="popular-block">
                    <h3>{$lang260}</h3>
                    <ol>
                    	{insert name=get_feat_gags assign=recgags}
                        {section name=i loop=$recgags}
                        <a class="wrap" href="{$baseurl}/gag/{$recgags[i].PID}">
                            <li>
                            	{if $recgags[i].nsfw eq "1" AND $smarty.session.FILTER ne "0"}
                                <img src="{$baseurl}/images/nsfw.jpg" alt="{$recgags[i].story|stripslashes|mb_truncate:20:"...":'UTF-8'}" />	
                                {else}
                                <img src="{$purl}/s-{$recgags[i].pic}" alt="{$recgags[i].story|stripslashes|mb_truncate:20:"...":'UTF-8'}" />
                                {/if}		
                                <h4>{$recgags[i].story|stripslashes|mb_truncate:20:"...":'UTF-8'}</h4>
                                <h4><a href="{$baseurl}/user/{$recgags[i].username|stripslashes}">{$recgags[i].username|stripslashes}</a></h4>
                                <p class="meta">
                                	<span class="comment"><fb:comments-count href="{$baseurl}/gag/{$recgags[i].PID}"></fb:comments-count></span>
                                    <span class="loved">{insert name=get_fav_count value=var assign=fcount PID=$recgags[i].PID}{$fcount}</span>
                                </p>
                            </li>
                        </a>
                        {/section}
                    </ol>
                </div>
            </div>
        </div>
        <div id="moving-boxes">
            <div class="msg-box">
            	<h3>{$lang151}</h3>
            	<p>{$lang152}</p>
            </div>
            <div class="section-2" style="width:250px">
                <div class="wrap" style="width:250px">
                    <ul class="sideinfo side-items-left" style="font-weight:bold; font-size:11px;margin-bottom:10px;padding-left:5px">
                        <li>Copyright &copy; 2013 {$site_name|stripslashes} - <a class="badge-language-selector" href="javascript:void(0);" style="color:#4c6aa9">{if $smarty.session.language eq "en"}English{elseif $smarty.session.language eq "vi"}Tiếng Việt{/if}</a></li>
                    </ul>
                    <ul class="sideinfo side-items-left" style="overflow:visible; width:400px">
                        <li><a href="{$baseurl}/about">{$lang67}</a></li>
                        <li>·<a href="{$baseurl}/rules">{$lang135}</a></li>
                        <li>·<a href="{$baseurl}/faq">{$lang202}</a></li>
                        <li>·<a href="{$baseurl}/contact">{$lang205}</a></li>
                    </ul>
                    <ul class="sideinfo side-items-left" style="overflow:visible; width:400px">
                        <li><a href="{$baseurl}/terms_of_service">{$lang203}</a></li>
                        <li>·<a href="{$baseurl}/privacy_policy">{$lang204}</a></li>
                    </ul>
                    <div style="clear:both"></div>
                    <div style="padding-left:7px; padding-top:10px;">
                    <a><b>Powered by Gag Việt - Phiên Bản {$ver}</b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>