<div class="modal-header">
	<h5 class="modal-title" id="ModalImgLabel">
		Ajouter une image</h5>
	<button type="button" class="btn-close" data-bs-dismiss="modal"
			aria-label="Close"></button>
</div>
<div class="modal-body">
	<form method="POST" action="../../back/functions/ajout/ajouter_img.php"
		  enctype="multipart/form-data">

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Titre</span>
			</div>
			<input class="form-control" type="text" id="title" name="title">
		</div>

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Photo</span>
			</div>
			<input type="file" id="photo" name="photo" class="form-control"
				   aria-label="Photo">
		</div>
		<input type="hidden" name="idClient" value="<?= $idClient ?>">

		<button id="submit" class="btn"type="submit">Envoyer</button>
	</form>
</div>