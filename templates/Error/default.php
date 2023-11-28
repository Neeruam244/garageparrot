<?php  require_once _ROOTPATH_.'\templates\header.php'; ?>

<?php if($error) { ?>
<div class="alert alert-danger m-5">
    <?=$error?>
</div>
<?php } ?>

<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>