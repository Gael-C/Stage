<?php

	if (!empty($_SESSION['successClient'])){
		echo '<div class="alert alert-success" role="alert">
                        ' . $_SESSION['successClient'] . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style=""></button>
                      </div>';
		$_SESSION['successClient'] = "";
	}else{
		if (!empty($_SESSION['failClient'])){
			echo '<div class="alert alert-danger" role="alert">
                        ' . $_SESSION['failClient'] . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style=""></button>
                      </div>';
			$_SESSION['failClient'] = "";

		}
	}

	if (!empty($_SESSION['successAjoutCnx'])){
		echo '<div class="alert alert-success" role="alert">
                        ' . $_SESSION['successAjoutCnx'] . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style=""></button>
                      </div>';
		$_SESSION['successAjoutCnx'] = "";
	}else{
		if (!empty($_SESSION['failAjoutCnx'])){
			echo '<div class="alert alert-danger" role="alert">
                        ' . $_SESSION['failAjoutCnx'] . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style=""></button>
                      </div>';
			$_SESSION['failAjoutCnx'] = "";
		}
	}

	if (!empty($_SESSION['successAjoutMat'])){
		echo '<div class="alert alert-success" role="alert">
                        ' . $_SESSION['successAjoutMat'] . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style=""></button>
                      </div>';
		$_SESSION['successAjoutMat'] = "";
	}else{
		if (!empty($_SESSION['failAjoutMat'])){
			echo '<div class="alert alert-danger" role="alert">
                        ' . $_SESSION['failAjoutMat'] . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style=""></button>
                      </div>';
			$_SESSION['failAjoutMat'] = "";
		}
	}
	if (!empty($_SESSION['successAjoutImg'])) {
		echo '<div class="alert alert-success" role="alert">
                        ' . $_SESSION['successAjoutImg'] . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style=""></button>
                      </div>';
		$_SESSION['successAjoutImg'] = "";
	} else {
		if (!empty($_SESSION['failImg1'])) {

			echo '<div class="alert alert-danger" role="alert">
                        ' . $_SESSION['failImg1'] . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style=""></button>
                      </div>';
			$_SESSION['failImg1'] = "";
		} else {
			if (!empty($_SESSION['failImg2'])) {
				echo '<div class="alert alert-danger" role="alert">
                        ' . $_SESSION['failImg2'] . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style=""></button>
                      </div>';
				$_SESSION['failImg2'] = "";
			} else {
				if (!empty($_SESSION['failImg3'])) {
					echo '<div class="alert alert-danger" role="alert">
                        ' . $_SESSION['failImg3'] . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style=""></button>
                      </div>';
					$_SESSION['failImg3'] = "";
				} else {
					if (!empty($_SESSION['emptyPost'])) {
						echo '<div class="alert alert-danger" role="alert">
                        ' . $_SESSION['emptyPost'] . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style=""></button>
                      </div>';
						$_SESSION['emptyPost'] = "";
					}
				}
			}
		}
	}

	if (!empty($_SESSION['successModifClient'])){
		echo '<div class="alert alert-success" role="alert">
                        ' . $_SESSION['successModifClient'] . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style=""></button>
                      </div>';
		$_SESSION['successModifClient'] = "";
	}else{
		if (!empty($_SESSION['failModifClient'])){
			echo '<div class="alert alert-danger" role="alert">
                        ' . $_SESSION['failModifClient'] . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style=""></button>
                      </div>';
			$_SESSION['failModifClient'] = "";
		}
	}

	if (!empty($_SESSION['successModifCnx'])){
		echo '<div class="alert alert-success" role="alert">
                        ' . $_SESSION['successModifCnx'] . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style=""></button>
                      </div>';
		$_SESSION['successModifCnx'] = "";
	}else{
		if (!empty($_SESSION['failModifCnx'])){
			echo '<div class="alert alert-danger" role="alert">
                        ' . $_SESSION['failModifCnx'] . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style=""></button>
                      </div>';
			$_SESSION['failModifCnx'] = "";
		}
	}

	if (!empty($_SESSION['successModifMat'])){
		echo '<div class="alert alert-success" role="alert">
                        ' . $_SESSION['successModifMat'] . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style=""></button>
                      </div>';
		$_SESSION['successModifMat'] = "";
	}else{
		if (!empty($_SESSION['failModifMat'])){
			echo '<div class="alert alert-danger" role="alert">
                        ' . $_SESSION['failModifMat'] . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style=""></button>
                      </div>';
			$_SESSION['failModifMat'] = "";
		}
	}

	if (!empty($_SESSION['successModifImg'])) {
		echo '<div class="alert alert-success" role="alert">
                        ' . $_SESSION['successModifImg'] . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style=""></button>
                      </div>';
		$_SESSION['erreur'] = "";
	} else {
		if (!empty($_SESSION['failImg1'])) {

			echo '<div class="alert alert-danger" role="alert">
                        ' . $_SESSION['failImg1'] . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style=""></button>
                      </div>';
			$_SESSION['failClient'] = "";

		} else {
			if (!empty($_SESSION['failImg2'])) {
				echo '<div class="alert alert-danger" role="alert">
                        ' . $_SESSION['failImg2'] . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style=""></button>
                      </div>';
				$_SESSION['failClient'] = "";
			} else {
				if (!empty($_SESSION['failImg3'])) {
					echo '<div class="alert alert-danger" role="alert">
                        ' . $_SESSION['failImg3'] . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style=""></button>
                      </div>';
					$_SESSION['failClient'] = "";
				} else {
					if (!empty($_SESSION['emptyPost'])) {
						echo '<div class="alert alert-danger" role="alert">
                        ' . $_SESSION['emptyPost'] . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style=""></button>
                      </div>';
						$_SESSION['failClient'] = "";
					}
				}
			}
		}
	}

