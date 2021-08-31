<div id="header">
        <h1 class="hooppps"> <a href='{$mobileurl}/'></a> </h1>
        <a id="nav_button" label="{$lang174}" class='nav' href='javascript:void(0);'>{$lang174}</a>
        <!--{include file='lang.tpl'}-->
    </div>

    <div class="post-leaderboard-ads">
    	<center>
    	<!--{insert name=get_advertisement AID=1}-->
        </center>
    </div>

    <div id="content">
    
    	{section name=i loop=$posts}
        <a href="{$mobileurl}/gag/{$posts[i].PID}"> 
            <h1>{$posts[i].story|stripslashes}</h1>
            <img alt="{$posts[i].story|stripslashes}" src="{$purl}/{$posts[i].pic}" />
        </a>
        <div class='stats-container'>
            <div class='stats-tooltip-border'></div>
            <div class='stats-tooltip'></div>
            <ul class='stats'>
                <li class='likes'>{insert name=get_fav_count value=var assign=fcount PID=$posts[i].PID}{$fcount}</li>
                <li class='view'>
                    <a class="badge-facebook-comments-toggler" entryId="{$posts[i].PID}" data-url="{$baseurl}/gag/{$posts[i].PID}" href="javascript:void(0);"><fb:comments-count href="{$baseurl}/gag/{$posts[i].PID}"></fb:comments-count> {$lang143}</a>
                </li>
            </ul>
        </div>
        <div id="facebook-comments-{$posts[i].PID}" class="facebook-comments" style="display:none"></div>
       	{/section}
    
    </div>
    
    <div style="text-align:center">
        <div id="pagination" class="flip">
        	{if $tpp ne ""}
            <a id="jump_next" class='pagebuttons' href="{$mobileurl}/vote?page={$tpp}">&laquo; {$lang166}</a>
            {else}
        	<a href="#" onclick="return false;" class="pagebuttons disabled">&laquo; {$lang166}</a>
            {/if}
            {if $tnp ne ""}
         	<a id="jump_next" class='pagebuttons' href="{$mobileurl}/vote?page={$tnp}">{$lang167} &raquo;</a>	
            {else}
            <a href="#" onclick="return false;" class="pagebuttons disabled">{$lang167} &raquo;</a>
            {/if}												
        </div>
    </div>
			
    <div id='nav'>
        <ul>
            <div class='tip-border'></div>
            <li><a href="{$mobileurl}/hot">{$lang172}</a></li>
            <li><a href="{$mobileurl}/trending">{$lang173}</a></li>
            <li><a href="{$mobileurl}/vote">{$lang174}</a></li>
        </ul>
    </div>
    
    {literal}
    <script type="text/javascript">
    $(function() {
    $('.nav').toggle(
    function() {    
    $('.nav').text("x");
    $('#nav').css({ display: 'block', opacity: 1}); 
    },
    function() {
    $('.nav').html($('#nav_button').attr('label'));
    $('#nav').css({ display: ''});
    }
    );
    });
    </script>
    {/literal}
    
    {include file='lang2.tpl'}