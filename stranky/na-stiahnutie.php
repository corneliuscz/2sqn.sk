<div class="head-photo no-pic downloads">
    <section class="podklad">
        <div class="row">
            <div class="large-12 columns">
                <h1>Na stiahnutie</h1>
            </div>
        </div>
    </section>
</div>

<?php
if ($pokracuj == 1)
{   // pripojíme sa k databázii
?>
<div class="downloads-vypis">
    <section class="obsah">
        <div class="row">
             <div class="small-12 medium-6 large-3 columns dwnld">
                <a href="downloads/kalendar2013_demo.pdf" target="_blank"><img alt="kalendár 2013/2014" src="assets/img/downloads/kalendar2013_demo.png">Návrh nástenného kalendáru 2013/2014 SIAF</a>
            </div>

             <div class="small-12 medium-6 large-3 columns dwnld">
                <a target="_blank" href="downloads/kalendar2012_demo.pdf"><img alt="kalendár 2012" src="assets/img/downloads/kalendar2012_demo.png">Návrh nástenného kalendáru 2011</a>
            </div>
            <div class="small-12 medium-6 large-3 columns dwnld">
                <a target="_blank" href="downloads/kabina-L-39CM-predna.pdf"><img alt="kabina l-39" src="assets/img/downloads/kabina-L-39CM-predna.png">Kresba prednej kabíny lietadla L-39CM</a>
            </div>
            <div class="small-12 medium-6 large-3 columns dwnld">
                <a target="_blank" href="downloads/kabina-L-39ZAM-predna.pdf"><img alt="kabina l-39" src="assets/img/downloads/kabina-L-39ZAM-predna.png">Kresba prednej kabíny lietadla L-39ZAM</a>
            </div>
        </div>
        <div class="row">
            <div class="small-12 medium-6 large-3 columns dwnld">
                <a target="_blank" href="downloads/kabina-L-39CMZAM-zadna.pdf"><img alt="kabina l-39" src="assets/img/downloads/kabina-L-39CMZAM-zadna.png">Kresba zadnej kabíny lietadla L-39CM/ZAM</a>
           </div>
            <div class="small-12 medium-6 large-3 columns dwnld">
                <a target="_blank" href="downloads/havariaL-39ZOK-186.pdf"><img alt="hudson" src="assets/img/downloads/havariaL-39ZOK-186.png">Prepis relácie Reportéri o havárii L-39 OK-186</a>
            </div>
            <div class="small-12 medium-6 large-3 columns dwnld">
                <a target="_blank" href="downloads/hudson-visual.pdf"><img alt="hudson" src="assets/img/downloads/hudson-visual.png">Hudson Visual Approach Chart :)</a>
            </div>
            <div class="small-12 medium-6 large-3 columns dwnld">
                <a target="_blank" href="downloads/display_L-39_2011_Polacek.pdf"><img alt="" src="assets/img/downloads/display_L-39_2011_Polacek.png">Grafický nákres Display ukážky na lietadle L-39 CM, ZAM</a>
            </div>
        </div>
        <div class="row">
            <div class="small-12 large-3 columns dwnld">
                <a target="_blank" href="downloads/L-39-1730.pdf"><img alt="" src="assets/img/downloads/L-39-1730.png">Print L-39 Albatros 2SQN Sliač</a>
            </div>
            <div class="small-12 large-3 columns dwnld">
                <a target="_blank" href="downloads/L-39-1701.pdf"><img alt="" src="assets/img/downloads/L-39-1701.png">Print L-39 ZAM Albatros ev.č.&nbsp;1701 by Kallos</a>
            </div>
            <div class="small-12 large-3 columns dwnld">
                <a target="_blank" href="data/L-39-4707.pdf"><img alt="hudson" src="assets/img/downloads/L-39-4707.png">Print L-39 ZAM Albatros ev.č.&nbsp;4707 by Kallos</a>
            </div>
            <div class="small-12 large-3 columns dwnld">
                <a target="_blank" href="downloads/L-39-4703.pdf"><img alt="hudson" src="assets/img/downloads/L-39-4703.png">Print L-39 ZAM Albatros ev.č.&nbsp;4703 by Kallos</a>
            </div>
        </div>
        <div class="row">
            <div class="small-12 large-3 columns dwnld">
                <a target="_blank" href="downloads/L-39-0730.pdf"><img alt="hudson" src="assets/img/downloads/L-39-0730.png">Print L-39 V Albatros ev.č.&nbsp;0730 by Kallos</a>
            </div>
        </div>
    </section>
</div>

<?php
} else { ?>
    <div class="warning">
        <div class="row">
            <div class="large-12 columns">
                <p>Len registrovaní užívatelia majú povolenie pre vstup do sekcie Na stiahnutie!</p>
            </div>
        </div>
    </div>
    <?php include ('includes/_loginform.inc.php'); ?>
<?php } ?>

