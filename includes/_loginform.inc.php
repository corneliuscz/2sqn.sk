        <form action="/login" method="post">
            <label for="login">Login:</label> <input type="text" name="login" size="10" maxlength="64">
            <label for="heslo">Heslo:</label> <input type="password" name="heslo" size="10" maxlength="64">
            <input type="hidden" name="origin" value="<?php echo $req->getResourceUri() ?>">
            <input type="submit" value="Prihlásenie">
        </form>
        <a href="/registracia">Registrácia</a>
