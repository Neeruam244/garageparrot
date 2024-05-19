
<div class="modal fade" id="createAccountModal" tabindex="-1" aria-labelledby="createAccountModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createAccountModalLabel">Créer un compte</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="lib/create_account.php" method="POST">
          <div class="mb-3">
            <label for="createIdentifier" class="form-label">Identifiant</label>
            <input type="text" class="form-control" id="createIdentifier" name="identifier">
            <span class="error-message" id="identifierError"></span>
          </div>

          <div class="mb-3">
            <label for="createPassword" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="createPassword" name="password">
            <span class="error-message" id="passwordError"></span>
          </div>

          <div class="mb-3">
            <label for="createEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="createEmail" name="email">
            <span class="error-message" id="emailError"></span>
          </div>

          <div class="mb-3">
            <label for="createLastName" class="form-label">Nom de famille</label>
            <input type="text" class="form-control" id="createLastName" name="lastName">
            <span class="error-message" id="lastNameError"></span>
          </div>

          <div class="mb-3">
            <label for="createFirstName" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="createFirstName" name="firstName">
            <span class="error-message" id="firstNameError"></span>
          </div>

          <div class="mb-3">
            <label for="createRole" class="form-label">Rôle</label>
            <select class="form-select" id="createRole" name="role">
              <option value="employe">Employé</option>
              <option value="administrateur">Administrateur</option>
            </select>
            <span class="error-message" id="roleError"></span>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary">Créer</button>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>