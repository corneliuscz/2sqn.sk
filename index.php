<?php
require_once('glue.php');

session_start();

$urls = array(
                '/' => 'index',
                '/login' => 'userlogin',
                '/logout' => 'userlogout',
                '/registracia' => 'userreg',
                '/forum' => 'forum',
                '/o-letke' => 'letka',
                '/novinky' => 'novinky',
                '/novinka/[a-zA-Z0-9]' => 'novinka',
                '/lzsl' => 'lzsl',
                '/albatros' => 'albatros',
                '/letka' => 'letka'
            );

class index {
    function GET() { include ('stranky/index.inc.php'); }
}

class userlogin {
    function GET() { include ('includes/_loginform.inc.php'); }
    function POST() {
        if (isset($_POST['login']) && isset($_POST['heslo'])) { // kontrola jestli se poslaly všechny data
            include "includes/_dba.php";     // připojíme se do databáze

            $query = "SELECT * FROM users WHERE login=\"".$_POST['login']."\"";
            if (!$query) { echo "Spojenie z databázou sa nepodarilo"; }

            $result = mysql_query($query, $db);
            if (!$query) { echo "Vyber z databázi sa nepodaril"; }

            if ( mysql_num_rows($result) != 0 ) { // V případě že uživatel existuje tak si jeho data načteme
                $cosi = mysql_fetch_array($result);

                if (isset($cosi['heslo']) && ($cosi['heslo'] == md5($_POST['heslo'])))    {  // Heslo existuje a souhlasí
                    $casova_znacka = time(); // potřebuju čas v unixovém formátu :-)
                    $time = date("Y-m-d H:i:s", $casova_znacka); // ale převedu ti ho i na normální hodnotu

                    $oprava = "UPDATE users SET lastlog=\"".$time."\" WHERE login=\"".$_POST['login']."\""; // upravil jsem pro použití bez CODE
                    $dooprava = mysql_query($oprava, $db) or die ("Chyba!");

                    /* Naplníme session daty z MYSQL. Odtud je pak budeme sosat a nebudeme muset pořád do databáze sahat kdykoliv potřebujeme nějaký údaj */
                    $_SESSION['prihlaseny'] = 1; /* indikace, že jsme prihlášení - místo CODE */
                    $_SESSION['login'] = $cosi['login']; /* uložíme si kdo je přihlášený */
                    $_SESSION['regcas'] = $cosi['regcas']; /* kdy se registroval */
                    $_SESSION['lastlog'] = $cosi['lastlog']; /* kdy byl naposledy prihlášený */
                    $_SESSION['time'] = $casova_znacka; /* Nečinný uživatel vydrží přihlášený $ttl minut od tohoto času - místo CODE - viz kontrola.php */
                    header("Location: /"); /* a pošleme přihlášeného uživatele na stránku, na které vyplnil login */

                    /* tímhle je uživatel přihlášený a už nemusíš měnit odkazy na stránky aby obsahovaly nebezpečné údaje. Vše je uložené v session na serveru a pomocí $_SESSION["promenna"] si to můžeš vytáhnout a pomocí kontrola.php a proměnné $pokracuj zjistíš jestli je uživatel přihlášený - viz main.php :-) */
                }
                else {    // Heslo uživatele nesouhlasí nebo uživatel neexistuje
                    unset($_SESSION['prihlaseny']); /* Pro jistotu zrušíme session a vyprázdníme proměnné kdyby byly původně nastavené */
                    unset($_SESSION['login']);
                    unset($_SESSION['time']);
                    unset($_SESSION['regcas']);
                    unset($_SESSION['lastlog']);
                    session_destroy();
                    echo "Zlé heslo. <a href=\"index.php\">Vyskúšaj znova.</a>";  /* Místo vypsání textu můžeme rovnou zobrazit úvodní stránku s hláškou o špatném hesle (header(index.php?hlaska="Zlé heslo, vyskúšaj znova");) pokud tu funkci na zobrazení hlášek do index.php doplníme :-) V takovém případě by pak bylo lepší se na hlášky odkazovat chybovým kódem (header(index.php?chyba=heslo);) než je předávat přes URL a na základě jej je zobrazovat přes switch(). Případně tomu udělat speciální stránku s výpisem chyb... */
                } // konec IF pokud heslo souhlasi
            }
            else {
                echo "Užívateľ nebol nájdený. <a href=\"index.php\">Vyskúšaj znova.</a>";
            } // konec IF jestli existuje záznam o uživateli
            mysql_close($db); // zavřeme spojení s databází
        }
    }
}

class userlogout {
    function GET() {
        unset($_SESSION['prihlaseny']); // vyprázdníme proměnné
        unset($_SESSION['login']);
        unset($_SESSION['time']);
        unset($_SESSION['regcas']);
        unset($_SESSION['lastlog']);
        session_destroy();                // zrušíme session
        header("Location: /");    // přesměrujeme uživatele na main.php nebo index.php, nebo jinou stránku o tom že byl odhlášený (třeba index.php?kapitola=odhlaseni). Kam přesměrovat uživatele po odhlášení si už nastav, bez toho abych viděl strukturu toho rozhodování co zobrazit se špatně hádá, na to bych potřeboval komplet kód stránek :-)
    }
}

class albatros {
    function GET() { include ('stranky/albatros.inc.php'); }
}

class forum {
    function GET() {
        $pokracuj = 0;
        include ('includes/_kontrola.php');
        include ('includes/_gb_funkcie.php');
        include ('stranky/guestbook.inc.php');
    }

    function POST() {
        $pokracuj = 0;
        include ('includes/_kontrola.php');

        if ( $pokracuj == 1 ) {
            include "includes/_dba.php";
            include "includes/_gb_funkcie.php";
            $sprava_odoslat = gb_sprava_odoslat($_SESSION['login'], $_POST["sprava"], $_SERVER["REMOTE_ADDR"]);
            mysql_close($db); // zavřeme spojení s databází

            if(!$sprava_odoslat) {  echo "Vyskytla sa chyba! Pravdepodobne ste nezadali všetky údaje správne.";  }
        } else {
            echo "Pro odeslání zprávy musíte být přihlášení";
        }
    }
}

class letka {
    function GET() { include ('stranky/letka.inc.php'); }
}

class lzsl {
    function GET() { include ('stranky/lzsl.inc.php'); }
}

class novinky {
    function GET() { include ('stranky/novinky.inc.php'); }
}

class novinka {
    function GET() { include ('stranky/novinky.inc.php'); }
}

?>
<?php include ('includes/header.inc.php'); ?>
<?php include ('includes/menu.inc.php'); ?>
<?php glue::stick($urls); ?>
<?php include ('includes/footer.inc.php');    ?>

<?php

/*
        case "uvod": include("prva.htm"); break;
        case "historia": include("historia.htm"); break;
        case "allnews": include("news_all.php"); break;
        case "galeria": include("galeria.php"); break;
        case "links": include("links.htm"); break;
        case "nova_registracia": include("registracia.php"); break;
        case "registracia": include("registracia.htm"); break;
        case "albatros": include("albatros.htm"); break;
        case "web_info": include("webinfo.htm"); break;
        case "download": include("down/download.htm"); break;
        case "video": include("video/video.html"); break;
        case "guestbook": include("guestbook.php"); break;
        case "upload_picture": include("upload.php"); break;
        case "watermark": include("thumb_800.php"); break;
        case "siaf_watermark": include("thumb_800_siaf.php"); break;
        case "letisko_sliac": include("lzsl.htm"); break;
        case "upload_picture_complete": include("uspesny_upload.php"); break;
        case "upload_picture_complete_siaf": include("uspesny_upload_siaf.php"); break;
        case "fotosutaz": include("siaf_page.php"); break;
        case "walkaround": include("walkaround.htm"); break;
        default: include("prva.htm"); break;
*/

?>
