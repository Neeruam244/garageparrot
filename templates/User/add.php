<h5 class="modal-title" id="createAccountModalLabel">Créer un compte</h5>

    <div class="modal-body">
        <form action="user/add.php" method="POST" >
            <div class="mb-3">
                <label for="createLastName" class="form-label p2">Nom de famille</label>
                <input type="text" class="form-control" id="createLastName" name="lastName">
                <span class="error-message" id="lastNameError"></span>
            </div>
            <div class="mb-3">
                <label for="createFirstName" class="form-label p2">Prénom</label>
                <input type="text" class="form-control" id="createFirstName" name="firstName">
                <span class="error-message" id="firstNameError"></span>
            </div>
            <div class="mb-3">
                <label for="createEmail" class="form-label p2">Email</label>
                <input type="email" class="form-control" id="createEmail" name="email">
                <span class="error-message" id="emailError"></span>
            </div>
            <div class="mb-3">
                <label for="createPassword" class="form-label p2">Mot de passe</label>
                <input type="password" class="form-control" id="createPassword" name="password">
                <span class="error-message" id="passwordError"></span>
            </div>
            <div class="mb-3">
                <label for="createRole" class="form-label p2">Rôle</label>
                <select class="form-select" id="createRole" name="role">
                    <option value="employe">Employé</option>
                    <option value="administrateur">Administrateur</option>
                </select>
                <span class="error-message" id="roleError"></span>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Créer</button>
            </div>
        </form>
    </div>

