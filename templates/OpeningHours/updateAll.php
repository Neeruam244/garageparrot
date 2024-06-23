<h5>Modifier les horaires du garage</h5>

<form action="/index.php?controller=openinghours&action=updateAll" method="post">
  <table>
    <thead>
      <tr>
        <th>Jour</th>
        <th>Heure d'ouverture</th>
        <th>Heure de fermeture</th>
      </tr>
    </thead>
    <tbody>
    <?php  foreach ($openinghours as $hour) : ?>
        <tr>
            <td>
              <input type="hidden" name="openinghours[<?= $hour->getIdOpeninghours() ?>][id_openinhours]" value="<?= $hour->getIdOpeninghours() ?>">
              <input type="text" name="openinghours[<?= $hour->getIdOpeninghours() ?>][day_of_week]" value="<?= $hour->getDayOfWeek() ?>">
            </td>
            <td>
              <input type="time" name="openinghours[<?= $hour->getIdOpeninghours() ?>][opening_time]" value="<?= $hour->getOpeningTime() ?>">
            </td>
            <td>
              <input type="time" name="openinghours[<?= $hour->getIdOpeninghours() ?>][closing_time]" value="<?= $hour->getClosingTime() ?>">
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  <button type="submit">Mettre à jour</button>
</form>