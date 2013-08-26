<header>
    <div class="menu-back">
        <div class="row">
                <a class="home-sec" href="/"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/assets/img/i-horse-inverted.png" alt="">2SQN TFW Sliač</a>
                <a href="#menu" class="menu-link">Menu</a>
                <nav id="cbp-hrmenu" class="cbp-hrmenu large-12 columns" role="navigation">
                    <ul>
                        <li class="homelink">
                            <a class="home" href="/"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/assets/img/logo-2sqn.png" alt=""></a>
                        </li>
                        <li>
                            <a href="/novinky">novinky</a>
                        </li>
                        <li>
                            <a href="#" class="dropdown">o letke</a>
                            <div class="cbp-hrsub">
                                <div class="row">
                                    <div class="large-4 small-12 columns">
                                        <div class="inner">
                                        <h4><a href="/o-letke">Výcviková letka</a></h4>
                                        <ul>
                                            <li><a href="/o-letke#historia">História letky</a></li>
                                            <li><a href="/o-letke#velitelia">Velitelia letky</a></li>
                                            <li><a href="/o-letke#piloti">Lietajúci personál</a></li>
                                            <li><a href="/o-letke#stab">Štábni piloti</a></li>
                                            <li><a href="/o-letke#technici">Technický a&nbsp;zabezpečujúci personál</a></li>
                                        </ul>
                                        </div>
                                    </div>
                                    <div class="large-4 small-12 columns">
                                        <div class="inner">
                                        <h4><a href="/albatros">L-39 albatros</a></h4>
                                        <ul>
                                            <li><a href="/albatros#albatros">Stručný popis</a></li>
                                            <li><a href="/albatros#albatrosy">Slovenské Albatrosy</a></li>
                                            <li><a href="/walkaround">L-39CM/ZAM walkaround</a></li>
                                            <li><a href="/nehody">Nehody L-39</a></li>
                                        </ul>
                                        </div>
                                    </div>
                                    <div class="large-4 small-12 columns">
                                        <div class="inner">
                                        <h4><a href="/lzsl">LZ Sliač</a></h4>
                                        <ul>
                                            <li><a href="/lzsl#historia">História</a></li>
                                            <li><a href="/lzsl#rekonstrukcia">Rekonštrukcia letiska</a></li>
                                            <li><a href="/lzsl#udaje">Údaje letiska</a></li>
                                        </ul>
                                        </div>
                                    </div>
                                </div><!-- /cbp-hrsub row -->
                            </div><!-- /cbp-hrsub -->
                        </li>
                        <li>
                            <a href="#" class="dropdown">foto&amp;video</a>
                            <div class="cbp-hrsub">
                                <div class="row">
                                    <div class="large-4 small-12 columns">
                                        <div class="inner">
                                            <h4><a href="/galeria">Fotky</a></h4>
                                            <ul>
                                                <li><a href="/galeria?dir=2.SQN%20by%20cjvanderende.com">2.SQN by cjvanderende.com</a></li>
                                                <li><a href="/galeria?dir=2.SQN%20by%20Ondrej%20Maliniak">2.SQN by Ondrej Maliniak</a></li>
                                                <li><a href="/galeria?dir=MACE%20XIII">MACE XIII</a></li>
                                                <li><a href="/galeria?dir=Desert%20Thunder%202011">Desert Thunder 2011</a></li>
                                                <li><a href="/galeria?dir=Serpentex%202011">Serpentex 2011</a></li>
                                                <li><a href="/galeria?dir=Slovak%20Hawk%202007">Slovak Hawk 2007</a></li>
                                                <li><a href="/galeria?dir=SIAF%202012">SIAF 2012</a></li>
                                                <li><a href="/galeria?dir=SIAF%202011">SIAF 2011</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="large-4 small-12 columns">
                                        <div class="inner">
                                            <h4 class="hide-for-small">&nbsp;</h4>
                                            <ul>
                                                <li><a href="/galeria?dir=Prvé%20sóla%20L-39">Prvé sóla L-39</a></li>
                                                <li><a href="/galeria?dir=Posledný%20let%20na%20L-39">Posledný let na L-39</a></li>
                                                <li><a href="/galeria?dir=L-39%205301%200tto%20Smik">L-39 5301 0tto Smik</a></li>
                                                <li><a href="/galeria?dir=Rozlúčka%200730">Rozlúčka 0730</a></li>
                                                <li><a href="/galeria?dir=Virtuálna%20letka">Virtuálna letka</a></li>
                                                <li><a href="/galeria?dir=Vaše%20fotky">Vaše fotky</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="large-4 small-12 columns">
                                        <div class="inner">
                                            <h4><a href="/videa">Videa</a></h4>
                                            <ul>
                                                <li><a href="/videa">Skupinové lietanie</a></li>
                                                <li><a href="/videa">Display promo video 2012</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- /cbp-hrsub row -->
                            </div><!-- /cbp-hrsub -->
                        </li>
                        <li>
                            <a href="/odkazy">odkazy</a>
                        </li>
                        <li>
                            <a href="/na-stiahnutie">na stiahnutie</a>
                        </li>
                        <li>
                            <a href="/forum">fórum</a>
                        </li>
                        <li>
                            <a href="http://fan2sqn.com/eshop/" class="last">fan shop</a>
                        </li>
                    </ul>
                    <a href="#" id="pull">Menu</a>
                </nav>
        </div>
    </div>
<?php
$pokracuj = 0;
include ('includes/_kontrola.php');

if ($pokracuj == 1) { ?>
    <div class="userlogout">
        <div class="row">
            <div class="large-12 columns">
                <span>Prihlásený ako: <?php echo $_SESSION['login']; ?> (<a href="/logout">Odhlásiť</a>)</span>
            </div>
        </div>
    </div>
<?php } ?>
</header>
