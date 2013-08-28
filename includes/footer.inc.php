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
                <h2 class="icon icon-anketa">Anketa</h2><a name="anketa"></a>
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

<script src="<?php echo $app->config('server_url'); ?>assets/js/vendor/jquery.min.js"></script>
<script src="<?php echo $app->config('server_url'); ?>assets/js/app.min.js"></script>

<script>
    $(document).foundation();
</script>

<script src="<?php $app->config('server_url'); ?>assets/js/jquery.equalHeights.min.js"></script>

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

<script type="text/javascript">
$(document).ready(function(){
    var spots = new Array (
        new Array ( 'l-agregaty-spicka',        'margin: 35.2268% 0 0 21.6967%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/agregaty_spicka_prava.jpg',    'Agregáty v špičke trupu' ),
        new Array ( 'snimac-namrazy',           'margin: 36.7368% 0 0 25.1767%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/rio.jpg',                      'Snímač intezity námrazy RIO-3' ),
        new Array ( 'predni-podvozek-sachta',   'margin: 35.4867% 0 0 28.6568%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/predna_sachta.jpg',            'Predná podvozková šachta' ),
        new Array ( 'predni-podvozek-noha',     'margin: 38.7968% 0 0 28.5668%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/podvozok.jpg',                 'Predná podvozková noha' ),
        new Array ( 'snimac-nabeh',             'margin: 31.8267% 0 0 32.5867%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/uhol_nabehu.jpg',              'Snímač uhla nábehu' ),
        new Array ( 'kanon-gs23',               'margin: 34.7768% 0 0 32.5867%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/gs-23.jpg',                    'Kanón GŠ-23' ),
        new Array ( 'stupacky-kabiny',          'margin: 34.5968% 0 0 38.3068%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/stupacky.jpg',                 'Stupačky do kabíny' ),
        new Array ( 'p-kabina',                 'margin: 25.7568% 0 0 36.8279%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/kokpit_predny.jpg',            'Predná pilotná kabína' ),
        new Array ( 'z-kabina',                 'margin: 22.9068% 0 0 44.4167%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/zadny_kokpit.jpg',             'Zadná pilotná kabína' ),
        new Array ( 'brzdici-stity',            'margin: 30.9367% 0 0 49.2868%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/stity.jpg',                    'Brzdiace štíty' ),
        new Array ( 'vstup-vzduchu',            'margin: 24.8668% 0 0 49.8169%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/vstup.jpg',                    'Vstupy vzduchu do motora' ),
        new Array ( 'hlavni-podvozek-noha',     'margin: 34.5967% 0 0 54.5568%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/podvozok_hlavny.jpg',          'Hlavný podvozok' ),
        new Array ( 'zavesnik',                 'margin: 33.1668% 0 0 58.3068%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/zavesnik.jpg',                 'Podkrídlový závesník' ),
        new Array ( 'p-kontrolni-otvory',       'margin: 24.7768% 0 0 59.1067%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/kryty_prava.jpg',              'Kontrólne otvory - pravá strana trupu' ),
        new Array ( 'zapisovac',                'margin: 22.2768% 0 0 68.6568%',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/fdr.jpg',                      'Havarijný zapisovač FDR-39' ),
        new Array ( 'smerovka',                 'margin: 8.9767% 0 0 70.1768%',     '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/kylovka.jpg',                  'Chvostová plocha' ),
        new Array ( 'vyskovka',                 'display: none',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/turbulatory.jpg',              'Výškové kormidlo' ),
        new Array ( 'tryska',                   'display: none',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/tryska.jpg',                   'Výstupné ústrojenstvo' ),
        new Array ( 'signalni-rakety',          'display: none',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/rakety.jpg',                   'Signálne rakety' ),
        new Array ( 'agregat-motora',           'display: none',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/agregat_lava.jpg',             'Agregáty motora - ľavá strana trupu' ),
        new Array ( 'agregat-klimatizace',      'display: none',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/klima.jpg',                    'Agregáty klimatizácie' ),
        new Array ( 'apu',                      'display: none',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/v910.jpg',                     'Náporová turbína V-910' ),
        new Array ( 'klapky',                   'display: none',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/klapky.jpg',                   'Klapky' ),
        new Array ( 'hlavni-podvozek-sachta',   'display: none',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/hlavna_sachta.jpg',            'Šachta hlavnej podvozkovej nohy' ),
        new Array ( 'pitotka',                  'display: none',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/pitotka.jpg',                  'Pitotova trubica' ),
        new Array ( 'sedadlo',                  'display: none',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/vs1.jpg',                      'Sedadlo VS-1BRI' ),
        new Array ( 'p-agregaty-spicka',        'display: none',    '<?php echo $app->config('server_url'); ?>assets/img/walkaround/foto/agregaty_spicka_prava.jpg',    'Agregáty v špičke trupu' )
    );

    var spots_steps = new Array (
        new Array ( // 0
            new Array ( 'l-agregaty-spicka',        'margin',     '35.2268% 0 0 21.6967%'),
            new Array ( 'snimac-namrazy',           'margin',     '36.7368% 0 0 25.1767%'),
            new Array ( 'predni-podvozek-sachta',   'margin',     '35.4867% 0 0 28.6568%'),
            new Array ( 'predni-podvozek-noha',     'margin',     '38.7968% 0 0 28.5668%'),
            new Array ( 'snimac-nabeh',             'margin',     '31.8267% 0 0 32.5867%'),
            new Array ( 'kanon-gs23',               'margin',     '34.7768% 0 0 32.5867%'),
            new Array ( 'stupacky-kabiny',          'margin',     '34.5968% 0 0 38.3068%'),
            new Array ( 'p-kabina',                 'margin',     '25.7568% 0 0 36.8279%'),
            new Array ( 'z-kabina',                 'margin',     '22.9068% 0 0 44.4167%'),
            new Array ( 'brzdici-stity',            'margin',     '30.9367% 0 0 49.2868%'),
            new Array ( 'vstup-vzduchu',            'margin',     '24.8668% 0 0 49.8169%'),
            new Array ( 'hlavni-podvozek-noha',     'margin',     '34.5967% 0 0 54.5568%'),
            new Array ( 'zavesnik',                 'margin',     '33.1668% 0 0 58.3068%'),
            new Array ( 'p-kontrolni-otvory',       'margin',     '24.7768% 0 0 59.1067%'),
            new Array ( 'zapisovac',                'margin',     '22.2768% 0 0 68.6568%'),
            new Array ( 'smerovka',                 'margin',     '8.9767% 0 0 70.1768%'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 1
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 2
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 3
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 4
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 5
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 6
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 7
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 8
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 9
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 10
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 11
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 12
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 13
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 14
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 15
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 16
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 17
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 18
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'margin',     '26.2068% 0 0 13.4868%'),
            new Array ( 'tryska',                   'margin',     '31.2068% 0 0 17.7668%'),
            new Array ( 'signalni-rakety',          'margin',     '32.4568% 0 0 29.5568%'),
            new Array ( 'agregat-motora',           'margin',     '31.2068% 0 0 37.8568%'),
            new Array ( 'agregat-klimatizace',      'margin',     '27.0968% 0 0 43.6568%'),
            new Array ( 'apu',                      'margin',     '32.6367% 0 0 40.4468%'),
            new Array ( 'klapky',                   'margin',     '32.1868% 0 0 47.1468%'),
            new Array ( 'hlavni-podvozek-sachta',   'margin',     '31.4768% 0 0 50.3568%'),
            new Array ( 'pitotka',                  'margin',     '31.5668% 0 0 66.3368%'),
            new Array ( 'sedadlo',                  'margin',     '21.7368% 0 0 52.4068%'),
            new Array ( 'p-agregaty-spicka',        'margin',     '24.8668% 0 0 67.7668%')
        ),
        new Array ( // 19
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 20
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 21
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 22
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 23
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 24
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 25
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 26
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 27
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 28
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 29
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 30
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 31
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 32
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 33
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 34
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        ),
        new Array ( // 35
            new Array ( 'l-agregaty-spicka',        'display',     'none'),
            new Array ( 'snimac-namrazy',           'display',     'none'),
            new Array ( 'predni-podvozek-sachta',   'display',     'none'),
            new Array ( 'predni-podvozek-noha',     'display',     'none'),
            new Array ( 'snimac-nabeh',             'display',     'none'),
            new Array ( 'kanon-gs23',               'display',     'none'),
            new Array ( 'stupacky-kabiny',          'display',     'none'),
            new Array ( 'p-kabina',                 'display',     'none'),
            new Array ( 'z-kabina',                 'display',     'none'),
            new Array ( 'brzdici-stity',            'display',     'none'),
            new Array ( 'vstup-vzduchu',            'display',     'none'),
            new Array ( 'hlavni-podvozek-noha',     'display',     'none'),
            new Array ( 'zavesnik',                 'display',     'none'),
            new Array ( 'p-kontrolni-otvory',       'display',     'none'),
            new Array ( 'zapisovac',                'display',     'none'),
            new Array ( 'smerovka',                 'display',     'none'),
            new Array ( 'vyskovka',                 'display',     'none'),
            new Array ( 'tryska',                   'display',     'none'),
            new Array ( 'signalni-rakety',          'display',     'none'),
            new Array ( 'agregat-motora',           'display',     'none'),
            new Array ( 'agregat-klimatizace',      'display',     'none'),
            new Array ( 'apu',                      'display',     'none'),
            new Array ( 'klapky',                   'display',     'none'),
            new Array ( 'hlavni-podvozek-sachta',   'display',     'none'),
            new Array ( 'pitotka',                  'display',     'none'),
            new Array ( 'sedadlo',                  'display',     'none'),
            new Array ( 'p-agregaty-spicka',        'display',     'none')
        )
    );

    $('.threesixty').threeSixty({
        dragDirection: 'horizontal',
        useKeys: true,
        points: spots,
        posit: spots_steps
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


<script type="text/javascript">
/* Detekční skript */
/*
$(document).ready(function() {

  $('.walkaround').prepend('<div id="Tip"></div>');
  $('.walkaround').prepend('<div id="DivPosition"></div>');

  $('.threesixty').mousemove(function(e) {

    var offset = $(this).offset();
    var width = $(this).width();

    var x = e.pageX - (offset.left);
    var y = e.pageY - (offset.top);

    // To get nice percents we need to round the numbers a bit.
    var percx = Math.round(((x*100)/width)*100)/100;
    var percy = Math.round(((y*100)/width)*100)/100;

    var percentCorrectionX = ($('.icon').width()/2)*100/width;
    var percentCorrectionY = ($('.icon').height()/2)*100/width;

    var corX = percx-percentCorrectionX;
    var corY = percy-percentCorrectionY;

    $('#Tip')
      .show()
      .css({'left': e.pageX+16, 'top': e.pageY+16})
      .html('Position<br>Percent: '+percx+'%, '+percy+' %<br>Div: '+x+' px, '+y+' px');

    $('.threesixty')
      .click( function () {
        $('#DivPosition')
          .html('Coords: '+corX+'%, '+corY+' %');
        $('.spot')
          .css('margin', corY+'% 0 0 '+corX+'%' );
    });
  });

  $('.threesixty').mouseout(function() {
    $('#Tip').hide();
  });
});
*/
/* Konec detekce */
</script>


</body>
</html>
