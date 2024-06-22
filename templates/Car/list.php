<?php  require_once _ROOTPATH_.'\templates\header.php'; ?>

<h2 class="title-car mt-5">Nos voitures d'occasions</h2>

<!-- Les différents filtres -->
<div class="filter">
  <form action="" method ="GET" class="formfiltre w-100">
    <div class="row">
      <div class="col w-25">
        <label for="mileage-select">Kilométrage</label>
        <select name="mileage" id="mileage-select" class="form-select mb-4">
          <option value="" selected disabled hidden>Sélectionner un kilométrage</option>
          <option value="Tous">Tous</option>
          <option value="2012">0 à 50 000km</option>
          <option value="2017">50 000km à 100 000km</option>
          <option value="2018">100 000km à 200 000km</option>
          <option value="2019">Plus de 200 000km</option>
        </select>
      </div> 

      <div class="col w-25">
      <label for="price-select">Prix</label>
      <select name="price" id="price-select" class="form-select mb-4">
      <option value="" selected disabled hidden>Sélectionner un prix</option>
          <option value="Tous">Tous</option>
          <option value="2012">5000€ à 10 000€</option>
          <option value="2017">10 000€ à 20 000€</option>
          <option value="2018">20 000€ à 30 000€</option>
          <option value="2019">30 000€ à 40 000€</option>
        </select>
      </div> 

      <div class="col w-25">
      <label for="year-select">Année</label>
        <select name="year" id="year-select" class="form-select mb-4">
        <option value="" selected disabled hidden>Sélectionner une année</option>
          <option value="Tous">Tous</option>
          <option value="2012">2012</option>
          <option value="2017">2017</option>
          <option value="2018">2018</option>
          <option value="2019">2019</option>
          <option value="2020">2020</option>
        </select>
      </div>
    </div>

    <div class="btnfiltre">
      <button type="submit" class="btn btn-dark m-2" name="reset" value="true">Réinitialiser</button>
      <button type="submit" class="btn btn-primary m-2">Valider</button>
    </div>
  </form>
</div>

<!-- La card des voitures d'occasion -->

<section class="container">
<?php  foreach ($car as $c) : ?>
<div class="wrapper">
    <div class="product-img">
        <img src="<?= htmlspecialchars($c["picture"])?>" class="img-card" alt="Image de la voiture">
    </div>
    <div class="product-info">
      <div class="product-text">
        <h1 class="title-card"><?= htmlspecialchars($c["brand"])?> <?= $c["model"]?></h1>
        <h2 class="subtitle-card"><?= htmlspecialchars($c["description"])?></h2>
        <p class="para-card">Année : <?= htmlspecialchars($c["year"])?>  <br> Kilométrage : <?= htmlspecialchars($c["mileage"])?> km <br> Energie : <?= htmlspecialchars($c["energy"])?> </p>
        <p class="price"><strong><?= htmlspecialchars($c["price"])?> €</strong></p>
        <form action="index.php?controller=car&action=show&id=<?= urlencode($c["id_car"])?>" method="GET" target="_blank"><button type="submit" class="btn1 outline" >Details</button></form> 
      </div>
    </div>
</div>
<?php endforeach; ?>
</section> 

<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>