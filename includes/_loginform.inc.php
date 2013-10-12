<div class="loginform">
    <div class="row">
        <div class="large-6 columns">
            <h3><?php echo $app->tr['login_formtitle']; ?></h3>
            <form action="/login" method="post">
                <label for="login"><?php echo $app->tr['login_formlogin']; ?></label> <input type="text" name="login" size="10" maxlength="64" value="<?php if (isset($_POST['login'])) echo $_POST['login']; ?>" required>
                <label for="heslo"><?php echo $app->tr['login_formpassword']; ?></label> <input type="password" name="heslo" size="10" maxlength="64" required>
                <input type="hidden" name="origin" value="<?php echo $req->getResourceUri() ?>">
                <input type="submit" value="<?php echo $app->tr['login_formdologin']; ?>" class="button medium success radius">
            </form>
        </div>
        <div class="large-6 columns">
            <h3><?php echo $app->tr['reg_formtitle']; ?></h3>
            <form action="/registracia" method="post">
                <label for="meno"><?php echo $app->tr['reg_formname']; ?></label> <input type="text" name="meno" size="25" maxlength="150" value="<?php if (isset($_POST['meno'])) echo $_POST['meno']; ?>">
                <label for="priezvisko"><?php echo $app->tr['reg_formsurname']; ?></label> <input type="text" name="priezvisko" size="25" maxlength="150" value="<?php if (isset($_POST['priezvisko'])) echo $_POST['priezvisko']; ?>">
                <label for="login"><?php echo $app->tr['reg_formlogin']; ?></label> <input type="text" name="login" size="25" maxlength="150" value="<?php if (isset($_POST['login'])) echo $_POST['login']; ?>" required>
                <label for="email"><?php echo $app->tr['reg_formemail']; ?></label> <input type="email" name="email" size="25" maxlength="150" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required>
                <label for="password"><?php echo $app->tr['reg_formpassword']; ?></label> <input type="password" name="heslo" size="25" maxlength="150" required>
                <label for="hesloover"><?php echo $app->tr['reg_formpasswordc']; ?></label> <input type="password" name="hesloover" size="25" maxlength="150" required>
                <input type="submit" value="<?php echo $app->tr['reg_formregister']; ?>" class="button medium success radius"> <input type="reset" value="<?php echo $app->tr['reg_formreset']; ?>" class="button medium alert radius">
                <input type="hidden" name="origin" value="<?php echo $req->getResourceUri() ?>">
            </form>
        </div>
    </div>
</div>
