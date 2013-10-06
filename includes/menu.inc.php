<header>
    <div class="menu-back">
        <div class="row">
                <a class="home-sec" href="/"><img src="<?php echo $app->config('server_url'); ?>assets/img/i-horse-inverted.png" alt="">2SQN TFW Sliač</a>
                <a href="#menu" class="menu-link">Menu</a>
                <nav id="cbp-hrmenu" class="cbp-hrmenu large-12 columns" role="navigation">
                    <ul>
                        <li class="homelink">
                            <a class="home" href="/<?php echo $app->lang; ?>/"><img src="<?php echo $app->config('server_url'); ?>assets/img/logo-2sqn.png" alt=""></a>
                        </li>
                        <li>
                            <a href="/<?php echo $app->lang; ?>/novinky"><?php echo $app->tr['news']; ?></a>
                        </li>
                        <li>
                            <a href="#" class="dropdown"><?php echo $app->tr['sqn']; ?></a>
                            <div class="cbp-hrsub">
                                <div class="row">
                                    <div class="large-4 small-12 columns">
                                        <div class="inner">
                                        <h4><a href="/<?php echo $app->lang; ?>/o-letke"><?php echo $app->tr['trnsqn']; ?></a></h4>
                                        <ul>
                                            <li><a href="/<?php echo $app->lang; ?>/o-letke#historia"><?php echo $app->tr['sqnhistory']; ?></a></li>
                                            <li><a href="/<?php echo $app->lang; ?>/o-letke#velitelia"><?php echo $app->tr['CO']; ?></a></li>
                                            <li><a href="/<?php echo $app->lang; ?>/o-letke#piloti"><?php echo $app->tr['fliers']; ?></a></li>
                                            <li><a href="/<?php echo $app->lang; ?>/o-letke#stab"><?php echo $app->tr['staff']; ?></a></li>
                                            <li><a href="/<?php echo $app->lang; ?>/o-letke#technici"><?php echo $app->tr['tech']; ?></a></li>
                                        </ul>
                                        </div>
                                    </div>
                                    <div class="large-4 small-12 columns">
                                        <div class="inner">
                                        <h4><a href="/<?php echo $app->lang; ?>/albatros"><?php echo $app->tr['l-39title']; ?></a></h4>
                                        <ul>
                                            <li><a href="/<?php echo $app->lang; ?>/albatros#albatros"><?php echo $app->tr['l-39intro']; ?></a></li>
                                            <li><a href="/<?php echo $app->lang; ?>/albatros#albatrosy"><?php echo $app->tr['slovakl-39']; ?></a></li>
                                            <li><a href="/<?php echo $app->lang; ?>/walkaround"><?php echo $app->tr['l-39walkaround']; ?></a></li>
                                            <li><a href="/<?php echo $app->lang; ?>/nehody"><?php echo $app->tr['l-39accidents']; ?></a></li>
                                        </ul>
                                        </div>
                                    </div>
                                    <div class="large-4 small-12 columns">
                                        <div class="inner">
                                        <h4><a href="/<?php echo $app->lang; ?>/lzsl"><?php echo $app->tr['lzsl']; ?></a></h4>
                                        <ul>
                                            <li><a href="/<?php echo $app->lang; ?>/lzsl#historia"><?php echo $app->tr['lzslhistory']; ?></a></li>
                                            <li><a href="/<?php echo $app->lang; ?>/lzsl#rekonstrukcia"><?php echo $app->tr['lzslreconstruction']; ?></a></li>
                                            <li><a href="/<?php echo $app->lang; ?>/lzsl#udaje"><?php echo $app->tr['lzsldata']; ?></a></li>
                                        </ul>
                                        </div>
                                    </div>
                                </div><!-- /cbp-hrsub row -->
                            </div><!-- /cbp-hrsub -->
                        </li>
                        <li>
                            <a href="#" class="dropdown"><?php echo $app->tr['photovideo']; ?></a>
                            <div class="cbp-hrsub">
                                <div class="row">
                                    <div class="large-4 small-12 columns">
                                        <div class="inner">
                                            <h4><a href="/galeria"><?php echo $app->tr['photos']; ?></a></h4>
                                            <ul>
                                                <li><a href="/galeria?dir=2.SQN%20by%20cjvanderende.com">2.SQN by cjvanderende.com</a></li>
                                                <li><a href="/galeria?dir=2.SQN%20by%20Ondrej%20Maliniak">2.SQN by Ondrej Maliniak</a></li>
                                                <li><a href="/galeria?dir=MACE%20XIII">MACE XIII</a></li>
                                                <li><a href="/galeria?dir=Desert%20Thunder%202011">Desert Thunder 2011</a></li>
                                                <li><a href="/galeria?dir=Serpentex%202011">Serpentex 2011</a></li>
                                                <li><a href="/galeria?dir=Slovak%20Hawk%202007">Slovak Hawk 2007</a></li>
                                                <li><a href="/galeria?dir=SIAF%202013">SIAF 2013</a></li>
                                                <li><a href="/galeria?dir=SIAF%202012">SIAF 2012</a></li>
                                                <li><a href="/galeria?dir=SIAF%202011">SIAF 2011</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="large-4 small-12 columns">
                                        <div class="inner">
                                            <h4 class="hide-for-small">&nbsp;</h4>
                                            <ul>
                                                <li><a href="/galeria?dir=Prvé%20sóla%20L-39"><?php echo $app->tr['photos_firstsolos']; ?></a></li>
                                                <li><a href="/galeria?dir=Posledný%20let%20na%20L-39"></a><?php echo $app->tr['photos_lastflights']; ?></li>
                                                <li><a href="/galeria?dir=L-39%205301%200tto%20Smik">L-39 5301 0tto Smik</a></li>
                                                <li><a href="/galeria?dir=Rozlúčka%200730"><?php echo $app->tr['photos_0730farewell']; ?></a></li>
                                                <li><a href="/galeria?dir=Virtuálna%20letka"><?php echo $app->tr['photos_virtual']; ?></a></li>
                                                <li><a href="/galeria?dir=Vaše%20fotky"><?php echo $app->tr['photos_your']; ?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="large-4 small-12 columns">
                                        <div class="inner">
                                            <h4><a href="/<?php echo $app->lang; ?>/videa"><?php echo $app->tr['videos']; ?></a></h4>
                                            <ul>
                                                <li><a href="/<?php echo $app->lang; ?>/videa"><?php echo $app->tr['videos_formations']; ?></a></li>
                                                <li><a href="/<?php echo $app->lang; ?>/videa"><?php echo $app->tr['videos_display2012']; ?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- /cbp-hrsub row -->
                            </div><!-- /cbp-hrsub -->
                        </li>
                        <li>
                            <a href="/<?php echo $app->lang; ?>/odkazy"><?php echo $app->tr['links']; ?></a>
                        </li>
                        <li>
                            <a href="/<?php echo $app->lang; ?>/na-stiahnutie"><?php echo $app->tr['downloads']; ?></a>
                        </li>
                        <li>
                            <a href="/<?php echo $app->lang; ?>/forum"><?php echo $app->tr['forum']; ?></a>
                        </li>
                        <li>
                            <a href="http://fan2sqn.com/eshop/">fan shop</a>
                        </li>
                        <li>
                            <?php
                                if ( $app->lang == $app->availableLangs[0] ) { $switchLang = $app->availableLangs[1]; }
                                else { $switchLang = $app->availableLangs[0]; }
                            ?>
                            <a href="<?php echo $app->config('server_url').$switchLang.$app->environment['PATH_INFO']; ?>" class="language last" title="<?php echo $app->tr['langswitch']; ?>">| <?php echo $switchLang; ?></a>
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
