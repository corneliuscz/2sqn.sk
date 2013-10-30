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
    htmlNotes += '<div id="tip"><img src="http://www.2sqn.sk/assets/img/w-leva.png" onclick="$(\'.threesixty\').prevFrame();" class="sep"><img src="http://www.2sqn.sk/assets/img/w-prava.png" onclick="$(\'.threesixty\').nextFrame();"><span><?php echo $app->tr['walkaround']['controls']; ?></span></div>';
    <?php   // Zakomentovat ať se to neobjeví v ostrém webu  /*htmlNotes += '<i class="icona spot"></i>';*/  ?>
    for (j; j < sp; j++) {
        htmlNotes += '<a href="' + spots[j][2] + '" title="' + spots[j][3] + '" class="fancybox icon icon-i-w-spot '+ spots[j][0] +'" style="' + spots[j][1] + '"></a>';
    }
    htmlNotes += '</div>'

    // Přidáme body do HTML
    $(function() {
        $('.walkaround').prepend(htmlNotes);
    });
});

</script>
<!-- <script src="<?php echo $app->config('server_url'); ?>assets/js/360detekce.js"></script> -->
