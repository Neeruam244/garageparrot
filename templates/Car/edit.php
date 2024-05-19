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
            <!-- Formulaire de mise à jour du véhicule -->
            <div class="col-md-8">
              <form id="updateForm" method="post" action="car/edit.php" enctype="multipart/form-data">
                <!-- Les champs du formulaire avec les attributs name pour le PHP -->
                <input type="hidden" name="id" id="editCarId" value="<?= $car->getIdCar()?>" placeholder="<?= $car->getIdCar()?>">
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="brand" class="form-label">Marque</label>
                    <input type="text" class="form-control" name="brand" id="editCarBrand" placeholder="<?= $car->getBrand()?>" required>
                  </div>
                  <div class="col-md-6">
                    <label for="model" class="form-label">Modèle</label>
                    <input type="text" class="form-control" name="model" id="editCarModel" placeholder="<?= $car->getModel()?>" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="mileage" class="form-label">Kilométrage</label>
                    <input type="number" class="form-control" name="mileage" id="editCarMileage" placeholder="<?= $car->getMileage()?>" required>
                  </div>
                  <div class="col-md-6">
                    <label for="energy" class="form-label">Type de carburant</label>
                    <input type="text" class="form-control" name="energy" id="editCarEnergy" placeholder="<?= $car->getEnergy()?>" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="year" class="form-label">Année</label>
                    <input type="number" class="form-control" name="year" id="editCarYear" placeholder="<?= $car->getYear()?>" required>
                  </div>
                  <div class="col-md-6">
                    <label for="price" class="form-label">Prix</label>
                    <input type="number" class="form-control" name="price" id="editCarPrice" placeholder="<?= $car->getPrice()?>" required>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="picture" class="form-label">Image du véhicule</label>
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
                  <img src="<?= $car->getPicture()?>" name="pictures" id="imagePreview" class="img-thumbnail rounded" alt="Aperçu de l'image" height="200px" width="400px">
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>