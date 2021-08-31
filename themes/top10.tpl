<div class="top-10">
<div class="widget widget-member-top">
<h3>Top năng động
<a style="float:right; font-size:12px" href="{$baseurl}/top"><b><i>xem thêm »</i></b></a></h3>

{section name=i loop=$top}

<ul class="widget-content">
<li class="member-top-item">

{insert name=get_member_profilepicture assign=profilepicture value=var USERID=$top[i].USERID}
<a class="thumb" target="_blank" href="{$baseurl}/user/{$top[i].username|stripslashes}">
<img src="{$membersprofilepicurl}/{$profilepicture}?{$smarty.now}">
</a>
<span class="number-pos">
{insert name=get_posts_counts value=var assign=totpo USERID=$top[i].USERID}{$totpo}
</span>

<ul>
<li>
<a target="_blank" href="{$baseurl}/user/{$top[i].username|stripslashes}">
<strong>{$top[i].username|stripslashes}</strong>
</a>
</li>

<li>
<strong>{$top[i].points}</strong> {$lang256}
</li>

<li>
<strong>{$top[i].youviewed}</strong> {$lang254}
</li>
</ul>
<div class="clearfix"></div>
</li>
</ul>

{/section}
<div class="clearfix"></div>
</div>
</div>
