<h5>Mettre à jour l'utilisateur</h5>

    <form action="/user?action=updateUser" method="post">
        <input type="hidden" name="id_user" value="<?= $user->getIdUser()?>">

        <label for="lastname">Nom de famille:</label>
        <input type="text" id="lastname" name="lastname" value="<?= $user->getLastname()?>"><br><br>  

        <label for="firstname">Prénom:</label>
        <input type="text" id="firstname" name="firstname" value="<?= $user->getFirstname()?>"><br><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?= $user->getEmail()?>"><br><br>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password"><br><br>

        <label for="role">Rôle:</label>
        <input type="text" id="role" name="role" value="<?=$user->getRole()?>"><br><br>
        
        <input type="submit" value="Mettre à jour">
    </form>

