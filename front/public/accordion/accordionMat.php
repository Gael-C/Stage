<h4>Nom : <?= $materiel['mat_nom'] ?></h4><br>
Modèle : <?= $materiel['modele'] ?><br>
Infos : <?= $materiel['infos'] ?><br>
<?php if (!empty($materiel['ip'])): ?>
	Ip : <?= $materiel['ip'] ?><br>
<?php endif;
	if (!empty($materiel['iemc'])): ?>
		IEMC : <?= $materiel['iemc'] ?><br>
	<?php endif;
	if (!empty($materiel['s/n'])): ?>
		S/N : <?= $materiel['s/n'] ?><br>
	<?php endif;
	if (!empty($materiel['admin'])): ?>
		Admin : <?= $materiel['admin'] ?><br>
	<?php endif;
	if ($_SESSION['role'] === "ADMIN") : ?>
		<!-- Button modal -->
		<button href="modal/modalModifMat" id="btn-modal" type="button" class="btn" data-bs-toggle="modal"
				data-bs-target="#Modal<?= $materiel['central_id']?>">
			Modifier
		</button>
	<?php endif; ?>
<!-- Modal -->
<div class="modal fade" id="Modal<?= $materiel['central_id'] ?>" tabindex="-1"
	 aria-labelledby="Modal<?= $materiel['central_id'] ?>Label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<?php require 'modal/modalModifMat.php';?>
		</div>
	</div>
</div>