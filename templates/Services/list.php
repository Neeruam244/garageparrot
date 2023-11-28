<?php  require_once _ROOTPATH_.'\templates\header.php'; ?>

<section>
<?php  foreach ($services as $s) : ?>

<div class="contain-service">
    <img src="<?= $s["picture"]?>" class="photos-services">
    <h3 class="h2title"><?= $s["title"]?></h3>

    <div class="para-services">
    <p><?= $s["text_presentation"]?></p>
    <p><?= $s["list"]?></p>
    </div>
</div>
<?php endforeach; ?>
</section>

<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>