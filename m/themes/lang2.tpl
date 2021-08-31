    <form name="langselecten" id="langselecten" method="post" style="padding:0; margin:0">
    <input type="hidden" name="language" value="en" />
    </form>
    <form name="langselectes" id="langselectes" method="post" style="padding:0; margin:0">
    <input type="hidden" name="language" value="vi" />
    </form>
    
    <div id='lang'>
        <ul>
            <div class='tip-border'></div>
            <li><a href="#" onclick="document.langselecten.submit();">English</a></li>
            <li><a href="#" onclick="document.langselectes.submit();">Tiếng Việt</a></li>
        </ul>
    </div>
    
    {literal}
    <script type="text/javascript">
    $(function() {
    $('.lang').toggle(
    function() {    
    $('.lang').text("x");
    $('#lang').css({ display: 'block', opacity: 1}); 
    },
    function() {
    $('.lang').html($('#lang_button').attr('label'));
    $('#lang').css({ display: ''});
    }
    );
    });
    </script>
    {/literal}