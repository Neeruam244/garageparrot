<h5>Mettre à jour le service</h5>

    <form action="/index.php?controller=services&action=update" method="post">
        <input type="hidden" name="id_service" value="<?= $services->getIdService()?>">

        <label for="title">Titre:</label>
        <input type="text" id="title" name="title" value="<?= $services->getTitle()?>"><br><br>  

        <label for="text_presentation">Texte de présentation:</label>
        <textarea type="text" id="text_presentation" name="text_presentation" rows="5" cols="60"><?= $services->getTextPresentation()?></textarea><br><br>

        <label for="list">Liste des services:</label>
        <textarea type="text" id="list" name="list" rows="5" cols="50"><?= $services->getList()?></textarea><br><br>

        <label for="picture">Photo correspondante:</label>
        <input type="file" accept="image/*" accept=".jpg, .jpeg, .png, .gif" maxlength="2000000" id="picture" name="picture"><br><br>
        
        <input type="submit" value="Mettre à jour">
    </form>