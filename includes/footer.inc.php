<footer>
    <section class="novinky"><a name="novinky"></a>
        <div class="row">
            <div class="large-12 columns">
                <h2><?php echo $app->tr['news_title']; ?></h2>
            </div>
        </div>
        <div class="row">
        <?php
        require "includes/_dba.php";
        $query = "SELECT * FROM board WHERE `subject-$app->lang` IS NOT NULL ORDER BY from_date DESC LIMIT 6";
        $message = MySQL_Query($query) or die("chyba SQL");
        while ($riadok = MySQL_Fetch_Array($message)):
        ?>
            <div class="large-4 columns novinka-pata">
                <article class="novinka icon-l39-m">
                    <h3><a href="/<?php echo $app->lang; ?>/novinky/<?php echo $riadok["number"]; ?>"><?php echo $riadok ["subject-".$app->lang]; ?></a></h3>
                    <span class="datum"><?php echo date('d.m.Y', strtotime($riadok['from_date'])); ?></span>
                    <p><?php echo predlozky($riadok ["head-".$app->lang]); ?></p>
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
                <h2 class="icon icon-anketa"><?php echo $app->tr['poll']; ?></h2><a name="anketa"></a>
                <?php include "includes/_anketa.php"; ?>
            </div>
            <div class="large-4 columns">
                <h2 class="icon icon-l39-s">Facebook</h2>
                <div class="fb-like-box" data-href="http://www.facebook.com/2nd.SQN.Sliac" data-width="292" data-show-faces="true" data-colorscheme="dark" data-stream="false" data-show-border="false" data-header="false"></div>
            </div>
            <div class="large-4 columns kontakt">
                <h2 class="icon icon-mail"><?php echo $app->tr['contact']; ?></h2>
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
                <span><a href="/humans.txt"><?php echo $app->tr['webinfo']; ?></a><br>
                (c) 2nd SQN, TFW Sliač, 2009-2013, All rights are reserved</span>
            </div>
        </div>
    </section>
</footer>

<script src="<?php echo $app->config('server_url'); ?>assets/js/vendor/jquery.min.js"></script>
<script src="<?php echo $app->config('server_url'); ?>assets/js/app.min.js"></script>

<script>
    $(document).foundation();
</script>

<script src="<?php echo $app->config('server_url'); ?>assets/js/jquery.equalHeights.min.js"></script>
<script>
/* Stejná výška všech novinek */
var mq = window.matchMedia( "(min-width: 48em)" );
/* Skript spouštíme pouze pro desktop, na mobilech a tabletech ne */
if (mq.matches) {
    $('.novinka-pata').equalHeights();
}
</script>

<script src="<?php echo $app->config('server_url'); ?>assets/js/jquery.easing.min.js"></script>
<script src="<?php echo $app->config('server_url'); ?>assets/js/jquery.scrollUp.min.js"></script>
<script>
/* scrollUp Minimum setup */
$(function () {
    $.scrollUp();
});
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

<!-- Přeskládávání a zarovnání novinek -->
<script src="<?php echo $app->config('server_url'); ?>assets/js/masonry.pkgd.min.js"></script>
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
<script src="<?php echo $app->config('server_url'); ?>assets/js/jquery.threesixty.min.js"></script>
<script src="<?php echo $app->config('server_url'); ?>assets/js/360body.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var spots = new Array ( /* Výchozí sada bodů */
        new Array ( 'l-agregaty-spicka',        'margin: 35.2268% 0 0 21.6967%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/agregaty_spicka_prava.jpg',    '<?php echo $app->tr['walkaround']['agr']; ?>' ),
        new Array ( 'snimac-namrazy',           'margin: 36.7368% 0 0 25.1767%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/rio.jpg',                      '<?php echo $app->tr['walkaround']['rio']; ?>' ),
        new Array ( 'predni-podvozek-sachta',   'margin: 35.4867% 0 0 28.6568%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/predna_sachta.jpg',            '<?php echo $app->tr['walkaround']['fgearshaft']; ?>' ),
        new Array ( 'predni-podvozek-noha',     'margin: 38.7968% 0 0 28.5668%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/podvozok.jpg',                 '<?php echo $app->tr['walkaround']['nosegear']; ?>' ),
        new Array ( 'snimac-nabeh',             'margin: 31.8267% 0 0 32.5867%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/uhol_nabehu.jpg',              '<?php echo $app->tr['walkaround']['aoa']; ?>' ),
        new Array ( 'kanon-gs23',               'margin: 34.7768% 0 0 32.5867%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/gs-23.jpg',                    '<?php echo $app->tr['walkaround']['gs23']; ?>' ),
        new Array ( 'stupacky-kabiny',          'margin: 34.5968% 0 0 38.3068%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/stupacky.jpg',                 '<?php echo $app->tr['walkaround']['ladder']; ?>' ),
        new Array ( 'p-kabina',                 'margin: 25.7568% 0 0 36.8279%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/kokpit_predny.jpg',            '<?php echo $app->tr['walkaround']['front']; ?>' ),
        new Array ( 'z-kabina',                 'margin: 22.9068% 0 0 44.4167%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/zadny_kokpit.jpg',             '<?php echo $app->tr['walkaround']['rear']; ?>' ),
        new Array ( 'brzdici-stity',            'margin: 30.9367% 0 0 49.2868%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/stity.jpg',                    '<?php echo $app->tr['walkaround']['airbreak']; ?>' ),
        new Array ( 'vstup-vzduchu',            'margin: 24.8668% 0 0 49.8169%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/vstup.jpg',                    '<?php echo $app->tr['walkaround']['intake']; ?>' ),
        new Array ( 'hlavni-podvozek-noha',     'margin: 34.5967% 0 0 54.5568%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/podvozok_hlavny.jpg',          '<?php echo $app->tr['walkaround']['maingear']; ?>' ),
        new Array ( 'zavesnik',                 'margin: 33.1668% 0 0 58.3068%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/zavesnik.jpg',                 '<?php echo $app->tr['walkaround']['pylon']; ?>' ),
        new Array ( 'p-kontrolni-otvory',       'margin: 24.7768% 0 0 59.1067%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/kryty_prava.jpg',              '<?php echo $app->tr['walkaround']['holesR']; ?>' ),
        new Array ( 'zapisovac',                'margin: 22.2768% 0 0 68.6568%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/fdr.jpg',                      '<?php echo $app->tr['walkaround']['fdr']; ?>' ),
        new Array ( 'smerovka',                 'margin: 8.9767% 0 0 70.1768%',     '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/kylovka.jpg',                  '<?php echo $app->tr['walkaround']['tail']; ?>' ),
        new Array ( 'vyskovka',                 'display: none',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/turbulatory.jpg',              '<?php echo $app->tr['walkaround']['elev']; ?>' ),
        new Array ( 'tryska',                   'display: none',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/tryska.jpg',                   '<?php echo $app->tr['walkaround']['jet']; ?>' ),
        new Array ( 'signalni-rakety',          'display: none',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/rakety.jpg',                   '<?php echo $app->tr['walkaround']['flares']; ?>' ),
        new Array ( 'agregat-motora',           'display: none',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/agregat_lava.jpg',             '<?php echo $app->tr['walkaround']['engL']; ?>' ),
        new Array ( 'agregat-klimatizace',      'display: none',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/klima.jpg',                    '<?php echo $app->tr['walkaround']['aircond']; ?>' ),
        new Array ( 'apu',                      'display: none',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/v910.jpg',                     '<?php echo $app->tr['walkaround']['APU']; ?>' ),
        new Array ( 'klapky',                   'display: none',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/klapky.jpg',                   '<?php echo $app->tr['walkaround']['flaps']; ?>' ),
        new Array ( 'hlavni-podvozek-sachta',   'display: none',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/hlavna_sachta.jpg',            '<?php echo $app->tr['walkaround']['mgearshaft']; ?>' ),
        new Array ( 'pitotka',                  'display: none',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/pitotka.jpg',                  '<?php echo $app->tr['walkaround']['pitot']; ?>' ),
        new Array ( 'sedadlo',                  'display: none',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/vs1.jpg',                      '<?php echo $app->tr['walkaround']['seat']; ?>' ),
        new Array ( 'p-agregaty-spicka',        'display: none',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/agregaty_spicka_prava.jpg',    '<?php echo $app->tr['walkaround']['noseagr']; ?>' )
    );

    $('.threesixty').threeSixty({
        dragDirection: 'horizontal',
        useKeys: true,
        points: spots,
        posit: spots_steps  /* 360body.js */
    });

    // Přidáme si do walkaroundu body zájmu na základě spots[]
    var sp = spots.length,
        j = 0,
        htmlNotes = '';

    // Příprava dat
    htmlNotes += '<div class="threesixty-frame-notes">';
    /*htmlNotes += '<i class="icona spot"></i>';*/

    for(j; j < sp; j++){
        htmlNotes += '<a href="' + spots[j][2] + '" title="' + spots[j][3] + '" class="fancybox icon icon-i-w-spot '+ spots[j][0] +'" style="' + spots[j][1] + '"></a>';
    }
    htmlNotes += '</div>'

    // Přidáme body do HTML
    $('.walkaround').prepend(htmlNotes);
});

</script>
<!-- <script src="<?php echo $app->config('server_url'); ?>assets/js/360detekce.js"></script> -->

</body>
</html>
