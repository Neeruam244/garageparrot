<?php
  require_once _ROOTPATH_.'\templates\header.php'; 
?>    

<div class="container" style="margin-left:100px; margin-top:30px;">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 ms-5 border-bottom">

      <ul class="nav col-10 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/index.php?controller=user&action=admin" class="nav-link px-2 link-secondary">Accueil</a></li>
        <li><a href="#" class="nav-link px-2">Les services proposés</a></li>
        <li><a href="/index.php?controller=openinghours&action=edit" class="nav-link px-2">Gestions des jours et horaires d'ouvertures</a></li>
        <li><a href="#" class="nav-link px-2">Gestion des comptes employés</a></li>
      </ul>

      <div class="col-md-2 text-end">
        <form action="logout.php" method="post">
          <button type="submit" class="btn btn-outline-dark me-2">Se déconnecter</button>
        </form>
      </div>
    </header>
</div>

<section>
    <h2>Les services proposés</h2>

    <?php 
       require_once _ROOTPATH_.'\templates\Services\add.php';

    ?>
</section>

<section>
    <h2>Gestion des jours et horaires d'ouvertures</h2>

    <button class="btn btn-outline-dark p-3 m-4" type="submit" action="/index.php?controller=openinghours&action=edit" target="_blank">Modifier les horaires du garage</button>
    
</section>

<section>
    <h2>Gestion des comptes employés</h2>

    <?php 
       require_once _ROOTPATH_.'\templates\User\list.php';
    ?>

    <button class="btn btn-outline-dark p-3 m-4" action="/index.php?controller=user&action=add" type="submit">Ajouter un employé</button>
    <button class="btn btn-outline-dark p-3 m-4" action="/index.php?controller=user&action=edit" type="submit">Modifier un employé</button>

</section>

<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>