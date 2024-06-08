<div class="modal fade" id="createVehicleModal" tabindex="-1" aria-labelledby="createVehicleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="createVehicleModalLabel">Créer un nouveau véhicule</h4>
      </div>

      <div class="modal-body">
        <form action="/index.php?controller=car&action=add" method="POST" enctype="multipart/form-data">
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="brand" class="form-label">Marque</label>
              <input type="text" class="form-control" id="brand" name="brand" required>
            </div>
            <div class="col-md-6">
              <label for="model" class="form-label">Modèle</label>
              <input type="text" class="form-control" id="model" name="model" required>
            </div>
            <div class="col-md-6">
              <label for="modele" class="form-label">Description</label>
              <textarea class="form-control" id="description" name="description" rows="2" cols="50"  required></textarea>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="created_at" class="form-label">Année de mise en circulation</label>
              <input type="number" class="form-control" id="created_at" name="created_at" required>
            </div>
            <div class="col-md-6">
              <label for="mileage" class="form-label">Kilométrage</label>
              <input type="number" class="form-control" id="mileage" name="mileage" required>
            </div>
            <div class="col-md-6">
              <label for="energy" class="form-label">Energie</label>
              <input type="text" class="form-control" id="energy" name="energy" required>
            </div>
            <div class="col-md-6">
              <label for="price" class="form-label">Prix</label>
              <input type="number" class="form-control" id="price" name="price" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="transmission" class="form-label">Boite de vitesse</label>
              <input type="text" class="form-control" id="transmission" name="transmission" required>
            </div>
            <div class="col-md-6">
              <label for="color" class="form-label">Couleur</label>
              <input type="text" class="form-control" id="color" name="color" required>
            </div>
            <div class="col-md-6">
              <label for="door_number" class="form-label">Nombres de portes</label>
              <input type="number" class="form-control" id="door_number" name="door_number" required>
            </div>
            <div class="col-md-6">
              <label for="fiscal_power" class="form-label">Puissance fiscal</label>
              <input type="number" class="form-control" id="fiscal_power" name="fiscal_power" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="interior_equipments" class="form-label">Equipement intérieur</label>
              <textarea type="text" class="form-control" id="interior_equipments" name="interior_equipments" required rows="2" cols="50"></textarea>
            </div>
            <div class="col-md-6">
              <label for="exterior_equipments" class="form-label">Equipement exterieur</label>
              <textarea type="text" class="form-control" id="exterior_equipments" name="exterior_equipments" required rows="2" cols="50"></textarea>
            </div>
            <div class="col-md-6">
              <label for="security_equipments" class="form-label">Equipement de sécurité</label>
              <textarea type="text" class="form-control" id="security_equipments" name="security_equipments" required rows="2" cols="50"></textarea>
            </div>
            <div class="col-md-6">
              <label for="others_equipments" class="form-label">Autres équipement</label>
              <textarea type="text" class="form-control" id="others_equipments" name="others_equipments" required rows="2" cols="50"></textarea>
            </div>

          <div class="row mb-3">
            <div class="col-12">
              <label for="picture" class="form-label">Image du véhicule</label>
              <input type="file" class="form-control" id="picture" name="picture" accept="image/*" required accept=".jpg, .jpeg, .png, .gif" maxlength="2000000">
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