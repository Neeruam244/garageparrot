<div class="container mt-5">

    <h5>Ajouter un nouvel employé</h5>

    <form action="index.php?controller=user&action=add" method="POST" >
        <div class="mx-auto p-2">
            <label for="lastname">Nom de famille:</label>
            <input type="text" id="lastname" name="lastname" required><br>
        </div>

        <div class="mx-auto p-2">
            <label for="firstname">Prénom:</label>
            <input type="text" id="firstname" name="firstname" required><br>
        </div>

        <div class="mx-auto p-2">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
        </div>

        <div class="mx-auto p-2">
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required><br>
        </div>

        <div class="mx-auto p-2">
            <label for="role">Role:</label>
            <select class="form-select" name="role" id="role" required>
                <option value="employe">Employé</option>
                <option value="administrateur">Administrateur</option>
            </select>
        </div>

        <div class="mx-auto p-2">
        <button type="submit" class="btn btn-outline-success">Ajouter</button>
        </div>

    </form>
</div>







