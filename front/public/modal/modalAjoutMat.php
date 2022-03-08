<div class="modal-header">
	<h5 class="modal-title" id="ModalMatLabel">
		Ajout du matériel</h5>
	<button type="button" class="btn-close" data-bs-dismiss="modal"
			aria-label="Close"></button>
</div>
<div class="modal-body">
	<form method="POST" action='../../back/functions/ajout/ajouter_mat.php'>
		<fieldset>
			<legend>Informations du matériel</legend>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Nom du matériel : </span>
				</div>
				<input class="form-control" type="text" name="mat_nom" id="mat_nom">
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Modèle : </span>
				</div>
				<input class="form-control" type="text" name="modele" id="modele">
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Infos : </span>
				</div>
				<input class="form-control" type="text" name="infos" id="infos">
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">IP : </span>
				</div>
				<input class="form-control" type="text" name="ip" id="ip">
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">IEMC : </span>
				</div>
				<input class="form-control" type="text" name="iemc" id="iemc">
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">S/N : </span>
				</div>
				<input class="form-control" type="text" name="s/n" id="s/n">
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Admin : </span>
				</div>
				<input class="form-control" type="text" name="admin" id="admin">
			</div>

			<input type="hidden" name="idClient" value="<?= $idClient ?>">


		</fieldset>
		<div class="form-group ">
			<input id="submit" type="submit" value="Valider" id="ajoutMat"
				   class="btn">
		</div>
	</form>
</div>