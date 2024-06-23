<?php require_once _ROOTPATH_.'\templates\header.php'; ?>

  <div class="container" style="margin-left:100px; margin-top:30px;">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 ms-5 border-bottom">

      <ul class="nav col-10 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/index.php?controller=user&action=admin" class="nav-link px-2 link-secondary">Accueil</a></li>
        <li><a href="#voitures" class="nav-link px-2">Les véhicules d'occasions</a></li>
        <li><a href="#opinion" class="nav-link px-2">Les témoignages clients</a></li>
      </ul>

      <div class="col-md-2 text-end">
        <form action="logout.php" method="post">
          <button type="submit" class="btn btn-outline-dark me-2">Se déconnecter</button>
        </form>
      </div>
    </header>
  </div>

  <section id="voitures">
    <h2 style="margin-left:100px;">Les véhicules d'occasions</h2>

      <?php require_once _ROOTPATH_.'\templates\Car\add.php'; ?>

  </section>

  <section id="opinion">
    <h2 style="margin-left:100px;">Les témoignages clients</h2>

      <?php require_once _ROOTPATH_.'\templates\Opinion\add.php'; ?>
  </section>

<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>