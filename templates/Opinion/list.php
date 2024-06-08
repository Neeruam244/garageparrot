<form id="managementComments" action="" method="post" style="margin:50px;">
  <table style="display: inline-table; border: 1px solid black;">
    <thead>
      <tr>
        <th scope="col" style="padding:5px;">#</th>
        <th scope="col" style="padding:5px;">Nom</th>
        <th scope="col" style="padding:5px;">Avis</th>
        <th scope="col" style="padding:5px;">Note</th>
        <th scope="col" style="padding:5px;" class="text-center">Publier</th>
        <th class="text-center" style="padding:5px;">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($opinion as $o) : ?>
        <tr>
          <td style="padding:5px; text-align : center;"><?= htmlspecialchars($o['id_opinion']) ?></td>
          <td style="padding:5px; text-align : center;"><?= htmlspecialchars($o['client_name']) ?></td>
          <td style="padding:5px; text-align : center;"><?= htmlspecialchars($o['opinion']) ?></td>
          <td style="padding:5px; text-align : center;"><?= htmlspecialchars($o['note']) ?></td>
          <td style="padding:5px; text-align : center;">
          <div class="form-check form-switch">
          <input class="form-check-input switchButton " type="checkbox" id="switchButton_<?= htmlspecialchars($o['id_opinion']) ?>" <?= htmlspecialchars($o['publish']) == 1 ? 'checked' : '' ?> data-opinion-id="<?= htmlspecialchars($o['id_opinion']) ?>">
            </div>
          </td>
          <td class="text-center" style="padding:5px; text-align : center;">
            <a href="lib/delete_opinion.php?id=<?= htmlspecialchars($o['id_opinion']) ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet avis ?');">Supprimer</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <button type="submit" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#AdminOpinionModal">Créer un avis</button>

</form>

