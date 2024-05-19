<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalLabel">Modifier le Véhicule</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="container">
          <div class="row">
            <!-- Formulaire de mise à jour des services -->
            <div class="col-md-10">
              <form id="updateForm" method="post" action="services/edit.php" enctype="multipart/form-data">
                <!-- Les champs du formulaire avec les attributs name pour le PHP -->
                <input type="hidden" name="id" id="editIdServices" value="<?= $services->getIdService()?>" placeholder="<?= $services->getIdService()?>">
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="title" class="form-label">Titre</label>
                    <input type="text" class="form-control" name="title" id="editTitle" placeholder="<?= $services->getTitle()?>" required>
                  </div>
                  <div class="col-md-6">
                    <label for="textpresentation" class="form-label">Rapide texte de présentation</label>
                    <textarea rows="5" cols="100" type="text" class="form-control" name="textpresenattion" id="editTextPresentation" placeholder="<?= $services->getTextPresentation()?>" required></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="list" class="form-label">Liste des réparartions effectuées</label>
                    <textarea rows="5" cols="100" type="text" class="form-control" name="list" id="editList" placeholder="<?= $services->getList()?>" required></textarea>
                  </div>
        
                <div class="mb-3">
                  <label for="picture" class="form-label">Image correspondante</label>
                  <input type="file" class="form-control" name="picture" id="picture" accept=".jpg, .jpeg, .png, .gif" maxlength="2000000">
                  <small class="form-text text-muted">Laissez vide pour conserver l'image actuelle.</small>
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
              </form>
            </div>

            <!-- Aperçu de l'image existante -->
            <div class="col-md-4 d-flex justify-content-center align-items-center">
              <div class="mb-3">
                <label for="imagePreview" class="form-label">Aperçu de l'image existante</label>
                <div>
                  <img src="<?= $services->getPicture()?>" name="pictures" id="imagePreview" class="img-thumbnail rounded" alt="Aperçu de l'image" height="200px" width="400px">
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>