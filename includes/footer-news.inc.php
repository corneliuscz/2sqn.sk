<footer>

    <section class="social">
        <div class="row">
            <div class="large-4 columns anketa">
                <h2 class="icon icon-anketa"><?php echo $app->tr['poll']; ?></h2><a name="anketa"></a>
                <?php include "includes/_anketa.php"; ?>
            </div>
            <div class="large-4 columns">
                <h2 class="icon icon-l39-s">Facebook</h2>
                <div class="fb-like-box" data-href="http://www.facebook.com/2nd.SQN.Sliac" data-width="292" data-show-faces="true" data-colorscheme="dark" data-stream="false" data-show-border="false" data-header="false"></div>
            </div>
            <div class="large-4 columns kontakt">
                <h2 class="icon icon-mail"><?php echo $app->tr['contact']; ?></h2>
                <address>
                <strong>VÚ 4977 Sliač,</strong> <br>
                ČSA 1, 962 31 Sliač<br><br>

                <strong>tel.:</strong> +421 960 452 009<br>
                <strong>email:</strong> <a href="mailto:webmaster@2sqn.sk">webmaster@2sqn.sk</a>
                </address>
            </div>
        </div>
    </section>
    <section class="copyright">
        <div class="row">
            <div class="large-6 large-offset-6 small-12 columns">
                <span><a href="/humans.txt"><?php echo $app->tr['webinfo']; ?></a><br>
                (c) 2nd SQN, TFW Sliač, 2009-2013, All rights are reserved</span>
            </div>
        </div>
    </section>
</footer>

<script src="<?php echo $app->config('server_url'); ?>assets/js/vendor/jquery.min.js"></script>
<script src="<?php echo $app->config('server_url'); ?>assets/js/app.min.js"></script>

<script>
    $(document).foundation();
</script>
