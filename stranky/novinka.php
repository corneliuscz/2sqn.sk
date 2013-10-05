<?php include ('includes/header.inc.php'); ?>
<?php include ('includes/menu.inc.php'); ?>
<?php
include "includes/_dba.php";

$novinka_query = 'SELECT * FROM board WHERE number LIKE ' .$id . ' LIMIT 1';
$novinka = mysql_query($novinka_query) or die("Chyba načítání novinky");

if (mysql_num_rows($novinka)) { // Novinka existuje
    while ($riadok = MySQL_Fetch_Array($novinka)):

    // Pokud není k dispozici překlad tak zobrazíme slovenskou verzi
    if (!empty($riadok ["subject-".$app->lang]))    { $nadpis = $riadok["subject-".$app->lang]; } else { $nadpis = $riadok["subject-".$app->defaultLang]; }
    if (!empty($riadok ["head-".$app->lang]))       { $uvodnik = $riadok["head-".$app->lang]; } else { $uvodnik = $riadok["head-".$app->defaultLang]; }
    if (!empty($riadok ["body-".$app->lang]))       { $text = $riadok["body-".$app->lang]; } else { $text = $riadok["body-".$app->defaultLang]; }
?>
    <div class="head-photo novinka-detail <?php if (empty($riadok["pict"])) echo 'no-pic'; ?>">
        <?php if (!empty($riadok["pict"])) echo '<img src="'.$app->config('server_url').'assets/img/novinky/'.$riadok ['pict'].'" class="novinka">'; ?>
        <section class="podklad">
            <div class="row">
                <div class="large-12 columns">
                    <h1><?php echo predlozky($nadpis);?></h1>
                    <span class="datum"><?php echo date('d.m.Y', strtotime($riadok['from_date'])); ?></span>
                </div>
            </div>
        </section>
    </div>
    <article class="novinka-text">
        <div class="row">
            <div class="large-12 columns">
                <?php  echo predlozky($uvodnik); ?>
                <?php if (!empty($text)) { ?>
                    <?php echo predlozky($text); ?>
                <?php } ?>
            </div>
        </div>
    </article>
<?php
    endwhile;
} else {
    header('Location: /novinky');
}
mysql_close($db);
include ('includes/footer.inc.php');
