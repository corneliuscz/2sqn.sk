<?php
session_start();
require 'vendor/autoload.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim (array(
    'mode' => 'development'
));
/*
$app = new \Slim\Slim(array(
    'mode' => 'production'
));
*/

$app->config(array(
    'server_url'    => 'http://'.$_SERVER["HTTP_HOST"].'/'
));

// knihovna pro práci s obrázky
use PHPImageWorkshop\ImageWorkshop;

$req = $app->request;

function make_clickable($text) {
    return preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a href="$1">$1</a>', $text);
}

function predlozky($text) {
    $text = preg_replace('/[ ][svzkuoiaSVZKAUOI][ ]/', '$0&nbsp;', $text);
    $text = preg_replace('/[&nbsp;][svzkuoiaSVZKAUOI][ ]/', '$0&nbsp;', $text);
    $text = str_replace(" &nbsp;", "&nbsp;", $text);
    return $text;
}

/* Router URL */

$app->get('/', function () use ($app) {
    include ('stranky/index.php');
});

$app->get('/login', function () use ($app, $req) {
    $pokracuj = 0;
    include ('includes/_kontrola.php');

    if (!$pokracuj) {
        include ('includes/_loginheader.inc.php');
        include ('includes/_loginform.inc.php');
    } else {
        $app->redirect('/');    // pokud je uživatel přihlášený přesměrujeme ho na homepage
    }
});

$app->post('/login', function () use ($app, $req) {
        include ('includes/_loginheader.inc.php');

        $errors = "";
        $login_success = false;

        if (isset($_POST['login']) && isset($_POST['heslo'])) { // kontrola jestli se poslaly všechny data
            include "includes/_dba.php";     // připojíme se do databáze

            $query = "SELECT * FROM users WHERE login=\"".$_POST['login']."\"";
            if (!$query) {
                $errors .= '<div data-alert="" class="alert-box alert">Spojenie z databázou sa nepodarilo. Skúste to prosím neskôr.</div>';
            }

            $result = mysql_query($query, $db);
            if (!$query) {
                echo "Vyber z databázi sa nepodaril";
                $errors .= '<div data-alert="" class="alert-box alert">Vyber z databázi sa nepodaril. Skúste to prosím neskôr.</div>';
            }

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

                    if ($_POST['origin'] == '/login') {
                        $errors .= '<div data-alert="" class="alert-box success">Prihlásenie bolo úspešné :-)</div>';
                        $login_success = true;
                    } else {
                        $app->redirect($_POST['origin']); /* a pošleme přihlášeného uživatele na původní stránku */
                    }
                    /* tímhle je uživatel přihlášený a už nemusíš měnit odkazy na stránky aby obsahovaly nebezpečné údaje. Vše je uložené v session na serveru a pomocí $_SESSION["promenna"] si to můžeš vytáhnout a pomocí kontrola.php a proměnné $pokracuj zjistíš jestli je uživatel přihlášený - viz main.php :-) */
                }
                else {    // Heslo uživatele nesouhlasí nebo uživatel neexistuje
                    unset($_SESSION['prihlaseny']); /* Pro jistotu zrušíme session a vyprázdníme proměnné kdyby byly původně nastavené */
                    unset($_SESSION['login']);
                    unset($_SESSION['time']);
                    unset($_SESSION['regcas']);
                    unset($_SESSION['lastlog']);
                    session_destroy();
                    $errors .= '<div data-alert="" class="alert-box alert">Použili ste zlé heslo!</div>'; /* Místo vypsání textu můžeme rovnou zobrazit úvodní stránku s hláškou o špatném hesle (header(index.php?hlaska="Zlé heslo, vyskúšaj znova");) pokud tu funkci na zobrazení hlášek do index.php doplníme :-) V takovém případě by pak bylo lepší se na hlášky odkazovat chybovým kódem (header(index.php?chyba=heslo);) než je předávat přes URL a na základě jej je zobrazovat přes switch(). Případně tomu udělat speciální stránku s výpisem chyb... */
                } // konec IF pokud heslo souhlasi
            }
            else {
                $errors .= '<div data-alert="" class="alert-box alert">Je mi ľúto, takého užívateľa nepoznám!</div>';
            } // konec IF jestli existuje záznam o uživateli
            mysql_close($db); // zavřeme spojení s databází
            ?>
            <div class="errors">
                <div class="row">
                    <div class="large-12 columns">
                        <?php echo $errors; ?>
                    </div>
                </div>
            </div>
            <?php
            if ( $login_success ) {
                include ('includes/_loginsuccess.inc.php');
            } else {
                include ('includes/_loginform.inc.php');
            }
        }
});

$app->get('/logout', function () use ($app) {
    unset($_SESSION['prihlaseny']); // vyprázdníme proměnné
    unset($_SESSION['login']);
    unset($_SESSION['time']);
    unset($_SESSION['regcas']);
    unset($_SESSION['lastlog']);
    session_destroy();                // zrušíme session
    $app->redirect('/');    // přesměrujeme uživatele na main.php nebo index.php, nebo jinou stránku o tom že byl odhlášený (třeba index.php?kapitola=odhlaseni). Kam přesměrovat uživatele po odhlášení si už nastav, bez toho abych viděl strukturu toho rozhodování co zobrazit se špatně hádá, na to bych potřeboval komplet kód stránek :-)
});

$app->get('/registracia', function () use ($app, $req) {
    $pokracuj = 0;
    include ('includes/_kontrola.php');

    if (!$pokracuj) {
        include ('includes/_regheader.inc.php');
        include ('includes/_loginform.inc.php');
    } else {
        $app->redirect('/');    // pokud je uživatel přihlášený přesměrujeme ho na homepage
    }
});


$app->post('/registracia', function () use ($app, $req) {
    include ('includes/_regheader.inc.php');

    $errors = "";
    $errors_count = 0;

    if (isset($_POST['login']) && isset($_POST['heslo']) && isset($_POST['hesloover'])){
        // skontroluje ?~Mi su všetky poli?~Mka vyplnené
        if ($_POST['login'] == "" || $_POST['heslo'] == "" || $_POST['email'] == "" || $_POST['hesloover']== "") {
            $errors .= '<div data-alert="" class="alert-box alert">Nevyplnili ste všetky povinné údaje!</div>';
            $errors_count++;
        }

        // skontroluje ?~Mi je heslo a overenie hesla rovnake
        if ($_POST['heslo'] != $_POST['hesloover']){
            $errors .= '<div data-alert="" class="alert-box alert">Vložená hesla nesúhlasí!</div>';
            $errors_count++;
        }

        // kontrola ?~Mi už neexistuje rovnaký login
        include "includes/_dba.php";

        $newlogin = HTMLSpecialChars($_POST['login']);
        $query = "SELECT * FROM users WHERE login=\"".$newlogin."\"";
        $result = mysql_query($query, $db) or die ("Chyba!");
        $num = mysql_num_rows($result);

        if ($num != 0){
            $errors .= '<div data-alert="" class="alert-box alert">Takéto užívateľské meno už existuje, zvoľte iné.</div>';
            $errors_count++;
            unset($_POST['login']);
        }
        // koniec kontrola

        if ( !$errors_count ) {
            // ošetrenie html tagov
            $_POST['meno'] = HTMLSpecialChars($_POST['meno']);
            $_POST['priezvisko'] = HTMLSpecialChars($_POST['priezvisko']);
            $_POST['login'] = HTMLSpecialChars($_POST['login']);
            $_POST['email'] = HTMLSpecialChars($_POST['email']);
            $_POST['heslo'] = HTMLSpecialChars($_POST['heslo']);

            $regcas = date("Y-m-d H:i:s", time());
            $ip = $_SERVER["REMOTE_ADDR"];
            $heslo = md5($_POST['heslo']);

            $oprava = "INSERT INTO users (meno,priezvisko,login,heslo,code,email,regcas,ip )VALUES ('".$_POST['meno']."','".$_POST['priezvisko']."','".$_POST['login']."','".$heslo."','123456','".$_POST['email']."','".$regcas."','".$ip."')";$dooprava = mysql_query($oprava, $db) or die ("Registracia sa nepodarila.");

            // Zrušíme nastavená data z formuláře ať se nám nepletou do formuláře
            unset($_POST['meno']);
            unset($_POST['priezvisko']);
            unset($_POST['email']);
            unset($_POST['heslo']);
            unset($_POST['hesloover']);

            // Vypíšeme zprávu o úspěšné registraci
            $errors .= '<div data-alert="" class="alert-box success">Registrácia bola úspešna! Prihláste sa :-)</div>';
        }
        mysql_close($db); // zavřeme spojení s databází
        ?>
        <div class="errors">
            <div class="row">
                <div class="large-12 columns">
                    <?php echo $errors; ?>
                </div>
            </div>
        </div>
    <?php
    include ('includes/_loginform.inc.php');
    }
});

$app->get('/albatros', function () {
    include ('stranky/albatros.php');
});

$app->get('/nehody', function () {
    include ('stranky/nehody.php');
});

$app->get('/galeria', function () {
    $pokracuj = 0;
    include ('includes/_kontrola.php');
    include ('galeria.php');
});

$app->post('/upload_picture', function () use ($app, $req) {
    include ('includes/_kontrola.php');
    include ('includes/_uploadheader.inc.php');

    $errors         = '';
    $max_resolution = 1280; // pixels, width
    //$slozka       = "vsetky".DIRECTORY_SEPARATOR;
    $photosDir      = "photos".DIRECTORY_SEPARATOR;
    $soubor         = $_FILES["file"]["tmp_name"];
    $type           = $_FILES["file"]["type"];

    if ($pokracuj == 1) {

        if ( isset ( $_POST['adresarf'] ) ) {
            $vybrany_adresar = $_POST['adresarf'];
        } else {
            $vybrany_adresar = 'vasefoto';
        }

        // Detekujeme kam budeme fotky ukládat (SIAF 2011 je úmyslně vypnutý už ve formuláři pro upload)
        switch ($vybrany_adresar) {
            case "vasefoto":
                $dir = "Vaše fotky";    // Vaše fotky
                break;
            case "siaf":
                $dir = "SIAF 2011";     // SIAF 2011
                break;
            default:
                $dir = "Vaše fotky";    // default
            }

        $cil = $photosDir.$dir.DIRECTORY_SEPARATOR;

        if ($type == "image/jpeg") {
            if (is_uploaded_file($soubor))  {
                $user       = $_SESSION['login'];
                $velikost   = getimagesize($soubor);
                $sirka      = $velikost[0];
                $vyska      = $velikost[1];

                if ($sirka <= $max_resolution)
                    {
                        $foto = $_FILES["file"]["name"];
                        $rename_foto = strtr($foto, "äëïöüáčďéěíňóôřšťúůýžľ ÄËÏÖÜÁČĎÉĚÍŇÓÔŘŠŤÚŮÝŽĽ.", "aeiouacdeeinoorstuuyzl_aeiouacdeeinoorstuuyzl-");

                        if ( !file_exists($cil.$rename_foto) ) {
                            $photoLayer = ImageWorkshop::initFromPath($soubor);

                            if ( $photoLayer->getWidth() < 1024 ) { $fontSize = 10; }
                                else { $fontSize = 12; }

                            $textLayer  = ImageWorkshop::initTextLayer("upload by: ".$user, // text
                                                                   "assets/opensans-regular.ttf", // font-file
                                                                   $fontSize, // font-size
                                                                   "000000", // font color
                                                                   0, // rotation
                                                                   null);
                            $photoLayer->addLayerOnTop($textLayer, 0, 20, 'MB');
                            $photoLayer->save($cil, $rename_foto, false, null, 95);
                            $errors .= '<div data-alert="" class="alert-box success">Obrázok bol úspešne uložený.</div><p><a href="/galeria?dir='.$dir.'"><strong>Pokračujte do albumu</strong></a>';
                            // Tady chybí kontrola jeslti se ten obrázek uložil do správného adresáře!!!
                        } else {
                            $errors .= '<div data-alert="" class="alert-box alert">Nahrávanie fotografie zlyhalo, súbor s rovnakým názvom už existuje.</div><p>Premenujte obrázok a skúste to znova.</p>';
                        }
                    }   // Konotrola veliksoti nahrávaného obrázku
                else { $errors .= '<div data-alert="" class="alert-box alert">Obrázok je príliš veľký! ('.$sirka.'x'.$vyska.'px)</div><p>Zmenšite ho na 1280px šírku maximálne a skúste to znova.</p>'; }
            }   // kontrola jestli se jedna o uploadnuty soubor
        }   // kontrola jestli je to JPG
        else { '<div data-alert="" class="alert-box alert">Nahrávať môžete len snímky vo formáte JPG!</div><p>Zkonvertujte obrázok a skúste to znova.</p>'; }
        // Následuje výpis chyb
        ?>
        <div class="errors">
            <div class="row">
                <div class="large-12 columns">
                    <?php echo $errors; ?>
                </div>
            </div>
        </div>
        <?php
        include ('includes/_uploadform.inc.php');
    }   // konec kontroly přihlášení uživatele
});

$app->get('/videa', function () {
    include ('stranky/videa.php');
});

$app->get('/forum', function () use ($app, $req) {
    $pokracuj = 0;
    include ('includes/_kontrola.php');
    include ('stranky/forum.php');
});

$app->post('/forum', function () use ($app, $req) {
    $pokracuj = 0;
    include ('includes/_kontrola.php');

    if ( $pokracuj == 1 ) {
        include "includes/_dba.php";
        include "includes/_gb_funkcie.php";
        $sprava_odoslat = gb_sprava_odoslat($_SESSION['login'], $_POST["sprava"], $_SERVER["REMOTE_ADDR"]);
        mysql_close($db); // zavřeme spojení s databází

        if(!$sprava_odoslat) {  echo "Vyskytla sa chyba! Pravdepodobne ste nezadali všetky údaje správne.";  }
        else { $app->redirect('/forum'); }
    } else {
        echo "Pro odeslání zprávy musíte být přihlášení";
    }
});

$app->get('/o-letke', function () {
    include ('stranky/letka.php');
});

$app->get('/odkazy', function () {
    include ('stranky/odkazy.php');
});

$app->get('/na-stiahnutie', function () use ($app, $req) {
    $pokracuj = 0;
    include ('includes/_kontrola.php');

    include ('stranky/na-stiahnutie.php');
});

$app->get('/walkaround', function () {
    include ('stranky/walkaround.php');
});

$app->get('/lzsl', function () {
    include ('stranky/lzsl.php');
});

$app->get('/novinky(/:id)', function ($id = 0) {
    if (!empty($id)) {  // Číslo novinky z URL
        include ('stranky/novinka.php');
    } else {
        include ('stranky/novinky.php');
    }
});

// Zpracování hlasu ankety
$app->post('/hlasuj', function () use ($app) {
    require "includes/_dba.php";
    //$_SESSION['anketaError'] = '';
    // byl odeslan formular ?
    if(isset($_POST['sent'])) {
        $presmeruj = $_POST['origin']."#anketa";

        if (!isset($_POST['odp'])) {
            //$_SESSION['anketaError'] .= 'Nevybrali jste odpověď<br>';
            $app->redirect($presmeruj);
        } else {
            $odp = (int)$_POST['odp']; //postneme si co zadal

            $CisloAnkety=(int)$_POST['anketa'];

            $ip = $_SERVER["REMOTE_ADDR"]; // IP adresa návštěvníka
            $ip_cele = gethostbyaddr($_SERVER['REMOTE_ADDR']); // cela IP adresa návštěvníka

            $vysledekIP = mysql_query("SELECT COUNT(ip) FROM anketa WHERE `ip`= '$ip' AND `ip_cele`='$ip_cele' AND `anketa`='".$CisloAnkety."'"); //podivame se do databaze jestli uz se z IP navstevnika nehlasovalo
                if (mysql_result($vysledekIP,0) == 0){ // pokud v db ip neni, navstevnik nehlasoval
                    mysql_query("INSERT INTO anketa (`odp`,`anketa`,`ip`,`ip_cele`,`cas`) VALUES ('$odp', '$CisloAnkety', '$ip', '$ip_cele', NOW() )");    // vlozime tedy hlas spolecne s IP do db
                    //$anketaSuccess = 'Děkujeme za váš hlas';
                    $app->redirect($presmeruj);
                }else{
                    //echo "<script language='javascript' type='text/javascript'>alert('Už ste hlasovali.');</script>"; // jinak jestli je v db tak chodime alert ze uz hlasoval
                    //$_SESSION['anketaError'] .= 'Už jste hlasovali<br>';
                    $app->redirect($presmeruj);   // pokud už hlasoval tak nic neuděláme a jen přesměrujeme zpět.
                }
        }
    }
});
?>
<?php include ('includes/header.inc.php'); ?>
<?php include ('includes/menu.inc.php'); ?>
<?php $app->run(); ?>
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
