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
                            <a href="/galeria">galéria</a>
                        </li>
                        <li>
                            <a href="http://fan2sqn.com/eshop/">fan shop</a>
                        </li>
                        <li>
                            <a href="/odkazy">odkazy</a>
                        </li>
                        <li>
                            <a href="/na-stiahnutie">na stiahnutie</a>
                        </li>
                        <li>
                            <a href="/forum" class="last">fórum</a>
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
