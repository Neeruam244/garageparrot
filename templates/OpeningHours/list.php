<h1>Les horaires du garage</h1>

<?php  foreach ($openinghours as $o) : ?>

    
<?php endforeach; ?>

<form id="openingHoursForm" action="" method="post">
  <table>
    <thead>
      <tr>
        <th>Jour</th>
        <th>Heure d'ouverture</th>
        <th>Heure de fermeture</th>
      </tr>
    </thead>
    <tbody>
    <?php  foreach ($openinghours as $o) : ?>
        <tr>
            <td>
              <input type="text" name="day_of_week" value="<?= htmlspecialchars($o["day_of_week"])?>">
            </td>
            <td>
              <input type="text" name="opening_time" value="<?= htmlspecialchars($o["opening_time"])?>">
              <span class="error-message opening-time-error-message"></span>
            </td>
            <td>
              <input type="text" name="closing_time" value="<?= htmlspecialchars($o["closing_time"])?>">
              <span class="error-message closing-time-error-message"></span>
            </td>
        </tr>

    </tbody>
    <?php endforeach; ?>
  </table>
  <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
</form>
