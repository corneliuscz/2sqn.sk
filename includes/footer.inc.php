<footer>
    <section class="novinky"><a name="novinky"></a>
        <div class="row">
            <div class="large-12 columns">
                <h2>Novinky</h2>
            </div>
        </div>
        <div class="row">
        <?php
        require "includes/_dba.php";
        $message = MySQL_Query("SELECT * FROM board ORDER BY from_date DESC LIMIT 6") or die("chyba SQL");
        while ($riadok = MySQL_Fetch_Array($message)):
        ?>
            <div class="large-4 columns novinka-pata">
                <article class="novinka icon-l39-m">
                    <h3><a href="/novinky/<?php echo $riadok["number"]; ?>"><?php echo $riadok ["subject"]; ?></a></h3>
                    <span class="datum"><?php echo date('d.m.Y', strtotime($riadok['from_date'])); ?></span>
                    <p><?php  echo $riadok ["head"]; ?></p>
                </article>
            </div>
        <?php
        endwhile;
        mysql_close($db);
        ?>
        </div>
    </section>
    <section class="social">
        <div class="row">
            <div class="large-4 columns anketa">
                <h2 class="icon icon-anketa">Anketa</h2>
                <?php include "includes/_anketa.php"; ?>
            </div>
            <div class="large-4 columns">
                <h2 class="icon icon-l39-s">Facebook</h2>
                <div class="fb-like-box" data-href="http://www.facebook.com/2nd.SQN.Sliac" data-width="292" data-show-faces="true" data-colorscheme="dark" data-stream="false" data-show-border="false" data-header="false"></div>
            </div>
            <div class="large-4 columns kontakt">
                <h2 class="icon icon-mail">Kontakt</h2>
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
                <span><a href="/humans.txt">Informácie o webe</a><br>
                (c) 2nd SQN, TFW Sliač, 2009-2013, All rights are reserved</span>
            </div>
        </div>
    </section>
</footer>

<script src="<?php echo $server_url; ?>assets/js/vendor/jquery.js"></script>
<script src="<?php echo $server_url; ?>assets/js/app.js"></script>

<script>
$(document).foundation();
</script>

<script src="<?php echo $server_url; ?>assets/js/cbpHorizontalMenu.js"></script>

<script src="<?php echo $server_url; ?>assets/js/jquery.easing.min.js"></script>
<script src="<?php echo $server_url; ?>assets/js/jquery.scrollUp.js"></script>

<script src="<?php echo $server_url; ?>assets/js/jquery.equalHeights.min.js"></script>

<script>
/* scrollUp Minimum setup */
$(function () {
    $.scrollUp();
});

/* Nahodíme menu */
$(function() {
    cbpHorizontalMenu.init();
});

/* Přepínání menu na mobilních zařízeních */
$(document).ready(function() {
    $('body').addClass('js');
    var $menu = $('#cbp-hrmenu'),
        $menulink = $('.menu-link');

    $menulink.click(function() {
        $menulink.toggleClass('active');
        $menu.toggleClass('active');
        return false;
    });
});

/* Zmenšení loga po scrollování */
$(document).ready(function($){
    var showHomeLink = function() {
        var homeLink = $('.home img');

        if ($(window).scrollTop() < 250) {
            homeLink.css('width', '100%');
        } else {
            homeLink.css('width', '75%').css('transition','width .2s');
        }
    }
    $(window).scroll(function(){ showHomeLink(); })
});

/* Stejná výška všech novinek */
$('.novinka-pata').equalHeights();
</script>
</body>
</html>
