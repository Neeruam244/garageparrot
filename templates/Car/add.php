<div class="modal fade" id="createVehicleModal" tabindex="-1" aria-labelledby="createVehicleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="createVehicleModalLabel">Créer un nouveau véhicule</h4>
      </div>

      <div class="modal-body">
        <form action="car/add.php" method="post" enctype="multipart/form-data">
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="marque" class="form-label">Marque</label>
              <input type="text" class="form-control" id="marque" name="marque" required>
            </div>
            <div class="col-md-6">
              <label for="modele" class="form-label">Modèle</label>
              <input type="text" class="form-control" id="modele" name="modele" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="kilometrage" class="form-label">Kilométrage</label>
              <input type="number" class="form-control" id="kilometrage" name="kilometrage" required>
            </div>
            <div class="col-md-6">
              <label for="energie" class="form-label">Energie</label>
              <input type="text" class="form-control" id="energie" name="energie" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="annee" class="form-label">Année de mise en circulation</label>
              <input type="number" class="form-control" id="annee" name="annee" required>
            </div>
            <div class="col-md-6">
              <label for="prix" class="form-label">Prix</label>
              <input type="number" class="form-control" id="prix" name="prix" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-12">
              <label for="image" class="form-label">Image du véhicule</label>
              <input type="file" class="form-control" id="image" name="image" accept="image/*" required accept=".jpg, .jpeg, .png, .gif" maxlength="2000000">
            </div>
          </div>

          <button type="submit" class="btn btn-primary">Valider</button>

          <?php if (isset($errorMessage)) : ?>
            <div class="alert alert-danger mt-3" role="alert">
              <?= $errorMessage; ?>
            </div>
          <?php endif; ?>

        </form>
      </div>
    </div>
  </div>
</div>