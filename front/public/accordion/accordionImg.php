<h6>Date et heure : <?= date('d.m.Y H:i:s', $timestamp) ?></h6><br>
<?php if ($timestamp2 !== $timestamp) { ?>
	<h6>Date et heure de modification : <?= date('d.m.Y H:i:s', $timestamp2) ?></h6><br>
<?php } ?>
<a href="../../img/<?= $image['img_nom'] ?>"><img class="img-fluid" alt="Responsive image" src="../../img/min/<?= $image['img_nom'] ?>"></a>
<?php
	if ($_SESSION['role'] === "ADMIN") : ?>
		<!-- Button modal -->
		<button href="modal/modalModifImg"id="btn-modal" type="button" class="btn"
				data-bs-toggle="modal"
				data-bs-target="#Modal<?= $image['central_id'] ?>">
			Modifier
		</button>
	<?php endif; ?>
<div class="modal fade" id="Modal<?= $image['central_id'] ?>" tabindex="-1"
	 aria-labelledby="Modal<?= $image['central_id'] ?>Label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<?php require'modal/modalModifImg.php' ?>
		</div>
	</div>
</div>