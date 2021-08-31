<div id="header">
        <h1 class="hooppps"> <a href='{$mobileurl}/'></a> </h1>
        <!--{include file='lang.tpl'}-->
    </div>

    <div class="post-leaderboard-ads">
    	<center>
    	<!--{insert name=get_advertisement AID=1}-->
        </center>
    </div>

    <div id="content">
    
        <a href="{$mobileurl}/gag/{$p.PID}"> 
            <h1>{$p.story|stripslashes}</h1>
            <img alt="{$p.story|stripslashes}" src="{$purl}/{$p.pic}" />
        </a>
        <div class='stats-container'>
            <div class='stats-tooltip-border'></div>
            <div class='stats-tooltip'></div>
            <ul class='stats'>
                <li class='likes'>{insert name=get_fav_count value=var assign=fcount PID=$p.PID}{$fcount}</li>
                <li class='view'>
                    <a class="badge-facebook-comments-toggler" entryId="{$p.PID}" data-url="{$baseurl}/gag/{$p.PID}" href="javascript:void(0);"><fb:comments-count href="{$baseurl}/gag/{$p.PID}"></fb:comments-count> {$lang143}</a>
                </li>
            </ul>
        </div>
        <div id="facebook-comments-{$p.PID}" class="facebook-comments inited">
            <fb:comments href="{$baseurl}/gag/{$p.PID}" num_posts="5" width="300" colorscheme="dark"></fb:comments>
        </div>
    
    </div>
    
    {include file='lang2.tpl'}