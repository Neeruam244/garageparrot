<h5 class="modal-title">Ajouter un nouvel employé</h5>

    <div class="modal-body">
        <form action="index.php?controller=user&action=add" method="POST" >

            <label for="lastname">Nom de famille:</label>
            <input type="text" id="lastname" name="lastname" required><br>

            <label for="firstname">Prénom:</label>
            <input type="text" id="firstname" name="firstname" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required><br>

            <label for="role">Role:</label>
            <select class="form-select" name="role" id="role" required>
                <option value="employe">Employé</option>
                <option value="administrateur">Administrateur</option>
            </select>

            <button type="submit">Ajouter</button>
        </form>
    </div>


