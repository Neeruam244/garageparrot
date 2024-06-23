<?php  require_once _ROOTPATH_.'\templates\header.php'; ?>

    <div>
        <h2><?= $services->getTitle()?></h2>
        <p><?= $services->getTextPresentation()?></p><br>
        <p><?= $services->getList()?></p>
        <img <?= $services->getPicture()?>>
    </div>

<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>