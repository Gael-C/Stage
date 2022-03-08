<div class="modal-header">
	<h5 class="modal-title" id="Modal<?= $client['client_id'] ?>Label">Modification du client</h5>
	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
	<form method="post" action="../../back/functions/modifier/modifier.php">

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Nom : </span>
			</div>
			<input class="form-control" type="text" id="nom" name="nom" value="<?= $client['client_nom'] ?>">
		</div>

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Adresse : </span>
			</div>
			<input class="form-control" type="text" name="adresse" id="adresse" value="<?= $client['client_adresse'] ?>">
		</div>

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Téléphone : </span>
			</div>
			<input class="form-control" type="text" name="telephone" id="telephone" value="<?= $client['client_telephone'] ?>">
		</div>

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Mail : </span>
			</div>
			<input class="form-control" type="email" name="mail" id="mail" value="<?= $client['client_mail'] ?>">
		</div>

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Nom de l'Entreprise  : </span>
			</div>
			<input class="form-control" type="text" name="ent_nom" id="ent_nom" value="<?= $client['ent_nom'] ?>">
		</div>

		<div class="input-group mb-3">
			<div class="input-group-prepend ">
				<span class="input-group-text">Adresse  : </span>
			</div>
			<input class="form-control" type="text" name="ent_adresse" id="ent_adresse" value="<?= $client['ent_adresse'] ?>">
		</div>

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Téléphone  : </span>
			</div>
			<input class="form-control" type="text" name="ent_tel" id="ent_tel" value="<?= $client['ent_tel'] ?>">
		</div>

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Mail  : </span>
			</div>
			<input class="form-control" type="email" name="ent_mail" id="ent_mail" value="<?= $client['ent_mail'] ?>">
		</div>

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Siret  : </span>
			</div>
			<input class="form-control" type="text" name="siret" id="siret" value="<?= $client['siret'] ?>">
		</div>

		<input type="hidden" name="id" value="<?= $client['client_id'] ?>">

		<div class="form-group ">
			<input id="submit" type="submit" value="Modifier" class="btn">
		</div>
	</form>
</div>