<div class="head-photo no-pic novinky">
    <section class="podklad">
        <div class="row">
            <div class="large-12 columns">
                <h1>Novinky</h1>
            </div>
        </div>
    </section>
</div>

<article id="masonry" class="novinky-vypis">
    <div class="row">
<?php
$query_error = 'chyba SQL';
require "includes/_dba.php";

$page = 0;
$view_number = 30;
$start = $page*$view_number;
$message = MySQL_Query("SELECT * FROM board ORDER BY number DESC LIMIT $start,$view_number") or die($query_error);

global $server_url;

while ($riadok = MySQL_Fetch_Array($message)):
 ?>
        <?php if (!empty($riadok["pict"])) { ?>
        <div class="large-12 columns novinka-text">
        <?php } else { ?>
        <div class="large-6 columns novinka-text">
        <?php } ?>
            <span class="datum"><?php echo date('d.m.Y', strtotime($riadok['from_date'])); ?></span>
            <h2><a href="/novinky/<?php echo $riadok["number"]; ?>"><?php echo predlozky($riadok ["subject"]); ?></a></h2>
        <?php if (!empty($riadok["pict"])) { ?>
            <div class="row">
                <div class="large-6 columns">
                    <img src="<?php echo $server_url; ?>assets/img/novinky/<?php echo $riadok['pict']; ?>" class="novinka">
                </div>
                <div class="large-6 columns">
        <?php } ?>
            <?php  echo predlozky($riadok ["head"]); ?>
            <?php if (!empty($riadok ["body"])) { ?>
                <?php  echo predlozky($riadok ["body"]); ?>
            <?php } ?>
        <?php if (!empty($riadok["pict"])) { ?>
            </div></div>
        <?php } ?>
       </div>
<?php
endwhile;
mysql_close($db); // zavřeme spojení s databází
?>
    </div>
</article>
