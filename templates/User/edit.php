<h5 class="modal-title" id="editAccountModalLabel">Modifier le compte</h5>

    <div class="modal-body">
        <form action="user/edit.php" method="POST">
            <div class="mb-3">
                <label for="editLastName" class="form-label">Nom de famille</label>
                <input type="text" class="form-control" id="editLastName" name="lastName" placeholder="<?= $user->getLastname()?>">
                <span class="error-message" id="editLastNameError"></span>
            </div>
            <div class="mb-3">
                <label for="editFirstName" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="editFirstName" name="firstName" placeholder="<?= $user->getFirstname()?>">
                <span class="error-message" id="editFirstNameError"></span>
            </div>
            <div class="mb-3">
                <label for="editEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="editEmail" name="email" placeholder="<?= $user->getEmail()?>">
                <span class="error-message" id="editEmailError"></span>
            </div>
            <div class="mb-3">
                <label for="editPassword" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="editPassword" name="password">
                <span class="error-message" id="editPasswordError"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
