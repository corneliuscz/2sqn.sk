<script src="<?php echo $app->config('server_url'); ?>assets/js/jquery.equalHeights.min.js"></script>
<script>
/* Stejná výška všech novinek */
var mq = window.matchMedia( "(min-width: 48em)" );

/* Skript spouštíme pouze pro desktop, na mobilech a tabletech ne */
if (mq.matches) {
    $('.novinka-pata').equalHeights();
}
</script>

<script src="<?php echo $app->config('server_url'); ?>assets/js/cbpHorizontalMenu.min.js"></script>
<script>
/* Nahodíme menu */
$(function() {
    cbpHorizontalMenu.init();
});

/* Přepínání menu na mobilních zařízeních */
$(document).ready(function() {
    $('body').addClass('js');
    var $menu = $('#cbp-hrmenu'),
        $menulink = $('.menu-link'),
        $secondLevelItems = $('.cbp-hrsub');

    $secondLevelItems.click(function() {
        $menulink.toggleClass('active');
        $menu.toggleClass('active');
        //return false;
    });

    $menulink.click(function() {
        $menulink.toggleClass('active');
        $menu.toggleClass('active');
        return false;
    });
});

/* Zmenšení loga po scrollování */
$(document).ready(function($){
    var showHomeLink = function() {
        var homeLink = $('.home img'),
            header   = $('.menu-back');

        if ($(window).scrollTop() < 250) {
            homeLink.css('width', '100%');
        } else {
            homeLink.css('width', '75%').css('transition','width .2s');
        }
    }
    $(window).scroll(function(){ showHomeLink(); })
});
</script>

<!-- Fancybox na obrázky -->
<script src="<?php echo $app->config('server_url'); ?>assets/fancybox/lib/jquery.mousewheel-3.0.6.min.js"></script>
<link rel="stylesheet" href="<?php echo $app->config('server_url'); ?>assets/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script src="<?php echo $app->config('server_url'); ?>assets/fancybox/jquery.fancybox.min.js?v=2.1.5"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox").fancybox();
    });
</script>

</body>
</html>
