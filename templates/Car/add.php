<div class="container mt-5">
  <h5>Ajouter un nouveau véhicule</h5>

  <form action="index.php?controller=car&action=add" method="POST" enctype="multipart/form-data">
    <div class="mb-3"> 
      <label for="brand">Marque</label>
      <input type="text" id="brand" name="brand" required><br>
    </div>

    <div class="mb-3">
      <label for="model">Modèle</label>
      <input type="text" id="model" name="model" required><br>
    </div>

    <div class="mb-3">
      <label for="modele" >Description</label>
      <textarea id="description" name="description" rows="2" cols="50"  required></textarea><br>
    </div>

    <div class="mb-3">
      <label for="created_at">Date de la mise en circulation</label>
      <input type="date" id="created_at" name="created_at" required><br>
    </div>

    <div class="mb-3">
      <label for="year">Année de la mise en circulation</label>
      <input type="number" id="year" name="year" required><br>
    </div>

    <div class="mb-3">
      <label for="mileage">Kilométrage</label>
      <input type="number" id="mileage" name="mileage" required><br>
    </div>

    <div class="mb-3">
      <label for="energy">Energie</label>
      <select name="energy" id="energy" required>
        <option value="diesel">Diesel</option>
        <option value="essence">Essence</option>
        <option value="électrique">Electrique</option>
      </select><br>
    </div>

    <div class="mb-3">
      <label for="price">Prix</label>
      <input type="number" id="price" name="price" required><br>
    </div>

    <div class="mb-3">
      <label for="transmission">Boite de vitesse</label>
      <select name="transmission" id="transmission" required>
        <option value="manuelle">Manuelle</option>
        <option value="automatique">Automatique</option>
      </select><br>
    </div>

    <div class="mb-3">
      <label for="color">Couleur</label>
      <input type="text" id="color" name="color" required><br>
    </div>

    <div class="mb-3">
      <label for="door_number">Nombres de portes</label>
      <input type="number" id="door_number" name="door_number" required><br>
    </div>

    <div class="mb-3">
      <label for="fiscal_power">Puissance fiscal</label>
      <input type="number" id="fiscal_power" name="fiscal_power" required><br>
    </div>

    <div class="mb-3">
      <label for="interior_equipments">Equipement intérieur</label>
      <textarea type="text" id="interior_equipments" name="interior_equipments" required rows="2" cols="50"></textarea><br>
    </div>

    <div class="mb-3">
      <label for="exterior_equipments">Equipement exterieur</label>
      <textarea type="text" id="exterior_equipments" name="exterior_equipments" required rows="2" cols="50"></textarea><br>
    </div>

    <div class="mb-3">
      <label for="security_equipments">Equipement de sécurité</label>
      <textarea type="text" id="security_equipments" name="security_equipments" required rows="2" cols="50"></textarea><br>
    </div>

    <div class="mb-3">
      <label for="others_equipments">Autres équipement</label>
      <textarea type="text" id="others_equipments" name="others_equipments" required rows="2" cols="50"></textarea><br>
    </div>

    <div class="mb-3">
      <label for="picture">Images du véhicule</label>
      <input type="file" id="picture" name="picture" accept="image/*" accept=".jpg, .jpeg, .png, .gif" maxlength="2000000"><br>
    </div>

    <div class="mb-3">
      <label for="picture1">Autres images</label>
      <input type="file" id="picture1[]" multiple name="picture1" accept="image/*" accept=".jpg, .jpeg, .png, .gif" maxlength="2000000"><br>
    </div>

    <div class="mb-auto p-2">
    <button type="submit" value="Envoyer" class="btn btn-outline-success">Valider</button>
    </div>
  </form>
</div>