<div class="head-photo">
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
<article class="guestbook">
        <div class="row">
            <div class="large-12 columns">
                <form action="" method="post">
                    <textarea rows="5" cols="80" name="sprava"></textarea>
                    <br>
                    <input type="submit" value="Odoslat">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
            <?php gb_sprava_zobrazit(15,2); ?>
            </div>
        </div>
</article>

<?php
    mysql_close($db); // zavřeme spojení s databází
}
else { ?>
<article class="loginform">
        <div class="row">
            <div class="large-12 columns">
                <p>Len registrovaní užívatelia majú povolenie pre vstup do sekcie Fórum! <br />Zaregistrujte sa a môžete pridávať príspevky v časti Fórum.</p>
                <?php include ('includes/_loginform.inc.php'); ?>
            </div>
        </div>
</article>
<?php } ?>

