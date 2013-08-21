<div class="loginform">
    <div class="row">
        <div class="large-6 columns">
            <h3>Prihlásenie</h3>
            <form action="/login" method="post">
                <label for="login">Login:</label> <input type="text" name="login" size="10" maxlength="64" value="<?php if (isset($_POST['login'])) echo $_POST['login']; ?>" required>
                <label for="heslo">Heslo:</label> <input type="password" name="heslo" size="10" maxlength="64" required>
                <input type="hidden" name="origin" value="<?php echo $req->getResourceUri() ?>">
                <input type="submit" value="Prihlásenie" class="button medium success radius">
            </form>
        </div>
        <div class="large-6 columns">
            <h3>Registrácia</h3>
            <form action="/registracia" method="post">
                <label for="meno">Meno:</label> <input type="text" name="meno" size="25" maxlength="150" value="<?php if (isset($_POST['meno'])) echo $_POST['meno']; ?>">
                <label for="priezvisko">Priezvisko:</label> <input type="text" name="priezvisko" size="25" maxlength="150" value="<?php if (isset($_POST['priezvisko'])) echo $_POST['priezvisko']; ?>">
                <label for="login">Login (povinné):</label> <input type="text" name="login" size="25" maxlength="150" value="<?php if (isset($_POST['login'])) echo $_POST['login']; ?>" required>
                <label for="email">E-Mail (povinné):</label> <input type="email" name="email" size="25" maxlength="150" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required>
                <label for="password">Heslo (povinné):</label> <input type="password" name="heslo" size="25" maxlength="150" required>
                <label for="hesloover">Potvrdiť heslo (povinné): </label> <input type="password" name="hesloover" size="25" maxlength="150" required>
                <input type="submit" value="Registruj" class="button medium success radius"> <input type="reset" value="Vymazať" class="button medium alert radius">
                <input type="hidden" name="origin" value="<?php echo $req->getResourceUri() ?>">
            </form>
        </div>
    </div>
</div>
