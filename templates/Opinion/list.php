<h5>Liste des témoignages clients</h5>

<form id="managementComments" action="" method="post" style="margin:50px;">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Avis</th>
        <th scope="col">Note</th>
        <th scope="col" class="text-center">Publier</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($opinion as $o) : ?>
        <tr>
          <td><?= htmlspecialchars($o['id_opinion']) ?></td>
          <td><?= htmlspecialchars($o['client_name']) ?></td>
          <td><?= htmlspecialchars($o['opinion']) ?></td>
          <td><?= htmlspecialchars($o['note']) ?></td>
          <td>
          <div class="form-check form-switch">
          <input class="form-check-input switchButton " type="checkbox" id="switchButton_<?= htmlspecialchars($o['id_opinion']) ?>" <?= htmlspecialchars($o['publish']) == 1 ? 'checked' : '' ?> data-opinion-id="<?= htmlspecialchars($o['id_opinion']) ?>">
            </div>
          </td>
          <td class="text-center">
            <a href="lib/delete_opinion.php?id=<?= htmlspecialchars($o['id_opinion']) ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet avis ?');">Supprimer</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AdminOpinionModal">Créer un avis</button>

</form>

