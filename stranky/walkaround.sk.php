<?php include ('includes/header.inc.php'); ?>
<?php include ('includes/menu.inc.php'); ?>
<?php global $server_url; ?>

<div class="walkaround--container">
    <section class="podklad">
        <div class="row">
            <div class="large-12 columns">
                <h1>Walkaround L-39 ZAM Albatros</h1>
            </div>
        </div>
    </section>
    <section class="walkaround">
        <div class="threesixty" data-path="<?php echo $server_url; ?>assets/img/walkaround/zam{index}.png" data-count="36">
            <p class="loading">Načítám data pro walkaround. Čekejte prosím.<br><br> <img src="<?php echo $server_url; ?>assets/img/loading.gif"></p></div>
    </section>
</div>
<?php include ('includes/footer.inc.php');    ?>