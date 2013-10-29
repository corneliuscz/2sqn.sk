<?php

/*
+-----------------------+
|                       |
|   Odoslanie správy    |
|                       |
+-----------------------+
*/

function gb_sprava_odoslat ($login, $sprava, $ip)
{
 // nastavíme globálnu premennú $db, ktorá bude obsahovať funkciu pripojenia
 global $db;
 global $pokracuj; // vezmeme si globální proměnnou, která nám řekne jesli jsme přihlášení

 // zistíme, či je všetko v poriadku

    if ( empty($sprava) ) {
        return false;
    }
    else {
        $sprava = htmlspecialchars($sprava);
        $datum = date('Y-m-d H:i:s', time());
        $sql = "INSERT INTO guestbook (login, sprava, ip, datum) VALUES (\"".$login."\", \"".$sprava."\", \"".$ip."\", \"".$datum."\")";

        $vysledok = mysql_query($sql) or die ('Vyskytla sa chyba: '.mysql_error());
        return $vysledok;
    }
}

/**
 * Get either a Gravatar URL or complete image tag for a specified email address.
 *
 * @param string $email The email address
 * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
 * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
 * @param boole $img True to return a complete IMG tag False for just the URL
 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
 * @return String containing either just a URL or a complete image tag
 * @source http://gravatar.com/site/implement/images/php/
 */
function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
    $url = 'http://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}

/*
+-----------------------+
|                       |
| Zobrazenie príspevkov |
|                       |
+-----------------------+
*/

function gb_sprava_zobrazit ($na_stranu, $rozsah)
{
 // zistíme aktuálnu stranu
 if (isset($_GET['str'])) {
  $pocet = $_GET['str'];
 } else {
  $pocet = 1;
 }

 // zistíme počet príspevkov

 $sql2 = 'SELECT * FROM guestbook';

 $vysledok2 = mysql_query($sql2) or die ('Chyba MySQL:'. mysql_error());
 $pocet_riadkov = mysql_num_rows($vysledok2);

 if ($pocet_riadkov == 0) {
  $pocet_riadkov = 1;
 }

 // pripravíme si príspevky

 $start = ($pocet - 1) * $na_stranu;
 $n = $pocet_riadkov + 1 - $start;
 $sql = 'SELECT * FROM guestbook ' .
        'ORDER BY id DESC LIMIT '.$start.', '.$na_stranu;

 $vysledok = mysql_query($sql) or die('Chyba MySQL:'. mysql_error());
 while ($riadok = mysql_fetch_array($vysledok)) {
  $n--;
  $obsah = nl2br($riadok['sprava']);
  $ip = $riadok['ip'];
  $datum = date('d.m.Y H:i', strtotime($riadok['datum']));

    // Update na gravatary
    $user_login = $riadok["login"];
    $grav_sql = 'SELECT email FROM users WHERE login LIKE "'.$user_login.'" LIMIT 1';

    $grav_vysledok = mysql_query($grav_sql) or die('Chyba MySQL:'. mysql_error());
    $grav_radky = mysql_num_rows($grav_vysledok);
    if ($grav_radky > 0) {
        $grav_mail = (mysql_fetch_row($grav_vysledok));
    }

    global $app;
    $default = $app->config('server_url')."assets/img/avatar-default.png";   // Vlastní ikona pro ty kteří gravatar nemají
    $size = 64;
    //$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $grav_mail[0] ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;

    $avatar = get_gravatar( $grav_mail[0], $size, $default, 'g', false );
    // Konec update na gravatary
    ?>
    <div class="gb_post row clearfix">
        <div class="large-2 small-3 columns avatar">
            <img src="<?php echo $avatar; ?>" alt="" />
            <span class="meno"><?php echo $riadok ["login"]; ?></span> <span class="datum"><?php echo $datum; ?></span>
        </div>
        <div class="large-10 small-9 columns">
            <p><?php echo make_clickable($obsah); ?></p>
        </div>
    </div>

<?php
    }
// a nakoniec stránkovanie :)
echo '<div class="row"><div class="large-12 columns"><ul class="pagination">';

 $pocet_riadkov = mysql_num_rows($vysledok2);
 if($pocet_riadkov == 0) {
  $pocet_riadkov = 1;
 }
 if ($rozsah%2===0) {
  $rozsah++;
 }
$stranky = ceil($pocet_riadkov / $na_stranu);

// lavy navigator
    $spat = '&laquo;';
    if ($pocet > 1) {
        $spat = '<li class="arrow"><a href="/forum?str='.($pocet - 1).'" title="Predchadzajúce">'.$spat.'</a></li>';
    } else
    {
        $spat = '<li class="arrow unavailable"><a href="" title="Predchadzajúce">'.$spat.'</a></li>';
    }
    echo $spat;

    // jednotlive strany
    for ($i = 1; $i <= $stranky; $i++) {
        if ((($i > $pocet - $rozsah) && ($i < $pocet + $rozsah)) || ($i == 1) || ($i == $stranky)) {
            // nahrada cisel skrytych stranok za bodky
            $bodky_l = '';
            $bodky_p = '';
            /*
            if (($i == 1) && ($pocet > $rozsah)) $bodky_l = '... ';
            if (($i == $stranky) && ($pocet < $stranky - $rozsah)) $bodky_p = '... ';
            */

            if (($i == 1) && ($pocet > $rozsah)) echo '<li>...</li>';
            if (($i == $stranky) && ($pocet < $stranky - $rozsah)) echo '<li>...</li>';

            if ($i == $pocet) {
                echo '<li class="current">'.$bodky_p.'<a href=\'/forum?str='.($i).'\' title=\'Strana '.($i).'\'>'.($i).'</a>'.$bodky_l.'</li>'; // aktualnu stranku zvyrazni inou farbou
            } else {
                echo '<li>'.$bodky_p.'<a href=\'/forum?str='.($i).'\' title=\'Strana '.($i).'\'>'.($i).'</a>'.$bodky_l.'</li>';
            }
        }
    }

    // pravy navigator
    $dalsie = '&raquo';
    if ($pocet < $stranky) {
        $dalsie = '<li class="arrow"><a href=\'/forum?str='.($pocet + 1).'\' title=\'Ďalšie\'>'.$dalsie.'</a></li>';
    } else
    {
    $dalsie = '<li class="arrow unavailable"><a href="" title="Predchadzajúce">'.$dalsie.'</a></li>';
    }
    echo $dalsie;
    echo '</ul></div></div>';
}
?>
