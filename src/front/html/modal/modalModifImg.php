<div class="modal-header">
	<h5 class="modal-title" id="Modal<?= $image['central_id'] ?>Label">
		Modifier une image</h5>
	<button type="button" class="btn-close" data-bs-dismiss="modal"
			aria-label="Close"></button>
</div>
<div class="modal-body">
	<form method="POST" action="../../back/functions/modifier/modifier_img.php"
		  enctype="multipart/form-data">

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Titre</span>
			</div>
			<input class="form-control" type="text" id="title" name="title">
		</div>

		<input type="hidden" name="idImg" value="<?= $image['img_id'] ?>">

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Photo</span>
			</div>
			<input type="file" id="photo" name="photo" class="form-control"
				   aria-label="Photo">
		</div>
		<button id="submit" class="btn" type="submit">Envoyer</button>
	</form>
</div>