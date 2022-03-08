<?php
	session_start();
	require_once '../../back/db/pdo.php';
	require_once '../components/header.php';
	require_once '../../back/functions/autodisconnect.php';

	//Si on est connecté, la page s'affiche
	if (!isset($_SESSION["login"])) {
		header('Location: ../index.php');
		//Vérification de l'ID en GET
	}

    //Récupération de l'Id en GET
	$idClient = $_GET['idClient'];

	//Si un id est présent en GET, on lance la recherche
	if (!empty($idClient)) {

		$sql = connect()->prepare('SELECT * FROM CR_Clients WHERE client_id = :id ;');
		$sql->bindParam(':id', $idClient, PDO::PARAM_INT);
		$sql->execute();

		$client = $sql->fetch(PDO::FETCH_ASSOC);
	} else {
		$_SESSION['erreur'] = "URL invalide";
		header('Location: home.php');
	}
	require_once '../../back/db/close.php';

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <div class="container-fluid">
       <a href="home.php" id="btn" class="btn">Accueil</a>
        <button class="navbar-toggler btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="margin-left: 10px">
            <ul class="navbar-nav mr-auto">
				<?php if ($_SESSION['role'] === "ADMIN") : ?>
                    <li class="nav-item dropdown" style="margin-left: 10px;">
                        <button id="btn" class="btn dropdown-toggle" href="#" id="navbarDropdownMenuLink" type="button" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Ajouter un élément
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a href="modal/modalAjoutCnx.php" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalCnx">
                                    Ajouter une connexion <!-- Button modal form ligne 71 -->
                                </a>
                            </li>
                            <li><a href="modal/modalAjoutMat.php" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalMat">
                                    Ajouter un matériel <!-- Button modal form ligne 143 -->
                                </a>
                            </li>
                            <li>
                                <a href="modal/modalAjoutImg.php" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalImg">
                                    Ajouter une image <!-- Button modal form ligne 206 --></a>
                            </li>
                        </ul>
                    </li>
				<?php endif; ?>
                <!-- Modal pour ajouter une connexion -->
                <div class="modal fade" id="ModalCnx" tabindex="-1"
                     aria-labelledby="ModalCnxLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <?php require_once ('modal/modalAjoutCnx.php')?>
                        </div>
                    </div>
                </div>
                <!-- Modal pour ajouter un matériel -->
                <div class="modal fade" id="ModalMat" tabindex="-1"
                     aria-labelledby="ModalMatLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <?php require_once ('modal/modalAjoutMat.php')?>
                        </div>
                    </div>
                </div>
                </div>
                <!-- Modal pour ajouter une image -->
                <div class="modal fade" id="ModalImg" tabindex="-1"
                     aria-labelledby="ModalImgLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                           <?php require_once ('modal/modalAjoutImg.php')?>
                        </div>
                    </div>
                </div>
            <a id="btn" style="margin-left: 10px" href="../../back/functions/disconnect.php" class="btn">Déconnexion</a>
        </div>
</nav>

<main class="container">
    <form class="navbar-form" style="margin-bottom: 25px">
        <div class="form-group" style="display:inline;">
            <div class="input-group">
                <input type="search" class="form-control" placeholder="Recherche" id="search" name="search">
                <button id="btn" type="button" class="btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                    </svg>
                    Recherche
                </button>
            </div>
        </div>
    </form>
	<?php
        require_once('alert.php');

	?>
    <div class="row">
        <section class="col" style="margin-top: 2px">
            <h3>Détails du client :</h3>
            <p>Nom : <?= $client['client_nom'] ?></p>
            <!-- Instruction pour tester la présence d'une adresse d'entreprise-->
			<?php if (empty($client['ent_adresse'])): ?>
                <p>Adresse : <?= $client['client_adresse'] ?></p>
			<?php endif; ?>
            <p>Mail : <?= $client['client_mail'] ?></p>
            <p>Téléphone : <?= $client['client_telephone'] ?></p>
        </section>
        <!-- Instruction pour tester la présence d'informations concernant l'entreprise-->
        <?php if (!empty($client['ent_nom'])): ?>
            <section class="col">
                <h3>Détails de l'entreprise :</h3>
                <p>Nom : <?= $client['ent_nom'] ?></p>
    	<?php if (!empty($client['ent_adresse'])): ?>
                <p>Adresse : <?= $client['ent_adresse'] ?></p>
		<?php endif;
	     if (!empty($client['ent_mail'])): ?>
        <p>Mail : <?= $client['ent_mail'] ?></p>
		 <?php endif;
	    if (!empty($client['ent_tel'])): ?>
                <p>Téléphone : <?= $client['ent_tel'] ?></p>
    	<?php endif;
	    if (!empty($client['siret'])): ?>
                <p>Siret : <?= $client['siret'] ?></p>
        <?php endif;?>
            </section>
		<?php else: ?>
		<?php endif; ?>
    </div>
    <button type="button" class="btn btn-outline-success" href="home.php">Retour</button>
	<?php if ($_SESSION['role'] === "ADMIN") : ?>
        <!-- Button modal -->
        <button  href="modal/modalModifClient.php" type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                data-bs-target="#Modal<?= $client['client_id'] ?>">
            Modifier
        </button>
        <a onclick="return(confirm('Supprimer définitivement ?'))" class="btn btn-outline-danger"
           href="../../back/functions/supprimer.php?client_id=<?= $client['client_id'] ?>">Supprimer</a>

	<?php endif; ?>
    <!-- Modal -->
    <div class="modal fade" id="Modal<?= $client['client_id'] ?>" tabindex="-1"
         aria-labelledby="Modal<?= $client['client_id'] ?>Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
               <?php require_once ('modal/modalModifClient.php')?>
            </div>
        </div>
    </div>
</main>

<div  style="margin-top: 20px" class="accordion mr-auto " id="accordionDetails">
	<?php

		//On récupère les infos dans les différentes Tables
		$sql = connect()->prepare("SELECT * FROM cr_central cc
        INNER JOIN cr_connexion c on cc.central_id_cnx = c.cnx_id
        WHERE cc.central_id_client = '{$idClient}'"
		);
		$sql->execute();

		$connexions = $sql->fetchAll(PDO::FETCH_ASSOC);

		$sql = connect()->prepare("SELECT * FROM cr_central cc 
        INNER JOIN cr_materiel cm ON cc.central_id_mat = cm.mat_id  
        WHERE cc.central_id_client = '{$idClient}'");
		$sql->execute();

		$materiels = $sql->fetchAll(PDO::FETCH_ASSOC);

		$sql = connect()->prepare("SELECT * FROM cr_central cc
        INNER JOIN cr_images ci on cc.central_id_img = ci.img_id 
        WHERE cc.central_id_client = '{$idClient}'");
		$sql->execute();

		$images = $sql->fetchAll(PDO::FETCH_ASSOC);

		foreach ($connexions as $connexion) {
		$timestampIc = strtotime($connexion['date_nais_icloud']);
		$timestampP = strtotime($connexion['date_nais_produit']);
	?>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse<?= $connexion['central_id'] ?>" aria-expanded="false"
                    aria-controls="collapse<?= $connexion['central_id'] ?>">
                <?= $connexion['cnx_nom'] ?>
            </button>
        </h2>

        <div id=collapse<?= $connexion['central_id'] ?> class="accordion-collapse collapse "
             aria-labelledby="headingOne" data-bs-parent="#accordionDetails">
            <div class="accordion-body">
                <?php require 'accordion/accordionCnx.php';?>
            </div>
        </div>
    </div>

<?php }
	foreach ($materiels as $materiel) {
		?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse<?= $materiel['central_id'] ?>" aria-expanded="false"
                        aria-controls="collapse<?= $materiel['central_id'] ?>">
                    <div class="name"><?= $materiel['mat_nom'] ?></div>
                </button>
            </h2>
            <div id="collapse<?= $materiel['central_id'] ?>" class="accordion-collapse collapse"
                 aria-labelledby="headingTwo" data-bs-parent="#accordionDetails">
                <div class="accordion-body">
                  <?php require 'accordion/accordionMat.php';?>
                </div>
            </div>
        </div>

	<?php }
	foreach ($images

			 as $image) {
		$timestamp = strtotime($image['img_creation_date']);
		$timestamp2 = strtotime($image['img_modif_date']);
		?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button  class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse<?= $image['central_id'] ?>" aria-expanded="false"
                        aria-controls="collapse<?= $image['central_id'] ?>">
					<?= $image['img_nom'] ?>
                </button>
            </h2>
            <div id=collapse<?= $image['central_id'] ?> class="accordion-collapse collapse "
                 aria-labelledby="headingThree" data-bs-parent="#accordionDetails">
                <div class="accordion-body">
                    <?php require 'accordion/accordionImg.php';?>
                </div>
            </div>
        </div>
</div>
	<?php } ?>

<?php require_once '../components/footer.php' ?>