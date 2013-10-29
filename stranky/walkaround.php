<?php include ('includes/header.inc.php'); ?>
<?php include ('includes/menu.inc.php'); ?>

<div class="walkaround--container">
    <section class="podklad">
        <div class="row">
            <div class="large-12 columns">
                <h1>Walkaround &ndash; L-39 ZAM Albatros</h1>
            </div>
        </div>
    </section>
    <section class="walkaround">
        <div class="threesixty" data-path="/assets/img/walkaround/zam{index}.png" data-count="36">
            <p class="loading"><?php echo $app->tr['walkaround']['loading']; ?><br><br> <img src="<?php echo $app->config('server_url'); ?>assets/img/loading.gif"></p></div>
    </section>
</div>
<?php include ('includes/footer-news.inc.php'); ?>
<?php include ('includes/_walkaround-scripts.inc.php'); ?>
<?php include ('includes/footer.inc.php'); ?>
