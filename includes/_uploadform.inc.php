<div class="tips upload">
    <div class="row">
        <div class="large-12 columns">
            <h4><?php echo $app->tr['upload_formtitle']; ?></h4>
        </div>
        <div class="large-4 columns">
            <form action='/upload_picture' method='post' enctype='multipart/form-data' id='uploadform'>
            <input type="file" name="file"><br>
            <div><?php echo $app->tr['upload_uploadto']; ?></div>
                <input type="radio" name="adresarf" value="vasefoto" checked="checked"> Vaše fotky<br>
            <?php   /*  <input type="radio" name="adresarf" value="siaf"> SIAF 2011<br> */ ?>
                <input type="submit" value="Vložit obrázok" class="button primary rounded small">
            </form>
        </div>
        <div class="large-8 columns">
            <?php echo $app->tr['upload_infotext']; ?>
        </div>
    </div>
</div>
