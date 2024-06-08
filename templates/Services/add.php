<div class="container mt-5">

    <h4 class="mb-5">Ajouter un nouveau service</h4>

    <form method="post" action="services/add.php">

      <div class="mb-3">
        <label for="title" class="form-label">Titre :</label>
        <input type="text" name="title" required class="form-control">
      </div>

      <div class="mb-3">
        <label for="text_presentation" class="form-label">Rapide texte de présentation :</label>
        <input type="text" name="text_presentation" required class="form-control">
      </div>

      <div class="mb-3">
        <label for="list" class="form-label">Liste des réparations effectués :</label>
        <input type="text" name="list" required class="form-control">
      </div>

      <div class="mb-3">
        <label for="picture" class="form-label">Photo :</label>
        <input type="file" id="monFichier" name="picture" accept="image/png, image/jpeg">
      </div>

      <div class="mx-auto p-2" style="width: 200px;">
        <button type="submit" class="btn btn-outline-success p-3 m-4">Ajouter</button>
      </div>

    </form>

</div>
