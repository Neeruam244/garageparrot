<h5 class="modal-title">Ajouter une nouvelle opinion de client</h5>
<div class="modal-body m-5">

    <form id="opinionForm" method="post" action="index.php?controller=opinion&action=add">

        <div class="mb-2">
          <label for="client_name" class="form-label">Prénom du client</label>
          <input type="text" class="form-control" name="client_name" id="client_name" required>
        </div>

        <div class="mb-2">
          <label for="opinion" class="form-label">Son avis sur le garage</label>
          <textarea class="form-control" name="opinion" id="opinion" rows="4" required></textarea>
        </div>

        <div class="mb-2">
          <label for="note" class="form-label">Note de 1 à 5</label>
          <input type="number" class="form-control" name="note" id="note" min="1" max="5" required>
        </div>

        <button type="submit" class="btn btn-dark">Ajouter</button>
      </form>
</div>

 