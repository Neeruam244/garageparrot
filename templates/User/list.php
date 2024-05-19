<h1>Liste des employés</h1>

    <table style="border: 1px solid black; border-collapse:collapse;">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Mot de passe</th>
                <th>Rôle</th>
            </tr>
        </thead>
        <tbody>
        <?php  foreach ($user as $u) : ?>
            <tr>
                <td><?= htmlspecialchars($u["lastname"])?></td>
                <td><?= htmlspecialchars($u["firstname"])?></td>
                <td><?= htmlspecialchars($u["email"])?></td>
                <td><?= htmlspecialchars($u["password_hash"])?></td>
                <td><?= htmlspecialchars($u["role"])?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

        