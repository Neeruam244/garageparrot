<?php  require_once _ROOTPATH_.'\templates\header.php'; ?>

<h2 class="title-servicess">Nos prestations</h2>

<section class="section-servicess">
<?php  foreach ($services as $s) : ?>

<div class="contain-services ">
    <img src="<?= htmlspecialchars($s["picture"])?>" class="photos-servicess">
    <h3 class="h2titles"><?= htmlspecialchars($s["title"])?></h3>

    <div class="para-servicess">
    <p><?= htmlspecialchars($s["text_presentation"])?></p>
    <p><?= htmlspecialchars($s["list"])?></p>
    </div>
</div>
<?php endforeach; ?>
</section>

<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>