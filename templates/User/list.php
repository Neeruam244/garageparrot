<h4>Liste des employés</h4>

    <table style="display: inline-table; border: 1px solid black;">
        <thead>
            <tr >
                <th style="padding:5px;">Nom</th>
                <th style="padding:5px;">Prénom</th>
                <th style="padding:5px;">Email</th>
                <th style="padding:5px;">Mot de passe</th>
                <th style="padding:5px;">Rôle</th>
            </tr>
        </thead>
        <tbody>
        <?php  foreach ($user as $u) : ?>
            <tr>
                <td style="padding:5px;"><?= htmlspecialchars($u["lastname"])?></td>
                <td style="padding:5px;"><?= htmlspecialchars($u["firstname"])?></td>
                <td style="padding:5px;"><?= htmlspecialchars($u["email"])?></td>
                <td style="padding:5px;"><?= htmlspecialchars($u["password_hash"])?></td>
                <td style="padding:5px;"><?= htmlspecialchars($u["role"])?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

        