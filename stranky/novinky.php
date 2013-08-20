<div class="head-photo">
    <section class="podklad">
        <div class="row">
            <div class="large-12 columns">
                <h1>Novinky</h1>
            </div>
        </div>
    </section>
</div>

<article class="novinky">
    <div class="row">
<?php
$query_error = 'chyba SQL';
require "includes/_dba.php";

$page = 0;
$view_number = 10;
$start = $page*$view_number;
$message = MySQL_Query("SELECT * FROM board ORDER BY number DESC LIMIT $start,$view_number") or die($query_error);

while ($riadok = MySQL_Fetch_Array($message)):
 ?>
        <div class="large-12 columns novinka">
            <?php if (!empty($riadok["pict"])) echo '<img src="'.$riadok ['pict'].'" class="novinka">'; ?>
            <h3><?php echo $riadok ["subject"];?></h3>
            <span><?php echo date('d.m.Y', strtotime($riadok['from_date'])); ?></span>
            <?php  echo $riadok ["head"]; ?>
            <?php if (!empty($riadok ["body"])) { ?>
                <?php  echo $riadok ["body"]; ?>
            <?php } ?>
       </div>
<?php
endwhile;
mysql_close($db); // zavřeme spojení s databází
?>
    </div>
</article>
