<div class="container mt-5">

    <h5>Ajouter un nouveau service</h5>

    <form method="post" action="index.php?controller=services&action=add">

      <div class="mb-3">
        <label for="title" class="form-label">Titre :</label>
        <input type="text" name="title" required class="form-control">
      </div>

      <div class="mb-3">
        <label for="text_presentation" class="form-label">Rapide texte de présentation :</label>
        <textarea lass="form-control" name="text_presentation" rows="2" cols="110"  required></textarea>
      </div>

      <div class="mb-3">
        <label for="list" class="form-label">Liste des réparations effectués :</label>
        <textarea lass="form-control" name="list" rows="2" cols="110"  required></textarea>
      </div>

      <div class="mb-3">
        <label for="picture" class="form-label">Photo :</label>
        <input type="file" id="monFichier" name="picture" accept="image/png, image/jpeg">
      </div>

      <div class="mx-auto p-2">
        <button type="submit" class="btn btn-outline-success">Ajouter</button>
      </div>

    </form>

</div>
