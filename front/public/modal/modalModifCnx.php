<div class="modal-header">
	<h5 class="modal-title" id="Modal<?= $connexion['central_id'] ?>Label">
		Modification de connexion</h5>
	<button type="button" class="btn-close" data-bs-dismiss="modal"
			aria-label="Close"></button>
</div>
<div class="modal-body">
	<form method="post" action="../../back/functions/modifier/modifier_cnx.php">
		<fieldset>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Nom de la connexion : </span>
				</div>
				<input class="form-control" type="text" name="cnx_nom" id="cnx_nom" value="<?= $connexion['cnx_nom'] ?>">
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Login : </span>
				</div>
				<input class="form-control" type="text" name="cnx_log" id="cnx_log" value="<?= $connexion['login'] ?>">
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Mot de passe : </span>
				</div>
				<input class="form-control" type="text" name="cnx_mdp" id="cnx_mdp" value="<?= $connexion['mdp'] ?>">
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Clé de produit : </span>
				</div>
				<input class="form-control" type="text" name="cnx_cle" id="cnx_cle" value="<?= $connexion['cle_produit'] ?>">
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Date de naissance produit : </span>
				</div>
				<input class="form-control" type="date"
					   value="<?= $connexion['date_nais_produit'] ?>"
					   name="cnx_date_produit"
					   id="cnx_date_produit">
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Téléphone de secours Icloud : </span>
				</div>
				<input class="form-control" type="text" name="cnx_tel_sec_icloud"
					   id="cnx_tel_sec_icloud" <?= $connexion['tel_sec_icloud'] ?>>
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Mail de secours Icloud : </span>
				</div>
				<input class="form-control" type="text" name="cnx_mail_sec_icloud"
					   id="cnx_mail_sec_icloud"
					   value="<?= $connexion['mail_sec_icloud'] ?>">
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Date de naissance Icloud : </span>
				</div>
				<input class="form-control" type="date"
					   value="<?= $connexion['date_nais_icloud'] ?>"
					   name="cnx_date_sec_icloud" id="cnx_date_sec_icloud">
			</div>

			<input type="hidden" name="cnxId" value="<?= $connexion['cnx_id'] ?>">
		</fieldset>

		<div class="form-group ">
			<input id="submit" type="submit" value="Modifier" id="ModifCnx"
				   class="btn">
		</div>
	</form>
</div>