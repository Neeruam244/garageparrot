<?php require_once _ROOTPATH_.'\templates\header.php'; ?>


<div class="form-container">
    <p class="title-login">Login</p>
        <form class="form" method="POST" action="/index.php?controller=user&action=connexion">
            <div class="groupinput">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="">
            </div>

            <div class="groupinput">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="">
                    
                <div class="forgot">
                    <a rel="noopener noreferrer" href="#">Forgot Password ?</a>
                </div>
            </div>

            <input class="sign" type="submit" value="se Connecter" name="loginUser" target="_blanck">
        </form>
</div>

<?php require_once _ROOTPATH_.'\templates\footer.php'; ?>