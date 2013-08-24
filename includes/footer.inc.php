<footer>
    <section class="novinky"><a name="novinky"></a>
        <div class="row">
            <div class="large-12 columns">
                <h2>Novinky</h2>
            </div>
        </div>
        <div class="row">
        <?php
        require "includes/_dba.php";
        $message = MySQL_Query("SELECT * FROM board ORDER BY from_date DESC LIMIT 6") or die("chyba SQL");
        while ($riadok = MySQL_Fetch_Array($message)):
        ?>
            <div class="large-4 columns novinka-pata">
                <article class="novinka icon-l39-m">
                    <h3><a href="/novinky/<?php echo $riadok["number"]; ?>"><?php echo $riadok ["subject"]; ?></a></h3>
                    <span class="datum"><?php echo date('d.m.Y', strtotime($riadok['from_date'])); ?></span>
                    <p><?php echo predlozky($riadok ["head"]); ?></p>
                </article>
            </div>
        <?php
        endwhile;
        mysql_close($db);
        ?>
        </div>
    </section>
    <section class="social">
        <div class="row">
            <div class="large-4 columns anketa">
                <h2 class="icon icon-anketa">Anketa</h2>
                <?php include "includes/_anketa.php"; ?>
            </div>
            <div class="large-4 columns">
                <h2 class="icon icon-l39-s">Facebook</h2>
                <div class="fb-like-box" data-href="http://www.facebook.com/2nd.SQN.Sliac" data-width="292" data-show-faces="true" data-colorscheme="dark" data-stream="false" data-show-border="false" data-header="false"></div>
            </div>
            <div class="large-4 columns kontakt">
                <h2 class="icon icon-mail">Kontakt</h2>
                <address>
                <strong>VÚ 4977 Sliač,</strong> <br>
                ČSA 1, 962 31 Sliač<br><br>

                <strong>tel.:</strong> +421 960 452 009<br>
                <strong>email:</strong> <a href="mailto:webmaster@2sqn.sk">webmaster@2sqn.sk</a>
                </address>
            </div>
        </div>
    </section>
    <section class="copyright">
        <div class="row">
            <div class="large-6 large-offset-6 small-12 columns">
                <span><a href="/humans.txt">Informácie o webe</a><br>
                (c) 2nd SQN, TFW Sliač, 2009-2013, All rights are reserved</span>
            </div>
        </div>
    </section>
</footer>

<script src="<?php echo $server_url; ?>assets/js/vendor/jquery.js"></script>
<script src="<?php echo $server_url; ?>assets/js/app.js"></script>

<script>
    $(document).foundation();
</script>

<script src="<?php echo $server_url; ?>assets/js/jquery.equalHeights.min.js"></script>

<script>
/* Stejná výška všech novinek */
var mq = window.matchMedia( "(min-width: 48em)" );
/* Skript spouštíme pouze pro desktop, na mobilech a tabletech ne */
if (mq.matches) {
    $('.novinka-pata').equalHeights();
}
</script>

<script src="<?php echo $server_url; ?>assets/js/jquery.easing.min.js"></script>
<script src="<?php echo $server_url; ?>assets/js/jquery.scrollUp.js"></script>

<script>
/* scrollUp Minimum setup */
$(function () {
    $.scrollUp();
});
</script>

<script src="<?php echo $server_url; ?>assets/js/cbpHorizontalMenu.js"></script>

<script>
/* Nahodíme menu */
$(function() {
    cbpHorizontalMenu.init();
});

/* Přepínání menu na mobilních zařízeních */
$(document).ready(function() {
    $('body').addClass('js');
    var $menu = $('#cbp-hrmenu'),
        $menulink = $('.menu-link');

    $menulink.click(function() {
        $menulink.toggleClass('active');
        $menu.toggleClass('active');
        return false;
    });
});

/* Zmenšení loga po scrollování */
$(document).ready(function($){
    var showHomeLink = function() {
        var homeLink = $('.home img');

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
<script src="<?php echo $server_url; ?>assets/fancybox/lib/jquery.mousewheel-3.0.6.min.js"></script>

<link rel="stylesheet" href="<?php echo $server_url; ?>assets/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script src="<?php echo $server_url; ?>assets/fancybox/jquery.fancybox.min.js?v=2.1.5"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox").fancybox();
    });
</script>

<!-- Přeskládávání a zarovnání novinek -->
<script src="<?php echo $server_url; ?>assets/js/masonry.pkgd.min.js"></script>

<script type="text/javascript">
$(function(){
    var $container = $('#masonry .row');

    $container.masonry({
        itemSelector: '.novinka-text',
        isAnimated: true
    });
});
</script>

<!-- Walkaround -->
<script src="<?php echo $server_url; ?>assets/js/jquery.threesixty.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    var spots = new Array (
        new Array ( 'p-kabina', 'margin: 26% 0 0 36%', '#pk', 'Přední kabina' ),
        new Array ( 'z-kabina', 'margin: 23.5% 0 0 43.5%', '#zk', 'Zadní kabina' )
    );

    var spots_steps = new Array (
        new Array ( // 0
            new Array ( 'p-kabina', 'margin', '26% 0 0 36%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 43.5%')
        ),
        new Array ( // 1
            new Array ( 'p-kabina', 'margin', '26% 0 0 36%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 43.5%')
        ),
        new Array ( // 2
            new Array ( 'p-kabina', 'margin', '26% 0 0 36%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 43.5%')
        ),
        new Array ( // 3
            new Array ( 'p-kabina', 'margin', '26% 0 0 36%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 43.5%')
        ),
        new Array ( // 4
            new Array ( 'p-kabina', 'margin', '26% 0 0 36%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 43.5%')
        ),
        new Array ( // 5
            new Array ( 'p-kabina', 'margin', '26% 0 0 36%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 43.5%')
        ),
        new Array ( // 6
            new Array ( 'p-kabina', 'margin', '26% 0 0 36%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 43.5%')
        ),
        new Array ( // 7
            new Array ( 'p-kabina', 'margin', '26% 0 0 36%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 43.5%')
        ),
        new Array ( // 8
            new Array ( 'p-kabina', 'margin', '26% 0 0 36%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 43.5%')
        ),
        new Array ( // 9
            new Array ( 'p-kabina', 'display', 'none'),
            new Array ( 'z-kabina', 'display', 'none')
        ),
        new Array ( // 10
            new Array ( 'p-kabina', 'display', 'none'),
            new Array ( 'z-kabina', 'display', 'none')
        ),
        new Array ( // 11
            new Array ( 'p-kabina', 'display', 'none'),
            new Array ( 'z-kabina', 'display', 'none')
        ),
        new Array ( // 12
            new Array ( 'p-kabina', 'display', 'none'),
            new Array ( 'z-kabina', 'display', 'none')
        ),
        new Array ( // 13
            new Array ( 'p-kabina', 'display', 'none'),
            new Array ( 'z-kabina', 'display', 'none')
        ),
        new Array ( // 14
            new Array ( 'p-kabina', 'display', 'none'),
            new Array ( 'z-kabina', 'display', 'none')
        ),
        new Array ( // 15
            new Array ( 'p-kabina', 'display', 'none'),
            new Array ( 'z-kabina', 'display', 'none')
        ),
        new Array ( // 16
            new Array ( 'p-kabina', 'display', 'none'),
            new Array ( 'z-kabina', 'display', 'none')
        ),
        new Array ( // 17
            new Array ( 'p-kabina', 'display', 'none'),
            new Array ( 'z-kabina', 'display', 'none')
        ),
        new Array ( // 18
            new Array ( 'p-kabina', 'margin', '26% 0 0 36%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 43.5%')
        ),
        new Array ( // 19
            new Array ( 'p-kabina', 'margin', '26% 0 0 36%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 43.5%')
        ),
        new Array ( // 20
            new Array ( 'p-kabina', 'margin', '26% 0 0 36%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 43.5%')
        ),
        new Array ( // 21
            new Array ( 'p-kabina', 'margin', '26% 0 0 36%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 43.5%')
        ),
        new Array ( // 22
            new Array ( 'p-kabina', 'margin', '26% 0 0 36%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 43.5%')
        ),
        new Array ( // 23
            new Array ( 'p-kabina', 'margin', '26.5% 0 0 58.5%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 52.5%')
        ),
        new Array ( // 24
            new Array ( 'p-kabina', 'margin', '26.5% 0 0 58.5%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 52.5%')
        ),
        new Array ( // 25
            new Array ( 'p-kabina', 'margin', '26.5% 0 0 58.5%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 52.5%')
        ),
        new Array ( // 26
            new Array ( 'p-kabina', 'margin', '26.5% 0 0 58.5%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 52.5%')
        ),
        new Array ( // 27
            new Array ( 'p-kabina', 'margin', '26.5% 0 0 58.5%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 52.5%')
        ),
        new Array ( // 28
            new Array ( 'p-kabina', 'margin', '26.5% 0 0 56.2%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 51.5%')
        ),
        new Array ( // 29
            new Array ( 'p-kabina', 'margin', '26.5% 0 0 53.5%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 50.5%')
        ),
        new Array ( // 30
            new Array ( 'p-kabina', 'margin', '27% 0 0 51.3%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 49.2%')
        ),
        new Array ( // 31
            new Array ( 'p-kabina', 'margin', '27% 0 0 48.2%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 48.2%')
        ),
        new Array ( // 32
            new Array ( 'p-kabina', 'margin', '27% 0 0 45.5%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 47%')
        ),
        new Array ( // 33
            new Array ( 'p-kabina', 'margin', '26.5% 0 0 43.5%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 46.5%')
        ),
        new Array ( // 34
            new Array ( 'p-kabina', 'margin', '26.5% 0 0 41%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 46%')
        ),
        new Array ( // 35
            new Array ( 'p-kabina', 'margin', '26.5% 0 0 38.5%'),
            new Array ( 'z-kabina', 'margin', '23.5% 0 0 44.5%')
        )
    );
    
    $('.threesixty').threeSixty({
        dragDirection: 'horizontal',
        useKeys: true,
        points: spots,
        posit: spots_steps
    });
});
</script>

</body>
</html>
