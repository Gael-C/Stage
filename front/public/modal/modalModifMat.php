<div class="modal-header">
	<h5 class="modal-title" id="Modal<?= $materiel['central_id'] ?>Label">
		Modification du matériel</h5>
	<button type="button" class="btn-close" data-bs-dismiss="modal"
			aria-label="Close"></button>
</div>
<div class="modal-body">
	<form method="post" action="../../back/functions/modifier/modifier_mat.php">
		<fieldset>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Nom du matériel : </span>
				</div>
				<input class="form-control" type="text" name="mat_nom" id="mat_nom" value="<?= $materiel['mat_nom'] ?>">
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Modèle : </span>
				</div>
				<input class="form-control" type="text" name="modele" id="modele" value="<?= $materiel['modele'] ?>">
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Infos : </span>
				</div>
				<input class="form-control" type="text" name="infos" id="infos" value="<?= $materiel['infos'] ?>">
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">IP : </span>
				</div>
				<input class="form-control" type="text" name="ip" id="ip" value="<?= $materiel['ip'] ?>">
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">IEMC : </span>
				</div>
				<input class="form-control" type="text" name="iemc" id="iemc" value="<?= $materiel['iemc'] ?>">
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">S/N : </span>
				</div>
				<input class="form-control" type="text" name="s/n" id="s/n" value="<?= $materiel['s/n'] ?>">
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Admin : </span>
				</div>
				<input class="form-control" type="text" name="admin" id="admin" value="<?= $materiel['admin'] ?>">
			</div>

			<input type="hidden" name="matId" value="<?= $materiel['mat_id'] ?>">

		</fieldset>

		<div class="form-group ">
			<input id="submit" type="submit" value="Modifier" id="modifMat"
				   class="btn">
		</div>
	</form>
</div>