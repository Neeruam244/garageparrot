<div class="container mt-5">

<h5>Liste des horaires d'ouverture</h5>
    
    <?php if (isset($openingHours) && !empty($openingHours)): ?>
        <form method="post" action="/index.php?controller=openinghours&action=updateAll">
            <table>
                <thead>
                    <tr>
                        <th>Jour</th>
                        <th>Heure d'ouverture</th>
                        <th>Heure de fermeture</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($openingHours as $hour): ?>
                        <tr>
                            <td>
                                <input type="hidden" name="id_opeinghours" value="<?= $hour->getIdOpeninghours() ?>">
                                <input type="text" name="day_of_week" value="<?= $hour->getDayOfWeek() ?>">
                            </td>
                            <td>
                                <input type="time" name="opening_time" value="<?= $hour->getOpeningTime() ?>">
                            </td>
                            <td>
                                <input type="time" name="closing_time" value="<?= $hour->getClosingTime() ?>">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="submit">Mettre à jour les horaires</button>
        </form>
    <?php else: ?>
        <p>Aucun horaire d'ouverture trouvé.</p>
    <?php endif; ?>

</div>
