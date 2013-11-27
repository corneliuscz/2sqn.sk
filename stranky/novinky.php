<?php include ('includes/header.inc.php'); ?>
<?php include ('includes/menu.inc.php'); ?>
<div class="head-photo no-pic novinky">
    <section class="podklad">
        <div class="row">
            <div class="large-12 columns">
                <h1><?php echo $app->tr['news_title']; ?></h1>
            </div>
        </div>
    </section>
</div>

<article id="masonry" class="novinky-vypis">
    <div class="row">
<?php
$query_error = 'chyba SQL';
require "includes/_dba.php";

$counter = 0;
$page = 0;
$view_number = 30;
$start = $page*$view_number;
$message = MySQL_Query("SELECT * FROM board WHERE `subject-$app->lang` IS NOT NULL ORDER BY number DESC LIMIT $start,$view_number") or die($query_error);

while ($riadok = MySQL_Fetch_Array($message)):
        $counter++; /* Pokud je druhá novinka s fotkou tak se nezobrazí vodorovně, ale svisle */
 ?>
        <?php if ( (!empty($riadok["pict"])) && ($counter != 2) ) { ?>
        <div class="large-12 columns novinka-text">
        <?php } else { ?>
        <div class="large-6 columns novinka-text">
        <?php } ?>
            <span class="datum"><?php echo date('d.m.Y', strtotime($riadok['from_date'])); ?></span>
            <h2><a href="/<?php echo $app->lang; ?>/novinky/<?php echo $riadok["number"]; ?>"><?php echo predlozky($riadok ["subject-".$app->lang]); ?></a></h2>
        <?php if ( (!empty($riadok["pict"])) && ($counter != 2) ) { ?>
            <div class="row">
                <div class="large-6 columns">
                    <img src="<?php echo $app->config('server_url'); ?>assets/img/novinky/<?php echo $riadok['pict']; ?>" class="novinka">
                </div>
                <div class="large-6 columns">
        <?php } ?>
        <?php if ( (!empty($riadok["pict"]))  && ($counter == 2) ) { ?>
                <img src="<?php echo $app->config('server_url'); ?>assets/img/novinky/<?php echo $riadok['pict']; ?>" class="novinka">
        <?php } ?>
            <?php  echo predlozky($riadok ["head-".$app->lang]); ?>
            <?php if (!empty($riadok ["body-".$app->lang])) { ?>
                <?php  echo predlozky($riadok ["body-".$app->lang]); ?>
            <?php } ?>
        <?php if ( (!empty($riadok["pict"])) && ($counter != 2) ) { ?>
            </div></div>
        <?php } ?>
       </div>
<?php
endwhile;
mysql_close($db); // zavřeme spojení s databází
?>
    </div>
</article>
<?php include ('includes/footer-news.inc.php'); ?>
<?php include ('includes/_novinky-scripts.inc.php');    ?>
<?php include ('includes/footer.inc.php');    ?>
