<?php  require_once _ROOTPATH_.'\templates\header.php'; ?>

<h2 class="title-car mt-5">Nos voitures d'occasions</h2>

<!-- Les différents filtres -->
<div class="filter">
  <form action="" method ="GET" class="formfiltre w-100">

    <div class="row">
      <div class = "col w-25">
      <label for="price" class="title-filter">Prix :</label>
        <div id="price-slider" class="mb-3 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%; color: #21211f;"></div>
          <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default first-handle" style="left: 0%;"></span>
          <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default second-handle" style="left: 100%;"></span></div>
        <input type="hidden" id="minPrice" name="minPrice" value="0">
        <input type="hidden" id="maxPrice" name="maxPrice" value="500000">
        <div id="price-values">0 €  - 500000 € </div>
      </div>

      <div class="col w-25">
        <label for="price" class="title-filter">Kilométrage :</label>
        <div id="mileage-slider" class="mb-3 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%; color: #21211f;"></div>
          <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default first-handle" style="left: 0%;"></span>
          <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default second-handle" style="left: 100%;"></span></div>
        <input type="hidden" id="minMileage" name="minMileage" value="">
        <input type="hidden" id="maxMileage" name="maxMileage" value="">
        <div id="mileage-values">0 km  - 500000 km </div>
      </div> 

      <div class="col w-25">
        <select name="year" id="year-select" class="form-select mb-4">
          <option value="" selected="">Année</option>
          <option value="Indifférent">Indifférent</option>
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
        <img src="<?= $c["picture"]?>" class="img-card">
    </div>
    <div class="product-info">
      <div class="product-text">
        <h1 class="title-card"><?= $c["brand"]?> <?= $c["model"]?></h1>
        <h2 class=subtitle-card><?= $c["description"]?></h2>
        <p class=para-card>Année : <?= $c["year"]?>  <br> Kilométrage : <?= $c["mileage"]?> km <br> Energie : <?= $c["energy"]?> </p>
        <p class="price"><strong><?= $c["price"]?> €</strong></p>
        <form action="index.php?controller=car&action=show&id=<?= $c["id_car"]?>" method="get" target="_blanck"><button type="submit" class="btn1 outline" >Details</button></form> 
      </div>
    </div>
</div>
<?php endforeach; ?>
</section> 

<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>