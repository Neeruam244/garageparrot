<div class="container mt-5">

<h5>Ajouter un nouveau témoignage client</h5>

    <form id="opinionForm" method="post" action="index.php?controller=opinion&action=add">

      <div class="mb-3">
        <label for="client_name" class="form-label">Nom du client</label>
        <input type="text" class="form-control" name="client_name" id="client_name" required>
      </div>

      <div class="mb-3">
        <label for="opinion" class="form-label">Son témoignage</label>
        <textarea class="form-control" name="opinion" id="opinion" rows="4" required></textarea>
      </div>

      <div class="mb-3">
        <label for="note" class="form-label">Note de 1 à 5</label>
        <input type="number" class="form-control" name="note" id="note" min="1" max="5" required>
      </div>

      <div class="mx-auto p-2">
        <button type="submit" class="btn btn-outline-success">Ajouter</button>
      </div>
        
    </form>

</div>

 