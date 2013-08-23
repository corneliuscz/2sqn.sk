<div class="head-photo no-pic forum">
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
<div class="forum-vypis">
    <section class="obsah">
        <div class="row">

             <div class="small-6 large-2 columns">
                <td style="width: 236px" height="120px" align="center">
                <a href="data/kalendar2013_demo.pdf" target="_blank">
                <img alt="kalendÃ¡r_2011" src="picture/cal2013.gif" width="150" height="103" border="2"/></a></td>
                <td>Návrh nástenného kalendáru 2013/2014 SIAF</td>
            </div>

             <div class="small-6 large-2 columns">
                <td style="width: 236px" height="120px" align="center">
                <a target="_blank" href="data/kalendar_demo.pdf">
                <img alt="kalendÃ¡r_2011" src="pictureII/kalendar_thumb.jpg" width="150" height="100" border="2"/></a></td>
                <td>Návrh nástenného kalendáru 2011</td>
            </div>
            <div class="small-6 large-2 columns">
                <td style="width: 236px" height="120px" align="center">
                <a target="_blank" href="http://www.2sqn.sk/down/index.php?soubor=kabina_zam">
                <img alt="kabina l-39" src="picture/download_zam_zad.jpg" width="150" height="100" border="2"/></a></td>
                <td>Kresba zadnej kabíny lietadla L-39CM/ZAM</td>
           </div>
            <div class="small-6 large-2 columns">
                <td style="width: 236px" height="120px" align="center">
                <a target="_blank" href="data/L-39CM-predna%20kab.pdf">
                <img alt="kabina l-39" src="picture/download_cm_pre.jpg" width="150" height="100" border="2"/></a></td>
                <td>Kresba prednej kabíny lietadla L-39CM</td>
           </div>
           <div class="small-6 large-2 columns">
                <td style="width: 236px" height="120px" align="center">
                <a target="_blank" href="data/L-39ZAM-predna%20kab.pdf">
                <img alt="kabina l-39" src="picture/download_zam_pre.jpg" width="150" height="100" border="2"/></a></td>
                <td>Kresba prednej kabíny lietadla L-39ZAM </td>
            </div>
            <div class="small-6 large-2 columns">
                <td style="width: 236px" height="120px" align="center">
                <a target="_blank" href="data/havariaL-39ZOK-186.pdf">
                <img alt="hudson" src="picture/file_pdf.jpg" width="150" height="100" border="2"/></a></td>
                <td>Prepis relácie Reportéri o havárii L-39 OK-186</td>
            </div>

            <div class="small-6 large-2 columns">
                <td style="width: 236px" height="120px" align="center">
                <a target="_blank" href="data/Hudson%20visual.pdf">
                <img alt="hudson" src="picture/hudson.jpg" width="150" height="100" border="2"/></a></td>
                <td>Hudson Visual Approach Chart :)</td>
            </div>
            <div class="small-6 large-2 columns">
                <td style="width: 236px" height="120px" align="center">
                <a target="_blank" href="data/Display%20L-39,%202011,%20PolÃ¡Äek.pdf">
                <img alt="" src="picture/ukazka.jpg" width="150" height="100" border="2"/></a></td>
                <td>Grafický nákres Display ukážky na lietadle L-39 CM, ZAM </td>
            </div>
            <div class="small-6 large-2 columns">
                <td style="width: 236px" height="120px" align="center">
                <a target="_blank" href="data/L%2039.pdf">
                <img alt="" src="picture/print.jpg" width="154" height="100" border="2"/></a></td>
                <td>Print L-39 Albatros 2SQN Sliač</td>
            </div>
            <div class="small-6 large-2 columns">
                <td style="width: 236px" height="120px" align="center">
                <a target="_blank" href="data/L-39-1701.pdf">
                <img alt="" src="picture/kallos1.jpg" width="150" height="106" border="2"/></a></td>
                <td>Print L-39 ZAM Albatros ev.č 1701 by Kallos</td>
            </div>
            <div class="small-6 large-2 columns">
                <td style="width: 236px" height="120px" align="center">
                <a target="_blank" href="data/L-39-4707.pdf">
                <img alt="hudson" src="picture/kallos2.jpg" width="150" height="100" border="2"/></a></td>
                <td>Print L-39 ZAM Albatros  ev.č. 4707 by Kallos</td>
            </div>
            <div class="small-6 large-2 columns">
                <td style="width: 236px" height="120px" align="center">
                <a target="_blank" href="data/L-39-4703.pdf">
                <img alt="hudson" src="picture/kallos3.jpg" width="150" height="106" border="2"/></a></td>
                <td>Print L-39 ZAM Albatros ev.č. 4703 by Kallos</td>
            </div>
            <div class="small-6 large-2 columns">
                <td style="width: 236px" height="120px" align="center">
                <a target="_blank" href="data/0730.pdf">
                <img alt="hudson" src="picture/kallos4.jpg" width="150" height="100" border="2"/></a></td>
                <td>Print L-39 V Albatros ev.č . 0730 by Kallos</td>
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

