<?php
include "includes/_dba.php";
global $server_url;

$novinka_query = 'SELECT * FROM board WHERE number LIKE ' .$id . ' LIMIT 1';
$novinka = mysql_query($novinka_query) or die("Chyba načítání novinky");

if (mysql_num_rows($novinka)) { // Novinka existuje
    while ($riadok = MySQL_Fetch_Array($novinka)):
?>
    <div class="head-photo novinka-detail <?php if (empty($riadok["pict"])) echo 'no-pic'; ?>">
        <?php if (!empty($riadok["pict"])) echo '<img src="'.$server_url.'assets/img/novinky/'.$riadok ['pict'].'" class="novinka">'; ?>
        <section class="podklad">
            <div class="row">
                <div class="large-12 columns">
                    <h1><?php echo predlozky($riadok ["subject"]);?></h1>
                    <span class="datum"><?php echo date('d.m.Y', strtotime($riadok['from_date'])); ?></span>
                </div>
            </div>
        </section>
    </div>
    <article class="novinka-text">
        <div class="row">
            <div class="large-12 columns">
                <?php  echo predlozky($riadok ["head"]); ?>
                <?php if (!empty($riadok ["body"])) { ?>
                    <?php echo predlozky($riadok ["body"]); ?>
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
