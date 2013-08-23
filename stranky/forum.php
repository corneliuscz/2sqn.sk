<div class="head-photo no-pic forum">
    <section class="podklad">
        <div class="row">
            <div class="large-12 columns">
                <h1>Fórum</h1>
            </div>
        </div>
    </section>
</div>

<?php
if ($pokracuj == 1)
{   // pripojíme sa k databázii
    require "includes/_dba.php";
    // vložíme funkcie
    require_once "includes/_gb_funkcie.php";
?>
<div class="forum-vypis">
    <section class="obsah">
        <div class="row">
            <div class="large-12 columns">
                <h3>Vaša správa</h3>
                <form action="" method="post">
                    <textarea name="sprava"></textarea>
                    <input type="submit" value="Odoslať" class="button success medium radius">
                </form>
            </div>
            <div class="large-12 columns">
                <?php gb_sprava_zobrazit(15,2); ?>
            </div>
        </div>
    </section>
</div>

<?php
    mysql_close($db); // zavřeme spojení s databází
}
else { ?>
    <div class="warning">
        <div class="row">
            <div class="large-12 columns">
                <p>Len registrovaní užívatelia majú povolenie pre vstup do sekcie Fórum!</p>
            </div>
        </div>
    </div>
    <?php include ('includes/_loginform.inc.php'); ?>
<?php } ?>

