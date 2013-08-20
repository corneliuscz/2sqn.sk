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

    $default = "http://fakeimg.pl/40/?text=Vymen me";   // Vlastní ikona pro ty kteří gravatar nemají
    $size = 40;
    $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $grav_mail[0] ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
    // Konec update na gravatary
    ?>
    <div class="gb_post">
        <img src="<?php echo $grav_url; ?>" alt="" />
        <?php echo $riadok ["login"]; ?>
        <?php echo $datum; ?>
        <?php echo "$obsah"; ?>
    </div>
<?php
 }

// a nakoniec stránkovanie :)

echo 'Stránky
        <br />';
 $pocet_riadkov = mysql_num_rows($vysledok2);
 if($pocet_riadkov == 0) {
  $pocet_riadkov = 1;
 }
 if ($rozsah%2===0) {
  $rozsah++;
 }
$stranky = ceil($pocet_riadkov / $na_stranu);

// lavy navigator
    $spat = '&laquo; Predchadzajúce';
    if ($pocet > 1) {
        $spat = '<a href=\'index.php?kapitola=guestbook&str='.($pocet - 1).'\' title=\'Predchadzajúce\'>'.$spat.'</a>';

    } else
    {
    $spat = '';
    }
    echo $spat.' | ';

    // jednotlive strany
    for ($i = 1; $i <= $stranky; $i++) {
        if ((($i > $pocet - $rozsah) && ($i < $pocet + $rozsah)) || ($i == 1) || ($i == $stranky)) {
            // nahrada cisel skrytych stranok za bodky
            $bodky_l = '';
            $bodky_p = '';
            if (($i == 1) && ($pocet > $rozsah)) $bodky_l = '.. ';
            if (($i == $stranky) && ($pocet < $stranky - $rozsah)) $bodky_p = '.. ';

            if ($i == $pocet) {
                echo '<strong>'.($i).'</strong> | '; // aktualnu stranku zvyrazni inou farbou
            } else {
                echo $bodky_p.'<a href=\'index.php?kapitola=guestbook&str='.($i).'\' title=\'Strana '.($i).'\'>'.($i).'</a> | '.$bodky_l;
            }
        }
    }

    // pravy navigator
    $dalsie = 'Ďalšie &raquo';
    if ($pocet < $stranky) {
        $dalsie = '<a href=\'index.php?kapitola=guestbook&str='.($pocet + 1).'\' title=\'Ďalšie\'>'.$dalsie.'</a>';
    } else
    {
    $dalsie = '';
    }
    echo ''.$dalsie;
}

?>
