<div class="tips upload">
    <div class="row">
        <div class="large-12 columns">
            <h4>Upload obrázku</h4>
        </div>
        <div class="large-4 columns">
            <form action='/upload_picture' method='post' enctype='multipart/form-data' id='uploadform'>
            <input type="file" name="file"><br>
            <div>Nahrať do albumu:</div>
                <input type="radio" name="adresarf" value="vasefoto" checked="checked"> Vaše fotky<br>
            <?php   /*  <input type="radio" name="adresarf" value="siaf"> SIAF 2011<br> */ ?>
                <input type="submit" value="Vložit obrázok" class="button primary rounded small">
            </form>
        </div>
        <div class="large-8 columns">
            <p>Maximálna šírka obrázku je 1280 px., väčší obrázok nie je možné uložiť. Uložiť je možné len obrázok vo formáte JPG. Obrázok sa uloží do albumu podľa Vášho výberu.</p>
            <p>V názve obrázku nepoužívajte špeciálne znaky ani medzery!</p>
        </div>
    </div>
</div>
