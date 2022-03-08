<h4>Nom : <?= $connexion['cnx_nom'] ?></h4><br>
Login : <?= $connexion['login'] ?><br>
Password : <?= $connexion['mdp'] ?><br>
<?php if (!empty($connexion['cle_produit'])): ?>
	Clé de produit :<?= $connexion['cle_produit'] ?><br>
<?php endif;
	if (!empty($connexion['date_nais_produit']) && ($connexion['date_nais_produit'])==$connexion['mail_sec_icloud']): ?>
		Date de naissance produit : <?= date('d.m.Y', $timestampP) ?><br>
	<?php endif;
	if (!empty($connexion['mail_sec_icloud'])): ?>
		Mail de secours Icloud : <?= $connexion['mail_sec_icloud'] ?><br>
	<?php endif;
	if (!empty($connexion['date_nais_icloud'])&& ($connexion['date_nais_produit'])==$connexion['mail_sec_icloud']): ?>
		Date de naissance Icloud : <?= date('d.m.Y', $timestampIc) ?><br>
	<?php endif; ?>
<?php if ($_SESSION['role'] === "ADMIN") : ?>
	<!-- Button modal -->
	<button id="btn-modal" type="button" class="btn" href="modal/modalModifCnx.php"
			data-bs-toggle="modal"
			data-bs-target="#Modal<?= $connexion['central_id'] ?>">
		Modifier
	</button>
<?php endif; ?>

<!-- Modal -->
<div class="modal fade" id="Modal<?= $connexion['central_id'] ?>" tabindex="-1"
	 aria-labelledby="Modal<?= $connexion['central_id'] ?>Label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<?php require ('modal/modalModifCnx.php')?>
		</div>
	</div>
</div>